@extends('layouts.app')
@section('exchange')

    <div class="container">
        <div class="exchange__inner main-payment" style="margin-top: -25%">
            <div class="main-payment__top doubled-title">
                <h2 class="title fz18">Оплата счета <span>ID:{{$transac->id}}</span></h2>
                <h2 class="title fz18">Сумма оплаты <span>{{$transac->amount}} {{$transac->currency}}</span></h2>
            </div>
            <form class="main-payment__box main-payment__box2" action="/">
                <div class="payment-amount nmar custom-text--large--red">Оплата не прошла! Ошибка транзакции!</span>
                </div>

                <div class="custom-icon--result">
                    <div class="custom-icon--card">
                        <svg enable-background="new 0 0 64 64" version="1.1" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="row_4"/><g id="row_3"><g id="payment_x5F_way"><path d="M58,55H6c-2.8,0-5-2.2-5-5V14c0-2.8,2.2-5,5-5h52c2.8,0,5,2.2,5,5v36C63,52.8,60.8,55,58,55z" fill="#1976D2"/><rect fill="#263238" height="10" width="62" x="1" y="14"/><rect fill="#E0F7FA" height="8" width="46" x="9" y="25"/><g><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="9.5" x2="12.6" y1="28.6" y2="25.5"/><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="11.7" x2="18.7" y1="32.5" y2="25.5"/><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="24.8" x2="17.8" y1="25.5" y2="32.5"/><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="30.9" x2="23.9" y1="25.5" y2="32.5"/><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="37" x2="30" y1="25.5" y2="32.5"/><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="43.1" x2="36.1" y1="25.5" y2="32.5"/><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="49.3" x2="42.3" y1="25.5" y2="32.5"/><line fill="none" stroke="#1565C0" stroke-miterlimit="10" x1="54.5" x2="48.4" y1="26.4" y2="32.5"/><line fill="none" stroke="#FBC02D" stroke-miterlimit="10" x1="12.6" x2="15.6" y1="28.5" y2="25.5"/><line fill="none" stroke="#FBC02D" stroke-miterlimit="10" x1="21.7" x2="18.7" y1="25.5" y2="28.5"/><line fill="none" stroke="#FBC02D" stroke-miterlimit="10" x1="27.9" x2="24.9" y1="25.5" y2="28.5"/><line fill="none" stroke="#FBC02D" stroke-miterlimit="10" x1="34" x2="31" y1="25.5" y2="28.5"/><line fill="none" stroke="#FBC02D" stroke-miterlimit="10" x1="40.1" x2="37.1" y1="25.5" y2="28.5"/><line fill="none" stroke="#FBC02D" stroke-miterlimit="10" x1="46.2" x2="43.2" y1="25.5" y2="28.5"/><line fill="none" stroke="#FBC02D" stroke-miterlimit="10" x1="52.3" x2="49.3" y1="25.5" y2="28.5"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="54.5" x2="51.4" y1="29.4" y2="32.5"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="11.6" x2="9.5" y1="29.5" y2="31.6"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="17.7" x2="14.7" y1="29.5" y2="32.5"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="20.9" x2="23.9" y1="32.5" y2="29.5"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="27" x2="30" y1="32.5" y2="29.5"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="33.1" x2="36.1" y1="32.5" y2="29.5"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="39.2" x2="42.2" y1="32.5" y2="29.5"/><line fill="none" stroke="#C62828" stroke-miterlimit="10" x1="45.3" x2="48.3" y1="32.5" y2="29.5"/></g><path d="M52,47.5h-4c-3,0-5.5-2.5-5.5-5.5v0c0-3,2.5-5.5,5.5-5.5h4    c3,0,5.5,2.5,5.5,5.5v0C57.5,45,55,47.5,52,47.5z" fill="none" stroke="#E0E0E0" stroke-miterlimit="10"/><path d="M48,38.5c0.7,0,1.4,0.2,2,0.6c-0.9,0.6-1.5,1.7-1.5,2.9h3c0,1.2-0.6,2.2-1.5,2.9c-0.6,0.4-1.3,0.6-2,0.6    c-1.9,0-3.5-1.6-3.5-3.5S46.1,38.5,48,38.5z" fill="#D32F2F"/><path d="M48.5,42c0-1.2,0.6-2.2,1.5-2.9c0.6-0.4,1.3-0.6,2-0.6c1.9,0,3.5,1.6,3.5,3.5s-1.6,3.5-3.5,3.5    c-0.7,0-1.4-0.2-2-0.6c0.9-0.6,1.5-1.7,1.5-2.9H48.5z" fill="#F57C00"/><g><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="18" x2="11" y1="36.5" y2="36.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="10" x2="6" y1="36.5" y2="36.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="28" x2="19" y1="36.5" y2="36.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="22" x2="28" y1="38.5" y2="38.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="6" x2="21" y1="38.5" y2="38.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="22" x2="28" y1="42.5" y2="42.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="10" x2="6" y1="42.5" y2="42.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="21" x2="11" y1="42.5" y2="42.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="28" x2="20" y1="44.5" y2="44.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="19" x2="6" y1="44.5" y2="44.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="28" x2="18" y1="46.5" y2="46.5"/><line fill="none" stroke="#E0E0E0" stroke-miterlimit="10" x1="6" x2="17" y1="46.5" y2="46.5"/></g></g></g><g id="row_2"/><g id="row_1"/></svg>
                    </div>
                    <div class="custom-icon--error animate__animated animate__tada animate__slow animate__infinite">
                        <svg id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                .st0{fill:#f44336;}
                                .st1{fill:#FFFFFF;}
                                .st2{fill:none;stroke:#f44336;stroke-width:30;stroke-miterlimit:10;}
                            </style><path class="st0" d="M489,255.9c0-0.2,0-0.5,0-0.7c0-1.6,0-3.2-0.1-4.7c0-0.9-0.1-1.8-0.1-2.8  c0-0.9-0.1-1.8-0.1-2.7c-0.1-1.1-0.1-2.2-0.2-3.3c0-0.7-0.1-1.4-0.1-2.1c-0.1-1.2-0.2-2.4-0.3-3.6c0-0.5-0.1-1.1-0.1-1.6  c-0.1-1.3-0.3-2.6-0.4-4c0-0.3-0.1-0.7-0.1-1C474.3,113.2,375.7,22.9,256,22.9S37.7,113.2,24.5,229.5c0,0.3-0.1,0.7-0.1,1  c-0.1,1.3-0.3,2.6-0.4,4c-0.1,0.5-0.1,1.1-0.1,1.6c-0.1,1.2-0.2,2.4-0.3,3.6c0,0.7-0.1,1.4-0.1,2.1c-0.1,1.1-0.1,2.2-0.2,3.3  c0,0.9-0.1,1.8-0.1,2.7c0,0.9-0.1,1.8-0.1,2.8c0,1.6-0.1,3.2-0.1,4.7c0,0.2,0,0.5,0,0.7c0,0,0,0,0,0.1s0,0,0,0.1c0,0.2,0,0.5,0,0.7  c0,1.6,0,3.2,0.1,4.7c0,0.9,0.1,1.8,0.1,2.8c0,0.9,0.1,1.8,0.1,2.7c0.1,1.1,0.1,2.2,0.2,3.3c0,0.7,0.1,1.4,0.1,2.1  c0.1,1.2,0.2,2.4,0.3,3.6c0,0.5,0.1,1.1,0.1,1.6c0.1,1.3,0.3,2.6,0.4,4c0,0.3,0.1,0.7,0.1,1C37.7,398.8,136.3,489.1,256,489.1  s218.3-90.3,231.5-206.5c0-0.3,0.1-0.7,0.1-1c0.1-1.3,0.3-2.6,0.4-4c0.1-0.5,0.1-1.1,0.1-1.6c0.1-1.2,0.2-2.4,0.3-3.6  c0-0.7,0.1-1.4,0.1-2.1c0.1-1.1,0.1-2.2,0.2-3.3c0-0.9,0.1-1.8,0.1-2.7c0-0.9,0.1-1.8,0.1-2.8c0-1.6,0.1-3.2,0.1-4.7  c0-0.2,0-0.5,0-0.7C489,256,489,256,489,255.9C489,256,489,256,489,255.9z" id="XMLID_280_"/><circle class="st1" cx="256" cy="256" id="XMLID_279_" r="159.5"/><line class="st2" id="XMLID_278_" x1="181.9" x2="330.1" y1="181.9" y2="330.1"/><line class="st2" id="XMLID_277_" x1="181.9" x2="330.1" y1="330.1" y2="181.9"/></svg>
                    </div>


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
