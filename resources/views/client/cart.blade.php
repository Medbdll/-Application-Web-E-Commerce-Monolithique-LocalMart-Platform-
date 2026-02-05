@extends('layouts.client-layout')
@section('title','Your Arsenal - Cart')
@section('content')
<main class="min-h-screen bg-black pt-12 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="mb-12">
            <h1 class="text-4xl font-display font-bold text-white uppercase tracking-wider">
                Your <span class="text-vortexGreen">Arsenal</span>
            </h1>
            <p class="text-gray-400 mt-2 text-sm uppercase tracking-widest">Ready for deployment: {{ $totalItems }} {{ $totalItems == 1 ? 'Item' : 'Items' }}</p>
        </div>

        @if(session('success'))
            <div class="bg-vortexGreen/10 border border-vortexGreen/30 text-vortexGreen px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-6">
                @if($cart->items->count() > 0)
                    @foreach($cart->items as $item)
                        <div class="bg-cardBg border border-gray-900 p-6 flex flex-col sm:flex-row items-center gap-6 group hover:border-vortexGreen/30 transition-all duration-300">
                            <div class="w-32 h-32 bg-[#0a0a0a] flex-shrink-0 flex items-center justify-center">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover rounded">
                                @else
                                    <span class="text-gray-700 text-[10px] uppercase font-bold">Image</span>
                                @endif
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-display font-bold text-white uppercase group-hover:text-vortexGreen transition">{{ $item->product->name }}</h3>
                                        <p class="text-vortexGreen text-xs font-bold uppercase mt-1">{{ $item->product->category->name ?? 'Gaming Gear' }}</p>
                                    </div>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-600 hover:text-red-500 transition">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="flex flex-wrap justify-between items-end mt-6">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center border border-gray-800 rounded-sm">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="decrementQuantity(this)" class="px-3 py-1 text-gray-400 hover:bg-gray-800 transition">-</button>
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="px-4 py-1 text-white font-bold border-x border-gray-800 bg-transparent w-16 text-center">
                                        <button type="button" onclick="incrementQuantity(this)" class="px-3 py-1 text-vortexGreen hover:bg-gray-800 transition">+</button>
                                        <button type="submit" class="hidden"></button>
                                    </form>
                                    <span class="text-2xl font-bold text-white font-display">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-cardBg border border-gray-900 p-12 text-center">
                        <i class="fa-solid fa-shopping-cart text-6xl text-gray-700 mb-4"></i>
                        <h3 class="text-xl font-display font-bold text-white uppercase mb-2">Your Arsenal is Empty</h3>
                        <p class="text-gray-400 mb-6">Start building your gaming setup</p>
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-vortexGreen text-black font-display font-black py-3 px-6 uppercase tracking-[0.2em] hover:bg-white transition-all duration-300">
                            <i class="fa-solid fa-arrow-left"></i>
                            Browse Products
                        </a>
                    </div>
                @endif

                @if($cart->items->count() > 0)
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-vortexGreen transition text-sm uppercase font-bold tracking-widest mt-4">
                        <i class="fa-solid fa-arrow-left"></i>
                        Continue Scouting Products
                    </a>
                @endif
            </div>

            @if($cart->items->count() > 0)
                <div class="lg:col-span-1">
                    <div class="bg-cardBg border border-vortexGreen/20 p-8 sticky top-32">
                        <h2 class="text-xl font-display font-bold text-white uppercase mb-8 border-b border-gray-800 pb-4">
                            Mission Summary
                        </h2>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Subtotal</span>
                                <span class="text-white">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Shipping Fees</span>
                                <span class="text-vortexGreen">{{ $shipping > 0 ? '$' . number_format($shipping, 2) : 'FREE' }}</span>
                            </div>
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Estimated Tax</span>
                                <span class="text-white">${{ number_format($tax, 2) }}</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-800 pt-6 mb-8">
                            <div class="flex justify-between items-center">
                                <span class="text-white font-display font-bold uppercase">Total Cost</span>
                                <span class="text-3xl font-display font-bold text-vortexGreen">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <button class="w-full bg-vortexGreen text-black font-display font-black py-5 uppercase tracking-[0.2em] hover:bg-white hover:scale-[1.02] transition-all duration-300 shadow-[0_0_20px_rgba(57,255,20,0.2)]">
                            Initialize Checkout
                        </button>

                        <div class="mt-8 flex flex-col gap-4">
                            <div class="flex items-center gap-3 text-[10px] text-gray-500 uppercase font-bold">
                                <i class="fa-solid fa-shield-halved text-vortexGreen text-base"></i>
                                Secure Encrypted Transaction
                            </div>
                            <div class="flex items-center gap-3 text-[10px] text-gray-500 uppercase font-bold">
                                <i class="fa-solid fa-truck-fast text-vortexGreen text-base"></i>
                                Express Delivery (3-5 Days)
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>

<script>
function incrementQuantity(button) {
    const input = button.previousElementSibling;
    const currentValue = parseInt(input.value);
    input.value = currentValue + 1;
    input.form.submit();
}

function decrementQuantity(button) {
    const input = button.nextElementSibling;
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
        input.form.submit();
    }
}
</script>
@endsection
