<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product_category;
use App\Models\Product;
use App\Models\User;
class SaleCRUDController extends Controller
{

    public function index()
    {
    $sales= Sale::orderBy('id','desc')->paginate(5);
    return view('sales.index', compact('sales'));
    }

    public function create()
    {
    //   $data = Product_category::with('products')->get();
    $data = User::get();
    return view('sales.create',compact('data'));
    }

    public function store(Request $request)
    {
        //  return $request->all();
    $request->validate([

    'date' => 'required',
    'product_category_id' => 'required',
    'product_id'=> 'required',
    'type'=> 'required',
    'user_id'=> 'required',
    'quantity'=> 'required',
    'rate'=> 'required',
    'amount'=> 'required',
    ]);

    Sale::create($request->all());

    return redirect()->route('sales.index')->with('success','Sales has been created successfully.');
    }

    public function edit(Sale $sale)
    {
    return view('sales.edit',compact('sale'));
    }

    public function update(Request $request,Sale $sale)
    {

    $sale->update($request->all());

    return redirect()->route('sales.index')->with('success','Sale Has Been updated successfully');
    }


    public function destroy(Sale $sale)
    {
    $sale->delete();
     return redirect()->route('sales.index')->with('success','Sales  has been deleted successfully');
    }

    public function product(Request $request)
    {
    $product_category=$request->product_category;
   $products=Product::where('product_category_id',$product_category)->get();
   return view('sales.product',compact('products'))
    }
}
