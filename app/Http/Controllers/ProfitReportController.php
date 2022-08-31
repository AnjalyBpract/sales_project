<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_category;
use Carbon\Carbon;
use App\Models\Transaction;

class ProfitReportController extends Controller
{
    public function index(Request $request)
    {
        $data = Product_category::get();
        return view('profitreport.create',compact('data'));
    }
    public function report(Request $request)
    {

        $startDate= date($request->startDate);
        $endDate=date($request->endDate);

         $salesAmount=Transaction::getSalesAmount($startDate,$endDate);

         $purhaseAmount=Transaction::getPurchasesAmount($startDate,$endDate);


        $result = $salesAmount-$purhaseAmount;

        if($result <= 0)
        {
            $message="loss";

        }else{
            $message="earn";

        }
        return view('profitreport.result',compact('result','message'));

    }
    public function reportt(Request $request)
    {

        return view('profitreport.create',compact('datas'));
    }

}
