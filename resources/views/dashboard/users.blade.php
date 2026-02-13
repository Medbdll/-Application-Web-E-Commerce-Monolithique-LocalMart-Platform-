@extends('layouts.app')
@section('title', 'Users')
@section('content')

    <div class="mb-8 flex flex-col md:flex-row justify-between items-end gap-4">
        <div>
            <h2 class="text-3xl font-gaming font-bold text-white tracking-wide">User Database</h2>
            <p class="text-gray-500 text-sm mt-1">Manage accounts, permissions, and security status.</p>
        </div>
        @role('admin')
        <livewire:create-user-form />
        @endrole
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-black border border-gray-900 p-5 rounded-xl flex items-center gap-4">
            <div class="p-3 bg-blue-500/10 rounded-lg text-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Total Users</p>
                <p class="text-2xl font-gaming font-bold text-white">{{ $total_users}}</p>
            </div>
        </div>
        @role('admin')
        <div class="bg-black border border-gray-900 p-5 rounded-xl flex items-center gap-4">
            <div class="p-3 bg-purple-500/10 rounded-lg text-purple-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Active Sellers</p>
                <p class="text-2xl font-gaming font-bold text-white">{{ $sellers }}</p>
            </div>
        </div>
        @endrole
        <div class="bg-black border border-gray-900 p-5 rounded-xl flex items-center gap-4">
            <div class="p-3 bg-red-500/10 rounded-lg text-red-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Banned Accounts</p>
                <p class="text-2xl font-gaming font-bold text-white">{{ $banned }}</p>
            </div>
        </div>
    </div>

    <div class="bg-[#0a0a0a] border border-gray-900 p-4 rounded-xl mb-6 flex flex-wrap gap-4 items-center">
        <form method="GET" action="{{ route('users') }}" class="flex flex-wrap gap-4 items-center flex-1">
            <div class="relative flex-1 min-w-[250px]">
                <input type="text" name="search" placeholder="Search Username, Email or ID..." 
                       value="{{ request('search') }}"
                       class="w-full bg-black border border-gray-800 text-gray-300 rounded-lg pl-10 pr-4 py-2 focus:border-[#39FF14] focus:outline-none focus:ring-1 focus:ring-[#39FF14] transition-all placeholder-gray-600 text-sm">
                <svg class="w-4 h-4 text-gray-600 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <select name="role" class="bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 text-sm focus:border-[#39FF14] focus:outline-none">
                <option value="All Roles" {{ request('role') == 'All Roles' || !request('role') ? 'selected' : '' }}>All Roles</option>
                <option value="client" {{ request('role') == 'client' ? 'selected' : '' }}>Clients</option>
                <option value="moderator" {{ request('role') == 'moderator' ? 'selected' : '' }}>Moderators</option>
                <option value="seller" {{ request('role') == 'seller' ? 'selected' : '' }}>Sellers</option>
            </select>
            <select name="status" class="bg-black border border-gray-800 text-gray-300 rounded-lg px-4 py-2 text-sm focus:border-[#39FF14] focus:outline-none">
                <option value="Status: All" {{ request('status') == 'Status: All' || !request('status') ? 'selected' : '' }}>Status: All</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                <option value="banned" {{ request('status') == 'banned' ? 'selected' : '' }}>Banned</option>
            </select>
            <button type="submit" class="bg-[#39FF14] text-black px-4 py-2 rounded-lg font-semibold hover:bg-[#39FF14]/80 transition-colors text-sm">
                Filter
            </button>
            @if(request()->hasAny(['search', 'role', 'status']))
            <a href="{{ route('users') }}" class="bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-600 transition-colors text-sm">
                Clear
            </a>
            @endif
        </form>
    </div>

    @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');
            const roleSelect = document.querySelector('select[name="role"]');
            const statusSelect = document.querySelector('select[name="status"]');
            const form = document.querySelector('form');
            
            let searchTimeout;
            
            // Real-time search with debounce
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        form.submit();
                    }, 500); // Wait 500ms after user stops typing
                });
            }
            
            // Auto-submit on select change
            if (roleSelect) {
                roleSelect.addEventListener('change', function() {
                    form.submit();
                });
            }
            
            if (statusSelect) {
                statusSelect.addEventListener('change', function() {
                    form.submit();
                });
            }
        });
    </script>
    @endsection

    <div class="bg-black border border-gray-900 rounded-2xl overflow-hidden shadow-2xl">

      <x-users-table :users="$usersWithoutAdmin" :allRoles="$allRoles" />

        <div class="p-4 border-t border-gray-900 flex justify-between items-center text-xs text-gray-500">
            <span>Showing {{ $usersWithoutAdmin->firstItem() }}-{{ $usersWithoutAdmin->lastItem() }} users</span>
            <div class="flex gap-1">
                @if($usersWithoutAdmin->hasPages())
                    {{ $usersWithoutAdmin->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection