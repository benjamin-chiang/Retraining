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
    // 給參數一個預設值null
    public function productIndex(Request $request)
    {        
        if ($request->typeId) {
            // 如果有type的話，取出相對應資料
            $products = Product::where('type_id', $request->typeId)->get();
        } else {
            // 沒有type的話，取出全部資料
            $products = Product::get();            
        }
        $productTypes = ProductType::get();
        return view('front.product.index', compact('products', 'productTypes'));
    }

    public function productContent($id)
    {
        $productDetail = Product::find($id);
        return view('front.product.content', compact('productDetail'));
    }
}
