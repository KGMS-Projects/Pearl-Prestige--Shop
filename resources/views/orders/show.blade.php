<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="{{ route('orders.index') }}" class="text-gray-500 hover:text-gray-700 mb-4 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Orders
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Order #{{ $order->order_number }}</h1>
                <p class="text-gray-500">Placed on {{ $order->created_at->format('M j, Y g:i A') }}</p>
            </div>
            <div class="text-right">
                <span class="px-4 py-2 rounded-full text-sm font-medium
                    {{ $order->status === 'delivered' ? 'bg-green-100 text-green-800' : 
                       ($order->status === 'shipped' ? 'bg-blue-100 text-blue-800' : 
                        ($order->status === 'processing' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800')) }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Order Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Order Items</h2>

                    <div class="space-y-6">
                        @foreach($order->orderItems as $item)
                        <div class="flex items-center space-x-4 pb-6 border-b border-gray-200 last:border-b-0">
                            <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xs text-gray-500 text-center">{{ $item->product->name ?? 'Product' }}</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ $item->product->name ?? 'Product Name' }}</h3>
                                <div class="text-sm text-gray-500 space-y-1">
                                    <p>Quantity: {{ $item->quantity }}</p>
                                    @if($item->size)
                                    <p>Size: {{ $item->size }}</p>
                                    @endif
                                    @if($item->color)
                                    <p>Color: {{ $item->color }}</p>
                                    @endif
                                    <p>Unit Price: ${{ number_format($item->unit_price, 2) }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-900">${{ number_format($item->total_price, 2) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary & Details -->
            <div class="space-y-6">
                <!-- Order Summary -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Order Summary</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span>${{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span>${{ number_format($order->shipping_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax</span>
                            <span>${{ number_format($order->tax_amount, 2) }}</span>
                        </div>
                        <div class="border-t pt-3">
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                <span>${{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Shipping Address</h2>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p class="font-medium">{{ $order->shipping_address['first_name'] }} {{ $order->shipping_address['last_name'] }}</p>
                        <p>{{ $order->shipping_address['address'] }}</p>
                        <p>{{ $order->shipping_address['city'] }}, {{ $order->shipping_address['state'] }} {{ $order->shipping_address['zip'] }}</p>
                        <p>{{ $order->shipping_address['country'] }}</p>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Payment Information</h2>
                    <div class="text-sm text-gray-600 space-y-2">
                        <p><span class="font-medium">Method:</span> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                        <p><span class="font-medium">Status:</span>
                            <span class="px-2 py-1 rounded-full text-xs
                                {{ $order->payment_status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>