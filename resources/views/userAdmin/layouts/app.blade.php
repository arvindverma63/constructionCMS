<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constructify - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Hide bottom nav on desktop */
        @media (min-width: 768px) {
            .bottom-nav {
                display: none;
            }
        }
        /* Hide top nav on mobile */
        @media (max-width: 767px) {
            .top-nav {
                display: none;
            }
        }
        /* Dark mode styles */
        .dark .bg-gray-50 { background-color: #1f2937; }
        .dark .bg-white { background-color: #374151; }
        .dark .text-gray-800 { color: #d1d5db; }
        .dark .text-gray-600 { color: #9ca3af; }
        .dark .bg-gray-200 { background-color: #4b5563; }
        .dark .border-gray-200 { border-color: #4b5563; }
        .dark .hover\:bg-gray-100:hover { background-color: #4b5563; }
        .dark .bg-indigo-600 { background-color: #4f46e5; }
        .dark .hover\:bg-indigo-700:hover { background-color: #4338ca; }
        /* Smooth transitions */
        .transition-transform { transition: transform 0.3s ease; }
        .hover\:scale-105:hover { transform: scale(1.05); }
        /* Carousel styles */
        .carousel-item { transition: transform 0.5s ease-in-out; }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-700 duration-300">
    <!-- Top Navigation (Desktop) -->
    @include('userAdmin.partials.top-nav')

    <!-- Main Content -->
    @yield('content')

    <!-- Modals -->
    @include('userAdmin.partials.contact-modal')
    @include('userAdmin.partials.reviews-modal')

    <!-- Testimonials Section -->
    @include('userAdmin.partials.testimonials')

    <!-- Bottom Navigation (Mobile) -->
    @include('userAdmin.partials.bottom-nav')

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Constructify</h3>
                    <p class="text-gray-300">Your trusted platform for finding top contractors and properties across India.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-indigo-400">Architects</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-indigo-400">Civil Contractors</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-indigo-400">Interior Designers</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-indigo-400">About Us</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-indigo-400">FAQs</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-indigo-400">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-indigo-400"><i class="bi bi-facebook text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-indigo-400"><i class="bi bi-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-indigo-400"><i class="bi bi-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>
            <p class="text-center text-gray-300 mt-8">© 2025 Constructify. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Dark mode toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            localStorage.setItem('darkMode', document.body.classList.contains('dark'));
        });
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark');
        }

        // Search suggestions toggle
        document.getElementById('heroSearch')?.addEventListener('input', function() {
            const suggestions = document.getElementById('suggestions');
            suggestions.style.display = this.value ? 'block' : 'none';
        });

        // Price range slider
        const priceRange = document.getElementById('priceRange');
        const priceValue = document.getElementById('priceValue');
        if (priceRange && priceValue) {
            priceRange.addEventListener('input', () => {
                priceValue.textContent = `₹${parseInt(priceRange.value).toLocaleString('en-IN')}`;
            });
        }

        // Favorite button toggle
        document.querySelectorAll('.bi-heart').forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('bi-heart');
                button.classList.toggle('bi-heart-fill');
                button.classList.toggle('text-red-500');
            });
        });

        // Carousel functionality
        const carousel = document.getElementById('carousel');
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;
        document.getElementById('nextSlide')?.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        });
        document.getElementById('prevSlide')?.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        });
    </script>
</body>
</html>
