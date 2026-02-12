<div>
    <!-- Button to trigger modal -->
    <button wire:click="openModal" class="bg-[#39FF14] text-black font-bold py-2.5 px-6 rounded-lg hover:shadow-[0_0_20px_rgba(57,255,20,0.4)] transition-all flex items-center gap-2 uppercase tracking-wider text-xs">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
        </svg>
        Create Account
    </button>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

                <!-- Modal panel -->
                <div class="relative bg-[#0a0a0a] border border-gray-900 rounded-xl shadow-2xl max-w-md w-full p-6 z-10">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-gaming font-bold text-white">Create New Account</h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Form -->
                    <form wire:submit.prevent="createUser">
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Full Name</label>
                            <input 
                                type="text" 
                                wire:model="name" 
                                class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-600"
                                placeholder="Enter full name"
                                required
                            >
                            @error('name')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Email Address</label>
                            <input 
                                type="email" 
                                wire:model="email" 
                                class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-600"
                                placeholder="Enter email address"
                                required
                            >
                            @error('email')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Password</label>
                            <input 
                                type="password" 
                                wire:model="password" 
                                class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-600"
                                placeholder="Enter password"
                                required
                            >
                            @error('password')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-4">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Confirm Password</label>
                            <input 
                                type="password" 
                                wire:model="password_confirmation" 
                                class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-600"
                                placeholder="Confirm password"
                                required
                            >
                            @error('password_confirmation')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role Field -->
                        <div class="mb-4">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Account Role</label>
                            <select 
                                wire:model="role" 
                                class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 text-sm focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all"
                                required
                            >
                                <option value="client">Client</option>
                                <option value="seller">Seller</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('role')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="mb-6">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Account Status</label>
                            <select 
                                wire:model="status" 
                                class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 text-sm focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all"
                                required
                            >
                                <option value="active">Active</option>
                                <option value="banned">Banned</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3">
                            <button 
                                type="submit" 
                                class="flex-1 bg-[#39FF14] text-black font-bold py-2.5 px-6 rounded-lg hover:shadow-[0_0_20px_rgba(57,255,20,0.4)] transition-all uppercase tracking-wider text-xs"
                                wire:loading.attr="disabled"
                            >
                                <span wire:loading.remove>Create Account</span>
                                <span wire:loading>Creating...</span>
                            </button>
                            <button 
                                type="button" 
                                wire:click="closeModal" 
                                class="flex-1 bg-gray-800 text-gray-300 font-bold py-2.5 px-6 rounded-lg hover:bg-gray-700 transition-all uppercase tracking-wider text-xs"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
