<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //
    public function index(){
        return view('shipping.index', ['locs'=>Shipping::all()]);
    }

    public function add(Request $request){
        $request->validate([
            'location'=> 'required|string'
        ]);

        if(null == $request->id || empty($request->id)) $shipping = new Shipping();
        else $shipping = Shipping::find($request->id);

        $shipping->location = $request->location;
        $shipping->cost_ngn = ($request->cost_ngn)? $request->cost_ngn : 0;
        $shipping->cost_dol = ($request->cost_dol)? $request->cost_dol : 0;
        if($shipping->save()){
            return redirect()->route('shipping')->with('success', 'Location added successfully!');
        } else {
            return back()->with('failed', ['Location could not be added. Please try again!']);
        }

    }

    public function delete( $id = null){
        if($id == null) return back()->with('failed', ['Invalid URL!']);
        $ship = Shipping::find($id);
        $ship->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
