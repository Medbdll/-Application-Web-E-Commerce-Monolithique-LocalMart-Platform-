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
                <div class="bg-card-bg border border-gray-800 p-6 hover:border-gray-600 transition duration-300">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-gray-800 pb-4 mb-4 gap-4">
                        <div>
                            <span class="text-xs text-gray-500 uppercase tracking-widest font-sci-fi">Order ID</span>
                            <div class="text-white font-mono text-lg">#{{ $order->id }}</div>
                            <div class="text-sm text-gray-400">Placed on {{ $order->created_at->format('M d, Y') }}</div>
                        </div>
                        <div class="flex items-center gap-4">
                            @if ($order->status == 'pending')
                                <span class="flex items-center gap-2 text-yellow-500 bg-yellow-500/10 px-4 py-1 rounded font-sci-fi text-sm uppercase tracking-wide border border-yellow-500/20">
                                    <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                                    Unpaid
                                </span>
                            @elseif ($order->status == 'processing')
                                <span class="flex items-center gap-2 text-blue-500 bg-blue-500/10 px-4 py-1 rounded font-sci-fi text-sm uppercase tracking-wide border border-blue-500/20">
                                    <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                                    Processing
                                </span>
                            @elseif ($order->status == 'shipped')
                                <span class="flex items-center gap-2 text-purple-500 bg-purple-500/10 px-4 py-1 rounded font-sci-fi text-sm uppercase tracking-wide border border-purple-500/20">
                                    <span class="w-2 h-2 rounded-full bg-purple-500 animate-pulse"></span>
                                    Shipped
                                </span>
                            @elseif ($order->status == 'delivered')
                                <span class="text-neon-green bg-neon-green/10 px-4 py-1 rounded font-sci-fi text-sm uppercase tracking-wide border border-neon-green/20">
                                    Delivered
                                </span>
                            @elseif ($order->status == 'cancelled')
                                <span class="text-red-500 bg-red-500/10 px-4 py-1 rounded font-sci-fi text-sm uppercase tracking-wide border border-red-500/20">
                                    Cancelled
                                </span>
                            @else
                                <span class="text-gray-500 bg-gray-500/10 px-4 py-1 rounded font-sci-fi text-sm uppercase tracking-wide border border-gray-500/20">
                                    Unknown
                                </span>
                            @endif
                            
                            @if ($order->status == 'delivered')
                                <button class="hidden md:block border border-gray-600 text-white font-bold px-6 py-2 uppercase hover:bg-white hover:text-black transition font-sci-fi text-sm">
                                    View Invoice
                                </button>
                            @elseif ($order->status == 'shipped')
                                <button class="hidden md:block bg-white text-black font-bold px-6 py-2 uppercase hover:bg-neon-blue hover:text-black transition font-sci-fi text-sm">
                                    Track Order
                                </button>
                            @elseif ($order->status == 'pending')
                                <button class="hidden md:block bg-neon-green text-black font-bold px-6 py-2 uppercase hover:bg-white hover:text-black transition font-sci-fi text-sm">
                                    Pay Now
                                </button>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex -space-x-4 overflow-hidden p-2">
                            <div class="w-20 h-20 bg-gray-800 rounded-lg border border-gray-700 flex items-center justify-center relative z-10">
                                <img src="https://placehold.co/80x80/111/39FF14?text=Product" alt="Product" class="object-cover opacity-80">
                            </div>
                        </div>
                        
                        <div class="flex-grow text-center md:text-left">
                            <h3 class="text-xl font-bold text-white mb-1">Order #{{ $order->id }}</h3>
                            <p class="text-gray-400 text-sm">
                                @if ($order->status == 'pending')
                                    Payment required to process your order
                                @elseif ($order->status == 'processing')
                                    Seller is preparing your order
                                @elseif ($order->status == 'shipped')
                                    Your order is on the way
                                @elseif ($order->status == 'delivered')
                                    Order has been delivered successfully
                                @elseif ($order->status == 'cancelled')
                                    This order was cancelled
                                @else
                                    Order status unknown
                                @endif
                            </p>
                        </div>

                        <div class="text-right min-w-[120px]">
                            <div class="text-xs text-gray-500 uppercase">Total</div>
                            <div class="text-2xl font-sci-fi font-bold {{ $order->status == 'cancelled' ? 'text-gray-500 line-through' : 'text-white' }}">${{ number_format($order->total_price, 2) }}</div>
                        </div>
                    </div>

                    @if ($order->status == 'pending')
                        <button class="w-full mt-6 bg-neon-green text-black font-bold px-6 py-3 uppercase font-sci-fi text-sm">
                            Pay Now
                        </button>
                    @elseif ($order->status == 'shipped')
                        <button class="w-full mt-6 bg-white text-black font-bold px-6 py-3 uppercase font-sci-fi text-sm">
                            Track Order
                        </button>
                    @elseif ($order->status == 'delivered')
                        <button class="w-full mt-6 border border-gray-600 text-white font-bold px-6 py-3 uppercase font-sci-fi text-sm">
                            View Invoice
                        </button>
                    @endif
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
            <button class="border border-neon-green text-neon-green px-8 py-3 font-sci-fi font-bold uppercase tracking-wider hover:bg-neon-green hover:text-black transition duration-300">
                Contact Support
            </button>
        </div>

    </main>

@endsection