@extends('layouts.app')
@section('exchange')
    @inject('carbon', 'Carbon\Carbon')

    <div class="container">
        <div class="exchange__inner main-payment">
            <div class="main-payment__top doubled-title">
                <h2 class="title fz18">Оплата счета <span>ID:15151</span></h2>
                <h2 class="title fz18">Сумма оплаты <span>31 151 грн.</span></h2>
            </div>
            <form class="main-payment__box main-payment__box2" action="/">
                <div class="payment-amount">Сумма платежа: <span class="payment-amount__sum">31 151 грн.</span>
                </div>
                <p class="text--black">Вы будете перенаправлены на страницу оплаты</p>
                <button onclick="use_online_pay('form_pay_system3','amount');"
                        class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2">
                    Оплатить
                </button>

            </form>
            <div class="main-payment__bottom">
                <div class="main-payment__line">
                    <span class="main-payment__line-red custom-progress-bar" id="progress-bar-exchange-timer"></span>
                </div>
                <div class="main-payment__info">
                    У вас есть <span class="main-payment__info-red" id="spanTimer"> 15.45 </span> для оплаты счета
                </div>
                <div class="main-payment__info main-payment__info--two">
                    Статус счета: <img class="main-payment__info-img custom-animation--rotate" src="img/circle.png" alt=""> <span
                        class="main-payment__info-red">не
                                оплачен</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="exchange__inner main-payment">
            <div class="main-payment__top" class="title fz18">Оплата счета <span>ID:{{$transaction_id }} Сумма оплаты: {{($tot2 /100)}} {{$currency}}</span>
            </div>
            @if($payment == 'easypay')
                <form id="form_pay_system3" action="{{'https://easypay.ua/ua/moneytransfer/transfer2wallet'}}" name="form_pay_system3" class="main-payment__box main-payment__box2"
                      action="/" method="get">
                    <div class="payment-amount">
                      <b> Сумма платежа: <span class="payment-amount__sum" id="payment-amount__sum">{{$price }} {{$currency }}. </span></b>
                    </div>

                    <input type="hidden" name="account" value="{{$shop_id}}">
                    <input type="hidden" name="amount" value="{{$price ?? ''}}">
                </form>
                <span class="sub-text" >Вы будете направлены на страницу оплаты</span>
                <div>
                    <button onclick="use_online_pay('form_pay_system3','amount');"
                            class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2">
                        Отправить
                    </button>
                </div>
            @else
                <div class="payment-amount">Сумма платежа: <span class="payment-amount__sum" id="payment-amount__sum">{{$total }} {{$currency }}.</span>
                </div>
                <div class="payment__bottom">
                    <a href="{{$payResult['response']['result']['pay_url']}}" id="payOrder"
                       class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2">
                        Оплатить
                    </a>
                </div>
            @endif

            <span class="sub-text" >Вы будете направлены на страницу оплаты</span>
            <div class="main-payment__bottom">
                <div class="main-payment__line">
                    <span class="main-payment__line-red" id="payPolosa"></span>
                </div>
                <div class="main-payment__info">
                    У вас есть <span class="main-payment__info-red"> 20 мин </span> для оплаты счета
                </div>
                <div class="main-payment__info main-payment__info--two">
                    Статус счета: <img class="main-payment__info-img" src="{{asset('img/circle.png')}}" alt=""> <span
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

            var createAtt = @php echo $createAtt->timestamp @endphp;
            var newDate = new Date(createAtt*1000);
            var now = getUtc();

            if (now > newDate.getTime()){

                var payOrder = document.getElementById("payOrder");
                payOrder.classList.add("disabled");
                payOrder.setAttribute("disabled", "disabled");

                document.location.href='/block/'+transaction_id;
            }
            var strNow = now+'';
            var strNewData = newDate.getTime()+'';
            var percent = parseInt(strNow.substr(6))/parseInt(strNewData.substr(6))*100;
            console.log(percent);
            var load = document.getElementById('payPolosa');
            load.style.width=percent+'%';


        }

        setTimeout(function(){
            var load = document.getElementById('payPolosa');
            load.style.width=30+'%';
        }, 10000);
        setTimeout(function(){
            var load = document.getElementById('payPolosa');
            load.style.width=40+'%';
        }, 20000);
        setTimeout(function(){
            setInterval(function () {blockBy({{$transaction_id}});}, 1000);
        }, 30000);

        // setInterval(function () {blockBy();}, 1000);
    </script>
@endsection

