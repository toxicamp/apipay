
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
                <span>Выводы</span>
                <span>изменение
                    статусов платежа</span>
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
{{--    @if (Auth::user()->isAdmin())   --}}
        <div class="page-content">
        <section class="currencies admin-trans">
            <div class="currencies__wrapper">
                <div class="currencies__top2">
                    <h2 class="user-page__title title fz18">
                        Выводы
                    </h2>
                    <form class="currencies__filter" action="">
                        <div class="select-defolt">
                            <select>
                                <option value="">
                                    ID
                                </option>
                                <option value="">
                                    Реквизиты
                                </option>
                                <option value="">
                                    Аккаунт
                                </option>
                            </select>
                        </div>
                        <div class="currencies__search">
                            <input class="currencies__input" type="text" placeholder="Значения">
                            <button class="search-block__btn gradi-btn">Найти</button>
                        </div>
                        <div class="select-defolt all-type">
                            <select>
                                <option value="">
                                    Easypay
                                </option>
                                <option value="">
                                    Global24
                                </option>
                                <option value="">
                                    Cash-in
                                </option>
                                <option value="">
                                    Visa/Mc
                                </option>
                                <option value="">
                                    Kuna
                                </option>
                                <option value="">
                                    BTC
                                </option>
                                <option value="">
                                    USDT
                                </option>
                            </select>
                        </div>
                        <div class="select-defolt cancellation">
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
                </div>

                <div class="list-wrapper">
                    <div class="list list__titles">
                        <div class="list__item list__item1 list__title">
                            ID
                        </div>
                        <div class="list__item list__item2 list__title">
                            Дата
                        </div>
                        <div class="list__item list__item4 list__title">
                            Аккаунт
                        </div>
                        <div class="list__item list__item2 list__title">
                            Валюта
                        </div>
                        <div class="list__item list__item3 list__title">
                            Реквизиты
                        </div>
                        <div class="list__item list__item4 list__title">
                            Отдаю
                        </div>
                        <div class="list__item list__item4 list__title">
                            Получаю
                        </div>
                        <div class="list__item list__item4 list__title">
                            Курс
                        </div>
                        <div class="list__item list__item5 list__title">
                            Статус
                        </div>
                    </div>
                    <div class="list">
                        <div class="list__item list__item1">
                            <span>34</span>
                        </div>
                        <div class="list__item list__item2">
                            <span>22.03.2022</span>
                        </div>
                        <div class="list__item list__item4">
                            <span>apipay</span>
                        </div>
                        <div class="list__item list__item2">
                            Global24
                        </div>
                        <div class="list__item list__item3">
                            <span>5375 4141 2876 6543 </span>
                        </div>
                        <div class="list__item list__item4">
                            <span>186 грн</span>
                        </div>
                        <div class="list__item list__item4">
                            <span>0,020</span>
                        </div>
                        <div class="list__item list__item4">
                            <span>33.45</span>
                        </div>
                        <div class="list__item list__item5">
                            Новый
                            <button class="admin-table__nine-btn">
                                <img class="gear-img1" src="img/gear.png" alt="">
                                <img class="gear-img2" src="img/gear-color.png" alt="">
                            </button>
                            <div class="gear__content">
                                <p>Завершен</p>
                                <p>Отменен</p>
                                <p>Приостановлен</p>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <ul class="pagination">
        </ul>
    </div>
{{--    @endif--}}
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
