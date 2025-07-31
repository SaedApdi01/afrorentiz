
        <aside class="w-20 bg-white dark:bg-gray-800 flex flex-col items-center py-6 space-y-6 shadow">
            <a href="{{ route('dashboard') }}" wire:navigate class="text-gray-700 dark:text-gray-300 hover:text-blue-600">
                <!-- Home Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4H9v4a2 2 0 0 1-2 2H3z" />
                </svg>
            </a>
            <a href="{{ route('property.index') }}" wire:navigate
                class="text-gray-700 dark:text-gray-300 hover:text-blue-600">
                <i class="fas fa-plus "></i>
            </a>
            <a href="{{ route('owner.messages') }}" wire:navigate
                class="text-gray-700 dark:text-gray-300 hover:text-blue-600">
                <i class="fas fa-inbox "></i>
            </a>
            <a href="{{ route('edit-profile') }}" wire:navigate
                class="text-gray-700 dark:text-gray-300 hover:text-blue-600">
                <!-- Profile Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="7" r="4" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.5 21a7 7 0 0 1 13 0" />
                </svg>
            </a>
            <a onclick="toggleTheme()" class="text-gray-700 dark:text-gray-300 hover:text-blue-600">
                <!-- Settings Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 1v2m6.364 1.636l-1.414 1.414M21 12h-2m-1.636 6.364l-1.414-1.414M12 21v-2m-6.364-1.636l1.414-1.414M3 12h2m1.636-6.364l1.414 1.414" />
                </svg>
            </a>
        </aside>
