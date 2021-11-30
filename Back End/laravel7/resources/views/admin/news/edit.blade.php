@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('main')
    <div class="container p-5">
        {{-- 只要使用POST就必須有@csrf --}}
        <form action="/admin/news/update/{{$news->id}}" method="POST" class="mx-auto">
            @csrf
            <h1>編輯最新消息</h1>
            <div class="form-group">
                {{-- label跟input一組，id對for，name是資料表內欄位名稱 --}}
                <label for="title">標題</label>
                <input type="text" name="title" id="title" value="{{$news->id}}">
            </div>
            <div class="form-group">
                <label for="date">時間</label>
                <input type="date" name="date" id="date" value="{{$news->date}}">
            </div>
            <div class="form-group">

                <label for="img">圖片</label>
                <input type="text" name="img" id="img" value="{{$news->img}}">
                <br>
                <img src="{{$news->img}}" alt="" width="150px">
            </div>
            <div class="form-group">
                <label for="content">內容</label>
                <textarea name="content" id="content" cols="30" rows="10">{{$news->content}}</textarea>
            </div>
            <button type="submit">修改</button>
        </form>
    </div>
@endsection

@section('js')

@endsection