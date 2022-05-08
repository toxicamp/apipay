<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>


<div class="page">

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="{{ route('index') }}" class="header__logo">
                    <img class="header__icon" src="img/logo.png" alt="">
                    apipay.is
                </a>
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="{{ route('yourself') }}">О нас </a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="{{ route('apiDocument') }}">API документация</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="{{ route('contact') }}">Контакты</a>
                        </li>
                    </ul>
                    @guest
                        <button class="main__btn main__btn--header"><a class="header__nav-link" href="{{ route('login') }}">Авторизация</a></button>
                    @else

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="main__btn main__btn--header">Выход</button>
                        </form>
                    @endguest

                </nav>
                <div class="burger burger--main">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

    </header>
@section('exchange')
    @inject('carbon', 'Carbon\Carbon')
<body>
        <div class="container">
            <div class="exchange__inner main-payment">
                <div class="main-payment__top" class="title fz18">Оплата счета <span>ID:{{$transaction_id }} Сумма оплаты: {{($tot2 /100)}} {{$currency}}</span>
                </div>
                @if($payment == 'easypay')
                <form id="form_pay_system3" action="{{'https://easypay.ua/ua/moneytransfer/transfer2wallet'}}" name="form_pay_system3" class="main-payment__box main-payment__box2"
                      action="/" method="get">
                    <div class="payment-amount">
                        Сумма платежа: <span class="payment-amount__sum" id="payment-amount__sum">{{$price }} {{$currency }}.</span>
                    </div>
{{--                    <div class="main-payment__item main-payment__item3">--}}
{{--                        <p>Выбор валют</p>--}}
{{--                        <div class="select main-payment__input">--}}
{{--                            <div class="select__top">--}}
{{--                                <img class="select__top-icon" src="img/privat.png" alt="">--}}
{{--                                <span class="select__top-title">{{$payActual }} {{$currency }}</span>--}}
{{--                            </div>--}}
{{--                            <div class="select__content">--}}
{{--                                @foreach ($listPay as $id => $name)--}}
{{--                                    <div class="select__input">--}}
{{--                                        <input type="radio" name="select-radio" value="{{$id}}" onchange="selectUsePay(this)">--}}
{{--                                        <img src="img/privat.png" alt="">--}}
{{--                                        <span class="select__item">{{$name}}</span>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <input type="hidden" name="account" value="{{$shop_id}}">
                    <input type="hidden" name="amount" value="{{$price ?? ''}}">
                    <button onclick="use_online_pay('form_pay_system3','amount');"
                            class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2">
                        Отправить
                    </button>
                </form>
                @else
                    <div class="payment-amount">Сумма платежа: <span class="payment-amount__sum" id="payment-amount__sum">{{$total }} {{$currency }}.</span>
                    </div>
                <div>

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
                        Статус счета: <img class="main-payment__info-img" src="img/circle.png" alt=""> <span
                            class="main-payment__info-red">не
                                оплачен</span>
                    </div>
                </div>
            </div>
        </div>
</body>
        <script>
            function getUtc(){
                var date = new Date();
                var now = new Date;
                var utc_timestamp = Date.UTC(now.getUTCFullYear(),now.getUTCMonth(), now.getUTCDate() ,
                    now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds(), now.getUTCMilliseconds());

                return utc_timestamp;
            }
            function blockBy(){

                var createAtt = @php echo $createAtt->timestamp @endphp;
                var newDate = new Date(createAtt*1000);
                var now = getUtc();

                if (now > newDate.getTime()){

                    var payOrder = document.getElementById("payOrder");
                    payOrder.classList.add("disabled");
                    payOrder.setAttribute("disabled", "disabled");

                    document.location.href='/block';
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
                setInterval(function () {blockBy();}, 1000);
            }, 30000);

            // setInterval(function () {blockBy();}, 1000);
        </script>
        <footer class="footer">
            <div class="container">
                <div class="footer__inner">
                    <a class="header__logo">
                        <img class="header__icon" src="img/logo.png" alt="">
                        apipay.is
                    </a>
                    <p class="header__copy">© 2022 APIPAY.IS</p>
                </div>
            </div>
        </footer>
@endsection


