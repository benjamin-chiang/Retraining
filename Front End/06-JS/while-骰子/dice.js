//! 一、使用while    
//* 1. 按開始
// let start = document.querySelector('#start')
// start.addEventListener('click', function () {
//     let dice1 = 0;
//     let dice2 = 1;
//     let dice3 = 2;
//     計算第幾次擲骰
//     let count = 0;
    //* 2. 清空list列表
//     let list = document.querySelector('.list')
//     list.innerHTML = ''
    //* 3. 判斷三顆骰子是否相等
    // 因while為true時執行，所以若三個骰子相等，依然會繼續算下去，所以改成三個骰子「!」不相等時跑迴圈，等三個骰子相等時，就會是false，while迴圈就會停下來
//     while (!(dice1 === dice2 && dice2 === dice3)) {
//         count++;
//         dice1 = Math.floor(Math.random() * 6) + 1;
//         dice2 = Math.floor(Math.random() * 6) + 1;
//         dice3 = Math.floor(Math.random() * 6) + 1;
        //* 4. 印出骰子的結果
//         list.innerHTML = `第${count}次骰子結果：${dice1}、${dice2}、${dice3}<br>${list.innerHTML}`
//     };
// });
// document.querySelector("#clear").addEventListener('click', function () {
//     let list = document.querySelector('.list')
//     list.innerHTML = ''
// })

//! 二、使用do...while...
// var start = document.querySelector('#start');      
// let count = 0;
// start.addEventListener('click', function () {
//     do {
//         count++;
//         let dice1 = Math.floor(Math.random() * 6) + 1;
//         let dice2 = Math.floor(Math.random() * 6) + 1;
//         let dice3 = Math.floor(Math.random() * 6) + 1;        
//         let list = document.querySelector('.list')
//         list.innerHTML = `第${count}次骰子結果：${dice1}、${dice2}、${dice3}<br>${list.innerHTML}`
//     } while (!(dice1 === dice2 && dice2 === dice3));
// })

//! 三、使用while +  break
// let start = document.querySelector('#start');
// start.addEventListener('click', function () {
//     let list = document.querySelector('.list');
//     list.innerHTML = '';
//     let count = 0;
//     while (true) {
//         count++;
//         let dice1 = Math.floor(Math.random() * 6) + 1;
//         let dice2 = Math.floor(Math.random() * 6) + 1;
//         let dice3 = Math.floor(Math.random() * 6) + 1;
//         list.innerHTML = `第${count}次骰子結果：${dice1}、${dice2}、${dice3}<br>${list.innerHTML}`;

//         if ((dice1 === dice2 && dice2 === dice3)) {
//             break;
//         };
//     };
// });

//! 四、使用function呼叫的方式
function getNum() {
    return Math.floor(Math.random() * 6 ) + 1;    
};
// 限制範圍亂數
function getRandom(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
};

let start = document.querySelector('#start');
start.addEventListener('click', function () {
    let list = document.querySelector('.list');
    list.innerHTML = '';
    let count = 0;
    while (true) {
        count++
        let dice1 = getNum();
        let dice2 = getNum();
        let dice3 = getNum();
        list.innerHTML = `<div>第${count}次骰子結果：${dice1}、${dice2}、${dice3}</div>${list.innerHTML}`;
        if (dice1 === dice2 && dice2 === dice3) {
            break;
        };        
    }    
});