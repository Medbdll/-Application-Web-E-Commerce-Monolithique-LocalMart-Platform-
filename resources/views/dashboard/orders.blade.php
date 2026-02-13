@extends('layouts.app')
@section('title', 'Orders')
@section('content')

    <div class="mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-gaming font-bold text-white tracking-wide">Mission Logs <span class="text-gray-600 text-lg font-sans ml-2">/ Orders</span></h2>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-gray-900 border border-gray-800 text-gray-400 rounded-lg text-sm hover:text-white hover:border-gray-600 transition-all">Print Manifest</button>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4 mb-8">
            <div class="bg-black border border-gray-900 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs uppercase font-bold">Total Orders</span>
                    <p class="text-2xl font-gaming text-white">{{ $statistics['total_orders'] ?? 0 }}</p>
                </div>
                <div class="w-2 h-2 rounded-full bg-vortexGreen animate-pulse"></div>
            </div>
            <div class="bg-black border border-gray-900 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs uppercase font-bold">Total Revenue</span>
                    <p class="text-2xl font-gaming text-white">${{ number_format($statistics['total_revenue'] ?? 0, 2) }}</p>
                </div>
                <div class="w-2 h-2 rounded-full bg-[#39FF14]"></div>
            </div>
            <div class="bg-black border border-gray-900 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs uppercase font-bold">Pending Orders</span>
                    <p class="text-2xl font-gaming text-yellow-400">{{ $statistics['pending_orders'] ?? 0 }}</p>
                </div>
                <div class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></div>
            </div>
            <div class="bg-black border border-gray-900 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs uppercase font-bold">Paid Orders</span>
                    <p class="text-2xl font-gaming text-green-400">{{ $statistics['paid_orders'] ?? 0 }}</p>
                </div>
                <div class="w-2 h-2 rounded-full bg-green-500"></div>
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
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-900 text-sm">
                
                @forelse ($orders as $order)
                @php
                    $allItemsShipped = $order->items->every(function($item) {
                        return $item->status === 'shipped' || $item->status === 'delivered';
                    });
                    
                    $hasPendingItems = $order->items->contains(function($item) {
                        return $item->status === 'pending';
                    });
                @endphp

                <tr class="hover:bg-gray-900/30 transition-colors">
                    <td class="px-6 py-4 font-gaming text-[#39FF14] font-bold">#ORD-{{ $order->id }}</td>
                    <td class="px-6 py-4 text-gray-400">{{ $order->created_at->format('F j, Y') }}<br><span class="text-[10px] text-gray-600">{{ $order->created_at->format('h:i A') }}</span></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            {{-- <img src="https://ui-avatars.com/api/?name={{ $order->user->name }}&background=222&color=fff" class="w-8 h-8 rounded-full" alt=""> --}}
                            <span class="text-gray-200">{{ $order->user?->name ?? 'Unknown User' }}</span>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-900/30 text-green-400 border border-green-900 rounded text-[10px] font-bold uppercase tracking-wide">{{ $order->payment_status }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @can('editStatus', $order)
                            <div class="text-xs text-gray-400">
                                @if($allItemsShipped)
                                    <span class="text-green-400">All items shipped</span>
                                @elseif($hasPendingItems)
                                    <span class="text-yellow-400">Some items pending</span>
                                @else
                                    <span class="text-gray-400">Mixed status</span>
                                @endif
                            </div>
                        @else

                            @if($allItemsShipped)
                                <span class="text-green-400">All items shipped</span>
                            @elseif($hasPendingItems)
                                <span class="text-yellow-400">Some items pending</span>
                            @else
                                <span class="text-gray-400">Mixed status</span>
                            @endif
                            
                        @endcan
                    </td>
                    <td class="px-6 py-4 font-gaming font-bold text-lg">${{ number_format($order->total_price ?? 0, 2) }}</td>
                    
                </tr>
                
                <!-- Order Items Row -->
                <tr class="bg-gray-900/20">
                    <td colspan="6" class="px-6 py-0">
                        <div class="overflow-hidden">
                            <button onclick="toggleOrderItems({{ $order->id }})" class="w-full px-6 py-3 text-left text-xs text-gray-500 hover:text-gray-300 transition-colors flex items-center justify-between">
                                <span class="font-bold uppercase">View Items ({{ $order->items->count() }})</span>
                                <svg id="arrow-{{ $order->id }}" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="items-{{ $order->id }}" class="hidden border-t border-gray-800">
                                <div class="p-6 space-y-4">
                                    @foreach($order->items as $item)
                                        <livewire:order-item-status :item-id="$item->id" />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="text-gray-500">
                            <div class="text-4xl mb-4">📦</div>
                            <h3 class="text-lg font-semibold text-white mb-2">No orders found</h3>
                            <p class="text-sm">You don't have any orders to manage yet.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if($orders->hasPages())
        <div class="mt-6 flex justify-center">
            <div class="bg-black border border-gray-900 rounded-lg p-2 flex items-center gap-1">
                {{-- Previous Button --}}
                @if($orders->onFirstPage())
                    <span class="px-3 py-1 text-gray-600 text-xs font-sci-fi uppercase">Previous</span>
                @else
                    <a href="{{ $orders->previousPageUrl() }}" 
                       class="px-3 py-1 text-gray-400 hover:text-vortexGreen hover:bg-gray-800 text-xs font-sci-fi uppercase transition-all rounded">
                        Previous
                    </a>
                @endif
                
                {{-- Page Numbers --}}
                @foreach($orders->links('components.pagination-links') as $link)
                    {!! $link !!}
                @endforeach
                
                {{-- Next Button --}}
                @if($orders->hasMorePages())
                    <a href="{{ $orders->nextPageUrl() }}" 
                       class="px-3 py-1 text-gray-400 hover:text-vortexGreen hover:bg-gray-800 text-xs font-sci-fi uppercase transition-all rounded">
                        Next
                    </a>
                @else
                    <span class="px-3 py-1 text-gray-600 text-xs font-sci-fi uppercase">Next</span>
                @endif
            </div>
        </div>
        
        <!-- Results Info -->
        <div class="mt-4 text-center">
            <p class="text-gray-500 text-xs font-sci-fi">
                Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() ?? 0 }} of {{ $orders->total() }} orders
            </p>
        </div>
    @endif
    @endsection

<script>
document.addEventListener('livewire:load', function () {
        $
    });

function toggleOrderItems(orderId) {
    const itemsDiv = document.getElementById(`items-${orderId}`);
    const arrow = document.getElementById(`arrow-${orderId}`);
    
    if (itemsDiv.classList.contains('hidden')) {
        itemsDiv.classList.remove('hidden');
        arrow.classList.add('rotate-180');
    } else {
        itemsDiv.classList.add('hidden');
        arrow.classList.remove('rotate-180');
    }
}

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg font-sci-fi text-sm uppercase tracking-wider z-50 ${
        type === 'success' ? 'bg-green-600 text-white' : 'bg-red-600 text-white'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>