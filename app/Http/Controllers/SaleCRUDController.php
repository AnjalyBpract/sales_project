<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product_category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
class SaleCRUDController extends Controller
{

    public function index()
    {

    $sales= Transaction::orderBy('id','desc')->paginate(5);
    return view('sales.index', compact('sales'));
    }

    public function create()
    {
    $datas = Product_category::get();
    $data = User::get();
    return view('sales.create',compact('data','datas'));
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

    $request['type']= 'customer';
    $today = Carbon::today();
    $request['date'] = $today;

    Transaction::create($request->all());

    return redirect()->route('sales.index')->with('success','Sales has been created successfully.');

    }

    public function edit(Transaction $sale)
    {

         $datas=Product::get();
         $datass=Product_category::get();
        $data=User::where('type','customer')->get();
//  dd($data);
      return view('sales.edit',compact('sale','datas','data','datass'));

    }

    public function update(Request $request,Transaction $sale)
    {

    $sale->update($request->all());

    return redirect()->route('sales.index')->with('success','Sale Has Been updated successfully');
    }


    public function destroy(Transaction $sale)
    {
    $sale->delete();
     return redirect()->route('sales.index')->with('success','Sales  has been deleted successfully');
    }

    public function product(Request $request)
    {
    $product_category=$request->product_category;
   $products=Product::where('product_category_id',$product_category)->get();
   return view('sales.product',compact('products'));
    }

    public function rate(Request $request)
    {
        $product_id=$request->product_id;
        $rate = Product::where('id',$product_id)->value('sale_price');
        return response()->json($rate);
    }

}
