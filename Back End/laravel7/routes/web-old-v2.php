<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 首頁
Route::get('/', function () {
    return view('welcome');
});

// prefix是前綴詞，表示整個群組內的網址，都需要從prefix(XXX)出發
// middleware('auth')，需要經過登入才有辦法進入
Route::prefix('news')->middleware('auth')->group(function () {
    // 最新消息列表頁面
    Route::get('', 'NewsController@index');
    Route::get('/detail/{id}', 'NewsController@detail');
    // 新增資料頁面
    Route::get('/create', 'NewsController@create');
    // 儲存資料
    Route::post('/store', 'NewsController@store');
    // 編輯頁面
    Route::get('/edit/{id}', 'NewsController@edit');
    // 更新資料
    Route::post('/update/{id}', 'NewsController@update');
    // 刪除資料
    Route::get('/delete/{id}', 'NewsController@delete');
});

// 聯絡我們
Route::post('/contact_us/store', 'ContactUsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
