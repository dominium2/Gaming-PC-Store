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
        News::create([
            'title' => 'New Gaming PC Released!',
            'content' => 'We are excited to announce the release of our latest gaming PC.',
            'picture' => null, // Add a binary image if needed
            'post_date' => now(),
        ]);

        News::create([
            'title' => 'Holiday Sale!',
            'content' => 'Enjoy discounts on all gaming PCs this holiday season.',
            'picture' => null, // Add a binary image if needed
            'post_date' => now()->subDays(7),
        ]);
    }
}
