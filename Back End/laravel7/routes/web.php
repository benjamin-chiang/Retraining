<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// 前台首頁
Route::get('/', 'FrontController@index');

// 前台-聯絡我們
Route::post('/contact_us/store', 'ContactUsController@store');

// 前台-最新消息
Route::prefix('news')->group(function () {
    Route::get('/', 'FrontController@newsIndex');
    Route::get('/content/{id}', 'FrontController@newsContent');
});

// 前台-產品列表
Route::prefix('product')->group(function () {
    Route::get('/', 'FrontController@productIndex');
    Route::get('/content/{id}', 'FrontController@productContent');
});

// 前台-將商品存入購物車套件
Route::prefix('shopping_cart')->group(function ()
{
    Route::get('/list', 'ShoppingCartController@list'); // index
    Route::post('/add', 'ShoppingCartController@add'); // create
    Route::post('/delete', 'ShoppingCartController@delete'); //destroy
});

// 後台登入經過 middleware
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// 後台-最新消息
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::prefix('news')->group(function () {
        // 後端最新消息管理列表頁面(讀取)
        Route::get('/', 'NewsController@index');
        // 後端新增一條最新消息頁面(讀取)
        Route::get('/create', 'NewsController@create');
        // 新增一條最新消息，存入資料表(寫入)
        Route::post('/store', 'NewsController@store'); // C增
        // 編輯一條現有的最新消息(讀取)
        Route::get('/edit/{id}', 'NewsController@edit'); // R查
        // 將編輯後的最新消息更新(寫入)
        Route::post('/update/{id}', 'NewsController@update'); // U改
        // 刪除一條最新消息
        Route::post('/delete/{id}', 'NewsController@delete'); // D刪
    });
    // 後台-產品列表
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store'); // C增
        Route::get('/edit/{id}', 'ProductController@edit'); // R查
        Route::post('/update/{id}', 'ProductController@update'); // U改
        Route::post('/delete/{id}', 'ProductController@delete'); // D刪
        Route::post('/delete_img', 'ProductController@delete_img');// 刪除多圖檔中的單一圖檔

        // 產品類別
        Route::prefix('type')->group(function () {
            Route::get('/', 'ProductTypeController@index');
            Route::get('/create', 'ProductTypeController@create');
            Route::post('/store', 'ProductTypeController@store'); // C增
            Route::get('/edit/{id}', 'ProductTypeController@edit'); // R讀
            Route::post('/update/{id}', 'ProductTypeController@update'); // U改
            Route::get('/destroy/{id}', 'ProductTypeController@destroy'); // D刪
        });
    });
});

