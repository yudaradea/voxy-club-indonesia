<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\EventSchedule;
use App\Models\Member;

class EventScheduled extends Mailable
{
    use Queueable;

    public function __construct(
        public EventSchedule $event,
        public Member $member
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎉 Event Baru: ' . $this->event->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.event-scheduled',
        );
    }
}
