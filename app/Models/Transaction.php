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
         'type',
         'user_id',
         'quantity',
         'rate',
         'total_amount'
    ];

    public static function getSalesAmount($startDate,$endDate){
        return SELF::whereBetween('date',[$startDate,$endDate])->where('type','customer')->sum('total_amount');

    }
    public static function getPurchasesAmount($startDate,$endDate){
        return SELF::whereBetween('date',[$startDate,$endDate])->where('type','vendor')->sum('total_amount');

    }
}


