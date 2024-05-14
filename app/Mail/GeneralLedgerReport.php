<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralLedgerReport extends Mailable
{
    use Queueable, SerializesModels;
    private $item;

    /**
     * Create a new message instance.
     *
     * @param $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.create')->with(['data' => $this->item]);
    }
}
