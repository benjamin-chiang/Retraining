let box = document.querySelector('.container')
                
function getRandom(min, max) {
    let num = Math.floor(Math.random() * (max - min + 1)) + min;
    return num
};

for (let i = 1; i < 11; i++) {            
    let a = getRandom(1, 10);
    let b = getRandom(5, 15);
    if (a === b) {
        //! 使用innerHTML增加html內的標籤
        box.innerHTML += `<div style="color:red">第${i}回。第一個號碼：${a}。第二個號碼${b}。<div>`;
        
        //! 使用createElement增加html的標籤
        // var newDiv = document.createElement('div');
        // newDiv.textContent = `第${i}回。第一個號碼：${a}。第二個號碼${b}。`;
        // newDiv.setAttribute('style', 'color:red');
        // box.appendChild(newDiv);

    } else{
        box.innerHTML += `<div>第${i}回。第一個號碼：${a}。第二個號碼${b}。</div>`;
        
    }
}

//! 取一個範圍內的亂數
// function getRandom(x) {
//     return Math.floor(Math.random() * x) + 1;
// };