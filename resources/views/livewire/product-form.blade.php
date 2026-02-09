<div>
    @if($showModal)
        <div class="fixed inset-0 bg-black/90 backdrop-blur-md flex items-center justify-center z-50 p-4">
            <div class="bg-gradient-to-br from-[#0a0a0a] to-[#0f0f0f] border border-gray-900 rounded-2xl p-8 w-full max-w-4xl shadow-[0_0_50px_rgba(57,255,20,0.1)]">

                <!-- Header -->
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <h2 class="text-3xl font-gaming font-bold text-white tracking-wide mb-1">
                            {{ $productId ? 'Edit Product' : 'Create New Product' }}
                        </h2>
                        <p class="text-gray-500 text-sm">{{ $productId ? 'Update product details' : 'Add a new product to your inventory' }}</p>
                    </div>
                    <button wire:click="closeModal" class="text-gray-600 hover:text-[#39FF14] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="save">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Left Column -->
                        <div class="space-y-5">
                            <div>
                                <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">Product Name</label>
                                <input wire:model="name" type="text" placeholder="Alienware Gaming Laptop..."
                                       class="w-full bg-black border border-gray-800 text-white rounded-lg px-4 py-3 text-sm focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-700">
                                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">Description</label>
                                <textarea wire:model="description" rows="5" placeholder="High-performance gaming laptop with RTX 4090..."
                                          class="w-full bg-black border border-gray-800 text-white rounded-lg px-4 py-3 text-sm focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all resize-none placeholder-gray-700"></textarea>
                                @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">Category</label>
                                <select wire:model="category_id"
                                        class="w-full bg-black border border-gray-800 text-white rounded-lg px-4 py-3 text-sm focus:border-[#39FF14] focus:outline-none">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-5">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">Price (MAD)</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-3 text-gray-600 text-sm">$</span>
                                        <input wire:model="price" type="number" step="0.01" placeholder="2499.99"
                                               class="w-full bg-black border border-gray-800 text-white rounded-lg pl-8 pr-4 py-3 text-sm focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-700">
                                    </div>
                                    @error('price') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">Stock</label>
                                    <input wire:model="stock" type="number" placeholder="50"
                                           class="w-full bg-black border border-gray-800 text-white rounded-lg px-4 py-3 text-sm focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-700">
                                    @error('stock') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">Product Image</label>
                                <div class="relative border-2 border-dashed border-gray-800 rounded-lg p-8 text-center hover:border-[#39FF14] transition-all bg-black/50 group">
                                    <input wire:model="image" type="file" id="imageUpload" class="hidden">
                                    <label for="imageUpload" class="cursor-pointer block">
                                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-gray-900 flex items-center justify-center group-hover:bg-[#39FF14]/10 transition-all">
                                            <svg class="w-8 h-8 text-gray-600 group-hover:text-[#39FF14] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-400 text-sm font-medium mb-1">Upload Product Image</p>
                                        <p class="text-gray-600 text-xs">PNG, JPG up to 2MB</p>
                                    </label>
                                </div>
                                @error('image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 mt-8 pt-6 border-t border-gray-900">
                        <button type="submit"
                                class="flex-1 bg-[#39FF14] text-black font-bold py-3.5 rounded-lg hover:shadow-[0_0_30px_rgba(57,255,20,0.3)] transition-all uppercase tracking-wider text-sm">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $productId ? 'Update Product' : 'Create Product' }}
                            </span>
                        </button>
                        <button type="button" wire:click="closeModal"
                                class="px-8 bg-gray-900 border border-gray-800 text-gray-400 font-bold py-3.5 rounded-lg hover:bg-gray-800 hover:text-white transition-all uppercase tracking-wider text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
