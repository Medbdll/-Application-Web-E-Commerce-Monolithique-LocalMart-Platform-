<div class="flex items-center justify-between bg-black/50 rounded-lg p-4 border border-gray-800">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 bg-gray-800 rounded-lg flex items-center justify-center">
            <span class="text-gray-400 text-xs">📦</span>
        </div>

        <div>
            <h4 class="text-white font-semibold flex items-center gap-2">
                {{ $orderItem->product->name ?? 'Unknown Product' }}
                
                <span @class([
                    'px-2 py-0.5 rounded text-[10px] border uppercase font-bold',
                    'bg-yellow-900/30 text-yellow-400 border-yellow-900' => $orderItem->status === 'pending',
                    'bg-blue-900/30 text-blue-400 border-blue-900'     => $orderItem->status === 'processing',
                    'bg-green-900/30 text-green-400 border-green-900'   => $orderItem->status === 'shipped',
                    'bg-purple-900/30 text-purple-400 border-purple-900'=> $orderItem->status === 'delivered',
                    'bg-red-900/30 text-red-400 border-red-900'       => $orderItem->status === 'cancelled',
                ])>
                    {{ $orderItem->status }}
                </span>
            </h4>

            <div class="flex flex-col gap-0.5 mt-1">
                <p class="text-gray-500 text-xs font-medium">Qty: {{ $orderItem->quantity }}</p>
                
                <div class="flex items-center gap-1">
                    <span class="text-gray-600 text-[10px] uppercase font-bold">Seller:</span>
                    <span class="text-vortexGreen text-xs">{{ $orderItem->product->user->name }}</span>
                </div>
            </div>

            @can('edit status order')
                <div class="mt-3">
                    <select 
                        wire:model="status"
                        wire:change="updateStatus"
                        wire:loading.attr="disabled"
                        class="bg-black border border-gray-700 text-gray-300 px-2 py-1 text-xs rounded focus:border-vortexGreen focus:outline-none transition-all disabled:opacity-50"
                    >
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>   
            @endcan
        </div>
    </div>

    <div class="text-right">
        <p class="text-white font-semibold text-lg">${{ number_format($orderItem->price, 2) }}</p>
        <p class="text-gray-600 text-[10px] uppercase">Total Price</p>
    </div>
</div>