<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $newsData = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = Storage::disk('myfile')->putFile('news', $file);
            $newsData['img'] = '/upload/'.$path;
            // dd($newsData);
        }
        News::create($newsData);
        // 等於
        // News::create([
        //     "title" => $request->title,
        //     "date" => $request->date,
        //     "content" => $request->content,
        //     "img" => $request->$newsData['img']
        // ]);

        // redirect用「/」表示網址重新定向去的位置
        return redirect('/admin/news');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update($id, Request $request)
    {
        $news = News::find($id);
        $requestUpdate = $request->all();
        if ($request->hasFile('img')) {
            File::delete(public_path().$news->img);
            $file = $request->file('img');
            $path = Storage::disk('myfile')->putFile('news', $file);
            $requestUpdate['img'] = '/upload/'.$path;
            // dd($news['img']);
        }
        // dd($requestUpdate);
        News::find($id)->update($requestUpdate);
        return redirect('/admin/news');
    }

    public function delete($id)
    {
        News::find($id)->delete();
        return redirect('/admin/news');
    }
}
