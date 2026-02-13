<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
        
        // Check if cart exists before trying to access it
        if (!$cart) {
            abort(404, 'Cart not found');
        }
        
        $cartItem = CartItem::where(['product_id' => $product->id, 'cart_id' => $cart->id])->first();
        $seller = $product->seller;
        $availableStock = $product->stock - ($cartItem->quantity ?? 0);
        $reviews = $product->reviews()->with('user')->latest()->take(3)->get();
        
        // Get user's existing review for this product
        $userReview = $product->reviews()->where('user_id', $user->id)->first();
        
        return view('client.product_details', compact('product', 'seller', 'reviews', 'userReview', 'availableStock'));
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

    public function reviewStore(Request $request, Product $product) {
        // Check if user is client and has purchased the product
        if (auth()->user()->hasRole('client')) {
            $this->authorize('review', $product);
            
            // Validate input
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:500'
            ]);
            
            Review::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);
            
            return response()->json(['message' => 'Review added successfully']);
        }
        
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
