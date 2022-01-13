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
        $allData = $request->all();           
        $cartCollection = \Cart::getContent();        
        session()->forget('productQty');
        foreach ($cartCollection as $product) {
            $productName = $product->name;            
            session()->push('productQty', [
                $productName => $allData[$productName],
            ]);            
        }
        
        session()->put('totalCalc',[
            'totalQty'=>$allData['totalQty'],
            'subPrice'=>$allData['subPrice'],
            'shipmentPrice'=>$allData['shipmentPrice'],
            'totalPrice'=>$allData['totalPrice'],
        ]);
        
        return view('front.checkout.checkout2');
    }

    public function info(Request $request)
    {        
        $paywayTransport = $request->all();        
        session()->put("paywayTransport",[
            'paymentMethod' => $paywayTransport['paymentMethod'],
            'transportMethod' => $paywayTransport['transportMethod']
        ]);        
        return view('front.checkout.checkout3');
    }

    public function finish(Request $request)
    {
        $buyerInfo = $request->all();
        session()->put('buyerInfo', $buyerInfo);        
        $cartCollection = \Cart::getContent();
        return view('front.checkout.checkout4', compact('cartCollection'));
    }
}
