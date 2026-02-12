<nav class="border-b border-green-900/50 bg-black/90 backdrop-blur-md sticky top-0 z-50">
        <div class="container mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <img src="{{ asset('assets/images/logoV.svg') }}" alt="Vortox Logo" class="h-10 w-auto group-hover:drop-shadow-[0_0_10px_rgba(57,255,20,0.5)] transition">
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex gap-8 lg:gap-12 font-display uppercase tracking-wider text-sm">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-vortexGreen border-b-2 border-vortexGreen pb-1' : 'text-gray-400 hover:text-vortexGreen' }} transition duration-300">Store</a>
                @auth
                    @if(auth()->user()->hasRole(['admin', 'seller', 'moderator']))
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard*') ? 'text-vortexGreen border-b-2 border-vortexGreen pb-1' : 'text-gray-400 hover:text-vortexGreen' }} transition duration-300">Dashboard</a>
                        <a href="{{ route('order.index') }}" class="{{ request()->routeIs('order.index') ? 'text-vortexGreen border-b-2 border-vortexGreen pb-1' : 'text-gray-400 hover:text-vortexGreen' }} transition duration-300">Orders</a>
                    @endif
                    @if(auth()->user()->hasRole('client'))
                        <a href="{{ route('order.index') }}" class="{{ request()->routeIs('order.index') ? 'text-vortexGreen border-b-2 border-vortexGreen pb-1' : 'text-gray-400 hover:text-vortexGreen' }} transition duration-300">Orders</a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile*') ? 'text-vortexGreen border-b-2 border-vortexGreen pb-1' : 'text-gray-400 hover:text-vortexGreen' }} transition duration-300">Profile</a>
                @endauth
            </div>

            <div class="flex items-center gap-4 lg:gap-6">
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-400 hover:text-vortexGreen transition" onclick="toggleMobileMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                @auth
                    <button class="hidden sm:block text-gray-400 hover:text-vortexGreen transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    
                    <a href="{{ route('cart.index') }}" class="relative text-gray-400 hover:text-vortexGreen transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        @if(auth()->user()->cart && auth()->user()->cart->items->count() > 0)
                            <span class="absolute -top-2 -right-2 bg-vortexGreen text-black text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                {{ auth()->user()->cart->items->sum('quantity') }}
                            </span>
                        @endif
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center text-gray-400 hover:text-vortexGreen transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>
                        
                        <div class="absolute right-0 mt-2 w-48 bg-black/90 backdrop-blur-md border border-green-900/30 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <div class="px-4 py-2 text-sm text-gray-300 border-b border-green-900/30">
                                    {{ auth()->user()->name }}
                                </div>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-300 hover:text-vortexGreen hover:bg-green-900/20 transition">
                                    Edit Profile
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:text-red-400 hover:bg-red-900/20 transition">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-400 hover:text-vortexGreen transition">
                        Login
                    </a>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-black/95 backdrop-blur-md border-t border-green-900/50">
            <div class="container mx-auto px-6 py-4 space-y-3">
                <a href="{{ route('home') }}" class="block py-2 font-display uppercase tracking-wider text-sm {{ request()->routeIs('home') ? 'text-vortexGreen' : 'text-gray-400' }}">Store</a>
                @auth
                    @if(auth()->user()->hasRole(['admin', 'seller', 'moderator']))
                        <a href="{{ route('dashboard') }}" class="block py-2 font-display uppercase tracking-wider text-sm {{ request()->routeIs('dashboard*') ? 'text-vortexGreen' : 'text-gray-400' }}">Dashboard</a>
                        <a href="{{ route('order.index') }}" class="block py-2 font-display uppercase tracking-wider text-sm {{ request()->routeIs('order.index') ? 'text-vortexGreen' : 'text-gray-400' }}">Orders</a>
                    @endif
                    @if(auth()->user()->hasRole('client'))
                        <a href="{{ route('order.index') }}" class="block py-2 font-display uppercase tracking-wider text-sm {{ request()->routeIs('order.index') ? 'text-vortexGreen' : 'text-gray-400' }}">Orders</a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="block py-2 font-display uppercase tracking-wider text-sm {{ request()->routeIs('profile*') ? 'text-vortexGreen' : 'text-gray-400' }}">Profile</a>
                @endauth
            </div>
        </div>
    </nav>