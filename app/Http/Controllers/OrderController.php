<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->isAdmin()) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $this->authenticatedUser()->id)->get();
        }

        return $orders;

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
    public function store(Cart $cart)
    {
        if ($this->authenticatedUser()->hasRole('client')) {
            if (auth()->user()->address) {
                $order = Order::create([
                    'user_id' => $this->authenticatedUser()->id,
                    'cart_id' => $cart->id,
                    'total' => $cart->total,
                ]);
                return redirect()->route('orders.show', $order);
            } else {
                return redirect()->route('address.add');
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

    public function verifyInfo(Cart $cart) {
        $user = auth()->user();
        $address = $user->address;
        return view('client.infoBeforeOrder', compact('cart','address', 'user'));
    }
}
