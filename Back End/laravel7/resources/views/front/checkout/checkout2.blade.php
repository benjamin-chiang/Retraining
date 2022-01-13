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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center step active">2</div>
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
                <!-- 付款方式 -->
                <form action="/checkout/info" method="POST" class="paymentMethod_form-group">
                @csrf
                    <div class="mt-4 pt-4">
                        <fieldset>
                            <legend>付款方式</legend>
                            <div class="form-check py-3 creditEardPayment ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="paymentMethod" value="creditCard"
                                        checked>
                                    <span>信用卡付款</span>
                                </label>
                            </div>
                            <div class="form-check py-3 networkATM ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="paymentMethod"
                                        value="internetATM">
                                    <span>網路 ATM</span>
                                </label>
                            </div>
                            <div class="form-check py-3 convenienceStoreCode ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="paymentMethod" value="storeCode">
                                    <span>超商代碼</span>
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <!-- 運送方式 -->
                    <div class="mt-4 pt-4">
                        <fieldset>
                            <legend>運送方式</legend>
                            <div class="form-check py-3 deliveryService ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="transportMethod" value="cat"
                                        checked>
                                    <span>黑貓宅配</span>
                                </label>
                            </div>
                            <div class="form-check py-3 toTheConvenienceStore ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="transportMethod" value="store">
                                    <span>超商店到店</span>
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <!-- 購物車的footer -->
                    @php
                        // dump(session()->all());
                        $totalCount = session()->get('totalCalc')['總數量'];
                        $subPrice = session()->get('totalCalc')['小計'];
                        $transFee = session()->get('totalCalc')['運費'];
                        $totalPrice = session()->get('totalCalc')['總價'];
                    @endphp
                    <div class="cart-footer">
                        <div class="d-flex flex-column  align-items-end mt-4 pt-4">
                            <div class="w-25 d-flex justify-content-between align-items-center">
                                <span class="count">數量:</span><span class="count_price">{{$totalCount}}</span>
                            </div>
                            <div class="w-25 d-flex justify-content-between align-items-center">
                                <span class="subtotal">小計:</span><span class="subtotal_price">{{$subPrice}}</span>
                            </div>
                            <div class="w-25 d-flex justify-content-between align-items-center">
                                <span class="freight">運費:</span><span class="freight_fee">{{$transFee}}</span>
                            </div>
                            <div class="w-25 d-flex justify-content-between align-items-center">
                                <span class="total">總計:</span><span class="total_price">{{$totalPrice}}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4 pt-4">
                            <a href="/shopping_cart/list" class="btn btn-lg px-5 backStep_btn">上一步</a>
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

@endsection