<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MembersClubStatusChange extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $oldClubStatus;
    public $newClubStatus;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $oldClubStatus, $newClubStatus)
    {
        $this->name = $name;
        $this->oldClubStatus = $oldClubStatus;
        $this->newClubStatus = $newClubStatus;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'TRMC Club Status wijziging',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.club_status_change',
            with: [
                'name' => $this->name,
                'oldClubStatus' => $this->oldClubStatus,
                'oldClubStatus' => $this->oldClubStatus,
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
