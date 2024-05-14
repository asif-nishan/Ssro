<?php

namespace App\Http\Controllers;

use App\Account;
use App\Airline;
use App\Bonus;
use App\Deposit;
use App\Http\Requests\Report\AccountReportRequest;
use App\Http\Requests\Report\TicketReportRequest;
use App\Ticket;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountReportIndex()
    {
        return view('report.account');
    }

    public function show_account_report(AccountReportRequest $request)
    {

        $accounts = Account::whereDate('created_at', '=', $request->from_date)->get();
        $profit_from_sell = $accounts->sum('profit_from_sell');
        $bonus_amount = $accounts->sum('bonus_amount');
        $total = $profit_from_sell + $bonus_amount;

        return view('report.account', ['accounts' => $accounts, 'total' => $total]);
    }

    public function ticketReportIndex()
    {
        return view('report.ticket',[
            'from_date' => Carbon::now()->startOfMonth()->format('d-m-Y'),
            'to_date' => Carbon::now()->endOfMonth()->format('d-m-Y'),
            'tickets' => null,
        ]);
    }

    public function show_ticket_report(TicketReportRequest $request)
    {
        $from_date = Carbon::createFromFormat('d-m-Y', $request['from_date'])->startOfDay()->toDateTimeString();
        $to_date = Carbon::createFromFormat('d-m-Y', $request['to_date'])->endOfDay()->toDateTimeString();
        $tickets = Ticket::whereBetween('date_of_issue', [$from_date, $to_date])->get();

        $total_ticket_price = $tickets->sum('purchase_price');
        $total_profit = $tickets->sum('total_profit');

        return view('report.ticket', [
            'title' => "Ticket Report",
            'tickets' => $tickets,
            'total_ticket_price' => $total_ticket_price,
            'total_profit' => $total_profit,
            'from_date' => $request['from_date'],
            'to_date' => $request['to_date'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function monthly()
    {
        $validatedData = request()->validate([
            'year' => 'nullable',
            'month' => 'nullable'
        ]);
        if (isset($validatedData['year']) && isset($validatedData['month'])) {
            $date = Carbon::createFromDate($validatedData['year'], $validatedData['month'], 1)->toImmutable();
        } else {
            $date = Carbon::now()->firstOfMonth()->toImmutable();
        }
        $from_date = $date->startOfMonth()->toDateTimeString();
        $to_date = $date->endOfMonth()->toDateTimeString();
        //get all airlines
        $airlines = Airline::all();
        foreach ($airlines as $airline) {
            $airline->setAccountReportData($date);
        }
        $next_month = $date->addMonth()->format('Y-m'); //eg- 2018-10
        $prev_month = $date->subMonth()->format('Y-m'); //eg- 2017-5
        return view('report.monthly', [
            'title' => "Monthly Airline wise Account Report",
            'airlines' => $airlines,
            'date' => $date,
            'months' => Ticket::getAllMonth(),
            'years' => Ticket::getAllYears(),
            'currentYear' => $date->year,
            'currentMonth' => $date->month,
            'prev_month' => $prev_month,
            'next_month' => $next_month,

        ]);
    }

    //Probably not using
    public function monthlyPdf()
    {
        $validatedData = request()->validate([
            'year' => 'nullable',
            'month' => 'nullable'
        ]);
        if (isset($validatedData['year']) && isset($validatedData['month'])) {
            $date = Carbon::createFromDate($validatedData['year'], $validatedData['month'], 1)->toImmutable();
        } else {
            $date = Carbon::now()->firstOfMonth()->toImmutable();
        }

        //get all airlines
        $airlines = Airline::all();
        foreach ($airlines as $airline) {
            //get all tickets by airlines and date
            $airline->setAccountReportData($date);
        }
        return view('report.monthly', [
            'title' => "Monthly Airline wise Account Report",
            'airlines' => $airlines,
            'date' => $date,
            'months' => Ticket::getAllMonth(),
            'years' => Ticket::getAllYears(),
            'currentYear' => $date->year,
            'currentMonth' => $date->month,

        ]);
    }


}
