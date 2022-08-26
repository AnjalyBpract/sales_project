<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product_category;
use App\Models\Product;
use App\Models\User;
class SaleCRUDController extends Controller
{

    public function index()
    {
    $data['transactions'] = Transaction::orderBy('id','desc')->paginate(5);
    return view('transactions.index', $data);
    }

    public function create()
    {
        $data = User::get();

        return view('transactions.create',compact('data'));
    }

    public function fetchProduct_category(Request $request)
    {
        $data['product_categories'] = Product_category::where("user_id", $request->user_id)
                                ->get(["name", "id"]);

        return response()->json($data);
    }


    public function fetchProduct(Request $request)
    {
        $data['products'] = Product::where("product_category_id", $request->product_category_id)
                                ->get(["name", "id"]);

        return response()->json($data);
    }


    public function store(Request $request)
    {
    $request->validate([
    'date' => 'required',
    'product_category_id' => 'required',
    'product_id' => 'required',
    'trasation_type' => 'required',
    'user_id' => 'required',
    'quantity' => 'required',
    'rate' => 'required',
    'amount' => 'required'

    ]);
    $transaction = new Transaction;
    $transaction->date = $request->emdateail;
    $transaction->product_category_id = $request->product_category_id;
    $transaction->product_id = $request->product_id;
    $transaction->trasation_type = $request->trasation_type;
    $transaction->user_id = $request->user_id;
    $transaction->quantity = $request->quantity;
    $transaction->rate = $request->rate;
    $transaction->amount = $request->amount;

    $transaction->save();
    return redirect()->route('transactions.index')
    ->with('success','Transation has been created successfully.');
    }

    public function edit(Transaction $transaction)
    {
    return view('transactions.edit',compact('transaction'));
    }


    public function update(Request $request, $id)
    {
    $request->validate([

        'date' => 'required',
        'product_category_id' => 'required',
        'product_id' => 'required',
        'trasation_type' => 'required',
        'user_id' => 'required',
        'quantity' => 'required',
        'rate' => 'required',
        'amount' => 'required'
    ]);
    $transaction = Transaction::find($id);

    $transaction->date = $request->emdateail;
    $transaction->product_category_id = $request->product_category_id;
    $transaction->product_id = $request->product_id;
    $transaction->trasation_type = $request->trasation_type;
    $transaction->user_id = $request->user_id;
    $transaction->quantity = $request->quantity;
    $transaction->rate = $request->rate;
    $transaction->amount = $request->amount;
    $transaction->save();

    return redirect()->route('transactions.index')
    ->with('success','Transactions Has Been updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
    $transaction->delete();
    return redirect()->route('transactions.index')
    ->with('success','Transactions has been deleted successfully');
    }
}