<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bonus\StoreRequest;
use App\Bonus;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Airline;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fdate = isset($request->fdate) ? $request->fdate : Carbon::now()->startOfMonth()->format('d-m-Y');
        $tdate = isset($request->tdate) ? $request->tdate : Carbon::now()->endOfMonth()->format('d-m-Y');
        //$bonuses = Bonus::with('airline')->get();
        $bonuses = $this->getBonusByDate($fdate,$tdate);
        return view('bonus.index', [
            'title' => "Bonuses",
            'bonuses' => $bonuses,
            'fdate' => $fdate,
            'tdate' => $tdate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $airlines=Airline::all();
        return view('bonus.create',[
            'title' => "Create Bonus",
            'airlines' => $airlines
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        Bonus::create($request->except(['date','created_by']) + [
                'date' => Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d'),
                'created_by' => auth()->user()->id,
            ]);
        \Session::flash('flash_message','successfully saved.');
        return redirect('bonuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function show(Bonus $bonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Bonus $bonus)
    {
        $airlines = Airline::all();

        return view('bonus.edit', [
            'bonus' => $bonus,
            'airlines' => $airlines,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Bonus $bonus)
    {
        $bonus->created_by = auth()->user()->id;
        $bonus->update($request->all());

        \Session::flash('flash_message', 'successfully saved.');
        return redirect(route('bonuses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bonus  $bonus
     */
    public function destroy(Bonus $bonus)
    {

        $bonus->delete();

        \Session::flash('flash_message', 'successfully Deleted.');
        return redirect(route('bonuses.index'));
    }

    private function getBonusByDate($fdate, $tdate)
    {
        return Bonus::with('airline')->whereBetween('date', [
            Carbon::createFromFormat('d-m-Y', $fdate)->format('Y-m-d'),
            Carbon::createFromFormat('d-m-Y', $tdate)->format('Y-m-d')
        ])
            ->get();
    }
}
