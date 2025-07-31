<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call all seeders here
        $this->call([
            UserSeeder::class,
            ImageSeeder::class,
            NewsSeeder::class,
            FaqsTableSeeder::class,
            MessagesTableSeeder::class,
        ]);
    }
}
