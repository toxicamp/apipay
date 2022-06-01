@extends('layouts.app')
@section('exchange')
    @inject('carbon', 'Carbon\Carbon')

    <div class="container">
        <div class="exchange__inner main-payment" style="margin-top: -25%">
            <div class="main-payment__top doubled-title">
                <h2 class="title fz18">Оплата счета <span>ID:{{$transaction_id }}</span></h2>
{{--                <h2 class="title fz18">Сумма оплаты <span>{{($tot2 /100)}} {{$currency}}</span></h2>--}}
            </div>
            <form class="main-payment__box main-payment__box2" action="/">
                <div class="payment-amount">Сумма платежа: <span class="payment-amount__sum">{{$tot2 / 100 }} {{$currency }}.</span>
                </div>
                <p class="text--black">Вы будете перенаправлены на страницу оплаты</p>
                <a href="{{$payResult['response']['result']['pay_url']}}" id="payOrder"
                   class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2" style="text-align: center;padding-top: 6px;">
                    Оплатить
                </a>
{{--                <button onclick="use_online_pay('form_pay_system3','amount');"--}}
{{--                        class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2">--}}
{{--                    Оплатить--}}
{{--                </button>--}}

            </form>
            <div class="main-payment__bottom">
                <div class="main-payment__line">
                    <span class="main-payment__line-red" id="payPolosa"></span>
                </div>
                <div class="main-payment__info">
                    У вас есть <span class="main-payment__info-red" id="time"> 20:00</span> для оплаты счета
                </div>
                <div class="main-payment__info main-payment__info--two">
                    Статус счета: <img class="main-payment__info-img custom-animation--rotate" src="{{asset('img/circle.png')}}" alt=""> <span
                        class="main-payment__info-red">не
                                оплачен</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var timeLeft = 60 * 20,
                display = document.querySelector('#time');

            var minutes = localStorage.getItem("minutes"); //read minutes
            var seconds = localStorage.getItem("seconds"); //read seconds

            if (minutes && seconds){
                timeLeft = Number(minutes) * 60 + Number(seconds); //set time with val from storage
            }

            startTimer(timeLeft, display);
            localStorage.setItem("time");
        };
    </script>

    <script>
        function getUtc(){
            var date = new Date();
            var now = new Date;
            var utc_timestamp = Date.UTC(now.getUTCFullYear(),now.getUTCMonth(), now.getUTCDate() ,
                now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds(), now.getUTCMilliseconds());

            return utc_timestamp;
        }
        function blockBy(transaction_id){

            var createAtt = @php echo $jsCreateAtt@endphp;
            var newDate = new Date(createAtt);
            var now = getUtc();
            var nowNew = newDate.getTime()-now;
            // console.log(newDate.getTime()-now);

            if (now > newDate.getTime()){

                var payOrder = document.getElementById("payOrder");
                payOrder.classList.add("disabled");
                payOrder.setAttribute("disabled", "disabled");

                document.location.href='/block/'+transaction_id;
            }
            var strNow = now+'';
            var strNewData = newDate.getTime()+'';
            // console.log(strNow.substr(6), strNewData.substr(6));
            // var percent = parseInt(strNow.substr(6))/parseInt(strNewData.substr(6))*100;
            // var percent = newDate.getTime()*100/now;
            var percent =nowNew*100/1200000;
            // var percent = (testPerc/100)*100;
            console.log(percent);
            var load = document.getElementById('payPolosa');
            load.style.width=percent+'%';


        }


        setInterval(function () {blockBy({{$transaction_id}});}, 1000);


    </script>
@endsection

