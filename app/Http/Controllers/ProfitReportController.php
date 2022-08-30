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
    return view('profitreport.create');
    }
    public function report(Request $request)
    {


        // dd($request);
    //    dd($request->startdate);
        $startdate= date($request->startdate);
        $enddate=date($request->enddate);

        $total_sales= Transaction::whereBetween('date', [$startdate, $enddate])->where('type','customer')->sum('total_amount');
        $total_purchase= Transaction::whereBetween('date', [$startdate, $enddate])->where('type','vendor')->sum('total_amount');
        $result = $total_sales-$total_purchase;
        //  dd($result);
        if($result < 0)
        {
            $message="loss";

        }else{
            $message="earn";

        }
        return view('profitreport.create',compact('result','message'));

    }
    public function reportt(Request $request)
    {
    return view('profitreport.result');
    }

}
