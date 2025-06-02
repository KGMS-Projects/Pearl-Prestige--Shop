<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductSearch extends Component
{
    public $search = '';
    public $selectedCategory = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $sortBy = 'name';
    public $products = [];
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::active()->get();
        $this->searchProducts();
    }

    public function updatedSearch()
    {
        $this->searchProducts();
    }

    public function updatedSelectedCategory()
    {
        $this->searchProducts();
    }

    public function updatedMinPrice()
    {
        $this->searchProducts();
    }

    public function updatedMaxPrice()
    {
        $this->searchProducts();
    }

    public function updatedSortBy()
    {
        $this->searchProducts();
    }

    public function searchProducts()
    {
        $query = Product::with(['category', 'subcategory'])->active();

        // Search by name or description
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Filter by category
        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        // Filter by price range
        if ($this->minPrice) {
            $query->where('price', '>=', $this->minPrice);
        }

        if ($this->maxPrice) {
            $query->where('price', '<=', $this->maxPrice);
        }

        // Sort results
        switch ($this->sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $this->products = $query->get();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->selectedCategory = '';
        $this->minPrice = '';
        $this->maxPrice = '';
        $this->sortBy = 'name';
        $this->searchProducts();
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
