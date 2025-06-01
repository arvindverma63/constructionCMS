@extends('userAdmin.layouts.app')

@section('title', 'Favorites')

@section('content')
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content Area -->
            <main class="w-full">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Your Favorites</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Favorited Contractor Card -->
                        <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-xl transition-transform hover:scale-105 relative">
                            <button class="absolute top-4 right-4 text-red-500" title="Remove from Favorites">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">R.K. Construction</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Joined: 12/10/2024</p>
                            <span class="inline-block bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 px-2 py-1 rounded text-sm mt-2">★★★★☆ (4.5)</span>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">Expert in residential and commercial projects with 10+ years of experience.</p>
                            <div class="flex flex-wrap gap-2 mt-3">
                                <span class="bg-gray-200 dark:bg-gray-600 px-2 py-1 rounded text-sm text-gray-800 dark:text-white">Interior Designer</span>
                                <span class="bg-gray-200 dark:bg-gray-600 px-2 py-1 rounded text-sm text-gray-800 dark:text-white">Architect</span>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 mt-4">
                                <a href="tel:+1234567890" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Call</a>
                                <button class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-800 dark:text-white" data-bs-toggle="modal" data-bs-target="#contactModal">Message</button>
                                <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline" data-bs-toggle="modal" data-bs-target="#reviewsModal">View Reviews</a>
                            </div>
                        </div>
                        <!-- Favorited Property Card -->
                        <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-xl transition-transform hover:scale-105 relative">
                            <button class="absolute top-4 right-4 text-red-500" title="Remove from Favorites">
                                <i class="bi bi-heart-fill"></i>
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
