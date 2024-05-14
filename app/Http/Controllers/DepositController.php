<?php

namespace App\Http\Controllers;

use App\Deposit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Airline;
use App\Http\Requests\Deposit\StoreRequest;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fdate = isset($request->fdate) ? $request->fdate : Carbon::now()->startOfMonth()->format('d-m-Y');
        $tdate = isset($request->tdate) ? $request->tdate : Carbon::now()->endOfMonth()->format('d-m-Y');
        $deposits = $this->getDepositByDate($fdate,$tdate);
        return view('deposit.index', [
            'title' => 'Deposits',
            'deposits' => $deposits,
            'fdate' => $fdate,
            'tdate' => $tdate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $airlines = Airline::all();
        return view('deposit.create', [
            'title' => 'Deposit Create',
            'airlines' => $airlines,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Deposit::create($request->except(['date', 'created_by']) + [
                'date' => Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d'),
                'created_by' => auth()->user()->id,
            ]);
        \Session::flash('flash_message', 'successfully saved.');
        return redirect('deposit');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Deposit $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Deposit $deposit
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Deposit $deposit)
    {

        $airlines = Airline::all();

        return view('deposit.edit', [
            'deposit' => $deposit,
            'airlines' => $airlines,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Deposit $deposit
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Deposit $deposit)
    {
        $deposit->created_by = auth()->user()->id;
        $deposit->update($request->all());

        \Session::flash('flash_message', 'successfully saved.');
        return redirect(route('deposit.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Deposit $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();
        \Session::flash('flash_message', 'successfully Deleted.');
        return redirect('deposit');
    }

    private function getDepositByDate($fdate, $tdate)
    {
        return Deposit::with('airline')->whereBetween('date', [
            Carbon::createFromFormat('d-m-Y', $fdate)->format('Y-m-d'),
            Carbon::createFromFormat('d-m-Y', $tdate)->format('Y-m-d')
        ])
            ->get();
    }
}
