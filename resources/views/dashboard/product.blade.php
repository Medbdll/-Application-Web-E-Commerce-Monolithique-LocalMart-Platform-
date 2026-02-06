
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

    <div class="bg-[#0a0a0a] border border-gray-900 p-4 rounded-xl mb-6 grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
        <div class="md:col-span-5 relative">
            <input type="text" placeholder="Search by Product Name, SKU, or Seller..." class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg pl-10 pr-4 py-2.5 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all text-sm">
            <svg class="w-4 h-4 text-gray-600 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>

        <div class="md:col-span-3">
            <select class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2.5 text-sm focus:border-[#39FF14] focus:outline-none">
                <option>All Categories</option>
                <option>Gaming Laptops</option>
                <option>GPUs</option>
                <option>Peripherals</option>
            </select>
        </div>

        <div class="md:col-span-3">
             <select class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2.5 text-sm focus:border-[#39FF14] focus:outline-none">
                <option>All Seller Tiers</option>
                <option>Official Brand (Verified)</option>
                <option>Pro Seller</option>
                <option>Community Seller</option>
            </select>
        </div>

        <div class="md:col-span-1 text-right">
             <button class="p-2.5 bg-gray-900 border border-gray-700 hover:border-[#39FF14] hover:text-[#39FF14] text-gray-400 rounded-lg transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            </button>
        </div>
    </div>

    <x-product-table :products="$products"/>

    @endsection
