<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Http\Requests\Ticket\StoreRequest;
use App\Profile;
use App\Ticket;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     * php artisan make:migration add_airline_prince_and_profit_to_tickets
     *
     */
    public function index()
    {
        $tickets = Ticket::all();

       

        return view('ticket.index', ['tickets' => $tickets,
            
           
            'title' => " List",
        ]);
        return view('ticket.index', ['ticket' => $ticket]);
    }

    public function totalTicket(Request $request)
    {
        //$tickets = Ticket::with('airline')->get();
        $fdate = isset($request->fdate) ? $request->fdate : Carbon::now()->startOfMonth()->format('d-m-Y');
        $tdate = isset($request->tdate) ? $request->tdate : Carbon::now()->endOfMonth()->format('d-m-Y');
        $tickets = $this->getTicketsByDate($fdate, $tdate);

        $total_ticket_price = $tickets->sum('purchase_price');
        $total_airline_price = $tickets->sum('airline_price');
        $total_airline_profit = $tickets->sum('airline_profit');
        $total_profit = $tickets->sum('total_profit');

        return view('ticket.total_ticket_list', ['tickets' => $tickets,
            'total_ticket_price' => $total_ticket_price,
            'total_profit' => $total_profit,
            'total_airline_price' => $total_airline_price,
            'total_airline_profit' => $total_airline_profit,
            'title' => "Ticket List",
            'fdate' => $fdate,
            'tdate' => $tdate,
        ]);
    }

    private function getTicketsByDate($fdate, $tdate)
    {
        return Ticket::with('airline')->whereBetween('date_of_issue', [
            Carbon::createFromFormat('d-m-Y', $fdate)->format('Y-m-d'),
            Carbon::createFromFormat('d-m-Y', $tdate)->format('Y-m-d')
        ])
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $airlines = Airline::all();
        $profiles = Profile::orderBy('name', 'asc')->get();
        return view('ticket.create', ['airlines' => $airlines,
            'profiles' => $profiles,
            'title' => "Create ",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(StoreRequest $request)
    {

        Ticket::create($request->all());
        
        return redirect()->back()->with('success', 'Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Ticket $ticket
     *
     */
    public function show(Ticket $ticket)
    {
        $airlines = Airline::all();

        $profiles = Profile::all();
        return view('ticket.show', [
            'title' => "View Ticket",
            'ticket' => $ticket,
            'airlines' => $airlines,
            'profiles' => $profiles,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Ticket $ticket
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Ticket $ticket)
    {
        

        return view('ticket.edit', ['ticket' => $ticket,
            

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Ticket $ticket
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update([
            'name' => $request->name,
            'date_of_issue' =>$request->date_of_issue, 
            'data' => $request->data,
            'address' => $request->address,
            'bsk' => $request->bsk,
            'bsd' => $request->bsd,
            'price' => $request->price,
        ]);
        \Session::flash('flash_message', 'successfully saved.');
        return redirect('ticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        \Session::flash('flash_message', 'successfully Deleted.');
        return redirect('ticket');
    }

    public function pnr()
    {
        $tickets = Ticket::all();
        return view('ticket.pnr', [
            'title' => "Pnr",
            'tickets' => $tickets,
        ]);
    }

    public function point(Request $request)
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

        $airlines = Airline::all();
        $tickets = null;
        if (!isset($request->airline_id)) {
            $airline_id = Airline::first()->id;
        } else {
            $airline_id = $request->airline_id;
        }
        $tickets = Ticket::getAllTicketsByAirlineDate($airline_id, $date);
        $airline_id = $request->airline_id;
        $next_month = $date->addMonth()->format('Y-m'); //eg- 2018-10
        $prev_month = $date->subMonth()->format('Y-m'); //eg- 2017-5
        return view('ticket.point', [
            'title' => "Point Calculation",
            'airlines' => $airlines,
            'tickets' => $tickets,
            'airline_id' => $airline_id,
            'date' => $date,
            'months' => Ticket::getAllMonth(),
            'years' => Ticket::getAllYears(),
            'currentYear' => $date->year,
            'currentMonth' => $date->month,
            'prev_month' => $prev_month,
            'next_month' => $next_month,
        ]);
    }

    public function refund(Ticket $ticket)
    {
        if ($ticket->refund) {
            Session::flash('message', 'Already Refunded');
            Session::flash('alert-class', 'alert-success');
            return redirect(route('ticket.index'));
        }
        $airlines = Airline::all();
        $profiles = Profile::all();
        return view('ticket.refund', [
            'title' => "Refund Ticket",
            'ticket' => $ticket,
            'airlines' => $airlines,
            'profiles' => $profiles,
        ]);
    }

    public function refundPost(Ticket $ticket, Request $request)
    {
        $ticket->refund = true;
        $ticket->refund_amount = $request->refund_amount;
        $ticket->save();
        Session::flash('message', 'Refund Successful');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('ticket.index'));
    }

    public function pointPost(Ticket $ticket, Request $request)
    {
        $ticket->point = $request->point;
        $ticket->save();
        return response()->json(true);
    }



}
