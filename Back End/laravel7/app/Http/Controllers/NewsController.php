<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function index()
    {
        $newsData = News::get();
        // dd($newsData[0]->content);
        return view('news/news_list_page', compact('newsData'));
    }

    public function detail($id)
    {
        // $newsDetail = DB::table('news')->find($id);
        $newsDetail = News::find($id);
        return view('news/news_content_page',compact('newsDetail'));
    }

    // 新增資料，返回新增資料的頁面
    public function create()
    {
        return view('news/create_news');
    }

    public function store(Request $request)
    {
        // 取得資料
        // dd($request->all());
        // 儲存資料至資料庫中的資料表
        News::create([
            'title'=>$request->title,
            'date'=>$request->date,
            'img'=>$request->img,
            'content'=>$request->content,
        ]);
        // 直接儲存所有的資料
        // News::create($request->all());

        // 返回最新消息列表頁
        return redirect('/news');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('news/edit_news', compact('news'));
    }

    public function update($id, Request $request)
    {
        // dd($request->all());
        News::find($id)->update($request->all());
        return redirect('/news');
    }

    public function delete($id)
    {
        News::find($id)->delete();
        return redirect('/news');
    }
}
