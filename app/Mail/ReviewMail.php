<?php

namespace App\Mail;

use App\Http\Requests\SendFormRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    const CODE = 'review';

    /**
     * Create a new message instance.
     */
    public function __construct(protected SendFormRequest $request)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Профэлита: заполнена форма "Оставить отзыв"',
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

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
