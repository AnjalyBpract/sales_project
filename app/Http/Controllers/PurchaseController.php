<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
class PurchaseController extends Controller
{
    public function index()
    {

    // $purchases= Transaction::orderBy('id','desc')->paginate(5);
    $purchases=Transaction::with('product','product_category','user')->where('type','vendor')->get();
    return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
    $datas = ProductCategory::get();
    $data = User::get();
    return view('purchases.create',compact('data','datas'));
    }

    public function store(Request $request)
    {

    $request->validate([


    'product_category_id' => 'required',
    'product_id'=> 'required',
    'user_id'=> 'required',
    'quantity'=> 'required',
    'rate'=> 'required',
    'total_amount'=> 'required',
    ]);

    $request['type']= 'vendor';
    $request['date']  = Carbon::today();
    Transaction::create($request->all());

    return redirect()->route('purchases.index')->with('success','Sales has been created successfully.');

    }

    public function edit(Transaction $purchase)
    {

         $datas=Product::get();
         $datass=ProductCategory::get();
        $data=User::where('type','vendor')->get();
//  dd($data);
      return view('purchases.edit',compact('purchase','datas','data','datass'));

    }

    public function update(Request $request,Transaction $purchase)
    {

    $purchase->update($request->all());

    return redirect()->route('purchases.index')->with('success','Purchase Has Been updated successfully');
    }


    public function destroy(Transaction $purchase)
    {
    $purchase->delete();
     return redirect()->route('purchases.index')->with('success','Purchase  has been deleted successfully');
    }




}
