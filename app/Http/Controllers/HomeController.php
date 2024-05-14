<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([ 'port']);
//        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function port()
    {
        return view('portfolio');
    }

}
