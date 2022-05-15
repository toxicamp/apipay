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
            <a href="{{route('profile_statUser')}}" class="header-admin__logo">
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
                <span>Статистика</span>
                <span></span>
            </div>
            <img loading="lazy" src="{{ asset('img/calendar.png') }}" alt="img">
            <div class="header-admin__static--date">
                        <span>
                            <input type="date" id="date" name="date"/>
                            <style>input {
                                    width: 140px;
                                    font-size: 14px;
                                    padding: 5px 3px 4px 5px;
                                    border: 1px solid #8d097d;
                                    background: #ffffec;
                                    border-radius: 10px;
                                }</style>
                        </span>
                <span>
                            -
                        </span>
                <span>
                            <input type="date" id="date" name="date"/>
                        </span>
                <span>
                            <a href="" class="floating-button">Показать</a>
                                <style>
                                body {
                                }
                                .floating-button {
                                    text-decoration: none;
                                    display: inline-block;
                                    width: 124px;
                                    height: 38px;
                                    line-height: 40px;
                                    border-radius: 57px;
                                    margin: 4px 11px;
                                    font-family: 'Montserrat', sans-serif;
                                    font-size: 11px;
                                    text-transform: uppercase;
                                    text-align: center;
                                    letter-spacing: 4px;
                                    font-weight: 600;
                                    color: #000000;
                                    background: #f1dced;
                                    box-shadow: 0 11px 15px rgb(0 0 0 / 10%);
                                    transition: 0.6s;
                                }
                                .floating-button:hover {
                                    background: #bd70b4;
                                    box-shadow: 0 15px 20px rgba(46, 229, 157, .4);
                                    color: white;
                                    transform: translateY(-7px);
                                }
                </style>

                        </span>
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


        <div class="page-content">
            <section class="static">
                <button class="reset">
                    <img loading="lazy" src={{asset("img/reset.png")}} alt="img"  onClick="history.go(0)">
{{--                    <script>location.reload();</script>--}}
                </button>
                <h2 class="static__title title fz18">
                    Кошелек
                </h2>
                <p class="static__subtitle">сводная статистика</p>
                <div class="turn-system">

                    @if(empty($trans->toArray()))
                        <div class="turn-system__wrap">
                            <div class="turn-system__item">
                                <img loading="lazy" src={{asset("img/turn-system__item--icon.png")}} alt="img">
                                <span>    0,00 UAH  </span>
                            </div>
                        </div>
                    @else

                    @foreach($trans as $currency=>$item)
                    <div class="turn-system__wrap">
                        <div class="turn-system__item">
                            <img loading="lazy" src={{asset("img/turn-system__item--icon.png")}} alt="img">
                            <span>     {{$item->sum('total')}} {{$currency}}  </span>
                        </div>
                    </div>
                    @endforeach
                    @endif

            </div>
            <div class="chart">
                <div class="chart__title title fz18">
                    Транзакции
                    <span>история транзакций</span>
                </div>
                <div class="chart__block">
                    <img loading="lazy" src="{{ asset('img/chart.png') }}" alt="img">
                </div>
            </div>

            <div class="replenish">
                <div class="replenish__wrapper">
                    <div class="replenish__block">
                        <div class="replenish__block--title title fz14">
                            Пополнение кошелька
                        </div>
                        <div class="tabs-wrapper tab-link-wrapper">
                            <a class="tab tab-active" href="#tab-1">
                                <span>Статусы транзакций</span>
                            </a>
                            <a class="tab" href="#tab-2">
                                <span>Неуспешные транзакции</span>
                            </a>
                        </div>
                        <div class="tabs-wrapper tab-content-wrapper">
                            <div id="tab-1" class="tabs-content tabs-content-active">
                                <div class="replenish__grid">
                                    <div class="replenish__grid--row row-title">
                                        <span class="status">Статус</span>
                                        <span class="quality">Количество</span>
                                        <span class="sum">Сумма</span>
                                        <span class="percent">%</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status done">Выполнен</span>
                                        <span class="quality">2</span>
                                        <span class="sum">222 UAH</span>
                                        <span class="percent">0.5</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status pending">Ожидает</span>
                                        <span class="quality">5</span>
                                        <span class="sum">800 RUB</span>
                                        <span class="percent">1</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status done">Выполнен</span>
                                        <span class="quality">7</span>
                                        <span class="sum">0.003 BTC</span>
                                        <span class="percent">1.25</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status done">Выполнен</span>
                                        <span class="quality">11</span>
                                        <span class="sum">125 USDT</span>
                                        <span class="percent">2</span>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tabs-content">
                                <div class="replenish__grid">
                                    <div class="replenish__grid--row row-title">
                                        <span class="status">Статус</span>
                                        <span class="quality">Количество</span>
                                        <span class="sum">Сумма</span>
                                        <span class="percent">%</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">12</span>
                                        <span class="sum">155 UAH</span>
                                        <span class="percent">4</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">15</span>
                                        <span class="sum">365 RUB</span>
                                        <span class="percent">3</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">18</span>
                                        <span class="sum">0.0004 BTC</span>
                                        <span class="percent">8</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">22</span>
                                        <span class="sum">55 USDT</span>
                                        <span class="percent">2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="replenish__block">
                        <div class="replenish__block--title title fz14">
                            Пополнение карты
                        </div>
                        <div class="tabs-wrapper tab-link-wrapper">
                            <a class="tab tab-active" href="#tab-3">
                                <span>Статусы транзакций</span>
                            </a>
                            <a class="tab" href="#tab-4">
                                <span>Неуспешные транзакции</span>
                            </a>
                        </div>
                        <div class="tabs-wrapper tab-content-wrapper">
                            <div id="tab-3" class="tabs-content tabs-content-active">
                                <div class="replenish__grid">
                                    <div class="replenish__grid--row row-title">
                                        <span class="status">Статус</span>
                                        <span class="quality">Количество</span>
                                        <span class="sum">Сумма</span>
                                        <span class="percent">%</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status done">Выполнен</span>
                                        <span class="quality">2</span>
                                        <span class="sum">625 UAH</span>
                                        <span class="percent">1</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status done">Выполнен</span>
                                        <span class="quality">5</span>
                                        <span class="sum">544 RUB</span>
                                        <span class="percent">3</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status done">Выполнен</span>
                                        <span class="quality">7</span>
                                        <span class="sum">0.012 BTC</span>
                                        <span class="percent">1.25</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status done">Выполнен</span>
                                        <span class="quality">11</span>
                                        <span class="sum">187 USDT</span>
                                        <span class="percent">2</span>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-4" class="tabs-content">
                                <div class="replenish__grid">
                                    <div class="replenish__grid--row row-title">
                                        <span class="status">Статус</span>
                                        <span class="quality">Количество</span>
                                        <span class="sum">Сумма</span>
                                        <span class="percent">%</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">12</span>
                                        <span class="sum">157 UAH</span>
                                        <span class="percent">4</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">15</span>
                                        <span class="sum">765 RUB</span>
                                        <span class="percent">3</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">18</span>
                                        <span class="sum">0.08 BTC</span>
                                        <span class="percent">8</span>
                                    </div>
                                    <div class="replenish__grid--row">
                                        <span class="status " style="color:#ff6c36">Не выполнен</span>
                                        <span class="quality">22</span>
                                        <span class="sum">456 USDT</span>
                                        <span class="percent">2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
