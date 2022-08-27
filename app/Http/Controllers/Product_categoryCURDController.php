<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_category;

class Product_categoryCURDController extends Controller
{

    public function index()
    {
    $product_categories= Product_category::orderBy('id','desc')->paginate(5);
    return view('product_categories.index', compact('product_categories'));
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

    Product_category::create($request->all());

    return redirect()->route('product_categories.index')->with('success','Product Category has been created successfully.');
    }

    public function edit(Product_category $product_category)

    {
    return view('product_categories.edit',compact('product_category'));
    }

    public function update(Request $request,Product_category $product_category)
    {

    $product_category->update($request->all());

    return redirect()->route('product_categories.index')->with('success','Product Category Has Been updated successfully');
    }

    public function destroy(Product_category $product_category)
    {
        // dd($product_category);
        $product_category->delete();
        return redirect()->route('product_categories.index')->with('Product category has been deleted successfully');
    }
}
