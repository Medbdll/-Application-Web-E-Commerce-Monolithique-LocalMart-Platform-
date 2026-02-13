@extends('layouts.client-layout')
@section('title', 'Payment Cancelled')
@section('content')
<div class="min-h-screen bg-black flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-black border border-gray-800 rounded-2xl p-8 text-center">
            <!-- Cancel Icon -->
            <div class="w-20 h-20 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            
            <!-- Cancel Message -->
            <h1 class="text-3xl font-gaming font-bold text-white mb-4">Payment Cancelled</h1>
            <p class="text-gray-400 mb-8">Your payment has been cancelled. No charges were made to your account.</p>
            
            <!-- Information Box -->
            <div class="bg-gray-900/50 rounded-lg p-4 mb-6 text-left">
                <h3 class="text-white font-semibold mb-3">What happens next?</h3>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li class="flex items-start">
                        <span class="text-[#39FF14] mr-2">•</span>
                        <span>Your order remains in pending status</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#39FF14] mr-2">•</span>
                        <span>You can retry payment anytime from your orders page</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#39FF14] mr-2">•</span>
                        <span>Your cart items are preserved</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#39FF14] mr-2">•</span>
                        <span>No payment information was saved</span>
                    </li>
                </ul>
            </div>
            
            <!-- Action Buttons -->
            <div class="space-y-3">
                <a href="{{ route('order.index') }}" class="w-full bg-[#39FF14] text-black px-6 py-3 font-sci-fi text-sm uppercase font-bold hover:bg-[#39FF14]/80 transition-all rounded-lg text-center block">
                    View Orders
                </a>
                <a href="{{ route('dashboard') }}" class="w-full bg-black border border-gray-700 text-gray-300 px-6 py-3 font-sci-fi text-sm uppercase font-bold hover:border-gray-600 transition-all rounded-lg text-center block">
                    Back to Dashboard
                </a>
                <a href="{{ route('cart.show') }}" class="w-full bg-gray-800 text-gray-300 px-6 py-3 font-sci-fi text-sm uppercase font-bold hover:bg-gray-700 transition-all rounded-lg text-center block">
                    View Cart
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
