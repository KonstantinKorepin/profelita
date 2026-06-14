@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            @include('layouts.big-image')
            <!-- хлебные крошки BEGIN -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ $mainPageLink }}">Главная</a></li>
                    <li><i class="fa-solid fa-angles-right"></i></li>
                    <li>Контакты</li>
                </ul>
            </div>
            <!-- хлебные крошки END -->
            <div class="inner">
                <aside>
                    @include('blocks.main_services')
                    @include('blocks.partner')
                </aside>
                <div class="content-inner">
                    <!-- Контакты BEGIN -->
                    <div class="descr-block">
                        <h1>Контакты</h1>
                        <div class="page-content">
                            <div class="contact-list">
                                <ul>
                                    @php
                                    /* <li>
                                        <i class="fa-solid fa-phone"></i>
                                        <span>Телефон:</span>
                                        <a href="tel:+79041967821">+7 (904) 196 78-21</a>
                                    </li> */
                                    @endphp
                                    <li>
                                        <i class="fa-solid fa-at"></i>
                                        <span>E-mail:</span>
                                        <a href="mailto:info@profelita.ru">info@profelita.ru</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>Адрес: г. Ульяновск, ул. Отрадная, д. 5</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-clock"></i>
                                        <span>Режим работы: с 9:00 до 21:00, без выходных</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <script type="text/javascript" charset="utf-8" async
                                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A187ad7593743ef1acc275f68fa35be9d3dbe435159439f0111c075a1f4e1389b&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true">

                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- Контакты END -->
                    @include('forms.consult')
                </div>
            </div>
        </div>
    </div>

@endsection
