<!-- Форма обратной связи с отзывами BEGIN -->
<div class="reviews-order-form-block order-block">
    <div class="order-block-wrapper">
        <div class="text-form-block">
            <div class="caption">
                <h2>Оставить отзыв</h2>
                <p>
                    Мы будем благодарны Вам за обратную связь о работе нашего сервиса и наших мастеров. Заранее спасибо!
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
                                <input type="text" id="name" name="name" placeholder="Иванов Иван" value="{{ old('name') }}"
                                       minlength="2" maxlength="50" required>
                            </div>
                            <div class="item">
                                <label for="master">Имя мастера *</label>
                                <input type="text" id="master" name="master" value="{{ old('master') }}"
                                       placeholder="Петров Пётр" minlength="2" maxlength="50" required>
                            </div>
                            <div class="item">
                                <label for="rating">Ваша оценка *</label>
                                <select id="rating" name="rating">
                                    <option value="5" @if (old('rating') === "5") selected @endif>5</option>
                                    <option value="4" @if (old('rating') === "4") selected @endif>4</option>
                                    <option value="3" @if (old('rating') === "3") selected @endif>3</option>
                                    <option value="2" @if (old('rating') === "2") selected @endif>2</option>
                                    <option value="1" @if (old('rating') === "1") selected @endif>1</option>
                                </select>
                            </div>
                        </div>
                        <div class="right">
                            <div class="item">
                                <label for="review">Ваш отзыв *</label>
                                <textarea id="review" name="review" cols="10" rows="5"
                                          placeholder="Ваш отзыв *" required>{{ old('review') }}</textarea>
                            </div>
                            <div class="item">
                                <input type="submit" value="Отправить">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <input type="hidden" name="token-recaptcha">
                        <input type="hidden" name="code" value="{{ $code }}" />
                        <input type="hidden" name="cityName" value="{{ session('cityName') }}">
                        <input type="hidden" name="url" value="{{ request()->path() }}">
                        <input type="hidden" name="phone" value="+7(111) 111-1111" />
                        <input type="checkbox" name="check_license" checked="checked" required />
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
    </div>
</div>
<!-- Форма обратной связи с отзывами END -->
