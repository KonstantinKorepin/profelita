@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="consult-order-form-block order-block">
                    <div class="order-block-wrapper">
                        <div class="text-form-block">
                            <div class="caption">
                                <h2>Авторизация</h2>
                                <p>
                                    Введите ваше имя и пароль для авторизации на сайте.
                                </p>
                            </div>
                            <div class="form">
                                <form action="{{ route('login.store') }}" method="post">
                                    @csrf
                                    <div class="order-container-login">
                                        <div class="item">
                                            <label for="name">Ваше имя *</label>
                                            <input type="text" id="name" name="name" value="" placeholder="Имя"
                                                   minlength="2" maxlength="50" required="">
                                        </div>
                                        <div class="item">
                                            <label for="phone">Ваш пароль *</label>
                                            <input type="password" id="password" name="password" value="" placeholder="Пароль"
                                                   required="">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <input type="submit" value="Войти">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
