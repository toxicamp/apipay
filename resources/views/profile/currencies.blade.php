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
                <span>Валюты</span>
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

        <section class="currencies">
            <div class="currencies__wrapper">
                <div class="currencies__top">
                    <h2 class="currencies__title title fz18">
                        Валюты
                        <span class="currencies__num">+1</span>
                    </h2>
                    <div class="control">
                        <div class="control__title">
                            Управление
                        </div>
                        <div class="control__list">
                            <button class="control__item change-reserve">
                                Изменить резерв
                            </button>
                            <button class="control__item change-label">
                                Изменить метку
                            </button>
                            <button class="control__item activate">
                                Активировать
                            </button>
                            <button class="control__item deactivate">
                                Деактивировать
                            </button>
                            <button class="control__item remove">
                                Удалить
                            </button>
                        </div>
                    </div>
                    <form class="search-block">
                        <input type="text">
                        <button class="search-block__btn gradi-btn">Найти</button>
                    </form>
                    <button class="btn-add btn-open"></button>
                </div>
                <div class="admin-table">
                    <div class="admin-table__row row-title">
                        <div class="admin-table__checkbox checkbox-block">
{{--                            <input type="checkbox" class="checkbox">--}}
                        </div>
                        <div class="admin-table__first">
                            Название
                        </div>
                        <div class="admin-table__two">
                            Резерв
                        </div>
                        <div class="admin-table__three">
                            Платежные реквизиты
                        </div>
                    </div>
                    <div class="admin-table__row">
                        <div class="admin-table__checkbox checkbox-block">
{{--                            <input type="checkbox" class="checkbox">--}}
                        </div>
                        <div class="admin-table__first">
                                <span>
                                    Privat24 UAH
                                </span>
                        </div>
                        <div class="admin-table__two">
                            140 000 грн.
                        </div>
                        <div class="admin-table__three">
                            Нет данных для просмотра
                        </div>
{{--                        <button class="btn-add table-edit"></button>--}}
                    </div>

        </section>


        <div class="modal-bg modal-bg--add">
            <div class="modal-add modal-add-temp">
                <button class="modal-add__closed modal-add__closed--add"></button>
                <div class="modal-add__title title fz12">
                    Добавить шаблон
                </div>
                <div class="modal-add__template">
                    <div class="modal-add__input">
                        <span>Строка индификатор</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input">
                        <span>Код валюты</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input">
                        <span>Резерв</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input">
                        <span>Количество знаков после запятой</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input">
                        <span>Метка</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input">
                        <span>Платежные реквизиты</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input modal-add__select">
                        <span>Валидатор реквизитов</span>
                        <div class="select">
                            <div class="select__top">
                                <span class="select__top-title">Валидатор</span>
                            </div>
                            <div class="select__content">
                                <div class="select__input">
                                    <input type="radio" name="select-radio">
                                    <span class="select__item">Валидатор</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="select-radio">
                                    <span class="select__item">Валидатор</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="select-radio">
                                    <span class="select__item">Валидатор</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-add__input input-file">
                        <span>Иконки</span>
                        <input type="file">
                        <button class="input-file__btn"></button>
                    </div>
                    <div class="modal-add__input">
                        <span>Название</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input">
                        <span>Название поля на странице обмена</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__input">
                        <span>Подсказка для поля на страние обмена</span>
                        <input type="text">
                    </div>
                    <div class="modal-add__bottom">
                        <div class="custum-check">
                                <span class="custum-check__text">
                                    Валюта активна
                                </span>
                            <div class="custum-check__input">
                                <input type="checkbox">
                            </div>
                        </div>
                        <button class="modal-add__bottom--btn gradi-btn btn-hover2">
                            Добавить
                        </button>
                    </div>
                </div>
            </div>
        </div>


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
