@extends('frontend.layouts.master')

@section('content')
    <section x-data="{ sidebarOpen: false }" >

        <div class="flex flex-col md:flex-row min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Mobile Toggle Button -->
            <button @click="sidebarOpen = !sidebarOpen"
                class="md:hidden fixed bottom-20 left-5 z-50 w-11 h-11 flex items-center justify-center bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-full shadow-lg ring-1 ring-gray-300 dark:ring-gray-700 transition hover:bg-gray-100 dark:hover:bg-gray-700">
                <!-- Menu Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>


            <!-- Sidebar Wrapper -->
            <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                class="fixed md:static top-0 left-0 md:translate-x-0 w-20 bg-white dark:bg-gray-800 shadow min-h-screen transition-transform duration-300 ease-in-out z-40">
                <!-- Close Button (mobile only) -->
                <button @click="sidebarOpen = false"
                    class="md:hidden absolute top-2 right-2 text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <br class="block md:hidden">
                <br class="block md:hidden">
                <!-- Sidebar Content -->
                @include('frontend.user.layouts.sidebar')
            </div>

            <!-- Main Content -->
            <br><br>
            <main class="flex-1 p-4 sm:p-6 md:p-8 max-w-5xl mx-auto w-full">
                @yield('user-content')
            </main>
        </div>
    </section>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
