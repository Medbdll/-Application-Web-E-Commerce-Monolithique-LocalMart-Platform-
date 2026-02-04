@extends('layouts.app')
@section('title', 'Users')
@section('content')

    <div class="mb-8 flex flex-col md:flex-row justify-between items-end gap-4">
        <div>
            <h2 class="text-3xl font-gaming font-bold text-white tracking-wide">User Database</h2>
            <p class="text-gray-500 text-sm mt-1">Manage accounts, permissions, and security status.</p>
        </div>
        <button class="bg-[#39FF14] text-black font-bold py-2.5 px-6 rounded-lg hover:shadow-[0_0_20px_rgba(57,255,20,0.4)] transition-all flex items-center gap-2 uppercase tracking-wider text-xs">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Create Account
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-black border border-gray-900 p-5 rounded-xl flex items-center gap-4">
            <div class="p-3 bg-blue-500/10 rounded-lg text-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Total Users</p>
                <p class="text-2xl font-gaming font-bold text-white">12,842</p>
            </div>
        </div>
        <div class="bg-black border border-gray-900 p-5 rounded-xl flex items-center gap-4">
            <div class="p-3 bg-purple-500/10 rounded-lg text-purple-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Active Sellers</p>
                <p class="text-2xl font-gaming font-bold text-white">845</p>
            </div>
        </div>
        <div class="bg-black border border-gray-900 p-5 rounded-xl flex items-center gap-4">
            <div class="p-3 bg-red-500/10 rounded-lg text-red-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Banned Accounts</p>
                <p class="text-2xl font-gaming font-bold text-white">23</p>
            </div>
        </div>
    </div>

    <div class="bg-[#0a0a0a] border border-gray-900 p-4 rounded-xl mb-6 flex flex-wrap gap-4 items-center">
        <div class="relative flex-1 min-w-[250px]">
            <input type="text" placeholder="Search Username, Email or ID..." class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg pl-10 pr-4 py-2 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-600 text-sm">
            <svg class="w-4 h-4 text-gray-600 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 text-sm focus:border-[#39FF14] focus:outline-none">
            <option>All Roles</option>
            <option>Buyers</option>
            <option>Sellers</option>
            <option>Admins</option>
        </select>
        <select class="bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 text-sm focus:border-[#39FF14] focus:outline-none">
            <option>Status: All</option>
            <option>Active</option>
            <option>Suspended</option>
            <option>Banned</option>
        </select>
    </div>

    <div class="bg-black border border-gray-900 rounded-2xl overflow-hidden shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#0f0f0f] text-gray-500 text-[10px] uppercase tracking-widest border-b border-gray-800">
                    <th class="p-5 font-medium">User Profile</th>
                    <th class="p-5 font-medium">Role</th>
                    <th class="p-5 font-medium">Activity Stats</th>
                    <th class="p-5 font-medium">Status</th>
                    <th class="p-5 font-medium">Joined</th>
                    <th class="p-5 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-900 text-sm">
                
                <tr class="group hover:bg-gray-900/30 transition-colors">
                    <td class="p-5">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Admin+Vortex&background=39FF14&color=000" class="w-10 h-10 rounded-xl border border-[#39FF14]/50" alt="Admin">
                            <div>
                                <p class="font-bold text-white flex items-center gap-2">
                                    Vortex_Admin 
                                    <svg class="w-3 h-3 text-[#39FF14]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </p>
                                <p class="text-xs text-gray-500">admin@vortex.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-5">
                        <span class="inline-block px-2 py-1 rounded bg-[#39FF14]/20 text-[#39FF14] border border-[#39FF14]/30 text-[10px] font-bold uppercase">
                            Super Admin
                        </span>
                    </td>
                    <td class="p-5">
                        <p class="text-gray-400 text-xs">Access Level: <span class="text-white font-bold">Root</span></p>
                        <p class="text-gray-500 text-[10px]">Last login: 2 mins ago</p>
                    </td>
                    <td class="p-5">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#39FF14] shadow-[0_0_10px_#39FF14]"></span>
                            <span class="text-[#39FF14] text-xs font-bold">Online</span>
                        </div>
                    </td>
                    <td class="p-5 text-gray-500 text-xs">Jan 01, 2024</td>
                    <td class="p-5 text-right">
                        <button class="text-gray-600 cursor-not-allowed">
                            <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </button>
                    </td>
                </tr>

                <tr class="group hover:bg-gray-900/30 transition-colors">
                    <td class="p-5">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Cyber+Deals&background=7c3aed&color=fff" class="w-10 h-10 rounded-xl border border-purple-500/30" alt="Seller">
                            <div>
                                <p class="font-bold text-gray-200">CyberDeals_Official</p>
                                <p class="text-xs text-gray-500">sales@cyberdeals.net</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-5">
                        <span class="inline-block px-2 py-1 rounded bg-purple-500/20 text-purple-400 border border-purple-500/30 text-[10px] font-bold uppercase">
                            Verified Seller
                        </span>
                    </td>
                    <td class="p-5">
                        <p class="text-gray-400 text-xs">Total Revenue: <span class="text-white font-bold font-gaming">$42,390</span></p>
                        <p class="text-gray-500 text-[10px]">Products: 156</p>
                    </td>
                    <td class="p-5">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span class="text-green-500 text-xs font-bold">Active</span>
                        </div>
                    </td>
                    <td class="p-5 text-gray-500 text-xs">Mar 12, 2024</td>
                    <td class="p-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-gray-400 hover:text-[#39FF14] p-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                            <button class="text-gray-400 hover:text-red-500 p-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg></button>
                        </div>
                    </td>
                </tr>

                <tr class="group hover:bg-gray-900/30 transition-colors">
                    <td class="p-5">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Alex+M&background=2563eb&color=fff" class="w-10 h-10 rounded-xl border border-blue-500/30" alt="Buyer">
                            <div>
                                <p class="font-bold text-gray-200">NoobSlayer99</p>
                                <p class="text-xs text-gray-500">alex.m@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-5">
                        <span class="inline-block px-2 py-1 rounded bg-blue-500/20 text-blue-400 border border-blue-500/30 text-[10px] font-bold uppercase">
                            Gamer
                        </span>
                    </td>
                    <td class="p-5">
                        <p class="text-gray-400 text-xs">Total Spent: <span class="text-white font-bold font-gaming">$1,204</span></p>
                        <p class="text-gray-500 text-[10px]">Orders: 12</p>
                    </td>
                    <td class="p-5">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-gray-500"></span>
                            <span class="text-gray-500 text-xs font-bold">Offline</span>
                        </div>
                    </td>
                    <td class="p-5 text-gray-500 text-xs">Aug 24, 2024</td>
                    <td class="p-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-gray-400 hover:text-[#39FF14] p-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                            <button class="text-gray-400 hover:text-red-500 p-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg></button>
                        </div>
                    </td>
                </tr>

                <tr class="group hover:bg-gray-900/30 transition-colors opacity-70">
                    <td class="p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-red-900/20 border border-red-500/50 flex items-center justify-center text-red-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-red-400 line-through">Troll_Account_1</p>
                                <p class="text-xs text-red-500/50">ID: 882190</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-5">
                        <span class="inline-block px-2 py-1 rounded bg-red-500/20 text-red-500 border border-red-500/30 text-[10px] font-bold uppercase">
                            Banned
                        </span>
                    </td>
                    <td class="p-5">
                        <p class="text-gray-400 text-xs">Reports: <span class="text-red-500 font-bold">15 Flags</span></p>
                        <p class="text-gray-500 text-[10px]">Refunds: 4</p>
                    </td>
                    <td class="p-5">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-red-600"></span>
                            <span class="text-red-600 text-xs font-bold">Suspended</span>
                        </div>
                    </td>
                    <td class="p-5 text-gray-500 text-xs">Oct 10, 2024</td>
                    <td class="p-5 text-right">
                        <div class="flex justify-end gap-2">
                             <button class="text-xs text-gray-400 hover:text-white border border-gray-700 px-2 py-1 rounded">Unban</button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
        
        <div class="p-4 border-t border-gray-900 flex justify-between items-center text-xs text-gray-500">
            <span>Showing 1-4 of 12,842 users</span>
            <div class="flex gap-1">
                <button class="px-3 py-1 bg-gray-900 rounded hover:text-white">Prev</button>
                <button class="px-3 py-1 bg-[#39FF14] text-black font-bold rounded">1</button>
                <button class="px-3 py-1 bg-gray-900 rounded hover:text-white">2</button>
                <button class="px-3 py-1 bg-gray-900 rounded hover:text-white">...</button>
                <button class="px-3 py-1 bg-gray-900 rounded hover:text-white">Next</button>
            </div>
        </div>
    </div>
@endsection