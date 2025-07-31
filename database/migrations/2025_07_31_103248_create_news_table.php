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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the news post
            $table->text('content'); // Content of the news post
            $table->binary('picture')->nullable(); // Picture for the news post
            $table->date('post_date'); // Post date
            $table->timestamps();
        });

        // Modify the picture column to LONGBLOB using raw SQL
        DB::statement('ALTER TABLE news MODIFY picture LONGBLOB');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
