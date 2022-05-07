@extends('layouts.app')
@section('exchange')


        <div class="container">
            <div class="exchange__inner main-payment">
                <div class="main-payment__top">
                    <h2 class="title fz18">Оплата счета <span>ID:{{$transaction_id }} Сумма оплаты: {{($tot2 /100)}} {{$currency}}</span></h2>
                </div>
                @if($payment == 'easypay')
                <form id="form_pay_system3" action="{{'https://easypay.ua/ua/moneytransfer/transfer2wallet'}}" name="form_pay_system3" class="main-payment__box main-payment__box2"
                      action="/" method="get">
                    <div class="payment-amount">Сумма платежа: <span class="payment-amount__sum" id="payment-amount__sum">{{$price }} {{$currency }}.</span>
                    </div>
{{--                    <div class="main-payment__item main-payment__item3">--}}
{{--                        <p>Выбор валют</p>--}}
{{--                        <div class="select main-payment__input">--}}
{{--                            <div class="select__top">--}}
{{--                                <img class="select__top-icon" src="img/privat.png" alt="">--}}
{{--                                <span class="select__top-title">{{$payActual }} {{$currency }}</span>--}}
{{--                            </div>--}}
{{--                            <div class="select__content">--}}
{{--                                @foreach ($listPay as $id => $name)--}}
{{--                                    <div class="select__input">--}}
{{--                                        <input type="radio" name="select-radio" value="{{$id}}" onchange="selectUsePay(this)">--}}
{{--                                        <img src="img/privat.png" alt="">--}}
{{--                                        <span class="select__item">{{$name}}</span>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <input type="hidden" name="account" value="{{$shop_id}}">
                    <input type="hidden" name="amount" value="{{$price ?? ''}}">
                    <button onclick="use_online_pay('form_pay_system3','amount');"
                            class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2">
                        Отправить
                    </button>
                </form>
                @else
                    <div class="payment-amount">Сумма платежа: <span class="payment-amount__sum" id="payment-amount__sum">{{$total }} {{$currency }}.</span>
                    </div>

                    <a href="{{$payResult['response']['result']['pay_url']}}" id="payOrder"
                        class="main-payment__btn main-payment__btn2 gradi-btn btn-hover2">
                        Отправить
                    </a>
                @endif
                <p class="sub-text">Вы будете направлены на страницу оплаты</p>
                <div class="main-payment__bottom">
                    <div class="main-payment__line">
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

        <script>
            function blockBy(createAt){



                var now = '@php  $carbon::now() @endphp';
                if (now > createAt){
                    $('#payOrder').addClass('disabled').attr('disabled', true);
                    location.href='/block';
                }
                var percent = createAt*100/now;
                console.log(percent);
            }

            setInterval(blockBy('@php $createAt @endphp'), 1000)
        </script>
@endsection


