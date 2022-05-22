@extends('layouts.base')

@section('contents')


    <form class="popup__inner popup-authorization" method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="popup__title title-main fz27">Авторизация</h2>
        <div class="popup__wrapper">
            <img class="popup__img" src="{{ asset('img/profile.png') }}" alt="img">
            <input class="popup__input popup__input--password payment__input @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="text">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="popup__wrapper">
            <img class="popup__img" src="{{ asset('img/key.png') }}" alt="img">
            <input class="popup__input popup__input--password payment__input @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password" type="password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <label>
            <input type="checkbox" name="remember_me" />
            <span>Запомнить меня</span>
        </label>
        <button type="submit" class="main__btn main__btn--header popup__btn">Войти</button>

    </form>

@endsection
