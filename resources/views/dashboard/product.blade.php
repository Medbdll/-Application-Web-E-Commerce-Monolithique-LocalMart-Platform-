
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

    <div class="bg-black border border-gray-900 rounded-2xl overflow-hidden shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#0f0f0f] text-gray-500 text-[10px] uppercase tracking-widest border-b border-gray-800">
                    <th class="p-5 font-medium w-[35%]">Product Details</th>
                    <th class="p-5 font-medium w-[25%] text-purple-400">Seller Profile</th>
                    <th class="p-5 font-medium w-[15%]">Price & Stock</th>
                    <th class="p-5 font-medium w-[15%]">Listing Status</th>
                    <th class="p-5 font-medium w-[10%] text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-900 text-sm">
                
                <tr class="group hover:bg-gray-900/30 transition-colors">
                    <td class="p-5 align-top">
                        <div class="flex items-start gap-4">
                            <div class="w-16 h-16 bg-gray-800 rounded-lg border border-gray-700 flex-shrink-0 relative overflow-hidden group-hover:border-[#39FF14] transition-colors">
                                <div class="absolute inset-0 flex items-center justify-center text-gray-600 text-[9px] font-bold">IMG</div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-200 text-sm group-hover:text-[#39FF14] transition-colors">Alienware m18 Gaming Laptop</h3>
                                <p class="text-[11px] text-gray-500 font-mono mt-0.5">SKU: AW-M18-R1</p>
                                <div class="flex gap-2 mt-2">
                                    <span class="text-[10px] bg-gray-800 border border-gray-700 px-2 py-0.5 rounded text-gray-300">Laptops</span>
                                    <span class="text-[10px] bg-gray-800 border border-gray-700 px-2 py-0.5 rounded text-gray-300">High Performance</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="flex items-start gap-3">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name=Dell+Official&background=7c3aed&color=fff" class="w-10 h-10 rounded-full border-2 border-purple-500" alt="Seller">
                                <div class="absolute -bottom-1 -right-1 bg-purple-600 border border-black text-[8px] px-1.5 rounded-full text-white font-bold flex items-center gap-0.5">
                                    <svg class="w-2 h-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    OFFICIAL
                                </div>
                            </div>
                            <div>
                                <p class="font-bold text-gray-200 text-sm">Dell Gaming</p>
                                <p class="text-[11px] text-purple-400 font-medium">Verified Partner</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <div class="flex text-yellow-500 text-[10px]">★★★★★</div>
                                    <span class="text-[10px] text-gray-500">(2.4k sales)</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="font-gaming">
                            <p class="text-xl font-bold text-white">$2,499.00</p>
                            <p class="text-[11px] text-gray-500 mt-1">Retail Price</p>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-between text-[10px] text-gray-400 mb-1">
                                <span>Stock: 45</span>
                                <span class="text-green-500">Healthy</span>
                            </div>
                            <div class="w-full h-1 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-[#39FF14] w-[60%]"></div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold uppercase bg-green-900/10 text-green-400 border border-green-900/40">
                            <span class="relative flex h-2 w-2">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                            Active
                        </span>
                        <p class="text-[10px] text-gray-600 mt-2">Listed: 2 days ago</p>
                    </td>

                    <td class="p-5 align-top text-right">
                        <button class="text-gray-400 hover:text-white mb-2 block w-full text-right transition-colors">
                            <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button class="text-red-500 hover:text-red-400 text-[10px] font-bold uppercase hover:underline">
                            Suspend
                        </button>
                    </td>
                </tr>

                <tr class="group hover:bg-gray-900/30 transition-colors">
                    <td class="p-5 align-top">
                        <div class="flex items-start gap-4">
                             <div class="w-16 h-16 bg-gray-800 rounded-lg border border-gray-700 flex-shrink-0 relative overflow-hidden group-hover:border-[#39FF14] transition-colors">
                                <div class="absolute inset-0 flex items-center justify-center text-gray-600 text-[9px] font-bold">IMG</div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-200 text-sm group-hover:text-[#39FF14] transition-colors">Used GTX 1080 Ti</h3>
                                <p class="text-[11px] text-gray-500 font-mono mt-0.5">SKU: NV-1080-USED</p>
                                <div class="flex gap-2 mt-2">
                                    <span class="text-[10px] bg-gray-800 border border-gray-700 px-2 py-0.5 rounded text-gray-300">GPU</span>
                                    <span class="text-[10px] bg-yellow-900/20 border border-yellow-900/40 text-yellow-500 px-2 py-0.5 rounded">Pre-Owned</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="flex items-start gap-3">
                            <div class="relative">
                                <div class="w-10 h-10 rounded-full border-2 border-gray-600 bg-gray-800 flex items-center justify-center text-xs font-bold text-gray-400">GS</div>
                            </div>
                            <div>
                                <p class="font-bold text-gray-300 text-sm">GamerSteve88</p>
                                <p class="text-[11px] text-gray-500 font-medium">Community Seller</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <div class="flex text-yellow-500 text-[10px]">★★★★☆</div>
                                    <span class="text-[10px] text-gray-500">(12 sales)</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="font-gaming">
                            <p class="text-xl font-bold text-white">$180.00</p>
                            <p class="text-[11px] text-gray-500 mt-1">Listing Price</p>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-between text-[10px] text-gray-400 mb-1">
                                <span>Stock: 1</span>
                                <span class="text-yellow-500">Low</span>
                            </div>
                            <div class="w-full h-1 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-yellow-500 w-[100%]"></div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold uppercase bg-yellow-900/10 text-yellow-500 border border-yellow-900/40">
                             <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                            Reviewing
                        </span>
                        <p class="text-[10px] text-gray-600 mt-2">Listed: 1 hour ago</p>
                    </td>

                    <td class="p-5 align-top text-right">
                        <button class="text-gray-400 hover:text-white mb-2 block w-full text-right transition-colors">
                            <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <button class="text-gray-500 hover:text-white text-[10px] font-bold uppercase hover:underline">
                            Approve
                        </button>
                    </td>
                </tr>

                 <tr class="group hover:bg-gray-900/30 transition-colors opacity-60">
                    <td class="p-5 align-top">
                        <div class="flex items-start gap-4">
                             <div class="w-16 h-16 bg-gray-800 rounded-lg border border-gray-700 flex-shrink-0 relative overflow-hidden">
                                <div class="absolute inset-0 flex items-center justify-center text-gray-600 text-[9px] font-bold">IMG</div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-400 text-sm line-through">Suspicious Key Code</h3>
                                <p class="text-[11px] text-gray-500 font-mono mt-0.5">SKU: ???-???</p>
                                <div class="flex gap-2 mt-2">
                                    <span class="text-[10px] bg-red-900/20 border border-red-900/40 text-red-500 px-2 py-0.5 rounded">Digital</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="flex items-start gap-3">
                            <div class="relative">
                                <div class="w-10 h-10 rounded-full border-2 border-red-900 bg-gray-800 flex items-center justify-center text-xs font-bold text-red-500">X</div>
                            </div>
                            <div>
                                <p class="font-bold text-red-400 text-sm">Banned User</p>
                                <p class="text-[11px] text-red-500/70 font-medium">Flagged Account</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <div class="flex text-gray-700 text-[10px]">☆☆☆☆☆</div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="font-gaming">
                            <p class="text-xl font-bold text-gray-500">$5.00</p>
                            <p class="text-[11px] text-gray-600 mt-1">Listing Price</p>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-between text-[10px] text-gray-500 mb-1">
                                <span>Stock: 0</span>
                                <span class="text-red-500">Frozen</span>
                            </div>
                            <div class="w-full h-1 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-red-900 w-full"></div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold uppercase bg-red-900/10 text-red-500 border border-red-900/40">
                             <span class="w-2 h-2 rounded-full bg-red-500"></span>
                            Suspended
                        </span>
                        <p class="text-[10px] text-red-400 mt-2">Reason: Fraud</p>
                    </td>

                    <td class="p-5 align-top text-right">
                        <button class="text-gray-500 cursor-not-allowed text-[10px] font-bold uppercase">
                            No Action
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    @endsection