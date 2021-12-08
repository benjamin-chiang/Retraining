var SY_goodgoodEat_Products = [
    {
        name: '高級紅茶',
        img: 'https://i.epochtimes.com/assets/uploads/2014/10/1409221241502483.jpg',
        content: '紅茶葉、水',
        price: '1200',
        tag1: 'drink'
    },
    {
        name: '手工餅乾',
        img: 'https://cdn2.ettoday.net/images/3629/d3629818.jpg',
        content: '澱粉、糖',
        price: '20',
        tag1: 'dessert'
    },
    {
        name: '珍珠奶茶',
        img: 'https://attach.setn.com/newsimages/2018/11/06/1627152-XXL.jpg',
        content: '奶茶、珍珠、水',
        price: '65',
        tag1: 'drink',
        tag2: 'dessert'
    },
    {
        name: '紅燒牛肉麵',
        img: 'https://1.bp.blogspot.com/-4L2AeEI4x9A/XgA9c6okfMI/AAAAAAABJ-s/sXJMDKGOaY08UKCD82ioxSFQq5IC2u9PwCKgBGAsYHg/s1600/00.jpg',
        content: '牛肉、麵條、調味料',
        price: '180',
        tag1: 'food'
    },
    {
        name: '滷肉飯',
        img: 'https://2.bp.blogspot.com/-VKO_fV4tzB8/WsDMatMdEQI/AAAAAAABNgc/cyaHyT2FjxY_U96pKdBcz2BMSVFPvPSPwCLcBGAs/s1600/DSC_00461.JPG',
        content: '飯、滷肉、調味料',
        price: '35',
        tag1: 'food'
    },
    {
        name: '蘋果派',
        img: 'https://img-global.cpcdn.com/recipes/10860064e49c3f0b/751x532cq70/%E6%B3%95%E5%BC%8F%E8%98%8B%E6%9E%9C%E6%B4%BE-%E9%A3%9F%E8%AD%9C%E6%88%90%E5%93%81%E7%85%A7%E7%89%87.jpg',
        content: '蘋果、派皮、糖',
        price: '210',
        tag1: 'dessert'
    },
    {
        name: '多多綠茶',
        img: 'https://www.85cafe.com/file/product/w500/%E5%A4%9A%E5%A4%9A%E7%B6%A0%E8%8C%B6.jpg',
        content: '養樂多、糖、綠茶',
        price: '50',
        tag1: 'drink'
    }
]
console.log(SY_goodgoodEat_Products);
let contentView = document.querySelector('.content')

function innerAll() {
    SY_goodgoodEat_Products.forEach(product => {
        contentView.innerHTML +=
        `<div class="card">
            <div class="pic">
                <img src=${product.img} alt="">
            </div>
            <div class="text">
                <h2>${product.name}</h2>
                <p>${product.content}</p>
                <p>售價：${product.price}</p>
            </div>
        </div>`
    });
}

innerAll()

// * 寫好onclick要用到的function，但onclick在html上控制
// function foodList(item) {
//     contentView.innerHTML = ''
//     if (item === 'all') {
//         innerAll();
//     } else {
//         SY_goodgoodEat_Products.forEach(product => {
//             if (item === product.tag1 || item === product.tag2) {
//                 contentView.innerHTML +=
//                 `<div class="card">
//                     <div class="pic">
//                         <img src=${product.img} alt="">
//                     </div>
//                     <div class="text">
//                         <h2>${product.name}</h2>
//                         <p>${product.content}</p>
//                         <p>售價：${product.price}</p>
//                     </div>
//                 </div>`
//             };
//         });
//     }
// }

let navBtns = document.querySelectorAll('li')

navBtns.forEach(btn => {
    let type = btn.getAttribute('data-type');

    btn.addEventListener('click', function () {
        contentView.innerHTML = ''
        if (type === 'all') {
            innerAll();
        } else {
            SY_goodgoodEat_Products.forEach(product => {
                if (type === product.tag1 || type === product.tag2) {
                    contentView.innerHTML +=
                    `<div class="card">
                        <div class="pic">
                            <img src=${product.img} alt="">
                        </div>
                        <div class="text">
                            <h2>${product.name}</h2>
                            <p>${product.content}</p>
                            <p>售價：${product.price}</p>
                        </div>
                    </div>`
                };
            });
        }

        clear()
        btn.classList.add('active')

    })
});

function clear() {
    navBtns.forEach(btn => {
        btn.classList.remove('active')
    });
}
