@extends('layouts.layout')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            @isset($title)
                <h5 class="card-title">{{$title}}</h5>
            @endisset
            <form class="" action="{{route('account-heads.store')}}" method="post">
                {{csrf_field()}}
                <div class="position-relative form-group">
                    <label for="code" class="">Code</label>
                    <input name="code" id="code" placeholder="" type="text" value="{{ old('code') }}"
                           class="form-control @error('code') is-invalid @enderror">
                    @error('code')
                    <em class="error invalid-feedback">{{$errors->first('code')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="name" class="">Title</label>
                    <input name="name" id="name" placeholder="" type="text" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <em class="error invalid-feedback">{{$errors->first('name')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="type" class="">Type</label>
                    <input name="type" id="type" placeholder="" type="text" value="{{ old('type') }}"
                           class="form-control @error('type') is-invalid @enderror">
                    @error('type')
                    <em class="error invalid-feedback">{{$errors->first('type')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <input type="submit" value="Create" class="mt-2 btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection