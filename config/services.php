<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'recaptcha' => [
        'secret' => env('RECAPTCHA_SECRET'),
        'min_score' => 0.5,
    ],

    'mailer' => [
        'to' => env('MAIL_TO_ADDRESS'),
        'subjects' => [
            'consult' => 'Профэлита: заполнена форма "Заказать консультацию"',
            'callOrder' => 'Профэлита: заполнена форма "Заказать звонок"',
            'partner' => 'Профэлита: заполнена форма "Заявка на сотрудничество"',
            'review' => 'Профэлита: заполнена форма "Оставить отзыв"',
            'callService' => 'Профэлита: заполнена форма "Заказать услугу(большой экран)"',
        ],
    ],

];
