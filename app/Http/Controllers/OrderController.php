<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->isAdmin()) {

            // Get all orders for statistics (without pagination)
            $allOrders = Order::with(['user', 'items.product'])->latest()->get();
            
            // Get paginated orders for display
            $orders = Order::with(['user', 'items.product'])->orderBy('created_at', 'desc')->paginate(10);

            // Calculate statistics from all orders
            $statistics = [
                'total_orders' => $allOrders->count(),
                'total_revenue' => $allOrders->where('payment_status', 'paid')->sum('total_price'),
                'pending_orders' => $allOrders->where('payment_status', 'pending')->count(),
                'paid_orders' => $allOrders->where('payment_status', 'paid')->count(),
            ];

            return view('dashboard.orders', compact('orders', 'statistics'));

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
            $allOrders = collect($orders)->where('payment_status', 'paid');
            
            // Calculate statistics for seller
            $statistics = [
                'total_orders' => $allOrders->count(),
                'total_revenue' => $allOrders->sum('total_price'),
                'pending_orders' => collect($orders)->where('payment_status', 'pending')->count(),
                'paid_orders' => $allOrders->count(),
            ];
            
            // Convert to LengthAwarePaginator for pagination
            $currentPage = request()->get('page', 1);
            $perPage = 10;
            $total = $allOrders->count();
            $ordersCollection = $allOrders->forPage($currentPage, $perPage);
            
            $orders = new \Illuminate\Pagination\LengthAwarePaginator(
                $ordersCollection,
                $total,
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page',
                ]
            );
            
            return view('dashboard.orders', compact('orders', 'statistics'));
        } elseif ($this->isClient()) {

            $orders = Order::where('user_id', $this->authenticatedUser()->id)
                ->with(['items.product'])
                ->latest()
                ->paginate(10);

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

            // Get cart items with products for validation
            $cartItems = CartItem::with('product')->where('cart_id', $cartId)->get();

            // Check if cart is empty
            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty. Please add items before placing an order.');
            }

            // Validate stock availability
            foreach ($cartItems as $item) {
                if (!$item->product) {
                    Log::warning('Skipping cart item ' . $item->id . ' - product not found');
                    $item->delete();
                    continue;
                }

                if ($item->product->stock < $item->quantity) {
                    return redirect()->back()->with('error', "Insufficient stock for product: {$item->product->name}. Available: {$item->product->stock}, Requested: {$item->quantity}");
                }
            }

            // Use database transaction for data integrity
            DB::beginTransaction();
            try {
                $order = Order::create([
                    'user_id' => $userId,
                    'cart_id' => $cartId,
                    'total_price' => $total,
                    'address_id' => $addressId,
                ]);

                foreach ($cartItems as $item) {
                    // Skip items without valid products (already validated above)
                    if (!$item->product) {
                        continue;
                    }
                    
                    // Create order item
                    $order->items()->create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'seller_id' => $item->product->user_id,
                    ]);

                    // Reduce product stock
                    $item->product->decrement('stock', $item->quantity);
                    
                    // Remove item from cart
                    $item->delete();
                }

                DB::commit();
                return redirect()->route('order.index')->with('success', 'Order placed successfully!');
                
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Order creation failed: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to place order. Please try again.');
            }

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
        if (! $address) {
            $addressExist = false;
        } else {
            $addressExist = true;
        }

        return view('client.infoBeforeOrder', compact('cart', 'address', 'user', 'addressExist'));
    }
}
