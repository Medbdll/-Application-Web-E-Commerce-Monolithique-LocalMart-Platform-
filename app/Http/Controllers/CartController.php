<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();
        
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        $subtotal = 0;
        $totalItems = 0;
        
        foreach ($cart->items as $item) {
            $subtotal += $item->price * $item->quantity;
            $totalItems += $item->quantity;
        }
        
        $shipping = $subtotal > 0 ? 0 : 0;
        $tax = 0; // Tax ignored
        $total = $subtotal + $shipping;

        return view('client.cart', compact('cart', 'subtotal', 'shipping', 'tax', 'total', 'totalItems'));
    }

    public function add(Request $request, Product $product)
    {
        $user = Auth::user();
        
        $cart = Cart::where('user_id', $user->id)->first();
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)
                           ->where('product_id', $product->id)
                           ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function clear()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        
        if ($cart) {
            $cart->items()->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }
}
