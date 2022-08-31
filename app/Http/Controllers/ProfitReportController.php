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
        // dd($request);
        // dd($request->startdate);
        $startDate= date($request->startDate);
        $endDate=date($request->endDate);

         $salesAmount=Transaction::getSalesAmount($startDate,$endDate);

         $purhaseAmount=Transaction::getPurchasesAmount($startDate,$endDate);

        // $total_sales= Transaction::whereBetween('date', [$startDate, $endDate])->where('type','customer')->sum('total_amount');
        // $total_purchase= Transaction::whereBetween('date', [$startDate, $endDate])->where('type','vendor')->sum('total_amount');
        $result = $salesAmount-$purhaseAmount;
        //   dd($purhaseAmount);

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
