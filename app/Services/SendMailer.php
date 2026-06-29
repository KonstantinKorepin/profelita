<?php

namespace App\Services;

use App\Http\Requests\SendFormRequest;
use App\Mail\CallServiceMail;
use App\Mail\ConsultMail;
use App\Mail\CallOrderMail;
use App\Mail\PartnerMail;
use App\Mail\ReviewMail;
use App\Models\FormSendLog;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RuntimeException;

class SendMailer
{
    public function __construct(
        private readonly PendingRequest $http
    ) {}

    private const MAILS = [
        ConsultMail::CODE => ConsultMail::class,
        CallOrderMail::CODE => CallOrderMail::class,
        PartnerMail::CODE => PartnerMail::class,
        ReviewMail::CODE => ReviewMail::class,
        CallServiceMail::CODE => CallServiceMail::class,
    ];

    /**
     * Отправка сообщения на почту
     * @throws RuntimeException
     */
    public function send(SendFormRequest $request): void
    {
        if (!$this->verifyRecaptcha($request->input('token-recaptcha'))) {
            throw new RuntimeException('Проверка капчи не пройдена');
        }

        $code = $request->input('code');
        if (empty(self::MAILS[$code])) {
            throw new RuntimeException('Кода отправителя письма не существует');
        }

        $this->logRequest($code, $request->validated());

        $mailer = self::MAILS[$code];

        try {
            Mail::to(config('services.mailer.to'))->send(new $mailer($request));
        } catch (\Throwable $e) {
            Log::error('Ошибка отправки письма', [
                'code' => $code,
                'error' => $e->getMessage(),
            ]);
            throw new RuntimeException('Не удалось отправить письмо');
        }
    }

    /**
     * Проверка капчи
     * @param string|null $token
     * @return bool
     */
    private function verifyRecaptcha(?string $token): bool
    {
        if (!$token) {
            return false;
        }

        $response = $this->http->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $token,
        ]);

        $data = $response->json();

        if ($data === null || !isset($data['success'])) {
            Log::warning('reCAPTCHA: неожиданный ответ от API', ['response' => $data]);
            return false;
        }

        return $data['success'] && ($data['score'] ?? 0) >= config('services.recaptcha.min_score');
    }

    /**
     * Логирование отправки
     * @param string $code
     * @param array $data
     * @return void
     */
    private function logRequest(string $code, array $data): void
    {
        FormSendLog::create([
            'code' => $code,
            'message' => json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
        ]);
    }
}
