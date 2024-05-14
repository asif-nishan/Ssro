<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $guarded = [];
    public function airline()
    {
        return $this->belongsTo('App\Airline','airline_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
}
