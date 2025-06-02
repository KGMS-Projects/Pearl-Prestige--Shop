<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pearl & Prestige') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Playwrite+IT+Moderna:wght@100..400&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <header class="header">
        <nav class="shadow-lg fixed top-0 left-0 w-full z-50 bg-white/90 backdrop-blur-md">
            <!-- Top Navigation Bar -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
                <!-- Search Bar -->
                <div class="hidden md:flex items-center">
                    <div class="relative">
                        <input type="search" placeholder="Search" class="w-64 h-8 pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-1 focus:ring-gray-400">
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-black hover:bg-gray-100 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Logo -->
                <a href="{{ route('home') }}" class="absolute left-1/2 transform -translate-x-1/2 flex-shrink-0 flex items-center text-2xl sm:text-3xl md:text-4xl font-bold" style="font-family: 'Viaoda Libre', cursive;">
                    Pearl & Prestige
                </a>

                <!-- Right Side Icons -->
                <div class="flex items-center space-x-4">
                    <!-- Wishlist -->
                    <a href="#" class="text-gray-700 hover:text-orange-800">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>

                    <!-- User Account -->
                    @auth
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-orange-800">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <!-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a> -->
                                @if(auth()->user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-100">Admin Panel</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-orange-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-orange-800">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>

                        <!-- Login/Register Dropdown -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-100">Login</a>
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-100">Register</a>
                            </div>
                        </div>
                    </div>
                    @endauth

                    <!-- Shopping Cart -->
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-orange-800 relative">

                        <!-- Cart Count Badge -->
                        <livewire:shopping-cart-icon />
                    </a>
                </div>
            </div>

            <!-- Main Navigation Menu -->
            <div class="hidden md:block border-t border-gray-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center space-x-8 py-1">
                        <a href="{{ route('products.index') }}" class="nav-item text-black hover:text-orange-800 px-3 py-2 text-lg font-medium" style="font-family: 'DM Serif Text', cursive; font-size: 1rem;">New Arrivals</a>
                        <a href="{{ route('category.women') }}" class="nav-item text-black hover:text-orange-800 px-3 py-2 text-lg font-medium" style="font-family: 'DM Serif Text', cursive; font-size: 1rem;">Women</a>
                        <a href="{{ route('category.men') }}" class="nav-item text-black hover:text-orange-800 px-3 py-2 text-lg font-medium" style="font-family: 'DM Serif Text', cursive; font-size: 1rem;">Men</a>
                        <a href="{{ route('category.accessories') }}" class="nav-item text-black hover:text-orange-800 px-3 py-2 text-lg font-medium" style="font-family: 'DM Serif Text', cursive; font-size: 1rem;">Accessories</a>
                        <a href="{{ route('contact') }}" class="nav-item text-black hover:text-orange-800 px-3 py-2 text-lg font-medium {{ request()->routeIs('contact') ? 'text-orange-800 font-bold' : '' }}" style="font-family: 'DM Serif Text', cursive; font-size: 1rem;">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-4 pt-2 pb-3">
                    <div class="relative">
                        <input type="search" placeholder="Search" class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none">
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <div class="space-y-1">
                        <a href="{{ route('products.index') }}" class="block px-4 py-2 text-black hover:text-orange-800 text-base font-medium" style="font-family: 'DM Serif Text'">New Arrivals</a>
                        <a href="{{ route('category.women') }}" class="block px-4 py-2 text-black hover:text-orange-800 text-base font-medium" style="font-family: 'DM Serif Text'">Women</a>
                        <a href="{{ route('category.men') }}" class="block px-4 py-2 text-black hover:text-orange-800 text-base font-medium" style="font-family: 'DM Serif Text'">Men</a>
                        <a href="{{ route('category.accessories') }}" class="block px-4 py-2 text-black hover:text-orange-800 text-base font-medium" style="font-family: 'DM Serif Text'">Accessories</a>
                        <a href="{{ route('contact') }}" class="block px-4 py-2 text-black hover:text-orange-800 text-base font-medium" style="font-family: 'DM Serif Text'">Contacts</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <main class="pt-24">
        {{ $slot }}
    </main>


    <!-- Footer -->
    <footer class="bg-slate-900 relative overflow-hidden">
        <!-- Elegant curve top -->
        <!-- <div class="absolute top-0 left-0 w-full h-16">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-full">
                <path d="M0,0 C400,60 800,60 1200,0 L1200,120 L0,120 Z" fill="#f8fafc" />
            </svg>
        </div> -->

        <div class="relative pt-12 pb-12 px-6">
            <!-- Newsletter Section -->
            <!--<div class="max-w-6xl mx-auto text-center mb-16">-->
            <!--    <h3 class="font-serif text-3xl md:text-4xl text-white mb-4">-->
            <!--        Stay Connected with Luxury-->
            <!--    </h3>-->
            <!--    <p class="font-sans text-gray-400 mb-8 max-w-2xl mx-auto">-->
            <!--        Be the first to discover our exclusive collections, private sales, and style insights-->
            <!--    </p>-->
            <!--    <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">-->
            <!--        <input type="email" placeholder="Enter your email"-->
            <!--            class="flex-1 px-6 py-3 bg-transparent border border-gray-600 text-white placeholder-gray-500 focus:border-yellow-600 focus:outline-none font-sans">-->
            <!--        <button class="luxury-button px-8 py-3 whitespace-nowrap">-->
            <!--            SUBSCRIBE-->
            <!--        </button>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Main Footer Content -->
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 mt-8">
                    <!-- Brand Section -->
                    <div class="lg:col-span-2">
                        <a href="{{ route('home') }}" class="inline-block mb-6">
                            <span class="font-serif text-3xl text-white">Pearl & Prestige</span>
                        </a>
                        <p class="font-sans text-gray-400 leading-relaxed mb-6 max-w-md">
                            At Pearl & Prestige, we offer luxurious, expertly crafted fashion pieces that embody elegance and timeless style, designed for those who appreciate the finest things in life.
                        </p>
                        <!-- Social Media Icons -->
                        <div class="flex space-x-6">
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.888-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.357-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Collections -->
                    <div class=mt-4>
                        <h4 class="font-sans font-semibold text-white mb-6 letter-spacing-luxury uppercase text-sm">Collections</h4>
                        <ul class="space-y-4 font-sans text-gray-400">
                            <li><a href="{{ route('products.index') }}" class="hover:text-white transition-colors duration-300">New Arrivals</a></li>
                            <li><a href="{{ route('category.women') }}" class="hover:text-white transition-colors duration-300">Women</a></li>
                            <li><a href="{{ route('category.men') }}" class="hover:text-white transition-colors duration-300">Men</a></li>
                            <li><a href="{{ route('category.accessories') }}" class="hover:text-white transition-colors duration-300">Accessories</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors duration-300">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Customer Care -->
                    <div class=mt-4>
                        <h4 class="font-sans font-semibold text-white mb-6 letter-spacing-luxury uppercase text-sm">Customer Care</h4>
                        <ul class="space-y-4 font-sans text-gray-400">
                            <!-- <li><a href="#" class="hover:text-white transition-colors duration-300">Contact Us</a></li> -->
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Size Guide</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Shipping & Returns</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Luxury Divider -->
                <div class="border-t border-gray-700 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <p class="font-sans text-sm text-gray-400">
                            © 2025 <span class="text-white">Pearl & Prestige</span>. All Rights Reserved.
                        </p>
                        <p class="font-sans text-sm text-gray-500">
                            Developed by <a href="#" class="text-orange-800 hover:text-orange-600 transition-colors">Mihilayan Sachinthana</a> (KGMS)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle Script
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Set active navigation item based on the current page
        const navItems = document.querySelectorAll('.nav-item');
        const currentPage = window.location.pathname;

        navItems.forEach(item => {
            item.classList.remove('text-orange-800', 'font-bold');

            if (item.getAttribute('href') === currentPage) {
                item.classList.add('text-orange-800', 'font-bold');
            }

            item.addEventListener('click', function() {
                navItems.forEach(nav => nav.classList.remove('text-orange-800', 'font-bold'));
                item.classList.add('text-orange-800', 'font-bold');
            });
        });
    </script>

    @livewireScripts
</body>

</html>