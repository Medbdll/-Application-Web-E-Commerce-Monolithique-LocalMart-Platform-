@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-gray-900 rounded-2xl border border-gray-800 p-8">
        <h1 class="text-3xl font-bold text-[#39FF14] mb-8">Profile Settings</h1>

        @if(session('success'))
            <div class="bg-green-900/20 border border-green-500/50 text-green-400 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Profile Information -->
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-[#39FF14]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profile Information
                </h3>
                
                <!-- Profile Photo -->
                <div class="flex items-center space-x-6">
                    <div class="shrink-0">
                        <img class="h-24 w-24 object-cover rounded-full border-2 border-[#39FF14]" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                    </div>
                    <div class="flex-1">
                        <label for="profile_photo" class="block text-sm font-medium text-gray-300 mb-2">Profile Photo</label>
                        <input 
                            type="file" 
                            id="profile_photo" 
                            name="profile_photo" 
                            accept="image/*"
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-[#39FF14] focus:ring-1 focus:ring-[#39FF14] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#39FF14] file:text-black hover:file:bg-green-400"
                        >
                        @error('profile_photo')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $user->name) }}" 
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-[#39FF14] focus:ring-1 focus:ring-[#39FF14]"
                            required
                        >
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email', $user->email) }}" 
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-[#39FF14] focus:ring-1 focus:ring-[#39FF14]"
                            required
                        >
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Password Change -->
            <div class="space-y-6 border-t border-gray-800 pt-8">
                <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-[#39FF14]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Change Password
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Current Password</label>
                        <input 
                            type="password" 
                            id="current_password" 
                            name="current_password" 
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-[#39FF14] focus:ring-1 focus:ring-[#39FF14]"
                        >
                        @error('current_password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-300 mb-2">New Password</label>
                        <input 
                            type="password" 
                            id="new_password" 
                            name="new_password" 
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-[#39FF14] focus:ring-1 focus:ring-[#39FF14]"
                        >
                        @error('new_password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm New Password</label>
                        <input 
                            type="password" 
                            id="new_password_confirmation" 
                            name="new_password_confirmation" 
                            class="w-full px-4 py-3 bg-black border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-[#39FF14] focus:ring-1 focus:ring-[#39FF14]"
                        >
                        @error('new_password_confirmation')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-8 border-t border-gray-800">
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-3 bg-[#39FF14] text-black font-semibold rounded-lg hover:bg-green-400 transition duration-300 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Save Changes
                    </button>
                </div>

                <div class="flex items-center gap-6">
                    <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                        @csrf
                        <button type="submit" class="flex items-center text-gray-400 hover:text-red-400 transition duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                    
                    <form action="{{ route('dashboard.profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center text-red-400 hover:text-red-300 transition duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
