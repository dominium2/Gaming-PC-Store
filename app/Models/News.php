<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'picture',
        'post_date',
    ];

    protected $casts = [
        'post_date' => 'date', // Cast post_date as a date
    ];
}
