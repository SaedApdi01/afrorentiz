
    <!-- Mobile Bottom Navigation - Advanced -->
    <nav
        class="fixed bottom-4 left-4 right-4 z-50 md:hidden bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 px-4 py-2 flex justify-between items-center transition-all">

        <!-- Home -->
        <a href="/"
            class="flex flex-col items-center justify-center text-xs text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-all group">
            <svg class="h-6 w-6 group-hover:text-primary transition-all" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="mt-1 group-hover:font-medium">Home</span>
        </a>

        <!-- Properties -->
        <a href="{{ route('properties') }}"
            class="flex flex-col items-center justify-center text-xs text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-all group">
            <svg class="h-6 w-6 group-hover:text-primary transition-all" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 7h18M3 12h18M3 17h18" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="mt-1 group-hover:font-medium">Browse</span>
        </a>

        <!-- Add Button -->
        <a href="{{ route('property.index') }}"
            class="relative -mt-8 bg-primary text-white rounded-full p-4 shadow-lg hover:bg-blue-600 transition">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>

        <!-- Search -->
<a href="{{ route('contact') }}" onclick="openSearchModal()"
    class="flex flex-col items-center justify-center text-xs text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-all group">
    <i class="fas fa-headset text-lg group-hover:text-primary transition-all"></i>
    <span class="mt-1 group-hover:font-medium">Support</span>
</a>



        <!-- Account -->
        <a href="{{ route('login') }}"
            class="flex flex-col items-center justify-center text-xs text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-all group">
            <svg class="h-6 w-6 group-hover:text-primary transition-all" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24">
                <path
                    d="M5.121 17.804A6.964 6.964 0 0112 15c1.657 0 3.165.567 4.379 1.516M15 10a3 3 0 11-6 0 3 3 0 016 0z"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="mt-1 group-hover:font-medium">Account</span>
        </a>

    </nav>

    <!-- Search Modal -->
    <div id="searchModal"
        class="fixed inset-0 z-50 bg-white dark:bg-gray-900 bg-opacity-95 hidden flex flex-col px-4 pt-6 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Search Properties</h2>
            <button onclick="closeSearchModal()"
                class="text-gray-500 dark:text-gray-300 hover:text-red-500 text-2xl font-bold">&times;</button>
        </div>
        <input type="text" placeholder="Search location, city..."
            class="px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-800 w-full mb-4 focus:outline-none focus:ring-2 focus:ring-primary">

        <div class="space-y-2">
            <p class="text-sm text-gray-500 dark:text-gray-400">Popular Searches:</p>
            <div class="flex flex-wrap gap-2">
                <button
                    class="px-3 py-1 rounded-full bg-gray-200 dark:bg-gray-700 text-sm hover:bg-primary hover:text-white transition">Mogadishu</button>
                <button
                    class="px-3 py-1 rounded-full bg-gray-200 dark:bg-gray-700 text-sm hover:bg-primary hover:text-white transition">2
                    Bedroom</button>
                <button
                    class="px-3 py-1 rounded-full bg-gray-200 dark:bg-gray-700 text-sm hover:bg-primary hover:text-white transition">With
                    Pool</button>
            </div>
        </div>
    </div>
