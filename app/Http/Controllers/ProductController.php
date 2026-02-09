<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        $term = $request->input('term');

        if (auth()->user()->hasRole(['client', 'moderator', 'admin'])) {
            $query = Product::with(['user', 'category']);
            if ($term) {
                $query->where('name', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%");
            }
            $products = $query->latest()->get()->map(function($product) {
                return (object)[
                    'name' => $product->name,
                    'sku' => 'SKU-' . $product->id,
                    'image' => $product->image,
                    'category' => $product->category->name ?? 'Uncategorized',
                    'condition' => $product->status === 'active' ? 'New' : 'Pre-Owned',
                    'seller_name' => $product->user->name ?? 'Unknown',
                    'seller_avatar' => null,
                    'seller_verified' => $product->user->hasRole('admin'),
                    'seller_type' => $product->user->hasRole('admin') ? 'Verified Partner' : 'Community Seller',
                    'seller_rating' => 5,
                    'seller_sales' => rand(10, 5000),
                    'price' => $product->price,
                    'price_type' => 'Retail Price',
                    'stock' => $product->stock,
                    'status' => $product->status,
                    'listed_at' => $product->created_at->diffForHumans(),
                ];
            });

            if ($request->ajax()) {
                return response()->json($products);
            }

            return view('dashboard.product', compact('products'));
        }

        if (auth()->user()->hasRole('seller')) {
            $query = Product::where('user_id', auth()->id())->with(['user', 'category']);
            if ($term) {
                $query->where(function ($q) use ($term) {
                    $q->where('name', 'like', "%{$term}%")
                        ->orWhere('description', 'like', "%{$term}%");
                });
            }
            $products = $query->latest()->get();

            if ($request->ajax()) {
                return response()->json($products);
            }
            return view('products.index', compact('products'));
        }
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

        $this->authorize('view', $product);
        return $product;

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
