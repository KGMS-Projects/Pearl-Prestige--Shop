<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <!-- Success Icon -->
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <!-- Success Message -->
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Payment Successful!</h1>
            <p class="text-xl text-gray-600 mb-2">Thank you for your order</p>
            <p class="text-lg text-gray-500 mb-8">Order #{{ $order->order_number }}</p>

            <!-- Order Summary Card -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8 max-w-md mx-auto">
                <div class="text-left space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Paid</span>
                        <span class="font-bold text-2xl text-green-600">${{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Payment Method</span>
                        <span>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Transaction Date</span>
                        <span>{{ $order->updated_at->format('M j, Y g:i A') }}</span>
                    </div>
                </div>
            </div>

            <!-- What's Next -->
            <div class="bg-blue-50 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-blue-900 mb-4">What happens next?</h3>
                <div class="text-left text-blue-800 space-y-2">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Order confirmation email sent to {{ $order->billing_address['email'] }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <span>Your order will be processed within 1-2 business days</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4h-5m-3 0v10a2 2 0 002 2h10a2 2 0 002-2V7H8z"></path>
                        </svg>
                        <span>Shipping notification will be sent when your order ships</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="btn-luxury">
                    Continue Shopping
                </a>

                @auth
                <a href="{{ route('orders.index') }}" class="btn-outline-luxury">
                    View My Orders
                </a>
                @endauth

                <button onclick="window.print()" class="btn-outline-luxury">
                    Print Receipt
                </button>
            </div>

            <!-- Contact Support -->
            <div class="mt-12 text-center">
                <p class="text-sm text-gray-500 mb-2">Need help with your order?</p>
                <a href="mailto:support@pearlprestige.com" class="text-luxury-brown hover:underline">
                    Contact Customer Support
                </a>
            </div>
        </div>
    </div>
</x-app-layout>