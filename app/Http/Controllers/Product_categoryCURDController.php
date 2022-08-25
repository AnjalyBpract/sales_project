<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_category;
class Product_categoryCURDController extends Controller
{

    public function index()
    {
    $data['product_categories'] = Product_category::orderBy('id','desc')->paginate(5);
    return view('product_categories.index', $data);
    }

    public function create()
    {
    return view('product_categories.create');
    }

    public function store(Request $request)
    {
    $request->validate([

    'name' => 'required',
    'description' => 'required',
    'active' => 'required'
    ]);
    $product_category = new Product_category;

    $product_category->name = $request->name;
    $product_category->description = $request->description;
    $product_category->active = $request->active;

    $product_category->save();

    return redirect()->route('product_categories.index')
    ->with('success','Product Category  has been created successfully.');
    }



    public function edit(Product_category $product_category)
    {
    return view('product_categories.edit',compact('product_category'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([

    'name' => 'required',
    'description' => 'required',
    'active' => 'required'
    ]);
    $product_category = Product_category::find($id);
    $product_category->name = $request->name;
    $product_category->description = $request->description;
    $product_category->active = $request->active;
    $product_category->save();

    return redirect()->route('product_categories.index')
    ->with('success','Product Category  Has Been updated successfully');
    }

    public function destroy(Product_category $product_category)
    {
    $product_category->delete();
    return redirect()->route('product_categories.index')
    ->with('success','Product Category  has been deleted successfully');
    }

}
