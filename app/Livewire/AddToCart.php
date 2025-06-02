<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AddToCart extends Component
{
    public Product $product;
    public $quantity = 1;
    public $selectedSize = '';
    public $selectedColor = '';

    public function mount(Product $product)
    {
        $this->product = $product;
        if ($product->sizes && count($product->sizes) > 0) {
            $this->selectedSize = $product->sizes[0];
        }
        if ($product->colors && count($product->colors) > 0) {
            $this->selectedColor = $product->colors[0];
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantity < $this->product->stock_quantity) {
            $this->quantity++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        // Check stock
        if ($this->quantity > $this->product->stock_quantity) {
            session()->flash('error', 'Not enough stock available.');
            return;
        }

        // Prepare cart data
        $cartData = [
            'product_id' => $this->product->id,
            'quantity' => $this->quantity,
            'size' => $this->selectedSize,
            'color' => $this->selectedColor,
        ];

        if (Auth::check()) {
            $cartData['user_id'] = Auth::id();
        } else {
            $cartData['session_id'] = session()->getId();
        }

        // Check if item already exists in cart
        $existingCartItem = ShoppingCart::where('product_id', $this->product->id)
            ->where('size', $this->selectedSize)
            ->where('color', $this->selectedColor);

        if (Auth::check()) {
            $existingCartItem->where('user_id', Auth::id());
        } else {
            $existingCartItem->where('session_id', session()->getId());
        }

        $existingCartItem = $existingCartItem->first();

        if ($existingCartItem) {
            // Update existing item
            $existingCartItem->quantity += $this->quantity;
            $existingCartItem->save();
        } else {
            // Create new cart item
            ShoppingCart::create($cartData);
        }

        // Flash success message
        session()->flash('success', 'Product added to cart!');

        // Emit event to update cart count
        $this->dispatch('cartUpdated');

        // Reset form
        $this->quantity = 1;
    }

    /**
     * Add to cart and proceed to checkout
     */
    public function proceedToCheckout()
    {
        try {
            // Check if user is logged in
            if (!Auth::check()) {
                session()->flash('error', 'Please login to proceed to checkout.');
                return redirect()->route('login');
            }

            // Check stock
            if ($this->quantity > $this->product->stock_quantity) {
                session()->flash('error', 'Not enough stock available.');
                return;
            }

            // Prepare cart data
            $cartData = [
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
                'size' => $this->selectedSize,
                'color' => $this->selectedColor,
                'user_id' => Auth::id()
            ];

            // Check if item already exists in cart
            $existingCartItem = ShoppingCart::where('product_id', $this->product->id)
                ->where('size', $this->selectedSize)
                ->where('color', $this->selectedColor)
                ->where('user_id', Auth::id())
                ->first();

            if ($existingCartItem) {
                // Update existing item
                $existingCartItem->quantity += $this->quantity;
                $existingCartItem->save();
            } else {
                // Create new cart item
                ShoppingCart::create($cartData);
            }

            // Emit event to update cart count
            $this->dispatch('cartUpdated');

            // Redirect to checkout
            return redirect()->route('checkout.index');
        } catch (\Exception $e) {
            Log::error('Proceed to checkout failed: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
