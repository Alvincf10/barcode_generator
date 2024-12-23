<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable{
    use SerializesModels;

    public $bookingId;
    public $qrCodeBase64;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingId, $qrCodeBase64)
    {
        $this->bookingId = $bookingId;
        $this->qrCodeBase64 = $qrCodeBase64;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Booking Ticket',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.booking',
            text: 'emails.booking_plain',
            with: [
                'bookingId' => $this->bookingId,
                'qrCodeBase64' => $this->qrCodeBase64,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $pdf = Pdf::loadView('pdf.booking', [
            'bookingId' => $this->bookingId,
            'qrCodeBase64' => $this->qrCodeBase64,
        ]);

        return [
            Attachment::fromData(fn () => $pdf->output(), 'booking_ticket.pdf')
                ->withMime('application/pdf'),
        ];
    }
}