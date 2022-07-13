<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShippingComplete extends Mailable
{
    use Queueable, SerializesModels;

    protected $title = '商品を発送しました。';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($group, $date)
    {
        $this->group = $group;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.to_business.ships.complete')
            ->subject($this->title)
            ->with([
                'group' => $this->group,
                'date' => $this->date,
            ]);
    }
}
