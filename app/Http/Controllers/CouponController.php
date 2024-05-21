<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
    public function index(){
        return view('coupons.index', ['coupons'=> Coupon::orderBy('created_at', 'desc')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'qty' => 'required|int',
            'cost_ngn' => 'required',
            'cost_dol' => 'required',
        ]);

        $characters = '0123456789abcdefghijklmnopqurstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLen = strlen($characters);
        $code = '';
        for($i = 0; $i<5; $i++){
            $code .= $characters[rand(0, $charLen -1)];
        }

        $coupon = new Coupon();
        $coupon->code = $code;
        $coupon->qty = $request->qty;
        $coupon->cost_ngn = $request->cost_ngn;
        $coupon->cost_dol = $request->cost_dol;
        $coupon->start = $request->start;
        $coupon->end = $request->end;
        if($coupon->save()){
            return redirect()->route('coupons')->with('success', 'Coupon Added Successfully!');
        } else {
            return back()->with('failed', ['An error occurred and coupon not saved']);
        }
    }

    public function delete( $id = null){
        if($id == null) return back()->with('failed', ['Invalid URL!']);
        $coupon = Coupon::find($id);
        $coupon->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
