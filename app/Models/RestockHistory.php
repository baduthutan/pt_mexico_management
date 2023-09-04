<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestockHistory extends Model
{
    protected $primaryKey = 'RestockID';
    public $timestamps = false;
    protected $fillable = ['ProductID', 'RestockDate'];

    // Define the Product relationship (Each restock history entry belongs to one product)
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }
}

