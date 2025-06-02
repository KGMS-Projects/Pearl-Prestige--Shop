<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');

        :root {
            --luxury-gold: #9a3412;
            --luxury-black: #1a1a1a;
            --luxury-grey: #f8f8f8;
            --luxury-dark-grey: #666666;
            --luxury-cream: #fefefe;
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

        .luxury-card {
            background: white;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(154, 52, 18, 0.1);
        }

        .luxury-card::before {
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

        .luxury-card:hover::before {
            transform: translateX(100%) rotate(45deg);
        }

        .luxury-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border-color: var(--luxury-gold);
        }

        .category-section {
            scroll-margin-top: 140px;
            /* Reduced from 160px */
        }

        .price-luxury {
            color: var(--luxury-gold);
            font-weight: 600;
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

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--luxury-gold), transparent);
            margin: 30px auto;
            /* Reduced from 60px */
            max-width: 200px;
        }

        .luxury-heading {
            position: relative;
            display: inline-block;
        }

        .luxury-heading::after {
            content: '';
            position: absolute;
            bottom: -6px;
            /* Reduced from -8px */
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            /* Reduced from 60px */
            height: 2px;
            background: var(--luxury-gold);
        }

        .category-nav {
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 100px;
            z-index: 40;
            backdrop-filter: blur(10px);
        }

        .category-nav a {
            color: var(--luxury-dark-grey);
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
            font-weight: 300;
        }

        .category-nav a:hover,
        .category-nav a.active {
            color: var(--luxury-gold);
            border-bottom-color: var(--luxury-gold);
        }

        .product-category-tag {
            background: rgba(154, 52, 18, 0.1);
            color: var(--luxury-gold);
            padding: 3px 10px;
            /* Reduced from 4px 12px */
            border-radius: 15px;
            /* Reduced from 20px */
            font-size: 0.7rem;
            /* Reduced from 0.75rem */
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
        }

        .view-details-link {
            color: var(--luxury-gold);
            border-bottom: 1px solid var(--luxury-gold);
            font-size: 0.8rem;
            /* Reduced from 0.875rem */
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .view-details-link:hover {
            color: var(--luxury-black);
            border-color: var(--luxury-black);
        }

        .category-hero {
            background: linear-gradient(135deg, var(--luxury-cream) 0%, #f8f9fa 100%);
            position: relative;
            overflow: hidden;
        }

        .category-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            /* Reduced from 400px */
            height: 300px;
            /* Reduced from 400px */
            background: radial-gradient(circle, rgba(154, 52, 18, 0.03) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(100px, -100px);
            /* Reduced from 150px, -150px */
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

        /* Compact product cards */
        .compact-product-card {
            height: 320px;
            /* Reduced from default height */
        }

        .compact-product-image {
            height: 180px;
            /* Reduced from 256px (h-64) */
        }

        .compact-product-info {
            padding: 1rem;
            /* Reduced from 1.5rem */
        }
    </style>

    @php
    // Filter products by category with more robust search
    $voletProducts = $products->filter(function($product) {
    return stripos($product->category->name ?? '', 'volet') !== false ||
    stripos($product->subcategory->name ?? '', 'volet') !== false ||
    stripos($product->name ?? '', 'volet') !== false;
    });

    $perfumeProducts = $products->filter(function($product) {
    return stripos($product->category->name ?? '', 'perfume') !== false ||
    stripos($product->subcategory->name ?? '', 'perfume') !== false ||
    stripos($product->category->name ?? '', 'fragrance') !== false ||
    stripos($product->subcategory->name ?? '', 'fragrance') !== false ||
    stripos($product->name ?? '', 'perfume') !== false ||
    stripos($product->name ?? '', 'fragrance') !== false;
    });

    $beltProducts = $products->filter(function($product) {
    return stripos($product->category->name ?? '', 'belt') !== false ||
    stripos($product->subcategory->name ?? '', 'belt') !== false ||
    stripos($product->name ?? '', 'belt') !== false;
    });

    $jewelryProducts = $products->filter(function($product) {
    return stripos($product->category->name ?? '', 'jewelry') !== false ||
    stripos($product->subcategory->name ?? '', 'jewelry') !== false ||
    stripos($product->category->name ?? '', 'jewellery') !== false ||
    stripos($product->subcategory->name ?? '', 'jewellery') !== false ||
    stripos($product->name ?? '', 'jewelry') !== false ||
    stripos($product->name ?? '', 'jewellery') !== false;
    });
    @endphp

    <!-- Hero Section - Compact -->
    <section class="category-hero py-12 relative"> <!-- Reduced from py-24 -->
        <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
            <div class="animate-fade-in">
                <p class="font-sans text-sm letter-spacing-luxury text-gray-500 mb-3 uppercase">LUXURY ACCESSORIES</p> <!-- Reduced mb-4 to mb-3 -->
                <h1 class="font-serif text-4xl md:text-6xl font-light text-gray-900 mb-4 leading-none"> <!-- Reduced from text-6xl md:text-8xl and mb-6 to mb-4 -->
                    ÉLÉGANCE
                </h1>
                <p class="font-sans text-base md:text-lg font-light text-gray-600 max-w-2xl mx-auto leading-relaxed"> <!-- Reduced from text-lg md:text-xl and max-w-3xl to max-w-2xl -->
                    Where timeless sophistication meets contemporary artistry. Discover accessories that define luxury.
                </p>
            </div>
        </div>
    </section>

    <!-- Category Navigation - Compact -->
    <nav class="category-nav py-4"> <!-- Reduced from py-6 -->
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-center space-x-12"> <!-- Reduced from space-x-16 -->
                <a href="#volet" class="font-sans text-sm py-2 active letter-spacing-luxury uppercase">Volet</a>
                <a href="#perfumes" class="font-sans text-sm py-2 letter-spacing-luxury uppercase">Fragrances</a>
                <a href="#belts" class="font-sans text-sm py-2 letter-spacing-luxury uppercase">Belts</a>
                <!-- <a href="#jewelry" class="font-sans text-sm py-2 letter-spacing-luxury uppercase">Jewelry</a> -->
            </div>
        </div>
    </nav>

    <!-- Volet Section - Compact -->
    <section id="volet" class="category-section py-12 bg-white"> <!-- Reduced from py-20 -->
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12"> <!-- Reduced from mb-20 -->
                <h2 class="font-serif text-3xl md:text-4xl font-light text-gray-900 mb-4 luxury-heading"> <!-- Reduced from text-5xl md:text-6xl and mb-6 to mb-4 -->
                    Volet Collection
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Discover our exquisite volet collection, where elegance meets functionality in perfect harmony
                </p>
            </div>

            @if($voletProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"> <!-- Reduced from gap-8 -->
                @foreach($voletProducts as $product)
                <div class="luxury-card group relative compact-product-card">
                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                        <!-- Product Image - Compact -->
                        <div class="aspect-w-1 aspect-h-1 bg-gray-100 overflow-hidden relative">
                            @if($product->images && count($product->images) > 0 && $product->images[0] !== '/images/placeholder.jpg')
                            @php
                            $imagePath = $product->images[0];
                            $fullImagePath = public_path($imagePath);
                            @endphp

                            @if(file_exists($fullImagePath))
                            <img src="{{ $imagePath }}" alt="{{ $product->name }}"
                                class="w-full compact-product-image object-cover group-hover:scale-105 transition-transform duration-500"> <!-- Reduced height -->
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- Reduced from w-16 h-16 and mb-3 -->
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span> <!-- Reduced from text-lg -->
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif

                            <!-- Sale Badge -->
                            @if($product->isOnSale())
                            <div class="absolute top-3 left-3 bg-red-600 text-white px-2 py-1 text-xs font-sans font-semibold letter-spacing-luxury uppercase"> <!-- Reduced from top-4 left-4 and px-3 py-1 -->
                                Sale
                            </div>
                            @endif
                        </div>

                        <!-- Product Info - Compact -->
                        <div class="compact-product-info text-center relative z-10">
                            <div class="mb-2"> <!-- Reduced from mb-3 -->
                                <span class="product-category-tag font-sans">
                                    {{ $product->subcategory->name ?? $product->category->name }}
                                </span>
                            </div>

                            <h3 class="font-serif text-lg font-medium text-gray-900 mb-2 leading-tight"> <!-- Reduced from text-xl and mb-3 -->
                                {{ $product->name }}
                            </h3>

                            <div class="flex items-center justify-center space-x-3 mb-3"> <!-- Reduced from mb-4 -->
                                <span class="price-luxury font-sans text-base">${{ number_format($product->price, 2) }}</span> <!-- Reduced from text-lg -->
                                @if($product->isOnSale())
                                <span class="text-sm text-gray-500 line-through font-sans">${{ number_format($product->sale_price, 2) }}</span>
                                @endif
                            </div>

                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="view-details-link font-sans">Discover More</span>
                            </div>
                        </div>
                    </a>

                    <!-- Wishlist Button -->
                    <button class="wishlist-button absolute top-3 right-3 w-8 h-8 rounded-full flex items-center justify-center shadow-lg"> <!-- Reduced from top-4 right-4 and w-10 h-10 -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- Reduced from w-5 h-5 -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state text-center py-12 px-6"> <!-- Reduced from py-16 px-8 -->
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- Reduced from w-20 h-20 and mb-6 -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="font-serif text-xl font-light text-gray-900 mb-3">Collection Coming Soon</h3> <!-- Reduced from text-2xl and mb-4 -->
                <p class="font-sans text-gray-600 mb-4">We're curating exceptional volet pieces for your collection.</p> <!-- Reduced from mb-6 -->
                <a href="{{ route('products.index') }}" class="luxury-button px-6 py-2 text-sm">View All Products</a> <!-- Reduced from px-8 py-3 -->
            </div>
            @endif
        </div>
    </section>

    <!-- Perfumes Section - Compact -->
    <section id="perfumes" class="category-section py-12 bg-gray-50"> <!-- Reduced from py-20 -->
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="font-serif text-3xl md:text-4xl font-light text-gray-900 mb-4 luxury-heading">
                    Signature Fragrances
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Distinctive scents that tell your story, crafted with the finest ingredients and attention to detail
                </p>
            </div>

            @if($perfumeProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($perfumeProducts as $product)
                <div class="luxury-card group relative compact-product-card">
                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                        <div class="aspect-w-1 aspect-h-1 bg-gray-100 overflow-hidden relative">
                            @if($product->images && count($product->images) > 0 && $product->images[0] !== '/images/placeholder.jpg')
                            @php
                            $imagePath = $product->images[0];
                            $fullImagePath = public_path($imagePath);
                            @endphp

                            @if(file_exists($fullImagePath))
                            <img src="{{ $imagePath }}" alt="{{ $product->name }}"
                                class="w-full compact-product-image object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif

                            @if($product->isOnSale())
                            <div class="absolute top-3 left-3 bg-red-600 text-white px-2 py-1 text-xs font-sans font-semibold letter-spacing-luxury uppercase">
                                Sale
                            </div>
                            @endif
                        </div>

                        <div class="compact-product-info text-center relative z-10">
                            <div class="mb-2">
                                <span class="product-category-tag font-sans">
                                    {{ $product->subcategory->name ?? $product->category->name }}
                                </span>
                            </div>

                            <h3 class="font-serif text-lg font-medium text-gray-900 mb-2 leading-tight">
                                {{ $product->name }}
                            </h3>

                            <div class="flex items-center justify-center space-x-3 mb-3">
                                <span class="price-luxury font-sans text-base">${{ number_format($product->price, 2) }}</span>
                                @if($product->isOnSale())
                                <span class="text-sm text-gray-500 line-through font-sans">${{ number_format($product->sale_price, 2) }}</span>
                                @endif
                            </div>

                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="view-details-link font-sans">Discover More</span>
                            </div>
                        </div>
                    </a>

                    <button class="wishlist-button absolute top-3 right-3 w-8 h-8 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state text-center py-12 px-6">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                </svg>
                <h3 class="font-serif text-xl font-light text-gray-900 mb-3">Curating Signature Scents</h3>
                <p class="font-sans text-gray-600 mb-4">Our perfumers are crafting distinctive fragrances for your collection.</p>
                <a href="{{ route('products.index') }}" class="luxury-button px-6 py-2 text-sm">View All Products</a>
            </div>
            @endif
        </div>
    </section>

    <!-- Belts Section - Compact -->
    <section id="belts" class="category-section py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="font-serif text-3xl md:text-4xl font-light text-gray-900 mb-4 luxury-heading">
                    Premium Belts
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Statement pieces that define your silhouette and express your personal style with refined elegance
                </p>
            </div>

            @if($beltProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($beltProducts as $product)
                <div class="luxury-card group relative compact-product-card">
                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                        <div class="aspect-w-1 aspect-h-1 bg-gray-100 overflow-hidden relative">
                            @if($product->images && count($product->images) > 0 && $product->images[0] !== '/images/placeholder.jpg')
                            @php
                            $imagePath = $product->images[0];
                            $fullImagePath = public_path($imagePath);
                            @endphp

                            @if(file_exists($fullImagePath))
                            <img src="{{ $imagePath }}" alt="{{ $product->name }}"
                                class="w-full compact-product-image object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif

                            @if($product->isOnSale())
                            <div class="absolute top-3 left-3 bg-red-600 text-white px-2 py-1 text-xs font-sans font-semibold letter-spacing-luxury uppercase">
                                Sale
                            </div>
                            @endif
                        </div>

                        <div class="compact-product-info text-center relative z-10">
                            <div class="mb-2">
                                <span class="product-category-tag font-sans">
                                    {{ $product->subcategory->name ?? $product->category->name }}
                                </span>
                            </div>

                            <h3 class="font-serif text-lg font-medium text-gray-900 mb-2 leading-tight">
                                {{ $product->name }}
                            </h3>

                            <div class="flex items-center justify-center space-x-3 mb-3">
                                <span class="price-luxury font-sans text-base">${{ number_format($product->price, 2) }}</span>
                                @if($product->isOnSale())
                                <span class="text-sm text-gray-500 line-through font-sans">${{ number_format($product->sale_price, 2) }}</span>
                                @endif
                            </div>

                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="view-details-link font-sans">Discover More</span>
                            </div>
                        </div>
                    </a>

                    <button class="wishlist-button absolute top-3 right-3 w-8 h-8 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state text-center py-12 px-6">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5"></path>
                </svg>
                <h3 class="font-serif text-xl font-light text-gray-900 mb-3">Crafting Statement Pieces</h3>
                <p class="font-sans text-gray-600 mb-4">Our artisans are creating refined belts for your wardrobe.</p>
                <a href="{{ route('products.index') }}" class="luxury-button px-6 py-2 text-sm">View All Products</a>
            </div>
            @endif
        </div>
    </section>

    <!-- Jewelry Section - Compact -->
    <!-- <section id="jewelry" class="category-section py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="font-serif text-3xl md:text-4xl font-light text-gray-900 mb-4 luxury-heading">
                    Fine Jewelry
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Timeless pieces that capture light and elegance, designed to complement your most cherished moments
                </p>
            </div>

            @if($jewelryProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($jewelryProducts as $product)
                <div class="luxury-card group relative compact-product-card">
                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                        <div class="aspect-w-1 aspect-h-1 bg-gray-100 overflow-hidden relative">
                            @if($product->images && count($product->images) > 0 && $product->images[0] !== '/images/placeholder.jpg')
                            @php
                            $imagePath = $product->images[0];
                            $fullImagePath = public_path($imagePath);
                            @endphp

                            @if(file_exists($fullImagePath))
                            <img src="{{ $imagePath }}" alt="{{ $product->name }}"
                                class="w-full compact-product-image object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="w-full compact-product-image bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-base">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif

                            @if($product->isOnSale())
                            <div class="absolute top-3 left-3 bg-red-600 text-white px-2 py-1 text-xs font-sans font-semibold letter-spacing-luxury uppercase">
                                Sale
                            </div>
                            @endif
                        </div>

                        <div class="compact-product-info text-center relative z-10">
                            <div class="mb-2">
                                <span class="product-category-tag font-sans">
                                    {{ $product->subcategory->name ?? $product->category->name }}
                                </span>
                            </div>

                            <h3 class="font-serif text-lg font-medium text-gray-900 mb-2 leading-tight">
                                {{ $product->name }}
                            </h3>

                            <div class="flex items-center justify-center space-x-3 mb-3">
                                <span class="price-luxury font-sans text-base">${{ number_format($product->price, 2) }}</span>
                                @if($product->isOnSale())
                                <span class="text-sm text-gray-500 line-through font-sans">${{ number_format($product->sale_price, 2) }}</span>
                                @endif
                            </div>

                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="view-details-link font-sans">Discover More</span>
                            </div>
                        </div>
                    </a>

                    <button class="wishlist-button absolute top-3 right-3 w-8 h-8 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state text-center py-12 px-6">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                </svg>
                <h3 class="font-serif text-xl font-light text-gray-900 mb-3">Creating Timeless Elegance</h3>
                <p class="font-sans text-gray-600 mb-4">Our jewelers are crafting exquisite pieces for your collection.</p>
                <a href="{{ route('products.index') }}" class="luxury-button px-6 py-2 text-sm">View All Products</a>
            </div>
            @endif
        </div>
    </section> -->

    <!-- Newsletter Section - Compact -->
    <!-- <section class="newsletter-section py-12 relative"> 
        <div class="max-w-4xl mx-auto text-center px-6 relative z-10">
            <h3 class="font-serif text-3xl md:text-4xl font-light text-white mb-4"> 
                Exclusive Access
            </h3>
            <p class="font-sans text-gray-300 mb-6 max-w-2xl mx-auto leading-relaxed"> 
                Be the first to discover our latest collections, private sales, and personalized styling recommendations
            </p>
            <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-3"> 
                <input type="email" placeholder="Enter your email"
                    class="flex-1 px-5 py-3 bg-transparent border border-gray-600 text-white placeholder-gray-400 focus:border-orange-800 focus:outline-none font-sans"> 
                <button class="luxury-button px-8 py-3 whitespace-nowrap border-white text-white hover:bg-white hover:text-black"> 
                    SUBSCRIBE
                </button>
            </div>
        </div>
    </section> -->

    <script>
        // Smooth scrolling for category navigation
        document.querySelectorAll('.category-nav a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }

                // Update active state
                document.querySelectorAll('.category-nav a').forEach(a => a.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</x-app-layout>