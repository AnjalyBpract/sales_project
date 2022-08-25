<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'date',
       'product_category_id',
        'product_id',
        'trasation_type',
        'user_id',
        'quantity',
        'rate',
        'amount'
    ];
}

