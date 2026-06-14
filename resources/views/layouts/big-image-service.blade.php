<!-- Большая картинка(услуга) BEGIN -->
<div class="big-image-block-service">
    <div class="big-image">
        <div class="big-image-wrapper">
            <div class="left">
                <div class="left-wrapper">
                    <div class="big-text">
                        <h1>{{ $data['service']->h1 }}</h1>
                    </div>
                    <div class="small-text">
                        <p>
                            Услуги от профессионала с многолетним стажем!
                        </p>
                    </div>
                    <div class="phone">
                        <div class="image">
                            <img src="{{ asset('/images/service-phone.png') }}" alt="Номер мастера"
                                 title="Номер мастера">
                        </div>
                        <div class="text"><a
                                href="tel:{{ $data['master']->getClearPhone() }}">{{ $data['master']->phone }}</a></div>
                    </div>
                    <div class="call-form-block">
                        @include('layouts.form-errors')
                        <div class="form">
                            <form action="{{ route('sendMail') }}" method="post" class="email-form" id="main_service_form">
                                @csrf
                                <div class="item">
                                    <input style="display: none" type="text" name="name" value="name">
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                           placeholder="+7(___) ___-____" tabindex="0" required/>
                                </div>
                                <div class="item">
                                    <input type="submit" value="Вызвать мастера">
                                    <input type="hidden" name="token-recaptcha">
                                    <input type="hidden" name="code" value="callService">
                                    <input type="hidden" name="cityName" value="{{ session('cityName') }}">
                                    <input type="hidden" name="url" value="{{ request()->path() }}">
                                    <input style="display: none" type="checkbox" name="check_license" checked="checked" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Большая картинка(услуга) END -->
