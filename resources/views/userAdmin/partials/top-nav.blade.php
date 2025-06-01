<!-- Top Navigation (Desktop) -->
<nav class="top-nav bg-white dark:bg-gray-800 shadow-lg sticky top-0 z-20">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('admin') }}" class="flex items-center space-x-2">
            <img src="/admin/assets/images/app-logo.svg" alt="Constructify Logo" class="h-12">
            <span class="text-2xl font-bold text-gray-800 dark:text-white">Constructify</span>
        </a>
        <div class="flex items-center space-x-8">
            <a href="{{ route('admin') }}" class="text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition {{ request()->routeIs('home') ? 'font-bold' : '' }}">Home</a>
            <a href="{{ route('services') }}" class="text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition {{ request()->routeIs('services') ? 'font-bold' : '' }}">Services</a>
            <a href="{{ route('properties') }}" class="text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition {{ request()->routeIs('properties') ? 'font-bold' : '' }}">Properties</a>
            <button id="darkModeToggle" class="text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400">
                <i class="bi bi-moon-stars-fill"></i>
            </button>
            <div class="relative group">
                <button class="flex items-center space-x-2 text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400">
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 text-gray-800 dark:text-white shadow-lg rounded-lg hidden group-hover:block">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Profile</a>
                    <a href="{{ route('favorites') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Favorites</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Settings</a>
                    <hr class="border-gray-200 dark:border-gray-600">
                    <a href="#" class="block px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
