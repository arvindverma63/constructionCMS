<!-- Bottom Navigation (Mobile) -->
<nav class="bottom-nav fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-800 shadow-lg md:hidden">
    <div class="flex justify-around py-4">
        <a href="{{ route('admin') }}" class="flex flex-col items-center text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 {{ request()->routeIs('home') ? 'text-indigo-600' : '' }}">
            <i class="bi bi-house-fill text-xl"></i>
            <span class="text-sm">Home</span>
        </a>
        <a href="{{ route('services') }}" class="flex flex-col items-center text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 {{ request()->routeIs('services') ? 'text-indigo-600' : '' }}">
            <i class="bi bi-gear-fill text-xl"></i>
            <span class="text-sm">Services</span>
        </a>
        <a href="{{ route('properties') }}" class="flex flex-col items-center text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 {{ request()->routeIs('properties') ? 'text-indigo-600' : '' }}">
            <i class="bi bi-building text-xl"></i>
            <span class="text-sm">Properties</span>
        </a>
        <a href="{{ route('favorites') }}" class="flex flex-col items-center text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 {{ request()->routeIs('favorites') ? 'text-indigo-600' : '' }}">
            <i class="bi bi-heart-fill text-xl"></i>
            <span class="text-sm">Favorites</span>
        </a>
    </div>
</nav>
