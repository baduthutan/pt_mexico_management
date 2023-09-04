<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedirectLog extends Model
{
    public $timestamps = false;
    protected $fillable = ['UserID', 'PageAccessed', 'AccessTimestamp'];

    // Define the User relationship (Each log entry belongs to one user)
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}

