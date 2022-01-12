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
                <div class="mt-4 pt-4">
                    <form action="" class="paymentMethod_form-group">
                        <fieldset>
                            <legend>付款方式</legend>
                            <div class="form-check py-3 creditEardPayment ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="paymentMethod" value="option1"
                                        checked>
                                    <span>信用卡付款</span>
                                </label>
                            </div>
                            <div class="form-check py-3 networkATM ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="paymentMethod" value="option2">
                                    <span>網路 ATM</span>
                                </label>
                            </div>
                            <div class="form-check py-3 convenienceStoreCode ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="paymentMethod" value="option3">
                                    <span>超商代碼</span>
                                </label>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!-- 運送方式 -->
                <div class="mt-4 pt-4">
                    <form action="" class="transportMethod_form-group">
                        <fieldset>
                            <legend>運送方式</legend>
                            <div class="form-check py-3 deliveryService ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="transportMethod" value="option1"
                                        checked>
                                    <span>黑貓宅配</span>
                                </label>
                            </div>
                            <div class="form-check py-3 toTheConvenienceStore ml-4">
                                <label class="form-check-label d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="transportMethod" value="option2">
                                    <span>超商店到店</span>
                                </label>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!-- 購物車的footer -->
                <div class="cart-footer">
                    <div class="d-flex flex-column  align-items-end mt-4 pt-4">
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="count">數量:</span><span class="count_price">3</span>
                        </div>
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="subtotal">小計:</span><span class="subtotal_price">$24.90</span>
                        </div>
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="freight">運費:</span><span class="freight_fee">$24.90</span>
                        </div>
                        <div class="w-25 d-flex justify-content-between align-items-center">
                            <span class="total">總計:</span><span class="total_price">$24.90</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4 pt-4">
                        <a href="/checkout" class="btn btn-lg px-5 backStep_btn">上一步</a>
                        <a href="/checkout/information" class="btn btn-lg px-5 nextStep_btn">下一步</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection