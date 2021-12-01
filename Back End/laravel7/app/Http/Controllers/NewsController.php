<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
// File是另外引入的，引入的項目跟Storage一樣
use Illuminate\Support\Facades\File;

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
        // 從資料表找到該筆資料所有欄位內容
        $news = News::find($id);
        // 將修改後的全部欄位資料內容包起來
        $requestUpdate = $request->all();
        // 判斷是否有圖片的資料內容
        if ($request->hasFile('img')) {
            // 刪除舊圖片，透過$news找到原圖片位置
            File::delete(public_path().$news->img);
            // 將上傳的圖片打包起來
            $file = $request->file('img');
            // 將圖片上傳到public的資料夾中，myfile寫在config資料夾，filesystems.php這個檔案內，放在disks工作區域內
            $path = Storage::disk('myfile')->putFile('news', $file);
            // 將存好檔，重新命名後的圖片檔名，替換原本上傳檔案的img路徑
            $requestUpdate['img'] = '/upload/'.$path;
            // dd($news['img']);
        }
        // dd($requestUpdate);
        // 將所有新寫的資料，存入到資料表中
        News::find($id)->update($requestUpdate);
        return redirect('/admin/news');
    }

    public function delete($id)
    {
        $news = News::find($id);
        File::delete(public_path().$news->img);
        $news->delete();
        return redirect('/admin/news');
    }
}
