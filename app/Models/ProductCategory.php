<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
    'name',
   'description',
    'active',
];

public function product()
{
    return $this->hasOne(Product::class);
}

}
