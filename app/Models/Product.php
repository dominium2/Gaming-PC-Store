<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'cpu',
        'gpu',
        'ram',
        'storage',
        'picture',
        'description',
        'stock', // Add stock to fillable attributes
    ];
}
