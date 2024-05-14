<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketReportsController extends Controller
{

    public function download(Ticket $ticket)
    {
        try {
            $mpdf = new \Mpdf\Mpdf([
                'default_font' => 'NikoshBAN',
                'mode' => 'utf-8',
                'format' => 'A4',
                //'format' => [99, 210],
                'orientation' => 'P',
            ]);
            $mpdf->debug = true;
            $validatedData = request()->validate([
                'year' => 'nullable',
                'month' => 'nullable'
            ]);
            if (isset($validatedData['year']) && isset($validatedData['month'])) {
                $date = Carbon::createFromDate($validatedData['year'], $validatedData['month'], 1)->toImmutable();
            } else {
                $date = Carbon::now()->firstOfMonth()->toImmutable();
            }
            $html = $this->getHtml($ticket);

            //$html = "বাংলা-কবিতা ডট কম ওয়েবসাইটটি বর্তমান সময়ে বাংলা কবিতার সবচেয়ে জনপ্রিয় ও সমৃদ্ধ ওয়েব পোর্টাল। এ প্রজন্মের শতাধিক কবি";//text for testing bangla font
            // Write some HTML code:\
            $mpdf->WriteHTML($html);

            // Output a PDF file directly to the browser
            $mpdf->Output('Ticket-' . $ticket->pnr . '.pdf', 'I');
        } catch (\Exception $e) {
            echo $e;
        }
        exit;
    }

    public function downloadAllTickets(Request $request)
    {
        try {
            $mpdf = new \Mpdf\Mpdf([
                'default_font' => 'bangla',
                'mode' => 'utf-8',
                'format' => 'A4',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 60,
                'margin_bottom' => 30,
                'margin_header' => 0,
                'margin_footer' => 0,
                //'format' => [99, 210],
                'orientation' => 'P',
            ]);
            $mpdf->debug = true;

            //Get necessary data
            $tickets = $this->getAllTickets($request);
            $html = $this->getAllTicketsHtml($tickets);

            //$html = "বাংলা-কবিতা ডট কম ওয়েবসাইটটি বর্তমান সময়ে বাংলা কবিতার সবচেয়ে জনপ্রিয় ও সমৃদ্ধ ওয়েব পোর্টাল। এ প্রজন্মের শতাধিক কবি";//text for testing bangla font
            // Write some HTML code:\
            $mpdf->WriteHTML($html);

            // Output a PDF file directly to the browser
            $mpdf->Output('Ticket-Points' . '.pdf', 'I');
        } catch (\Exception $e) {
            echo $e;
        }
        exit;
    }

    private function getHtml($ticket)
    {
        $refund = $ticket->refund ? "Refunded" : "NA";
        $refundAmount = $ticket->refund != null ? $ticket->refund : "NA";
        $createdBy = $ticket->createdBy != null ? $ticket->createdBy->name : "NA";
        $createdOn = Carbon::parse($ticket->created_at)->format("d-m-Y g:ia");
        $lastUpdatedBy = $ticket->lastUpdatedBy != null ? $ticket->lastUpdatedBy->name : "NA";
        $lastUpdatedOn = Carbon::parse($ticket->updated_at)->format("d-m-Y g:ia");

        return '<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Prova Travels</title>
    <style>
        .invoice-box {
            max-width: 100%;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="7">
                <table>
                    <tr>
                        <td class="title">
                            <img src="' . $this->getLogo() . '" style="max-height:100px;">
                        </td>

                        <td>
                            <b>Ticket Details</b><br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                         <td style="font-size: 12px;">
                            <h3>Prova Travels</h3><br>
                            Zafar auto complex (1st Floor), 2428/4107, Sheikh Mujib Road, Opposite of Fire Service, Chowmuhani, Dewanhat, Chattogram<br>
                            Phone: 01819-338952, 01812-099563, 031-716398
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="2">
                Ticket Information
            </td>
            <tr class="item">
                <td>Passenger Name</td>
                <td>' . $ticket->passenger_name . '</td>
            </tr>
            <tr class="item">
                <td>Airline</td>
                <td>' . $ticket->airline->name . '</td>
            </tr>
            <tr class="item">
                <td>Reference</td>
                <td>' . $ticket->profile->name . '</td>
            </tr>
            <tr class="item">
                <td>Phone Number</td>
                <td>' . $ticket->phone_number . '</td>
            </tr>
            <tr class="item">
                <td>Number Of Passenger</td>
                <td>' . $ticket->number_of_passenger . '</td>
            </tr>
            <tr class="item">
                <td>Date of issue</td>
                <td>' . $ticket->date_of_issue . '</td>
            </tr>
            <tr class="item">
                <td>Departure</td>
                <td>' . $ticket->departure . '</td>
            </tr>
            <tr class="item">
                <td>Purchase Price</td>
                <td>' . $ticket->purchase_price . '</td>
            </tr>
            <tr class="item">
                <td>Paid Amount</td>
                <td>' . $ticket->paid_amount . '</td>
            </tr>
            <tr class="item">
                <td>Due Amount</td>
                <td>' . ($ticket->purchase_price-$ticket->paid_amount - $ticket->commission) . '</td>
            </tr>
            <tr class="item">
                <td>PNR</td>
                <td>' . $ticket->pnr . '</td>
            </tr>

            <tr class="item">
                <td>Refund Status</td>
                <td>' . $refund . '</td>
            </tr>
            <tr class="item">
                <td>Refund Amount</td>
                <td>' . $refundAmount . '</td>
            </tr>
        </tr>
    </table>
</div>
</body>
</html>';
    }

    private function getLogo()
    {
        return 'data:image/png;base64,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';
    }

    private function getAllTicketsHtml($tickets)
    {

        return '<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
    
        .invoice-box {
            max-width: 100%;
            margin: auto;
            padding: 20px;
            /*border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);*/
            font-size: 10px;
            line-height: 20px;
            font-family:  Arial, sans-serif; 
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            font-size: 10px;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0" border="1px">

        <tr class="heading">
            <td style="width: 15px">#</td>
            <td>ক্রমিক নং</td>
            <td>দলিল নং</td>
            <td>সন</td>
            
            <td>দাতার নাম</td>
            <td>গ্রহিতার নাম</td>
            <td>বি এস খতিয়ান নং</td>
            <td>বি এস দাগ নং</td>
            <td>মুল্য</td>
         
        </tr>
        // ' . $this->tableRow($tickets) . '
         <tr class="item">
           
        </tr>
    </table>
</div>
</body>
</html>';
    }

    private function tableRow($tickets)
    {
        $tableRows = '';
        foreach ($tickets as $key => $item) {
            $tableRows .= '<tr class="item">
                                <td>' . ($key + 1) . '</td>
                                <td>' . $item->name . '</td>
                                <td>' . $item->date . '</td>
                                
                                
                                <td>' . $item->data . '</td>
                                <td>' . $item->address . '</td>
                                <td>' . $item->bsk . '</td>
                                <td>' . $item->bsd . '</td>
                                <td>' . $item->price . '</td>
                                </tr>';
        }
        return $tableRows;
    }

    private function getAllTickets(Request $request)
    {
        return Ticket::whereBetween('date_of_issue', [
            Carbon::createFromFormat('d-m-Y', $request->fdate)->format('Y-m-d'),
            Carbon::createFromFormat('d-m-Y', $request->tdate)->format('Y-m-d')
        ])->with('airline')
            ->with('profile')
            ->get();
    }

}
