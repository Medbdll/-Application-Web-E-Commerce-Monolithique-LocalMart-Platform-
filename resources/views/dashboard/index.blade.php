@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-10">
        @if($statistics['role'] !== 'moderator')
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
        @endif
        <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase">
                        {{ $statistics['role'] === 'seller' ? 'My Products' : ($statistics['role'] === 'moderator' ? 'Suspended Users' : 'Total Users') }}
                    </p>
                    <h3 class="text-3xl font-gaming font-bold mt-1">
                        {{ $statistics['role'] === 'moderator' ? ($statistics['suspended_users'] ?? '0') : ($statistics['total_products'] ?? $statistics['active_users'] ?? $statistics['total_users'] ?? '0') }}
                    </h3>
                </div>
                <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.0 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs {{ $statistics['role'] === 'moderator' ? 'text-red-500' : 'text-green-400' }} mt-4">
                {{ $statistics['role'] === 'moderator' ? ($statistics['new_suspensions_today'] ?? '+0') . ' Suspended today' : ($statistics['new_users_today'] ?? $statistics['new_orders_today'] ?? '+0') . ' New today' }}
            </p>
        </div>
        <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase">
                        {{ $statistics['role'] === 'moderator' ? 'Suspended Products' : 'Stock Level' }}
                    </p>
                    <h3 class="text-3xl font-gaming font-bold mt-1">
                        {{ $statistics['role'] === 'moderator' ? ($statistics['suspended_products'] ?? '0') : ($statistics['stock_level'] ?? '0') . '%' }}
                    </h3>
                </div>
                <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs {{ $statistics['role'] === 'moderator' ? 'text-red-500' : ($statistics['low_stock_items'] > 0 ? 'text-red-500' : 'text-green-400') }} mt-4">
                {{ $statistics['role'] === 'moderator' ? ($statistics['new_suspended_products_today'] ?? '+0') . ' Suspended today' : ($statistics['low_stock_items'] ?? '0') . ' Items low in stock' }}
            </p>
        </div>
        @if($statistics['role'] === 'moderator')
        <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase">Pending Reviews</p>
                    <h3 class="text-3xl font-gaming font-bold mt-1">{{ $statistics['pending_reviews'] ?? '0' }}</h3>
                </div>
                <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-yellow-500 mt-4">
                {{ $statistics['new_reviews_today'] ?? '+0' }} New today
            </p>
        </div>
        @endif
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

       

    </div>
    @role('admin')
    <livewire:category-table/>
    @endrole

@endsection
