<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductCRUDController extends Controller
{

    public function index()
    {
    $data['products'] = Product::orderBy('id','desc')->paginate(5);
    return view('products.index', $data);
    }

    public function create()
    {
    return view('products.create');
    }

    public function store(Request $request)
    {
        return $request->all();
    $request->validate([

    'name' => 'required',
    'description' => 'required',
    'purchase_price'=> 'required',
    'active'=> 'required',
    'sale_price'=> 'required',
    'product_category_id'=> 'required'
    ]);
    $product = new Product;

    $product->name = $request->name;
    $product->description = $request->description;
    $product->purchase_price = $request->purchase_price;
    $product->sale_price = $request->sale_price;
    $product->product_category_id = $request->product_category_id;
    $product->active = $request->active;
    $product->save();

    // @foreach($manufacturerList as $item)
    // {

    //     $brand->manufacturer()->create(['manufacturer_id' => $item]);

    // }
    // @endforeach
    return redirect()->route('products.index')

    ->with('success','Product   has been created successfully.');
    }

    public function edit(Product $product)
    {
    return view('products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([


    'name'        => 'required',
    'description' => 'required',
    'purchase_price'=> 'required',
    'active'=> 'required',
    'sale_price'=> 'required',
    'product_category_id'=> 'required'
    ]);
    $product = Product::find($id);

    $product->name = $request->name;
    $product->description = $request->description;
    $product->purchase_price = $request->purchase_price;
    $product->sale_price = $request->sale_price;
    $product->product_category_id = $request->product_category_id;
    $product->active = $request->active;
    $product->save();


    return redirect()->route('products.index')
    ->with('success','Products  Has Been updated successfully');
    }

    public function destroy(Product $product)
    {
    $product->delete();
    return redirect()->route('products.index')
    ->with('success','Products  has been deleted successfully');
    }

}