<!-- Заявка на консультацию BEGIN -->
<div class="consult-order-form-block order-block">
    <div class="order-block-wrapper">
        <div class="text-form-block">
            <div class="caption">
                <h2>Заказать консультацию</h2>
                <p>
                    У Вас остались дополнительные вопросы или Вы не нашли нужную услугу? Оставьте
                    свой номер телефона и мы поможем Вам в решении вашего вопроса.
                </p>
            </div>
            @include('layouts.form-errors')
            <div class="form">
                <form action="{{ route('sendMail') }}" method="post" class="email-form">
                    @csrf
                    <div class="order-container">
                        <div class="left">
                            <div class="item">
                                <label for="name">Ваше имя *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Иванов Иван" minlength="2" maxlength="50" required>
                            </div>
                            <div class="item">
                                <label for="phone">Ваш номер телефона *</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                       placeholder="+7 (900) 800-77-77" required>
                            </div>
                        </div>
                        <div class="right">
                            <div class="item">
                                <label for="comment">Ваш комментарий</label>
                                <textarea name="comment" id="comment" cols="10" rows="5"
                                          placeholder="Комментарий" minlength="3"
                                          maxlength="1000">{{ old('comment') }}</textarea>
                            </div>
                        </div>
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
                    <div class="item">
                        <input type="submit" value="Отправить">
                    </div>
                </form>
            </div>
        </div>
        <div class="image-block">
            <img src="{{ asset('/images/girl.png') }}" alt="">
        </div>
    </div>
</div>
<!-- Заявка на консультацию END -->
