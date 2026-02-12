@extends('layouts.client-layout')
@section('title', 'Payment Successful')
@section('content')
<div class="min-h-screen bg-black flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-black border border-gray-800 rounded-2xl p-8 text-center">
            <!-- Success Icon -->
            <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <!-- Success Message -->
            @if(isset($error))
                <h1 class="text-3xl font-gaming font-bold text-red-400 mb-4">Payment Error</h1>
                <p class="text-red-400 mb-8">{{ $error }}</p>
            @else
                <h1 class="text-3xl font-gaming font-bold text-white mb-4">Payment Successful!</h1>
                <p class="text-gray-400 mb-8">Your order has been successfully processed and payment has been confirmed.</p>
            @endif
            
            <!-- Order Details -->
            <div class="bg-gray-900/50 rounded-lg p-4 mb-6 text-left">
                <h3 class="text-white font-semibold mb-3">Order Details</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Session ID:</span>
                        <span class="text-[#39FF14] font-mono">{{ $sessionId ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Status:</span>
                        <span class="text-green-400">Completed</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Date:</span>
                        <span class="text-gray-300">{{ now()->format('F j, Y - g:i A') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="space-y-3">
                <a href="{{ route('order.index') }}" class="w-full bg-[#39FF14] text-black px-6 py-3 font-sci-fi text-sm uppercase font-bold hover:bg-[#39FF14]/80 transition-all rounded-lg text-center block">
                    View Orders
                </a>
                <a href="{{ route('dashboard') }}" class="w-full bg-black border border-gray-700 text-gray-300 px-6 py-3 font-sci-fi text-sm uppercase font-bold hover:border-gray-600 transition-all rounded-lg text-center block">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
