<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_subject; 
    public $user_order_id;
    public $order_book_title;
    public $user_order_price;
    public $user_provided_email;


    /**
     * Create a new message instance.
     */
    public function __construct($subject, $order_id, $book_title, $price, $user_email)
    {
        $this->mail_subject=$subject;
        $this->user_order_id=$order_id;
        $this->order_book_title=$book_title;
        $this->user_order_price=$price;
        $this->user_provided_email=$user_email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:  $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_confirm_email',
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
