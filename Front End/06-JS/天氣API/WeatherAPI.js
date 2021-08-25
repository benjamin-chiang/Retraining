function weatherData(index) {
    
    fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-B5282D9D-8FDD-40E9-AD48-B1DF3270465D')
    .then(function (response) {
        return response.json();
    })
    .then(function (weather) {
        console.log(weather.records);
        let content = document.querySelector('.container')
        content.innerHTML = '';
        let locations = weather.records.location
        locations.forEach(location => {
            let city = location.locationName;
            let weatherDescrip = location.weatherElement[0].time[index].parameter.parameterName;
            let rain = location.weatherElement[1].time[index].parameter.parameterName;
            let minTemp = location.weatherElement[2].time[index].parameter.parameterName;
            let maxTemp = location.weatherElement[4].time[index].parameter.parameterName;
            let comfort = location.weatherElement[3].time[index].parameter.parameterName;
            
            let svg
            if (rain >= 85) {
                svg = `<svg class="rainy_thunder" viewBox="0 10 100 100">
                <g id="rain">
                    <rect width="2" height="7" x="45" y="60" rx="1">
                        <animateTransform dur="0.6s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,10,50;30,-150,-20"></animateTransform>
                    </rect>
                    <rect width="2" height="7" x="60" y="60" rx="1">
                        <animateTransform dur="0.8s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,50,50;30,-150,-20"></animateTransform>
                    </rect>
                    <rect width="2" height="7" x="75" y="55" rx="1">
                        <animateTransform dur="0.7s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,50,60;30,-150,-20"></animateTransform>
                    </rect>
                    <rect width="2" height="7" x="65" y="45" rx="1">
                        <animateTransform dur="0.5s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,50,60;30,-150,-20"></animateTransform>
                    </rect>
                    <animateTransform link="" attributeName="transform" type="translate" values="-5,-5;10,0;-5,-5" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
                <g>
                    <polyline id="thunder" points="50,38 46,50 52,50 50,60 56,47 50,47 50,38">
                        <animateTransform dur="2.5s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,50,60;30,-150,-20"></animateTransform>
                    </polyline>
                    <polyline id="thunder" points="50,38 46,50 52,50 50,60 56,47 50,47 50,38">
                        <animateTransform dur="3s" attributeName="transform" repeatCount="indefinite" type="rotate" values="10,60,100;-100,200,10"></animateTransform>
                    </polyline>
                </g>
                <g id="overcast_cloud">
                    <circle cx="37" cy="40" r="15"></circle>
                    <circle cx="55" cy="45" r="14"></circle>
                    <rect width="70" height="30" x="10" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="10,0;-5,0;10,0" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
                <g id="overcast_cloud2">
                    <circle cx="32" cy="35" r="13"></circle>
                    <circle cx="50" cy="40" r="12"></circle>
                    <rect width="70" height="30" x="5" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="-5,15;10,15;-5,15" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
            </svg>`
            } else if (rain > 60) {
                svg = `<svg class="rainy" viewBox="0 10 100 100">
                <g id="rain">
                    <rect width="2" height="7" x="45" y="60" rx="1">
                        <animateTransform dur="1.5s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,10,50;30,-150,-20"></animateTransform>
                    </rect>
                    <rect width="2" height="7" x="60" y="60" rx="1">
                        <animateTransform dur="1.8s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,50,50;30,-150,-20"></animateTransform>
                    </rect>
                    <rect width="2" height="7" x="75" y="55" rx="1">
                        <animateTransform dur="1.3s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,50,60;30,-150,-20"></animateTransform>
                    </rect>
                    <rect width="2" height="7" x="65" y="45" rx="1">
                        <animateTransform dur="1.2s" attributeName="transform" repeatCount="indefinite" type="rotate" values="30,50,60;30,-150,-20"></animateTransform>
                    </rect>
                    <animateTransform link="" attributeName="transform" type="translate" values="-5,-5;10,0;-5,-5" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
                <g id="overcast_cloud">
                    <circle cx="37" cy="40" r="15"></circle>
                    <circle cx="55" cy="45" r="14"></circle>
                    <rect width="70" height="30" x="10" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="10,0;-5,0;10,0" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
                <g id="overcast_cloud2">
                    <circle cx="32" cy="35" r="13"></circle>
                    <circle cx="50" cy="40" r="12"></circle>
                    <rect width="70" height="30" x="5" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="-5,15;10,15;-5,15" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
            </svg>`
            } else if (rain > 50) {
                svg = `<svg class="overcast" viewBox="0 0 100 100">
                <g id="overcast_cloud">
                    <circle cx="37" cy="40" r="15"></circle>
                    <circle cx="55" cy="45" r="14"></circle>
                    <rect width="70" height="30" x="10" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="10,0;-5,0;10,0" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
                <g id="overcast_cloud2">
                    <circle cx="32" cy="35" r="13"></circle>
                    <circle cx="50" cy="40" r="12"></circle>
                    <rect width="70" height="30" x="5" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="-5,20;10,20;-5,20" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
            </svg>`
            } else if (rain > 40) {
                svg = `<svg class="cloudy" viewBox="0 0 100 100">
                <g id="cloud">
                    <circle cx="37" cy="40" r="15"></circle>
                    <circle cx="55" cy="45" r="14"></circle>
                    <rect width="70" height="30" x="10" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="10,0;-5,0;10,0" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
                <g id="cloud2">
                    <circle cx="32" cy="35" r="13"></circle>
                    <circle cx="50" cy="40" r="12"></circle>
                    <rect width="70" height="30" x="5" y="40" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="-5,20;10,20;-5,20" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
                <animateTransform attributeName="transform" dur="0.1s" type="scale" values="1.5"></animateTransform>
            </svg>`
            } else if (rain > 20) {
                svg = `<svg class="cloudy_sunny" viewBox="0 -5 100 100">
                <circle id="sun" cx="60" cy="40" r="15">
                    <animateTransform dur="5s" attributeName="transform" repeatCount="indefinite" type="rotate" from="0,60,40" to="360,60,40"></animateTransform>
                </circle>
                <g id="cloud">
                    <circle cx="32" cy="35" r="15"></circle>
                    <circle cx="50" cy="40" r="14"></circle>
                    <rect width="70" height="30" x="5" y="35" rx="15"></rect>
                    <animateTransform attributeName="transform" type="translate" values="-5,10;10,10;-5,10" dur="2s" repeatCount="indefinite"></animateTransform>
                </g>
            </svg>`
            } else {
                svg = `<svg class="sunny" viewBox="15 15 70 70">
                <circle id="sun" cx="50" cy="50" r="20">
                    <animateTransform dur="5s" attributeName="transform" repeatCount="indefinite" type="rotate" from="0,50,50" to="360,50,50"></animateTransform>
                </circle>        
            </svg>`
            }

            content.innerHTML += `
            <div class="card">
                <div class="img">                    
                    ${svg}
                </div>
                <div class="textbox">
                    <h2>${city}</h2>
                    <p>天氣概況：${weatherDescrip}</p>
                    <p>降雨機率：${rain}%</p>
                    <p>最高低溫：${minTemp}度 ～ ${maxTemp}度</p>
                    <p>舒適度：${comfort}</p>
                </div>
            </div>`
        });
    })
}

let btns = document.querySelectorAll('.btn')
btns.forEach(btn => {
    btn.addEventListener('click', function () {
        clearActive();
        btn.classList.add('active');
        
        let type = btn.getAttribute('data-type');        
        if (type === 'today') {
            weatherData(0);
        } else if( type === 'tomorrow'){
            weatherData(1);
        } else {
            weatherData(2);
        }
        
    })
});

function clearActive() {
    btns.forEach(btn => {
        btn.classList.remove('active');
    });
}
