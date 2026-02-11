@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase">
                        {{ $statistics['role'] === 'seller' ? 'My Sales' : 'Total Sales' }}
                    </p>
                    <h3 class="text-3xl font-gaming font-bold mt-1">${{ $statistics['total_sales'] ?? '0' }}</h3>
                </div>
                <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs {{ $statistics['sales_growth'] >= 0 ? 'text-green-400' : 'text-red-500' }} mt-4 flex items-center gap-1">
                @if($statistics['sales_growth'] >= 0)
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"></path>
                    </svg>
                    +{{ $statistics['sales_growth'] }}% vs last month
                @else
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"></path>
                    </svg>
                    {{ $statistics['sales_growth'] }}% vs last month
                @endif
            </p>
        </div>
        <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase">Active Orders</p>
                    <h3 class="text-3xl font-gaming font-bold mt-1">{{ $statistics['active_orders'] ?? '0' }}</h3>
                </div>
                <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 11V7a4 4 0 11-8 0m-4 5v2m-8 0a4 4 0 100 8 4 4 0 000-8zm-4 5a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-yellow-500 mt-4">
                {{ $statistics['pending_verification'] ?? $statistics['pending_orders'] ?? '0' }} Pending verification
            </p>
        </div>
        <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase">
                        {{ $statistics['role'] === 'seller' ? 'My Products' : ($statistics['role'] === 'moderator' ? 'Active Users' : 'Total Users') }}
                    </p>
                    <h3 class="text-3xl font-gaming font-bold mt-1">
                        {{ $statistics['total_products'] ?? $statistics['active_users'] ?? $statistics['total_users'] ?? '0' }}
                    </h3>
                </div>
                <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.0 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-400 mt-4">
                {{ $statistics['new_users_today'] ?? $statistics['new_orders_today'] ?? '+0' }} New today
            </p>
        </div>
        <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase">
                        {{ $statistics['role'] === 'moderator' ? 'Pending Reviews' : 'Stock Level' }}
                    </p>
                    <h3 class="text-3xl font-gaming font-bold mt-1">
                        {{ $statistics['role'] === 'moderator' ? ($statistics['pending_reviews'] ?? '0') : ($statistics['stock_level'] ?? '0') . '%' }}
                    </h3>
                </div>
                <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs {{ $statistics['low_stock_items'] > 0 ? 'text-red-500' : 'text-green-400' }} mt-4">
                {{ $statistics['role'] === 'moderator' ? ($statistics['reported_products'] ?? '0') . ' Reported products' : ($statistics['low_stock_items'] ?? '0') . ' Items low in stock' }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <div class="xl:col-span-2 bg-black border border-gray-900 rounded-3xl overflow-hidden shadow-2xl">
            <div class="p-6 border-b border-gray-900 flex justify-between items-center bg-gray-900/20">
                <h2 class="text-xl font-gaming font-bold tracking-wide">
                    {{ $statistics['role'] === 'seller' ? 'My Recent Orders' : 'Recent Acquisitions' }}
                </h2>
                <button class="text-[#39FF14] text-sm hover:underline">View All</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                    <tr class="text-gray-500 text-xs uppercase bg-[#080808]">
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-900">
                    @forelse($statistics['recent_orders'] ?? [] as $order)
                    <tr class="hover:bg-gray-900/40 transition-colors">
                        <td class="px-6 py-4 font-gaming text-[#39FF14]">#VX-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gray-800 flex items-center justify-center text-xs">
                                    {{ strtoupper(substr($order->user->name ?? 'UN', 0, 2)) }}
                                </div>
                                <span>{{ $order->user->name ?? 'Unknown' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-bold">${{ number_format($order->total_price, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 
                                {{ $order->status === 'shipped' ? 'bg-green-500/10 text-green-500 border-green-500/20' : 
                                   ($order->status === 'pending' ? 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20' : 
                                   'bg-blue-500/10 text-blue-500 border-blue-500/20') }} 
                                rounded-full text-[10px] font-bold border">
                                {{ strtoupper($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No recent orders found
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-black border border-gray-900 rounded-3xl p-6">
            <h2 class="text-xl font-gaming font-bold mb-6 tracking-wide flex items-center gap-2">
                <span class="w-2 h-2 bg-[#39FF14] rounded-full animate-pulse"></span>
                Live Feed
            </h2>
            <div class="space-y-6">
                <div class="flex gap-4">
                    <div class="bg-blue-500/20 p-2 rounded-lg h-fit text-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold">New inventory added</p>
                        <p class="text-xs text-gray-500">Vortex Mouse V3 Pro (x50)</p>
                        <span class="text-[10px] text-gray-600">2 min ago</span>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="bg-red-500/20 p-2 rounded-lg h-fit text-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold">Security Alert</p>
                        <p class="text-xs text-gray-500">Failed login from 192.168.1.1</p>
                        <span class="text-[10px] text-gray-600">14 min ago</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <livewire:category-table/>

@endsection
