<div>
    <div class="pt-8 px-4 max-w-7xl mx-auto">

        <!-- Header -->
        <div class="bg-[#0a0a0a] border border-gray-900 p-6 rounded-xl mb-6 flex flex-col md:flex-row justify-between items-center gap-4 shadow-lg">
            <div>
                <h1 class="text-2xl font-bold text-white tracking-tight">Categories <span class="text-[#39FF14]">Vault</span></h1>

            </div>
            <button wire:click="$dispatch('openCategoryModal')" class="bg-[#39FF14] text-black font-bold py-2.5 px-6 rounded-lg hover:shadow-[0_0_20px_rgba(57,255,20,0.4)] transition-all flex items-center gap-2 uppercase tracking-wider text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                ADD CATEGORY
            </button>
        </div>

        <!-- Search -->
        <div class="bg-[#0a0a0a] border border-gray-900 p-5 rounded-xl mb-10 grid grid-cols-1 md:grid-cols-3 gap-6 relative">
            <div class="md:col-span-2 relative">
                <input type="text" wire:model="search" placeholder="Filter records..."
                       class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg pl-10 pr-4 py-3 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14]/50 transition-all text-sm font-mono">
                <svg class="absolute left-3 top-3.5 w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-black border border-gray-900 rounded-2xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-[#0f0f0f] text-gray-500 text-[10px] uppercase tracking-[0.3em] border-b border-gray-800">
                        <th class="p-6 font-semibold">Entity Name</th>
                        <th class="p-6 font-semibold">System Slug</th>
                        <th class="p-6 font-semibold text-purple-500">Vol.</th>
                        <th class="p-6 font-semibold">Timestamp</th>
                        <th class="p-6 font-semibold text-right">Operations</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-900 text-sm">
                    @forelse ($categories as $category)
                        <tr class="group hover:bg-[#39FF14]/[0.02] transition-colors">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-2 h-2 rounded-full bg-gray-800 group-hover:bg-[#39FF14] group-hover:shadow-[0_0_8px_#39FF14] transition-all"></div>
                                    <span class="font-bold text-gray-300 group-hover:text-white transition-colors">{{ $category->name }}</span>
                                </div>
                            </td>
                            <td class="p-6">
                                    <span class="bg-gray-900/50 text-gray-500 px-2 py-1 rounded border border-gray-800 font-mono text-[10px]">
                                        {{ $category->slug }}
                                    </span>
                            </td>
                            <td class="p-6 text-purple-400 font-mono font-bold">{{ $category->products()->count() }}</td>
                            <td class="p-6 text-gray-600 text-xs">{{ $category->created_at->format('d.m.Y') }}</td>
                            <td class="p-6 text-right">
                                <div class="flex justify-end gap-3">
                                    <button title="Edit" wire:click="$dispatch('editCategory', {{ $category->id }})" class="text-gray-600 hover:text-[#39FF14] transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </button>
                                    <button title="Delete" wire:click="delete({{ $category->id }})" class="text-gray-600 hover:text-red-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-4 text-center text-gray-500">No categories found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-4">
                {{ $categories->links('livewire.pagination_product') }}
            </div>
        </div>
    </div>

    <!-- Include your category modal form component -->
    @livewire('category-form')
</div>
