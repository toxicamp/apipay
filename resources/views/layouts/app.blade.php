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
    <script src="{{ asset('js/toggle.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('custom/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/animate.min.css') }}">

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

{{--    <div class="navigation">--}}
{{--        <a class="navigation__link" href="admin-currencies.html">Админка валюты</a>--}}
{{--        <a class="navigation__link" href="admin-direction.html">Направление обмена</a>--}}
{{--        <a class="navigation__link" href="admin-transactions.html">Админка транзакции</a>--}}
{{--        <a class="navigation__link" href="admin-users.html">Админка обмен валю пользователи</a>--}}
{{--        <a class="navigation__link" href="admin.html">Админка</a>--}}
{{--        <a class="navigation__link" href="arbitrary-payment-link.html">Лк произвольный платеж ссылка</a>--}}
{{--        <a class="navigation__link" href="arbitrary-payment.html">Лк произвольный платеж</a>--}}
{{--        <a class="navigation__link" href="conclusions.html">Админка вывод</a>--}}
{{--        <a class="navigation__link" href="discount.html">Лк скидка</a>--}}
{{--        <a class="navigation__link" href="exchange-requests.html">Админка обмен валю заявки</a>--}}
{{--        <a class="navigation__link" href="index.html">главная</a>--}}
{{--        <a class="navigation__link" href="main-arbitrary-payment.html">главная Произвольный платеж</a>--}}
{{--        <a class="navigation__link" href="main-arbitrary-payment2.html">главная Произвольный платеж2</a>--}}
{{--        <a class="navigation__link" href="main-exchange.html">Главная обмен 2</a>--}}
{{--        <a class="navigation__link" href="main-exchange2.html">Главная обмен 3</a>--}}
{{--        <a class="navigation__link" href="output-create.html">Лк вывод</a>--}}
{{--        <a class="navigation__link" href="output.html">Лк вывод история</a>--}}
{{--        <a class="navigation__link" href="payment.html">Лк вывод масов</a>--}}
{{--        <a class="navigation__link" href="pc-profile.html">Лк профиль</a>--}}
{{--        <a class="navigation__link" href="pc-transactions.html">Лк транзакции</a>--}}
{{--        <a class="navigation__link" href="personal-area.html">Лк</a>--}}
{{--        <a class="navigation__link" href="ref-prog-settings.html">Админка валюты партнерка</a>--}}
{{--        <a class="navigation__link" href="sample.html">Лк вывод шаблоны</a>--}}
{{--        <a class="navigation__link" href="user-page.html">Админка пользователи</a>--}}
{{--    </div>--}}

    @yield('exchange')
    @yield('benefits')
    @yield('partners')




    <div class="popup popup--registration">
        <form class="popup__inner" action="/">
            <span class="popup__close popup__close--registration"></span>
            <h2 class="popup__title title-main fz27">Регистрация</h2>
            <input class="popup__input payment__input" name="login" placeholder="Логин" type="text">
            <input class="popup__input payment__input" name="password" placeholder="Пароль" type="password">
            <input class="popup__input payment__input" name="email" placeholder="E-mail" type="text">
            <input class="popup__input payment__input" name="tel" placeholder="Номер телефона" type="tel">
            <button class="main__btn main__btn--logo popup__btn">подключится</button>
        </form>
    </div>

    @include('auth._forms.login')


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
</div>
@inject('carbon', 'Carbon\Carbon')

<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
    function selectUsePay(obj){

        // $('input[name="select-radio"]').is(':checked')
        if ($(obj).is(':checked')) {
            var payment_list_id = $('input[name="select-radio"]:checked').val();

            $.ajax({
                url: "/pay-cul",
                type:"POST",
                data:{
                    paymentList:payment_list_id,
                    shop_id:{{$shop_id ?? ''}},
                    transaction_id:{{$transaction_id ?? ''}},
                    price:{{$price ?? ''}},
                },success: function(obj){
                    $('#payment-amount__sum').text(obj.total + ' ' + {{$currency ?? ''}});
                    alert('я пишу по русски');
                    document.forms[form_name].submit();
                    if (click_form) {
                        click_form['pay_s_id'].value = form_name;
                        click_form.submit();
                    }
                }
            });
        }
    }

    function use_online_pay(form_name, input_amount) {
        let paymentSum = $("#paymentSum").val().replace(',', '.');
        paymentSum = Math.ceil(parseFloat(paymentSum) * 100) / 100;
        let click_form = document.forms['click_collection'];

        if (paymentSum >= 1 && paymentSum < 10000) {
            if (input_amount.length) {
                $("form[name=" + form_name + "] input[name=" + input_amount + "]").val(paymentSum);
                if (click_form)
                    click_form['amount'].value = paymentSum;
            }


        } else {
            alert("Некорректно указана сумма. Допускается ввод суммы от 1 до 9999 грн.");
        }
    }

</script>
</body>
</html>
