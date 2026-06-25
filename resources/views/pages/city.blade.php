@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            @include('layouts.big-image')
            <!-- teaser на странице города BEGIN -->
            <div class="main-city">
                <div class="title">
                    <h1 class="city">Бытовые услуги в {{ $data['city']->prepositional }}</h1>
                </div>
                <div class="main-desription">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <p>
                                    На сайте сервиса «Профэлита» вы можете найти контакты профессиональных мастеров в
                                    сфере бытовых услуг:
                                </p>
                                <ul class="services">
                                    <li>Ремонт компьютерной техники;</li>
                                    <li>Ремонт стиральных машин, холодильников и другой бытовой техники;</li>
                                    <li>Ремонт и сборка мебели;</li>
                                    <li>Ремонт и установка дверей;</li>
                                    <li>Ремонт и замена сантехники;</li>
                                    <li>Ремонт и установка пластиковых дверей и окон;</li>
                                    <li>Ремонт и замена электрики;</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 text-center city-master">
                                <img src="{{ asset('/images/master.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="short-desription">
                    <div class="container">
                        <div class="row">
                            Сервис предоставляет контакты только проверенных мастеров высокого уровня с большим
                            количеством положительных отзывов и хорошо зарекомендовавших себя.
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-block">
                <div class="block">
                    <div class="item-1">
                        <div class="icon">
                            <i class="fa fa-info"></i>
                        </div>
                    </div>
                    <div class="item-2">
                        <div class="text">
                            <strong>Только проверенные исполнители </strong><br>
                            <span><em>более 5 лет</em> на рынке бытовых услуг</span>
                        </div>
                    </div>
                    <div class="item-3">
                        <div class="more">
                            <a href="{{ route('about') }}" class="button">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teaser на странице города END -->
            <!-- Каталог услуг BEGIN -->
            <div class="catalog-service">
                <h2 class="text-center">Каталог услуг</h2>
                <div class="big-catalog-list">
                    <div class="container">
                        <div class="inner">
                            <div class="row">
                                @foreach ($data['services'] as $item)
                                    <div class="col-lg-12 col-md-6 col-sm-6"> @php /* col-lg-6 col-md-6 col-sm-6 */@endphp
                                        <div class="item">
                                            <div class="big-link">
                                                <a href="{{ $item['mainService']->url }}">{{ $item['mainService']->catalog_name }}</a>
                                            </div>
                                            <div class="list-block">
                                                <ul>
                                                    @foreach ($item['servicesList'] as $key => $serviceItem)
                                                        @if ($key >= 15)
                                                            <li class="tohide d-none">
                                                                <a href="{{ $serviceItem->url }}">{{ $serviceItem->catalog_name }}</a>
                                                            </li>
                                                        @else
                                                            <li><a href="{{ $serviceItem->url }}">{{ $serviceItem->catalog_name }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <a class="more" href="#">
                                                <span>Ещё услуги</span>
                                                <i class="fa fa-angle-down"></i>
                                                <i class="fa fa-angle-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                @php
                                /*
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="big-link">
                                            <a href="#">Услуги электрика</a>
                                        </div>
                                        <div class="list-block">
                                            <ul>
                                                <li><a href="#">Вызов электрика</a></li>
                                                <li><a href="#">Установка розеток</a></li>
                                                <li><a href="#">Установка выключателей</a></li>
                                                <li><a href="#">Монтаж светильников</a></li>
                                                <li><a href="#">Установка люстры</a></li>
                                                <li><a href="#">Установка бытовой техники</a></li>
                                                <li><a href="#">Установка УЗО</a></li>
                                                <li><a href="#">Установка дифавтомата</a></li>
                                                <li><a href="#">Сборка электрощитов</a></li>
                                                <li><a href="#">Установка дверного звонка</a></li>
                                                <li class="tohide d-none"><a href="#">Монтаж электропроводки</a></li>
                                                <li class="tohide d-none"><a href="#">Замена проводки в квартире</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Монтаж теплого пола</a></li>
                                                <li class="tohide d-none"><a href="#">Монтаж проводов в
                                                        распределительной коробке</a></li>
                                                <li class="tohide d-none"><a href="#">Монтаж распаечных коробок</a></li>
                                                <li class="tohide d-none"><a href="#">Установка варочной панели</a></li>
                                                <li class="tohide d-none"><a href="#">Установка бра</a></li>
                                                <li class="tohide d-none"><a href="#">Замена люминесцентных ламп на
                                                        светодиодные</a></li>
                                                <li class="tohide d-none"><a href="#">Замена ламп накаливания</a></li>
                                            </ul>
                                        </div>
                                        <a class="more" href="#">
                                            <span>Все услуги</span>
                                            <i class="fa fa-angle-down"></i>
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="big-link">
                                            <a href="#">Услуги плотника</a>
                                        </div>
                                        <div class="list-block">
                                            <ul>
                                                <li><a href="#">Вызов плотника</a></li>
                                                <li><a href="#">Установка металлических входных дверей</a></li>
                                                <li><a href="#">Замена входной двери в квартире</a></li>
                                                <li><a href="#">Установка межкомнатных дверей</a></li>
                                                <li><a href="#">Установка раздвижных межкомнатных дверей</a></li>
                                                <li><a href="#">Замена замков на двери</a></li>
                                                <li><a href="#">Замена замков в металлической двери</a></li>
                                                <li><a href="#">Установка дверных замков</a></li>
                                                <li><a href="#">Замена личинки замка двери</a></li>
                                                <li><a href="#">Замена замков входных дверей</a></li>
                                                <li class="tohide d-none"><a href="#">Установка личинок замков в
                                                        железные двери</a></li>
                                                <li class="tohide d-none"><a href="#">Замена личинки замка входной двери
                                                        в квартире</a></li>
                                                <li class="tohide d-none"><a href="#">Установка электромагнитного
                                                        замка</a></li>
                                                <li class="tohide d-none"><a href="#">Замена дверной ручки входной
                                                        двери</a></li>
                                                <li class="tohide d-none"><a href="#">Замена дверной ручки металлической
                                                        двери</a></li>
                                                <li class="tohide d-none"><a href="#">Установка мебельных петель</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Установка петель на межкомнатные
                                                        двери</a></li>
                                                <li class="tohide d-none"><a href="#">Замена петель на двери кухонной
                                                        мебели</a></li>
                                                <li class="tohide d-none"><a href="#">Установка дверных петель</a></li>
                                                <li class="tohide d-none"><a href="#">Установка петель на двери
                                                        шкафа</a></li>
                                                <li class="tohide d-none"><a href="#">Врезка петель</a></li>
                                                <li class="tohide d-none"><a href="#">Перестановка мебели в квартире</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Установка мойки на кухне в
                                                        столешницу</a></li>
                                            </ul>
                                        </div>
                                        <a class="more" href="#">
                                            <span>Все услуги</span>
                                            <i class="fa fa-angle-down"></i>
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="big-link">
                                            <a href="#">Сборка мебели</a>
                                        </div>
                                        <div class="list-block">
                                            <ul>
                                                <li><a href="#">Сборка мебели на дому</a></li>
                                                <li><a href="#">Разборка мебели</a></li>
                                                <li><a href="#">Сборка кухни</a></li>
                                                <li><a href="#">Сборка корпусной мебели</a></li>
                                                <li><a href="#">Сборка офисной мебели</a></li>
                                                <li><a href="#">Сборка угловых шкафов</a></li>
                                                <li><a href="#">Сборка офисных шкафов</a></li>
                                                <li><a href="#">Сборка углового шкафа кухни под мойку</a></li>
                                                <li><a href="#">Установка кухонной мебели</a></li>
                                                <li><a href="#">Сборка шкафа купе</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка шкафа купе с 2 дверями</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Установка шкафа купе</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка и установка дверей шкафа
                                                        купе</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка стола</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка компьютерного стола</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Сборка журнального стола</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка журнального стола
                                                        трансформера</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка кухонного раскладного
                                                        стола</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка круглого стола</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка обеденного стола</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка раздвижного стола</a></li>
                                                <li class="tohide d-none"><a href="#">Установка умывальника с тумбой</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Установка направляющих для
                                                        выдвижных ящиков</a></li>
                                                <li class="tohide d-none"><a href="#">Установка фасадов на выдвижные
                                                        ящики</a></li>
                                                <li class="tohide d-none"><a href="#">Установка ящиков</a></li>
                                                <li class="tohide d-none"><a href="#">Сборка ящиков</a></li>
                                            </ul>
                                        </div>
                                        <a class="more" href="#">
                                            <span>Все услуги</span>
                                            <i class="fa fa-angle-down"></i>
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="big-link">
                                            <a href="#">Ремонт мебели</a>
                                        </div>
                                        <div class="list-block">
                                            <ul>
                                                <li><a href="#">Ремонт деревянной мебели</a></li>
                                                <li><a href="#">Ремонт деревянных кроватей</a></li>
                                                <li><a href="#">Ремонт дивана аккордеон</a></li>
                                                <li><a href="#">Ремонт дивана еврокнижка</a></li>
                                                <li><a href="#">Ремонт дивана книжки</a></li>
                                                <li><a href="#">Ремонт диванов</a></li>
                                                <li><a href="#">Ремонт и замена роликов и направляющих на шкафу купе</a>
                                                </li>
                                                <li><a href="#">Ремонт кожаной мебели</a></li>
                                                <li><a href="#">Ремонт кожаных диванов</a></li>
                                                <li><a href="#">Ремонт кожаных кресел</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт компьютерных кресел</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Ремонт кресел</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт кресел качалок</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт кресло кровати</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт кровати</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт кухонной мебели</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт механизма дивана
                                                        аккордеон</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт механизмов шкафов купе</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Ремонт мягкой мебели</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт офисных кресел</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт офисных стульев</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт подъемного механизма
                                                        кровати</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт подъемной кровати</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт раздвижных дверей шкафа
                                                        купе</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт раскладного механизма
                                                        дивана</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт раскладных диванов</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт стульев</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт стульев из дерева</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт фасадов кухонной мебели</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Ремонт французской раскладушки
                                                        дивана</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт шкафов купе</a></li>
                                                <li class="tohide d-none"><a href="#">Ремонт встроенных шкафов купе</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="more" href="#">
                                            <span>Все услуги</span>
                                            <i class="fa fa-angle-down"></i>
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="big-link">
                                            <a href="#">Мелкий бытовой ремонт</a>
                                        </div>
                                        <div class="list-block">
                                            <ul>
                                                <li><a href="#">Мастер на дом</a></li>
                                                <li><a href="#">Муж на час</a></li>
                                                <li><a href="#">Мастер на час</a></li>
                                                <li><a href="#">Навес картин</a></li>
                                                <li><a href="#">Установка верхних шкафов кухни</a></li>
                                                <li><a href="#">Навес кухонных шкафов на планку</a></li>
                                                <li><a href="#" aria-current="page">Установка турника</a></li>
                                                <li><a href="#">Навес карнизов</a></li>
                                                <li><a href="#">Установка рулонных жалюзи</a></li>
                                                <li><a href="#">Монтаж зеркал</a></li>
                                                <li class="tohide d-none"><a href="#">Установка вентиляционной
                                                        решетки</a></li>
                                                <li class="tohide d-none"><a href="#">Установка экрана на батарею</a>
                                                </li>
                                                <li class="tohide d-none"><a href="#">Установка вытяжки на кухне</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="more" href="#">
                                            <span>Все услуги</span>
                                            <i class="fa fa-angle-down"></i>
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                </div>
                                */
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Каталог услуг END -->
            <!-- кратикий текст о специалистах BEGIN -->
            <div class="info-block">
                <div class="block">
                    <div class="item-1">
                        <div class="icon">
                            <i class="fa fa-info"></i>
                        </div>
                    </div>
                    <div class="item-2">
                        <div class="text">
                            <strong>Подберём мастера под ваши требования</strong><br>
                            <span>из более чем <em>200 исполнителей</em> </span>
                        </div>
                    </div>
                    <div class="item-3">
                        <div class="more">
                            <a href="{{ route('about') }}" class="button">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="small-text-block">
                <p>
                    Мы тщательно подбираем наших исполнителей на каждое направление. Основным критерием для выбора
                    является большое количество положительных отзывов и высокий рейтинг исполнителя на той или иной
                    площадке.
                </p>
                <p>
                    Для нас очень важно, чтобы клиенты нашего сервиса оставались довольны качеством выполненных услуг,
                    поэтому обращаем также внимание на то, чтобы наши мастера были вежливы в общении и пунктуальны.
                </p>
                <p>
                    Если конкретный мастер Вас чем-то не устроил или у вас есть желание оставить обратную связь или
                    отзыв о работе конкретного мастера или о нашем сервисе в целом, то вы можете сделать это на
                    соответствующей форме. Мы будем благодарны Вам за любую обратную связь!
                </p>
            </div>
            <!-- кратикий текст о специалистах END -->

            @include('blocks.reviews_front', ['reviews' => $data['reviews']])

            @php
            /*
            <!-- Наши мастера BEGIN -->
            <div class="masters">
                <h2 class="text-center">Наши мастера</h2>
                <div class="masters-content">
                    <div class="master-list-wrapper">
                        <div class="prev">
                            <a href="#">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                        </div>
                        <div class="master-list owl-carousel owl-theme">
                            @foreach ($data['masters'] as $master)
                                <div class="item">
                                    @if ($master->listFile()->get()->first())
                                        <div class="photo">
                                            <img src="{{ asset('storage/' . $master->listFile()->get()->first()->path) }}" class="avatar"
                                                 alt="">
                                        </div>
                                    @endif
                                    <div class="name">
                                        <a href="{{ $master->url }}">{{ $master->last_name }} {{ $master->first_name }} {{ $master->middle_name }}</a>
                                    </div>
                                    <div class="rating">
                                        Средняя оценка: <span class="grade">{{ $master->rating }}</span>
                                    </div>
                                    <div class="spec-text">
                                        Специальность
                                    </div>
                                    <div class="spec-value">
                                        {{ $master->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="next">
                            <a href="#">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Наши мастера END -->
            */
            @endphp

            <!-- Наши мастера BEGIN -->
            <div class="info-block">
                <div class="text-block">
                    <div class="little">
                        <span>Партнёрство с сервисом <strong>«Профэлита»</strong></span>
                    </div>
                    <div class="big">
                        <span>Зарабатывайте на своей специализации</span>
                    </div>
                    <div class="button-block">
                        <a href="{{ route('partner') }}" class="button">Подробнее</a>
                    </div>
                </div>
            </div>
            <!-- Наши мастера END -->
            <!-- схема работы BEGIN -->
            <div class="how-work">
                <h2 class="text-center">Схема работы</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="item">
                                <div class="icon">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    Вы звоните мастеру и мастер
                                    называет предварительную стоимость работ
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 arrow">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-2">
                            <div class="item">
                                <div class="icon">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    Мастер приезжает, осматривает всё на месте
                                    и называет конечную стоимость работы
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 arrow">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-2">
                            <div class="item">
                                <div class="icon">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    Мастер закупает необходимые расходные материалы(при необходимости) и выполняет
                                    нужные работы
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 arrow">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-2">
                            <div class="item">
                                <div class="icon">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    Вы принимаете успешно сделанную работу :)
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 arrow">
                            <i class="fa fa-trophy finish" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- схема работы END -->
            <!-- FAQ BEGIN -->
            <div class="faq">
                <h2 class="text-center">Часто задаваемые вопросы</h2>
                <div class="faq-list">
                    <div class="item">
                        <div class="question">
                            <a href="#"><i class="fa-solid fa-angle-down"></i></a><span>Стоимость работ может измениться в процессе работы?</span>
                        </div>
                        <div class="answer">
                                    <span>
                                        Окончательная стоимость работ зависит от нескольких факторов: вид работы, её сложность, стоимость расходников, какие-то дополнительные факторы. В любом случае конечную стоимость мастер озвучит на месте до того как приступит к работе.
                                    </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="question">
                            <a href="#"><i
                                    class="fa-solid fa-angle-down"></i></a><span>Какие есть формы оплаты услуги? </span>
                        </div>
                        <div class="answer">
                                    <span>
                                        На сегодняшний день наш сервис предоставляет 2 формы оплаты: наличный расчёт или перевод на банковскую карту.
                                    </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="question">
                            <a href="#"><i class="fa-solid fa-angle-down"></i></a><span>Какое среднее время ожидания мастера?</span>
                        </div>
                        <div class="answer">
                                    <span>
                                        В среднем мастер приезжает в течении 1 часа c момента подтверждения заказа с вашей стороны.
                                    </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="question">
                            <a href="#"><i class="fa-solid fa-angle-down"></i></a><span>Предоставляются ли какие-то гарантии на выполненные работы?</span>
                        </div>
                        <div class="answer">
                                    <span>
                                        Мастер предоставляет гарантию на выполненные работы. !!!Средний срок гарантии от 6 месяцев до 3-х лет в зависимости от типа работы.
                                    </span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="question">
                            <a href="#"><i class="fa-solid fa-angle-down"></i></a><span>Насколько хорошо технически оснащены ваши мастера?</span>
                        </div>
                        <div class="answer">
                                    <span>
                                        Наши мастера всегда стараются идти в ногу с техническим прогрессом и
                                        оснащают свой арсенал самыми современными инструментами.
                                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQ END -->

            @include('blocks.advantages')
            @php
                if ($data['map']) {
            @endphp
            <div id="map">
                @php
                    print $data['map'];
                @endphp
            </div>
            @php
                }
            @endphp
            @include('forms.consult')
        </div>
    </div>

@endsection
