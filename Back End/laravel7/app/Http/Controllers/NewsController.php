<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class NewsController extends Controller
{
    public function index()
    {
        $newsData = News::get();
        // 在view中用「.」來表示資料夾結構
        return view('admin.news.index', compact('newsData'));
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        News::create($request->all());
        // redirect用「/」表示網址重新定向去的位置
        return redirect('/admin/news');
    }
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit',compact('news'));
    }
    public function update($id, Request $request)
    {
        News::find($id)->update($request->all());
        return redirect('/admin/news');
    }
    public function delete($id)
    {
        News::find($id)->delete();
        return redirect('/admin/news');
    }
}
