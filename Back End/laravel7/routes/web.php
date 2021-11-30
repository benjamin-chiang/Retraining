<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 首頁
Route::get('/', function () {
    return view('index');
});
// 最新消息相關-前端
Route::prefix('news')->group(function () {
    Route::get('/', 'FrontController@newsindex');
    Route::get('/content/{id}', 'FrontController@newsContent');

});
// 最新消息-後台頁面
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::prefix('news')->group(function () {
        // 後端最新消息管理列表頁面(讀取)
        Route::get('/', 'NewsController@index');
        // 後端新增一條最新消息頁面(讀取)
        Route::get('/create', 'NewsController@create');// C增
        // 新增一條最新消息，存入資料表(寫入)
        Route::post('/store', 'NewsController@store');
        // 編輯一條現有的最新消息(讀取)
        Route::get('/edit/{id}', 'NewsController@edit');// R讀
        // 將編輯後的最新消息更新(寫入)
        Route::post('/update/{id}', 'NewsController@update');// U改
        // 刪除一條最新消息
        Route::get('/delete/{id}', 'NewsController@delete');// D刪
    });
});

// 聯絡我們
Route::post('/contact_us/store', 'ContactUsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
