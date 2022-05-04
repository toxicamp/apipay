<form class="add-template" method="post" action="{{route('users.store')}}">
    @csrf

    <div class="add-template__closed"></div>
    <div class="add-template__title title fz12">
        Создать аккаунт
    </div>
    <div class="add-template__wrapper">
        <div class="add-template__input">
            <span>Имя</span>
            <input type="text" name="name" placeholder="Введите имя">
        </div>
        <div class="add-template__input">
            <span>Пароль</span>
            <input type="password" id="password-input" placeholder="Введите пароль" name="password">
            <a href="" class="password-control"  onclick="return show_hide_password(this);"></a>

            <style type="text/css">
                .password-control {
                    position:initial;
                    top: 13px;
                    right: 9px;
                    display: inline-block;
                    width: 20px;
                    height: 20px;
                    background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
                }
                .password-control.view {
                    background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
                }
            </style>
            <script>
                function show_hide_password(target){
                    var input = document.getElementById('password-input');
                    if (input.getAttribute('type') == 'password') {
                        target.classList.add('view');
                        input.setAttribute('type', 'text');
                    } else {
                        target.classList.remove('view');
                        input.setAttribute('type', 'password');
                    }
                    return false;
                }
            </script>
        </div>
        <div class="add-template__input">
            <span>Электронная почта</span>
            <input type="email" placeholder="Введите ваш email" name="email" >
        </div>
    </div>
    <button type="submit" class="add-template__btn btn-hover2 gradi-btn">
        Создать аккаунт
    </button>
</form>
