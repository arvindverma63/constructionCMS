<!-- Contact Form Section -->
<section class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 transition-all duration-300">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">Get in Touch</h2>
            <form action="" method="POST" class="space-y-6">
                @csrf
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-2">Your
                        Name</label>
                    <div class="relative">
                        <input type="text" id="name" name="name"
                            class="w-full p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                            placeholder="Enter your name" required>
                        <i
                            class="bi bi-person-fill absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>
                </div>
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-2">Your
                        Email</label>
                    <div class="relative">
                        <input type="email" id="email" name="email"
                            class="w-full p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                            placeholder="Enter your email" required>
                        <i
                            class="bi bi-envelope-fill absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>
                </div>
                <!-- Message Field -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-2">Your
                        Message</label>
                    <textarea id="message" name="message"
                        class="w-full p-4 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                        rows="5" placeholder="Write your message here..." required></textarea>
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-800 font-medium transition-all duration-200">
                        <i class="bi bi-send-fill mr-2"></i>Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
