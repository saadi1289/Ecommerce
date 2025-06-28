<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        $products = [
            [
                'name' => 'Smartphone X',
                'description' => 'Latest generation smartphone with advanced features',
                'short_description' => 'High-performance smartphone',
                'price' => 599.99,
                'stock' => 50,
                'sku' => 'SPX-001',
                'category_id' => $categories->where('name', 'Electronics')->first()->id,
                'main_image' => 'smartphone_x.jpg',
                'gallery_images' => json_encode(['spx_1.jpg', 'spx_2.jpg']),
                'is_active' => true,
                'visibility' => 'public',
                'color' => 'Black',
                'size' => 'N/A',
                'sale_price' => 549.99,
                'tags' => json_encode(['smartphone', 'electronics', 'gadget']),
            ],
            [
                'name' => 'Cotton T-Shirt',
                'description' => 'Comfortable cotton t-shirt for everyday wear',
                'short_description' => 'Classic cotton tee',
                'price' => 19.99,
                'stock' => 100,
                'sku' => 'TSH-001',
                'category_id' => $categories->where('name', 'Clothing')->first()->id,
                'main_image' => 'tshirt.jpg',
                'gallery_images' => json_encode(['tshirt_1.jpg', 'tshirt_2.jpg']),
                'is_active' => true,
                'visibility' => 'public',
                'color' => 'White',
                'size' => 'M',
                'sale_price' => null,
                'tags' => json_encode(['clothing', 't-shirt', 'casual']),
            ],
            [
                'name' => 'Programming Book',
                'description' => 'Comprehensive guide to modern programming',
                'short_description' => 'Programming reference book',
                'price' => 39.99,
                'stock' => 30,
                'sku' => 'BOK-001',
                'category_id' => $categories->where('name', 'Books')->first()->id,
                'main_image' => 'programming_book.jpg',
                'gallery_images' => json_encode(['book_1.jpg', 'book_2.jpg']),
                'is_active' => true,
                'visibility' => 'public',
                'color' => 'N/A',
                'size' => 'N/A',
                'sale_price' => 34.99,
                'tags' => json_encode(['book', 'programming', 'education']),
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
