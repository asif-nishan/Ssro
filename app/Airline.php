<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function setAccountReportData($date)
    {
        $from_date = $date->startOfMonth()->toDateTimeString();
        $to_date = $date->endOfMonth()->toDateTimeString();
        //get all tickets by airlines and date
        $tickets = Ticket::where('airline_id', $this->id)->whereBetween('date_of_issue', [$from_date, $to_date])->get()->sortByDesc('id');
        $this->total_ticket_price = $tickets->sum('purchase_price');
        $this->total_profit = $tickets->sum('total_profit');
        //rest amount current month

        //get deposit for the month
        $deposits = Deposit::where('airline_id', $this->id)
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->get();
        $this->total_deposit = $deposits->sum('deposit_amount');
        //get bonus for the month
        $bonuses = Bonus::where('airline_id', $this->id)
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->get();
        $this->total_bonus = $bonuses->sum('bonus_amount');
        //Airline profit
        $this->total_airline_profit = $tickets->sum('airline_profit');
        //Airline airline_price /Sales
        $this->total_airline_price = $tickets->sum('airline_price');
        //rest amount of previous month
        $this->getPreviousMonthBalance = Ticket::getPreviousMonthBalance($this->id, $date);

        $this->currentBalance = ($this->getPreviousMonthBalance + $this->total_deposit + $this->total_airline_profit + $this->total_bonus - $this->total_airline_price);
    }
}
