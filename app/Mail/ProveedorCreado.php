<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProveedorCreado extends Mailable
{
    use Queueable, SerializesModels;
    public $proveedor;

    /**
     * Create a new message instance.
     */
    public function __construct($proveedor)
    {
        //
        $this->proveedor = $proveedor;
    }

    public function build()
    {
        return $this->view('emails.proveedor-creado')
                    ->with([
                        'proveedor' => $this->proveedor,
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Proveedor Creado',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.proveedor-creado',
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
