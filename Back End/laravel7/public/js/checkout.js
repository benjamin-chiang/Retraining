
// 一進入頁面，就call加總區計算的function
window.addEventListener('load', shoppingCartCalc());
var minusBtns = document.querySelectorAll('.minus');
var plusBtns = document.querySelectorAll('.plus');
var qtyInputs = document.querySelectorAll('.qty');
var delBtns = document.querySelectorAll('.del-btn');

// 移除商品
delBtns.forEach(delBtn => {
    delBtn.addEventListener('click', function () {
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
        }).then(function (response) {
            return response.text();
        }).then(function (data) {
            if (data == 'success') {
                var productArea = delBtnElement.parentElement.parentElement;
                productArea.remove();
                shoppingCartCalc();
                Swal.fire({
                    icon: 'success',
                    title: '成功刪除',
                    showConfirmButton: false,
                    timer: 500,
                })
            }
        })
    })
});

// +號按鈕的功能
plusBtns.forEach(plusBtn => {
    plusBtn.addEventListener('click', function () {
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
    minusBtn.addEventListener('click', function () {
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
    qtyInput.addEventListener('change', function () {
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
