<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i&amp;amp;subset=cyrillic"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/images/favicons/favicon_san.ico') }}" type="image/image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/big.image.service.css') }}">

    <title>{{ $seoTag->getTitle() }}</title>
    <meta name="description" content="{{  $seoTag->getDescription() }}" />
    <meta name="keywords" content="{{  $seoTag->getKeywords() }}" />

    <script src="https://api-maps.yandex.ru/2.1/?apikey=cdcdb592-9783-4e2a-9ca4-b51864dd8481&lang=ru_RU" type="text/javascript">
    </script>

    @include('layouts.counters')
</head>
<body>
    @php
        /* @include('layouts.preloader') */
    @endphp
    @include('layouts.header')
    @include('layouts.main-menu')

    <div class="content">
        @if ($errors->any())
            <div class="error-block">
                <div class="container">
                    <div class="row">
                        <div class="consult-order-form-block order-block">
                            <div class="order-block-wrapper">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>

    @include('layouts.footer')
    @include('layouts.forms-hidden')


    <script src="https://www.google.com/recaptcha/api.js?render=@php print env('RECAPTCHA_CODE'); @endphp"></script>
    <script>
        function ready() {
            grecaptcha.ready(function() {
                grecaptcha.execute('@php print env('RECAPTCHA_CODE'); @endphp', {action: 'homepage'}).then(function(token) {

                   var els = document.getElementsByName('token-recaptcha'), i;

                   for (i=0; i < els.length; i++)
                   {
                        els[i].value = token;
                   }
                });
            });
        }
        document.addEventListener('DOMContentLoaded', ready);
    </script>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/fancybox.umd.js') }}"></script>
    <script src="{{ asset('/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    @php
    /*
    <script src="{{ asset('/js/preloader.js') }}"></script>
    */
    @endphp
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
