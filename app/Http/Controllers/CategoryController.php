<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function women()
    {
        $category = Category::where('slug', 'women')->first();

        if (!$category) {
            // If category doesn't exist, show all products from category ID 1 (assuming women is ID 1)
            $products = Product::where('category_id', 1)
                ->with(['category', 'subcategory'])
                ->active()
                ->get();
        } else {
            $products = Product::where('category_id', $category->id)
                ->with(['category', 'subcategory'])
                ->active()
                ->get();
        }

        return view('categories.women', compact('products'));
    }

    public function men()
    {
        $category = Category::where('slug', 'men')->first();

        if (!$category) {
            // If category doesn't exist, show all products from category ID 2 (assuming men is ID 2)
            $products = Product::where('category_id', 2)
                ->with(['category', 'subcategory'])
                ->active()
                ->get();
        } else {
            $products = Product::where('category_id', $category->id)
                ->with(['category', 'subcategory'])
                ->active()
                ->get();
        }

        return view('categories.men', compact('products'));
    }

    public function accessories()
    {
        $category = Category::where('slug', 'accessories')->first();

        if (!$category) {
            // If category doesn't exist, show all products from category ID 3 (assuming accessories is ID 3)
            $products = Product::where('category_id', 3)
                ->with(['category', 'subcategory'])
                ->active()
                ->get();
        } else {
            $products = Product::where('category_id', $category->id)
                ->with(['category', 'subcategory'])
                ->active()
                ->get();
        }

        return view('categories.accessories', compact('products'));
    }
}
