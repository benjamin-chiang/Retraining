<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function sessionAll()
    {   
        // dd(session()->get('paywayTransportArray'));
        dd(session()->all());
    }

    public function payway(Request $request)
    {
        $qty = $request->all();                
        session()->put('productQty', $qty);        
        session()->push('productQtyArray', $qty);        
        return view('front.checkout.checkout2');        
    }
    
    public function info(Request $request)
    {
        // dd($request->all());
        $paywayTransport = $request->all();
        session()->put('paywayTransport', $paywayTransport);
        session()->push('paywayTransportArray', $paywayTransport);        
        return view('front.checkout.checkout3');
    }

    public function finish()
    {
        return view('front.checkout.checkout4');
    }
}
