<!-- Header BEGIN -->
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 fc">
                <div class="logo">
                    <div class="image">
                        <a href="{{ $cityUrl }}">
                            <img src="{{ asset('/images/logo.svg') }}" alt="">
                        </a>
                    </div>
                    <div class="text">
                        <div class="name">
                            <a href="{{ $cityUrl }}">{{ config('app.site_name') }}</a>
                        </div>
                        <div class="descr">
                            {{ config('app.site_slogan') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fc">
                <div class="your-town fc">
                    <i class="fa-solid fa-location-dot"></i> Ваш город: <a data-fancybox="" data-src="#town-block"
                                                                           href="javascript: void(0);">{{ $cityName }}</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fc">
                <div class="order">
                    <a data-fancybox="" data-src="#order_call" href="javascript: void(0);">
                        <i class="fa fa-phone-square" aria-hidden="true"></i> Заказать звонок
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fc">
                <div class="contacts">
                    <div class="phone fc">
                        <i class="fa fa-phone-square" aria-hidden="true"></i> <a href="tel:{{ $phoneNumber }}">{{ $phone }}</a><br>
                    </div>
                    <div class="time fc">
                        с {{ $starWorkingHours }} до {{ $endWorkingHours }}, без выходных
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header END -->
