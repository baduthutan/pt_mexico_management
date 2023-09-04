<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'InvoiceID';
    public $timestamps = false;
    protected $fillable = ['UserID', 'InvoiceNumber', 'ShippingAddress', 'PostalCode', 'Subtotal', 'Total'];

    // Define the User relationship (Each invoice belongs to one user)
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    // Define the InvoiceItem relationship (Each invoice can have multiple invoice items)
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'InvoiceID');
    }
}

