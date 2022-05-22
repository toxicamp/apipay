@extends('layouts.app')
@section('exchange')

    <div class="container">
        <div class="exchange__inner main-payment" style="margin-top: -25%">
            <div class="main-payment__top doubled-title">
                <h2 class="title fz18">Оплата счета <span>ID:{{$transac->id}}</span></h2>
                <h2 class="title fz18">Сумма оплаты <span>{{$transac->amount}} {{$transac->currency}}</span></h2>
            </div>
            <form class="main-payment__box main-payment__box2" action="/">
                <div class="payment-amount nmar custom-text--large--red">Время для оплаты данного счёта истекло!</span>
                </div>

                <div class="custom-icon--success animate__animated animate__tada animate__slow animate__infinite">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><g data-name="Layer 2" id="Layer_2"><path d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z"/><path d="M21.5,22.5a1,1,0,0,1-.71-.29l-5.5-5.5A1,1,0,0,1,15,16V8a1,1,0,0,1,2,0v7.59l5.21,5.2a1,1,0,0,1,0,1.42A1,1,0,0,1,21.5,22.5Z"/></g><g id="frame"><rect class="cls-1" height="32" width="32"/></g></svg>
                </div>

            </form>
            <div class="main-payment__bottom">

                <div class="main-payment__info main-payment__info--two">
                    Статус счета:
                    <span class="main-payment__info-red ml-05">
                                не оплачен
                            </span>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_scripts')
    <script>

    </script>
@endsection
