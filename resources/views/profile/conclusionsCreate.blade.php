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
    <header class="header-admin">
        <div class="header-admin__left">
            <a href="{{ route('profile_index') }}" class="header-admin__logo">
                apipay
            </a>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="header-admin__static">
            <div class="header-title">
                <span>Вывод</span>
                <span>Создать</span>
            </div>
            <img loading="lazy" src="{{ asset('img/calendar.png') }}" alt="img">
            <div class="header-admin__static--date">
            </div>
        </div>
        <div class="header-profile" >
            <button class="profile-main__btn profile-hover">
                <div class="profile__inner">
                    <img class="profile__icon1" loading="lazy" src="{{ asset('img/avatar.svg') }}" alt="">
                    <span class="profile__text">{{ Auth::user()->name }}</span>
                    <img class="profile__icon2" loading="lazy" src="{{ asset('img/settings.png') }}" alt="">
                </div>
            </button>
            <div class="profile__content">
                <a href="{{ route('profile_me') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src="{{ asset('img/profile.png') }}" alt="">
                    <span class="profile__btn-text profile__btn-text--one">Профиль</span>
                </a>
                <a href="{{ route('profile_changePass') }}" class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src={{asset("img/password.png")}} alt="">
                    <span class="profile__btn-text">Изменить пароль</span>
                </a>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="profile__btn profile-hover">
                    <img class="profile__icon3" loading="lazy" src="{{ asset('img/exit.png') }}" alt="">
                    <span class="profile__btn-text">Выйти</span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </button>
            </div>
        </div>
    </header>


@section('page-body')
<body>

        <div class="header-admin__static">
            <div class="header-title">
                <span>Вывод</span>
                <span>Создать</span>
            </div>
        </div>
{{--        <div class="header-profile">--}}
{{--            <button class="profile-main__btn profile-hover">--}}
{{--                <div class="profile__inner">--}}
{{--                    <img class="profile__icon1" loading="lazy" src="img/avatar.svg" alt="">--}}
{{--                    <span class="profile__text">Mrvintage</span>--}}
{{--                    <img class="profile__icon2" loading="lazy" src="img/settings.png" alt="">--}}
{{--                </div>--}}
{{--            </button>--}}
{{--            <div class="profile__content">--}}
{{--                <a href="pc-profile.html" class="profile__btn profile-hover">--}}
{{--                    <img class="profile__icon3" loading="lazy" src="img/profile.png" alt="">--}}
{{--                    <span class="profile__btn-text profile__btn-text--one">Профиль</span>--}}
{{--                </a>--}}
{{--                <a href="password.html" class="profile__btn profile-hover">--}}
{{--                    <img class="profile__icon3" loading="lazy" src="img/password.png" alt="">--}}
{{--                    <span class="profile__btn-text">Изменить пароль</span>--}}
{{--                </a>--}}
{{--                <button class="profile__btn profile-hover">--}}
{{--                    <img class="profile__icon3" loading="lazy" src="img/exit.png" alt="">--}}
{{--                    <span class="profile__btn-text">Выйти</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

    </header>


{{--    <nav class="nav">--}}
{{--        <ul class="nav__list ">--}}
{{--            <li class="nav__item">--}}
{{--                <a href="personal-area.html" class="nav__link ">Статистика</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="pc-transactions.html" class="nav__link ">Транзакции</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <span class="nav__link nav__link--active">Выводы</span>--}}
{{--                <ul class="submenu">--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="output-create.html" class="submenu__link submenu__link--active">Создать</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="output.html" class="submenu__link ">История</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="payment.html" class="submenu__link ">Массовые выплаты</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="sample.html" class="submenu__link ">Шаблоны</a>--}}
{{--                    </li>--}}
{{--                    <li class="submenu__item">--}}
{{--                        <a href="discount.html" class="submenu__link @sublink5">Скидка</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="#" class="nav__link ">Api</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="https://docs.apipay.is" class="nav__link ">Документация</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="arbitrary-payment.html" class="nav__link @link6">Произвольный платеж</a>--}}
{{--            </li>--}}
{{--            <li class="nav__item">--}}
{{--                <a href="#" class="nav__link @link7">Новости</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <a class="nav__link nav__link--bottom" href="#">Техническая поддержка</a>--}}
{{--    </nav>--}}

    <div class="page-content">
        <section class="output-create">
            <h2 class="output-create__title title fz18">Вывод</h2>
            <form class="page-content__box" action="/conclusionsCreate" method="post">
                <div class="output-create__item">
                    Способ оплаты
                    <div class="select">
                        <div class="select__top">
                            <span class="select__top-title">Гривневый счет</span>
                        </div>
                        <div class="select__content">
                            <div class="select__input">
                                <input type="radio" name="valute" value="RUB">
                                <span class="select__item">Рублевый счет</span>
                            </div>
                            <div class="select__input">
                                <input type="radio" name="valute" value="USD">
                                <span class="select__item">Долларовый счет</span>
                            </div>
                            <div class="select__input">
                                <input type="radio" name="valute" value="UAH">
                                <span class="select__item">Гривневый счет</span>
                            </div>
                            <div class="select__input">
                                <input type="radio" name="valute" value="BTC">
                                <span class="select__item">счет BTC</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="output-create__item">
                    Введите сумму вывода
                    <input class="payment__input output-create__input" name="sum" type="text">
                </div>
                <div class="output-create__item">
                    Куда вывести
                    <div class="output-create__item--wrap">
                        <div class="select">
                            <div class="select__top select__top-output">
                                <span class="select__top-title">UAH</span>
                            </div>
                            <div class="select__content">
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="RUB">
                                    <span class="select__item">RUB</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="UAH">
                                    <span class="select__item">UAH</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="USD">
                                    <span class="select__item">USD</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="return_valute" value="BTC">
                                    <span class="select__item">BTC</span>
                                </div>
                            </div>
                        </div>
                        <input class="input-output" type="text" name="return">
                    </div>
                </div>
                {{--<div class="output-create__item">
                    Сумма с учетом комисии
                    <input class="payment__input output-create__input" name="commission" type="text">
                </div>
                <div class="output-create__item">
                    Курс обмена
                    <input class="payment__input output-create__input" name="commission" type="text">
                </div>--}}
                <div class="output-create__btn--wrap">
                    <button class="output-create__btn gradi-btn btn-hover2">Создать заявку</button>
                </div>
            </form>
        </section>

    </div>

</div>
<script src="js/vendor.js"></script>
<script src="js/main.js"></script>
</body>

@endsection

<nav class="nav">
    <ul class="nav__list">
        @if(auth()->user()->isUser())
            @include('profile.__parts.leftNavigationProfile')
        @endif


        @if(auth()->user()->isAdmin())
            @include('profile.__parts.leftNavigation')
        @endif

        {{--            @if (Route::is('profile_me'))--}}
        {{--                @include('profile.__parts.leftNavigationProfile')--}}

        {{--            @else--}}
        {{--                @include('profile.__parts.leftNavigation')--}}
        {{--            @endif--}}
    </ul>
</nav>


<div class="page-body">

    @yield('page-body')

</div>
</div>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>




</html>

