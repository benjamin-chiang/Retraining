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
                    <form action="/checkout/calc" method="post">
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
    <script>
        // 一進入頁面，就call加總區計算的function
        window.addEventListener('load', shoppingCartCalc());
        var minusBtns = document.querySelectorAll('.minus');
        var plusBtns = document.querySelectorAll('.plus');
        var qtyInputs = document.querySelectorAll('.qty');
        var delBtns = document.querySelectorAll('.del-btn');

        // 移除商品
        delBtns.forEach(delBtn => {
            delBtn.addEventListener('click', function() {
                // 用js form將要刪除的產品id傳到購物車的controller
                var formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('fetchProductId', this.getAttribute('data-id'));
                delBtnElement = this;
                // 要去routes寫要送去那
                fetch('/shopping_cart/delete', {
                    'method': 'POST',
                    'body': formData,
                    // 去route經controller用cart套件remove產品後，傳回資料
                }).then(function(response) {
                    return response.text();
                }).then(function(data) {
                    if (data == 'success') {
                        var productArea = delBtnElement.parentElement.parentElement;
                        productArea.remove();
                        shoppingCartCalc();
                        Swal.fire({
                            icon: 'success',
                            title: '成功刪除',
                            showConfirmButton: false,
                            timer: 800,
                        })
                    }
                })
            })
        });

        // +號按鈕的功能
        plusBtns.forEach(plusBtn => {
            plusBtn.addEventListener('click', function() {
                // this.previousElementSibling指的是+號按鈕前的一個Element
                // html結構中，+號前一個Element就是input
                var input = this.previousElementSibling;
                input.value = Number(input.value) + 1;
                // 取得class=price這個element，並計算出單項商品的總價
                // 選取同父層內class=price的Element
                var price = this.parentElement.querySelector('.price')
                // 取得藏在price這個element內的單價($product->price)，並乘上數量，最後加上千分位號
                newPrice = (price.getAttribute('data-price') * input.value).toLocaleString();
                price.innerHTML = newPrice;

                // 將重複計算的部分，寫成function直接call出來用
                // calcProductPrice(this);
                shoppingCartCalc();
            })
        });

        // -號按鈕的功能
        minusBtns.forEach(minusBtn => {
            minusBtn.addEventListener('click', function() {
                // this.nextElementSibling指的是-號按鈕前的一個Element
                // html結構中，-號前一個Element就是input
                var input = this.nextElementSibling;
                // 判斷數量要大於1
                if (input.value > 1) {
                    input.value = Number(input.value) - 1;
                }

                // 取得class=price這個element，並計算出單項商品的總價
                // 選取同父層內class=price的Element
                var price = this.parentElement.querySelector('.price')
                // 取得藏在price這個element內的單價($product->price)，並乘上數量，最後加上千分位號
                newPrice = (price.getAttribute('data-price') * input.value).toLocaleString();
                price.innerHTML = newPrice;

                // 將重複計算的部分，寫成function直接call出來用
                // calcProductPrice(this);
                shoppingCartCalc();
            })
        });

        // 直接變動input數字的功能
        qtyInputs.forEach(qtyInput => {
            // 當input內的數值，直接被修改，觸發事件用change
            qtyInput.addEventListener('change', function() {
                if (qtyInput.value < 1) {
                    qtyInput.value = 1;
                }
                // class=qty input內的值，用變數qty包起來
                var qty = Number(qtyInput.value);
                // 選取同父層內class=price的Element
                var price = this.parentElement.querySelector('.price')
                // 取得藏在price這個element內的單價($product->price)，並乘上數量，最後加上千分位號
                newPrice = (price.getAttribute('data-price') * qty).toLocaleString();
                price.innerHTML = newPrice;

                // 將重複計算的部分，寫成function直接call出來用
                // calcProductPrice(this);
                shoppingCartCalc();
            })
        });

        // clickBtn是自訂的參數，加減號及直接修改數量，就會傳入被動到的this元素
        function calcProductPrice(clickBtn) {
            var input = clickBtn.parentElement.querySelector('.qty')
            var price = clickBtn.parentElement.querySelector('.price')
            var newPrice = (price.getAttribute('data-price') * input.value).toLocaleString();
            price.innerHTML = newPrice;
        }

        // 計算加總區的function
        function shoppingCartCalc() {
            // 加總區的預設值
            var totalQty = 0;
            var subPrice = 0;
            var shipmentPrice = 1000;
            var totalPrice = 0;

            // 計算商品總數量
            var qtyInputs = document.querySelectorAll('.qty');
            qtyInputs.forEach(qtyInput => {
                totalQty += Number(qtyInput.value);
                // 取得單一商品的價格
                var singleProductPrice = qtyInput.parentElement.querySelector('.price').getAttribute('data-price');
                // 加總單一商品*各商品數量，計算出小計價格
                subPrice += singleProductPrice * qtyInput.value;
            });
            // 將總數、小計印在頁面上
            document.querySelector('#totalQty').innerHTML = totalQty.toLocaleString();
            document.querySelector('#subPrice').innerHTML = subPrice.toLocaleString();

            // 運費預設值1000，小計金額超過3萬，運費為0，判斷後印出運費
            if (subPrice > 30000) {
                shipmentPrice = 0;
            }
            document.querySelector('#shipmentPrice').innerHTML = shipmentPrice.toLocaleString();

            // 加總小計及運費，算出總計後，印在頁面上
            totalPrice = subPrice + shipmentPrice;
            document.querySelector('#totalPrice').innerHTML = totalPrice.toLocaleString();
        }
    </script>
@endsection
