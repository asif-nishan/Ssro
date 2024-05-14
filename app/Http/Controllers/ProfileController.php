<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\StoreRequest;
use App\Profile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\CarbonImmutable;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Profile::create($request->all());
        \Session::flash('flash_message','successfully saved.');
        return redirect('profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Profile $profile
     * @return Application|Factory|View
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Profile $profile
     * @return Application|Factory|View
     */
    public function update(StoreRequest $request, Profile $profile)
    {
        $profile->update($request->all());
        \Session::flash('flash_message','successfully saved.');
        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
    public function show(Profile $profile)
    {
        return view('report.paid',['profile'=>$profile]);
    }
}
