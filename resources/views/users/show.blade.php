@extends('layouts.admin')
@section('content')
    <style>
        .user-avatar {
            width: 200px;
            height: 200px;
            -webkit-border-radius: 200px;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 200px;
            -moz-background-clip: padding;
            border-radius: 200px;
            background-clip: padding-box;
            margin: 7px 0 0 5px;
            display: inline-block;
            background-size: cover;
            background-position: center center;
        }
    </style>
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body">
                <h5 class="card-title text-center">User Profile</h5>
                <div class="table-responsive">
                    <table style="" class="table table-borderless text-center">
                        <tr>
                            <th colspan="2" style="text-align:center;vertical-align:middle;">
                                @if($user->image_url == null)
                                    <img style="width:200px;height: 200px;" class="rounded-circle"
                                         src="{{asset('assets/img/default-avatar.png')}}" alt="">
                                @else
                                    <div class="user-avatar"
                                         style="background-image: url({{asset('images/profiles/'.$user->image_url)}})"></div>
                                    {{--                                    <img style="width:200px;height: 200px;"  class="rounded-circle"--}}
                                    {{--                                         src='{{'http://chatgaexpress/images/profiles/'.$user->image_url}}'--}}
                                    {{--                                         alt="{{$user->image_url}}">--}}

                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">
                                <a class="badge badge-primary" href="/profile/edit">Change</a>
                            </th>
                        </tr>
                    </table>
                    <table style="" id="example"
                           class="table table-sm table-hover table-striped  text-center">

                        <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>{{ $user->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <td>User Type</td>
                            <td>{{ $user->userType->name }}</td>
                        </tr>
                        <tr>
                            <td>User Role</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>ID Verified by</td>
                            <td>{{ $user->userVerificationType->name }}</td>
                        </tr>
                        <tr>
                            <td>NID/Passport Number</td>
                            <td>{{ $user->nid_number}}</td>
                        </tr>
                        <tr>
                            <td>NID/Passport Verified</td>
                            <td>{{\Carbon\Carbon::parse($user->nid_verified)->format('d-m-Y g:ia')}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $user->phone_number}}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <td>SMS Verified At</td>--}}
{{--                            <td>{{\Carbon\Carbon::parse($user->sms_verified_at)->format('d-m-Y g:ia')  }}</td>--}}
{{--                        </tr>--}}
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email}}</td>
                        </tr>
                        <tr>
                            <td>Email Verified At</td>
                            <td>{{\Carbon\Carbon::parse($user->email_verified_at)->format('d-m-Y g:ia')  }}</td>
                        </tr>
                        <tr>
                            <td>Email Verified</td>
                            <td>{{$user->email_verified_at ?'Yes' :'No'  }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a class="btn btn-primary" href="/manage-users">Back to List</a>
                                @if($user->nid_verified == null)
                                    <a class="btn btn-success" href="/manage-users/manual-verification/{{$user->id}}">Verify
                                        Manually</a>
                                @else
                                    <a class="btn btn-success" disabled>Verified</a>
                                @endif

                                @if($user->active_status == 1)
                                    <a class="btn btn-danger" href="/manage-users/block/{{$user->id}}">Block</a>
                                @else
                                    <a class="btn btn-danger" href="/manage-users/block/{{$user->id}}">Unblock</a>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
