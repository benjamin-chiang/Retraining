@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('css/products_list.css')}}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<style>
  a {
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
    <div class="col-12 col-lg-3 card-group">
      <a href="/product/content/{{$product->id}}">
        <div class="card">
          <img src="{{asset($product->img)}}" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p>${{$product->price}}</p>
            <a href="" class="btn btn-primary">加入購物車</a>
          </div>
        </div>
      </a>
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