<?php

namespace App\Http\Controllers;

use App\Account;

use App\Airline;
use App\Http\Requests\Account\StoreRequest;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $accounts = Account::all();
        $profit_from_sell= $accounts->sum('profit_from_sell');
        $bonus_amount= $accounts->sum('bonus_amount');
        $total=$profit_from_sell+$bonus_amount;
        return view('account.index', ['accounts' => $accounts,'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $airlines=Airline::all();
        // $accounts=Account::all();
        return view('account.create',['airlines' => $airlines]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Account::create($request->except('rest_amount_of_current_month') + [
                'rest_amount_of_current_month' => ($request->current_balance+$request->monthly_payment)-$request->purchase_price
            ]);
        \Session::flash('flash_message','successfully saved.');
        return redirect('account');
        //rest_amount_of_current_month
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $airlines=Airline::all();
        return view('account.edit', ['account' => $account,'airlines' => $airlines]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->update($request->all());
        \Session::flash('flash_message','successfully saved.');
        return redirect('account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        \Session::flash('flash_message', 'successfully Deleted.');
        return redirect()->back();
    }
}
