<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'category' => 'General',
            'question' => 'What is this website about?',
            'answer' => 'This website is an online store for gaming PCs.',
        ]);

        Faq::create([
            'category' => 'Orders',
            'question' => 'How can I track my order?',
            'answer' => 'You can track your order by logging into your account and visiting the "Orders" section.',
        ]);

        Faq::create([
            'category' => 'Support',
            'question' => 'How can I contact support?',
            'answer' => 'You can contact support by filling out the contact form on the "Contact" page.',
        ]);
    }
}
