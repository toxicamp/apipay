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
                <span>Пользователи</span>
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
        <section class="currencies user-page-v2">
            <div class="currencies__wrapper">
                <div class="currencies__top">
                    <h2 class="user-page__title title fz18">
                        Пользователи

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </h2>
                    <div class="select-defolt">
                        <select>
                            <option value="">
                                E-mail
                            </option>
                            <option value="">
                                Аккаунт
                            </option>
                        </select>
                    </div>
                    <form class="search-block">
                        <input type="text" placeholder="Значения">
                        <button class="search-block__btn gradi-btn">Найти</button>
                    </form>
                    <button class="create-account gradi-btn btn-hover2">
                        <img loading="lazy" src="{{ asset('img/create-account.png') }}" alt="img">
                        Создать акаунт
                    </button>
                </div>
                <div class="admin-table user__table">
                    <div class="admin-table__row row-title">
                        <div class="admin-table__first">
                            ID
                        </div>
                        <div class="admin-table__two">
                            Имя
                        </div>
                        <div class="admin-table__two">
                            Email
                        </div>
                        <div class="admin-table__three">
                            Баланс
                        </div>
                        <div class="admin-table__four">
                            Статистика
                        </div>
                        <div class="admin-table__five">
                            Изменения
                        </div>
                    </div>
                    @include('users.__parts.list')




                </div>
            </div>
            @include('users.__parts.add')

        </section>

        {{ $users->links('vendor.pagination.custom') }}


    </div>
    @elseif(Auth::user()->role == 'user')

        <echo>Вы не являетесь администратором для просмотра этой страницы!!!</echo>

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
