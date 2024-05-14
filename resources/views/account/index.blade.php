@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                <table id="datatable" class="mb-0 table table-bordered table-striped">
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
                        <th>Action</th>
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

                                <form  action="{{route('account.destroy', $item->id)}}"
                                       method="post">
                                    {{csrf_field()}}
                                    <a href="{{route('account.edit',$item->id)}}" class="mt-2 btn btn-sm btn-primary">Edit</a>
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-sm btn-danger mt-2">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="5">Total</th>
                        <th>{{$total}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
