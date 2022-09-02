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

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function product_category(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    // public static function getSalesAmount($startDate,$endDate){
    //     return SELF::whereBetween('date',[$startDate,$endDate])->where('type','customer')->sum('total_amount');

    // }
    // public static function getPurchasesAmount($startDate,$endDate){
    //     return SELF::whereBetween('date',[$startDate,$endDate])->where('type','vendor')->sum('total_amount');

    // }
    public static function getAmountWithDate($request)
    {

        $amount=[];

        $amount['sales']=SELF::where(function($query) use($request){

        $startDate=date($request->startDate);
        $endDate=date($request->endDate);

        $query->whereBetween('date',[$startDate,$endDate])->where('type','customer');
        if($request->product_category_id){
            $query->where('product_category_id',$request->product_category_id);
            if($request->product_id !='')
            $query->where('product_id',$request->product_id);
        }})->sum('total_amount');

        $amount['purchases']=SELF::where(function($query) use($request){
            $startDate=date($request->startDate);
            $endDate=date($request->endDate );

            $query->whereBetween('date',[$startDate,$endDate])->where('type','vendor');
        if($request->product_category_id){
            $query->where('product_category_id',$request->product_category_id);
            if($request->product_id !='')
            $query->where('product_id',$request->product_id);
        }})->sum('total_amount');


            return $amount;
    }

}


