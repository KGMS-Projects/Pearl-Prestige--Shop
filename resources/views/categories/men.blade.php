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

        .hero-overlay {
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.4) 0%, rgba(154, 52, 18, 0.3) 100%);
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

        .price-luxury {
            color: var(--luxury-gold);
            font-weight: 600;
        }

        .wishlist-button {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .wishlist-button:hover {
            background: var(--luxury-gold);
            color: white;
            transform: scale(1.1);
        }

        .letter-spacing-luxury {
            letter-spacing: 0.15em;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--luxury-gold), transparent);
            margin: 40px auto;
            max-width: 200px;
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

        .section-clothing {
            background: white;
        }

        .section-shoes {
            background: #f9fafb;
        }
    </style>

    <!-- Hero Banner -->
    <section class="relative h-80 bg-cover bg-center overflow-hidden" style="background-image: url('/images/banners/men-banner2.png');">
        <div class="absolute inset-0 hero-overlay"></div>
        <div class="relative h-full flex items-center justify-center text-center text-white px-6">
            <div class="max-w-4xl animate-fade-in-up">
                <p class="font-sans text-sm letter-spacing-luxury text-gray-300 mb-4 uppercase">MEN'S COLLECTION</p>
                <h1 class="font-serif text-5xl md:text-7xl font-light mb-6 leading-tight">
                    Sartorial Excellence
                </h1>
                <p class="font-sans text-lg md:text-xl font-light max-w-2xl mx-auto leading-relaxed text-gray-200">
                    Discover refined pieces that embody modern masculinity and timeless sophistication
                </p>
            </div>
        </div>
    </section>

    <!-- Filter Bar -->
    <section class="py-8 bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-6">
                    <span class="font-sans text-sm text-gray-600 letter-spacing-luxury uppercase">Filter By:</span>
                    <select class="font-sans text-sm border border-gray-300 rounded-none px-4 py-2 focus:border-orange-800 focus:outline-none">
                        <option>All Categories</option>
                        <option>Suits & Blazers</option>
                        <option>Shirts</option>
                        <option>Accessories</option>
                        <option>Footwear</option>
                    </select>
                    <select class="font-sans text-sm border border-gray-300 rounded-none px-4 py-2 focus:border-orange-800 focus:outline-none">
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest First</option>
                    </select>
                </div>
                <div class="font-sans text-sm text-gray-600">
                    @if($products->count() > 0)
                    Showing {{ $products->count() }} {{ $products->count() === 1 ? 'product' : 'products' }}
                    @endif
                </div>
            </div>
        </div>
    </section>

    @php
    // Separate products by category
    $clothingProducts = $products->filter(function($product) {
    return in_array($product->subcategory->slug ?? $product->category->slug, ['suits', 'blazers', 'shirts', 'pants', 'tops', 'outerwear', 'clothing', 'formal-wear', 'casual']);
    });

    $shoeProducts = $products->filter(function($product) {
    return in_array($product->subcategory->slug ?? $product->category->slug, ['shoes', 'footwear', 'dress-shoes', 'casual-shoes', 'sneakers', 'boots']);
    });
    @endphp

    <!-- Clothing Section -->
    @if($clothingProducts->count() > 0)
    <section class="py-16 section-clothing">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl font-light text-gray-900 mb-6 luxury-heading">
                    Designer Clothing
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Meticulously crafted garments that define the modern gentleman's wardrobe with uncompromising quality
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($clothingProducts as $product)
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-lg">{{ $product->name }}</span>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="w-full h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
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
                        </div>

                        <!-- Product Info -->
                        <div class="p-6 relative z-10">
                            <!-- Category Tag -->
                            <div class="mb-3">
                                <span class="product-category-tag font-sans">
                                    {{ $product->subcategory->name ?? $product->category->name }}
                                </span>
                            </div>

                            <h3 class="font-serif text-xl font-medium text-gray-900 mb-3 leading-tight">
                                {{ $product->name }}
                            </h3>

                            <div class="flex items-center space-x-3 mb-4">
                                <span class="price-luxury font-sans text-lg">${{ number_format($product->price, 2) }}</span>
                                @if($product->isOnSale())
                                <span class="text-sm text-gray-500 line-through font-sans">${{ number_format($product->sale_price, 2) }}</span>
                                @endif
                            </div>

                            <!-- Quick View Button -->
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="view-details-link font-sans">View Details</span>
                            </div>
                        </div>
                    </a>

                    <!-- Wishlist Icon -->
                    <button class="wishlist-button absolute top-4 right-4 w-10 h-10 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>

            <!-- Load More Clothing -->
            @if($clothingProducts->count() >= 8)
            <div class="text-center mt-12">
                <a href="{{ route('category.clothing') }}" class="luxury-button px-12 py-4 inline-block text-sm">
                    View All Clothing
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Section Divider -->
    <div class="section-divider"></div>

    <!-- Footwear Section -->
    @if($shoeProducts->count() > 0)
    <section class="py-16 section-shoes">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl font-light text-gray-900 mb-6 luxury-heading">
                    Signature Footwear
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Timeless elegance meets contemporary functionality in our curated selection of luxury footwear
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($shoeProducts as $shoe)
                <div class="luxury-product-card group relative">
                    <a href="{{ route('products.show', $shoe->slug) }}" class="block">
                        <!-- Product Image -->
                        <div class="aspect-w-3 aspect-h-4 bg-gray-100 overflow-hidden relative">
                            @if($shoe->images && count($shoe->images) > 0 && $shoe->images[0] !== '/images/placeholder.jpg')
                            @php
                            $imagePath = $shoe->images[0];
                            $fullImagePath = public_path($imagePath);
                            @endphp

                            @if(file_exists($fullImagePath))
                            <img src="{{ $imagePath }}" alt="{{ $shoe->name }}"
                                class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="w-full h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-lg">{{ $shoe->name }}</span>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="w-full h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                                    </svg>
                                    <span class="font-serif text-gray-500 text-lg">{{ $shoe->name }}</span>
                                </div>
                            </div>
                            @endif

                            <!-- Sale Badge -->
                            @if($shoe->isOnSale())
                            <div class="absolute top-4 left-4 bg-red-600 text-white px-3 py-1 text-xs font-sans font-semibold letter-spacing-luxury uppercase">
                                Sale
                            </div>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-6 relative z-10">
                            <!-- Category Tag -->
                            <div class="mb-3">
                                <span class="product-category-tag font-sans">
                                    {{ $shoe->subcategory->name ?? $shoe->category->name }}
                                </span>
                            </div>

                            <h3 class="font-serif text-xl font-medium text-gray-900 mb-3 leading-tight">
                                {{ $shoe->name }}
                            </h3>

                            <div class="flex items-center space-x-3 mb-4">
                                <span class="price-luxury font-sans text-lg">${{ number_format($shoe->price, 2) }}</span>
                                @if($shoe->isOnSale())
                                <span class="text-sm text-gray-500 line-through font-sans">${{ number_format($shoe->sale_price, 2) }}</span>
                                @endif
                            </div>

                            <!-- Quick View Button -->
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="view-details-link font-sans">View Details</span>
                            </div>
                        </div>
                    </a>

                    <!-- Wishlist Icon -->
                    <button class="wishlist-button absolute top-4 right-4 w-10 h-10 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>

            <!-- Load More Shoes -->
            @if($shoeProducts->count() >= 8)
            <div class="text-center mt-12">
                <a href="{{ route('category.footwear') }}" class="luxury-button px-12 py-4 inline-block text-sm">
                    View All Footwear
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Empty State for when no products exist -->
    @if($clothingProducts->count() === 0 && $shoeProducts->count() === 0)
    <section class="py-20 bg-white">
        <div class="text-center">
            <div class="max-w-md mx-auto">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="font-serif text-2xl font-light text-gray-900 mb-4">
                    Collection Coming Soon
                </h3>
                <p class="font-sans text-gray-600 mb-8 leading-relaxed">
                    We're carefully curating new pieces for our men's collection. Please check back soon for exquisite new arrivals.
                </p>
                <a href="{{ route('products.index') }}" class="luxury-button px-12 py-4 inline-block text-sm">
                    Browse All Products
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Newsletter Subscription -->
    <!-- <section class="py-16 bg-slate-900 border-t border-gray-200">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h3 class="font-serif text-3xl md:text-4xl font-light text-slate-400 mb-4">
                Stay Updated
            </h3>
            <p class="font-sans text-gray-600 mb-8 max-w-2xl mx-auto">
                Be the first to discover our latest men's collections and exclusive offers
            </p>
            <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">
                <input type="email" placeholder="Enter your email"
                    class="flex-1 px-6 py-3 border border-gray-300 text-gray-900 placeholder-gray-500 focus:border-orange-800 focus:outline-none font-sans">
                <button class="luxury-button px-8 py-3 whitespace-nowrap">
                    SUBSCRIBE
                </button>
            </div>
        </div>
    </section> -->
</x-app-layout>