<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('client.index', compact('products', 'categories'));
    }
}
