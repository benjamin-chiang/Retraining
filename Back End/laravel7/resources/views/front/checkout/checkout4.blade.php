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
                    <form action="/checkout/order" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4 pt-4">
                            <h1 class="text-center font-weight-bold">訂單成立</h1>
                            <!-- 訂單明細 -->
                            <h3 class="mb-4">訂單明細</h3>
                            {{-- @php
                            $allDatas = session()->get('productInCart');
                            foreach ($allDatas as $index => $productData){
                                if ($index == 'totalQty'){
                                    break;
                                }else if ($index != '_token'){
                                    dump($index, $productData);
                                }
                            };
                        @endphp --}}
                            @foreach ($cartCollection as $product)
                                <div class="order_detail">
                                    <div class="d-flex justify-content-between align-items-center mt-4 pt-4 order-item">
                                        <div class="d-flex align-items-center order-item-info">
                                            <img src="{{ $product->attributes->img }}" class="img-fluid mr-3"
                                                alt="Responsive image" style="width: 60px;height: 60px;">
                                            <div>
                                                <p>商品名稱:{{ $product->name }}</p>
                                                <span>商品編號:{{ $product->id }}</span>
                                                <input type="text" name="orderProductName[]" id=""
                                                    value="{{ $product->name }}" hidden>
                                                <input type="text" name="orderProductId[]" id="" value="{{ $product->id }}"
                                                    hidden>
                                            </div>
                                        </div>
                                        <div class="order-item-price d-flex">
                                            <h6>
                                                @php
                                                    $productInCarts = session()->get('productInCart');
                                                    foreach ($productInCarts as $index => $productInCart) {
                                                        if ($index == $product->name) {
                                                            $productInCartQty = $productInCart;
                                                        }
                                                    }
                                                @endphp
                                                商品數量:{{ $productInCartQty }}
                                                <input type="text" name="orderProductQty[]" id=""
                                                    value="{{ $productInCartQty }}" hidden>
                                            </h6>
                                            <span>商品價格:{{ number_format($product->price * $productInCartQty) }}</span>
                                            <input type="text" name="orderProductSubprice" id=""
                                                value="{{ number_format($product->price * $productInCartQty) }}" hidden>
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
                                    <input type="text" name="orderBuyerName" id="" value="{{ $buyerName }}" hidden>
                                </div>
                                <div class="d-flex ml-2 mt-2 pt-3">
                                    <label class="phoneNumber" style="width: 100px">電話：</label>
                                    <div class="checkout4_phoneNumber infor_text">{{ $buyerPhone }}</div>
                                    <input type="text" name="orderBuyerPhone" id="" value="{{ $buyerPhone }}" hidden>
                                </div>
                                <div class="d-flex ml-2 mt-2 pt-3">
                                    <label class="email" style="width: 100px">Email：</label>
                                    <div class="checkout4_email infor_text">{{ $buyerEmail }}</div>
                                </div>
                                <div class="d-flex ml-2 mt-2 pt-3">
                                    <label class="city" style="width: 100px">地址：</label>
                                    <div class="checkout4_city infor_text">
                                        {{ $buyerZipcode . $buyerCounty . $buyerDis . $buyerAddress }}</div>
                                    <input type="text" name="orderBuyerAddress" id="" value="{{ $buyerZipcode . $buyerCounty . $buyerDis . $buyerAddress }}" hidden>
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
                                    <span class="count">數量:</span><span
                                        class="count_price">{{ $totalQty }}</span>
                                    <input type="text" name="orderTotalQty" id="" value="{{ $totalQty }}" hidden>
                                </div>
                                <div class="w-25 d-flex justify-content-between align-items-center">
                                    <span class="subtotal">小計:</span><span
                                        class="subtotal_price">{{ $subPrice }}</span>
                                    <input type="text" name="orderTotalSubprice" id="" value="{{ $subPrice }}" hidden>
                                </div>
                                <div class="w-25 d-flex justify-content-between align-items-center">
                                    <span class="freight">運費:</span><span
                                        class="freight_fee">{{ $shipmentPrice }}</span>
                                    <input type="text" name="orderTotalShipmentPrice" id="" value="{{ $shipmentPrice }}"
                                        hidden>
                                </div>
                                <div class="w-25 d-flex justify-content-between align-items-center">
                                    <span class="total">總計:</span><span
                                        class="total_price">{{ $totalPrice }}</span>
                                    <input type="text" name="orderTotalPrice" id="" value="{{ $totalPrice }}"
                                        hidden>

                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4 pt-4">
                                <a href="/checkout/information" class="btn btn-lg px-5  backStep_btn">上一步</a>
                                <button type="submit" class="btn btn-lg px-5 nextStep_btn">返回首頁</button>
                                {{-- <a href="/" class="btn btn-lg px-5 nextStep_btn">返回首頁</a> --}}
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
