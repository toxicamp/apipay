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
                <span>Масовые выплаты</span>
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

<div class="page-content">
    <section class="payment-section">
        <div class="payment__text">
            <span class="payment__text-title">Платежи:</span>
            <span> {{auth()->user()->name}}</span>
            <span></span>
        </div>

            <form class="payment-box" >
                <div class="payment__top">
                    <div class="payment__top-center">
                        <div class="payment__list payment__titles">
                            <div class="payment__item payment__item1">Номер карты</div>
                            <div class="payment__item payment__item2">Сумма </div>
                            <div class="payment__item payment__item3">Примечание</div>
                        </div>



                        <div class="payment__list">
                            <input class="payment__input payment__item1" type="text">
                            <input class="payment__input payment__item2" type="text">
                            <input class="payment__input payment__item3" type="text">
                            <button class="payment__btn payment__btn--plus btn-hover"></button>
                            <!-- <button class="payment__btn payment__btn--minus btn-hover"></button> -->
                        </div>
                        <div class="payment__list">
                            <input class="payment__input payment__item1" type="text">
                            <input class="payment__input payment__item2" type="text">
                            <input class="payment__input payment__item3" type="text">
                            <button class="payment__btn payment__btn--plus btn-hover"></button>
                            <!-- <button class="payment__btn payment__btn--minus btn-hover"></button> -->
                        </div>
                        <div class="payment__list">
                            <input class="payment__input payment__item1" type="text">
                            <input class="payment__input payment__item2" type="text">
                            <input class="payment__input payment__item3" type="text">
                            <button class="payment__btn payment__btn--plus btn-hover"></button>
                        </div>
                    </div>
{{--                    <div class="payment__top-right">--}}
{{--                        <button class="payment__btn payment__btn--minus btn-hover"></button>--}}
{{--                    </div>--}}
                </div>


                         <input type="checkbox"><label>Сохранить карты получаетелей в шаблон</label>
                <div class="payment-box__btn">
                    <button class="payment__btn-big payment__btn--reset btn-hover2"
                            type="reset">Очистить</button>
                    <button class="payment__btn-big payment__btn--submit btn-hover2"
                            type="submit">Отправить</button>
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

