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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center step active">1</div>
                            <span>確認購物車</span>
                        </div>
                        <div class="d-flex flex-column align-items-center w-25  position-relative">
                            <div class="progress position-absolute">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center step active">2</div>
                            <span>付款與運送方式</span>
                        </div>
                        <div class="d-flex flex-column align-items-center w-25  position-relative">
                            <div class="progress position-absolute">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center step active">3</div>
                            <span>填寫資料</span>
                        </div>
                        <div class="d-flex flex-column align-items-center w-25  position-relative">
                            <div class="d-flex justify-content-center align-items-center step active">4</div>
                            <span>完成訂購</span>
                        </div>
                    </div>
                </div>
                <!-- 完成訂購 -->
                <div class="mt-4 pt-4">
                    <h1 class="text-center font-weight-bold">訂單成立</h1>
                    <!-- 訂單明細 -->                   
                    <h3 class="mb-4">訂單明細</h3>
                    @php
                        $productInCarts = session()->get('productInCart');
                        // foreach ($productInCarts as $productInCart) {
                        //     echo $productInCart;
                        // }
                        for ($productIncarts=1; $productIncarts < 4; $productIncarts++) { 
                            dump($productInCarts);
                        }
                    @endphp
                    @foreach ($cartCollection as $product)
                    <div class="order_detail">
                        <div class="d-flex justify-content-between align-items-center mt-4 pt-4 order-item">
                            <div class="d-flex align-items-center order-item-info">
                                <img src="{{ $product->attributes->img }}" class="img-fluid mr-3"
                                    alt="Responsive image" style="width: 60px;height: 60px;">
                                <div>
                                    <p>商品名稱:{{ $product->name }}</p>
                                    <span>商品編號:{{ $product->id }}</span>
                                </div>
                            </div>
                            <div class="order-item-price d-flex align-items-center">                                
                                <h6>商品數量:XXX</h6>
                                <span>商品價格:還不知道怎麼抓</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- 寄送資料 -->
                    @php
                    $buyerName = session()->get('buyerInfo')['name'];
                    $buyerPhone = session()->get('buyerInfo')['phoneNumber'];
                    $buyerEmail = session()->get('buyerInfo')['email'];
                    $buyerCounty = session()->get('buyerInfo')['county'];
                    $buyerDis = session()->get('buyerInfo')['district'];
                    $buyerZipcode = session()->get('buyerInfo')['zipcode'];
                    $buyerAddress = session()->get('buyerInfo')['address'];
                    @endphp
                    <div class="mt-4 pt-4 send_information">
                        <h3>寄送資料</h3>
                        <div class="d-flex ml-2 mt-2 pt-3">
                            <label class="name" style="width: 100px">姓名：</label>
                            <div class="checkout4_name infor_text">{{ $buyerName }}</div>
                        </div>
                        <div class="d-flex ml-2 mt-2 pt-3">
                            <label class="phoneNumber" style="width: 100px">電話：</label>
                            <div class="checkout4_phoneNumber infor_text">{{ $buyerPhone }}</div>

                        </div>
                        <div class="d-flex ml-2 mt-2 pt-3">
                            <label class="email" style="width: 100px">Email：</label>
                            <div class="checkout4_email infor_text">{{ $buyerEmail }}</div>
                        </div>
                        <div class="d-flex ml-2 mt-2 pt-3">
                            <label class="city" style="width: 100px">地址：</label>
                            <div class="checkout4_city infor_text">
                                {{ $buyerZipcode . $buyerCounty . $buyerDis . $buyerAddress }}</div>
                        </div>

                    </div>
                </div>
                <!-- 購物車的footer -->
                @php
                // dump(session()->all());
                $totalQty = session()->get('productInCart')['totalQty'];
                $subPrice = session()->get('productInCart')['subPrice'];
                $shipmentPrice = session()->get('productInCart')['shipmentPrice'];
                $totalPrice = session()->get('productInCart')['totalPrice'];
                @endphp
                <div class="cart-footer">
                    <div class="d-flex flex-column  align-items-end mt-4 pt-4">
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="count">數量:</span><span class="count_price">{{$totalQty}}</span>
                        </div>
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="subtotal">小計:</span><span class="subtotal_price">{{$subPrice}}</span>
                        </div>
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="freight">運費:</span><span class="freight_fee">{{$shipmentPrice}}</span>
                        </div>
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="total">總計:</span><span class="total_price">{{$totalPrice}}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4 pt-4">
                        <a href="/checkout/information" class="btn btn-lg px-5  backStep_btn">上一步</a>
                        <a href="/" class="btn btn-lg px-5 nextStep_btn">返回首頁</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection