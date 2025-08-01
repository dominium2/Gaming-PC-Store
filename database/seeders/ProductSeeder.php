<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Gaming PC Alpha',
                'price' => 1499.99,
                'cpu' => 'Intel Core i7-12700K',
                'gpu' => 'NVIDIA GeForce RTX 3070',
                'ram' => '16GB DDR4',
                'storage' => '1TB SSD',
                'picture' => null, // Add binary image data if needed
                'description' => 'A high-performance gaming PC for enthusiasts.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaming PC Beta',
                'price' => 999.99,
                'cpu' => 'AMD Ryzen 5 5600X',
                'gpu' => 'NVIDIA GeForce RTX 3060',
                'ram' => '16GB DDR4',
                'storage' => '512GB SSD',
                'picture' => null, // Add binary image data if needed
                'description' => 'A budget-friendly gaming PC with great performance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaming PC Gamma',
                'price' => 1999.99,
                'cpu' => 'Intel Core i9-12900K',
                'gpu' => 'NVIDIA GeForce RTX 3080',
                'ram' => '32GB DDR4',
                'storage' => '2TB SSD',
                'picture' => null, // Add binary image data if needed
                'description' => 'A premium gaming PC for hardcore gamers.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
