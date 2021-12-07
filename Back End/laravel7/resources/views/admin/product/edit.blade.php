@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
<style>
    .img-area {
        display: flex;
        flex-wrap: wrap;
    }

    .img {
        width: 200px;
        height: 200px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border: 1px solid black;
        margin-right: 10px;
        margin-bottom: 10px;
        position: relative;
    }

    .del-btn {
        width: 30px;
        height: 30px;
        color: white;
        background-color: red;
        border-radius: 100%;
        font-size: 20px;
        line-height: 1px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 0px;
        right: 0px;
        transform: translate(40%, -30%);
        cursor: pointer;
    }
</style>
@endsection

@section('main')
<div class="container p-5">
    {{-- 只要使用POST就必須有@csrf --}}
    <form action="/admin/product/update/{{ $product->id }}" method="POST" class="mx-auto" enctype="multipart/form-data">
        @csrf
        <h1>編輯產品</h1>
        <div class="form-group">
            {{-- label跟input一組，id對for，name是資料表內欄位名稱 --}}
            <label for="type_id">類型</label>
            {{-- <input type="text" name="type_id" id="type_id" value="{{$product->type_id}}"> --}}
            <select name="type_id" id="type_id">
                @foreach ($productTypes as $productType)
                <option value="{{ $productType->id }}" @if ($productType->id == $product->type_id) selected @endif>
                    {{ $productType->name }}
                </option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="name">名稱</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="description">簡介</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <img src="{{ asset($product->img) }}" alt="" width="200px">
            <br>
            <label for="img">主要圖片</label>
            <input type="file" accept="image/*" name="img" id="img" value="{{ $product->img }}">
        </div>
        <hr>
        <div class="form-group">
            <div class="img-area">
                @foreach ($product->productImgs as $subImg)
                <div class="img" id="img_{{$subImg->id}}" style="background-image: url('{{ asset($subImg->img) }}')">
                    <div class="del-btn" data-id="{{$subImg->id}}">X</div>
                </div>
                @endforeach
            </div>
            <br>
            <label for="imgs">其他圖片</label>
            <input type="file" accept="image/*" name="imgs[]" id="imgs" value="{{ $product->img }}" multiple>
        </div>
        <hr>
        <div class="form-group">
            <label for="price">價格</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}">
        </div>
        <button type="submit">修改</button>
    </form>
</div>
@endsection

@section('js')
<script>
    // 宣告所有其他圖片上的刪除按鈕
    let btns = document.querySelectorAll('.del-btn');
    // 將所有的按鈕綁定click事件
    btns.forEach(btn => {
        btn.addEventListener('click', function () {
            // 按下按鈕後要做的事情
            if (confirm('確定刪除本圖片？')) {
                // 確認後要做的事情
                let imgId = this.getAttribute('data-id');
                console.log(imgId);
                var formData = new FormData();
                formData.append('id', imgId);
                formData.append('_token', '{{ csrf_token() }}');
                // var delbtn = this;
                fetch('/admin/product/delete_img', {
                    method: 'POST',
                    body: formData
                })
                .then(function (response) {
                    return response.text();
                })
                .then(function (result) {
                    if (result == 'success') {
                        // delbtn.parentElement.remove();
                        document.querySelector('#img_'+imgId).remove();
                    }
                })
            }
        })
    });
</script>
@endsection