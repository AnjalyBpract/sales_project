<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_category;

class ProductCRUDController extends Controller
{

    public function index()
    {
    $datas = Product_category::with('products')->get();
    return view('products.index',compact('datas'));

    }

    public function create()
    {
     $data = Product_category::with('products')->get();

    return view('products.create',compact('data'));
    }

    public function store(Request $request)
    {
        //  return $request->all();
    $request->validate([

    'name' => 'required',
    'description' => 'required',
    'purchase_price'=> 'required',
    'active'=> 'required',
    'sale_price'=> 'required',
    'product_category_id'=> 'required'
    ]);

    Product::create($request->all());

    return redirect()->route('products.index')->with('success','Products has been created successfully.');
    }

    public function edit(Product $product)
    {
    return view('products.edit',compact('product'));
    }

    public function update(Request $request,Product $product)
    {

    $product->update($request->all());

    return redirect()->route('products.index')->with('success','Product Has Been updated successfully');
    }


    public function destroy(Product $product)
    {
    $product->delete();
     return redirect()->route('products.index')->with('success','Products  has been deleted successfully');
    }
}
