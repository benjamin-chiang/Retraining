@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('main')
    <div class="container p-5">
        {{-- 只要使用POST就必須有@csrf --}}
        <form action="/admin/product/update/{{$product->id}}" method="POST" class="mx-auto" enctype="multipart/form-data" >
            @csrf
            <h1>編輯產品</h1>
            <div class="form-group">
                {{-- label跟input一組，id對for，name是資料表內欄位名稱 --}}
                <label for="type_id">類型</label>
                {{-- <input type="text" name="type_id" id="type_id" value="{{$product->type_id}}"> --}}
                <select name="type_id" id="type_id">
                    @foreach ($productTypes as $productType)
                        <option value="{{$productType->id}}" @if ($productType->id == $product->type_id) selected @endif>
                            {{$productType->name}}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="name">名稱</label>
                <input type="text" name="name" id="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="description">簡介</label>
                <textarea name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <img src="{{ asset($product->img) }}" alt="" width="200px">
                <br>
                <label for="img">圖片</label>
                <input type="file" accept="image/*" name="img" id="img" value="{{$product->img}}">

            </div>
            <div class="form-group">
                <label for="price">價格</label>
                <input type="number" name="price" id="price" value="{{$product->price}}">
            </div>
            <button type="submit">修改</button>
        </form>
    </div>
@endsection

@section('js')

@endsection