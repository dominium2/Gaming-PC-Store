<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the image file
        $imagePath = storage_path('public/seed-image/modern-gold-background-free-vector.jpg');
        $imageData = file_exists($imagePath) ? file_get_contents($imagePath) : null; // Read the image file

        News::create([
            'title' => 'New Gaming PC Released!',
            'content' => 'We are excited to announce the release of our latest gaming PC.',
            'picture' => $imageData, // Add binary image data
            'post_date' => now(),
        ]);

        News::create([
            'title' => 'Holiday Sale!',
            'content' => 'Enjoy discounts on all gaming PCs this holiday season.',
            'picture' => $imageData, // Add binary image data
            'post_date' => now()->subDays(7),
        ]);
    }
}
