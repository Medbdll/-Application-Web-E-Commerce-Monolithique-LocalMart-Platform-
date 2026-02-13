<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusMail extends Mailable
{
    use Queueable, SerializesModels;

public $customer_name;
public $order_id;
public $product_name;
public $order_status ;
public $estimated_delivery;
public $order_link;
public $support_email;
    /**
     * Create a new message instance.
     */
    public function __construct($customer_name , $order_id , $product_name , $order_status , $estimated_delivery , $order_link , $support_email)
    {
        $this->customer_name = $customer_name;
        $this->order_id = $order_id ;
        $this->product_name = $product_name;
        $this->order_status = $order_status;
        $this->estimated_delivery = $estimated_delivery;
        $this->order_link = $order_link;
        $this->support_email = $support_email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Order #{$this->order_id} Status Updated to " . ucfirst($this->order_status),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.status_Mail',
            with: [
                'customer_name' => $this->customer_name,
                'order_status' => $this->order_status,
                'order_id' => $this->order_id,
                'product_name' => $this->product_name,
                'estimated_delivery' => $this->estimated_delivery,
                'order_link' => $this->order_link,
                'support_email' => $this->support_email

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
