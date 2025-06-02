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
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border-color: var(--luxury-gold);
        }

        .price-luxury {
            color: var(--luxury-gold);
            font-weight: 600;
            font-size: 1.5rem;
        }

        .letter-spacing-luxury {
            letter-spacing: 0.15em;
        }

        .breadcrumb-link {
            color: var(--luxury-dark-grey);
            transition: all 0.3s ease;
            font-weight: 300;
        }

        .breadcrumb-link:hover {
            color: var(--luxury-gold);
        }

        .image-gallery {
            position: relative;
        }

        .main-image {
            background: white;
            border: 1px solid rgba(154, 52, 18, 0.1);
            transition: all 0.3s ease;
        }

        .main-image:hover {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .main-image img {
            transition: opacity 0.3s ease;
        }

        .thumbnail-image {
            background: white;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .thumbnail-image:hover,
        .thumbnail-image.active {
            border-color: var(--luxury-gold);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(154, 52, 18, 0.2);
        }

        .thumbnail-image.active {
            border-color: var(--luxury-gold);
            box-shadow: 0 0 20px rgba(154, 52, 18, 0.3);
        }

        .product-details {
            background: white;
            border: 1px solid rgba(154, 52, 18, 0.05);
        }

        .accordion-item {
            border-bottom: 1px solid rgba(154, 52, 18, 0.1);
        }

        .accordion-header {
            transition: all 0.3s ease;
        }

        .accordion-header:hover {
            background: rgba(154, 52, 18, 0.02);
        }

        .product-badge {
            background: linear-gradient(135deg, var(--luxury-gold), #d2691e);
            color: white;
            font-weight: 500;
        }

        .stock-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .stock-indicator.low-stock {
            background: rgba(234, 179, 8, 0.1);
            color: #ca8a04;
        }

        .stock-indicator.out-of-stock {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--luxury-gold), transparent);
            margin: 2rem 0;
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
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--luxury-gold);
        }

        .related-products {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        .image-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <div class="max-w-7xl mx-auto px-6 py-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center text-sm text-gray-500 mb-12 font-sans">
            <a href="{{ route('home') }}" class="breadcrumb-link letter-spacing-luxury uppercase">Home</a>
            <svg class="w-4 h-4 mx-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('category.' . $product->category->slug) }}" class="breadcrumb-link letter-spacing-luxury uppercase">{{ $product->category->name }}</a>
            <svg class="w-4 h-4 mx-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-900 font-medium">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Product Images -->
            <div class="image-gallery space-y-6">
                <!-- Main Image -->
                <div class="main-image aspect-w-1 aspect-h-1 rounded-2xl overflow-hidden">
                    @if($product->images && count($product->images) > 0 && $product->images[0] !== '/images/placeholder.jpg')
                    @php
                    $imagePath = $product->images[0];
                    $fullImagePath = public_path($imagePath);
                    @endphp

                    @if(file_exists($fullImagePath))
                    <img id="mainImage" src="{{ $imagePath }}" alt="{{ $product->name }}" class="w-full h-[600px] object-cover">
                    @else
                    <div id="mainImage" class="w-full h-[600px] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-serif text-gray-500 text-xl">{{ $product->name }}</span>
                        </div>
                    </div>
                    @endif
                    @else
                    <div id="mainImage" class="w-full h-[600px] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-serif text-gray-500 text-xl">{{ $product->name }}</span>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Thumbnail Images -->
                <div class="grid grid-cols-4 gap-4">
                    <!-- First thumbnail for main image -->
                    @if($product->images && count($product->images) > 0)
                    @php
                    $firstImage = $product->images[0];
                    $fullImagePath = public_path($firstImage);
                    @endphp
                    <div class="thumbnail-image active aspect-w-1 aspect-h-1 rounded-xl overflow-hidden"
                        data-image="{{ $firstImage }}"
                        data-index="0">
                        @if(file_exists($fullImagePath))
                        <img src="{{ $firstImage }}" alt="{{ $product->name }}" class="w-full h-24 object-cover">
                        @else
                        <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
                            <span class="text-xs text-gray-500 font-sans">1</span>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Additional thumbnails -->
                    @if($product->images && count($product->images) > 1)
                    @foreach(array_slice($product->images, 1, 3) as $index => $image)
                    @php
                    $fullImagePath = public_path($image);
                    $actualIndex = $index + 1;
                    @endphp

                    <div class="thumbnail-image aspect-w-1 aspect-h-1 rounded-xl overflow-hidden"
                        data-image="{{ $image }}"
                        data-index="{{ $actualIndex }}">
                        @if(file_exists($fullImagePath))
                        <img src="{{ $image }}" alt="{{ $product->name }}" class="w-full h-24 object-cover">
                        @else
                        <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
                            <span class="text-xs text-gray-500 font-sans">{{ $actualIndex + 1 }}</span>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    @for($i = 1; $i < 4; $i++)
                        <div class="thumbnail-image aspect-w-1 aspect-h-1 rounded-xl overflow-hidden">
                        <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
                            <span class="text-xs text-gray-500 font-sans">{{ $i + 1 }}</span>
                        </div>
                </div>
                @endfor
                @endif
            </div>
        </div>

        <!-- Product Details -->
        <div class="space-y-8">
            <!-- Product Header -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    @if($product->isOnSale())
                    <span class="product-badge px-3 py-1 text-xs letter-spacing-luxury uppercase rounded-full">
                        Sale
                    </span>
                    @endif
                    @if($product->created_at && $product->created_at->diffInDays(now()) <= 30)
                        <span class="product-badge px-3 py-1 text-xs letter-spacing-luxury uppercase rounded-full">
                        New
                        </span>
                        @endif
                </div>

                <h1 class="font-serif text-4xl md:text-5xl font-light text-gray-900 mb-4 leading-tight">
                    {{ $product->name }}
                </h1>

                <div class="flex items-center space-x-4 mb-6">
                    <span class="price-luxury font-sans">${{ number_format($product->price, 2) }}</span>
                    @if($product->isOnSale())
                    <span class="text-lg text-gray-500 line-through font-sans">${{ number_format($product->sale_price, 2) }}</span>
                    @endif
                </div>

                <!-- Stock Indicator -->
                <div class="mb-6">
                    @if($product->stock_quantity > 10)
                    <div class="stock-indicator font-sans">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        In Stock
                    </div>
                    @elseif($product->stock_quantity > 0)
                    <div class="stock-indicator low-stock font-sans">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                        Only {{ $product->stock_quantity }} left
                    </div>
                    @else
                    <div class="stock-indicator out-of-stock font-sans">
                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                        Out of Stock
                    </div>
                    @endif
                </div>
            </div>

            <!-- Product Description -->
            <div class="prose prose-lg max-w-none">
                <p class="font-sans text-gray-600 leading-relaxed">{{ $product->description }}</p>
            </div>

            <div class="section-divider"></div>

            <!-- Product Options & Add to Cart -->
            <div class="space-y-6">
                <livewire:add-to-cart :product="$product" />
            </div>

            <div class="section-divider"></div>

            <!-- Product Details Accordion -->
            <div class="space-y-4">
                <!-- Shipping & Returns -->
                <div class="accordion-item">
                    <details class="group">
                        <summary class="accordion-header flex justify-between items-center font-medium cursor-pointer list-none py-4 px-4 rounded-lg">
                            <span class="font-sans letter-spacing-luxury uppercase text-sm">Shipping & Returns</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="20" width="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 px-4 pb-4 font-sans">
                            <p class="mb-2">• Complimentary shipping on orders over $200</p>
                            <p class="mb-2">• 30-day return policy for unworn items</p>
                            <p class="mb-2">• Express shipping available</p>
                            <p>• International delivery to select countries</p>
                        </div>
                    </details>
                </div>

                <!-- Care Instructions -->
                <div class="accordion-item">
                    <details class="group">
                        <summary class="accordion-header flex justify-between items-center font-medium cursor-pointer list-none py-4 px-4 rounded-lg">
                            <span class="font-sans letter-spacing-luxury uppercase text-sm">Care Instructions</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="20" width="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 px-4 pb-4 font-sans">
                            <p class="mb-2">• Professional dry cleaning recommended</p>
                            <p class="mb-2">• Store in dust bag when not in use</p>
                            <p class="mb-2">• Avoid direct sunlight and heat</p>
                            <p>• Handle with care to maintain quality</p>
                        </div>
                    </details>
                </div>

                <!-- Warranty -->
                <div class="accordion-item">
                    <details class="group">
                        <summary class="accordion-header flex justify-between items-center font-medium cursor-pointer list-none py-4 px-4 rounded-lg">
                            <span class="font-sans letter-spacing-luxury uppercase text-sm">Warranty</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="20" width="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 px-4 pb-4 font-sans">
                            <p class="mb-2">• 2-year international warranty</p>
                            <p class="mb-2">• Covers manufacturing defects</p>
                            <p>• Warranty registration included</p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Product Specifications -->
            <div class="product-details rounded-2xl p-8">
                <h3 class="font-serif text-2xl font-light mb-6 luxury-heading">Product Details</h3>
                <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <dt class="font-sans font-medium text-gray-900 text-sm letter-spacing-luxury uppercase">SKU</dt>
                        <dd class="mt-2 font-sans text-gray-600">{{ $product->sku }}</dd>
                    </div>
                    <div>
                        <dt class="font-sans font-medium text-gray-900 text-sm letter-spacing-luxury uppercase">Category</dt>
                        <dd class="mt-2 font-sans text-gray-600">{{ $product->category->name }}</dd>
                    </div>
                    @if($product->subcategory)
                    <div>
                        <dt class="font-sans font-medium text-gray-900 text-sm letter-spacing-luxury uppercase">Collection</dt>
                        <dd class="mt-2 font-sans text-gray-600">{{ $product->subcategory->name }}</dd>
                    </div>
                    @endif
                    <div>
                        <dt class="font-sans font-medium text-gray-900 text-sm letter-spacing-luxury uppercase">Availability</dt>
                        <dd class="mt-2 font-sans text-gray-600">{{ $product->stock_quantity }} pieces available</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <section class="related-products mt-24 py-20 rounded-3xl">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-light text-gray-900 mb-6 luxury-heading">
                You Might Also Like
            </h2>
            <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Discover other pieces from our curated selection that complement this exquisite item
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $relatedProduct)
            <div class="luxury-product-card group">
                <a href="{{ route('products.show', $relatedProduct->slug) }}" class="block">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-t-2xl overflow-hidden">
                        @if($relatedProduct->images && count($relatedProduct->images) > 0)
                        @php
                        $imagePath = $relatedProduct->images[0];
                        $fullImagePath = public_path($imagePath);
                        @endphp

                        @if(file_exists($fullImagePath))
                        <img src="{{ $imagePath }}" alt="{{ $relatedProduct->name }}"
                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                            <span class="font-serif text-gray-500 text-center px-2">{{ $relatedProduct->name }}</span>
                        </div>
                        @endif
                        @else
                        <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                            <span class="font-serif text-gray-500 text-center px-2">{{ $relatedProduct->name }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-6 text-center relative z-10">
                        <h3 class="font-serif text-lg font-medium text-gray-900 mb-2 truncate">{{ $relatedProduct->name }}</h3>
                        <p class="price-luxury font-sans text-base">${{ number_format($relatedProduct->price, 2) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="luxury-button px-12 py-4 inline-block text-sm">
                EXPLORE MORE
            </a>
        </div>
    </section>
    @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail-image');

            // Add click event listener to each thumbnail
            thumbnails.forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', function() {
                    const imageUrl = this.getAttribute('data-image');

                    if (imageUrl) {
                        // Remove active class from all thumbnails
                        thumbnails.forEach(thumb => thumb.classList.remove('active'));

                        // Add active class to clicked thumbnail
                        this.classList.add('active');

                        // Check if main image is an img element or div
                        if (mainImage.tagName === 'IMG') {
                            // Add fade effect
                            mainImage.style.opacity = '0';

                            setTimeout(() => {
                                mainImage.src = imageUrl;
                                mainImage.style.opacity = '1';
                                mainImage.classList.add('image-fade-in');
                            }, 150);
                        } else {
                            // Handle case where mainImage is a div (placeholder)
                            // Create new img element and replace the div content
                            const newImg = document.createElement('img');
                            newImg.src = imageUrl;
                            newImg.alt = '{{ $product->name }}';
                            newImg.className = 'w-full h-[600px] object-cover image-fade-in';
                            newImg.id = 'mainImage';

                            // Replace the div content with the image
                            mainImage.innerHTML = '';
                            mainImage.appendChild(newImg);
                        }
                    }
                });
            });

            // Optional: Add keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                    const activeThumbnail = document.querySelector('.thumbnail-image.active');
                    const thumbnailArray = Array.from(thumbnails);
                    const currentIndex = thumbnailArray.indexOf(activeThumbnail);

                    let newIndex;
                    if (e.key === 'ArrowLeft') {
                        newIndex = currentIndex > 0 ? currentIndex - 1 : thumbnailArray.length - 1;
                    } else {
                        newIndex = currentIndex < thumbnailArray.length - 1 ? currentIndex + 1 : 0;
                    }

                    thumbnailArray[newIndex].click();
                }
            });
        });
    </script>
</x-app-layout>