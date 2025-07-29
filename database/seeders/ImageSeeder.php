<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the first image file
        $imagePath1 = public_path('/image/CS_NZXTH6RGB_400.webp'); // Ensure this file exists in the public directory
        $imageData1 = file_get_contents($imagePath1);

        // Insert the first image into the database
        Image::create([
            'image_data' => $imageData1,
        ]);

        // Path to the second image file
        $imagePath2 = public_path('/image/smokey_background.jpg'); // Ensure this file exists in the public directory
        $imageData2 = file_get_contents($imagePath2);

        // Insert the second image into the database
        Image::create([
            'image_data' => $imageData2,
        ]);
    }
}
