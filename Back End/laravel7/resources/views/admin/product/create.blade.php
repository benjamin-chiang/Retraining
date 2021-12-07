@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('main')
    <div class="container p-5">
        {{-- 只要使用POST就必須有@csrf --}}
        <form action="/admin/product/store" method="POST" class="mx-auto" enctype="multipart/form-data" >
            @csrf
            <h1>新增產品</h1>
            <div class="form-group">
                {{-- label跟input一組，id對for，name是資料表內欄位名稱 --}}
                <label for="type_id">類型</label>
                {{-- <input type="text" name="type" id="type"> --}}
                <select name="type_id" id="type_id">
                    @foreach ($productTypes as $productType)
                        <option value="{{$productType->id}}">{{$productType->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">名稱</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="description">簡介</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="img">主要圖片</label>
                <input type="file" accept="image/*" name="img" id="img">
            </div>
            <div class="form-group">
                <label for="imgs">其他圖片</label>
                <input type="file" accept="image/*" name="imgs[]" id="imgs" multiple>
            </div>
            <div class="form-group">
                <label for="price">價格</label>
                <input type="number" name="price" id="price">
            </div>
            <button type="submit">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection