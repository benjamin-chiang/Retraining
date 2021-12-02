@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('main')
    <div class="container p-5">
        {{-- 只要使用POST就必須有@csrf --}}
        <form action="/admin/product/type/update/{{$productType->id}}" method="POST" class="mx-auto" enctype="multipart/form-data" >
            @csrf
            <h1>編輯產品類別</h1>
            <div class="form-group">
                {{-- label跟input一組，id對for，name是資料表內欄位名稱 --}}
                <label for="name">產品類別名稱</label>
                <input type="text" name="name" id="name" value="{{$productType->name}}">
            </div>
            <button type="submit">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection