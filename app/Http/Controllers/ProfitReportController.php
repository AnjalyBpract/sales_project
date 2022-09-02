<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Transaction;
use App\Models\Product;
class ProfitReportController extends Controller
{
    public function index(Request $request)
    {
        $data = ProductCategory::get();
        return view('profitreport.create',compact('data'));
    }


    public function report(Request $request)
    {

        $request->validate([

            'startDate' => 'required',
            'endDate' => 'required'
            ]);


        $amount =Transaction::getAmountWithDate($request);

         $salesAmount=$amount['sales'];

         $purchaseAmount=$amount['purchases'];

         $result = $salesAmount-$purchaseAmount;

        if($result <= 0)
        {
            $var=abs($result);
            $message="loss";

        }else{
             $var=$result;
            $message="earn";

        }
        return view('profitreport.result',compact('message','salesAmount','purchaseAmount','result'));

    }

}
