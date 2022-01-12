@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/checkout.css') }}">
@endsection

@section('main')
    <section id="cart" class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-5">
                    <!-- 購物車的header -->
                    <div class="cart_header">
                        <h2 class="card-title ">購物車</h2>
                        <div class="d-flex progress-block pb-4 mb-4">
                            <!-- 進度條 -->
                            <div class="d-flex flex-column align-items-center w-25 position-relative">
                                <div class="progress position-absolute">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                        aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center step active">1</div>
                                <span>確認購物車</span>
                            </div>
                            <div class="d-flex flex-column align-items-center w-25  position-relative">
                                <div class="progress position-absolute">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center step">2</div>
                                <span>付款與運送方式</span>
                            </div>
                            <div class="d-flex flex-column align-items-center w-25  position-relative">
                                <div class="progress position-absolute">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center step">3</div>
                                <span>填寫資料</span>
                            </div>
                            <div class="d-flex flex-column align-items-center w-25  position-relative">
                                <div class="d-flex justify-content-center align-items-center step">4</div>
                                <span>完成訂購</span>
                            </div>
                        </div>
                    </div>
                    <!-- 訂單明細 -->
                    <form action="/checkout/payway" method="post">
                        @csrf
                        <div class="mt-4 pt-4">
                            <h3 class="mb-4">訂單明細</h3>
                            @foreach ($cartCollection as $product)
                                <div class="d-flex justify-content-between align-items-center mt-4 pt-4 order-item">
                                    <div class="d-flex align-items-center order-item-info">
                                        <button type="button" class="del-btn btn btn-danger btn-sm mr-3"
                                            data-id="{{ $product->id }}">X</button>
                                        @php
                                            $img = $product->attributes->img;
                                        @endphp
                                        <img src="{{ asset($img) }}" class="img-fluid mr-3" alt="Responsive image"
                                            width="50px" height="50px">
                                        <div>
                                            <p>{{ $product->name }}</p>
                                            <span>訂單編號</span>
                                        </div>
                                    </div>
                                    <div class="order-item-price">
                                        <button type="button" class="minus btn btn-secondary">-</button>
                                        <input type="number" class="qty text-center" value="{{ $product->quantity }}"
                                            name="{{$product->id."-".$product->name}}">
                                        <button type="button" class="plus btn btn-secondary">+</button>
                                        <span class="price" style="font-size: 16px;font-weight:bold;"
                                            data-price={{ $product->price }}>{{ number_format($product->price * $product->quantity) }}</span>
                                    </div>
                                </div>
                            @endforeach

                            <!-- 購物車的加總區 -->
                            <div class="cart-footer">
                                <div class="d-flex flex-column  align-items-end mt-4 pt-4">
                                    <div class="w-25 d-flex justify-content-between align-items-center">
                                        <span class="count">數量:</span>
                                        <span id="totalQty" class="count_price"></span>
                                    </div>
                                    <div class="w-25 d-flex justify-content-between align-items-center">
                                        <span class="subtotal">小計:</span>
                                        <span id="subPrice" class="subtotal_price"></span>
                                    </div>
                                    <div class="w-25 d-flex justify-content-between align-items-center">
                                        <span class="freight">運費:</span>
                                        <span id="shipmentPrice" class="freight_fee"></span>
                                    </div>
                                    <div class="w-25 d-flex justify-content-between align-items-center">
                                        <span class="total">總計:</span>
                                        <span id="totalPrice" class="total_price"></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4 pt-4">
                                    <a href="/product" class="btn px-5 backToShop_btn"><i class="fas fa-arrow-left"></i>
                                        返回購物</a>                                    
                                    <button type="submit" class="btn btn-lg px-5 nextStep_btn">下一步</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection

@section('js')
<script src="{{asset('js/checkout.js')}}"></script>    
@endsection
