<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmail;
use App\Mail\SellerEmail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->isAdmin()) {

            $orders = Order::with(['user', 'items.product'])->latest()->get();

            return view('dashboard.orders', compact('orders'));

        } elseif ($this->isSeller()) {

            $orderItems = OrderItem::where('seller_id', $this->authenticatedUser()->id)
                ->with(['order.user', 'product'])
                ->latest()
                ->get()
                ->groupBy('order_id');

            $orders = [];
            foreach ($orderItems as $orderId => $items) {
                $order = $items->first()->order;
                $order->items = $items;
                $orders[] = $order;
            }

            // Filter seller orders to show only paid orders
            $orders = collect($orders)->where('payment_status', 'paid');

            return view('dashboard.orders', compact('orders'));
        } elseif ($this->isClient()) {

            $orders = Order::where('user_id', $this->authenticatedUser()->id)
                ->with(['items.product'])
                ->latest()
                ->get();

            return view('client.orders', compact('orders'));

        } else {
            abort(403, 'Unauthorized access');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->authenticatedUser()->hasRole('client')) {

            $total = $request->total;
            $cartId = $request->cart_id;
            $addressId = $request->address_id;
            $userId = $this->authenticatedUser()->id;
            $order = Order::create([
                'user_id' => $userId,
                'cart_id' => $cartId,
                'total_price' => $total,
                'address_id' => $addressId,
                'payment_status' => 'pending',
            ]);
            $cartItems = CartItem::with('product')->where('cart_id', $cartId)->get();
            foreach ($cartItems as $item) {
                // Skip items without valid products
                if (!$item->product) {
                    Log::warning('Skipping cart item ' . $item->id . ' - product not found');
                    $item->delete();
                    continue;
                }
                
                $order->items()->create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'seller_id' => $item->product->user_id,
                ]);

                $item->delete();
            }


            return redirect()->route('order.index');
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $this->authorize('edit', $order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function verifyInfo(Cart $cart)
    {
        $user = auth()->user();
        $address = $user->address;
        if (!$address) {
            $addressExist = false;
        } else {
            $addressExist = true;
        }

        return view('client.infoBeforeOrder', compact('cart', 'address', 'user', 'addressExist'));
    }

}
