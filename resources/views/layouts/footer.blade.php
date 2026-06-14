<!-- Arrow BEGIN -->
<div class="arrow-up">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
</div>
<!-- Arrow END -->
<!-- Footer BEGIN -->
<footer id="footer">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="flex-block">
                    <div class="item">
                        <div class="logo">
                            <div class="image">
                                <a href="#">
                                    <img src="{{ asset('/images/logo.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="text">
                                <div class="name">
                                    <a href="{{ $cityUrl }}">{{ env('SITE_NAME') }}</a>
                                </div>
                                <div class="descr">
                                    {{ env('SITE_SLOGAN') }}
                                </div>
                            </div>
                        </div>
                        <div class="copy">
                            &copy; «{{ env('SITE_NAME') }}», {{ date('Y') }}. Бытовые услуги от профессионалов. Все права защищены.
                        </div>
                    </div>
                    <div class="item tablet-hidden">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('about') }}">О компании</a></li>
                                <li><a href="{{ $cityUrl }}">Наши услуги</a></li>
                                <li><a href="{{ route('reviews') }}">Отзывы</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item tablet-hidden">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('partner') }}">Сотрудничество</a></li>
                                <li><a href="{{ route('reviews') }}">Отзывы</a></li>
                                <li><a href="{{ route('contacts') }}">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="contacts">
                            <a href="tel:{{ $phoneNumber }}" class="phone">
                                <i class="fa-solid fa-phone"></i>
                                <span>{{ $phone }}</span>
                            </a>
                            <? /* ?>
                            <p class="address">
                                <strong>Адрес:</strong> г. {{ $cityName }}, {{ $address }}
                            </p>
                            <? */ ?>
                            <p>
                                <strong>График работы:</strong> с {{ $starWorkingHours }} до {{ $endWorkingHours }}, без выходных
                            </p>
                            <p>
                                <strong>E-mail:</strong> <a href="mailto: info@profelita.ru">info@profelita.ru</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle">
        <div class="container">
            <div class="row">
                <div class="flex-block">
                    <div class="item-1">
                        <div class="payments">
                            <ul>
                                <li>Формы оплаты:</li>
                                <li><img src="{{ asset('/images/payments.png') }}" alt="Платёжные системы"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-2">
                        <div class="order">
                            <a data-fancybox="" data-src="#order_call" href="javascript: void(0);">
                                Заказать звонок
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        Представленная на сайте информация не является публичной офертой и носит информационно-справочный характер.
    </div>
</footer>
<!-- Footer END -->
