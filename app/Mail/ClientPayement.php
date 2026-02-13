<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientPayement extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $seller_name;
    public $order_id;
    public $customer_name;
    public $product_name;
    public $quantity;
    public $total_amount;
    public $payment_method;

    public $order_link;
    public function __construct($seller_name , $order_id , $customer_name ,$product_name, $quantity,$total_amount , $payment_method  , $order_link )
    {
        $this->seller_name = $seller_name;
        $this->order_id = $order_id;
        $this->customer_name = $customer_name;
        $this->product_name = $product_name;
        $this->quantity = $quantity;
        $this->total_amount = $total_amount;
        $this->order_link = $order_link;
        $this->payment_method = $payment_method;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Payment Confirmed - Order #{$this->order_id}",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.client_payment',
            with: [
                'customer_name' => $this->customer_name,
                'order_id' => $this->order_id,
                'total_amount' => $this->total_amount,
                'payment_method' => $this->payment_method,
                'order_link' => $this->order_link,

            ]

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
