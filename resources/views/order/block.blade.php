@extends('layouts.app')
@section('exchange')

        <div class="container">
            <div class="exchange__inner main-payment">
                <div class="main-payment__top">
                  <b>  <h2 class="title fz18">Время для оплаты данного счета истекло! </h2></b>
                </div>

                <span><p class="fig">  <img src="img/payBlock.png" alt="" ></p></span>
                <style> .fig {
                        text-align: center; /* Выравнивание по центру */
                    }</style>




               <b><p class="sub-text">Ссылка заблокирована</p> </b>
                <div class="main-payment__bottom">
{{--                    <div class="main-payment__line">--}}
                        <span class="main-payment__line-red"></span>
                    </div>
{{--                    <div class="main-payment__info">--}}
{{--                        У вас есть <span class="main-payment__info-red"> {{auth()->user()->UAH}} UAH </span> для оплаты счета--}}
{{--                    </div>--}}
                    <div class="main-payment__info main-payment__info--two">
                        Статус счета: <img class="main-payment__info-img" src="img/circle.png" alt=""> <span
                            class="main-payment__info-red">не
                                оплачен</span>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('custom_scripts')
    <script>

    </script>
@endsection
