<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class VendorController extends Controller
{
    public function index()
    {
        $vendors = User::orderBy('id','desc')->paginate(5);
        return view('vendors.index', compact('vendors'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('vendors.create');
    }

    public function store(Request $request)
    {
        //   dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'address' => 'required',
            'active' => 'required'
        ]);



        User::create($request->all());

        return redirect()->route('vendors.index')->with('success','Vendor has been created successfully.');
    }


    public function edit(User $vendor)
    {
        return view('vendors.edit',compact('vendor'));
    }


    public function update(Request $request, User $vendor)
    {
        $request->validate([

            'password' => 'required',
            'email' => 'required',
            'name' => 'required',
            'address' => 'required',
            'active' => 'required'
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.index')->with('success','Vendor Has Been updated successfully');
    }


    public function destroy(User $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendors.index')->with('success','Vendor has been deleted successfully');
    }
}
