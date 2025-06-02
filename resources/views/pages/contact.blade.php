<x-app-layout>
    <style>
        .contact-simple-card {
            background: white;
            border: 1px solid rgba(154, 52, 18, 0.1);
            transition: all 0.3s ease;
        }

        .contact-simple-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .contact-icon-simple {
            color: var(--luxury-gold);
            background: rgba(154, 52, 18, 0.05);
        }
    </style>

    <!-- Simple Hero -->
    <section class="py-20 bg-gray-50 border-b border-gray-200">
        <div class="max-w-3xl mx-auto text-center px-6">
            <h1 class="font-serif text-4xl md:text-5xl font-light text-gray-900 mb-4">
                Contact Us
            </h1>
            <p class="font-sans text-gray-600 max-w-2xl mx-auto">
                We're here to help with any questions about our products or services.
            </p>
        </div>
    </section>

    <!-- Simple Contact Content -->
    <div class="py-16">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Contact Methods -->
                <div class="space-y-8">
                    <!-- Contact Card -->
                    <div class="contact-simple-card p-8">
                        <h2 class="font-serif text-2xl font-light text-gray-900 mb-6">
                            Contact Information
                        </h2>

                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="contact-icon-simple p-3 rounded-full">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-sans font-medium text-gray-900">Phone</h3>
                                    <p class="font-sans text-gray-600">+94 11 234 5678</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="contact-icon-simple p-3 rounded-full">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 4.733a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-sans font-medium text-gray-900">Email</h3>
                                    <p class="font-sans text-gray-600">contact@pearlandprestige.com</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="contact-icon-simple p-3 rounded-full">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-sans font-medium text-gray-900">Address</h3>
                                    <p class="font-sans text-gray-600">123 Luxury Avenue, Colombo 03, Sri Lanka</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="contact-simple-card p-8">
                        <h2 class="font-serif text-2xl font-light text-gray-900 mb-6">
                            Follow Us
                        </h2>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 hover:text-orange-800 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-orange-800 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-orange-800 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-simple-card p-8">
                    <h2 class="font-serif text-2xl font-light text-gray-900 mb-6">
                        Send Us a Message
                    </h2>

                    <form class="space-y-6">
                        <div>
                            <label for="name" class="font-sans block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 focus:border-orange-800 focus:outline-none">
                        </div>

                        <div>
                            <label for="email" class="font-sans block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 focus:border-orange-800 focus:outline-none">
                        </div>

                        <div>
                            <label for="subject" class="font-sans block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input type="text" id="subject" class="w-full px-4 py-2 border border-gray-300 focus:border-orange-800 focus:outline-none">
                        </div>

                        <div>
                            <label for="message" class="font-sans block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 focus:border-orange-800 focus:outline-none"></textarea>
                        </div>

                        <button type="submit" class="luxury-button px-8 py-3 text-sm bg-orange-800 text-white hover:orange-400 transition duration-300 rounded-lg">
                            Send Message
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Hours Section -->
    <div class="bg-gray-50 py-12 border-t border-gray-200">
        <div class="max-w-5xl mx-auto px-6">
            <div class="contact-simple-card p-8 max-w-2xl mx-auto">
                <h2 class="font-serif text-2xl font-light text-gray-900 mb-6 text-center">
                    Business Hours
                </h2>

                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="font-sans text-gray-700">Monday - Friday</span>
                        <span class="font-sans text-gray-900">9:00 AM - 8:00 PM</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-sans text-gray-700">Saturday</span>
                        <span class="font-sans text-gray-900">10:00 AM - 6:00 PM</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-sans text-gray-700">Sunday</span>
                        <span class="font-sans text-gray-900">11:00 AM - 5:00 PM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>