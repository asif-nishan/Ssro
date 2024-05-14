@extends('layouts.layout')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            @isset($title)
                <h5 class="card-title">{{$title}}</h5>
            @endisset
            <form  action="{{route('deposit.update', $deposit->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="position-relative form-group">
                    <label for="airline_id" class="">Airlines Name</label>
                    <select name="airline_id" class="form-control @error('airline_id') is-invalid @enderror">
                        @foreach($airlines as $item)
                            <option @if($deposit->airline_id ==$item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    {{--                    <input name="airlines" id="airlines" placeholder="" type="text" value="{{ $airlines->'airlines' }}"--}}
                    {{--                           class="form-control @error('airlines') is-invalid @enderror">--}}
                    @error('airline_id')
                    <em class="error invalid-feedback">{{$errors->first('airline_id')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="deposit_amount" class="">Deposit Amount</label>
                    <input name="deposit_amount" id="deposit_amount" placeholder="" type="number" value="{{ old('deposit_amount', $deposit->deposit_amount) }}"
                           class="form-control @error('deposit_amount') is-invalid @enderror">
                    @error('deposit_amount')
                    <em class="error invalid-feedback">{{$errors->first('deposit_amount')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="date" class="">Date</label>
                    <input name="date" id="date" placeholder="" type="date" value="{{ old('date',$deposit->date) }}"
                           class="form-control @error('date') is-invalid @enderror">
                    @error('date')
                    <em class="error invalid-feedback">{{$errors->first('date')}}
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
