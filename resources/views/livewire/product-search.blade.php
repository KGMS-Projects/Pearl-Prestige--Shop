<div>
    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            <!-- Search Input -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input
                    type="text"
                    wire:model.live="search"
                    placeholder="Search products..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-luxury-brown focus:border-luxury-brown">
            </div>

            <!-- Category Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select wire:model.live="selectedCategory" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-luxury-brown focus:border-luxury-brown">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Price Range -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Min Price</label>
                <input
                    type="number"
                    wire:model.live="minPrice"
                    placeholder="$0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-luxury-brown focus:border-luxury-brown">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Max Price</label>
                <input
                    type="number"
                    wire:model.live="maxPrice"
                    placeholder="$999999"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-luxury-brown focus:border-luxury-brown">
            </div>

            <!-- Sort By -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                <select wire:model.live="sortBy" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-luxury-brown focus:border-luxury-brown">
                    <option value="name">Name A-Z</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="newest">Newest First</option>
                </select>
            </div>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <p class="text-sm text-gray-600">
                Found {{ count($products) }} product{{ count($products) !== 1 ? 's' : '' }}
            </p>
            <button wire:click="clearFilters" class="text-sm text-luxury-brown hover:text-luxury-brown font-medium">
                Clear Filters
            </button>
        </div>
    </div>

    <!-- Products Grid -->
    @if(count($products) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($products as $product)
        <div class="card-luxury group">
            <a href="{{ route('products.show', $product->slug) }}">
                <div class="aspect-w-3 aspect-h-4 bg-gray-100 rounded-t-xl overflow-hidden">
                    <div class="w-full h-80 bg-gray-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <span class="text-gray-500 text-center px-2">{{ $product->name }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-1">{{ $product->category->name }}</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">{{ $product->name }}</h3>
                    <p class="text-luxury-price">${{ number_format($product->price, 2) }}</p>

                    @if($product->isOnSale())
                    <span class="text-sm text-red-500">Sale</span>
                    @endif

                    @if($product->stock_quantity <= 5)
                        <p class="text-sm text-orange-500 mt-1">Only {{ $product->stock_quantity }} left!</p>
                        @endif
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12">
        <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <h3 class="mt-4 text-lg font-medium text-gray-900">No products found</h3>
        <p class="mt-2 text-gray-500">Try adjusting your search criteria or browse our categories.</p>
        <button wire:click="clearFilters" class="mt-4 btn-outline-luxury">
            Clear Filters
        </button>
    </div>
    @endif
</div>