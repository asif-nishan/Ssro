<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleUser;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $user_types = UserType::all();
        return view('users.create', [
            'title' => 'Create User',
            'user_types' => $user_types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => ['required', 'regex:/^(?:\+88|01)?(?:\d{11}|\d{13})$/', 'unique:users'],
            'password' => 'required|confirmed|min:8',
        ];
        $messages = [
           /* 'user_verification_type_id.required' => 'Please select a verification type',
            'user_type_id.required' => 'Please select a user type',
            'nid_number.min' => 'Please provide a valid number',
            'nid_number.max' => 'Please provide a valid number',*/
        ];
        $data = request()->validate($rules, $messages);
        $user = $this->createUser($data);
        Session::flash('message', 'Successful');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function createUser(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            //'date_of_birth' => Carbon::createFromFormat('d-m-Y', $data['date_of_birth'])->format('Y-m-d'),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'user_role_id' => Role::OPERATOR,//this will be removed later as role is now managed by middleware CheckRole
        ]);
        $role_user = new RoleUser();
        $role_user->role_id = 3;
        $role_user->user_id = $user->id;
        $role_user->save();
        return $user;
    }
}
