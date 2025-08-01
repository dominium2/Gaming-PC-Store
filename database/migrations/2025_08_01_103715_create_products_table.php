<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the PC
            $table->decimal('price', 10, 2); // Price of the PC
            $table->string('cpu'); // CPU details
            $table->string('gpu'); // GPU details
            $table->string('ram'); // RAM details
            $table->string('storage'); // Storage details
            $table->text('description'); // Detailed description
            $table->timestamps();
        });

        // Modify the picture column to LONGBLOB using raw SQL
        DB::statement('ALTER TABLE products ADD picture LONGBLOB NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
