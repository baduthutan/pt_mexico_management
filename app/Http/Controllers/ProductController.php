<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class ProductController extends Controller
{
    // Display the product catalog (for users)
    public function catalog()
    {
        $products = Product::all();
        return view('catalog', compact('products'));
    }

    // Add a product to the user's cart (invoice)
    public function addToCart(Request $request)
    {
        $product = Product::find($request->input('product_id'));

        if (!$product) {
            return redirect()->route('user.catalog')->with('error', 'Product not found.');
        }

        // Validate if the product is in stock
        if ($product->Quantity <= 0) {
            return redirect()->route('user.catalog')->with('error', 'Product is out of stock. Please wait for it to be restocked.');
        }

        // Create or retrieve the user's invoice
        $userInvoice = Invoice::firstOrCreate([
            'UserID' => auth()->user()->id,
            // Add other invoice data as needed
        ]);

        // Create an invoice item for the selected product
        InvoiceItem::create([
            'InvoiceID' => $userInvoice->id,
            'ProductID' => $product->id,
            'ProductName' => $product->ProductName,
            'Quantity' => 1, // You can adjust the quantity as needed
            'Subtotal' => $product->Price, // Calculate subtotal based on price and quantity
        ]);

        // Decrease the product quantity in stock
        $product->Quantity--;

        // Save changes
        $product->save();

        return redirect()->route('user.catalog')->with('success', 'Product added to cart successfully.');
    }
}

