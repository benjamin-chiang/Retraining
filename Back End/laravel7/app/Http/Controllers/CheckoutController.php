<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function sessionAll()
    {   
        dd(session()->all());
    }

    public function payway(Request $request)
    {
        $qty = $request->all();        
        session(['productQty'=>$qty]);
        return view('front.checkout.checkout2');        
    }
    
    public function info(Request $request)
    {
        dd($request->all());
        return view('front.checkout.checkout3');
    }

    public function finish()
    {
        return view('front.checkout.checkout4');
    }
}
