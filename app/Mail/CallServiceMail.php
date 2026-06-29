<?php

namespace App\Mail;

use App\Http\Requests\SendFormRequest;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class CallServiceMail extends Mailable
{
    const CODE = 'callService';

    /**
     * Create a new message instance.
     */
    public function __construct(private SendFormRequest $request)
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: config('services.mailer.subjects.callService'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.call_service',
            with: [
                'phone' => $this->request->input('phone'),
                'cityName' => $this->request->input('cityName'),
                'url' => $this->request->input('url'),
            ],
        );
    }
}
