@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
        @include('layouts.big-image')
        <!-- хлебные крошки BEGIN -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ $data['mainPageLink'] }}">Главная</a></li>
                    <li><i class="fa-solid fa-angles-right"></i></li>
                    <li><a href="{{ route('masters') }}">Мастера</a></li>
                    <li><i class="fa-solid fa-angles-right"></i></li>
                    <li>{{ $data['master']->last_name }} {{ $data['master']->first_name }} {{ $data['master']->middle_name }}</li>
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
                        <div class="page-content">
                            <div class="master-page">
                                <div class="profile-data">
                                    @if ($data['master']->profileFile()->get()->first())
                                        <div class="image">
                                            <img src="{{ asset('storage/' . $data['master']->profileFile()->get()->first()->path) }}" class="avatar" alt="">
                                        </div>
                                    @endif
                                    <div class="info">
                                        <div class="name">
                                            <h1>{{ $data['master']->last_name }} {{ $data['master']->first_name }} {{ $data['master']->middle_name }}</h1>
                                        </div>
                                        <div class="rating">
                                            Средняя оценка: <span class="grade">{{ $data['master']->rating }}</span>
                                        </div>
                                        <div class="spec-text">
                                            Специальность
                                        </div>
                                        <div class="spec-value">
                                            {{ $data['master']->specialization->name }}
                                        </div>
                                        <div class="master-advantages">
                                            <ul>
                                                <li>
                                                    <i class="fa-solid fa-clock"></i> Рабочее время: <span>с {{ $data['master']->start_working_hours }} до {{ $data['master']->end_working_hours }}</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-clipboard-check"></i> Срок гарантии на работы:
                                                    <span>{{ $data['master']->warranty_period }} год</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-calendar-check"></i>Год начала
                                                    профессиональной деятельности:
                                                    <span>{{ $data['master']->professional_activity_year }}</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-house-chimney-user"></i> Количество
                                                    реализованных заказов в сервисе:
                                                    <span>{{ $data['master']->count_realized_orders }}</span>
                                                </li>
                                                @if ($data['master']->education)
                                                    <li class="education">
                                                        <i class="fa-solid fa-school"></i> Образование:
                                                        <span>{{ $data['master']->education }}</span>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="master-resume">
                                            {{ $data['master']->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- О компании END -->
                    <!-- отзывы BEGIN -->
                    @if ($data['reviews'])
                        <div class="reviews">
                            <h2 class="text-center">Отзывы о работе мастера</h2>
                            <div class="reviews-content">
                                @foreach ($data['reviews'] as $review)
                                    <div class="item">
                                        <blockquote>
                                            {{ $review->review }}
                                        </blockquote>
                                        <p class="rating">
                                            @for ($i = 0; $i < $review->rating; $i++)
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                        </p>
                                        <p class="name">
                                            <span class="date">{{ $review->date }},</span> {{ $review->name }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            {{ $data['reviews']->links() }}
                            <div class="all-reviews">
                                <a href="{{ route('reviews') }}" class="button">Смотреть все отзывы</a>
                            </div>
                        </div>
                    @endif
                    <!-- отзывы END -->
                    @include('forms.review')
                </div>
            </div>
        </div>
    </div>

@endsection
