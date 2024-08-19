<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AcceptedMember extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $newClubStatus, $email, $wpPassword)
    {
        $this->name = $name;
        $this->newClubStatus = $newClubStatus;
        $this->email = $email;
        $this->wpPassword = $wpPassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Je bent nu lid van TRMC!',
        );
    }

    /**
     * Get the message content definition and log contact
     */
    public function content(): Content
    {
        Log::channel('member_contact')->info('Sended email to: ' . $this->name . ' with subject: ' . 'Je bent nu lid van TRMC!');

        return new Content(
            view: 'mail.accepted_member',
            with: [
                'name' => $this->name,
                'newClubStatus' => $this->newClubStatus,
                'email' => $this->email,
                'password' => $this->wpPassword,
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
