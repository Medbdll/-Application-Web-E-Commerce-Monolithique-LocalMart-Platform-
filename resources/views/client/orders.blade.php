@extends('layouts.client-layout')

@section('title', 'Orders')

@section('content')
    <main class="container mx-auto px-6 py-12 flex-grow">

        <div class="mb-12">
            <h1 class="font-sci-fi text-4xl md:text-5xl font-bold uppercase mb-2">
                <span class="text-neon-green">Order</span> History
            </h1>
            <p class="text-gray-400">Track your gear and review past purchases.</p>
        </div>

        <div class="space-y-6">
            @forelse ($orders as $order)


                <div class="bg-[#0a0a0a] border border-gray-800 rounded-none relative overflow-hidden group mb-8">
                    <div
                        class="border-b border-gray-800 p-4 md:p-6 flex flex-wrap justify-between items-end gap-4 bg-zinc-900/30">
                        <div>
                            <span
                                class="text-[10px] text-neon-green uppercase tracking-[0.2em] block mb-1 font-bold">Transaction
                                Header</span>
                            <span class="font-sci-fi text-white text-xl">#{{ $order->id }}</span>
                            <span class="text-gray-500 text-xs ml-2">{{ $order->created_at->format('d.m.Y H:i') }}</span>
                        </div>

                        <div class="flex flex-col items-end">
                            @php
                                $totalItems = $order->items->count();
                                $deliveredItems = $order->items->where('status', 'delivered')->count();
                                $progressPercentage = ($totalItems > 0) ? ($deliveredItems / $totalItems) * 100 : 0;
                                $isPaid = $order->payment_status === 'paid' ? true : false;
                            @endphp

                            <div class="text-right mb-2">
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">Global Fulfillment</span>
                                <div class="text-white font-sci-fi text-sm">
                                    @if ($isPaid)

                                        @if($progressPercentage == 100)
                                            <span class="text-neon-green">[ COMPLETED ]</span>
                                        @else
                                            <span class="text-yellow-500">[ PROCESSING: {{ $deliveredItems }}/{{ $totalItems }} ]</span>
                                        @endif
                                    @else
                                        <span class="text-red-500">[ PENDING ]</span>
                                    @endif
                                </div>
                            </div>
                            @if ($isPaid)
                            <div class="w-48 h-1 bg-gray-800">
                                <div class="h-full bg-neon-green transition-all duration-500"
                                    style="width: {{ $progressPercentage }}%"></div>
                            </div>
                            @endif
                            
                        </div>
                    </div>

                    <div class="divide-y divide-gray-900">

                        @foreach ($order->items as $item)
                            <div
                                class="p-4 md:p-6 flex flex-col md:flex-row md:items-center gap-6 hover:bg-white/[0.02] transition-colors">
                                <div class="flex items-center gap-3 flex-grow">
                                    <div class="relative">
                                        <img src="{{ $item->product->image_url }}"
                                            class="w-14 h-14 object-cover border border-gray-700 rounded hover:grayscale-0 transition-all">
                                        <div class="absolute -top-2 -right-2 bg-neon-green text-black text-[10px] font-bold px-1.5 py-0.5 rounded-full border border-black shadow-lg shadow-neon-green/50">
                                            {{ $item->quantity }}
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="text-white font-bold uppercase tracking-tight text-sm">{{ $item->product->name }}</h4>
                                        <p class="text-[9px] text-gray-500 uppercase italic">Vendor: <span
                                                class="text-gray-300">{{ $item->product->seller->name ?? 'Unknown Seller' }}</span>
                                        </p>
                                        <div class="flex items-center gap-3 mt-1">
                                            <span class="text-gray-400 text-[9px]">Unit: <span class="text-white font-semibold">${{ number_format($item->price, 2) }}</span></span>
                                            <span class="text-gray-400 text-[9px]">Qty: <span class="text-neon-green font-bold">{{ $item->quantity }}</span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col md:items-end min-w-[140px]">
                                    <span class="text-[10px] text-gray-500 uppercase mb-1">Item Status</span>
                                    <div class="flex items-center gap-2">
                                        @if ($isPaid)

                                            @if($item->status == 'delivered')
                                                <span class="w-2 h-2 bg-neon-green shadow-[0_0_8px_#39FF14]"></span>
                                                <span class="text-neon-green text-xs font-sci-fi uppercase">Arrived</span>
                                            @elseif($item->status == 'shipped')
                                                <span class="w-2 h-2 bg-blue-500 animate-pulse"></span>
                                                <span class="text-blue-500 text-xs font-sci-fi uppercase">In Transit</span>
                                            @else
                                                <span class="w-2 h-2 bg-yellow-500"></span>
                                                <span class="text-yellow-500 text-xs font-sci-fi uppercase">Preparing</span>
                                            @endif

                                        @else
                                            <span class="w-2 h-2 bg-red-500"></span>
                                            <span class="text-red-500 text-xs font-sci-fi uppercase">Pending Payment</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-right min-w-[100px]">
                                    <span class="text-[10px] text-gray-500 uppercase block">Subtotal</span>
                                    <span
                                        class="text-white font-sci-fi tracking-tighter">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div
                        class="p-6 bg-zinc-950 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="text-center md:text-left">
                            <span class="text-xs text-gray-500 uppercase block">Total Credit Required</span>
                            <div class="text-3xl font-sci-fi font-bold text-white tracking-tighter">
                                ${{ number_format($order->total_price, 2) }}
                            </div>
                        </div>

                        <div class="w-full md:w-auto">
                            @if ($order->payment_status === 'paid')

                                @if($progressPercentage < 100)
                                    <button
                                        class="w-full md:w-64 border border-neon-green text-neon-green px-6 py-3 font-sci-fi text-sm uppercase hover:bg-neon-green hover:text-black transition-all">
                                        View Live Tracking
                                    </button>
                                @else
                                    <button
                                        class="w-full md:w-64 bg-white text-black px-6 py-3 font-sci-fi text-sm uppercase font-bold hover:bg-neon-green transition-all">
                                        Archive Transaction
                                    </button>
                                @endif
                            @elseif ($order->payment_status === 'pending')
                                <button
                                    class="w-full md:w-64 bg-neon-green text-black px-6 py-3 font-sci-fi text-sm uppercase font-bold hover:bg-neon-green/80 transition-all">
                                    Pay Now
                                </button>
                            @endif
                        </div>
                    </div>
                </div>






            @empty
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">📦</div>
                    <h3 class="text-xl font-bold text-white mb-2">No orders yet</h3>
                    <p class="text-gray-400">Start shopping and track your orders here</p>
                </div>
            @endforelse
        </div>

        <div class="mt-20 border border-gray-800 bg-black p-8 text-center relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-full h-1 bg-neon-green"></div>
            <h2 class="text-2xl font-sci-fi font-bold text-white mb-4">Questions about your order?</h2>
            <p class="text-gray-400 mb-6">Our support team is ready to assist you 24/7 with tracking or returns.</p>
            <button
                class="border border-neon-green text-neon-green px-8 py-3 font-sci-fi font-bold uppercase tracking-wider hover:bg-neon-green hover:text-black transition duration-300">
                Contact Support
            </button>
        </div>

    </main>

@endsection