<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

        <!-- Progress Steps -->
        <div class="mb-8">
            <div class="flex items-center">
                <div class="flex items-center text-luxury-brown">
                    <div class="rounded-full bg-luxury-brown text-white w-8 h-8 flex items-center justify-center text-sm">1</div>
                    <span class="ml-2 text-sm font-medium">Shipping & Billing</span>
                </div>
                <div class="flex-1 border-t-2 border-gray-200 mx-4"></div>
                <div class="flex items-center text-gray-400">
                    <div class="rounded-full border-2 border-gray-200 w-8 h-8 flex items-center justify-center text-sm">2</div>
                    <span class="ml-2 text-sm font-medium">Payment</span>
                </div>
                <div class="flex-1 border-t-2 border-gray-200 mx-4"></div>
                <div class="flex items-center text-gray-400">
                    <div class="rounded-full border-2 border-gray-200 w-8 h-8 flex items-center justify-center text-sm">3</div>
                    <span class="ml-2 text-sm font-medium">Confirmation</span>
                </div>
            </div>
        </div>

        <form action="{{ route('checkout.process') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @csrf

            <!-- Checkout Form -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Billing Address -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Billing Address</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                            <input type="text" name="billing_first_name" value="{{ old('billing_first_name', auth()->user()->name) }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_first_name') border-red-500 @enderror" required>
                            @error('billing_first_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                            <input type="text" name="billing_last_name" value="{{ old('billing_last_name') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_last_name') border-red-500 @enderror" required>
                            @error('billing_last_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="billing_email" value="{{ old('billing_email', auth()->user()->email) }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_email') border-red-500 @enderror" required>
                            @error('billing_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <input type="tel" name="billing_phone" value="{{ old('billing_phone') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_phone') border-red-500 @enderror" required>
                            @error('billing_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address *</label>
                            <input type="text" name="billing_address" value="{{ old('billing_address') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_address') border-red-500 @enderror" required>
                            @error('billing_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                            <input type="text" name="billing_city" value="{{ old('billing_city') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_city') border-red-500 @enderror" required>
                            @error('billing_city')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">State *</label>
                            <input type="text" name="billing_state" value="{{ old('billing_state') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_state') border-red-500 @enderror" required>
                            @error('billing_state')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ZIP Code *</label>
                            <input type="text" name="billing_zip" value="{{ old('billing_zip') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_zip') border-red-500 @enderror" required>
                            @error('billing_zip')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                            <select name="billing_country" class="w-full border rounded-lg px-3 py-2 @error('billing_country') border-red-500 @enderror" required>
                                <option value="">Select Country</option>
                                <option value="US" {{ old('billing_country') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="CA" {{ old('billing_country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="UK" {{ old('billing_country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="LK" {{ old('billing_country') == 'LK' ? 'selected' : '' }}>Sri Lanka</option>
                            </select>
                            @error('billing_country')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Shipping Address</h2>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="shipping_same_as_billing" value="1"
                                class="rounded border-gray-300" {{ old('shipping_same_as_billing', true) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Same as billing address</span>
                        </label>
                    </div>

                    <div id="shipping-fields" class="grid grid-cols-1 md:grid-cols-2 gap-4" style="display: none;">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" name="shipping_first_name" value="{{ old('shipping_first_name') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="shipping_last_name" value="{{ old('shipping_last_name') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input type="text" name="shipping_address" value="{{ old('shipping_address') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                            <input type="text" name="shipping_city" value="{{ old('shipping_city') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                            <input type="text" name="shipping_state" value="{{ old('shipping_state') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ZIP Code</label>
                            <input type="text" name="shipping_zip" value="{{ old('shipping_zip') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                            <select name="shipping_country" class="w-full border rounded-lg px-3 py-2">
                                <option value="">Select Country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="LK">Sri Lanka</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Payment Method</h2>

                    <div class="space-y-3">
                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                            <input type="radio" name="payment_method" value="credit_card"
                                class="text-luxury-brown" {{ old('payment_method', 'credit_card') == 'credit_card' ? 'checked' : '' }}>
                            <div class="ml-3 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                <span class="font-medium">Credit Card</span>
                            </div>
                        </label>

                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                            <input type="radio" name="payment_method" value="paypal"
                                class="text-luxury-brown" {{ old('payment_method') == 'paypal' ? 'checked' : '' }}>
                            <div class="ml-3 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a3.35 3.35 0 0 0-.607-.597c-.665-.48-1.645-.749-2.84-.749h-1.379c-.524 0-.968.382-1.05.9L14.146 12.6a.641.641 0 0 0 .633.74h1.379c1.886 0 3.108-.382 3.938-1.287.83-.905.83-2.287 0-3.192z"></path>
                                </svg>
                                <span class="font-medium">PayPal</span>
                            </div>
                        </label>

                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                            <input type="radio" name="payment_method" value="bank_transfer"
                                class="text-luxury-brown" {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }}>
                            <div class="ml-3 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                </svg>
                                <span class="font-medium">Bank Transfer</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <label class="flex items-start">
                        <input type="checkbox" name="terms_accepted" value="1"
                            class="rounded border-gray-300 mt-1" {{ old('terms_accepted') ? 'checked' : '' }} required>
                        <span class="ml-3 text-sm text-gray-700">
                            I agree to the <a href="#" class="text-luxury-brown hover:underline">Terms and Conditions</a>
                            and <a href="#" class="text-luxury-brown hover:underline">Privacy Policy</a>
                        </span>
                    </label>
                    @error('terms_accepted')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Order Summary</h2>

                    <!-- Cart Items -->
                    <div class="space-y-4 mb-6 max-h-96 overflow-y-auto">
                        @foreach($cartItems as $item)
                        <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                            <!-- Product Image -->
                            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                                <img
                                    src="{{ $item->product->getImageUrl(0) }}"
                                    alt="{{ $item->product->name }}"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>

                            <!-- Product Details -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 truncate">{{ $item->product->name }}</h4>
                                <div class="text-xs text-gray-500 space-y-1">
                                    <p>Qty: {{ $item->quantity }}</p>
                                    @if($item->size)
                                    <p>Size: {{ $item->size }}</p>
                                    @endif
                                    @if($item->color)
                                    <p>Color: {{ $item->color }}</p>
                                    @endif
                                </div>

                                <!-- Price per item -->
                                <div class="text-xs text-gray-500 mt-1">
                                    ${{ number_format($item->product->isOnSale() ? $item->product->sale_price : $item->product->price, 2) }} each
                                    @if($item->product->isOnSale())
                                    <span class="line-through ml-1">${{ number_format($item->product->price, 2) }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Total Price for this item -->
                            <div class="text-sm font-medium text-right">
                                ${{ number_format(($item->product->isOnSale() ? $item->product->sale_price : $item->product->price) * $item->quantity, 2) }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Totals -->
                    <div class="space-y-3 border-t pt-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
                            <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">
                                @if($shipping == 0)
                                <span class="text-green-600">Free</span>
                                @else
                                ${{ number_format($shipping, 2) }}
                                @endif
                            </span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">${{ number_format($tax, 2) }}</span>
                        </div>

                        @if($subtotal >= 200)
                        <div class="flex justify-between text-sm text-green-600">
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

                    <!-- Place Order Button -->
                    <button type="submit" class="w-full btn-luxury mt-6 flex items-center justify-center space-x-2 transition-all transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <span>Place Secure Order</span>
                    </button>

                    <!-- Security Badges -->
                    <div class="mt-4 pt-4 border-t">
                        <div class="flex justify-center space-x-4 text-xs text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                Secure Payment
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                SSL Encrypted
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Toggle shipping fields
        document.addEventListener('DOMContentLoaded', function() {
            const shippingCheckbox = document.querySelector('input[name="shipping_same_as_billing"]');
            const shippingFields = document.getElementById('shipping-fields');

            function toggleShippingFields() {
                if (shippingCheckbox.checked) {
                    shippingFields.style.display = 'none';
                } else {
                    shippingFields.style.display = 'grid';
                }
            }

            shippingCheckbox.addEventListener('change', toggleShippingFields);
            toggleShippingFields(); // Initial state
        });
    </script>
</x-app-layout>