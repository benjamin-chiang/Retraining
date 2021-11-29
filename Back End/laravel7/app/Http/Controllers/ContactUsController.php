<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function store(Request $request)
    {
        ContactUs::create($request->all());
        // dd($request->all());
        return redirect('/');
    }
}
