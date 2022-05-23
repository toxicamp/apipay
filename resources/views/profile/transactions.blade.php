{{--@extends('layouts.profile')--}}

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
                <span>Транзакции</span>
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
                <section class="currencies admin-trans pc-trans">
                    <div class="currencies__wrapper">
                        <div class="currencies__top">
                            <h2 class="user-page__title title fz18">
                                Транзакции
                            </h2>
                            <p class="admin-trans__subtitle">Найти транзакцию</p>
                        </div>
                        <div class="admin-trans__wrap">
                            <form class="search-block">
                                <div class="admin-trans__filter">
                                    {{--                        <div class="select-defolt">--}}
                                    {{--                            <select>--}}
                                    {{--                                <option value="">--}}
                                    {{--                                    ID--}}
                                    {{--                                </option>--}}
                                    {{--                                <option value="">--}}
                                    {{--                                   Дата--}}
                                    {{--                                </option>--}}
                                    {{--                                <option value="">--}}
                                    {{--                                    Аккаунт--}}
                                    {{--                                </option>--}}
                                    {{--                            </select>--}}
                                    {{--                        </div>--}}

                                    <input type="text" placeholder="Значения" name="value">
                                    <button class="search-block__btn gradi-btn">Найти</button>

                                    <div class="select-defolt all-type">
                                        <select name="select">
                                            <option value="id">
                                                ID
                                            </option>
                                            <option value="created_at">
                                                Дата
                                            </option>
                                            <option value="shop_id">
                                                Аккаунт
                                            </option>
                                            <option value="total">
                                                Сумма
                                            </option>
                                        </select>
                                    </div>
                                    <div class="select-defolt cancellation">
                                        <select name="status">
                                            <option value="process">
                                                Новый
                                            </option>
                                            <option value="fail, block">
                                                Отмена
                                            </option>
                                            <option value="success">
                                                Оплачен
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <span class="filter__text">На странице:</span>
                                <div class="select-defolt cancellation">
                                    <select name="limit">
                                        <option value="10">
                                            10
                                        </option>
                                        <option value="20">
                                            20
                                        </option>
                                        <option value="30">
                                            30
                                        </option>

                                    </select>
                                </div>
                            </form>
                            {{--                    <button class="btn-add btn-open"></button>--}}
                        </div>
                        <div class="admin-table user__table">
                            <div class="admin-table__row row-title">
                                <div class="admin-table__first">
                                    ID
                                </div>
                                <div class="admin-table__two">
                                    Дата
                                </div>
                                <div class="admin-table__four">
                                    Аккаунт
                                </div>
{{--                                <div class="admin-table__three">--}}
{{--                                    Реквизиты--}}
{{--                                </div>--}}
{{--                                <div class="admin-table__five">--}}
{{--                                    ПС--}}
{{--                                </div>--}}
                                <div class="admin-table__six">
                                    Сумма
                                </div>
                                <div class="admin-table__eight">
                                    Сумма клиента
                                </div>
                                <div class="admin-table__nine">
                                    Статус
                                </div>
                            </div>
                            @csrf
                            @foreach($users as $item)
                            <div class="admin-table__row">
                                <div class="admin-table__first">
                                    {{$item->id}}
                                </div>
                                <div class="admin-table__two">
                                    {{$item->created_at}}
                                </div>
                                <div class="admin-table__four">
                                    {{$item->user->name}}
                                </div>
{{--                                <div class="admin-table__three">--}}
{{--                                    4441 1144 5375 6574--}}
{{--                                </div>--}}
{{--                                <div class="admin-table__five">--}}
{{--                                    ---}}
{{--                                </div>--}}
                                <div class="admin-table__six">
                                    {{$item->amount}} {{$item->currency}}
                                </div>
                                <div class="admin-table__seven">
                                    {{$item->total}}  {{$item->currency}}
                                </div>
{{--                                <div class="admin-table__eight">--}}
{{--                                    375 грн--}}
{{--                                </div>--}}
                                <div class="admin-table__nine">
                                    @if($item->status == 'success')
                                        <span id="status_transaction_{{$item->id}}" class="status done">Выполнен</span>
                                    @endif
                                    @if($item->status == 'fail')
                                        <span id="status_transaction_{{$item->id}}" class="status done">Не оплачен</span>
                                    @endif
                                    @if($item->status == 'process')
                                        <span id="status_transaction_{{$item->id}}" class="status done">На проверке</span>
                                    @endif
                                        @if($item->status == 'block')
                                            <span id="status_transaction_{{$item->id}}">Не выполнен</span>
                                        @endif
                                        <button class="admin-table__nine-btn">
                                            <img class="gear-img1" src="{{ asset('img/gear.png')}}" alt="">
                                            <img class="gear-img2" src="{{ asset('img/gear-color.png')}}" alt="">
                                        </button>
                                        <div class="gear__content">
                                            <p onclick="statusUpdate({{$item->id}}, 'success')">Выполнен</p>
                                            <p onclick="statusUpdate({{$item->id}}, 'fail')">Не оплачен</p>
                                            <p onclick="statusUpdate({{$item->id}}, 'block')">Не выполнен</p>
                                        </div>
{{--                                    <div class="gear__content">--}}
{{--                                        @if($item->status == 'success')--}}
{{--                                            <p>Завершен</p>--}}
{{--                                        @endif--}}
{{--                                        @if($item->status == 'fail')--}}
{{--                                            <p>Не оплачен</p>--}}
{{--                                        @endif--}}
{{--                                        @if($item->status == 'process')--}}
{{--                                            <p>В обработке</p>--}}
{{--                                        @endif--}}
{{--                                            @if($item->status == 'block')--}}
{{--                                                <p>Не выполнен</p>--}}
{{--                                            @endif--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                                @endforeach
{{--                            <button class="edit-user__btn">--}}
{{--                                Добавить--}}
{{--                            </button>--}}

            </div>
                    </div>
                </section>
                <div class="pagination"> {{ $users->links('vendor.pagination.custom') }}</div>
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
<script>
    function statusUpdate(transaction_id, status){
        $.ajax({
            method: "POST",
            url: "/admin/status-update",
            data: { id: transaction_id, stat: status, "_token": "{{ csrf_token() }}"}
        })
            .done(function( obj ) {
                $('#status_transaction').text(obj.status);
            });
    }
</script>

</body>




</html>


