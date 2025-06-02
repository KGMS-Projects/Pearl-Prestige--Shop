<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
        'images',
        'sizes',
        'colors',
        'category_id',
        'subcategory_id',
        'is_featured',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'images' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function cartItems()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }



    // Scopes (useful queries)
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    // Helper methods
    public function getMainImageAttribute()
    {
        return $this->images[0] ?? '/images/placeholder.jpg';
    }

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    public function isOnSale()
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }
    // In app/Models/Product.php, add this method:

    public function getImageUrl($index = 0)
    {
        if (!$this->images || !isset($this->images[$index])) {
            return 'https://via.placeholder.com/400x400/cccccc/666666?text=' . urlencode($this->name);
        }

        $imagePath = $this->images[$index];
        $fullPath = public_path($imagePath);

        if (file_exists($fullPath)) {
            return asset($imagePath);
        }

        return 'https://via.placeholder.com/400x400/cccccc/666666?text=' . urlencode($this->name);
    }
    // Add these methods to your existing Product model class

    /**
     * Get the current selling price (sale price if on sale, otherwise regular price)
     */
    public function getCurrentPrice()
    {
        return $this->isOnSale() ? $this->sale_price : $this->price;
    }

    /**
     * Get formatted current price
     */
    public function getFormattedCurrentPriceAttribute()
    {
        return '$' . number_format($this->getCurrentPrice(), 2);
    }

    /**
     * Get formatted sale price
     */
    public function getFormattedSalePriceAttribute()
    {
        if ($this->sale_price) {
            return '$' . number_format($this->sale_price, 2);
        }
        return null;
    }

    /**
     * Get savings amount when on sale
     */
    public function getSavingsAttribute()
    {
        if ($this->isOnSale()) {
            return $this->price - $this->sale_price;
        }
        return 0;
    }

    /**
     * Get savings percentage when on sale
     */
    public function getSavingsPercentageAttribute()
    {
        if ($this->isOnSale()) {
            return round((($this->price - $this->sale_price) / $this->price) * 100);
        }
        return 0;
    }

    /**
     * Check if product is in stock
     */
    public function isInStock()
    {
        return $this->stock_quantity > 0;
    }

    /**
     * Check if product is low in stock
     */
    public function isLowStock($threshold = 10)
    {
        return $this->stock_quantity <= $threshold && $this->stock_quantity > 0;
    }

    /**
     * Get all image URLs as array
     */
    public function getAllImageUrls()
    {
        if (!$this->images || count($this->images) === 0) {
            return [$this->getImageUrl(0)]; // Return placeholder in array
        }

        return collect($this->images)->map(function ($image, $index) {
            return $this->getImageUrl($index);
        })->toArray();
    }

    /**
     * Additional scopes
     */
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('sale_price')
            ->whereColumn('sale_price', '<', 'price');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeBySubcategory($query, $subcategoryId)
    {
        return $query->where('subcategory_id', $subcategoryId);
    }

    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('sku', 'like', "%{$search}%");
        });
    }
}
