<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        // Retrieve all invoices (for admin)
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        // Show a specific invoice (for admin)
        return view('admin.invoices.show', compact('invoice'));
    }

    public function indexUser()
    {
        // Retrieve user-specific invoices (for regular users)
        $user = Auth::user();
        $invoices = $user->invoices;
        return view('user.invoices.index', compact('invoices'));
    }

    public function showUser(Invoice $invoice)
    {
        // Show a specific user invoice (for regular users)
        return view('user.invoices.show', compact('invoice'));
    }

    public function print(Invoice $invoice)
    {
        // Print an invoice (for both admin and regular users)
        return view('invoices.print', compact('invoice'));
    }

    public function save(Request $request)
    {
        // Save invoice data (e.g., after completing a purchase)
        $user = Auth::user(); // Get the currently authenticated user

        // Create a new invoice record
        $invoice = new Invoice([
            'UserID' => $user->id,
            'InvoiceNumber' => 'YourInvoiceNumberGenerationLogicHere', // Implement your logic to generate invoice numbers
            'ShippingAddress' => $request->input('shipping_address'),
            'PostalCode' => $request->input('postal_code'),
            'Subtotal' => $subtotal, // Calculate the subtotal
            'Total' => $total, // Calculate the total
        ]);

        $invoice->save(); // Save the invoice to the database

        // Loop through selected products and create invoice items
        foreach ($request->input('product_ids') as $productId) {
            // Retrieve product information based on $productId
            $product = Product::find($productId);

            // Calculate subtotal for this product
            $subtotal = $product->price * $quantity; // Implement your logic to calculate subtotal

            // Create an invoice item record
            $invoiceItem = new InvoiceItem([
                'InvoiceID' => $invoice->id,
                'ProductID' => $product->id,
                'ProductName' => $product->name,
                'Quantity' => $quantity,
                'Subtotal' => $subtotal,
            ]);

            $invoiceItem->save();
        }
        // You would typically handle this after a successful payment
        return redirect()->route('user.invoices.index')->with('success', 'Invoice saved successfully.');
    }
}