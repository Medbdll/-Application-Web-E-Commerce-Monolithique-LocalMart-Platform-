<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $statistics = [];
        
        if ($user->hasRole('admin')) {
            $statistics = $this->getAdminStatistics();
        } elseif ($user->hasRole('seller')) {
            $statistics = $this->getSellerStatistics($user);
        } elseif ($user->hasRole('moderator')) {
            $statistics = $this->getModeratorStatistics();
        }
        
        return view("dashboard.index", compact('statistics'));
    }
    private function getAdminStatistics()
    {
        $totalSales = OrderItem::sum('price');
        $activeOrders = OrderItem::where('status', 'pending')->orWhere('status', 'processing')->count();
        $totalUsers = User::count();
        $lowStockProducts = Product::where('stock', '<', 10)->count();
        
        // Calculate monthly growth
        $lastMonthSales = OrderItem::whereMonth('created_at', now()->subMonth()->month)
                               ->whereYear('created_at', now()->subMonth()->year)
                               ->sum('price');
        $currentMonthSales = OrderItem::whereMonth('created_at', now()->month)
                                 ->whereYear('created_at', now()->year)
                                 ->sum('price');
        $salesGrowth = $lastMonthSales > 0 ? (($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100 : 0;
        
        $newUsersToday = User::whereDate('created_at', today())->count();
        $pendingVerification = OrderItem::where('status', 'pending')->count();
        
        return [
            'total_sales' => number_format($totalSales, 2),
            'active_orders' => $activeOrders,
            'total_users' => $totalUsers,
            'stock_level' => $lowStockProducts > 0 ? max(0, 100 - ($lowStockProducts * 5)) : 100,
            'sales_growth' => round($salesGrowth, 1),
            'new_users_today' => $newUsersToday,
            'pending_verification' => $pendingVerification,
            'low_stock_items' => $lowStockProducts,
            'recent_orders' => OrderItem::with('order.user')->latest()->take(5)->get(),
            'role' => 'admin'
        ];
    }
    
    /**
     * Get statistics for seller users - their products and orders only
     */
    private function getSellerStatistics($user)
    {
        $sellerProducts = Product::where('user_id', $user->id);
        
        // Get total sales
        $totalSales = OrderItem::whereHas('product', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->sum('price');
        
        // Get active orders
        $activeOrders = OrderItem::whereHas('product', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where(function($query) {
            $query->where('status', 'pending')->orWhere('status', 'processing');
        })->count();
        
        $totalProducts = $sellerProducts->count();
        $lowStockProducts = $sellerProducts->where('stock', '<', 10)->count();
        
        // Calculate monthly growth
        $lastMonthSales = OrderItem::whereHas('product', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereMonth('created_at', now()->subMonth()->month)
          ->whereYear('created_at', now()->subMonth()->year)
          ->sum('price');
          
        $currentMonthSales = OrderItem::whereHas('product', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereMonth('created_at', now()->month)
          ->whereYear('created_at', now()->year)
          ->sum('price');
          
        $salesGrowth = $lastMonthSales > 0 ? (($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100 : 0;
        
        $newOrdersToday = OrderItem::whereHas('product', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereDate('created_at', today())->count();
        
        $pendingOrders = OrderItem::whereHas('product', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'pending')->count();
        
        return [
            'total_sales' => number_format($totalSales, 2),
            'active_orders' => $activeOrders,
            'total_products' => $totalProducts,
            'stock_level' => $lowStockProducts > 0 ? max(0, 100 - ($lowStockProducts * 10)) : 100,
            'sales_growth' => round($salesGrowth, 1),
            'new_orders_today' => $newOrdersToday,
            'pending_orders' => $pendingOrders,
            'low_stock_items' => $lowStockProducts,
            'recent_orders' => OrderItem::whereHas('product', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })->with('order.user')->latest()->take(5)->get(),
            'role' => 'seller'
        ];
    }
    
    /**
     * Get statistics for moderator users - content moderation focused
     */
    private function getModeratorStatistics()
    {
        $pendingReviews = \App\Models\Review::where('status', 'pending')->count();
        $reportedProducts = Product::where('status', 'reported')->count();
        $suspendedUsers = User::where('status', 'suspended')->count();
        $activeUsers = User::where('status', 'active')->count();
        
        $totalOrders = OrderItem::count();
        $pendingOrders = OrderItem::where('status', 'pending')->count();
        
        return [
            'pending_reviews' => $pendingReviews,
            'reported_products' => $reportedProducts,
            'suspended_users' => $suspendedUsers,
            'active_users' => $activeUsers,
            'total_orders' => $totalOrders,
            'pending_orders' => $pendingOrders,
            'sales_growth' => 0,
            'low_stock_items' => 0,
            'role' => 'moderator'
        ];
    }

    public function product()
    {
        return view("dashboard.product");
    }
    public function orders()
    {
        return view("dashboard.orders");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
