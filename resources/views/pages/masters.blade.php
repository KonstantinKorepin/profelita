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
                    <li>Мастера</li>
                </ul>
            </div>
            <!-- хлебные крошки END -->
            <div class="inner">
                <aside>
                    @include('blocks.main_services')
                    @include('blocks.partner')
                </aside>
                <div class="content-inner">
                    <!-- Полный список мастеров BEGIN -->
                    <div class="masters-full-content">
                        <h1 class="text-center">Наши мастера</h1>
                        <div class="page-content">
                            <div class="master-list">
                                @foreach ($masters as $master)
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
                        </div>
                    </div>
                    <!-- Полный список мастеров END -->
                    @include('forms.consult')
                </div>
            </div>
        </div>
    </div>

@endsection
