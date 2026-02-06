@extends('layouts.client-layout')

@section('title', 'Profile')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto">
        <div class="bg-black/50 backdrop-blur-sm border border-green-900/30 rounded-2xl p-8">
            <h1 class="text-3xl font-bold text-vortexGreen mb-8">Profile Settings</h1>

            @if(session('success'))
                <div class="bg-green-900/20 border border-green-500/50 text-green-400 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Profile Information -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-white mb-4">Profile Information</h3>
                    
                    <!-- Profile Photo -->
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img class="h-20 w-20 object-cover rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                        </div>
                        <div class="flex-1">
                            <label for="profile_photo" class="block text-sm font-medium text-gray-300 mb-2">Profile Photo</label>
                            <input 
                                type="file" 
                                id="profile_photo" 
                                name="profile_photo" 
                                accept="image/*"
                                class="w-full px-4 py-3 bg-black/50 border border-green-900/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-vortexGreen file:text-black hover:file:bg-green-400"
                            >
                            @error('profile_photo')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $user->name) }}" 
                            class="w-full px-4 py-3 bg-black/50 border border-green-900/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
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
                            class="w-full px-4 py-3 bg-black/50 border border-green-900/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                            required
                        >
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password Change -->
                <div class="space-y-4 border-t border-green-900/30 pt-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Change Password</h3>
                    
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Current Password</label>
                        <input 
                            type="password" 
                            id="current_password" 
                            name="current_password" 
                            class="w-full px-4 py-3 bg-black/50 border border-green-900/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
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
                            class="w-full px-4 py-3 bg-black/50 border border-green-900/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
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
                            class="w-full px-4 py-3 bg-black/50 border border-green-900/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                        >
                        @error('new_password_confirmation')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6">
                    <button type="submit" class="px-6 py-3 bg-vortexGreen text-black font-semibold rounded-lg hover:bg-green-400 transition duration-300">
                        Save Changes
                    </button>

                    <div class="flex items-center gap-4">
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-red-400 transition duration-300">
                                Logout
                            </button>
                        </form>
                        
                        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition duration-300">
                                Delete Account
                            </button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
