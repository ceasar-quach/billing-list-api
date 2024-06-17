<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'admin';
    protected $fillable = [
        "username",
        "password",
        "firstname",
        "lastname",
    ];
    protected $hidden = [
        "password",
    ];
    use HasFactory;
}
