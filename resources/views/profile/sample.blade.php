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
                <span>Шаблоны</span>
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
    <section class="output-section">
        <div class="output__top">
            <div class="filter-wrapper">
                <span class="filter__text">Шаблоны</span>
                <button class="sample__btn-big btn-hover2">Добавить шаблон</button>
                <form class="search-block sample__form">
                    <div class="select-defolt">
                        <select>
                            <option value="">
                                ID
                            </option>
                            <option value="">
                                Название
                            </option>
                        </select>
                    </div>
                    <input class="sample__input sample__input-modern" type="text" placeholder="Значение...">
                    <button class="search-block__btn gradi-btn btn-hover2">Найти</button>
                </form>
            </div>
        </div>
        <div class="output__middle">
            <div class="list-wrapper">
                <div class="list list__titles">
                    <div class="list__item sample__item1 list__title">
                        ID
                    </div>
                    <div class="list__item sample__item2 list__title">
                        Название шаблона
                    </div>
                    <div class="list__item sample__item3 list__title">
                        Дата создания шаблона
                    </div>
                    <div class="list__item sample__item4 list__title">
                        Количество карт
                    </div>
                    <div class="list__item sample__item5  list__title">
                        Шаблон на сумму
                    </div>
                    <div class="list__item sample__item6 list__title">
                        Действие
                    </div>
                </div>
                <div class="list">
                    <div class="list__item sample__item1 ">
                        <span>14523</span>
                    </div>
                    <div class="list__item sample__item2 ">
                        <span>cvc</span>
                    </div>
                    <div class="list__item sample__item3 ">
                        <span>20.09.2021 18.00</span>
                    </div>
                    <div class="list__item sample__item4 ">
                        <span>2</span>
                    </div>
                    <div class="list__item sample__item5 ">
                        <span>14 500 руб.</span>
                    </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src={{asset("img/change.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src={{asset("img/exchange.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src={{asset("img/delete.png")}} alt="">
                        </button>
                        <script>
                            document.onclick = function() {
                                div = Array.from(document.querySelectorAll('.list'));
                                div.forEach((e) => {
                                    e.onclick = function() {
                                        this.remove();
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
                <div class="list">
                    <div class="list__item sample__item1 ">
                        <span>14523</span>
                    </div>
                    <div class="list__item sample__item2 ">
                        <span>cvc</span>
                    </div>
                    <div class="list__item sample__item3 ">
                        <span>20.09.2021 18.00</span>
                    </div>
                    <div class="list__item sample__item4 ">
                        <span>2</span>
                    </div>
                    <div class="list__item sample__item5 ">
                        <span>14 500 руб.</span>
                    </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src={{asset("img/change.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src={{asset("img/exchange.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src={{asset("img/delete.png")}} alt="">
                        </button>
                        <script>
                            document.onclick = function() {
                                div = Array.from(document.querySelectorAll('.list'));
                                div.forEach((e) => {
                                    e.onclick = function() {
                                        this.remove();
                                    }
                                });
                            }
                        </script>
                        </button>
                    </div>
                </div>
                <div class="list">
                    <div class="list__item sample__item1 ">
                        <span>14523</span>
                    </div>
                    <div class="list__item sample__item2 ">
                        <span>cvc</span>
                    </div>
                    <div class="list__item sample__item3 ">
                        <span>20.09.2021 18.00</span>
                    </div>
                    <div class="list__item sample__item4 ">
                        <span>2</span>
                    </div>
                    <div class="list__item sample__item5 ">
                        <span>14 500 руб.</span>
                    </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src={{asset("img/change.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src={{asset("img/exchange.png")}} alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src={{asset("img/delete.png")}} alt="">
                        </button>
                        <script>
                            document.onclick = function() {
                                div = Array.from(document.querySelectorAll('.list'));
                                div.forEach((e) => {
                                    e.onclick = function() {
                                        this.remove();
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
                    <div class="list__item sample__item6 ">
                        <button class="sample__btn sample__btn-change">
                            <img src="img/change.png" alt="">
                        </button>
                        <button class="sample__btn sample__btn-exchange">
                            <img src="img/exchange.png" alt="">
                        </button>
                        <button class="sample__btn sample__btn-delete">
                            <img src="img/delete.png" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </section>
    <div class="sample-popup sample-popup-change">
        <div class="sample-popup__inner">
            <div class="sample-popup__top">
                <p class="sample-popup__title">Редактировать шаблон</p>
                <button class="sample-popup__close sample-popup__close-change"></button>
            </div>
            <form class="sample-popup__bottom" action="/">
                <div class="sample-popup__box">
                    <div class="sample-popup__item sample-popup__item1">
                        Номер карты
                        <input class="payment__input sample-popup__input" name="number" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item2">
                        Сумма
                        <input class="payment__input sample-popup__input" name="sum" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item3">
                        Название
                        <input class="payment__input sample-popup__input" name="text" type="text">
                    </div>
                </div>
                <div class="payment-box__btn">
                    <button class="payment__btn-big payment__btn--reset btn-hover2"
                            type="reset">Очистить</button>
                    <button class="payment__btn-big payment__btn--submit btn-hover2"
                            type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
    <div class="sample-popup sample-popup-add">
        <div class="sample-popup__inner">
            <div class="sample-popup__top">
                <p class="sample-popup__title">Добавить шаблон</p>
                <button class="sample-popup__close sample-popup__close-add"></button>
            </div>
            <form class="sample-popup__bottom" action="/">
                <div class="sample-popup__box">
                    <div class="sample-popup__item sample-popup__item1">
                        Номер карты
                        <input class="payment__input sample-popup__input" name="number" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item2">
                        Сумма
                        <input class="payment__input sample-popup__input" name="sum" type="text">
                    </div>
                    <div class="sample-popup__item sample-popup__item3">
                        Название
                        <input class="payment__input sample-popup__input" name="text" type="text">
                    </div>
                </div>
                <div class="payment-box__btn">
                    <button class="payment__btn-big payment__btn--reset btn-hover2"
                            type="reset">Очистить</button>
                    <button class="payment__btn-big payment__btn--submit btn-hover2"
                            type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="overley"></div>

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
