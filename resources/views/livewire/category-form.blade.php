<div>
    @if($showModal)
        <div class="fixed inset-0 bg-black/90 backdrop-blur-md flex items-center justify-center z-50 p-4">
            <div class="bg-gradient-to-br from-[#0a0a0a] to-[#0f0f0f] border border-gray-900 rounded-2xl p-8 w-full max-w-2xl shadow-[0_0_50px_rgba(57,255,20,0.1)]">

                <!-- Header -->
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-white tracking-wide mb-1">
                            {{ $categoryId ? 'Edit Category' : 'Create New Category' }}
                        </h2>
                        <p class="text-gray-500 text-sm">
                            {{ $categoryId ? 'Update category details' : 'Add a new category to your system' }}
                        </p>
                    </div>
                    <button wire:click="closeModal" class="text-gray-600 hover:text-[#39FF14] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Form -->
                <form wire:submit.prevent="save">
                    <div class="space-y-6">

                        <!-- Category Name -->
                        <div>
                            <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">
                                Category Name
                            </label>
                            <input wire:model="name"
                                   type="text"
                                   placeholder="Electronics, Gaming, Accessories..."
                                   class="w-full bg-black border border-gray-800 text-white rounded-lg px-4 py-3 text-sm
                                          focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14]
                                          transition-all placeholder-gray-700">
                            @error('name')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div>
                            <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">
                                Slug
                            </label>
                            <input wire:model="slug"
                                   type="text"
                                   placeholder="electronics-gaming"
                                   class="w-full bg-black border border-gray-800 text-white rounded-lg px-4 py-3 text-sm
                                          focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14]
                                          transition-all placeholder-gray-700">
                            @error('slug')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-2 block">
                                Description (optional)
                            </label>
                            <textarea wire:model="description"
                                      rows="4"
                                      placeholder="Category description..."
                                      class="w-full bg-black border border-gray-800 text-white rounded-lg px-4 py-3 text-sm
                                             focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14]
                                             transition-all resize-none placeholder-gray-700"></textarea>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 mt-8 pt-6 border-t border-gray-900">
                        <button type="submit"
                                class="flex-1 bg-[#39FF14] text-black font-bold py-3.5 rounded-lg
                                       hover:shadow-[0_0_30px_rgba(57,255,20,0.3)]
                                       transition-all uppercase tracking-wider text-sm">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $categoryId ? 'Update Category' : 'Create Category' }}
                            </span>
                        </button>

                        <button type="button" wire:click="closeModal"
                                class="px-8 bg-gray-900 border border-gray-800 text-gray-400 font-bold py-3.5 rounded-lg
                                       hover:bg-gray-800 hover:text-white transition-all uppercase tracking-wider text-sm">
                            Cancel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif
</div>
