<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
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

    /**
     * Display the manage products page.
     */
    public function manage()
    {
        $products = Product::all(); // Fetch all products
        return view('products.manage-products', compact('products'));
    }

    /**
     * Store a new product.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'cpu' => 'required|string|max:255',
            'gpu' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $picture = $request->file('picture') ? file_get_contents($request->file('picture')->getRealPath()) : null;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'cpu' => $request->cpu,
            'gpu' => $request->gpu,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'picture' => $picture,
            'description' => $request->description,
        ]);

        return redirect()->route('products.manage')->with('status', 'Product added successfully.');
    }

    /**
     * Show the form for editing a product.
     */
    public function edit(Product $product)
    {
        return view('products.edit-product', compact('product'));
    }

    /**
     * Update a product's information.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'cpu' => 'required|string|max:255',
            'gpu' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0', // Validate stock field
        ]);

        if ($request->hasFile('picture')) {
            $product->picture = file_get_contents($request->file('picture')->getRealPath());
        }

        $product->update($request->only(['name', 'price', 'cpu', 'gpu', 'ram', 'storage', 'description', 'stock'])); // Include stock in the update

        return redirect()->route('products.manage')->with('status', 'Product updated successfully.');
    }

    /**
     * Remove a product from the database.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.manage')->with('status', 'Product deleted successfully.');
    }

    /**
     * Place an order for a product.
     */
    public function order(Product $product)
    {
        // Ensure stock is available
        if ($product->stock < 1) {
            return redirect()->route('products.show', $product->id)->with('error', 'This product is out of stock.');
        }

        // Decrease stock count
        $product->stock -= 1;
        $product->save();

        // Create an order
        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1, // Always order one PC
        ]);

        return redirect()->route('profile.orders')->with('status', 'Order placed successfully.');
    }
}
