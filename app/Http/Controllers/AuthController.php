<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only(['index','registration']);
    }

    public function index()
    {
        return view('login');
    }


    public function registration()
    {
        return view('registration');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Invalid email/password','old_email'=>$credentials['email']]);
        }

        //return Redirect::to("login")->witErr('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return redirect('/');
    }

    public function dashboard()
    {

        if (Auth::check()) {
            return view('dashboard');
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data)
    {
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
