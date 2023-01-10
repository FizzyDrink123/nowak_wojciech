<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoiceNo',
        'orderDate',
        'email',
        'fullName',
        'address',
        'phoneNumber',
        'city',
        'product',
        'price',
        'qunatity',
        'totalPrice',
    ];
}
