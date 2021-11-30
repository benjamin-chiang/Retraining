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
    public function store()
    {
        // redirect用「/」表示網址重新定向去的位置
        return redirect('/admin/news');
    }
    public function edit($id)
    {
        return view('admin.news.edit');
    }
    public function update($id)
    {
        return redirect('/admin/news');
    }
    public function delete($id)
    {
        return redirect('/admin/news');
    }
}
