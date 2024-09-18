<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DataAddedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.data-added')  // Utilisez la bonne vue ici
                    ->with('data', $this->data);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Data Added Mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

