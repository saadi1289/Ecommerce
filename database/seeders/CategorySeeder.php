<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and gadgets',
                'status' => 'active',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Apparel and accessories',
                'status' => 'active',
            ],
            [
                'name' => 'Books',
                'description' => 'Books and literature',
                'status' => 'active',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
