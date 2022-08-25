<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
       'description',
        'active',
        'purchase_price',
        'sale_price',
        'product_category_id'
    ];
}
