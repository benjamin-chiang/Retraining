@extends('layouts.template')

@section('css')

<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
<style>

  main img{
    height: 400px;
  }

  .content {
    width: 600px;
    word-break: break-all;
  }
</style>
@endsection

@section('main')
<hr>
<section class="container px-5">
  <div class="d-flex text-center justify-content-around">
    <img src="{{asset($productDetail->img)}}">
    <div class="px-3 pt-5 border-left">
      <h2 class="h1">{{$productDetail->name}}</h2>
      <p class="my-5 h3">Price：$ {{$productDetail->price}}</p>
      <p class="content">{{$productDetail->description}}</p>
    </div>
  </div>
</section>
<hr>

@endsection

@section('js')

@endsection