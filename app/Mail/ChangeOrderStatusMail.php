<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangeOrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public object $user;
    public array $products;
    public string $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $products, $message)
    {
        $this->user     = $user;
        $this->products = $products;
        $this->message   = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thông báo đơn hàng thời trang Bamboo StreetWear')
                    ->markdown('sendMailChangeStatusOrder')
                    ->with([
                               'user' => $this->user,
                               'products' => $this->products,
                               'message' => $this->message,
                           ]);
    }
}
