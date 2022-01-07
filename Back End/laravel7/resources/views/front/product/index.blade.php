@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('css/products_list.css')}}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<style>
  a{
    color: gray;
    text-decoration: none;
  }
</style>
@endsection

@section('main')
<hr>
<section>
  <h2 class="text-center p-3">最新商品</h2>
</section>
<section class="container">
  <a href="/product" class="btn btn-success">全部</a>
  @foreach ($productTypes as $type)
  <a href="/product?typeId={{$type->id}}" class="btn btn-success">{{$type->name}}</a>
  @endforeach
  <div class="row row-cols-lg-4 py-3">
    @foreach ($products as $product)
    <div class="col-12 col-lg-3">
      <div class="card h-100 p-3">
        <a href="/product/content/{{$product->id}}">
          <div class="pic mb-3">
            <img src="{{asset($product->img)}}" class="w-100" max-height="259px">
          </div>
          <div class="text">
            <p>{{$product->name}}</h2>
            <p>${{$product->price}}</p>
          </div>
        </a>
        <div class="btn btn-primary">加入購物車</div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- <ul style="list-style-type:none">
    @foreach ($products as $product)
    <li>
      <a href="/product/content/{{$product->id}}">
        <div class="details">
          <h2 class="h6">{{$product->name}}</h2>
          <p class="price">${{$product->price}}</p>
          <div class="product">
            <img src="{{asset($product->img)}}">
          </div>
        </div>
      </a>
    </li>
    @endforeach
  </ul> --}}
</section>


@endsection

@section('js')

@endsection