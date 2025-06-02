<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|array',
            'billing_address' => 'required|array',
            'payment_method' => 'required|string',
        ]);

        // Get cart items
        $cartItems = ShoppingCart::with('product')
            ->where('user_id', $request->user()->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'message' => 'Cart is empty'
            ], 400);
        }

        // Calculate totals
        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->product->isOnSale() ? $item->product->sale_price : $item->product->price;
            return $price * $item->quantity;
        });

        $tax = $subtotal * 0.08;
        $shipping = $subtotal > 200 ? 0 : 25;
        $total = $subtotal + $tax + $shipping;

        // Create order
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'user_id' => $request->user()->id,
            'subtotal' => $subtotal,
            'tax_amount' => $tax,
            'shipping_amount' => $shipping,
            'total_amount' => $total,
            'shipping_address' => $request->shipping_address,
            'billing_address' => $request->billing_address,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);

        // Create order items
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

        // Clear cart
        ShoppingCart::where('user_id', $request->user()->id)->delete();

        return response()->json([
            'message' => 'Order placed successfully',
            'order' => $order->load('orderItems.product')
        ], 201);
    }

    public function show(Request $request, $id)
    {
        $order = Order::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->with('orderItems.product')
            ->firstOrFail();

        return response()->json($order);
    }
}
