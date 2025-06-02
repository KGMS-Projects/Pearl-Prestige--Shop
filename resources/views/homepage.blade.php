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
            color: var(--luxury-black);
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }

        .luxury-card {
            background: white;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
        }

        .luxury-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(212, 175, 55, 0.05) 50%, transparent 70%);
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
        }

        .category-overlay {
            background: linear-gradient(0deg, rgba(26, 26, 26, 0.8) 0%, transparent 60%);
        }

        .product-card {
            background: white;
            border: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.4s ease;
        }

        .product-card:hover {
            border-color: var(--luxury-gold);
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--luxury-gold), transparent);
            margin: 60px auto;
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

        .letter-spacing-luxury {
            letter-spacing: 0.15em;
        }

        .promo-banner {
            background: linear-gradient(135deg, var(--luxury-black) 0%, #2a2a2a 100%);
            position: relative;
            overflow: hidden;
        }

        .promo-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect fill="none" stroke="%23D4AF37" stroke-width="0.5" x="0" y="0" width="20" height="20" opacity="0.1"/></svg>');
            background-size: 40px 40px;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative h-screen overflow-hidden">
        <!-- Video Background -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
            <source src="/mainimages/video01_1.mp4" type="video/mp4" />
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-0"></div>


        <div class="relative h-full flex items-center justify-center text-center text-white px-6">
            <div class="max-w-4xl animate-fade-in ">
                <p class="font-sans text-sm letter-spacing-luxury text-gray-300 mb-4 uppercase">SUMMER COLLECTION 2025</p>
                <h1 class="font-serif text-6xl md:text-8xl lg:text-9xl font-light mb-6 leading-none">
                    ÉLÉGANCE
                </h1>
                <p class="font-sans text-lg md:text-xl font-light mb-12 max-w-2xl mx-auto leading-relaxed text-gray-200">
                    Where timeless sophistication meets contemporary artistry. Discover pieces that define luxury.
                </p>
                <a href="#shop-by-category" class="luxury-button px-12 py-4 inline-block text-sm">
                    DISCOVER COLLECTION
                </a>
            </div>
        </div>
    </section>

    <!-- Shop by Category Section -->
    <section id="shop-by-category" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="font-serif text-5xl md:text-6xl font-light text-gray-900 mb-6 luxury-heading">
                    Collections
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Curated with precision, designed for those who appreciate the finest details
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Women's Collection -->
                <div class="group">
                    <a href="{{ route('category.women') }}" class="block luxury-card h-96 relative">
                        <img src="/mainimages/women-main.jpg" alt="Women's Collection" class="w-full h-full object-cover">
                        <div class="absolute inset-0 category-overlay"></div>
                        <div class="absolute bottom-8 left-8 right-8 text-white">
                            <div class="flex items-end justify-between">
                                <div>
                                    <h3 class="font-serif text-3xl font-light mb-2">Women</h3>
                                    <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-300">HAUTE COUTURE</p>
                                </div>
                                <div class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center group-hover:border-white/60 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Men's Collection -->
                <div class="group">
                    <a href="{{ route('category.men') }}" class="block luxury-card h-96 relative">
                        <img src="/mainimages/men-main.jpg" alt="Men's Collection" class="w-full h-full object-cover">
                        <div class="absolute inset-0 category-overlay"></div>
                        <div class="absolute bottom-8 left-8 right-8 text-white">
                            <div class="flex items-end justify-between">
                                <div>
                                    <h3 class="font-serif text-3xl font-light mb-2">Men</h3>
                                    <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-300">SARTORIAL EXCELLENCE</p>
                                </div>
                                <div class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center group-hover:border-white/60 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotional Banner -->
    <section class="promo-banner py-20 relative">
        <div class="max-w-4xl mx-auto text-center px-6 relative z-10">
            <p class="font-sans text-sm letter-spacing-luxury text-gray-400 mb-4 uppercase">EXCLUSIVE OFFER</p>
            <h2 class="font-serif text-4xl md:text-6xl font-light text-white mb-6">
                Private Sale Event
            </h2>
            <p class="font-sans text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                Access to limited editions and exclusive pieces. By invitation only.
            </p>
            <a href="#shop-by-category" class="luxury-button px-12 py-4 inline-block text-sm">
                VIEW COLLECTION
            </a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="font-serif text-5xl md:text-6xl font-light text-gray-900 mb-6 luxury-heading">
                    Signature Pieces
                </h2>
                <p class="font-sans text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Each piece tells a story of craftsmanship, heritage, and uncompromising attention to detail
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Small Leather Goods -->
                <div class="group">
                    <a href="{{ route('category.accessories') }}#volet" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accessories-leather.png" alt="Small Leather Goods" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Leather Goods
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                ARTISANAL CRAFT
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div>



                <!-- Fragrances -->
                <div class="group">
                    <a href="{{ route('category.accessories') }}#perfumes" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accessseries-freg.png" alt="Fragrances" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Fragrances
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                SIGNATURE SCENTS
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div>

                <!-- Belts -->
                <div class="group">
                    <a href="{{ route('category.accessories') }}#belts" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accesseries-belt.png" alt="Belts" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Accessories
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                STATEMENT PIECES
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div>

                <!-- Fashion Jewelry -->
                <!-- <div class="group">
                    <a href="{{ route('category.accessories') }}#jewelry" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accesseries-jewl.png" alt="Fashion Jewelry" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Fine Jewelry
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                PRECIOUS STONES
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div> -->

            </div>
        </div>
    </section>


</x-app-layout>