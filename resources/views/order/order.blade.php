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
                    У вас есть <span class="main-payment__info-red" id="spanTimer"> 30 </span> для оплаты счета
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


        $(document).ready(function(){

            let _seconds = 30; //Тут указать максимальную длительность таймера в секундах

            let _total = _seconds;
            let _percent = 0;
            let _timerMinutes = parseInt(_seconds)/60;
            let _timerSeconds = parseInt(_seconds)-parseInt(_timerMinutes)*60;
            if(_timerSeconds<10)
            {
                _timerSeconds = '0' + _timerSeconds;
            }
            let timerData = parseInt(_timerMinutes) + ':'+_timerSeconds;
            $('#spanTimer').text(timerData);
            var interval = null;
            interval = setInterval(function()
            { // запускаем интервал
                if (_seconds > 0)
                {
                    _seconds--; // вычитаем 1
                    _percent = 100 - (_seconds /  _total) * 100;
                    _timerMinutes = parseInt(_seconds)/60;
                    _timerSeconds = parseInt(_seconds)-parseInt(_timerMinutes)*60;
                    if(_timerSeconds<10)
                    {
                        _timerSeconds = '0' + _timerSeconds;
                    }
                    timerData = parseInt(_timerMinutes) + ':'+_timerSeconds;
                    $('#spanTimer').text(timerData);
                    $('#progress-bar-exchange-timer').css("width", _percent + '%');
                }
                else
                {
                    clearInterval(interval); // очищаем интервал, чтобы он не продолжал работу при _Seconds = 0
                }
            }, 1000);
        });
    </script>
@endsection

