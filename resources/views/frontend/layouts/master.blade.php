<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('assets/logo/icon.png') }}" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'AfroRentiz is your trusted platform to find and list amazing properties across Africa.')">
    @yield('meta')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                    }
                }
            }
        };
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white transition-colors duration-300 ">
    <!-- Loader Overlay -->
    <div id="loader"
        class="fixed inset-0 z-50 flex items-center justify-center bg-white dark:bg-gray-900 bg-opacity-90">
        <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-primary border-b-4"></div>
    </div>
    <!--Top bars-->
    <!--Top bars-->
    @include('frontend.layouts.top-bar')

    <!-- Main Content -->
    <main class="pb-16 md:pb-0">
        @yield('content')
    </main>

    <footer
        class="hidden md:block bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-4 gap-8">
            <!-- About -->
            <div>
                <div class="text-xl font-bold">
                    <a href="/"> <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo"
                            class="h-5 object-contain
      dark:brightness-0 dark:invert" /></a>
                </div><br>
                <p class="text-sm leading-relaxed">
                    Your trusted platform for finding and listing amazing properties worldwide. We make real estate
                    simple and accessible.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="hover:text-primary transition">Home</a></li>
                    <li><a href="{{ route('properties') }}" class="hover:text-primary transition">Properties</a></li>
                    <li><a href="{{ route('property.index') }}" class="hover:text-primary transition">Add Property</a>
                    </li>
                    <li><a href="{{ route('about') }}" class="hover:text-primary transition">About</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-primary transition">Need Help</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Company</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('privacy') }}" class="hover:text-primary transition">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-primary transition"> Terms & Conditions</a>
                    </li>
                    <li><a href="{{ route('about') }}" class="hover:text-primary transition">About AfroRentiz</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <p class="text-sm mb-2">Addis Ababa , Ethiopia | Mogadisho Somalia </p>
                <p class="text-sm mb-2">Email: support@afrorentiz.com</p>
                <p class="text-sm mb-4">Email: Info@afrorentiz.com</p>
                <div class="flex space-x-4 text-gray-500 dark:text-gray-400">
                    <!-- Social icons -->
                    <a href="#" aria-label="Facebook" class="hover:text-primary transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11.5 9.9v-7h-3v-3h3v-2c0-3 1.8-4.6 4.5-4.6 1.3 0 2.6.2 2.6.2v3h-1.5c-1.5 0-2 1-2 2v2h3.4l-.5 3h-2.9v7A10 10 0 0022 12z" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Twitter" class="hover:text-primary transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.54 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="hover:text-primary transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm0 2h10a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3zm5 2a4 4 0 100 8 4 4 0 000-8zm0 2a2 2 0 110 4 2 2 0 010-4zm3.5-.25a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div
            class="border-t border-gray-200 dark:border-gray-700 text-center text-xs py-4 text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>


    <!-- Mobile Bottom Navigation -->
    @include('frontend.layouts.mobile-navbar')


    <!--Scripts-->
    @include('frontend.layouts.scripts')
    @stack('main_scripts')
</body>


</html>
