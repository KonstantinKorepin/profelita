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
    <div class="all-reviews">
        <a href="{{ route('reviews') }}" class="button">Смотреть все отзывы</a>
    </div>
</div>
<!-- отзывы END -->
