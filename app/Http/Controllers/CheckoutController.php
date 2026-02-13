<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmail;
use App\Mail\SellerEmail;
use App\Mail\ClientPayement;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function checkout(Request $request, Order $order)
    {
        // Validate order exists and belongs to user
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        // Load order items with products
        $order->load('items.product');

        // 3. Initialize Stripe
        Stripe::setApiKey(config('services.stripe.secret'));
        $lineItems = [];
        foreach ($order->items as $item) {
            // Skip items without products
            if (!$item->product) {
                continue;
            }

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'MAD',
                    'product_data' => [
                        'name' => $item->product->name ?? 'Unknown Product',
                        'description' => $item->product->description ?? 'No description available',
                    ],
                    'unit_amount' => $item->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }
        // 4. Create the Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            Log::warning('Success page accessed without session_id');
            return view('checkout.success', ['sessionId' => null, 'error' => 'Invalid session']);
        }

        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            $orderId = $session->metadata->order_id ?? null;

            if (!$orderId) {
                Log::error('No order_id found in Stripe session metadata');
                return view('checkout.success', ['sessionId' => $sessionId, 'error' => 'Order not found']);
            }

            if ($session->payment_status === 'paid') {
                DB::transaction(function () use ($orderId, $sessionId) {
                    $order = Order::lockForUpdate()->find($orderId);
                    if ($order && $order->payment_status === 'pending') {
                        $order->update([
                            'payment_status' => 'paid',
                            'stripe_session_id' => $sessionId
                        ]);


                        $order->load('items.product.user');

                        // Get product names for client email
                        $productNames = $order->items->map(function($item) {
                            return $item->product ? $item->product->name : 'Unknown Product';
                        })->implode(', ');

                        // Send client email first
                        try {
                            Mail::to($order->user->email)->queue(
                                new ClientPayement(
                                    $order->user->name,
                                    $order->id,
                                    $order->user->name,
                                    $productNames,
                                    $order->items->sum('quantity'),
                                    $order->total_price,
                                    'Stripe Card',
                                    route('order.show', $order->id)
                                )
                            );
                            Log::info("Client email sent to: " . $order->user->email);
                        } catch (\Exception $e) {
                            Log::error("Failed to send client email: " . $e->getMessage());
                        }

                        // Send seller emails
                        $sellersEmailed = [];
                        foreach ($order->items as $index => $item) {
                            $seller = $item->product->user;
                            
                            // Avoid sending duplicate emails to same seller
                            if (in_array($seller->email, $sellersEmailed)) {
                                continue;
                            }
                            
                            try {
                                Mail::to($seller->email)->queue(
                                    new SellerEmail(
                                        $seller->name,
                                        $order->id,
                                        $order->user->name,
                                        $item->product->name,
                                        $item->quantity,
                                        $item->price * $item->quantity,
                                        'paid',
                                        route('order.show', $order->id)
                                    )
                                );
                                $sellersEmailed[] = $seller->email;
                                Log::info("Seller email sent to: " . $seller->email . " for product: " . $item->product->name);
                                
                                // Add delay between emails to avoid rate limiting
                                if ($index < $order->items->count() - 1) {
                                    sleep(1);
                                }
                            } catch (\Exception $e) {
                                Log::error("Failed to send seller email for product " . $item->product->id . ": " . $e->getMessage());
                            }
                        }

                        Log::info("Order {$orderId} marked as paid and emails sent");
                    } elseif ($order && $order->payment_status === 'paid') {
                        Log::info("Order {$orderId} already paid - success page verification");
                    } else {
                        Log::error("Order {$orderId} not found or invalid status for success page");
                    }
                });
            } else {
                Log::warning("Payment not completed for session {$sessionId}, status: {$session->payment_status}");
                return view('checkout.success', ['sessionId' => $sessionId, 'error' => 'Payment not completed']);
            }

        } catch (\Stripe\Exception\ApiErrorException $e) {
            Log::error('Stripe API error in success page: ' . $e->getMessage());
            return view('checkout.success', ['sessionId' => $sessionId, 'error' => 'Payment verification failed']);
        } catch (\Exception $e) {
            Log::error('Unexpected error in success page: ' . $e->getMessage());
            return view('checkout.success', ['sessionId' => $sessionId, 'error' => 'An error occurred']);
        }

        return view('checkout.success', ['sessionId' => $sessionId]);
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }

}
