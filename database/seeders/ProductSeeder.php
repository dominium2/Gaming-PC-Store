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
        $ImagePath = storage_path('app/seed-images/CS_NZXTH6RGB_400.webp'); // Path to the image file
        $ImageData = file_exists($ImagePath) ? file_get_contents($ImagePath) : null; // Read the image file

        Product::insert([
            [
                'name' => 'Gaming PC Alpha',
                'price' => 1499.99,
                'cpu' => 'Intel Core i7-12700K',
                'gpu' => 'NVIDIA GeForce RTX 3070',
                'ram' => '16GB DDR4',
                'storage' => '1TB SSD',
                'picture' => $ImageData, // Store binary image data
                'description' => 'A high-performance gaming PC for enthusiasts.',
                'stock' => 10,
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
                'picture' => $ImageData, // Store binary image data
                'description' => 'A budget-friendly gaming PC with great performance.',
                'stock' => 5,
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
                'picture' => $ImageData,
                'description' => 'A premium gaming PC for hardcore gamers.',
                'stock' => 2, // Add stock count
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
