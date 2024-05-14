@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span
                            class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                @isset($title)
                    <h5 class="card-title">{{$title}}</h5>
                @endisset
                <table style="font-size: 10px" id="datatable"
                       class="mb-0 table table-bordered text-center table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Passenger Name</th>
                        <th>Airlines</th>
                        <th>Reference</th>
                        <th style="min-width: 80px">Date of issue</th>
                        <th style="min-width: 80px">Departure</th>
                        <th>Purchase price</th>
                        <th>Profit</th>
                        <th>Commission</th>
                        <th>Total Profit</th>
                        <th>PNR</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $key => $item)
                        <tr>
                            <td scope="row">{{$key +1}}</td>
                            <td>{{$item->passenger_name}}</td>
                            <td>{{$item->airline->name}}</td>
                            <td>{{$item->profile->name}}</td>
                            <td>{{\Carbon\Carbon::parse($item->date_of_issue)->format('d-m-Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($item->departure)->format('d-m-Y')}}</td>
                            <td>{{$item->purchase_price}}</td>
                            <td>{{$item->profit}}</td>
                            <td>{{$item->commission}}</td>
                            <td>{{$item->total_profit}}</td>
                            <td>{{$item->pnr}}</td>
                            <td>
                                <a href="{{route('ticket.edit',$item->id)}}" class="mt-2 btn btn-primary">Edit</a>
                                {{--                                <a class="mt-2 btn btn-danger">Delete</a>--}}
                            </td>
                        </tr>
                    @endforeach
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
            $('#datatable').DataTable();
        });
    </script>
@endsection
