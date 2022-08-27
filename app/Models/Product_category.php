<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $fillable = [
    'name',
   'description',
    'active',
];

public function products()
{
    return $this->hasMany(Product::class);
}

}
