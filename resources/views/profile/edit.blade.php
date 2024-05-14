@extends('layouts.layout')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            {{--            @isset($title)--}}
            {{--                <h5 class="card-title">{{$title}}</h5>--}}
            {{--            @endisset--}}
            <form class="" action="{{route('profile.update', $profile->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="position-relative form-group">
                    <label for="name" class="">name</label>
                    <input name="name" id="name" placeholder="" type="text" value="{{ $profile->name }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <em class="error invalid-feedback">{{$errors->first('name')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="phoneNumber" class="">phoneNumber</label>
                    <input name="phoneNumber" id="phoneNumber" placeholder="" type="number" value="{{ $profile->phoneNumber }}"
                           class="form-control @error('phoneNumber') is-invalid @enderror">
                    @error('phoneNumber')
                    <em class="error invalid-feedback">{{$errors->first('phoneNumber')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="email" class="">email</label>
                    <input name="email" id="email" placeholder="" type="email" value="{{ $profile->email }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <em class="error invalid-feedback">{{$errors->first('email')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="address" class="">address</label>
                    <input name="address" id="address" placeholder="" type="text" value="{{ $profile->address }}"
                           class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                    <em class="error invalid-feedback">{{$errors->first('address')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <input type="submit" value="Update" class="mt-2 btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
