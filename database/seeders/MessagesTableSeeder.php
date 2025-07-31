<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert 10 sample messages
        Message::insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'message' => 'I have a question about your products.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'message' => 'Can you provide more details about the warranty?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'message' => 'Do you ship internationally?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bobbrown@example.com',
                'message' => 'What payment methods do you accept?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charlie Davis',
                'email' => 'charliedavis@example.com',
                'message' => 'How long does shipping take?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily Wilson',
                'email' => 'emilywilson@example.com',
                'message' => 'Can I return a product if I am not satisfied?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frank Thomas',
                'email' => 'frankthomas@example.com',
                'message' => 'Do you offer bulk discounts?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grace Lee',
                'email' => 'gracelee@example.com',
                'message' => 'Can I customize my order?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Henry White',
                'email' => 'henrywhite@example.com',
                'message' => 'What is your refund policy?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ivy Green',
                'email' => 'ivygreen@example.com',
                'message' => 'Do you have a physical store?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
