var calcBtn = document.querySelector('#calc');
calcBtn.addEventListener('click', function () {
    var ageValue = Number(document.querySelector('#age_option').value);
    var genderValue = document.querySelector('input[name="gender"]:checked').value;
    var output = document.querySelector('#result');
    if (ageValue>=18 && genderValue=='男') {
        output.innerHTML = '安心上路'
    } else {
        output.innerHTML = '沒你的事'
    };    
});



