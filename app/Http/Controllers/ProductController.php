<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmail;
use App\Mail\SellerEmail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('dashboard.product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole(['seller'])) {
            $this->authorize('create', Product::class);
            //we should return the create form
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (auth()->user()->hasRole(['seller'])) {
            $this->authorize('create', Product::class);

            $validated = $request->validate([

                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'status' => 'required|in:active,inactive',
                'category_id' => 'required|exists:categories,id'

            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('products', 'public');
            }

            $validated['user_id'] = auth()->id();
            $product = Product::create($validated);


            return response()->json($product, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $user = auth()->user();
        $cart = $user->cart;
        $cardItem = CartItem::where(['product_id' => $product->id, 'cart_id' => $cart->id])->first();
        $seller = $product->seller;
        $product->stock -= $cardItem->quantity ?? 0;
        $reviews = $product->reviews()->with('user')->latest()->take(3)->get();
        return view('client.product_details', compact('product', 'seller', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)

    {
        if (auth()->user()->hasRole('seller')) {
            $this->authorize('update', $product);
            //return the form
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        if (auth()->user()->hasRole('seller')) {
            $this->authorize('update', $product);

            $validated = $request->validate([

                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'status' => 'required|in:active,inactive',
                'category_id' => 'required|exists:categories,id'
            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('products', 'public');
            }

            $product->update($validated);
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (auth()->user()->hasRole(['admin', 'seller'])) {
            $this->authorize('delete', $product);
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);

        }
        return response()->json(['error' => 'Unauthorized'], 403);

    }


}
