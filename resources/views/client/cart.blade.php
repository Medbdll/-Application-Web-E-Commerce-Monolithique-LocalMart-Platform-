@extends('layouts.client-layout')
@section('title','Cart')
@section('content')
<main class="min-h-screen bg-black pt-12 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="mb-12 animate-fade-in">
            <h1 class="text-4xl font-display font-bold text-white uppercase tracking-wider animate-slide-up">
                Your <span class="text-vortexGreen animate-pulse">Arsenal</span>
            </h1>
            <p class="text-gray-400 mt-2 text-sm uppercase tracking-widest animate-slide-up animation-delay-200">Ready for deployment: {{ $totalItems }} {{ $totalItems == 1 ? 'Item' : 'Items' }}</p>
        </div>

        @if(session('success'))
            <div class="bg-vortexGreen/10 border border-vortexGreen/30 text-vortexGreen px-4 py-3 rounded mb-6 animate-slide-down">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-6">
                @if($cart->items->count() > 0)
                    @foreach($cart->items as $item)
                        <div class="bg-cardBg border border-gray-900 p-4 sm:p-6 flex flex-col sm:flex-row items-center gap-4 sm:gap-6 group hover:border-vortexGreen/50 hover:shadow-[0_0_25px_rgba(57,255,20,0.15)] hover:shadow-vortexGreen/20 transition-all duration-500 hover:scale-[1.02] relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-vortexGreen/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="w-24 h-24 sm:w-32 sm:h-32 bg-[#0a0a0a] flex-shrink-0 flex items-center justify-center relative z-10 group-hover:scale-105 transition-transform duration-300">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover rounded group-hover:opacity-90 transition-opacity duration-300">
                                @else
                                    <span class="text-gray-700 text-[10px] uppercase font-bold group-hover:text-vortexGreen/50 transition-colors duration-300">Image</span>
                                @endif
                            </div>
                            
                            <div class="flex-1 relative z-10 w-full">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2 sm:gap-0">
                                    <div class="text-center sm:text-left">
                                        <h3 class="text-lg sm:text-xl font-display font-bold text-white uppercase group-hover:text-vortexGreen transition-all duration-300 transform group-hover:translate-x-1">{{ $item->product->name }}</h3>
                                        <p class="text-vortexGreen text-xs font-bold uppercase mt-1 opacity-80 group-hover:opacity-100 transition-opacity duration-300">{{ $item->product->category->name ?? 'Gaming Gear' }}</p>
                                    </div>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="self-center sm:self-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors duration-200">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mt-4 sm:mt-6">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center justify-center sm:justify-start border border-gray-800 rounded-sm hover:border-vortexGreen/30 transition-colors duration-300 group/quantity">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="decrementQuantity(this)" class="px-3 py-1 text-gray-400 hover:text-white hover:bg-gray-700 transition-colors duration-200">
                                            <i class="fa-solid fa-minus text-sm"></i>
                                        </button>
                                        <input type="text" name="quantity" value="{{ $item->quantity }}" min="1" max="99" pattern="[0-9]+" inputmode="numeric" class="px-3 py-1 text-white font-bold bg-gray-800 w-16 text-center focus:outline-none focus:ring-2 focus:ring-vortexGreen" onkeypress="return event.charCode >= 48 && event.charCode <= 57" oninput="validateQuantity(this)">
                                        <button type="button" onclick="incrementQuantity(this)" class="px-3 py-1 text-vortexGreen hover:text-white hover:bg-gray-700 transition-colors duration-200">
                                            <i class="fa-solid fa-plus text-sm"></i>
                                        </button>
                                        <button type="submit" class="hidden"></button>
                                    </form>
                                    <div class="text-center sm:text-right">
                                        <span class="text-xl sm:text-2xl font-bold text-white font-display group-hover:text-vortexGreen transition-colors duration-300">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-cardBg border border-gray-900 p-12 text-center hover:border-vortexGreen/30 transition-all duration-500">
                        <i class="fa-solid fa-shopping-cart text-6xl text-gray-700 mb-4 group-hover:text-vortexGreen/50 transition-colors duration-300"></i>
                        <h3 class="text-xl font-display font-bold text-white uppercase mb-2">Your Arsenal is Empty</h3>
                        <p class="text-gray-400 mb-6">Start building your gaming setup</p>
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-vortexGreen hover:bg-white text-black font-display font-bold py-3 px-6 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                            <i class="fa-solid fa-arrow-left"></i>
                            Browse Products
                        </a>
                    </div>
                @endif

                @if($cart->items->count() > 0)
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-vortexGreen transition-colors duration-300 text-sm font-medium">
                        <i class="fa-solid fa-arrow-left"></i>
                        Continue Shopping
                    </a>
                @endif
            </div>

            @if($cart->items->count() > 0)
                <div class="lg:col-span-1">
                    <div class="bg-cardBg border border-vortexGreen/20 p-4 sm:p-8 sticky top-32 hover:border-vortexGreen/40 transition-all duration-500 hover:shadow-[0_0_25px_rgba(57,255,20,0.15)]">
                        <h2 class="text-xl font-display font-bold text-white uppercase mb-8 border-b border-gray-800 pb-4">
                            Mission Summary
                        </h2>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Subtotal</span>
                                <span class="text-white">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Shipping Fees</span>
                                <span class="text-vortexGreen">FREE</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-800 pt-6 mb-8">
                            <div class="flex justify-between items-center">
                                <span class="text-white font-display font-bold uppercase">Total Cost</span>
                                <span class="text-3xl font-display font-bold text-vortexGreen">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <form action="{{ route('infoBeforeOrder' , $cart->id) }}" method="post">
                            @csrf
                        <button class="w-full bg-vortexGreen hover:bg-white text-black font-display font-bold py-4 px-6 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                            <span class="flex items-center justify-center gap-2">
                                <i class="fa-solid fa-rocket"></i>
                                Initialize Checkout
                            </span>
                        </button>
                        </form>

                        <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Are you sure you want to clear your entire cart?')" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-display font-bold py-3 px-6 rounded-lg transition-all duration-300 hover:shadow-lg">
                                <span class="flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-trash"></i>
                                    Clear Cart
                                </span>
                            </button>
                        </form>

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
    const form = button.closest('form');
    const currentValue = parseInt(input.value);
    
    // Add loading state
    button.disabled = true;
    button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
    form.style.opacity = '0.6';
    
    input.value = currentValue + 1;
    form.submit();
}

function decrementQuantity(button) {
    const input = button.nextElementSibling;
    const form = button.closest('form');
    const currentValue = parseInt(input.value);
    
    if (currentValue > 1) {
        // Add loading state
        button.disabled = true;
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
        form.style.opacity = '0.6';
        
        input.value = currentValue - 1;
        form.submit();
    }
}

// Add keyboard support for quantity input
document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('input[name="quantity"]');
    quantityInputs.forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const form = this.closest('form');
                form.style.opacity = '0.6';
                form.submit();
            }
        });
    });
});

// Validate quantity input
function validateQuantity(input) {
    const value = input.value;
    
    // Remove any non-numeric characters
    const cleanValue = value.replace(/[^0-9]/g, '');
    
    // Ensure minimum value of 1
    const finalValue = Math.max(1, parseInt(cleanValue) || 1);
    
    // Ensure maximum value of 99
    const cappedValue = Math.min(99, finalValue);
    
    input.value = cappedValue;
    
    // Add visual feedback for invalid input
    if (value !== cleanValue) {
        input.classList.add('text-red-500');
        setTimeout(() => {
            input.classList.remove('text-red-500');
        }, 500);
    }
}
</script>
@endsection
