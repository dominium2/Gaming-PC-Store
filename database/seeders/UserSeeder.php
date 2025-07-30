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
            'username' => 'johny_does',
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'address' => '123 Main St, Springfield',
            'profile_picture' => null, // Assuming no profile picture for this user
            'bio' => 'Just a regular guy who loves gaming.',
            'password' => Hash::make('password'), // Hash the password
        ]);

        User::create([
            'username' => 'Willy_Smithy',
            'name' => 'Will Smith',
            'email' => 'will.smith@example.com',
            'address' => '123 Main St, Springfield',
            'profile_picture' => null, // Assuming no profile picture for this user
            'bio' => 'Just a regular guy who loves gaming.',
            'password' => Hash::make('password'), // Hash the password
        ]);

        User::create([
            'username' => 'clarkus_kentus',
            'name' => 'Clark Kent',
            'email' => 'clark.kent@example.com',
            'address' => '123 Main St, Springfield',
            'profile_picture' => null, // Assuming no profile picture for this user
            'bio' => 'Just a regular guy who loves gaming.',
            'password' => Hash::make('password'), // Hash the password
        ]);

        User::create([
            'username' => 'bruce_wayne',
            'name' => 'Bruce Wayne',
            'email' => 'bruce.wayne@example.com',
            'address' => '123 Main St, Springfield',
            'profile_picture' => null, // Assuming no profile picture for this user
            'bio' => 'Just a regular admin who loves gaming.',
            'password' => Hash::make('password'), // Hash the password
            'is_admin' => true, // Mark this user as an admin
        ]);
    }
}
