@extends('layouts.base')

@section('contents')


    <form class="popup__inner popup-authorization two-fa" method="POST" action="{{ route('2fa') }}">
        {{ csrf_field() }}
        <h2 class="popup__title title-main fz27">Вход</h2>
        @if($errors->any())
            <b style="color: red">{{$errors->first()}}</b>

        @endif
        <div class="popup__wrapper">
            <span>ОТР код</span>
            <img class="popup__img" src="{{ asset('img/lock.png') }}" alt="img">
            <input class="popup__input popup__input--password payment__input" id="one_time_password" type="text" name="one_time_password">
        </div>
        <button type="submit" class="main__btn main__btn--header popup__btn">Войти</button>
    </form>

@endsection
