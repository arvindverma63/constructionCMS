@extends('userAdmin.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-24 text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 animate-fade-in">Build Your Future with Top Contractors</h1>
            <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto">Find trusted professionals and premium properties across India with ease.</p>
            <div class="max-w-4xl mx-auto bg-white dark:bg-gray-700 p-4 rounded-xl shadow-2xl flex flex-col md:flex-row gap-4">
                <input type="text" id="heroSearch" placeholder="Search by city, service, or property..."
                       class="flex-1 p-3 rounded-lg border-none focus:ring-2 focus:ring-indigo-400 dark:bg-gray-600 dark:text-white">
                <select class="p-3 rounded-lg border-none focus:ring-2 focus:ring-indigo-400 dark:bg-gray-600 dark:text-white">
                    <option>Contractors</option>
                    <option>Properties</option>
                </select>
                <select class="p-3 rounded-lg border-none focus:ring-2 focus:ring-indigo-400 dark:bg-gray-600 dark:text-white">
                    <option>All Cities</option>
                    <option>Kanpur</option>
                    <option>Delhi</option>
                    <option>Mumbai</option>
                </select>
                <button class="bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                    <i class="bi bi-search mr-2"></i>Search
                </button>
            </div>
            <div id="suggestions" class="absolute w-full max-w-4xl mx-auto bg-white dark:bg-gray-700 text-gray-800 dark:text-white rounded-lg shadow-lg mt-2 hidden">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Kanpur</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Delhi</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Mumbai</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar (Filters) -->
            <aside class="lg:w-1/4 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Filter Results</h2>
                <div class="mb-6">
                    <label for="sort" class="block text-sm font-medium text-gray-800 dark:text-white mb-2">Sort By</label>
                    <select id="sort" class="w-full p-3 rounded-lg border border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-400">
                        <option>Rating (High to Low)</option>
                        <option>Rating (Low to High)</option>
                        <option>Price (Low to High)</option>
                        <option>Distance (Nearest)</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="location" class="block text-sm font-medium text-gray-800 dark:text-white mb-2">Location</label>
                    <div class="relative">
                        <input type="text" id="location" value="Kanpur" placeholder="Enter city or pin code"
                               class="w-full p-3 rounded-lg border border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-400">
                        <button class="absolute right-3 top-3 text-gray-500 dark:text-gray-300">
                            <i class="bi bi-geo-alt-fill"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="priceRange" class="block text-sm font-medium text-gray-800 dark:text-white mb-2">Price Range</label>
                    <input type="range" id="priceRange" min="0" max="10000000" step="10000" value="5000000"
                           class="w-full accent-indigo-600">
                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mt-2">
                        <span>₹0</span>
                        <span id="priceValue">₹50,00,000</span>
                        <span>₹1,00,00,000</span>
                    </div>
                </div>
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-white mb-3">Property Type</h3>
                    <div class="space-y-3">
                        <label class="flex items-center text-gray-800 dark:text-white">
                            <input type="checkbox" class="mr-2 accent-indigo-600 h-5 w-5" checked>
                            <span class="text-sm">Residential</span>
                        </label>
                        <label class="flex items-center text-gray-800 dark:text-white">
                            <input type="checkbox" class="mr-2 accent-indigo-600 h-5 w-5">
                            <span class="text-sm">Commercial</span>
                        </label>
                        <label class="flex items-center text-gray-800 dark:text-white">
                            <input type="checkbox" class="mr-2 accent-indigo-600 h-5 w-5">
                            <span class="text-sm">Plot</span>
                        </label>
                    </div>
                </div>
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-white mb-3">Contractor Categories</h3>
                    <div class="space-y-3">
                        <label class="flex items-center text-gray-800 dark:text-white">
                            <input type="checkbox" class="mr-2 accent-indigo-600 h-5 wabba-5" checked>
                            <span class="text-sm">Architect</span>
                        </label>
                        <label class="flex items-center text-gray-800 dark:text-white">
                            <input type="checkbox" class="mr-2 accent-indigo-600 h-5 w-5" checked>
                            <span class="text-sm">Civil Contractor</span>
                        </label>
                        <label class="flex items-center text-gray-800 dark:text-white">
                            <input type="checkbox" class="mr-2 accent-indigo-600 h-5 w-5">
                            <span class="text-sm">Interior Designer</span>
                        </label>
                        <label class="flex items-center text-gray-800 dark:text-white">
                            <input type="checkbox" class="mr-2 accent-indigo-600 h-5 w-5">
                            <span class="text-sm">Plumbing Contractor</span>
                        </label>
                    </div>
                </div>
                <button id="applyFilters" class="w-full bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700 transition font-medium">Apply Filters</button>
            </aside>

            <!-- Main Content Area -->
            <main class="lg:w-3/4">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Explore in Kanpur</h2>
                        <div class="flex space-x-3 mt-4 sm:mt-0">
                            <button id="viewMap" class="bg-gray-200 dark:bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white">View Map</button>
                            <button id="addListing" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Add Listing</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Contractor Card -->
                        <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-xl transition-transform hover:scale-105 relative">
                            <button class="absolute top-4 right-4 text-gray-500 dark:text-gray-300 hover:text-red-500" title="Add to Favorites">
                                <i class="bi bi-heart"></i>
                            </button>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">R.K. Construction</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Joined: 12/10/2024</p>
                            <span class="inline-block bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 px-2 py-1 rounded text-sm mt-2">★★★★☆ (4.5)</span>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">Expert in residential and commercial projects with 10+ years of experience.</p>
                            <div class="flex flex-wrap gap-2 mt-3">
                                <span class="bg-gray-200 dark:bg-gray-600 px-2 py-1 rounded text-sm text-gray-800 dark:text-white">Interior Designer</span>
                                <span class="bg-gray-200 dark:bg-gray-600 px-2 py-1 rounded text-sm text-gray-800 dark:text-white">Architect</span>
                            </div |a>
                            <div class="flex flex-col sm:flex-row gap-3 mt-4">
                                <a href="tel:+1234567890" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Call</a>
                                <button class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-800 dark:text-white" data-bs-toggle="modal" data-bs-target="#contactModal">Message</button>
                                <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline" data-bs-toggle="modal" data-bs-target="#reviewsModal">View Reviews</a>
                            </div>
                        </div>
                        <!-- Property Card -->
                        <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-xl transition-transform hover:scale-105 relative">
                            <button class="absolute top-4 right-4 text-gray-500 dark:text-gray-300 hover:text-red-500" title="Add to Favorites">
                                <i class="bi bi-heart"></i>
                            </button>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Luxury Villa in Kanpur</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Listed: 01/15/2025</p>
                            <span class="inline-block bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded text-sm mt-2">★★★★★ (5.0)</span>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">3BHK villa, 2000 sq.ft., modern amenities, prime location.</p>
                            <div class="flex flex-wrap gap-2 mt-3">
                                <span class="bg-gray-200 dark:bg-gray-600 px-2 py-1 rounded text-sm text-gray-800 dark:text-white">Residential</span>
                                <span class="bg-gray-200 dark:bg-gray-600 px-2 py-1 rounded text-sm text-gray-800 dark:text-white">For Sale</span>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 mt-4">
                                <a href="tel:+9876543210" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Contact Agent</a>
                                <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-8">
                        <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">Load More</a>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
