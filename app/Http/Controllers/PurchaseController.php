<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product_category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
class PurchaseController extends Controller
{
    public function index()
    {

    $purchases= Purchase::orderBy('id','desc')->paginate(5);
    return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
    $datas = Product_category::get();
    $data = User::get();
    return view('purchases.create',compact('data','datas'));
    }

    public function store(Request $request)
    {
    //   dd( $request);
    $request->validate([


    'product_category_id' => 'required',
    'product_id'=> 'required',
    'user_id'=> 'required',
    'quantity'=> 'required',
    'rate'=> 'required',
    'total_amount'=> 'required',
    ]);

    $request['type']= 'vendor';
    $today = Carbon::today();
    $request['date'] = $today;

    Purchase::create($request->all());

    return redirect()->route('purchases.index')->with('success','Sales has been created successfully.');

    }

    public function edit(Purchase $purchase)
    {

         $datas=Product::get();
         $datass=Product_category::get();
        $data=User::where('type','vendor')->get();
//  dd($data);
      return view('purchases.edit',compact('purchase','datas','data','datass'));

    }

    public function update(Request $request,Purchase $purchase)
    {

    $purchase->update($request->all());

    return redirect()->route('purchases.index')->with('success','Purchase Has Been updated successfully');
    }


    public function destroy(Purchase $purchase)
    {
    $purchase->delete();
     return redirect()->route('purchases.index')->with('success','Purchase  has been deleted successfully');
    }

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
}
