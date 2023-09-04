<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $primaryKey = 'InvoiceItemID';
    public $timestamps = false;
    protected $fillable = ['InvoiceID', 'ProductID', 'ProductName', 'Quantity', 'Subtotal'];

    // Define the Invoice relationship (Each invoice item belongs to one invoice)
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'InvoiceID');
    }

    // Define the Product relationship (Each invoice item corresponds to one product)
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }
}

