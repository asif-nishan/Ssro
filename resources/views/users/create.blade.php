@extends('layouts.layout')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            @isset($title)
                <h5 class="card-title">{{$title}}</h5>
            @endisset
            <form class="" action="{{route('users.store')}}" method="post">
                {{csrf_field()}}

                <div class="position-relative form-group">
                    <label for="name" class="">Name</label>
                    <input name="name" id="name" placeholder="" type="text" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <em class="error invalid-feedback">{{$errors->first('name')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="email" class="">Email</label>
                    <input name="email" id="email" placeholder="" type="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <em class="error invalid-feedback">{{$errors->first('email')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="phone_number" class="">Phone Number</label>
                    <input name="phone_number" id="phone_number" placeholder="" type="text"
                           value="{{ old('phone_number') }}"
                           class="form-control @error('phone_number') is-invalid @enderror">
                    @error('phone_number')
                    <em class="error invalid-feedback">{{$errors->first('phone_number')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="password" class="">Password</label>
                    <input name="password" id="password" placeholder="" type="text" autocomplete="off"
                           value="{{ old('password') }}"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <em class="error invalid-feedback">{{$errors->first('password')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="password_confirmation" class="">Password Confirmation</label>
                    <input name="password_confirmation" id="password_confirmation" required="required" placeholder=""
                           type="text" autocomplete="off"
                           value="{{ old('password_confirmation') }}"
                           class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <em class="error invalid-feedback">{{$errors->first('password_confirmation')}}</em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <input type="submit" value="Create" class="mt-2 btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            jQuery(function () {
                jQuery(".datepicker").datepicker({}).attr('readonly', 'readonly');
            });

            $('#datepicker1').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });

        });
    </script>

@endsection
