@foreach($users as $user)
<div class="admin-table__row">
    <div class="admin-table__first">
        {{$user->id}}
    </div>
    <div class="admin-table__two">
        {{$user->name}}
    </div>
    <div class="admin-table__two">
        {{$user->email}}
    </div>

        @if(empty($user->trans->toArray()))
        <div class="admin-table__three">0,00 UAH</div>
        @else
            @foreach($user->trans as $currency=>$item)
                <div class="admin-table__three">{{$item->sum('amount')}} {{$currency}}</div>
            @endforeach
        @endif

    @if(empty($user->trans->toArray()))
        <div class="admin-table__four">
            Оборот 0,00 UAH
        </div>
    @else
        @foreach($user->trans as $currency=>$item)
        <div class="admin-table__four">
            Оборот {{$item->sum('total')}} {{$currency}}
        </div>
        @endforeach
    @endif

    <div class="admin-table__five">
        <button id="{{$user->id}}" class="edit">
            <img loading="lazy" src="{{ asset('img/edit.png') }}" alt="img" title="редактировать">
        </button>
        <button class="on">
            <img loading="lazy"  @if($user->trashed()) src="{{asset('img/on.png')}}" title="заблокирован" @else src="{{ asset('img/deactivate.svg') }}" @endif  alt="img" title="разблокирован">
        </button>
        <form action="{{ route('users.destroy',$user->id) }}" method="POST">

            @csrf
            @method('DELETE')
            <button type="submit" class="delete" >
                <img loading="lazy" src="{{ asset('img/delete.png') }}" onclick="return window.confirm('Удалить этого пользователя???');" title="удалить">
            </button>
        </form>



    </div>
</div>


<form class="edit-user" action="{{ route('users.update',$user->id) }}" method="POST" id="{{$user->id}}">
    @csrf
    @method('PUT')
    <div class="edit-user__closed"></div>
    <div class="edit-user__title title fz12">
        Редактирование пользователя
    </div>
    <div class="edit-user__wrapper">
        <div class="edit-user__input">
            <div class="edit-user__input--title">
                <span>Имя</span>
            </div>
            <input type="text" name="name" value="{{$user->name}}">
        </div>
        <div class="edit-user__input">
            <div class="edit-user__input--title">
                <span>Электронная почта</span>
            </div>
            <input type="text" readonly name="email" value="{{$user->email}}">
        </div>
        <div class="edit-user__input">
            <div class="edit-user__input--title">
                <span>Новый пароль</span>
            </div>
            <input type="text" placeholder="Новый пароль">
        </div>
{{--        <div class="edit-user__input">--}}
{{--            <div class="edit-user__input--title">--}}
{{--                <span>Баланс</span><span>UAH</span>--}}
{{--            </div>--}}
{{--            <input type="text"  name="UAH" value="{{$user->UAH}}">--}}
{{--        </div>--}}
{{--        <div class="edit-user__input">--}}
{{--            <div class="edit-user__input--title">--}}
{{--                <span>Баланс</span><span>RUB</span>--}}
{{--            </div>--}}
{{--            <input type="text"  name="RUB" value="{{$user->RUB}}">--}}
{{--        </div>--}}
{{--        <div class="edit-user__input">--}}
{{--            <div class="edit-user__input--title">--}}
{{--                <span>Баланс</span><span>BTC</span>--}}
{{--            </div>--}}
{{--            <input type="text"  name="BTC" value="{{$user->BTC}}">--}}
{{--        </div>--}}
{{--        <div class="edit-user__input">--}}
{{--            <div class="edit-user__input--title">--}}
{{--                <span>Баланс</span><span>USDT</span>--}}
{{--            </div>--}}
{{--            <input type="text"  name="USDT" value="{{$user->USDT}}">--}}
{{--        </div>--}}
        <div class="edit-user__input">
            <div class="edit-user__input--title">
                <span>Логин реферала</span>
            </div>
            <input type="text" placeholder="Логин реферала">
        </div>
        <div class="edit-user__input">
            <div class="edit-user__input--title">
                <span>Оборот рефералов</span>
            </div>
            <input type="text" placeholder="0">
        </div>
        <div class="edit-user__input">
            <div class="edit-user__input--title">
                <span>Оборот Обменов</span>
            </div>
            <input type="text" placeholder="0">
        </div>
        <div class="edit-user__input input-token">
            <div class="edit-user__input--title">
                <span>Токен API доступа</span>
            </div>
            <button></button>
            <input type="text" placeholder="Токен API доступа">
        </div>
        <div class="edit-user__input">
            <div class="edit-user__input--title">
                <span>Токен двухфакторной фвторизации</span>
            </div>
            <input type="text" placeholder="Токен двухфакторной фвторизации">
        </div>
    </div>
    <div class="edit-user__check">
        <div class="custum-check__input @if($user->status) active @endif">
            <input name="status" class="status_checked" @if($user->status) checked="checked" @endif value="@if($user->status) 1 @else 0 @endif" type="checkbox">
        </div>
        <span>Пользователь заблокирован</span>
    </div>
    <button type="submit" class="edit-user__btn"  >
        Сохранить
    </button>
</form>

@endforeach


