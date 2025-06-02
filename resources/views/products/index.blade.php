<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');

        :root {
            --luxury-gold: #9a3412;
            --luxury-black: #1a1a1a;
            --luxury-grey: #f8f8f8;
            --luxury-dark-grey: #666666;
            --luxury-cream: gray;
        }

        .font-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-sans {
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--luxury-cream);
        }

        .hero-overlay {
            background: linear-gradient(180deg, rgba(26, 26, 26, 0.3) 0%, rgba(26, 26, 26, 0.7) 100%);
        }

        .luxury-button {
            background: transparent;
            border: 2px solid var(--luxury-gold);
            color: var(--luxury-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
        }

        .luxury-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--luxury-gold);
            transition: left 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            z-index: -1;
        }

        .luxury-button:hover::before {
            left: 0;
        }

        .luxury-button:hover {
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(154, 52, 18, 0.3);
        }

        .luxury-product-card {
            background: white;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(154, 52, 18, 0.1);
        }

        .luxury-product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(154, 52, 18, 0.05) 50%, transparent 70%);
            transform: translateX(-100%) rotate(45deg);
            transition: transform 0.6s ease;
            z-index: 1;
        }

        .luxury-product-card:hover::before {
            transform: translateX(100%) rotate(45deg);
        }

        .luxury-product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border-color: var(--luxury-gold);
        }

        .price-luxury {
            color: var(--luxury-gold);
            font-weight: 600;
        }

        .wishlist-button {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            border: 1px solid rgba(154, 52, 18, 0.1);
        }

        .wishlist-button:hover {
            background: var(--luxury-gold);
            color: white;
            transform: scale(1.1);
            border-color: var(--luxury-gold);
        }

        .letter-spacing-luxury {
            letter-spacing: 0.15em;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .luxury-heading {
            position: relative;
            display: inline-block;
        }

        .luxury-heading::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background: var(--luxury-gold);
        }

        .product-category-tag {
            background: rgba(154, 52, 18, 0.1);
            color: var(--luxury-gold);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
        }

        .view-details-link {
            color: var(--luxury-gold);
            border-bottom: 1px solid var(--luxury-gold);
            font-size: 0.875rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .view-details-link:hover {
            color: var(--luxury-black);
            border-color: var(--luxury-black);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--luxury-cream) 0%, #f8f9fa 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(154, 52, 18, 0.03) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(150px, -150px);
        }

        .filter-bar {
            background: white;
            border-bottom: 1px solid rgba(154, 52, 18, 0.1);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .filter-select {
            background: white;
            border: 1px solid rgba(154, 52, 18, 0.2);
            color: var(--luxury-dark-grey);
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            border-color: var(--luxury-gold);
            outline: none;
            box-shadow: 0 0 0 3px rgba(154, 52, 18, 0.1);
        }

        .empty-state {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid rgba(154, 52, 18, 0.1);
            border-radius: 1rem;
        }

        .newsletter-section {
            background: linear-gradient(135deg, var(--luxury-black) 0%, #2a2a2a 100%);
            position: relative;
            overflow: hidden;
        }

        .newsletter-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect fill="none" stroke="%23D4AF37" stroke-width="0.3" x="0" y="0" width="20" height="20" opacity="0.1"/></svg>');
            background-size: 40px 40px;
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section py-24 relative">
        <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
            <div class="animate-fade-in">
                <p class="font-sans text-sm letter-spacing-luxury text-gray-500 mb-4 uppercase">NEW ARRIVALS</p>
                <h1 class="font-serif text-6xl md:text-8xl font-light text-gray-900 mb-6 leading-none">
                    NOUVELLE
                </h1>
                <p class="font-sans text-lg md:text-xl font-light text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Discover our latest luxury collection, where contemporary design meets timeless craftsmanship in every exquisite piece.
                </p>
            </div>
        </div>
    </section>

    <!-- Filter Bar -->
    <section class="filter-bar py-6">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-6">
                    <span class="font-sans text-sm text-gray-600 letter-spacing-luxury uppercase">Filter By:</span>
                    <select class="filter-select text-sm rounded-none px-4 py-2">
                        <option>All Categories</option>
                        <option>Women</option>
                        <option>Men</option>
                        <option>Accessories</option>
                    </select>
                    <select class="filter-select text-sm rounded-none px-4 py-2">
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest First</option>
                        <option>Most Popular</option>
                    </select>
                    <select class="filter-select text-sm rounded-none px-4 py-2">
                        <option>All Sizes</option>
                        <option>XS</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                    </select>
                </div>
                <div class="font-sans text-sm text-gray-600">
                    @if($products->count() > 0)
                    Showing {{ $products->count() }} {{ $products->count() === 1 ? 'piece' : 'pieces' }}
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                <div class="luxury-product-card group relative">
                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                        <!-- Product Image -->
                        <div class="aspect-w-3 aspect-h-4 bg-gray-100 overflow-hidden relative">
                            @if($product->images && count($product->images) > 0 && $product->images[0] !== '/images/placeholder.jpg')
                            @php
                            $imagePath = $product->images[0];
                            $fullImagePath = public_path($imagePath);
                            @endphp

                            @if(file_exists($fullImagePath))
                            <img src="{{ $imagePath }}" alt="{{ $product->name }}"
                                class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="w-full h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-lg">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="w-full h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-lg">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif

                            <!-- Sale Badge -->
                            @if($product->isOnSale())
                            <div class="absolute top-4 left-4 bg-red-600 text-white px-3 py-1 text-xs font-sans font-semibold letter-spacing-luxury uppercase">
                                Sale
                            </div>
                            @endif

                            <!-- New Badge -->
                            @if($product->created_at && $product->created_at->diffInDays(now()) <= 30)
                                <div class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 text-xs font-sans font-semibold letter-spacing-luxury uppercase">
                                New
                        </div>
                        @endif
                </div>

                <!-- Product Info -->
                <div class="p-6 text-center relative z-10">
                    <!-- Category Tag -->
                    <div class="mb-3">
                        <span class="product-category-tag font-sans">
                            {{ $product->subcategory->name ?? $product->category->name }}
                        </span>
                    </div>

                    <h3 class="font-serif text-xl font-medium text-gray-900 mb-3 leading-tight">
                        {{ $product->name }}
                    </h3>

                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <span class="price-luxury font-sans text-lg">${{ number_format($product->price, 2) }}</span>
                        @if($product->isOnSale())
                        <span class="text-sm text-gray-500 line-through font-sans">${{ number_format($product->sale_price, 2) }}</span>
                        @endif
                    </div>

                    <!-- Quick View Button -->
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="view-details-link font-sans">Discover More</span>
                    </div>
                </div>
                </a>

                <!-- Wishlist Button -->
                <button class="wishlist-button absolute top-4 right-4 w-10 h-10 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </button>
            </div>
            @endforeach
        </div>

        <!-- Load More Section -->
        <div class="text-center mt-16">
            <p class="font-sans text-gray-600 mb-6">Showing {{ $products->count() }} of {{ $products->count() }} pieces</p>
            <button class="luxury-button px-12 py-4 text-sm">
                LOAD MORE
            </button>
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-state text-center py-20 px-8 max-w-md mx-auto">
            <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <h3 class="font-serif text-3xl font-light text-gray-900 mb-4">
                New Collection Coming Soon
            </h3>
            <p class="font-sans text-gray-600 mb-8 leading-relaxed">
                Our designers are meticulously crafting the next generation of luxury pieces. Please return soon to discover our latest arrivals.
            </p>
            <a href="{{ route('home') }}" class="luxury-button px-12 py-4 inline-block text-sm">
                EXPLORE COLLECTIONS
            </a>
        </div>
        @endif
        </div>
    </section>

    <!-- Featured Categories Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl font-light text-gray-900 mb-6 luxury-heading">
                    Explore Collections
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Discover our curated selections across different categories and styles
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Women's Collection -->
                <div class="group text-center">
                    <a href="{{ route('category.women') }}" class="block">
                        <div class="luxury-product-card p-12 h-64 flex items-center justify-center bg-gradient-to-br from-pink-50 to-rose-50 mb-6">
                            <div>
                                <svg class="w-16 h-16 text-rose-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <h3 class="font-serif text-2xl font-light text-gray-900">Women's Collection</h3>
                            </div>
                        </div>
                        <p class="font-sans text-gray-600">Elegant & Contemporary</p>
                    </a>
                </div>

                <!-- Men's Collection -->
                <div class="group text-center">
                    <a href="{{ route('category.men') }}" class="block">
                        <div class="luxury-product-card p-12 h-64 flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50 mb-6">
                            <div>
                                <svg class="w-16 h-16 text-blue-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <h3 class="font-serif text-2xl font-light text-gray-900">Men's Collection</h3>
                            </div>
                        </div>
                        <p class="font-sans text-gray-600">Sophisticated & Modern</p>
                    </a>
                </div>

                <!-- Accessories -->
                <div class="group text-center">
                    <a href="{{ route('category.accessories') }}" class="block">
                        <div class="luxury-product-card p-12 h-64 flex items-center justify-center bg-gradient-to-br from-yellow-50 to-amber-50 mb-6">
                            <div>
                                <svg class="w-16 h-16 text-amber-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                                </svg>
                                <h3 class="font-serif text-2xl font-light text-gray-900">Luxury Accessories</h3>
                            </div>
                        </div>
                        <p class="font-sans text-gray-600">Exquisite Details</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <!-- <section class="newsletter-section py-20 relative">
        <div class="max-w-4xl mx-auto text-center px-6 relative z-10">
            <h3 class="font-serif text-4xl md:text-5xl font-light text-white mb-6">
                Stay Ahead of Fashion
            </h3>
            <p class="font-sans text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                Be the first to discover our new arrivals, exclusive collections, and private sale events
            </p>
            <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">
                <input type="email" placeholder="Enter your email"
                    class="flex-1 px-6 py-4 bg-transparent border border-gray-600 text-white placeholder-gray-400 focus:border-orange-800 focus:outline-none font-sans">
                <button class="luxury-button px-10 py-4 whitespace-nowrap border-white text-white hover:bg-white hover:text-black">
                    SUBSCRIBE
                </button>
            </div>
        </div>
    </section> -->
</x-app-layout>