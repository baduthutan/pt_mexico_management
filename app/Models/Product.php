<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductID';
    public $timestamps = false;
    protected $fillable = ['Category', 'ProductName', 'Price', 'Quantity', 'Photo'];

    // Define the InvoiceItem relationship (A product can be part of multiple invoice items)
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'ProductID');
    }
}

