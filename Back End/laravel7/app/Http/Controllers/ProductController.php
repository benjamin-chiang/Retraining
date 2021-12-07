<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImg;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with('productType')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productTypes = ProductType::get();
        return view('admin.product.create', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        if ($request->hasFile('img')) {
            // 抓到上傳的檔案
            $file = $request->file('img');
            // 將檔案依/config/filesystems內，自己設定的myfile，存到pulic資料夾中，並給予圖片一個亂數名稱
            $path = Storage::disk('myfile')->putFile('product', $file);
            // 把變更名稱後的圖檔路徑，替換上傳檔案的路徑
            $requestData['img'] = Storage::disk('myfile')->url($path);
        }
        $product = Product::create($requestData);

        $imgs = $request->file('imgs');
        foreach ($imgs as $img) {
            // 將檔案儲存到myfile內的路徑
            $path = Storage::disk('myfile')->putFile('product', $img);
            // 取得檔案在public內的路徑
            $publicPath = Storage::disk('myfile')->url($path);
            ProductImg::create([
                'product_id'=>$product->id,
                'img'=>$publicPath
            ]);
        }

        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $productTypes = ProductType::get();
        $product = Product::with('productType', 'productImgs')->find($id);

        return view('.admin.product.edit', compact('product', 'productTypes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $requestUpdate = $request->all();
        if($request->hasFile('img')){
            File::delete(public_path($product->img));
            $file = $request->file('img');
            $path = Storage::disk('myfile')->putFile('product', $file);
            $requestUpdate['img'] = Storage::disk('myfile')->url($path);
            // dd($requestUpdate);
        }
        Product::find($id)->update($requestUpdate);

        $imgs = $request->file('imgs');
        foreach ($imgs as $img) {
            // 將檔案儲存到myfile內的路徑
            $path = Storage::disk('myfile')->putFile('product', $img);
            // 取得檔案在public內的路徑
            $publicPath = Storage::disk('myfile')->url($path);
            ProductImg::create([
                'product_id'=>$product->id,
                'img'=>$publicPath
            ]);
        }

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // 抓到產品的資料，含關聯的類型、其他圖片
        $product = Product::with('productType', 'productImgs')->find($id);

        // 刪除主要圖片
        File::delete(public_path($product->img));
        $product->delete();

        // 刪除每一張的其他圖片
        foreach ($product->productImgs as $subImg ) {
            File::delete(public_path($subImg->img));
            $subImg->delete();
        }

        return redirect('admin/product');
    }

    public function delete_img(Request $request)
    {
        $subImg = ProductImg::find($request->id);
        File::delete(public_path($subImg->img));
        $subImg->delete();
        return 'success';
    }
}
