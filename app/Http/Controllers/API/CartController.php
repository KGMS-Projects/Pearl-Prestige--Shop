<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartItems = ShoppingCart::with('product')
            ->where('user_id', $request->user()->id)
            ->get();

        $total = $cartItems->sum(function ($item) {
            $price = $item->product->isOnSale() ? $item->product->sale_price : $item->product->price;
            return $price * $item->quantity;
        });

        return response()->json([
            'cart_items' => $cartItems,
            'total' => $total,
            'count' => $cartItems->sum('quantity')
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock_quantity) {
            return response()->json([
                'message' => 'Insufficient stock'
            ], 400);
        }

        $existingItem = ShoppingCart::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->where('size', $request->size)
            ->where('color', $request->color)
            ->first();

        if ($existingItem) {
            $existingItem->quantity += $request->quantity;
            $existingItem->save();
        } else {
            ShoppingCart::create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'size' => $request->size,
                'color' => $request->color,
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = ShoppingCart::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        if ($request->quantity > $cartItem->product->stock_quantity) {
            return response()->json([
                'message' => 'Insufficient stock'
            ], 400);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json([
            'message' => 'Cart updated successfully',
            'cart_item' => $cartItem->load('product')
        ]);
    }

    public function remove(Request $request, $id)
    {
        $cartItem = ShoppingCart::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return response()->json([
            'message' => 'Item removed from cart'
        ]);
    }

    public function clear(Request $request)
    {
        ShoppingCart::where('user_id', $request->user()->id)->delete();

        return response()->json([
            'message' => 'Cart cleared successfully'
        ]);
    }
}
