<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the image file
        $imagePath = public_path('/image/CS_NZXTH6RGB_400.webp'); // Ensure the file exists in the public directory

        // Read the image as binary data
        $imageData = file_get_contents($imagePath);

        // Insert the image into the database
        Image::create([
            'image_data' => $imageData,
        ]);
    }
}
