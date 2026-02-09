<div>
    <div class="bg-[#0a0a0a] border border-gray-900 p-4 rounded-xl mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <input wire:model.live="search" type="text" placeholder="Search by Product Name, SKU, or Seller..."
               class="md:col-span-2 w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2.5 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all text-sm">

        <select wire:model.live="category"
                class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2.5 text-sm focus:border-[#39FF14] focus:outline-none">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
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
            @forelse($products as $product)
                <tr class="group hover:bg-gray-900/30 transition-colors {{ $product->status === 'suspended' ? 'opacity-60' : '' }}">
                    <td class="p-5 align-top">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-16 h-16 bg-gray-800 rounded-lg border border-gray-700 flex-shrink-0 relative overflow-hidden group-hover:border-[#39FF14] transition-colors">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-gray-600 text-[9px] font-bold">
                                        IMG
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-200 text-sm group-hover:text-[#39FF14] transition-colors {{ $product->status === 'suspended' ? 'line-through text-gray-400' : '' }}">{{ $product->name }}</h3>
                                <p class="text-[11px] text-gray-500 font-mono mt-0.5">SKU: {{ $product->sku }}</p>
                                <div class="flex gap-2 mt-2">
                                    @if($product->category)
                                        <span
                                            class="text-[10px] bg-gray-800 border border-gray-700 px-2 py-0.5 rounded text-gray-300">{{ $product->category }}</span>
                                    @endif
                                    @if($product->condition)
                                        <span
                                            class="text-[10px] bg-{{ $product->condition === 'Pre-Owned' ? 'yellow' : 'gray' }}-900/20 border border-{{ $product->condition === 'Pre-Owned' ? 'yellow' : 'gray' }}-900/40 text-{{ $product->condition === 'Pre-Owned' ? 'yellow' : 'gray' }}-500 px-2 py-0.5 rounded">{{ $product->condition }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="flex items-start gap-3">
                            <div class="relative">
                                @if($product->seller_avatar)
                                    <img src="{{ $product->seller_avatar }}"
                                         class="w-10 h-10 rounded-full border-2 border-{{ $product->seller_verified ? 'purple' : 'gray' }}-{{ $product->seller_verified ? '500' : '600' }}"
                                         alt="{{ $product->seller_name }}">
                                @else
                                    <div
                                        class="w-10 h-10 rounded-full border-2 border-gray-600 bg-gray-800 flex items-center justify-center text-xs font-bold text-gray-400">{{ strtoupper(substr($product->seller_name, 0, 2)) }}</div>
                                @endif
                                @if($product->seller_verified)
                                    <div
                                        class="absolute -bottom-1 -right-1 bg-purple-600 border border-black text-[8px] px-1.5 rounded-full text-white font-bold flex items-center gap-0.5">
                                        <svg class="w-2 h-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        OFFICIAL
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="font-bold text-gray-200 text-sm">{{ $product->seller_name }}</p>
                                <p class="text-[11px] text-{{ $product->seller_verified ? 'purple' : 'gray' }}-{{ $product->seller_verified ? '400' : '500' }} font-medium">{{ $product->seller_type }}</p>
                                @if(auth()->user()->hasRole('admin'))
                                    <button wire:click="toggleVerified({{ $product->seller_id }})"
                                            class="text-[10px] bg-gray-800 border border-gray-700 text-gray-300 rounded px-2 py-1 mt-1 hover:bg-gray-700">
                                        {{ $product->seller_verified ? 'Unverify' : 'Verify' }}
                                    </button>
                                @endif
                                <div class="flex items-center gap-1 mt-1">
                                    <div
                                        class="flex text-yellow-500 text-[10px]">{!! str_repeat('★', $product->seller_rating) . str_repeat('☆', 5 - $product->seller_rating) !!}</div>
                                    <span class="text-[10px] text-gray-500">({{ $product->seller_sales }} sales)</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        <div class="font-gaming">
                            <p class="text-xl font-bold text-white">${{ number_format($product->price, 2) }}</p>
                            <p class="text-[11px] text-gray-500 mt-1">{{ $product->price_type ?? 'Price' }}</p>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-between text-[10px] text-gray-400 mb-1">
                                <span>Stock: {{ $product->stock }}</span>
                                <span
                                    class="text-{{ $product->stock > 20 ? 'green' : ($product->stock > 5 ? 'yellow' : 'red') }}-500">{{ $product->stock > 20 ? 'Healthy' : ($product->stock > 5 ? 'Low' : 'Critical') }}</span>
                            </div>
                            <div class="w-full h-1 bg-gray-800 rounded-full overflow-hidden">
                                <div
                                    class="h-full bg-{{ $product->stock > 20 ? '[#39FF14]' : ($product->stock > 5 ? 'yellow-500' : 'red-500') }} w-[{{ min(100, $product->stock * 2) }}%]"></div>
                            </div>
                        </div>
                    </td>

                    <td class="p-5 align-top">
                        @if($product->status === 'active')
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold uppercase bg-green-900/10 text-green-400 border border-green-900/40">
                                <span class="relative flex h-2 w-2">
                                  <span
                                      class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                </span>
                                Active
                            </span>
                        @elseif($product->status === 'reviewing')
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold uppercase bg-yellow-900/10 text-yellow-500 border border-yellow-900/40">
                                 <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                                Reviewing
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold uppercase bg-red-900/10 text-red-500 border border-red-900/40">
                                 <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                {{ ucfirst($product->status) }}
                            </span>
                        @endif
                        <p class="text-[10px] text-gray-600 mt-2">Listed: {{ $product->listed_at }}</p>
                    </td>

                    <td class="p-5 align-top text-right">
                        <div class="flex flex-col gap-2 items-end">
                            <!-- Edit and Delete Icons (First Row) -->
                            <div class="flex gap-2">
                                @if(auth()->user()->hasRole(['seller']))
                                    <button wire:click="$dispatch('openProductModal', { id: {{ $product->id }} })"
                                            class="p-2 bg-gray-900 border border-gray-800 text-gray-400 rounded-lg hover:border-[#39FF14] hover:text-[#39FF14] transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>

                                    <button wire:click="delete({{ $product->id }})"
                                            onclick="return confirm('Delete this product permanently?')"
                                            class="p-2 bg-red-900/10 border border-red-900/40 text-red-500 rounded-lg hover:bg-red-900/20 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>

                            <!-- Suspend/Activate Button (Second Row) -->
                            @if(auth()->user()->hasRole(['moderator' , 'admin']))
                                <button wire:click="suspend({{ $product->id }})"
                                        class="flex items-center gap-2 px-3 py-1.5 bg-{{ $product->status === 'active' ? 'red' : 'green' }}-900/20 border border-{{ $product->status === 'active' ? 'red' : 'green' }}-900/40 text-{{ $product->status === 'active' ? 'red' : 'green' }}-500 rounded-lg hover:bg-{{ $product->status === 'active' ? 'red' : 'green' }}-900/30 transition-all text-xs font-bold uppercase">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if($product->status === 'active')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        @endif
                                    </svg>
                                    {{ $product->status === 'active' ? 'Suspend' : 'Activate' }}
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-10 text-center">
                        <p class="text-gray-400 text-lg">No products found</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
    </table>

    {{ $products->links('livewire.pagination_product') }}

</div>
