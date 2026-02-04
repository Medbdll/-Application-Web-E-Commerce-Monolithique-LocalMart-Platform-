
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  

        <header class="flex justify-between items-center mb-10 bg-black/50 p-4 rounded-2xl border border-gray-900 backdrop-blur-md sticky top-0 z-40">
            <div class="relative w-96">
                <input type="text" placeholder="Search for hardware..." class="w-full bg-[#0d0d0d] border border-gray-800 rounded-xl py-2 px-10 focus:outline-none focus:border-[#39FF14] transition-all text-sm">
                <svg class="w-4 h-4 absolute left-3 top-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="relative">
                    <button class="text-gray-400 hover:text-[#39FF14]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <span class="absolute -top-1 -right-1 bg-[#39FF14] text-black text-[10px] font-bold px-1.5 rounded-full">3</span>
                </div>
                <div class="flex items-center gap-3 pl-6 border-l border-gray-800">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold">Admin_Vortex</p>
                        <p class="text-xs text-[#39FF14]">Head Moderator</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin+Vortex&background=39FF14&color=000" class="w-10 h-10 rounded-xl neon-border" alt="Avatar">
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold uppercase">Total Sales</p>
                        <h3 class="text-3xl font-gaming font-bold mt-1">$128,430</h3>
                    </div>
                    <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <p class="text-xs text-green-400 mt-4 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"></path></svg>
                    +12.5% vs last month
                </p>
            </div>
            <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold uppercase">Active Orders</p>
                        <h3 class="text-3xl font-gaming font-bold mt-1">482</h3>
                    </div>
                    <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 11-8 0m-4 5v2m-8 0a4 4 0 100 8 4 4 0 000-8zm-4 5a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>
                <p class="text-xs text-yellow-500 mt-4">12 Pending verification</p>
            </div>
            <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold uppercase">Total Users</p>
                        <h3 class="text-3xl font-gaming font-bold mt-1">12,840</h3>
                    </div>
                    <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
                <p class="text-xs text-green-400 mt-4">+84 New today</p>
            </div>
            <div class="bg-black p-6 rounded-2xl border border-gray-900 hover:border-[#39FF14]/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold uppercase">Stock Level</p>
                        <h3 class="text-3xl font-gaming font-bold mt-1">94%</h3>
                    </div>
                    <div class="bg-[#39FF14]/10 p-3 rounded-lg text-[#39FF14] group-hover:neon-glow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                </div>
                <p class="text-xs text-red-500 mt-4">3 Items low in stock</p>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <div class="xl:col-span-2 bg-black border border-gray-900 rounded-3xl overflow-hidden shadow-2xl">
                <div class="p-6 border-b border-gray-900 flex justify-between items-center bg-gray-900/20">
                    <h2 class="text-xl font-gaming font-bold tracking-wide">Recent Acquisitions</h2>
                    <button class="text-[#39FF14] text-sm hover:underline">View All</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-gray-500 text-xs uppercase bg-[#080808]">
                                <th class="px-6 py-4">Order ID</th>
                                <th class="px-6 py-4">Customer</th>
                                <th class="px-6 py-4">Total</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-900">
                            <tr class="hover:bg-gray-900/40 transition-colors">
                                <td class="px-6 py-4 font-gaming text-[#39FF14]">#VX-9921</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gray-800 flex items-center justify-center text-xs">AM</div>
                                        <span>Alex Mercer</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold">$1,299.00</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-500/10 text-green-500 rounded-full text-[10px] font-bold border border-green-500/20">SHIPPED</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-gray-400 hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-900/40 transition-colors">
                                <td class="px-6 py-4 font-gaming text-[#39FF14]">#VX-9920</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gray-800 flex items-center justify-center text-xs">SK</div>
                                        <span>Sombra K.</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold">$349.00</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-yellow-500/10 text-yellow-500 rounded-full text-[10px] font-bold border border-yellow-500/20">PENDING</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-gray-400 hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-black border border-gray-900 rounded-3xl p-6">
                <h2 class="text-xl font-gaming font-bold mb-6 tracking-wide flex items-center gap-2">
                    <span class="w-2 h-2 bg-[#39FF14] rounded-full animate-pulse"></span>
                    Live Feed
                </h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="bg-blue-500/20 p-2 rounded-lg h-fit text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold">New inventory added</p>
                            <p class="text-xs text-gray-500">Vortex Mouse V3 Pro (x50)</p>
                            <span class="text-[10px] text-gray-600">2 min ago</span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="bg-red-500/20 p-2 rounded-lg h-fit text-red-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Security Alert</p>
                            <p class="text-xs text-gray-500">Failed login from 192.168.1.1</p>
                            <span class="text-[10px] text-gray-600">14 min ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-2xl font-gaming font-bold mb-6 italic text-[#39FF14]">Operational Hardware</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-[#0a0a0a] border border-gray-900 rounded-2xl p-4 hover:border-[#39FF14] transition-all group overflow-hidden relative">
                    <div class="aspect-video bg-gray-900 rounded-xl mb-4 flex items-center justify-center relative overflow-hidden">
                        <span class="text-gray-800 font-gaming text-4xl">VORTEX</span>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-[10px] bg-[#39FF14] text-black font-bold px-2 py-0.5 rounded">QUICK EDIT</span>
                        </div>
                    </div>
                    <h4 class="font-bold">Vortex Mouse V3 Pro</h4>
                    <p class="text-[#39FF14] font-gaming text-lg mt-1">$39.99</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xs text-gray-500">Stock: 124 units</span>
                        <div class="flex gap-2">
                            <button class="p-2 bg-gray-900 rounded-lg hover:bg-[#39FF14] hover:text-black transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                            <button class="p-2 bg-gray-900 rounded-lg hover:bg-red-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="bg-[#0a0a0a] border border-gray-900 rounded-2xl p-4 opacity-70">
                    <div class="aspect-video bg-gray-900 rounded-xl mb-4 flex items-center justify-center">
                         <span class="text-red-500 font-gaming font-bold border-2 border-red-500 px-3 py-1 -rotate-12">SOLD OUT</span>
                    </div>
                    <h4 class="font-bold">CyberGrip Keyboard</h4>
                    <p class="text-[#39FF14] font-gaming text-lg mt-1">$149.00</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xs text-red-500 font-bold uppercase">Restock required</span>
                        <button class="text-xs text-[#39FF14] hover:underline">Order More</button>
                    </div>
                </div>
            </div>
        </div>
@endsection