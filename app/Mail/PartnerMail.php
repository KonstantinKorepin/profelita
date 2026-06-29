<?php

namespace App\Mail;

use App\Http\Requests\SendFormRequest;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class PartnerMail extends Mailable
{
    const CODE = 'partner';

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
            subject: config('services.mailer.subjects.partner'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.partner',
            with: [
                'name' => $this->request->input('name'),
                'phone' => $this->request->input('phone'),
                'birthday' => $this->request->input('birthday'),
                'city' => $this->request->input('city'),
                'specialization' => $this->request->input('specialization'),
                'email' => $this->request->input('email'),
                'comment' => $this->request->input('comment'),
                'cityName' => $this->request->input('cityName'),
                'url' => $this->request->input('url'),
            ],
        );
    }
}
