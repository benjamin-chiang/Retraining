<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function sessionAll()
    {   
        dd(session()->all());
    }
    public function calc(Request $request)
    {
        $qty = $request->all();        
        session(['productQty'=>$qty]);
        return view('front.checkout.checkout2');
    }

    public function payway()
    {
        return view('front.checkout.checkout3');
    }

    public function info()
    {
        return view('front.checkout.checkout4');
    }
}
