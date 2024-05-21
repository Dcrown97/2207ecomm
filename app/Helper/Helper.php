<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Apr-21
 * Time: 5:03 PM
 */

namespace App\Helper;


use App\Models\Contact;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Sold;
use Illuminate\Support\Facades\Log;

class Helper {

    public static function getWeekSales(){
        $week = time() - (60*60*24*7);
        $lastWeekDate = date('Y-m-d', $week);
        $sales = Sold::leftJoin('sales', 'sales.id', '=', 'sold.sales_id')
            ->where('sales.status', 'success')
            ->where('sold.created_at', '>=', $lastWeekDate)
            ->get();

        $products = [];
        foreach ($sales as $sale){
            $item = [];
            $item['name'] = $sale->product;
            $product = Product::where('name', $sale->product)->first();
            $item['image'] = $product->images[0]->file_path;
            $item['cost'] = $sale->price;
            $item['date'] = $sale->created_at;
            $item['sales_id'] = $sale->sales_id;
            $products[] = $item;
        }
        return $products;
    }

    public static function getTodayMessages(){
        $week = time() - (1000*60*60*24*7);
        $lastWeekDate = date('Y-m-d', $week);
        $messages = Contact::where('created_at', '>=', $lastWeekDate)->get();
        return $messages;
    }
}