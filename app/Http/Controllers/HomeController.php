<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->when(request('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->when(request('filter'), function($query, $filter) {
                switch($filter) {
                    case 'in_stock':
                        $query->where('stock', '>', 0);
                        break;
                    case 'on_sale':
                        $query->where('status', 'sale');
                        break;
                }
            })
            ->when(request('sort'), function($query, $sort) {
                switch($sort) {
                    case 'price_low_high':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'price_high_low':
                        $query->orderBy('price', 'desc');
                        break;
                    case 'name_az':
                        $query->orderBy('name', 'asc');
                        break;
                    default:
                        $query->latest();
                        break;
                }
            }, function($query) {
                $query->latest();
            })
            ->paginate(12);
            
        $categories = Category::latest()->get();
        return view('client.index', compact('products', 'categories'));
    }
}
