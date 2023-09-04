<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'User';
    protected $primaryKey = 'UserID';
    public $timestamps = false;
    protected $fillable = ['FullName', 'Email', 'Password', 'PhoneNumber','UserRole'];
}

