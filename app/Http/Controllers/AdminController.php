<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Use authentication middleware to ensure only authenticated users can access admin routes.
        $this->middleware('admin'); // Use a custom admin middleware to check if the user has admin privileges.
    }

    // Display the admin dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store a newly created product in the database
    public function store(ProductRequest $request)
    {
        // Validate the request using the ProductRequest validation rules

        // Create a new product
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        // Handle product image upload
        if ($request->hasFile('product_image')) {
            // Upload the image and store the file path in the database
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            $product->product_image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    // Show the form for editing a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update the specified product in the database
    public function update(ProductRequest $request, $id)
    {
        // Validate the request using the ProductRequest validation rules

        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        // Handle product image update
        if ($request->hasFile('product_image')) {
            // Delete the previous image if it exists
            if ($product->product_image) {
                Storage::disk('public')->delete($product->product_image);
            }

            // Upload the new image and store the file path in the database
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            $product->product_image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    // Remove the specified product from the database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the product image if it exists
        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}

