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
                    <li>Сотрудничество</li>
                </ul>
            </div>
            <!-- хлебные крошки END -->
            <div class="inner">
                <aside>
                    @include('blocks.main_services')
                    @include('blocks.partner')
                </aside>
                <div class="content-inner">
                    <!-- Сотрудничество BEGIN -->
                    <div class="descr-block">
                        <h1>Сотрудничество</h1>
                        <div class="page-content">
                            <div class="text-image-block">
                                <div class="text">
                                    <p>
                                        Сервис «Профэлита» постоянно расширяет своё присутствие в регионах Российской
                                        Федерации и сотрудничает с мастерами рабочих профессий и IT-специалистами. Нашим
                                        мастераи мы предлагаем выгодные условия совместной деятельности. Если Вы
                                        обладаете высоким уровнем компетенции в какой-либо рабочей или IT специальности,
                                        то наш сервис поможет Вам получать заявки по вашему направлению деятельности и
                                        расширить Вашу клиентскую базу.
                                    </p>
                                    <p>Мы постоянно расширяем нашу команду по следующим направлениям:</p>
                                    <ul class="list">
                                        <li>Сантехника</li>
                                        <li>Электрика</li>
                                        <li>Компьютерные услуги</li>
                                        <li>Столярное дело</li>
                                        <li>Услуги плотника</li>
                                        <li>Универсальные рабочие</li>
                                    </ul>
                                </div>
                                <div class="image">
                                    <img src="{{ asset('/images/partner.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="text">
                                <p>
                                    Заполни нижеприведённую форму и получай заявки по своей специальности от сервиса
                                    «Профэлита»!
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Сотрудничество END -->
                    @include('forms.partner')
                </div>
            </div>
        </div>
    </div>

@endsection
