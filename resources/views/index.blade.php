@extends('layouts.app')

@section('exchange')
    <section class="exchange">
        <div class="container">
            <div class="exchange__inner">
                <div class="exchange__left">
                    <div class="exchange__top">
                        <p class="exchange__title">ВЫ ОТДАЕТЕ</p>
                        <ul class="exchange__tabs">
                            <li class="exchange__tab active">Все</li>
                            <li class="exchange__tab">BTC</li>
                            <li class="exchange__tab">RUB</li>
                            <li class="exchange__tab">UAH</li>
                        </ul>
                    </div>
                    <div class="exchange__content">
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/qiwi.png" loading="lazy" alt="img">
                            QIWI RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/rnkb.png" loading="lazy" alt="img">
                            РНКБ RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/bitcoin.png" loading="lazy" alt="img">
                            Bitcoin BTC
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/avang.png" loading="lazy" alt="img">
                            Банк Авангард RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/mir.png" loading="lazy" alt="img">
                            МИР RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/prom.png" loading="lazy" alt="img">
                            Промсвязьбанк RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/sber.png" loading="lazy" alt="img">
                            Сбербанк RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/gazprom.png" loading="lazy" alt="img">
                            Газпром Банк RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/visa.png" loading="lazy" alt="img">
                            Visa/MasterCard UAH
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/corn.png" loading="lazy" alt="img">
                            Кукуруза RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/privat.png" loading="lazy" alt="img">
                            Приват24 UAH
                        </buttom>
                        <buttom class="exchange__item active">
                            <img class="exchange__img" src="img/brand/raiff.png" loading="lazy" alt="img">
                            Райффайзен RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/mono.png" loading="lazy" alt="img">
                            Монобанк UAH
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/vtb.png" loading="lazy" alt="img">
                            ВТБ24 RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/visa.png" loading="lazy" alt="img">
                            VISA/Master UAH
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/tintkof.png" loading="lazy" alt="img">
                            Тинькофф RUB
                        </buttom>
                    </div>
                </div>
                <div class="exchange__right">
                    <div class="exchange__top exchange__top--right">
                        <p class="exchange__title">ВЫ ПОЛУЧАЕТЕ</p>
                        <ul class="exchange__tabs">
                            <li class="exchange__tab active">Все</li>
                            <li class="exchange__tab">BTC</li>
                            <li class="exchange__tab">RUB</li>
                            <li class="exchange__tab">UAH</li>
                        </ul>
                    </div>
                    <div class="exchange__content">
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/qiwi.png" loading="lazy" alt="img">
                            QIWI RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/rnkb.png" loading="lazy" alt="img">
                            РНКБ RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/bitcoin.png" loading="lazy" alt="img">
                            Bitcoin BTC
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/avang.png" loading="lazy" alt="img">
                            Банк Авангард RUB
                        </buttom>
                        <buttom class="exchange__item active">
                            <img class="exchange__img" src="img/brand/mir.png" loading="lazy" alt="img">
                            МИР RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/prom.png" loading="lazy" alt="img">
                            Промсвязьбанк RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/sber.png" loading="lazy" alt="img">
                            Сбербанк RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/gazprom.png" loading="lazy" alt="img">
                            Газпром Банк RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/visa.png" loading="lazy" alt="img">
                            Visa/MasterCard UAH
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/corn.png" loading="lazy" alt="img">
                            Кукуруза RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/privat.png" loading="lazy" alt="img">
                            Приват24 UAH
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/raiff.png" loading="lazy" alt="img">
                            Райффайзен RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/mono.png" loading="lazy" alt="img">
                            Монобанк UAH
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/vtb.png" loading="lazy" alt="img">
                            ВТБ24 RUB
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/visa.png" loading="lazy" alt="img">
                            VISA/Master UAH
                        </buttom>
                        <buttom class="exchange__item">
                            <img class="exchange__img" src="img/brand/tintkof.png" loading="lazy" alt="img">
                            Тинькофф RUB
                        </buttom>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('benefits')

    <section class="benefits">
        <div class="container">
            <div class="benefits__inner">
                <h2 class="benefits__title title-main fz27">Наши преймущества</h2>
                <ul class="benefits__list">
                    <li class="benefits__item">
                        <img class="benefits__num" src="img/one.png"></img>
                        <div class="benefits__info">
                            <p class="benefits__info-title">Преймущество</p>
                            <p class="benefits__info-text">Повседневная практика показывает, что постоянный
                                количественный рост и сфера нашей активности в значительной степени обуславливает
                                создание модели развития. Повседневная практика показывает, что постоянный
                                количественный рост сфера.</p>
                        </div>
                    </li>
                    <li class="benefits__item">
                        <img class="benefits__num" src="img/two.png"></img>
                        <div class="benefits__info">
                            <p class="benefits__info-title">Преймущество</p>
                            <p class="benefits__info-text">Повседневная практика показывает, что постоянный
                                количественный рост и сфера нашей активности в значительной степени обуславливает
                                создание модели развития. Повседневная практика показывает, что постоянный
                                количественный рост сфера.</p>
                        </div>
                    </li>
                    <li class="benefits__item">
                        <img class="benefits__num" src="img/three.png"></img>
                        <div class="benefits__info">
                            <p class="benefits__info-title">Преймущество</p>
                            <p class="benefits__info-text">Повседневная практика показывает, что постоянный
                                количественный рост и сфера нашей активности в значительной степени обуславливает
                                создание модели развития. Повседневная практика показывает, что постоянный
                                количественный рост сфера.</p>
                        </div>
                    </li>
                    <li class="benefits__item">
                        <img class="benefits__num" src="img/four.png"></img>
                        <div class="benefits__info">
                            <p class="benefits__info-title">Преймущество</p>
                            <p class="benefits__info-text">Повседневная практика показывает, что постоянный
                                количественный рост и сфера нашей активности в значительной степени обуславливает
                                создание модели развития. Повседневная практика показывает, что постоянный
                                количественный рост сфера.</p>
                        </div>
                    </li>
                </ul>
                <button class="main__btn main__btn--logo">
                    <img class="main__btn-arrow-left" src="img/arrow.png" alt="">
                    подключится
                    <img class="main__btn-arrow-right" src="img/arrow.png" alt="">
                </button>
            </div>
        </div>
    </section>

@endsection

@section('partners')
    <section class="partners">
        <div class="container">
            <div class="partners__inner">
                <h2 class="partners__title title-main fz27">Наши партнеры</h2>

                <ul class="partners__list">
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                    <li class="partners__item">
                        <a href="#">
                            <img src="img/partners.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection


