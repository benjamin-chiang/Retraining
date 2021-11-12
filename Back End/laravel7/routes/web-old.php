<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('test', function(){
    $data = '123';
    $data2 = '456';
    $data3 = '789';
    // 傳資料到blade的方法
    // 第一種：return view('test',['data'=>$data])
    // 第二種：reutrn view('test')->with('data',$data)
    // 第三種如下
    // dd(compact('data','data2','data3'));
    return view('test',compact('data','data2','data3'));
});

Route::get('lesson1', function () {

    // $變數名稱
    // = 指派運算子
    $data = ['a'=>123, 'b'=>456]; // 陣列資料，'a'這是鍵 => 123這是值
    // dd($data['a']); // 用方括號取值

    $num1 = '5';
    $num2 = '2';
    // 算術運算子
    // + - * / **平方 %
    // 字串運算子「.」
    dd($num1.$num2);

    return 'hello world!';
});
