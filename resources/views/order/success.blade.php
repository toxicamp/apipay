@extends('layouts.app')
@section('exchange')


        <div class="container">
            <div class="exchange__inner main-payment">
                <b><div class="main-payment__top" class="title fz18">Оплата счета <span>ID:{{$transaction_id }} </b></span>
                </div>

                <span><p class="gig">  <img src="{{asset('img/payDone.png')}}" alt="" ></p></span>
            </div>

            <style> .gig {
                    text-align: center; /* Выравнивание по центру */
                }</style>

{{--                <p class="sub-text">Вы будете направлены на страницу оплаты</p>--}}
                <div class="main-payment__bottom">
{{--                    <div class="main-payment__line">--}}
                        <span class="main-payment__line-red"></span>
                    </div>
{{--                    <div class="main-payment__info">--}}
{{--                        У вас есть <span class="main-payment__info-red"> {{auth()->user()->UAH}} UAH </span> для оплаты счета--}}
{{--                    </div>--}}
                    <div class="main-payment__info main-payment__info--two">
                        Статус счета: <img class="main-payment__ijnfo-img" src="{{asset('img/circle2.png')}}" alt=""> <span
                            class="main-payment__info-img"> <font color="green">Оплачен</font> </span>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('custom_scripts')
    <script>

    </script>
@endsection
