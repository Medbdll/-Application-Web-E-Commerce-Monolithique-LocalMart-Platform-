<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole(['client', 'moderator', 'admin'])) {
            $this->authorize('viewAny', Product::class);
            return dump(Product::all());
        }
        if (auth()->user()->hasRole('seller')) {
            $this->authorize('viewAny', Product::class);
            return dump(Product::where('user_id', auth()->id())->get());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole(['seller'])) {
            $this->authorize('create', Product::class);
            return 'hey hey ';
        }

        //we should return the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);

        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id'

        ]);

        $validated['user_id'] = auth()->id();
        Product::create($validated);
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
        $this->authorize('update', $product);
        //return the form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($validated);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
    }

    private function middleware(string $string)
    {
    }

    private function authorize(string $string, string $class)
    {
    }

}
