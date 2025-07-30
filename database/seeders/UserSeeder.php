<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add multiple users
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password'), // Hash the password
        ]);

        User::create([
            'name' => 'Will Smith',
            'email' => 'will.smith@example.com',
            'password' => Hash::make('password'), // Hash the password
        ]);

        User::create([
            'name' => 'Clark Kent',
            'email' => 'Clark.Kent@example.com',
            'password' => Hash::make('password'), // Hash the password
        ]);
    }
}
