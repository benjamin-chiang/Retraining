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
                <div class="mt-4 pt-4">
                    <form action="" class="paymentMethod_form-group">
                        <fieldset>
                            <legend>寄送資料</legend>
                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="王小明">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">電話</label>
                                <input type="tel" class="form-control" id="phoneNumber" placeholder="0912345678">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="abc123@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="city">地址</label>
                                <div class="d-flex flex-column">
                                    <div class="d-flex">
                                        <input type="text" class="form-control mr-2 mb-2" id="city" placeholder="城市">
                                        <input type="text" class="form-control mb-2" id="zipCode" placeholder="郵遞區號">
                                    </div>
                                    <input type="text" class="form-control" id="address" placeholder="地址">
                                </div>
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
                        <a href="/checkout/payment" class="btn btn-lg px-5 backStep_btn">上一步</a>
                        <a href="/checkout/finish" class="btn btn-lg px-5 nextStep_btn">前往付款</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection