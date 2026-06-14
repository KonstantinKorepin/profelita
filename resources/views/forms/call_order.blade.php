<!-- Заказать звонок BEGIN -->
<div class="order-block hidden" id="order_call">
    <div class="caption">
        <h2>Заказать звонок</h2>
        <p>
            Оставьте свой номер телефона и я перезвоню Вам в ближайшее время
        </p>
    </div>
    @include('layouts.form-errors')
    <div class="form">
        <form action="{{ route('sendMail') }}" method="post" class="email-form" id="order_call_form">
            @csrf
            <div class="item">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ваше имя *" minlength="2" maxlength="50" required>
            </div>
            <div class="item">
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Ваш номер телефона *" required>
            </div>
            <div class="item">
                <input type="submit" value="Отправить">
            </div>
            <div class="item">
                <input type="hidden" name="token-recaptcha">
                <input type="hidden" name="code" value="{{ $code }}">
                <input type="hidden" name="cityName" value="{{ session('cityName') }}">
                <input type="hidden" name="url" value="{{ request()->path() }}">
                <input type="checkbox" name="check_license" checked="checked" required>
                Я даю согласие на
                обработку своих персональных данных и ознакомлен с
                <a class="policy" href="javascript: void(0);"
                   data-fancybox=""
                   data-src="#policy"
                   rel="nofollow">политикой конфиденциальности
                </a>
            </div>
        </form>
    </div>
</div>
<!-- Заказать звонок END -->
