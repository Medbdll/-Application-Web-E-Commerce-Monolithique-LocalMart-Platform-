<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $seller_name;
    public $seller_id;
    public $product_name;
    public $product_id;
    public $submitted_at;

    public function __construct($seller_name, $seller_id, $product_name , $product_id , $submitted_at)
    {
        $this->seller_name = $seller_name;
        $this->seller_id = $seller_id;
        $this->product_name = $product_name;
        $this->product_id = $product_id;
        $this->submitted_at = $submitted_at;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "New Product Submitted by {$this->seller_name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.Admin_Notification',
            with: [
                'seller_name' => $this->seller_name,
                'seller_id' => $this->seller_id,
                'product_name' => $this->product_name,
                'product_id' => $this->product_id,
                'submitted_at' => $this->submitted_at,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
