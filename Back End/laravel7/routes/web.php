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

Route::get('news', 'NewsController@index');
Route::get('news/detail/{id}', 'NewsController@detail');
Route::get('news/create', 'NewsController@create');
Route::get('news/update/{id}', 'NewsController@update');
Route::get('news/delete/{id}', 'NewsController@delete');