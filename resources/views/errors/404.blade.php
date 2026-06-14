@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
        @include('layouts.big-image')
        <!-- хлебные крошки BEGIN -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('main') }}">Главная</a></li>
                    <li><i class="fa-solid fa-angles-right"></i></li>
                    <li>О сервисе</li>
                </ul>
            </div>
            <!-- хлебные крошки END -->
            <div class="inner">
                <aside>
                    @include('blocks.main_services')
                    @include('blocks.partner')
                </aside>
                <div class="content-inner">
                    <!-- О компании BEGIN -->
                    <div class="descr-block">
                        <h1>Страница не найдена</h1>
                        <div class="page-content">
                            Возможно вы имели ввиду какую-то другую страницу. Попробуйте перейти на
                            <a href="{{ route('main') }}"><strong>ГЛАВНУЮ СТРАНИЦУ</strong></a> вашего города
                            и найти интересующую вас услугу.
                        </div>
                    </div>
                    <!-- О компании END -->
                    @include('forms.consult')
                </div>
            </div>
        </div>
    </div>

@endsection
