@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="mb-8 flex flex-col md:flex-row justify-between items-end gap-4">
        <div>
            <h2 class="text-3xl font-gaming font-bold text-white tracking-wide">Vendor Inventory</h2>
            <p class="text-gray-500 text-sm mt-1">Audit products listed by verified sellers.</p>
        </div>

        @if(auth()->user()->hasRole('seller'))
            <button onclick ="Livewire.dispatch('openProductModal')"
                class="bg-[#39FF14] text-black font-bold py-2.5 px-6 rounded-lg hover:shadow-[0_0_20px_rgba(57,255,20,0.4)] transition-all flex items-center gap-2 uppercase tracking-wider text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                    </path>
                </svg>
                Create Product
            </button>
        @endif


    </div>


    <livewire:product-form />
    <livewire:product-table/>

@endsection


