<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
