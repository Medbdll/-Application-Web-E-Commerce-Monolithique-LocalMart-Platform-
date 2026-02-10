@extends('layouts.client-layout')
@section('title','infos confirmation')
@section('content')
<main class="min-h-screen bg-black pt-12 pb-24">
    <div class="max-w-5xl mx-auto px-6">
        
        <div class="mb-12">
            <h1 class="text-4xl font-display font-bold text-white uppercase tracking-wider">
                Confirm <span class="text-vortexGreen">Deployment</span>
            </h1>
            <p class="text-gray-400 mt-2 text-sm uppercase tracking-widest">Verify your coordinates and order details before finalizing.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
            
            {{-- Left side: User Info --}}
            <div class="lg:col-span-3">
                <div class="bg-card-bg border border-gray-800 p-8 h-full">
                    <h3 class="font-sci-fi text-2xl font-bold mb-8 flex items-center gap-3">
                        <span class="w-2 h-6 bg-vortexGreen"></span>
                        Shipping Protocol
                    </h3>

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Pilot Name</label>
                                <p class="w-full bg-black border border-gray-800 px-4 py-3 text-white rounded-sm">{{ $user->name }}</p>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Contact Email</label>
                                <p class="w-full bg-black border border-gray-800 px-4 py-3 text-white rounded-sm">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Shipping Address</label>
                            <p class="w-full bg-black border border-gray-800 px-4 py-3 text-white rounded-sm">{{ $address->address_line1 ?? 'Please add an address in your profile' }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">City</label>
                                <p class="w-full bg-black border border-gray-800 px-4 py-3 text-white rounded-sm">{{ $address->city ?? 'N/A' }}</p>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Zip Code</label>
                                <p class="w-full bg-black border border-gray-800 px-4 py-3 text-white rounded-sm">{{ $address->postal_code ?? 'N/A' }}</p>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Phone</label>
                                <p class="w-full bg-black border border-gray-800 px-4 py-3 text-white rounded-sm">{{ $address->phone ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="pt-6 text-right">
                            <a href="{{ route('profile.edit') }}" class="text-sm font-sci-fi uppercase tracking-widest text-gray-400 hover:text-vortexGreen transition">
                                Edit Information <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right side: Order Summary --}}
            <div class="lg:col-span-2">
                <div class="bg-cardBg border border-vortexGreen/20 p-8 sticky top-32">
                    <h2 class="text-xl font-display font-bold text-white uppercase mb-8 border-b border-gray-800 pb-4">
                        Mission Summary
                    </h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-gray-400 text-sm">
                            <span>Subtotal</span>
                            <span class="text-white">${{ $cart->total }}</span>
                        </div>
                        <div class="flex justify-between text-gray-400 text-sm">
                            <span>Shipping Fees</span>
                            <span class="text-vortexGreen">FREE</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-800 pt-6 mb-8">
                        <div class="flex justify-between items-center">
                            <span class="text-white font-display font-bold uppercase">Total Cost</span>
                            <span class="text-3xl font-display font-bold text-vortexGreen">${{ $cart->total }}</span>
                        </div>
                    </div>

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-vortexGreen hover:bg-white text-black font-display font-bold py-4 px-6 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                            <span class="flex items-center justify-center gap-2">
                                <i class="fa-solid fa-rocket"></i>
                                Confirm & Place Order
                            </span>
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('cart.index') }}" class="text-gray-500 hover:text-white text-sm transition">
                            <i class="fa-solid fa-arrow-left mr-2"></i> Back to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection



