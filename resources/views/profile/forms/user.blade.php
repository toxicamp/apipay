@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-warning">
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
<form class="pc-profile__form" method="POST" action="{{route('profile_update')}}">
    @csrf
    @method('PUT')
    <div class="pc-profile__group">
        <p>Имя</p>
        <input class="payment__input pc-profile__input" value="{{$user->name}}" name="name" type="text">
        <input value="{{$user->id}}" name="id" type="hidden">
    </div>

    <div class="pc-profile__group">
        <p>Email:</p>
        <input class="payment__input pc-profile__input" value="{{$user->email}}" name="email" type="text">
    </div>
{{--    <div class="pc-profile__group">--}}
{{--        <p>Другая информация:</p>--}}
{{--        <input class="payment__input pc-profile__input" name="another" type="text">--}}
{{--    </div>--}}
{{--    <button type="submit" class="pc-profile__btn gradi-btn btn-hover2">Редактировать</button>--}}
</form>
<form class="pc-profile__form" method="POST" action="{{route('profile_2fagoogle')}}">
    @csrf
    @method('PUT')
    <div class="pc-profile__group">
        <h2 class="pc-profile__title title fz18">Двухфакторная Аутентификация</h2>
    </div>
    <div class="pc-profile__group">
        <p>Токен 2FA</p>
        <div class="token__wrapper">
            <input class="payment__input pc-profile__input token" readonly value="@if($user->twofagoogle){{$user->google2fa_secret}}@else{{$secret}}@endif"
                   name="google2fa_secret" type="text">
            <input type="hidden" name="twofagoogle" value="@if($user->twofagoogle) 0 @else 1 @endif">
            <a href="javascript:clickQrCode(this)" rel="0" class="token__btn gradi-btn btn-hover2">QR-код</a>
          </div>



        <div class="token__wrapper">
            @if(!$user->twofagoogle)

                <div id="qr-code" style="display: none">
                    <img src="{{ $QR_Image }}">
                </div>
            @endif
        </div>
    </div>
    <div class="pc-profile__group">
        @if(!$user->twofagoogle)
            <p>Пароль 2FA</p>
            <input class="payment__input pc-profile__input"  name="google2fa_pass" placeholder="Пароль 2FA" type="password">

        @endif

    </div>
    <button type="submit" class="pc-profile__btn gradi-btn btn-hover2">@if($user->twofagoogle) Выключить @else Включить @endif</button>
</form>

<script>
    function clickQrCode(object){
        var isOpen = $(object).attr('rel');
        if (!isOpen) {
            $("#qr-code").show(500);
            $(object).attr('rel', 1);
        }
        else {
            $("#qr-code").hide(500);
            $(object).attr('rel', 0);
        }

    }
</script>

