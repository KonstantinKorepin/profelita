<?php

namespace App\Mail;

use App\Http\Requests\SendFormRequest;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ReviewMail extends Mailable
{
    const CODE = 'review';

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
            subject: config('services.mailer.subjects.review'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.review',
            with: [
                'name' => $this->request->input('name'),
                'master' => $this->request->input('master'),
                'rating' => $this->request->input('rating'),
                'review' => $this->request->input('review'),
                'cityName' => $this->request->input('cityName'),
                'url' => $this->request->input('url'),
            ],
        );
    }
}
