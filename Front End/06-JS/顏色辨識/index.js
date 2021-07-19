// level 是計算container內塞入多少box的基數
let level = 2;
// box變多後，每個box大小也會改變，因此是100/level
let size = 100 / level;
// 計算點選的次數，用來判斷增加難度的時間點
let count = 0;

function game() {
    let container = document.querySelector('.container');
    container.innerHTML = '';
    // 顏色隨機，一樣塞入innerHTML box中的style內，rgb是三個數字組成，所用逗號分隔產生三個數字。
    let color = `rgb(${Math.floor(Math.random() * 256)},${Math.floor(Math.random() * 256)},${Math.floor(Math.random() * 256)})`    
    // **2是平方的意思，也就是基數的平方
    for (var i = 0; i < level ** 2; i++) {
        // 利用樣本字串，將inline-style的size變數，直接變更box的寬高，同時變更box的背景色        
        container.innerHTML += `<div class="box" style="width:${size}%;height:${size}%;background-color:${color};" ></div>`;
    };
    // 計算隨機答案位置
    let randomAnswer = Math.floor(Math.random() * level ** 2) + 1;
    // 將隨機的答案數字，放在nth-child中，就能鎖定隨機的box，套上css中的透明度
    let ansBox = document.querySelector(`.container .box:nth-child(${randomAnswer})`);
    ansBox.classList.add('answer');


    let boxA = document.querySelector('.answer')
    boxA.addEventListener('click', function () {        
        count++;                
        if (count === level) {
            level++;
            size = 100 / level;
            // count若沒有清零，則count就會持續地等於level，失去漸進的效果
            count = 0;            
        }; 
        game();
    });
}

document.querySelector('.start').addEventListener('click', function () {
    game();
})