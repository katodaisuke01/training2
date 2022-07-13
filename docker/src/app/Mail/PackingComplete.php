<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackingComplete extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.to_delivery.package.complete')
            ->to($this->data['to'])
            ->from($this->data['from'])
            ->subject($this->data['subject'])
            ->with([
                'industry_name' => $this->data['industry_name'],
                'delivery_name' => $this->data['delivery_name'],
                'link' => $this->data['link'],
            ]);
    }
}
