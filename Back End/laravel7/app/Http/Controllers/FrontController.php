<?php

namespace App\Http\Controllers;

use App\News;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function newsIndex()
    {
        $newsData = News::get();
        return view('front.news.index', compact('newsData'));
    }

    public function newsContent($id)
    {
        $newsDetail = News::find($id);
        return view('front.news.content', compact('newsDetail'));
    }

    public function productIndex()
    {
        $products = Product::with('ProductType')->get();                
        return view('front.product.index', compact('products'));
    }

    public function productContent($id)
    {
        $productDetail = Product::find($id);
        return view('front.product.content', compact('productDetail'));
    }
}
