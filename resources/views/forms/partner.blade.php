<!-- Заявка на партнёрство BEGIN -->
<div class="partner-order-form-block order-block">
    <div class="order-block-wrapper">
        <div class="text-form-block">
            <div class="caption">
                <h2>Заявка на сотрудничество</h2>
                <p>
                    Если Вы хотите стать частью нашей большой дружной команды мастеров сервиса
                    «Профэлита», то заполните приведённую ниже форму.
                </p>
            </div>
            @include('layouts.form-errors')
            <div class="form">
                <form action="{{ route('sendMail') }}" method="post" class="email-form">
                    @csrf
                    <div class="order-container">
                        <div class="left">
                            <div class="item">
                                <label for="name">Ваше Ф.И.О. *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Иванов Иван Иванович" minlength="2" maxlength="50" required />
                            </div>
                            <div class="item">
                                <label for="birthday">Дата рождения *</label>
                                <input type="text" id="birthday" name="birthday" value="{{ old('birthday') }}" placeholder="31.12.1990"
                                       minlength="10" maxlength="10"/>
                            </div>
                            <div class="item">
                                <label for="specialization">Ваша специализация *</label>
                                <input type="text" id="specialization" name="specialization" value="{{ old('specialization') }}"
                                       placeholder="Сантехника, электрика" minlength="2" maxlength="100">
                            </div>
                        </div>
                        <div class="right">
                            <div class="item">
                                <label for="phone">Ваш номер телефона *</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                       placeholder="+7 (900) 800-77-77" required />
                            </div>
                            <div class="item">
                                <label for="city">Ваш город *</label>
                                <input type="text" id="city" name="city" value="{{ old('city') }}" placeholder="Москва"
                                       minlength="2" maxlength="100"/>
                            </div>
                            <div class="item">
                                <label for="email">Ваш e-mail *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                       placeholder="mail@yandex.ru" minlength="2" maxlength="100"/>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <label for="comment">Ваш комментарий</label>
                        <textarea name="comment" id="comment" cols="10" rows="5"
                                  placeholder="Комментарий" maxlength="1000">{{ old('comment') }}</textarea>
                    </div>
                    <div class="item">
                        <input type="hidden" name="token-recaptcha">
                        <input type="hidden" name="code" value="{{ $code }}" />
                        <input type="hidden" name="cityName" value="{{ session('cityName') }}">
                        <input type="hidden" name="url" value="{{ request()->path() }}">
                        <input type="checkbox" name="check_license" checked="checked" required />
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
    </div>
</div>
<!-- Заявка на партнёрство END -->
