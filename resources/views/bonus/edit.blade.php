@extends('layouts.layout')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            {{--            @isset($title)--}}
            {{--                <h5 class="card-title">{{$title}}</h5>--}}
            {{--            @endisset--}}
            <form class="" action="{{route('bonuses.update', $bonus->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="position-relative form-group">
                    <label for="airline_id" class="">Airlines Name</label>
                    <select name="airline_id" class="form-control @error('airline_id') is-invalid @enderror">
                        @foreach($airlines as $item)
                            <option @if($bonus->airline_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
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
                    <label for="bonus_amount" class="">Bonus Amount</label>
                    <input name="bonus_amount" id="bonus_amount" placeholder="" type="number" value="{{  old('bonus_amount',$bonus->bonus_amount)  }}"
                           class="form-control @error('bonus_amount') is-invalid @enderror">
                    @error('bonus_amount')
                    <em class="error invalid-feedback">{{$errors->first('bonus_amount')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="date" class="">Date</label>
                    <input name="date" id="date" placeholder="" type="date" value="{{  old('date',$bonus->date) }}"
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
