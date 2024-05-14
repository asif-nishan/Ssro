<?php

namespace App\Mail;

use App\Exports\GeneraLedgerExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class SendLedger extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.report')
            ->subject('General Ledger')
            ->attach(
                Excel::download(
                    new GeneraLedgerExport(),
                    'report.xlsx'
                )->getFile(), ['as' => 'report.xlsx']
            );
    }
}
