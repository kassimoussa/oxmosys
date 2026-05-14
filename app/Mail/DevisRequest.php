<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DevisRequest extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $data) {}

    public function envelope(): Envelope
    {
        $company = $this->data['company'] ?? null;
        $from    = $this->data['contact_name'] . ($company ? " ($company)" : '');

        return new Envelope(
            subject: '[Devis] ' . $from,
            replyTo: [
                new Address($this->data['email'], $this->data['contact_name']),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.devis',
        );
    }
}
