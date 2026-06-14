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
                    <li>Отзывы клиентов</li>
                </ul>
            </div>
            <!-- хлебные крошки END -->
            <div class="inner">
                <aside>
                    @include('blocks.main_services')
                    @include('blocks.partner')
                </aside>
                <div class="content-inner">
                    <!-- Страница с отзывами BEGIN -->
                    <div class="descr-block">
                        <h1>Отзывы клиентов</h1>
                        <div class="page-content">
                            <div class="text-image-block">
                                <div class="text">
                                    <p>
                                        В данном разделе Вы можете почитать отзывы о работе мастеров нашего сервиса. Для
                                        нас очень важно, чтобы наши клиенты были довольны качеством и сроками
                                        оказываемых услуг. Мы постоянно отслеживаем обратную связь по работе наших
                                        мастеров и для нас очень важно получать её от Вас своевременно. Поэтому команда
                                        сервиса «Профэлита» выражает благодарность каждому нашему клиенту, кто
                                        воспользовался услугами нашего сервиса и оставил отзыв о работе наших мастеров.
                                    </p>
                                    <p>
                                        Желаем Вам успешного решения всех ваших бытовых вопросов с мастерами нашего
                                        сервиса!
                                    </p>
                                </div>
                                <div class="image">
                                    <img src="{{ asset('/images/reviews.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Страница с отзывами END -->
                    <!-- отзывы BEGIN -->
                    <div class="reviews">
                        <h2 class="text-center">Отзывы о работе мастеров</h2>
                        <div class="reviews-content">
                            @foreach ($reviews as $review)
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
                                    @php
                                    /*
                                    <p class="master">
                                        Мастер: <a href="{{ $review->url }}">{{ $review->last_name }} {{ $review->first_name }} {{ $review->middle_name }}</a>
                                    </p>
                                    */
                                    @endphp
                                </div>
                            @endforeach
                        </div>
                        {{ $reviews->links() }}
                    </div>
                    <!-- отзывы END -->
                    @include('forms.review')
                </div>
            </div>
        </div>
    </div>

@endsection
