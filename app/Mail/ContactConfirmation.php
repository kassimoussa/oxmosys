<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nous avons bien reçu votre message — OXMOSYS-TECH',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_confirmation',
        );
    }
}
