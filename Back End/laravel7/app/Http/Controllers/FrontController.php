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

    public function productIndex(Request $request)
    {        
        $typeId = $request->typeId;
        $productTypes = ProductType::get();
        // 如果請求的資料帶有typeId，
        if ($typeId) {
            // 則用where找到products資料表中，所有相同type_id欄位的值，並取出來
            $products = Product::where('type_id',$typeId)->get();

            // 如果請求的資料沒有typeID，則取出所有資料
        } else {
            $products = Product::get();
        }

        return view('front.product.index', compact('products', 'productTypes'));
    }

    public function productContent($id)
    {
        $productDetail = Product::find($id);
        return view('front.product.content', compact('productDetail'));
    }
}
