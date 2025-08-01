<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the product page.
     */
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('products.products', compact('products')); // Use 'products.products'
    }

    /**
     * Display a specific product's details.
     */
    public function show(Product $product)
    {
        return view('products.product-details', compact('product')); // Use 'products.product-details'
    }
}
