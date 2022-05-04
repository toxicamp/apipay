<div class="popup popup--authorization">
    <form class="popup__inner" id="auth-form" data-url="{{ route('profile_index') }}" method="POST" action="{{ route('login') }}">
        @csrf
        <span class="popup__close popup__close--authorization"></span>
        <h2 class="popup__title title-main fz27">Авторизация</h2>
        <div class="popup__wrapper">
            <img class="popup__img" src="img/profile.png" alt="img">
            <input class="popup__input popup__input--password payment__input" id="js-email" name="email" type="text">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="popup__wrapper">
            <img class="popup__img" src="img/key.png" alt="img">
            <input class="popup__input popup__input--password payment__input" id="js-password" name="password" type="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="popup__box">
            <span class="popup__link-password">Забыли пароль?</span>
            <span class="popup__link-registration">Регистрация</span>
        </div>

        <button id="-js-auth" type="submit" class="main__btn main__btn--header popup__btn">подключится</button>
    </form>
</div>

<div class="popup popup--password">
    <form class="popup__inner" action="/">
        <span class="popup__close popup__close--password"></span>
        <h2 class="popup__title title-main fz27">Изменить пароль</h2>
        <p class="popup__text">Новый пароль</p>
        <div class="popup__wrapper">
            <img class="popup__img" src="img/lock.png" alt="img">
            <input class="popup__input popup__input--password payment__input" name="login" type="text">
        </div>
        <p class="popup__text">Новый пароль повторно</p>
        <div class="popup__wrapper">
            <img class="popup__img" src="img/lock.png" alt="img">
            <input class="popup__input popup__input--password payment__input" name="password" type="password">
        </div>
        <button class="main__btn main__btn--password popup__btn">Изменить</button>
    </form>
</div>
