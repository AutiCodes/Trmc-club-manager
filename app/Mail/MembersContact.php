<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Log;

class MembersContact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $club_status;
    public $username;
    public $password;
    
    /**
     * Create a new message instance.
     */
    public function __construct($name, $club_status, $username, $password)
    {
        $this->name = $name;
        $this->club_status = $club_status;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            subject: 'TRMC leden Contact',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        Log::channel('member_contact')->info('Sended email to: ' . $this->name . ' with subject: ' . 'TRMC leden Contact');


        return new Content(
            view: 'mail.new_member_mail',
            with: [
                'name' => $this->name,
                'club_status' => $this->club_status,
                'username' => $this->username,
                'password' => $this->password,
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
