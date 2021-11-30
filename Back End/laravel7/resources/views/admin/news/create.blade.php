@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">        
@endsection

@section('main')
    <div class="container p-5">
        {{-- 只要使用POST就必須有@csrf --}}
        <form action="/news/store" method="POST" class="mx-auto">
            @csrf
            <div class="form-group">
                {{-- label跟input一組，id對for，name是資料表內欄位名稱 --}}
                <label for="title">標題</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="date">時間</label>
                <input type="date" name="date" id="date">
            </div>
            <div class="form-group">
                <label for="img">圖片</label>
                <input type="text" name="img" id="img">
            </div>
            <div class="form-group">
                <label for="content">內容</label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">送出</button>
        </form>
    </div>
@endsection

@section('js')
    
@endsection