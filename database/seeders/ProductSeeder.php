<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Women's Products
        Product::create([
            'name' => 'Monogram Fitted Dress',
            'slug' => 'monogram-fitted-dress',
            'description' => 'Romantic touches refresh this sleek dress for the season. Cut from flexible, form-fitting technical gabardine, an illustrative iteration of the iconic Monogram motif features as an allover print.',
            'short_description' => 'Elegant fitted dress with monogram pattern',
            'price' => 4690.00,
            'sku' => 'DRESS001',
            'stock_quantity' => 10,
            'images' => ['/images/monogram-dress-1.jpg', '/images/monogram-dress-2.jpg'],
            'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
            'colors' => ['Black', 'Navy', 'Cream'],
            'category_id' => 1,
            'subcategory_id' => 1,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Daisy Print Pleated Skirt',
            'slug' => 'daisy-print-pleated-skirt',
            'description' => 'A feminine pleated skirt featuring a charming daisy print, perfect for spring and summer occasions.',
            'short_description' => 'Feminine pleated skirt with daisy print',
            'price' => 4050.00,
            'sku' => 'SKIRT001',
            'stock_quantity' => 8,
            'images' => ['/images/daisy-skirt.jpg'],
            'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
            'colors' => ['White', 'Black'],
            'category_id' => 1,
            'subcategory_id' => 1,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Blurry Monogram Cut Jeans',
            'slug' => 'blurry-monogram-cut-jeans',
            'description' => 'Contemporary cut jeans with a subtle blurry monogram pattern, combining comfort with luxury style.',
            'short_description' => 'Stylish jeans with monogram pattern',
            'price' => 2400.00,
            'sku' => 'JEANS001',
            'stock_quantity' => 15,
            'images' => ['/images/monogram-jeans.jpg'],
            'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
            'colors' => ['Blue', 'Black'],
            'category_id' => 1,
            'subcategory_id' => 1,
            'is_featured' => false,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Monogram Silk Dress',
            'slug' => 'monogram-silk-dress',
            'description' => 'Luxurious silk dress featuring the iconic monogram pattern in an elegant design.',
            'short_description' => 'Luxury silk dress with monogram',
            'price' => 3900.00,
            'sku' => 'DRESS002',
            'stock_quantity' => 6,
            'images' => ['/images/silk-dress.jpg'],
            'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
            'colors' => ['Navy', 'Black', 'Burgundy'],
            'category_id' => 1,
            'subcategory_id' => 1,
            'is_featured' => true,
            'is_active' => true
        ]);

        // Women's Bags
        Product::create([
            'name' => 'Neverfull Bandoulière',
            'slug' => 'neverfull-bandouliere',
            'description' => 'The iconic Neverfull bag gets a fresh interpretation in vibrant colors.',
            'short_description' => 'Iconic luxury handbag',
            'price' => 2300.00,
            'sku' => 'BAG001',
            'stock_quantity' => 5,
            'images' => ['/images/neverfull-bag.jpg'],
            'colors' => ['Pink', 'Brown', 'Black'],
            'category_id' => 1,
            'subcategory_id' => 2,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Carryall BB',
            'slug' => 'carryall-bb',
            'description' => 'Compact yet spacious carryall bag perfect for daily use.',
            'short_description' => 'Compact luxury carryall',
            'price' => 2700.00,
            'sku' => 'BAG002',
            'stock_quantity' => 4,
            'images' => ['/images/carryall-bb.jpg'],
            'colors' => ['Brown', 'Black'],
            'category_id' => 1,
            'subcategory_id' => 2,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'White Luise Bucket',
            'slug' => 'white-luise-bucket',
            'description' => 'Elegant bucket bag in pristine white with colorful monogram pattern.',
            'short_description' => 'Elegant white bucket bag',
            'price' => 3000.00,
            'sku' => 'BAG003',
            'stock_quantity' => 3,
            'images' => ['/images/white-luise.jpg'],
            'colors' => ['White', 'Cream'],
            'category_id' => 1,
            'subcategory_id' => 2,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Neverfull Inside Tote',
            'slug' => 'neverfull-inside-tote',
            'description' => 'Spacious tote bag perfect for work and travel.',
            'short_description' => 'Spacious luxury tote',
            'price' => 3500.00,
            'sku' => 'BAG004',
            'stock_quantity' => 7,
            'images' => ['/images/neverfull-inside.jpg'],
            'colors' => ['Black', 'Brown', 'Navy'],
            'category_id' => 1,
            'subcategory_id' => 2,
            'is_featured' => false,
            'is_active' => true
        ]);

        // Men's Products
        Product::create([
            'name' => 'Major Loafer',
            'slug' => 'major-loafer',
            'description' => 'Classic leather loafers for the sophisticated gentleman.',
            'short_description' => 'Classic leather loafers',
            'price' => 3300.00,
            'sku' => 'SHOE002',
            'stock_quantity' => 12,
            'images' => ['/images/major-loafer.jpg'],
            'sizes' => ['39', '40', '41', '42', '43', '44', '45'],
            'colors' => ['Black', 'Brown'],
            'category_id' => 2,
            'subcategory_id' => 4,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'LV Trainer Sneaker',
            'slug' => 'lv-trainer-sneaker',
            'description' => 'This cult sneaker comes in a new colorway that brings a contemporary edge to any outfit.',
            'short_description' => 'Contemporary luxury sneaker',
            'price' => 1860.00,
            'sku' => 'SHOE001',
            'stock_quantity' => 8,
            'images' => ['/images/lv-trainer.jpg'],
            'sizes' => ['39', '40', '41', '42', '43', '44'],
            'colors' => ['Blue', 'White', 'Black'],
            'category_id' => 2,
            'subcategory_id' => 4,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Varenne Chelsea Boot',
            'slug' => 'varenne-chelsea-boot',
            'description' => 'Refined Chelsea boots crafted from premium leather for the modern gentleman.',
            'short_description' => 'Premium leather Chelsea boots',
            'price' => 1700.00,
            'sku' => 'BOOT001',
            'stock_quantity' => 6,
            'images' => ['/images/chelsea-boot.jpg'],
            'sizes' => ['39', '40', '41', '42', '43', '44', '45'],
            'colors' => ['Black', 'Brown'],
            'category_id' => 2,
            'subcategory_id' => 4,
            'is_featured' => false,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'LV Footprint Racing High Top Sneaker',
            'slug' => 'lv-footprint-racing-sneaker',
            'description' => 'High-top racing sneakers with distinctive design and premium materials.',
            'short_description' => 'Racing high-top sneakers',
            'price' => 2500.00,
            'sku' => 'SHOE003',
            'stock_quantity' => 4,
            'images' => ['/images/racing-sneaker.jpg'],
            'sizes' => ['39', '40', '41', '42', '43', '44'],
            'colors' => ['Red', 'Black', 'White'],
            'category_id' => 2,
            'subcategory_id' => 4,
            'is_featured' => true,
            'is_active' => true
        ]);

        // Accessories
        Product::create([
            'name' => 'Signature Leather Belt',
            'slug' => 'signature-leather-belt',
            'description' => 'Premium leather belt with signature buckle design.',
            'short_description' => 'Premium leather belt',
            'price' => 890.00,
            'sku' => 'BELT001',
            'stock_quantity' => 20,
            'images' => ['/images/leather-belt.jpg'],
            'sizes' => ['80', '85', '90', '95', '100', '105'],
            'colors' => ['Black', 'Brown', 'Navy'],
            'category_id' => 3,
            'subcategory_id' => 7,
            'is_featured' => false,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Signature Gold Necklace',
            'slug' => 'signature-gold-necklace',
            'description' => 'Elegant gold necklace with signature pendant.',
            'short_description' => 'Elegant gold necklace',
            'price' => 1250.00,
            'sku' => 'JEWELRY001',
            'stock_quantity' => 8,
            'images' => ['/images/gold-necklace.jpg'],
            'colors' => ['Gold', 'Rose Gold'],
            'category_id' => 3,
            'subcategory_id' => 5,
            'is_featured' => true,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Luxury Fragrance Collection',
            'slug' => 'luxury-fragrance-collection',
            'description' => 'Exclusive fragrance set with three signature scents.',
            'short_description' => 'Luxury fragrance set',
            'price' => 450.00,
            'sku' => 'FRAG001',
            'stock_quantity' => 15,
            'images' => ['/images/fragrance-set.jpg'],
            'category_id' => 3,
            'subcategory_id' => 6,
            'is_featured' => true,
            'is_active' => true
        ]);
    }
}
