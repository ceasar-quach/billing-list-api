<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Invoice extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'invoices';
    protected $fillable = [
        "client",
        "amount",
        "deposit",
        "paid",
        "status",
    ];
    use HasFactory;
}
