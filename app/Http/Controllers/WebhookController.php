<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Stripe\Webhook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log all incoming webhook requests for debugging
        Log::info('Stripe webhook received: ' . $request->header('Stripe-Signature'));
        
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        // Require webhook secret for security
        if (!$endpointSecret) {
            Log::error('Webhook secret not configured - rejecting request');
            return response()->json(['error' => 'Webhook not properly configured'], 500);
        }

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\Exception $e) {
            Log::error('Webhook signature verification failed: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        Log::info('Webhook event type: ' . ($event['type'] ?? 'unknown'));

        // Handle the specific event
        if (($event['type'] ?? '') === 'checkout.session.completed') {
            $session = $event['data']['object'];
            $orderId = $session['metadata']['order_id'] ?? null;

            Log::info('Processing completed payment for order: ' . $orderId);

            if ($orderId) {
                // Update your database within a transaction to prevent race conditions
                DB::transaction(function () use ($orderId, $session) {
                    $order = Order::lockForUpdate()->find($orderId);
                    if ($order && $order->payment_status === 'pending') {
                        $oldStatus = $order->payment_status;
                        $order->update([
                            'payment_status' => 'paid',
                            'stripe_session_id' => $session['id'] ?? null
                        ]);
                        
                        // Log the successful payment for debugging
                        Log::info("Payment status updated for order {$orderId}: {$oldStatus} -> paid");
                        
                        // This is also where you'd trigger seller notifications
                    } elseif ($order && $order->payment_status === 'paid') {
                        Log::info("Order {$orderId} already marked as paid - skipping update");
                    } else {
                        Log::error('Order not found or not in pending status: ' . $orderId);
                    }
                });
            } else {
                Log::error('No order ID found in webhook metadata');
            }
        }

        return response()->json(['status' => 'success']);
    }
}
