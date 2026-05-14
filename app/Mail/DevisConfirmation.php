<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DevisConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre demande de devis a été reçue — OXMOSYS-TECH',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.devis_confirmation',
        );
    }
}
