<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Exception;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display checkout page
     */
    public function index()
    {
        try {
            // Check if user is logged in
            if (!Auth::check()) {
                return redirect()->route('login')
                    ->with('message', 'Please login to proceed with checkout.')
                    ->with('intended', 'checkout');
            }

            // Get cart items for logged in user
            $cartItems = ShoppingCart::with(['product' => function ($query) {
                $query->with(['category', 'subcategory']);
            }])
                ->where('user_id', Auth::id())
                ->get();

            // Check if cart is empty
            if ($cartItems->isEmpty()) {
                return redirect()->route('products.index')
                    ->with('info', 'Your cart is empty. Browse our luxury collection and add items to proceed with checkout.');
            }

            // Validate cart items and stock
            $invalidItems = [];
            foreach ($cartItems as $item) {
                if (!$item->product) {
                    $invalidItems[] = "Product no longer available";
                    continue;
                }

                if (!$item->product->is_active) {
                    $invalidItems[] = $item->product->name . " is no longer available";
                    continue;
                }

                if ($item->quantity > $item->product->stock_quantity) {
                    $invalidItems[] = $item->product->name . " - only " . $item->product->stock_quantity . " in stock";
                }
            }

            if (!empty($invalidItems)) {
                return redirect()->route('cart.index')
                    ->with('error', 'Please fix the following issues: ' . implode(', ', $invalidItems));
            }

            // Calculate totals
            $calculations = $this->calculateTotals($cartItems);

            // Get user's saved addresses (if any)
            $user = Auth::user();
            $savedAddresses = $this->getUserSavedAddresses($user);

            return view('checkout.index', array_merge([
                'cartItems' => $cartItems,
                'user' => $user,
                'savedAddresses' => $savedAddresses,
            ], $calculations));
        } catch (Exception $e) {
            Log::error('Checkout page error: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('cart.index')
                ->with('error', 'Unable to load checkout page. Please try again.');
        }
    }

    /**
     * Process checkout form submission
     */
    public function process(Request $request)
    {
        try {
            // Ensure user is logged in
            if (!Auth::check()) {
                return redirect()->route('login')
                    ->with('error', 'Please login to complete your order.');
            }

            // Validate the request
            $validated = $this->validateCheckoutForm($request);

            // Get and validate cart items
            $cartItems = ShoppingCart::with('product')
                ->where('user_id', Auth::id())
                ->get();

            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')
                    ->with('error', 'Your cart is empty. Please add items before checkout.');
            }

            // Final stock validation
            $stockErrors = $this->validateCartStock($cartItems);
            if (!empty($stockErrors)) {
                return redirect()->route('cart.index')
                    ->with('error', 'Stock issues found: ' . implode(', ', $stockErrors));
            }

            // Calculate totals
            $calculations = $this->calculateTotals($cartItems);

            // Prepare addresses
            $addresses = $this->prepareAddresses($validated);

            // Start database transaction
            DB::beginTransaction();

            try {
                // Create the order
                $order = $this->createOrder($validated, $addresses, $calculations);

                // Create order items and update stock
                $this->createOrderItems($order, $cartItems);

                // Clear the cart
                ShoppingCart::where('user_id', Auth::id())->delete();

                // Commit transaction
                DB::commit();

                // Log successful order creation
                Log::info('Order created successfully', [
                    'order_id' => $order->id,
                    'order_number' => $order->order_number,
                    'user_id' => Auth::id(),
                    'total_amount' => $order->total_amount
                ]);

                // Send order confirmation email (implement as needed)
                $this->sendOrderConfirmationEmail($order);

                // Redirect based on payment method
                return $this->handlePaymentRedirect($order);
            } catch (Exception $e) {
                DB::rollback();
                throw $e;
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Checkout validation failed', [
                'user_id' => Auth::id(),
                'errors' => $e->errors()
            ]);

            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please check the form for errors and try again.');
        } catch (Exception $e) {
            Log::error('Checkout processing failed', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput()
                ->with('error', 'Order processing failed. Please try again or contact support if the problem persists.');
        }
    }

    /**
     * Show order confirmation page
     */
    public function confirmation($orderId)
    {
        try {
            $order = Order::with(['orderItems.product', 'user'])
                ->where('id', $orderId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            // Mark order as viewed
            if (!$order->viewed_at) {
                $order->update(['viewed_at' => now()]);
            }

            return view('checkout.confirmation', compact('order'));
        } catch (Exception $e) {
            Log::error('Order confirmation error', [
                'order_id' => $orderId,
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return redirect()->route('orders.index')
                ->with('error', 'Order not found or access denied.');
        }
    }

    /**
     * Process payment for an order
     */
    public function processPayment(Request $request, $orderId)
    {
        try {
            $order = Order::where('id', $orderId)
                ->where('user_id', Auth::id())
                ->where('payment_status', 'pending')
                ->firstOrFail();

            // Validate payment information based on method
            $this->validatePaymentDetails($request, $order->payment_method);

            DB::beginTransaction();

            try {
                // Process payment based on method
                $paymentResult = $this->processPaymentByMethod($request, $order);

                if ($paymentResult['success']) {
                    // Update order status
                    $order->update([
                        'payment_status' => 'completed',
                        'status' => 'processing',
                        'payment_details' => $paymentResult['details'] ?? null,
                        'paid_at' => now()
                    ]);

                    // Send payment confirmation email
                    $this->sendPaymentConfirmationEmail($order);

                    DB::commit();

                    Log::info('Payment processed successfully', [
                        'order_id' => $order->id,
                        'payment_method' => $order->payment_method,
                        'amount' => $order->total_amount
                    ]);

                    return redirect()->route('checkout.success', $order->id)
                        ->with('success', 'Payment completed successfully!');
                } else {
                    throw new Exception($paymentResult['error'] ?? 'Payment processing failed');
                }
            } catch (Exception $e) {
                DB::rollback();
                throw $e;
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->with('error', 'Please check your payment information.');
        } catch (Exception $e) {
            Log::error('Payment processing failed', [
                'order_id' => $orderId,
                'error' => $e->getMessage()
            ]);

            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    /**
     * Show order success page
     */
    public function success($orderId)
    {
        try {
            $order = Order::with(['orderItems.product', 'user'])
                ->where('id', $orderId)
                ->where('user_id', Auth::id())
                ->where('payment_status', 'completed')
                ->firstOrFail();

            return view('checkout.success', compact('order'));
        } catch (Exception $e) {
            Log::error('Order success page error', [
                'order_id' => $orderId,
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return redirect()->route('orders.index')
                ->with('error', 'Order not found or payment not completed.');
        }
    }

    /**
     * Handle failed payments
     */
    public function paymentFailed($orderId)
    {
        try {
            $order = Order::where('id', $orderId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $order->update([
                'payment_status' => 'failed',
                'status' => 'cancelled'
            ]);

            // Restore stock quantities
            $this->restoreOrderStock($order);

            return view('checkout.payment-failed', compact('order'));
        } catch (Exception $e) {
            return redirect()->route('home')
                ->with('error', 'Order not found.');
        }
    }

    /**
     * Cancel an order
     */
    public function cancel($orderId)
    {
        try {
            $order = Order::where('id', $orderId)
                ->where('user_id', Auth::id())
                ->where('status', 'pending')
                ->firstOrFail();

            DB::beginTransaction();

            try {
                // Update order status
                $order->update([
                    'status' => 'cancelled',
                    'cancelled_at' => now()
                ]);

                // Restore stock
                $this->restoreOrderStock($order);

                DB::commit();

                return redirect()->route('orders.index')
                    ->with('success', 'Order cancelled successfully.');
            } catch (Exception $e) {
                DB::rollback();
                throw $e;
            }
        } catch (Exception $e) {
            Log::error('Order cancellation failed', [
                'order_id' => $orderId,
                'error' => $e->getMessage()
            ]);

            return back()->with('error', 'Unable to cancel order.');
        }
    }

    // ============ PRIVATE HELPER METHODS ============

    /**
     * Validate checkout form
     */
    private function validateCheckoutForm(Request $request)
    {
        return $request->validate([
            'billing_first_name' => 'required|string|max:255',
            'billing_last_name' => 'required|string|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_phone' => 'required|string|max:20',
            'billing_address' => 'required|string|max:255',
            'billing_city' => 'required|string|max:255',
            'billing_state' => 'required|string|max:255',
            'billing_zip' => 'required|string|max:10',
            'billing_country' => 'required|string|max:255',
            'shipping_same_as_billing' => 'boolean',
            'shipping_first_name' => 'required_if:shipping_same_as_billing,false|nullable|string|max:255',
            'shipping_last_name' => 'required_if:shipping_same_as_billing,false|nullable|string|max:255',
            'shipping_address' => 'required_if:shipping_same_as_billing,false|nullable|string|max:255',
            'shipping_city' => 'required_if:shipping_same_as_billing,false|nullable|string|max:255',
            'shipping_state' => 'required_if:shipping_same_as_billing,false|nullable|string|max:255',
            'shipping_zip' => 'required_if:shipping_same_as_billing,false|nullable|string|max:10',
            'shipping_country' => 'required_if:shipping_same_as_billing,false|nullable|string|max:255',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer,stripe',
            'terms_accepted' => 'required|accepted',
            'save_address' => 'boolean',
            'special_instructions' => 'nullable|string|max:500'
        ]);
    }

    /**
     * Validate payment details based on method
     */
    private function validatePaymentDetails(Request $request, $paymentMethod)
    {
        $rules = [];

        switch ($paymentMethod) {
            case 'credit_card':
                $rules = [
                    'card_number' => 'required|string|min:16|max:19',
                    'card_expiry' => 'required|string|size:5',
                    'card_cvv' => 'required|string|size:3',
                    'card_name' => 'required|string|max:255'
                ];
                break;
            case 'paypal':
                $rules = [
                    'paypal_email' => 'required|email'
                ];
                break;
            case 'stripe':
                $rules = [
                    'stripe_token' => 'required|string'
                ];
                break;
        }

        return $request->validate($rules);
    }

    /**
     * Calculate order totals
     */
    private function calculateTotals($cartItems)
    {
        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->product->isOnSale() ? $item->product->sale_price : $item->product->price;
            return $price * $item->quantity;
        });

        // Tax calculation (8% default, can be made configurable)
        $taxRate = config('checkout.tax_rate', 0.08);
        $tax = $subtotal * $taxRate;

        // Shipping calculation
        $freeShippingThreshold = config('checkout.free_shipping_threshold', 200);
        $shippingCost = config('checkout.shipping_cost', 25);
        $shipping = $subtotal >= $freeShippingThreshold ? 0 : $shippingCost;

        // Discount calculation (implement coupon system as needed)
        $discount = 0;

        $total = $subtotal + $tax + $shipping - $discount;

        return compact('subtotal', 'tax', 'shipping', 'discount', 'total', 'taxRate');
    }

    /**
     * Validate cart stock availability
     */
    private function validateCartStock($cartItems)
    {
        $errors = [];

        foreach ($cartItems as $item) {
            if (!$item->product) {
                $errors[] = "Product not found";
                continue;
            }

            if ($item->quantity > $item->product->stock_quantity) {
                $errors[] = $item->product->name . " - only " . $item->product->stock_quantity . " available";
            }
        }

        return $errors;
    }

    /**
     * Prepare billing and shipping addresses
     */
    private function prepareAddresses($validated)
    {
        $billingAddress = [
            'first_name' => $validated['billing_first_name'],
            'last_name' => $validated['billing_last_name'],
            'email' => $validated['billing_email'],
            'phone' => $validated['billing_phone'],
            'address' => $validated['billing_address'],
            'city' => $validated['billing_city'],
            'state' => $validated['billing_state'],
            'zip' => $validated['billing_zip'],
            'country' => $validated['billing_country'],
        ];

        $shippingAddress = $billingAddress;
        if (!isset($validated['shipping_same_as_billing']) || !$validated['shipping_same_as_billing']) {
            $shippingAddress = [
                'first_name' => $validated['shipping_first_name'],
                'last_name' => $validated['shipping_last_name'],
                'address' => $validated['shipping_address'],
                'city' => $validated['shipping_city'],
                'state' => $validated['shipping_state'],
                'zip' => $validated['shipping_zip'],
                'country' => $validated['shipping_country'],
                'email' => $validated['billing_email'], // Use billing email for shipping
                'phone' => $validated['billing_phone'], // Use billing phone for shipping
            ];
        }

        return compact('billingAddress', 'shippingAddress');
    }

    /**
     * Create order record
     */
    private function createOrder($validated, $addresses, $calculations)
    {
        return Order::create([
            'order_number' => $this->generateOrderNumber(),
            'user_id' => Auth::id(),
            'subtotal' => $calculations['subtotal'],
            'tax_amount' => $calculations['tax'],
            'shipping_amount' => $calculations['shipping'],
            'discount_amount' => $calculations['discount'],
            'total_amount' => $calculations['total'],
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $validated['payment_method'],
            'billing_address' => $addresses['billingAddress'],
            'shipping_address' => $addresses['shippingAddress'],
            'special_instructions' => $validated['special_instructions'] ?? null,
            'currency' => 'USD',
            'tax_rate' => $calculations['taxRate'],
        ]);
    }

    /**
     * Create order items and update product stock
     */
    private function createOrderItems($order, $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $unitPrice = $cartItem->product->isOnSale() ?
                $cartItem->product->sale_price :
                $cartItem->product->price;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'unit_price' => $unitPrice,
                'total_price' => $unitPrice * $cartItem->quantity,
                'size' => $cartItem->size,
                'color' => $cartItem->color,
                'product_snapshot' => $cartItem->product->toArray(),
            ]);

            // Update product stock
            $cartItem->product->decrement('stock_quantity', $cartItem->quantity);
        }
    }

    /**
     * Generate unique order number
     */
    private function generateOrderNumber()
    {
        do {
            $orderNumber = 'ORD-' . date('Y') . '-' . strtoupper(Str::random(8));
        } while (Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }

    /**
     * Handle payment redirect based on method
     */
    private function handlePaymentRedirect($order)
    {
        switch ($order->payment_method) {
            case 'credit_card':
            case 'stripe':
                return redirect()->route('checkout.confirmation', $order->id)
                    ->with('success', 'Order placed successfully! Please complete your payment.');

            case 'paypal':
                // Redirect to PayPal (implement PayPal integration)
                return redirect()->route('checkout.confirmation', $order->id)
                    ->with('info', 'Order placed! You will be redirected to PayPal to complete payment.');

            case 'bank_transfer':
                return redirect()->route('checkout.confirmation', $order->id)
                    ->with('info', 'Order placed! Please check your email for bank transfer instructions.');

            default:
                return redirect()->route('checkout.confirmation', $order->id);
        }
    }

    /**
     * Process payment based on method (demo implementation)
     */
    private function processPaymentByMethod(Request $request, $order)
    {
        switch ($order->payment_method) {
            case 'credit_card':
                return $this->processCreditCardPayment($request, $order);

            case 'paypal':
                return $this->processPayPalPayment($request, $order);

            case 'stripe':
                return $this->processStripePayment($request, $order);

            case 'bank_transfer':
                return ['success' => true, 'details' => ['method' => 'bank_transfer']];

            default:
                return ['success' => false, 'error' => 'Invalid payment method'];
        }
    }

    /**
     * Process credit card payment (demo implementation)
     */
    private function processCreditCardPayment(Request $request, $order)
    {
        // This is a demo implementation
        // In production, integrate with payment processors like Stripe, Square, etc.

        $cardNumber = $request->input('card_number');

        // Demo: Simulate payment failure for specific card numbers
        if (str_contains($cardNumber, '4000000000000002')) {
            return ['success' => false, 'error' => 'Card declined'];
        }

        // Demo: Simulate successful payment
        return [
            'success' => true,
            'details' => [
                'transaction_id' => 'txn_' . Str::random(16),
                'last_four' => substr($cardNumber, -4),
                'card_type' => $this->getCardType($cardNumber)
            ]
        ];
    }

    /**
     * Process PayPal payment (implement PayPal SDK)
     */
    private function processPayPalPayment(Request $request, $order)
    {
        // Implement PayPal payment processing
        return [
            'success' => true,
            'details' => [
                'paypal_transaction_id' => 'pp_' . Str::random(16),
                'paypal_email' => $request->input('paypal_email')
            ]
        ];
    }

    /**
     * Process Stripe payment (implement Stripe SDK)
     */
    private function processStripePayment(Request $request, $order)
    {
        // Implement Stripe payment processing
        return [
            'success' => true,
            'details' => [
                'stripe_charge_id' => 'ch_' . Str::random(24),
                'stripe_token' => $request->input('stripe_token')
            ]
        ];
    }

    /**
     * Restore product stock when order is cancelled
     */
    private function restoreOrderStock($order)
    {
        foreach ($order->orderItems as $item) {
            if ($item->product) {
                $item->product->increment('stock_quantity', $item->quantity);
            }
        }
    }

    /**
     * Get card type from card number
     */
    private function getCardType($cardNumber)
    {
        $cardNumber = preg_replace('/\D/', '', $cardNumber);

        if (preg_match('/^4/', $cardNumber)) {
            return 'Visa';
        } elseif (preg_match('/^5[1-5]/', $cardNumber)) {
            return 'MasterCard';
        } elseif (preg_match('/^3[47]/', $cardNumber)) {
            return 'American Express';
        }

        return 'Unknown';
    }

    /**
     * Get user's saved addresses
     */
    private function getUserSavedAddresses($user)
    {
        // Implement saved addresses functionality
        // For now, return empty array
        return [];
    }

    /**
     * Send order confirmation email
     */
    private function sendOrderConfirmationEmail($order)
    {
        try {
            // Implement email sending
            // Mail::to($order->billing_address['email'])->send(new OrderConfirmationMail($order));

            Log::info('Order confirmation email sent', [
                'order_id' => $order->id,
                'email' => $order->billing_address['email']
            ]);
        } catch (Exception $e) {
            Log::error('Failed to send order confirmation email', [
                'order_id' => $order->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Send payment confirmation email
     */
    private function sendPaymentConfirmationEmail($order)
    {
        try {
            // Implement payment confirmation email
            // Mail::to($order->billing_address['email'])->send(new PaymentConfirmationMail($order));

            Log::info('Payment confirmation email sent', [
                'order_id' => $order->id,
                'email' => $order->billing_address['email']
            ]);
        } catch (Exception $e) {
            Log::error('Failed to send payment confirmation email', [
                'order_id' => $order->id,
                'error' => $e->getMessage()
            ]);
        }
    }
}
