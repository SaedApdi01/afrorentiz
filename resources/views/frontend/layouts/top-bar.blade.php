<nav class="bg-white dark:bg-gray-800  top-0 inset-x-0 z-50 border-b border-gray-200 dark:border-gray-700">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Mobile menu button -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button" id="mobile-menu-toggle"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-500 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700 focus:ring-2 focus:ring-white">
                    <svg id="menu-open-icon" class="block h-6 w-6" stroke="currentColor" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="menu-close-icon" class="hidden h-6 w-6" stroke="currentColor" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Logo and Nav -->
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/" class="flex items-center">
                    <img class="h-5 w-auto dark:brightness-0 dark:invert" src="{{ asset('assets/logo/logo.png') }}"
                        alt="Logo">
                </a>
                <div class="hidden sm:ml-6 sm:flex space-x-4">
                    <a href="/" class="text-gray-800 dark:text-white px-3 py-2 text-sm font-medium">Home</a>
                    <a href="{{ route('properties') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-primary px-3 py-2 text-sm font-medium">Properties</a>
                    <a href="{{ route('about') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-primary px-3 py-2 text-sm font-medium">About</a>
                    <a href="{{ route('contact') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-primary px-3 py-2 text-sm font-medium">Contact</a>
                </div>
            </div>

            <!-- Right -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <a href="{{ route('property.index') }}"
                    class="hover:bg-blue-300 bg-blue-200 text-blue-800 px-4 py-2 rounded-md text-sm font-medium hidden sm:block"><i
                        class="fa-solid fa-plus"></i> Create Ad</a>

                <div class="relative ml-3">
                    <button id="user-menu-button" type="button"
                        class="flex rounded-full bg-gray-100 dark:bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2">
                        <img class="h-8 w-8 rounded-full"
                            src="{{ Auth::check() && Auth::user()->image
                                ? asset(Auth::user()->image)
                                : 'https://api.dicebear.com/9.x/initials/svg?seed=' . urlencode(Auth::check() ? Auth::user()->name : 'Guest') }}"
                            alt="User">
                    </button>

                    <!-- Dropdown -->
                    <div id="dropdownMenu"
                        class="hidden absolute right-0 z-10 mt-2 w-48 rounded-md bg-white dark:bg-gray-800 py-1 shadow-lg ring-1 ring-black/5">
                        @if (Auth::user())
                            @if (Auth::user()->web_role == 5)
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Admin Dashboard</a>
                            @endif
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Profile</a>
                            <button onclick="toggleTheme()"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Dark /
                                Light</button>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf
                            </form>
                        @else
                            <button onclick="toggleTheme()"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Dark /
                                Light</button>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Sign in</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="/"
                class="block px-3 py-2 text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700 rounded">Home</a>
            <a href="{{ route('properties') }}"
                class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">Properties</a>
            <a href="{{ route('about') }}"
                class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">About</a>
            <a href="{{ route('contact') }}"
                class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">Contact</a>
            <a href="{{ route('property.index') }}"
                class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">Create
                Ad</a>
        </div>
    </div>
</nav>
