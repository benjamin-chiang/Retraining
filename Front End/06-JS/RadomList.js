let box = document.querySelector('.container')
                
function getRandom(min, max) {
    let num = Math.floor(Math.random() * (max - min + 1)) + min;
    return num
};

//! 使用for迴圈，次數固定。固定局數內，看中幾次。
for (let i = 1; i < 11; i++) {            
    let a = getRandom(1, 10);
    let b = getRandom(5, 15);
    if (a === b) {
//         //! 使用innerHTML增加html內的標籤
        box.innerHTML += `<div style="color:red">第${i}回。第一個號碼：${a}。第二個號碼${b}。</div>`;
        
//         //! 使用createElement增加html的標籤
        // var newDiv = document.createElement('div');
        // newDiv.textContent = `第${i}回。第一個號碼：${a}。第二個號碼${b}。`;
        // newDiv.setAttribute('style', 'color:red');
        // box.appendChild(newDiv);

    } else{
        box.innerHTML += `<div>第${i}回。第一個號碼：${a}。第二個號碼${b}。</div>`;        
    };
};

//! 使用while迴圈，次數「不固定」。中一次，看要幾局。
let count = 0;
while (true) {
    count++;
    let a = getRandom(1, 10);
    let b = getRandom(5, 15);
    // 在for迴圈當中，照順序印出來是用「 += 」，但反向排序的話，則是 = 印出最後一個結果後，在用 + 號依序印出每一個最後一個
    box.innerHTML = `<div>第${count}回。第一個號碼：${a}。第二個號碼${b}。</div>` + box.innerHTML;
    if (a === b) {                
        break;
    };
};

