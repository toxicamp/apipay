@extends('layouts.app')
@section('exchange')


    <div class="container">
        <div class="exchange__inner main-payment" style="margin-top: -25%">
            <div class="main-payment__top doubled-title">
                <h2 class="title fz18">Оплата счета <span>ID:{{$transac->id}}</span></h2>
{{--                <h2 class="title fz18">Сумма оплаты <span>{{$transac->total}} {{$transac->currency}}</span></h2>--}}
            </div>
            <form class="main-payment__box main-payment__box2" action="/">
                <div class="payment-amount nmar">Сумма платежа: <span class="payment-amount__sum">{{$transac->total}} {{$transac->currency}}</span>
                </div>

                <div class="custom-icon--success animate__animated animate__tada animate__slow animate__infinite">
                    <svg id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                            .st0{fill:#2BB673;}
                            .st1{fill:none;stroke:#FFFFFF;stroke-width:30;stroke-miterlimit:10;}
                        </style><path class="st0" d="M489,255.9c0-0.2,0-0.5,0-0.7c0-1.6,0-3.2-0.1-4.7c0-0.9-0.1-1.8-0.1-2.8c0-0.9-0.1-1.8-0.1-2.7  c-0.1-1.1-0.1-2.2-0.2-3.3c0-0.7-0.1-1.4-0.1-2.1c-0.1-1.2-0.2-2.4-0.3-3.6c0-0.5-0.1-1.1-0.1-1.6c-0.1-1.3-0.3-2.6-0.4-4  c0-0.3-0.1-0.7-0.1-1C474.3,113.2,375.7,22.9,256,22.9S37.7,113.2,24.5,229.5c0,0.3-0.1,0.7-0.1,1c-0.1,1.3-0.3,2.6-0.4,4  c-0.1,0.5-0.1,1.1-0.1,1.6c-0.1,1.2-0.2,2.4-0.3,3.6c0,0.7-0.1,1.4-0.1,2.1c-0.1,1.1-0.1,2.2-0.2,3.3c0,0.9-0.1,1.8-0.1,2.7  c0,0.9-0.1,1.8-0.1,2.8c0,1.6-0.1,3.2-0.1,4.7c0,0.2,0,0.5,0,0.7c0,0,0,0,0,0.1s0,0,0,0.1c0,0.2,0,0.5,0,0.7c0,1.6,0,3.2,0.1,4.7  c0,0.9,0.1,1.8,0.1,2.8c0,0.9,0.1,1.8,0.1,2.7c0.1,1.1,0.1,2.2,0.2,3.3c0,0.7,0.1,1.4,0.1,2.1c0.1,1.2,0.2,2.4,0.3,3.6  c0,0.5,0.1,1.1,0.1,1.6c0.1,1.3,0.3,2.6,0.4,4c0,0.3,0.1,0.7,0.1,1C37.7,398.8,136.3,489.1,256,489.1s218.3-90.3,231.5-206.5  c0-0.3,0.1-0.7,0.1-1c0.1-1.3,0.3-2.6,0.4-4c0.1-0.5,0.1-1.1,0.1-1.6c0.1-1.2,0.2-2.4,0.3-3.6c0-0.7,0.1-1.4,0.1-2.1  c0.1-1.1,0.1-2.2,0.2-3.3c0-0.9,0.1-1.8,0.1-2.7c0-0.9,0.1-1.8,0.1-2.8c0-1.6,0.1-3.2,0.1-4.7c0-0.2,0-0.5,0-0.7  C489,256,489,256,489,255.9C489,256,489,256,489,255.9z" id="XMLID_3_"/><g id="XMLID_1_"><line class="st1" id="XMLID_2_" x1="213.6" x2="369.7" y1="344.2" y2="188.2"/><line class="st1" id="XMLID_4_" x1="233.8" x2="154.7" y1="345.2" y2="266.1"/></g></svg>
                </div>


            </form>
            <div class="main-payment__bottom">

                <div class="main-payment__info main-payment__info--two">
                    Статус счета:
                    <span class="main-payment__info-green ml-05">
                                оплачен
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
