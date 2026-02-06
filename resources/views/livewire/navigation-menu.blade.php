<div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-jet-nav-link>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <!-- Teams Dropdown -->
        @auth
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        {{ Auth::user()->currentTeam->name }}
                        <svg class="ml-1 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="w-48">
                        <!-- Team Management -->
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            Team Settings
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                            Create New Team
                        </x-jet-dropdown-link>

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <hr class="my-2" />

                            <div class="px-4 py-2 text-xs text-gray-400">
                                Switch Teams
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                @unless ($team->id === Auth::user()->currentTeam->id)
                                    <x-jet-dropdown-link href="{{ route('teams.switch', $team->id) }}">
                                        {{ $team->name }}
                                    </x-jet-dropdown-link>
                                @endunless
                            @endforeach
                        @endif
                    </div>
                </x-slot>
            </x-jet-dropdown>
        @endauth

        <!-- Settings Dropdown -->
        <div class="ml-3 relative">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Auth::user()->profile_photo_path)
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="h-8 w-8 rounded-full flex items-center justify-center bg-gray-200">
                                <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        Manage Account
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        Profile
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            API Tokens
                        </x-jet-dropdown-link>
                    @endif

                    <x-jet-dropdown-link href="{{ route('teams.index') }}">
                        Teams
                    </x-jet-dropdown-link>

                    <hr class="my-2" />

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>
        </div>
    </div>

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Auth::user()->profile_photo_path)
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @else
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-gray-200">
                            <svg class="h-6 w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                @endif

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.*')">
                    Profile
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.*')">
                        API Tokens
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</div>
