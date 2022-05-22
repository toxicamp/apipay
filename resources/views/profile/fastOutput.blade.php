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
                <span>Быстрый вывод</span>
                <span></span>
                <span></span>
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
    @if (Auth::user()->role == 'admin')
    <div class="page-content">
        <section class="fast-output">
            <div class="fast-output__top">
                <h2 class="fast-output__title title fz18">Вывод</h2>
                <form class="fast-output__form" action="/">
                    <div class="fast-output__wrapper">
                        <div class="fast-output__item">
                            <p class="fast-output__text">Куда вывести</p>
                            <div class="fast-output-box">
                                <div class="fast-output-select-wrap">
                                    <select class="fast-output-select">
{{--                                        <option value="">--}}
{{--                                            Easypay--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            Global24--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            Cash-in--}}
                                        </option>
                                        <option value="">
                                            Visa/Mc
                                        </option>
{{--                                        <option value="">--}}
{{--                                            Kuna--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            BTC--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            USDT--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            ETH--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            LTC--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            XRP--}}
{{--                                        </option>--}}
{{--                                        <option value="">--}}
{{--                                            TRX--}}
{{--                                        </option>--}}
                                    </select>
                                </div>
                                <input class="payment__input" type="text">
                            </div>
                        </div>
                        <div class="fast-output__item">
                            <p class="fast-output__text">Введите сумму вывода</p>

                            <input class="payment__input " type="text">
                        </div>
                        <div class="fast-output__item">
                            <p class="fast-output__text">Коментарий</p>
                            <input class="payment__input " type="text">
                        </div>
                    </div>
                    <button class="page-content__btn gradi-btn btn-hover2">Создать заявку</button>
                </form>
            </div>

            <div class="fast-output__bottom">
                <form class="currencies__filter" action="">
                    <div class="select-defolt">
                        <select>
                            <option value="">
                                ID
                            </option>
                            <option value="">
                                Валюты
                            </option>
                            <option value="">
                                Реквизиты
                            </option>
                        </select>
                    </div>
                    <div class="currencies__search">
                        <input class="currencies__input" type="text" placeholder="Значения">
                        <button class="search-block__btn gradi-btn">Найти</button>
                    </div>
                    <div class="select-defolt fast-select">
                        <select>
                            <option value="">
                                Завершен
                            </option>
                            <option value="">
                                Отменен
                            </option>
                            <option value="">
                                Приостановлен
                            </option>
                        </select>
                    </div>
                </form>
                <form class="filter-wrapper" action="/">
                    <span class="filter__text">На странице:</span>
                    <div class="select-defolt cancellation">
                        <select>
                            <option value="">
                                10
                            </option>
                            <option value="">
                                20
                            </option>
                            <option value="">
                                30
                            </option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="list-wrapper">
                <div class="list list__titles">
                    <div class="list__item arbitrary-payment__list1 list__title">
                        ID
                    </div>
                    <div class="list__item arbitrary-payment__list2 list__title">
                        Дата
                    </div>
                    <div class="list__item arbitrary-payment__list5 list__title">
                        Валюта
                    </div>
                    <div class="list__item arbitrary-payment__list4 list__title">
                        Реквизиты
                    </div>
                    <div class="list__item arbitrary-payment__list5 list__title">
                        Сумма
                    </div>
                    <div class="list__item arbitrary-payment__list3 list__title">
                        Комментарий
                    </div>
                    <div class="list__item arbitrary-payment__list6 list__title">
                        Статус
                    </div>
                </div>
                <div class="list">
                    <div class="list__item arbitrary-payment__list1">
                        <span>16</span>
                    </div>
                    <div class="list__item arbitrary-payment__list2">
                        <span>08.03.2022</span>
                    </div>
                    <div class="list__item arbitrary-payment__list5">
                        <span>UAH</span>
                    </div>
                    <div class="list__item arbitrary-payment__list4">
                        <span>5375 4124 5657 2423</span>
                    </div>
                    <div class="list__item arbitrary-payment__list5">
                        <span>500 UAH</span>
                    </div>
                    <div class="list__item arbitrary-payment__list3">
                        <span>За услуги</span>
                    </div>
                    <div class="list__item arbitrary-payment__list6">
                        <span class="list__status">Отменен</span>
                    </div>
                </div>
                <div class="list">
                    <div class="list__item arbitrary-payment__list1">
                        <span>21<span>
                    </div>
                    <div class="list__item arbitrary-payment__list2">
                        <span>18.03.2022</span>
                    </div>
                    <div class="list__item arbitrary-payment__list5">
                        <span>UAH</span>
                    </div>
                    <div class="list__item arbitrary-payment__list4">
                        <span>4441 1144 5476 4821</span>
                    </div>
                    <div class="list__item arbitrary-payment__list5">
                        <span>50 UAH</span>
                    </div>
                    <div class="list__item arbitrary-payment__list3">
                        <span>За услуги</span>
                    </div>
                    <div class="list__item arbitrary-payment__list6">
                        <span class="list__status">В обработке
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endif
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
