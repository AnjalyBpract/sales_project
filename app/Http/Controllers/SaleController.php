<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
class SaleController extends Controller
{

    public function index()
    {

    // $sales= Transaction::orderBy('id','desc')->paginate(5);
    $sales=Transaction::with('product','product_category','user')->where('type','customer')->get();
    return view('sales.index', compact('sales'));
    }

    public function create()
    {
    $datas = ProductCategory::get();
    $sale = User::get();
    return view('sales.create',compact('sale','datas'));
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

    $request['type']= 'customer';
    $request['date']  = Carbon::today();

    Transaction::create($request->all());

    return redirect()->route('sales.index')->with('success','Sales has been created successfully.');

    }

    public function edit(Transaction $sale)
    {

        $datas=Product::get();
        $datass=ProductCategory::get();
        $data=User::where('type','customer')->get();

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
}
