<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'date',
       'product_category_id',
        'product_id',
        'type',
        'user_id',
        'quantity',
        'rate',
        'total_amount'

    ];
}