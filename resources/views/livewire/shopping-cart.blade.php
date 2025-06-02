<div>
    @if($cartItems->count() > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2 space-y-4">
            @foreach($cartItems as $item)
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center space-x-4">
                <!-- Product Image -->
                <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                    <img
                        src="{{ $item->product->getImageUrl(0) }}"
                        alt="{{ $item->product->name }}"
                        class="w-full h-full object-cover rounded-lg">
                </div>

                <!-- Product Details -->
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $item->product->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>

                    @if($item->size)
                    <p class="text-sm text-gray-500">Size: {{ $item->size }}</p>
                    @endif

                    @if($item->color)
                    <div class="flex items-center space-x-2 mt-1">
                        <span class="text-sm text-gray-500">Color:</span>
                        <span class="text-sm text-gray-700 font-medium">{{ $item->color }}</span>
                        <!-- Optional: Show color swatch -->
                        <div class="w-4 h-4 rounded-full border border-gray-300 bg-gray-200"></div>
                    </div>
                    @endif

                    <p class="text-lg font-bold text-luxury-black mt-2">
                        ${{ number_format($item->product->isOnSale() ? $item->product->sale_price : $item->product->price, 2) }}
                        @if($item->product->isOnSale())
                        <span class="text-sm text-gray-500 line-through ml-2">
                            ${{ number_format($item->product->price, 2) }}
                        </span>
                        @endif
                    </p>
                </div>

                <!-- Quantity Controls -->
                <div class="flex items-center space-x-2">
                    <button
                        wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                        class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50 transition-colors"
                        {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                        -
                    </button>
                    <span class="w-8 text-center font-medium">{{ $item->quantity }}</span>
                    <button
                        wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                        class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50 transition-colors"
                        {{ $item->quantity >= $item->product->stock_quantity ? 'disabled' : '' }}>
                        +
                    </button>
                </div>

                <!-- Remove Button -->
                <button
                    wire:click="removeItem({{ $item->id }})"
                    class="text-red-500 hover:text-red-700 transition-colors p-2 rounded-md hover:bg-red-50"
                    title="Remove item from cart">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
            @endforeach

            <!-- Cart Actions -->
            <div class="flex justify-between items-center pt-4">
                <button
                    wire:click="clearCart"
                    class="text-red-500 hover:text-red-700 font-medium transition-colors">
                    Clear Cart
                </button>
                <a href="{{ route('products.index') }}" class="btn-outline-luxury">
                    Continue Shopping
                </a>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Order Summary</h2>

                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
                        <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-medium">
                            @if($shipping == 0)
                            <span class="text-green-600">Free</span>
                            @else
                            ${{ number_format($shipping, 2) }}
                            @endif
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span class="font-medium">${{ number_format($tax, 2) }}</span>
                    </div>

                    @if($subtotal >= 200)
                    <div class="flex justify-between text-green-600">
                        <span>Free Shipping Discount</span>
                        <span>-${{ number_format($originalShipping ?? 0, 2) }}</span>
                    </div>
                    @endif

                    <div class="border-t pt-3">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Checkout Button -->
                <a href="{{ route('checkout.index') }}" class="w-full btn-luxury block text-center mt-6">
                    Proceed to Checkout
                </a>

                @if($subtotal < 200 && $subtotal> 0)
                    <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-200">
                        <p class="text-sm text-blue-700 text-center">
                            <span class="font-medium">Add ${{ number_format(200 - $subtotal, 2) }} more</span>
                            for free shipping! 🚚
                        </p>
                    </div>
                    @endif

                    <!-- Trust Badges -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex justify-center space-x-4 text-xs text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Secure Checkout
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Easy Returns
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    @else
    <!-- Empty Cart -->
    <div class="text-center py-12">
        <div class="max-w-md mx-auto">
            <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9m-9 0V9a2 2 0 012-2h2m5 0V7a2 2 0 012-2h2m0 0V5a2 2 0 012-2h1"></path>
                </svg>
            </div>
            <h3 class="text-xl font-medium text-gray-900 mb-2">Your cart is empty</h3>
            <p class="text-gray-500 mb-6">Start shopping to add items to your cart.</p>
            <a href="{{ route('products.index') }}" class="inline-block btn-luxury">
                Start Shopping
            </a>
        </div>
    </div>
    @endif

    <!-- Success Messages -->
    @if (session()->has('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-pulse">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('success') }}
        </div>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            {{ session('error') }}
        </div>
    </div>
    @endif
</div>