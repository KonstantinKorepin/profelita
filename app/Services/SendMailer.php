<?php

namespace App\Services;

use App\Http\Requests\SendFormRequest;
use App\Mail\CallServiceMail;
use App\Mail\ConsultMail;
use App\Mail\CallOrderMail;
use App\Mail\PartnerMail;
use App\Mail\ReviewMail;
use App\Models\FormSendLog;
use Illuminate\Support\Facades\Mail;

class SendMailer
{
    const MAILS = [
        ConsultMail::CODE => ConsultMail::class,
        CallOrderMail::CODE => CallOrderMail::class,
        PartnerMail::CODE => PartnerMail::class,
        ReviewMail::CODE => ReviewMail::class,
        CallServiceMail::CODE => CallServiceMail::class,
    ];

    /**
     * @param SendFormRequest $request
     * @return string
     */
    public function send(SendFormRequest $request): string
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' .
                env('RECAPTCHA_SECRET') .
                '&response=' . $_POST['token-recaptcha'];

        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);

        if (!$responseKeys['success'] || ($responseKeys['score'] < 0.5)) {
            return 'No OK';
        }

        $code = $request->all()['code'];
        if (empty(self::MAILS[$code])) {
            throw new \ErrorException('Кода отправителя письма не существует!');
        }

        $message = $request->all();
        unset($message['_token']);
        $message = json_encode($message, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $log = new FormSendLog();
        $log->code = $code;
        $log->message = $message;
        $log->save();

        $mailer = self::MAILS[$code];
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new $mailer($request));

        return 'OK';
    }
}
