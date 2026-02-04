@extends('layouts.app')
@section('title', 'Orders')
@section('content')
    <div class="mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-gaming font-bold text-white tracking-wide">Mission Logs <span class="text-gray-600 text-lg font-sans ml-2">/ Orders</span></h2>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-gray-900 border border-gray-800 text-gray-400 rounded-lg text-sm hover:text-white hover:border-gray-600 transition-all">Export CSV</button>
                <button class="px-4 py-2 bg-gray-900 border border-gray-800 text-gray-400 rounded-lg text-sm hover:text-white hover:border-gray-600 transition-all">Print Manifest</button>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4 mb-8">
            <div class="bg-black border border-gray-900 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs uppercase font-bold">Pending Processing</span>
                    <p class="text-2xl font-gaming text-white">24</p>
                </div>
                <div class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></div>
            </div>
            <div class="bg-black border border-gray-900 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs uppercase font-bold">Shipped Today</span>
                    <p class="text-2xl font-gaming text-[#39FF14]">18</p>
                </div>
                <div class="w-2 h-2 rounded-full bg-[#39FF14]"></div>
            </div>
            <div class="bg-black border border-gray-900 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs uppercase font-bold">Returns</span>
                    <p class="text-2xl font-gaming text-red-500">2</p>
                </div>
                <div class="w-2 h-2 rounded-full bg-red-500"></div>
            </div>
        </div>
    </div>

    <div class="flex gap-3 mb-6">
        <button class="px-4 py-1.5 rounded-full bg-[#39FF14]/10 border border-[#39FF14] text-[#39FF14] text-xs font-bold uppercase">All Orders</button>
        <button class="px-4 py-1.5 rounded-full bg-black border border-gray-800 text-gray-500 hover:border-gray-600 text-xs font-bold uppercase transition-all">Pending</button>
        <button class="px-4 py-1.5 rounded-full bg-black border border-gray-800 text-gray-500 hover:border-gray-600 text-xs font-bold uppercase transition-all">Completed</button>
        <button class="px-4 py-1.5 rounded-full bg-black border border-gray-800 text-gray-500 hover:border-gray-600 text-xs font-bold uppercase transition-all">Cancelled</button>
    </div>

    <div class="bg-black border border-gray-900 rounded-2xl overflow-hidden shadow-2xl">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-[#0f0f0f] border-b border-gray-800 text-xs text-gray-400 uppercase">
                    <th class="px-6 py-4">Order ID</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4">Customer</th>
                    <th class="px-6 py-4">Payment</th>
                    <th class="px-6 py-4">Fulfillment</th>
                    <th class="px-6 py-4">Total</th>
                    <th class="px-6 py-4 text-right">View</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-900 text-sm">
                <tr class="hover:bg-gray-900/30 transition-colors">
                    <td class="px-6 py-4 font-gaming text-[#39FF14] font-bold">#ORD-9923</td>
                    <td class="px-6 py-4 text-gray-400">Oct 24, 2024<br><span class="text-[10px] text-gray-600">10:42 AM</span></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center text-xs font-bold">JD</div>
                            <span class="text-gray-200">John Doe</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-900/30 text-green-400 border border-green-900 rounded text-[10px] font-bold uppercase tracking-wide">PAID</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-yellow-900/30 text-yellow-500 border border-yellow-900 rounded text-[10px] font-bold uppercase tracking-wide flex w-fit items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span> Processing
                        </span>
                    </td>
                    <td class="px-6 py-4 font-gaming font-bold text-lg">$1,299.00</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-500 hover:text-white transition-colors">
                            <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-gray-900/30 transition-colors">
                    <td class="px-6 py-4 font-gaming text-[#39FF14] font-bold">#ORD-9922</td>
                    <td class="px-6 py-4 text-gray-400">Oct 23, 2024<br><span class="text-[10px] text-gray-600">04:15 PM</span></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Sarah+Connor&background=222&color=fff" class="w-8 h-8 rounded-full" alt="">
                            <span class="text-gray-200">Sarah Connor</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-900/30 text-green-400 border border-green-900 rounded text-[10px] font-bold uppercase tracking-wide">PAID</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-[#39FF14]/10 text-[#39FF14] border border-[#39FF14]/30 rounded text-[10px] font-bold uppercase tracking-wide">Delivered</span>
                    </td>
                    <td class="px-6 py-4 font-gaming font-bold text-lg">$89.50</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-500 hover:text-white transition-colors">
                            <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-gray-900/30 transition-colors opacity-60">
                    <td class="px-6 py-4 font-gaming text-gray-500 font-bold">#ORD-9921</td>
                    <td class="px-6 py-4 text-gray-500">Oct 22, 2024<br><span class="text-[10px] text-gray-700">09:00 AM</span></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-xs font-bold text-gray-500">AN</div>
                            <span class="text-gray-500 line-through">Anon User</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-red-900/30 text-red-500 border border-red-900 rounded text-[10px] font-bold uppercase tracking-wide">FAILED</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-gray-800 text-gray-400 border border-gray-700 rounded text-[10px] font-bold uppercase tracking-wide">Cancelled</span>
                    </td>
                    <td class="px-6 py-4 font-gaming font-bold text-lg text-gray-500">$2,400.00</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-gray-600 hover:text-white transition-colors">
                            <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endsection