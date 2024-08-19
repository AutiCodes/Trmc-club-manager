<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\Log;

class NewsLetter extends Mailable
{
    use Queueable, SerializesModels;

    public $text_editor;

    /**
     * Create a new message instance.
     */
    public function __construct($text_editor)
    {
        $this->text_editor = $text_editor;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'TRMC nieuwsbrief',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        Log::channel('member_contact')->info('Sended newsletter');

        return new Content(
            view: 'newsletter::pdf.newsletter',
            with: [
                'text_editor' => $this->text_editor,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromPath('/public/newsletter-pdfs/Nieuwsbrief-' . date('d-m-Y') . '.pdf')
            //                 ->as('Nieuwsbrief-' . date('d-m-Y') . '.pdf')
            //                 ->withMime('application/pdf'),
        ];
    }
}
