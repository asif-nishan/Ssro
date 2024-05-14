@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    @isset($title)
                        <h5 class="card-title">{{$title}}</h5>
                    @endisset
                    <form class="" action="" method="post">w
                        <h6 class="card-title">User Information</h6>
                        <div class="position-relative form-group">
                            <label for="parcel_name" class="">First Name</label>
                            <input disabled name="parcel_name" id="parcel_name" placeholder="" type="text"
                                   value="{{ $user->first_name }}"
                                   class="form-control">

                        </div>
                        <div class="position-relative form-group">
                            <label for="parcel_name" class="">Last Name</label>
                            <input disabled name="parcel_name" id="parcel_name" placeholder="" type="text"
                                   value="{{ $user->last_name }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="parcel_name" class="">Company Name</label>
                            <input disabled name="parcel_name" id="parcel_name" placeholder="" type="text"
                                   value="{{ $user->company_name }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="parcel_name" class="">DOB</label>
                            <input disabled name="parcel_name" id="parcel_name" placeholder="" type="text"
                                   value="{{ $user->date_of_birth }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="parcel_name" class="">User Type</label>
                            <input disabled name="parcel_name" id="parcel_name" placeholder="" type="text"
                                   value="{{ $user->userType->name }}"
                                   class="form-control">
                        </div>

                        <div class="position-relative form-group">
                            <label for="admin_notes" class="">ID Verified by</label>
                            <input disabled name="admin_notes" id="admin_notes" placeholder="" type="text"
                                   value="{{ $user->userVerificationType->name }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="admin_notes" class="">NID/PASS/DL</label>
                            <input disabled name="admin_notes" id="admin_notes" placeholder="" type="text"
                                   value="{{ $user->nid_number }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="email" class="">NID/Pass/DL Verified</label>
                            <input disabled name="email" id="email" placeholder="" type="text"
                                   value="{{ $user->nid_verified }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="phone_number" class="">Phone Number</label>
                            <input disabled name="phone_number" id="phone_number" placeholder="" type="text"
                                   value="{{ $user->phone_number }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="phone_number" class="">SMS Verified At</label>
                            <input disabled name="phone_number" id="phone_number" placeholder="" type="text"
                                   value="{{\Carbon\Carbon::parse($user->sms_verified_at)->format('d-m-Y g:ia')  }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="email" class="">Email</label>
                            <input disabled name="email" id="email" placeholder="" type="text"
                                   value="{{ $user->email }}"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="phone_number" class="">Email Verified At</label>
                            <input disabled name="phone_number" id="phone_number" placeholder="" type="text"
                                   value="{{\Carbon\Carbon::parse($user->email_verified_at)->format('d-m-Y g:ia')  }}"
                                   class="form-control">
                        </div>

                        <div>
                            <a class="btn btn-primary" href="/manage-users">Back to List</a>
                            @if($user->nid_verified == null)
                                <a class="btn btn-success" href="/manage-users/manual-verification/{{$user->id}}">Verify
                                    Manually</a>
                            @else
                                <a class="btn btn-success" disabled>Verified</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
