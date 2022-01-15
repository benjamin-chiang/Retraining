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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center step active">3</div>
                            <span>填寫資料</span>
                        </div>
                        <div class="d-flex flex-column align-items-center w-25  position-relative">
                            <div class="d-flex justify-content-center align-items-center step">4</div>
                            <span>完成訂購</span>
                        </div>
                    </div>
                </div>
                <!-- 寄送資料 -->
                <form action="/checkout/finish" method="POST" class="paymentMethod_form-group">
                    @csrf
                    <div class="mt-4 pt-4">
                        <fieldset>
                            <legend>寄送資料</legend>
                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="emailHelp" placeholder="王小明">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">電話</label>
                                <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber"
                                    placeholder="0912345678">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="abc123@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="address">地址</label>
                                <div class="d-flex flex-column city-selector-set">
                                    <div class="d-flex mb-3">
                                        <select class="county form-control" name="county" style="width: 40%;"></select>
                                        <select class="district form-control" name="district"
                                            style="width: 40%;"></select>
                                        <input class="zipcode form-control" type="text" size="3" readonly
                                            placeholder="郵遞區號" name="zipcode" style="width: 20%;">
                                    </div>
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder="地址">
                                </div>
                            </div>
                        </fieldset>

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
                            <a href="/checkout/payway" class="btn btn-lg px-5 backStep_btn">上一步</a>
                            <button type="submit" class="btn btn-lg px-5 nextStep_btn">下一步</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('js/tw-city-selector.js') }}"></script>
<script>
    new TwCitySelector({
            el: '.city-selector-set',
            elCounty: '.county', // 在 el 裡查找 element
            elDistrict: '.district', // 在 el 裡查找 element
            elZipcode: '.zipcode' // 在 el 裡查找 element
        });
</script>
@endsection