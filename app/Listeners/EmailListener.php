<?php

namespace App\Listeners;

use App\Mail\GeneralLedgerReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //dd($event->mail);
        Mail::to($event->mail->email)->send(new GeneralLedgerReport($event->mail));

    }
}
