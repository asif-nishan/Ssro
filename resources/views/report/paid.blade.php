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
                <h5 class="mb-2">Tickets of <b>{{$profile->name}}</b></h5>
                <table id="datatable" class="table table-sm table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        {{--<th>Name</th>--}}
                        <th>Airlines</th>
                        {{--<th>Departure Date</th>--}}
                        <th>Date of Issue</th>
                        <th>PNR</th>
                        <th>Purchase Price</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Action</th>
                        <!-- <th>Address</th>
                        <th>Actions</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profile->tickets as $key => $item)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            {{--<td>{{$profile->name}}</td>--}}
                            <td>{{$item->airline->name}}</td>
                            {{--<td>{{$item->departure}}</td>--}}
                            <td>{{\Carbon\Carbon::parse($item->date_of_issue)->format('d-m-Y')}}</td>
                            <td>{{$item->pnr}}</td>
                            <td>{{$item->purchase_price}}</td>
                            <td>{{$item->paid_amount}}</td>
                            <td>{{$item->purchase_price-$item->paid_amount - $item->commission}}</td>

                            <td>
                                <a href="" class="mt-2 {{$item->purchase_price - $item->commission == $item->paid_amount?'btn btn-success':'btn btn-danger'}} ">
                                    {{$item->purchase_price - $item->commission==$item->paid_amount?'Paid':'Unpaid'}}
                                </a>
                                @if($item->purchase_price - $item->commission!=$item->paid_amount)

                                    <a href="{{route('ticket.edit', $item->id)}}" class="mt-2 btn btn-primary">Pay

                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th>{{$profile->tickets->sum('paid_amount')}}</th>
                        <th>{{$profile->tickets->sum('purchase_price') - $profile->tickets->sum('paid_amount') - $profile->tickets->sum('commission')}}</th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            //$('#datatable').DataTable();
        });
    </script>
@endsection
