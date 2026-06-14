<!-- Menu BEGIN -->
<div class="menu-block">
    <div class="container">
        <div class="row">
            <div class="main-menu-block">
                <div class="main-menu-wrapper">
                    <ul class="main-menu">
                        <li>
                            <a href="{{ route('about') }}">О сервисе</a>
                            <ul class="submenu">
                                <li><a href="{{ route('geography') }}">География работ</a></li>
                                <li><a href="{{ route('guarantee') }}">Гарантия</a></li>
                                <li><a href="{{ route('partner') }}">Сотрудничество</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ $cityUrl }}">Наши услуги</a></li>
                        <li><a href="{{ route('reviews') }}">Отзывы</a></li>
                        @php /* <li><a href="{{ route('masters') }}">Мастера</a></li> */ @endphp
                        <li><a href="{{ route('contacts') }}">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu END -->
<!-- Mobile Menu BEGIN -->
<div class="mobile-menu__block">
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</div>
<div class="mobile-menu__content">
    <ul>
        <li>
            <a href="{{ route('about') }}">О сервисе</a>
            <i class="fas fa-chevron-down"></i>
            <ul class="submenu inner">
                <li><a href="{{ route('geography') }}">География работ</a></li>
                <li><a href="{{ route('guarantee') }}">Гарантия</a></li>
            </ul>
        </li>
        <li><a href="{{ $cityUrl }}">Услуги</a></li>
        <li><a href="{{ route('reviews') }}">Отзывы</a></li>
        @php /* <li><a href="{{ route('masters') }}">Мастера</a></li> */ @endphp
        <li><a href="{{ route('contacts') }}">Контакты</a></li>
    </ul>
</div>
<!-- Mobile Menu END -->
