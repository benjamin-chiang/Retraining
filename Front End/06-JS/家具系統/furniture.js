let content = document.querySelector('.content');
let btns = document.querySelectorAll('.btn');
let clean = document.querySelector('button');
// 清除鍵
clean.addEventListener('click',function () {
    clearBtn();
    content.innerHTML = '';
})
// nav按鈕清除active變色
function clearBtn() {
    btns.forEach(btn => {
        btn.classList.remove('active')
    });
}
// 點擊nav按鈕後，將倉庫
btns.forEach(btn => {
    btn.addEventListener('click', function () {
        let city = btn.getAttribute('data-city');
        clearBtn();
        btn.classList.add('active');
        warehouseStock(city);        
    })
});

function warehouseStock(city) {
    fetch('https://run.mocky.io/v3/a1bd9f89-926c-46ac-930a-1d1cae8dd7e5')
    .then(function (response) {
        return response.json();
    })
    .then(function (goodsList) {
        let products = goodsList.records.product
        console.log(products);        
        content.innerHTML = '';
        products.forEach(product => {
            let productName = product.productName;
            let photoSrc = product.imageURL;
            // 將售價加上千分位數
            let productPrice = product.states.sale.price;            
            let stringPrice = Number(parseFloat(productPrice).toFixed()).toLocaleString("en", {minimumFractionDigits: 0});
            // 將售價乘上折扣，並加上千分位數
            let productOnsale = product.states.sale.onsale;
            let discountPrice = productPrice*productOnsale;
            let stringDiscount = Number(parseFloat(discountPrice).toFixed()).toLocaleString("en", {minimumFractionDigits: 0});
            // [city]著這個參數，對接到html nav btn內的data-city的值
            let stockAmount = product.states.stock.location[city].amount;            
           

            // 數量與價格的判斷
            if (stockAmount === 0) {
                content.innerHTML += `
                <div class="card">
                    <div class="header">${productName}</div>
                    <div class="photo">
                        <img src="${photoSrc}" alt="">
                    </div>
                    <div class="footer">                                        
                        <div class="nogoods">暫無存貨</div>
                    </div>
                </div>`                
            } else if (stockAmount <= 3 && productOnsale === 1) {
                content.innerHTML += `
                <div class="card">
                    <div class="header">${productName}</div>
                    <div class="photo">
                        <img src="${photoSrc}" alt="">
                    </div>
                    <div class="footer">                        
                        <p>存貨：<span class="last">最後<span>${stockAmount}</span>個</span></p>
                        <p>售價：<span>${stringPrice}</span></p>
                    </div>    
                </div>`                         
            } else if (stockAmount <= 3 && productOnsale === 0.85) {
                content.innerHTML += `
                <div class="card">
                    <div class="header">${productName}</div>
                    <div class="photo">
                        <img src="${photoSrc}" alt="">
                        <div class="discount">${productOnsale*100}折優惠中</div>
                    </div>
                    <div class="footer">                        
                        <p>存貨：<span class="last">最後<span>${stockAmount}</span>個</span></p>
                        <p>售價：<span>${stringDiscount}</span></p>
                    </div>    
                </div>`
            } else if (stockAmount !== 0 && productOnsale === 0.5) {
                content.innerHTML += `
                <div class="card">
                    <div class="header">${productName}</div>
                    <div class="photo">
                        <img src="${photoSrc}" alt="">
                        <div class="discount">${productOnsale*10}折優惠中</div>
                    </div>
                    <div class="footer">                        
                        <p>存貨：<span class="last">最後<span>${stockAmount}</span>個</span></p>
                        <p>售價：<span>${stringDiscount}</span></p>
                    </div>    
                </div>`
            } else{
                content.innerHTML += `
                <div class="card">
                    <div class="header">${productName}</div>
                    <div class="photo">
                        <img src="${photoSrc}" alt="">                        
                    </div>
                    <div class="footer">                    
                        <p>存貨：<span>${stockAmount}</span></p>
                        <p>售價：<span>${stringPrice}</span></p>
                    </div>
                </div>`
            }                                                                   
        });            
    });    
}