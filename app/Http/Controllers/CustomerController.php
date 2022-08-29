<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::orderBy('id','desc')->paginate(5);
        return view('customers.index', compact('customers'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('customers.create');
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

        $request['type']= 'customer';
        $today = Carbon::today();
        $request['date'] = $today;

        User::create($request->all());

        return redirect()->route('customers.index')->with('success','Customer has been created successfully.');
    }


    public function edit(User $customer)
    {
        return view('customers.edit',compact('customer'));
    }


    public function update(Request $request, User $customer)
    {

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success','Vendor Has Been updated successfully');
    }


    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success','Vendor has been deleted successfully');
    }
}
