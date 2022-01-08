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
                <div class="mt-4 pt-4">
                    <h3 class="mb-4">訂單明細</h3>
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-4 order-item">
                        <div class="d-flex align-items-center order-item-info">
                            <img src="https://placeholder.pics/svg/60x60" class="img-fluid mr-3" alt="Responsive image">
                            <div>
                                <p>Chicken momo</p>
                                <span>#41551</span>
                            </div>
                        </div>
                        <div class="order-item-price">
                            <button type="button">-</button>
                            <input type="number">
                            <button type="button">+</button>
                            <span>$10.50</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-4 order-item">
                        <div class="d-flex align-items-center order-item-info">
                            <img src="https://placeholder.pics/svg/60x60" class="img-fluid mr-3" alt="Responsive image">
                            <div>
                                <p>Spicy Mexican potatoes</p>
                                <span>#66999</span>
                            </div>
                        </div>
                        <div class="order-item-price">
                            <button type="button">-</button>
                            <input type="number">
                            <button type="button">+</button>
                            <span>$10.50</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-4 order-item">
                        <div class="d-flex align-items-center order-item-info">
                            <img src="https://placeholder.pics/svg/60x60" class="img-fluid mr-3" alt="Responsive image">
                            <div>
                                <p>Breakfast</p>
                                <span>#86577</span>
                            </div>
                        </div>
                        <div class="order-item-price">
                            <button type="button">-</button>
                            <input type="number">
                            <button type="button">+</button>
                            <span>$10.50</span>
                        </div>
                    </div>
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
                        <a href="/product" class="btn px-5 backToShop_btn"><i
                                class="fas fa-arrow-left"></i> 返回購物</a>
                        <a href="/shoppingCart/payment" class="btn btn-lg px-5 nextStep_btn">下一步</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection