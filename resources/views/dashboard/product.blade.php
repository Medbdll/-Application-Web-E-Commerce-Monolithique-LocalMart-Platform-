
    @extends('layouts.app')
    @section('title', 'Product')
    @section('content')
    <div class="mb-8 flex flex-col md:flex-row justify-between items-end gap-4">
        <div>
            <h2 class="text-3xl font-gaming font-bold text-white tracking-wide">Vendor Inventory</h2>
            <p class="text-gray-500 text-sm mt-1">Audit products listed by verified sellers.</p>
        </div>
        <div class="flex gap-3">
            <div class="bg-[#39FF14]/10 border border-[#39FF14] px-5 py-3 rounded-xl">
                <p class="text-[10px] text-[#39FF14] uppercase font-bold tracking-wider">Active Listings</p>
                <p class="text-2xl font-gaming font-bold text-white">8,405</p>
            </div>
            <div class="bg-purple-500/10 border border-purple-500 px-5 py-3 rounded-xl">
                <p class="text-[10px] text-purple-400 uppercase font-bold tracking-wider">Top Rated Sellers</p>
                <p class="text-2xl font-gaming font-bold text-white">142</p>
            </div>
        </div>
    </div>

    <livewire:product-table />

    @endsection
