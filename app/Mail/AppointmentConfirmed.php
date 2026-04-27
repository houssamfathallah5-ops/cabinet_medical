<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    public function __construct(\App\Models\Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('Appointment Confirmation'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.appointments.confirmed',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
