<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create Women category
        $women = Category::create([
            'name' => 'Women',
            'slug' => 'women',
            'description' => 'Elegant fashion for women',
            'is_active' => true
        ]);

        // Create Men category
        $men = Category::create([
            'name' => 'Men',
            'slug' => 'men',
            'description' => 'Sophisticated fashion for men',
            'is_active' => true
        ]);

        // Create Accessories category
        $accessories = Category::create([
            'name' => 'Accessories',
            'slug' => 'accessories',
            'description' => 'Luxury accessories and finishing touches',
            'is_active' => true
        ]);

        // Create subcategories for Women
        Subcategory::create(['name' => 'Clothing', 'slug' => 'clothing', 'category_id' => $women->id]);
        Subcategory::create(['name' => 'Bags', 'slug' => 'bags', 'category_id' => $women->id]);

        // Create subcategories for Men
        Subcategory::create(['name' => 'Clothing', 'slug' => 'clothing', 'category_id' => $men->id]);
        Subcategory::create(['name' => 'Shoes', 'slug' => 'shoes', 'category_id' => $men->id]);

        // Create subcategories for Accessories
        Subcategory::create(['name' => 'Jewelry', 'slug' => 'jewelry', 'category_id' => $accessories->id]);
        Subcategory::create(['name' => 'Perfumes', 'slug' => 'perfumes', 'category_id' => $accessories->id]);
        Subcategory::create(['name' => 'Belts', 'slug' => 'belts', 'category_id' => $accessories->id]);
    }
}
