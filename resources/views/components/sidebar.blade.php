  <aside class="w-64 bg-black border-r border-gray-900 fixed h-full z-50 transition-all duration-300 overflow-y-auto">
        <div class="p-6">
            <h1 class="text-3xl font-bold font-gaming text-[#39FF14] tracking-tighter flex items-center gap-2">
                <span class="bg-[#39FF14] text-black px-1 rounded">X</span> VORTEX
            </h1>
        </div>

        <nav class="mt-4 px-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex color-yellow items-center px-4 py-3 {{ request()->routeIs('dashboard') ? 'sidebar-active' : '' }} transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="{{ route('product') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('product') ? 'sidebar-active' : '' }} transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Products
            </a>
            @role(['admin','seller'])
            <a href="{{ route('orders') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('orders') ? 'sidebar-active' : '' }} transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 118 0m-4 5v2m-8 0a4 4 0 100 8 4 4 0 000-8zm-4 5a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Orders
            </a>
            @endrole
            @role(['admin','moderator'])
            <a href="{{ route('users') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('users') ? 'sidebar-active' : '' }} transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Users
            </a>
            @endrole
            <div class="pt-4 pb-2 text-xs font-semibold text-gray-600 uppercase tracking-widest px-4">System</div>
            <a href="{{ route('dashboard.profile') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('dashboard.profile') ? 'sidebar-active' : 'text-gray-400 hover:text-[#39FF14]' }} hover:bg-gray-900 rounded-lg transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profile
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:text-[#39FF14] hover:bg-gray-900 rounded-lg transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                Notifications
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:text-[#39FF14] hover:bg-gray-900 rounded-lg transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Settings
            </a>
            
            <!-- Logout Section -->
            <div class="pt-4 pb-2 text-xs font-semibold text-gray-600 uppercase tracking-widest px-4">Account</div>
            <form action="{{ route('logout') }}" method="POST" class="px-4">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-400 hover:text-red-400 hover:bg-gray-900 rounded-lg transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </nav>
    </aside>