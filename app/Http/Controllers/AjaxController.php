<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class AjaxController extends Controller

{

    public function product(Request $request)
    {
    $product_category=$request->product_category;
   $products=Product::where('product_category_id',$product_category)->get();
   return view('purchases.product',compact('products'));
    }

    public function rate(Request $request)
    {
        $product_id=$request->product_id;
        $rate = Product::where('id',$product_id)->value('purchase_price');
        return response()->json($rate);
    }
    public function saleprice(Request $request)
    {
        $product_id=$request->product_id;
        $saleprice = Product::where('id',$product_id)->value('sale_price');
        return response()->json($saleprice);
    }

}
