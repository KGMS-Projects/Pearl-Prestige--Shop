<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart as CartModel;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class ShoppingCart extends Component
{
    public Collection $cartItems;
    public float $total = 0;
    public float $subtotal = 0;
    public float $tax = 0;
    public float $shipping = 0;

    protected $listeners = ['cartUpdated' => 'loadCartItems'];

    public function mount()
    {
        $this->cartItems = new Collection();
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        if (Auth::check()) {
            $this->cartItems = CartModel::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $this->cartItems = CartModel::with('product')
                ->where('session_id', session()->getId())
                ->get();
        }

        $this->calculateTotals();
    }

    public function updateQuantity($cartItemId, $quantity)
    {
        if ($quantity <= 0) {
            $this->removeItem($cartItemId);
            return;
        }

        $cartItem = CartModel::find($cartItemId);
        if ($cartItem && $quantity <= $cartItem->product->stock_quantity) {
            $cartItem->update(['quantity' => $quantity]);
            $this->loadCartItems();
            $this->dispatch('cartUpdated');
        }
    }

    public function removeItem($cartItemId)
    {
        $cartItem = CartModel::find($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            $this->loadCartItems();
            $this->dispatch('cartUpdated');
            session()->flash('success', 'Item removed from cart');
        }
    }

    public function clearCart()
    {
        if (Auth::check()) {
            CartModel::where('user_id', Auth::id())->delete();
        } else {
            CartModel::where('session_id', session()->getId())->delete();
        }

        $this->loadCartItems();
        $this->dispatch('cartUpdated');
        session()->flash('success', 'Cart cleared');
    }

    private function calculateTotals(): void
    {
        $this->subtotal = $this->cartItems->sum(function (CartModel $item): float {
            $price = $item->product->isOnSale() ?
                (float) $item->product->sale_price :
                (float) $item->product->price;
            return $price * $item->quantity;
        });

        $this->tax = $this->subtotal * 0.08; // 8% tax
        $this->shipping = $this->subtotal > 200 ? 0 : 25; // Free shipping over $200
        $this->total = $this->subtotal + $this->tax + $this->shipping;
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
