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
                    <li>География работ</li>
                </ul>
            </div>
            <!-- хлебные крошки END -->
            <div class="inner">
                <aside>
                    @include('blocks.main_services')
                    @include('blocks.partner')
                </aside>
                <div class="content-inner">
                    <!-- География BEGIN -->
                    <div class="descr-block">
                        <h1>География работ</h1>
                        <div class="page-content">
                            <div class="text">
                                <p>
                                    Наш сервис представлен мастерами из многих городов России. Внизу перечислен список тех городов, находясь в которых Вы можете вызвать мастера на дом для решения ваших бытовых вопросов.
                                </p>
                            </div>
                            <div class="geography">
                                @foreach ($cities as $city)
                                    <p>
                                        <a href="{{ $city->code }}">{{ $city->name }}</a>
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- География END -->
                    @include('forms.consult')
                </div>
            </div>
        </div>
    </div>

@endsection
