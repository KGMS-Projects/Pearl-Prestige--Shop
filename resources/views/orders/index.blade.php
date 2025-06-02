<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">My Orders</h1>

        @if($orders->count() > 0)
        <div class="space-y-6">
            @foreach($orders as $order)
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Order #{{ $order->order_number }}</h3>
                        <p class="text-sm text-gray-500">Placed on {{ $order->created_at->format('M j, Y') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</p>
                        <span class="px-3 py-1 text-xs rounded-full 
                                    {{ $order->status === 'delivered' ? 'bg-green-100 text-green-800' : 
                                       ($order->status === 'shipped' ? 'bg-blue-100 text-blue-800' : 
                                        ($order->status === 'processing' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                <div class="border-t pt-4">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            {{ $order->orderItems->count() }} item(s) •
                            Payment: {{ ucfirst($order->payment_status) }}
                        </div>
                        <a href="{{ route('orders.show', $order->id) }}" class="text-luxury-brown hover:underline text-sm font-medium">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">No orders yet</h3>
            <p class="mt-2 text-gray-500">Start shopping to see your orders here.</p>
            <a href="{{ route('products.index') }}" class="mt-6 inline-block btn-luxury">
                Start Shopping
            </a>
        </div>
        @endif
    </div>
</x-app-layout>