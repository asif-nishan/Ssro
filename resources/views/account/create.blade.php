@extends('layouts.layout')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
{{--            @isset($title)--}}
{{--                <h5 class="card-title">{{$title}}</h5>--}}
{{--            @endisset--}}
            <form class="" action="{{route('account.store')}}" method="post">
                {{csrf_field()}}


                <div class="position-relative form-group">
                    <label for="airlines" class="">Airlines Name</label>
                    <select name="airlines" class="form-control @error('airlines') is-invalid @enderror">
                        @foreach($airlines as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
{{--                    <input name="airlines" id="airlines" placeholder="" type="text" value="{{ old('airlines') }}"--}}
{{--                           class="form-control @error('airlines') is-invalid @enderror">--}}
                    @error('airlines')
                    <em class="error invalid-feedback">{{$errors->first('airlines')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="current_balance" class="">Current Balance</label>
                    <input name="current_balance" id="current_balance" placeholder="" type="number" value="{{ old('current_balance') }}"
                           class="form-control @error('current_balance') is-invalid @enderror">
                    @error('current_balance')
                    <em class="error invalid-feedback">{{$errors->first('current_balance')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="monthly_payment" class="">Monthly Payment</label>
                    <input name="monthly_payment" id="monthly_payment" placeholder="" type="number" value="{{ old('monthly_payment') }}"
                           class="form-control @error('monthly_payment') is-invalid @enderror">
                    @error('monthly_payment')
                    <em class="error invalid-feedback">{{$errors->first('monthly_payment')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="purchase_price" class="">Purchase Price</label>
                    <input name="purchase_price" id="purchase_price" placeholder="" type="number" value="{{ old('purchase_price') }}"
                           class="form-control @error('purchase_price') is-invalid @enderror">
                    @error('purchase_price')
                    <em class="error invalid-feedback">{{$errors->first('purchase_price')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="profit_from_sell" class="">Profit From Sale</label>
                    <input name="profit_from_sell" id="profit_from_sell" placeholder="" type="number" value="{{ old('profit_from_sell') }}"
                           class="form-control @error('profit_from_sell') is-invalid @enderror">
                    @error('profit_from_sell')
                    <em class="error invalid-feedback">{{$errors->first('profit_from_sell')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="bonus_amount" class="">Bonus Amount</label>
                    <input name="bonus_amount" id="bonus_amount" placeholder="" type="number" value="{{ old('bonus_amount') }}"
                           class="form-control @error('bonus_amount') is-invalid @enderror">
                    @error('bonus_amount')
                    <em class="error invalid-feedback">{{$errors->first('bonus_amount')}}
                    </em>
                    @enderror
                </div>
{{--                <div class="position-relative form-group">--}}
{{--                    <label for="rest_amount_of_current_month" class="">Rest Amount Of Current Month</label>--}}
{{--                    <input name="rest_amount_of_current_month" id="rest_amount_of_current_month" placeholder="" type="number" value="{{ old('rest_amount_of_current_month') }}"--}}
{{--                           class="form-control @error('rest_amount_of_current_month') is-invalid @enderror">--}}
{{--                    @error('rest_amount_of_current_month')--}}
{{--                    <em class="error invalid-feedback">{{$errors->first('rest_amount_of_current_month')}}--}}
{{--                    </em>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="position-relative form-group">--}}
{{--                    <label for="commission" class="">Commission</label>--}}
{{--                    <input min="0" name="commission" id="commission" placeholder="" type="number" value="0"--}}
{{--                           class="form-control @error('commission') is-invalid @enderror">--}}
{{--                    @error('commission')--}}
{{--                    <em class="error invalid-feedback">{{$errors->first('commission')}}--}}
{{--                    </em>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="position-relative form-group">--}}
{{--                    <label for="total_profit" class="">Total Profit</label>--}}
{{--                    <input name="total_profit" id="total_profit" placeholder="" type="number" value="{{ old('total_profit') }}"--}}
{{--                           class="form-control @error('total_profit') is-invalid @enderror">--}}
{{--                    @error('total_profit')--}}
{{--                    <em class="error invalid-feedback">{{$errors->first('total_profit')}}--}}
{{--                    </em>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="position-relative form-group">--}}
{{--                    <label for="pnr" class="">PNR</label>--}}
{{--                    <input name="pnr" id="pnr" placeholder="" type="text" value="{{ old('pnr') }}"--}}
{{--                           class="form-control @error('pnr') is-invalid @enderror">--}}
{{--                    @error('pnr')--}}
{{--                    <em class="error invalid-feedback">{{$errors->first('pnr')}}--}}
{{--                    </em>--}}
{{--                    @enderror--}}
{{--                </div>--}}


                <div class="position-relative form-group">
                    <input type="submit" value="Create" class="mt-2 btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
