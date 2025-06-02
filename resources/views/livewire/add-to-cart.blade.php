<div class="space-y-6">

    <!-- Size Selection -->
    @if($product->sizes && count($product->sizes) > 0)
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Select Size</label>
        <div class="flex flex-wrap gap-2">
            @foreach($product->sizes as $size)
            <button
                wire:click="$set('selectedSize', '{{ $size }}')"
                class="px-4 py-2 border rounded-md {{ $selectedSize === $size ? 'border-luxury-brown bg-luxury-brown text-white' : 'border-gray-300 hover:border-luxury-brown' }}">
                {{ $size }}
            </button>
            @endforeach
        </div>
    </div>
    @endif
    <!-- Color Selection -->
    @if($product->colors && count($product->colors) > 0)
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Select Color</label>
        <div class="flex flex-wrap gap-2">
            @foreach($product->colors as $color)
            <button
                wire:click="$set('selectedColor', '{{ $color }}')"
                class="px-4 py-2 border rounded-md {{ $selectedColor === $color ? 'border-luxury-brown bg-luxury-brown text-white' : 'border-gray-300 hover:border-luxury-brown' }}">
                {{ $color }}
            </button>
            @endforeach
        </div>
    </div>
    @endif
    <!-- Quantity Selection -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
        <div class="flex items-center space-x-4">
            <button
                wire:click="decrementQuantity"
                class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50"
                {{ $quantity <= 1 ? 'disabled' : '' }}>
                -
            </button>
            <span class="text-xl font-semibold w-12 text-center">{{ $quantity }}</span>
            <button
                wire:click="incrementQuantity"
                class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50"
                {{ $quantity >= $product->stock_quantity ? 'disabled' : '' }}>
                +
            </button>
        </div>
        <p class="text-sm text-gray-500 mt-1">{{ $product->stock_quantity }} items in stock</p>
    </div>
    <!-- Action Buttons -->
    <div class="space-y-3">
        <!-- Add to Cart Button -->
        <button
            wire:click="addToCart"
            class="w-full btn-luxury"
            {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
            @if($product->stock_quantity <= 0)
                Out of Stock
                @else
                Add to Cart
                @endif
                </button>
                <!-- Proceed to Checkout Button -->
                <button
                    wire:click="proceedToCheckout"
                    class="w-full btn-outline-luxury"
                    {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
                    @if($product->stock_quantity <= 0)
                        Out of Stock
                        @else
                        Proceed to Checkout
                        @endif
                        </button>
    </div>
    <!-- Success/Error Messages -->
    @if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        {{ session('error') }}
    </div>
    @endif
</div>