<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Sold;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::count();
        $pend = Product::where('posted', 0)->count();
        $posted = Product::where('posted', 1)->count();
        $users = User::count();
        $compl = Sales::where('status', 'success')->sum('total');
        $compl_count = Sales::where('status', 'success')->count();
        $total_sold = Sold::select('sold.id')
            ->leftJoin('sales', 'sales.id', '=', 'sold.sales_id')
            ->where('sales.status', 'success')->count();
        $pend_sales = Sales::where('status', 'pending')->count();
        $lastYear = date('Y-m-d', strtotime("-1 year"));
        $messages = Contact::orderBy('created_at', 'desc')->limit(10)->get();
        $data = DB::table('sales')
            ->select(
                DB::raw('YEAR(updated_at) as year'),
                DB::raw('MONTH(updated_at) as month'),
                DB::raw('SUM(total) as sum')
            )
            ->where('status', 'success')
            ->where('updated_at', '>=', $lastYear)
            ->groupBy('year', 'month')
            ->get();
        $dataArray = $data->toArray();
        $months = [];
        $amt = [];
        for($i=1; $i<=12; $i++){
            $dateObj   = \DateTime::createFromFormat('!m', $i);
            $months[] = $dateObj->format('F');
            $key = array_search($i, array_column($dataArray, 'month'));
            if($key !== false){
                $amt[] = $data[$key]->sum;
            } else {
                $amt[] = 0;
            }
        }

        $months_arr = json_encode($months);
        $amt_arr = json_encode($amt);

        $items = DB::table('sizes')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(quantity) as qty')
            )
            ->where('created_at', '>=', $lastYear)
            ->groupBy('year', 'month')
            ->get();
        $itemsArray = $items->toArray();
        $months = [];
        $amt = [];
        for($i=1; $i<=12; $i++){
            $dateObj   = \DateTime::createFromFormat('!m', $i);
            $months[] = $dateObj->format('F');
            $key = array_search($i, array_column($itemsArray, 'month'));
            if($key !== false){
                $amt[] = $items[$key]->qty;
            } else {
                $amt[] = 0;
            }
        }

        $items_mth_arr = json_encode($months);
        $items_arr = json_encode($amt);

        return view('dashboard.index', compact('cats', 'pend', 'posted', 'users', 'compl', 'compl_count',
            'total_sold', 'pend_sales', 'amt_arr', 'months_arr', 'items_mth_arr', 'items_arr', 'messages'));
    }
}
