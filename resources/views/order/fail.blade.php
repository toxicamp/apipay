@extends('layouts.app')
@section('exchange')

        <div class="container">
            <div class="exchange__inner main-payment">
                <div class="main-payment__top">
                    <h2 class="title fz18">Оплата не прошла!</h2>
                </div>
                <span><p class="gig">  <img src="{{asset('img/payFail.png')}}" alt="" ></p></span>
            </div>

            <style> .gig {
                    text-align: center; /* Выравнивание по центру */
                }</style>


                <p class="sub-text">Оплата не прошла!</p>
                <div class="main-payment__bottom">
{{--                    <div class="main-payment__line">--}}
                        <span class="main-payment__line-red"></span>
                    </div>
{{--                    <div class="main-payment__info">--}}
{{--                        У вас есть <span class="main-payment__info-red"> {{auth()->user()->UAH}} UAH </span> для оплаты счета--}}
{{--                    </div>--}}
                    <div class="main-payment__info main-payment__info--two">
                        Статус счета: <img class="main-payment__info-img" src="{{asset('img/circle.png')}}" alt=""> <span
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
