<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    protected $guarded = [];

    public function airline()
    {
        return $this->belongsTo('App\Airline', 'airline_id');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile', 'profile_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo('App\User', 'last_updated_by');
    }

    public static function getAllMonth()
    {
        return [
            "01" => 'January',
            "02" => 'February',
            "03" => 'March',
            "04" => 'April',
            "05" => 'May',
            "06" => 'June',
            "07" => 'July ',
            "08" => 'August',
            "09" => 'September',
            "10" => 'October',
            "11" => 'November',
            "12" => 'December',
        ];
    }

    public static function getAllYears()
    {
        $year = [];
        for ($i = 2019; $i <= 2050; $i++) {
            $year[] = $i;
        }
        return $year;
    }

    public static function getAllTicketsByAirlineDate(int $airline_id, CarbonImmutable $date)
    {
        $from_date = $date->startOfMonth()->startOfDay()->toDateTimeString();
        $to_date = $date->endOfMonth()->endOfDay()->toDateTimeString();

        return (
        self::whereBetween('departure', [$from_date, $to_date])
            ->orWhereBetween('return_date', [$from_date, $to_date])->get()
        )
            ->where('airline_id', '=', $airline_id);
    }

    public static function getPreviousMonthBalance($airlineId, CarbonImmutable $date)
    {
        $tickets = Ticket::where([
            ['airline_id', '=', $airlineId],
            ['date_of_issue', '<', $date->startOfMonth()->format('Y-m-d')],
        ])->get()->sortByDesc('id');
        //$total_ticket_price = $tickets->sum('purchase_price');
        $total_ticket_price = 0;
        foreach ($tickets as $ticket) {
            $total_ticket_price += $ticket->refund ? ($ticket->airline_price - $ticket->refund_amount) : $ticket->airline_price; //new airline prices /Sales
        }
        //get deposit for the prev month
        $deposits = Deposit::where([
            ['airline_id', '=', $airlineId],
            ['date', '<', $date->startOfMonth()->format('Y-m-d')],
        ])->get();
        $total_deposit = $deposits->sum('deposit_amount');
        //get bonus for the prev month
        $bonuses = Bonus::where([
            ['airline_id', '=', $airlineId],
            ['date', '<', $date->startOfMonth()->format('Y-m-d')],
        ])->get();
        $total_bonus = $bonuses->sum('bonus_amount');

        $total_airline_profit = $tickets->sum('airline_profit');

        return $total_deposit + $total_airline_profit + $total_bonus - $total_ticket_price;
    }

}
