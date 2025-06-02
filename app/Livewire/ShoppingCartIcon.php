<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class ShoppingCartIcon extends Component
{
    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        if (Auth::check()) {
            $this->cartCount = ShoppingCart::where('user_id', Auth::id())->sum('quantity');
        } else {
            $this->cartCount = ShoppingCart::where('session_id', session()->getId())->sum('quantity');
        }
    }

    public function render()
    {
        return view('livewire.shopping-cart-icon');
    }
}
