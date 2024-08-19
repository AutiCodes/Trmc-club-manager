<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MembersHonorary extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if ($this->type == 'erelid') {
            $subject = 'Je bent een erelid van TRMC geworden!';

        } else {
            $subject = 'Je bent geen erelid meer van TRMC!';
        }

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        Log::channel('member_contact')->info('Sended email to: ' . $this->name . ' with subject: ' . 'TRMC erelid wijziging');

        return new Content(
            view: 'mail.members_honorary',
            with: [
                'name' => $this->name,
                'type' => $this->type,
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
        return [];
    }
}
