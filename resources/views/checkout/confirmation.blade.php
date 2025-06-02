<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Success Header -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Order Confirmed! </h1>
            <p class="text-lg text-gray-600">Thank you for your purchase. Your order has been successfully placed.</p>
            <div class="mt-4 inline-flex items-center px-4 py-2 bg-green-50 rounded-lg">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span class="text-green-700 font-medium">Confirmation email sent</span>
            </div>
        </div>

        <!-- Order Details Card -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <!-- Order Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-luxury-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Order Information
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Order Number:</span>
                            <span class="font-mono font-bold text-luxury-brown">{{ $order->order_number }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Order Date:</span>
                            <span class="font-medium">{{ $order->created_at->format('M j, Y g:i A') }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Payment Method:</span>
                            <span class="font-medium">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Status:</span>
                            <span class="px-3 py-1 text-xs rounded-full font-medium bg-gray-100 text-gray-800">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-luxury-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Shipping Address
                    </h3>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <div class="text-sm space-y-1">
                            <p class="font-medium text-gray-900">{{ $order->shipping_address['first_name'] }} {{ $order->shipping_address['last_name'] }}</p>
                            <p class="text-gray-600">{{ $order->shipping_address['address'] }}</p>
                            <p class="text-gray-600">{{ $order->shipping_address['city'] }}, {{ $order->shipping_address['state'] }} {{ $order->shipping_address['zip'] }}</p>
                            <p class="text-gray-600">{{ $order->shipping_address['country'] }}</p>
                            @if(isset($order->shipping_address['phone']))
                            <p class="text-gray-600 mt-2">📞 {{ $order->shipping_address['phone'] }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items Section -->
            <div class="border-t border-gray-200 pt-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-luxury-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Order Items ({{ $order->orderItems->count() }} {{ $order->orderItems->count() === 1 ? 'item' : 'items' }})
                </h3>

                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <!-- Product Image -->
                        <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                            @if($item->product)
                            <img
                                src="{{ $item->product->getImageUrl(0) }}"
                                alt="{{ $item->product->name }}"
                                class="w-full h-full object-cover rounded-lg">
                            @else
                            <!-- Fallback for deleted products -->
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            @endif
                        </div>

                        <!-- Product Details -->
                        <div class="flex-1 min-w-0">
                            <h4 class="text-lg font-medium text-gray-900 truncate">
                                {{ $item->product->name ?? $item->product_snapshot['name'] ?? 'Product Name' }}
                            </h4>
                            <div class="text-sm text-gray-500 space-y-1">
                                <div class="flex items-center space-x-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                        </svg>
                                        Qty: {{ $item->quantity }}
                                    </span>
                                    @if($item->size)
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4 4 4 0 004-4V5z"></path>
                                        </svg>
                                        Size: {{ $item->size }}
                                    </span>
                                    @endif
                                    @if($item->color)
                                    <span class="flex items-center">
                                        <div class="w-4 h-4 rounded-full border border-gray-300 bg-gray-200 mr-1"></div>
                                        Color: {{ $item->color }}
                                    </span>
                                    @endif
                                </div>

                                <!-- SKU if available -->
                                @if($item->product && $item->product->sku)
                                <p class="text-xs text-gray-400">SKU: {{ $item->product->sku }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="text-right space-y-1">
                            <p class="text-lg font-bold text-gray-900">${{ number_format($item->total_price, 2) }}</p>
                            <p class="text-sm text-gray-500">${{ number_format($item->unit_price, 2) }} each</p>
                            @if($item->quantity > 1)
                            <p class="text-xs text-gray-400">{{ $item->quantity }} × ${{ number_format($item->unit_price, 2) }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Total Section -->
            <div class="border-t border-gray-200 pt-6 mt-6">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">${{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">
                                @if($order->shipping_amount == 0)
                                <span class="text-green-600">Free</span>
                                @else
                                ${{ number_format($order->shipping_amount, 2) }}
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">${{ number_format($order->tax_amount, 2) }}</span>
                        </div>
                        <div class="border-t border-gray-300 pt-3">
                            <div class="flex justify-between text-xl font-bold text-gray-900">
                                <span>Total</span>
                                <span>${{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if($order->payment_status === 'pending')
            <!-- <form action="{{ route('checkout.payment', $order->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn-luxury flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <span>Complete Payment</span>
                </button>
            </form> -->
            @endif

            <a href="{{ route('home') }}" class="btn-outline-luxury flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9m-9 0V9a2 2 0 012-2h2m5 0V7a2 2 0 012-2h2m0 0V5a2 2 0 012-2h1"></path>
                </svg>
                <span>Continue Shopping</span>
            </a>

            <button onclick="window.print()" class="btn-outline-luxury flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                <span>Print Order</span>
            </button>
        </div>

        <!-- Additional Information -->
        <div class="mt-8 text-center">
            <div class="bg-blue-50 rounded-lg p-6">
                <h4 class="text-lg font-semibold text-blue-900 mb-2">What's Next?</h4>
                <div class="text-sm text-blue-700 space-y-2">
                    <p>📧 You'll receive a confirmation email shortly with your order details.</p>
                    <p>📦 We'll send you tracking information once your order ships.</p>
                    <p>❓ Questions? Contact our support team at <a href="mailto:support@pearlprestige.com" class="underline font-medium">support@pearlprestige.com</a></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {

            .btn-luxury,
            .btn-outline-luxury,
            .no-print {
                display: none !important;
            }

            .bg-gray-50 {
                background-color: #f9f9f9 !important;
            }
        }
    </style>
</x-app-layout>