<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function list()
    {
        // 查看購物車內現有的內容
        $cartCollection = \Cart::getContent();                       
        if ($cartCollection == '') {
            return redirect('/product');
        }
        return view('front.checkout.checkout1', compact('cartCollection') );
        
    }

    public function add(Request $request)
    {
        // 去Product這個model中的products資料表中去找，找前台頁面送進來的id，看有沒有對的上的id
        $product = Product::find($request->fetchProductId);
        // 判斷是否真的有找到商品
        if ($product) {
            // 找到那對應的商品後，放入購物車內，購物車請查看官方文件
            \Cart::add(array(
                'id' => $product->id, // 商品id必須唯一
                'name' => $product->name, //　商品名稱
                'price' => $product->price, // 商品價格
                'quantity' => 1, // 商品數量
                'attributes' => array(
                    'img' => $product->img,
                ) // 自定義的參數
            ));
            // 存入後返回成功訊息給前台頁面，觸發sweet alert
            return 'success';                 
        } else {
            return 'fail';
        }
        
    }

    public function delete(Request $request)
    {   
        // 
        if ($request->fetchProductId) {
            \Cart::remove($request->fetchProductId);
            return 'success';
        }else{
            return 'fail';
        }
    }    
}
