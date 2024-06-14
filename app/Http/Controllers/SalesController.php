<?php


namespace App\Http\Controllers;


use App\Models\Sales;
use Illuminate\Support\Facades\Request;

class SalesController
{

    public function report(Request $request){
        $sales = Sales::where('status', 'success')->orderBy('created_at', 'desc')->paginate(1000);
        $pending = Sales::where('status', 'pending')->orderBy('created_at', 'desc')->paginate(1000);
        $others = Sales::where('status', '!=', 'success')->where('status', '!=', 'pending')->orderBy('created_at', 'desc')->paginate(1000);
        return view('sales.report', ['sales'=>$sales, 'others'=>$others, 'pending'=>$pending]);
    }

    public function view($id = null){
        if($id == null) back()->with('failed', ['Not found']);
        $sale = Sales::find($id);
        if(null == $sale) back()->with('failed', ['Not found']);
//        dd($sale->ship);
        return view('sales.view', ['sale'=>$sale]);
    }
}
