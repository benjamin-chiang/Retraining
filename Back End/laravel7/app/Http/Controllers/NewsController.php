<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function index()
    {
        $newsData = DB::table('news')->get();        
        // 從array中拿資料，dd出來後arry的[索引值]->鍵
        // dd($newsData[0]->img);
        return view('news/news_list_page', compact('newsData'));
    }

    public function detail($id)
    {           
        $newsDetail = DB::table('news')->find($id);
        
        return view('news/news_content_page',compact('newsDetail'));
    }

    public function create()
    {       
        DB::table('news')->insert([                        
            'title'=>'abc',
            'date'=>'2021-11-01',
            'img'=>'https://onepage.nownews.com/sites/default/files/styles/crop_thematic_mobile_banner_img/public/2020-11/%E5%90%89%E5%A8%83%E5%A8%83MB.jpg',
            'content'=>'工三小盆友',
            'views'=>0,
        ]);
    }

    public function update($id)
    {
        DB::table('news')
        ->where('id', $id)
        ->update(['title'=>'XXX']);
    }

    public function delete($id)
    {
        DB::table('news')
        ->where('id',$id)
        ->delete();
    }
}
