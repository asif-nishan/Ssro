@extends('layouts.layout')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @if(Session::has('message'))
        <div class="divider">
        </div>
    @endif

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Dashboard
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4">

            <form class="" action="{{route('show_account_report')}}" method="post">
                {{csrf_field()}}


                <div class="position-relative form-group">
                    <label for="from_date" class="">From Date</label>
                    <input name="from_date" id="from_date" placeholder="" autocomplete="off" value="{{ old('from_date') }}"
                           class="form-control @error('from_date') is-invalid @enderror">
                    @error('from_date')
                    <em class="error invalid-feedback">{{$errors->first('from_date')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="to_date" class="">To Date</label>
                    <input name="to_date" id="to_date" placeholder="" autocomplete="off" value="{{ old('to_date') }}"
                           class="form-control @error('to_date') is-invalid @enderror">
                    @error('to_date')
                    <em class="error invalid-feedback">{{$errors->first('to_date')}}
                    </em>
                    @enderror
                </div>


                <div class="position-relative form-group">
                    <input type="submit" value="Show Report" class="mt-2 btn btn-primary">
                </div>
            </form>

        </div>
        @if(isset($accounts))
            <div class="col-md-12">
                <table id="datatable" class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Airlines Name</th>
                        <th>Current Balance</th>
                        <th>Monthly Payment</th>
                        <th>Purchase Price</th>
                        <th>Profit From Sell</th>
                        <th>Bonus Amount</th>
                        <th>Rest Amount Of Current Month</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts as $key => $item)
                        <tr>
                            <th scope="row">{{$key +1}}</th>

                            <td>{{$item->airlines}}</td>
                            <td>{{$item->current_balance}}</td>
                            <td>{{$item->monthly_payment}}</td>
                            <td>{{$item->purchase_price}}</td>
                            <td>{{$item->profit_from_sell}}</td>
                            <td>{{$item->bonus_amount}}</td>
                            <td>{{$item->rest_amount_of_current_month}}</td>

                            <td>
                                <a href="{{route('account.edit',$item->id)}}" class="mt-2 btn btn-primary">Edit</a>
                                {{--                                <a class="mt-2 btn btn-danger">Delete</a>--}}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>{{$total}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>


    </div>

    </div>
@endsection

@section('script')

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#from_date').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
            $('#to_date').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
        })
    </script>
@endsection




