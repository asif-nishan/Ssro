@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon pe-7s-bookmarks"></i>
                </div>
                <div> @isset($title)
                        {{$title}} For {{$date->monthName}} | {{$date->year}}
                    @endisset
                    {{--                        <div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.</div>--}}
                </div>
            </div>
            <div class="page-title-actions">
                <a target="_blank" href="/reports/download/monthly?year={{$date->year}}&month={{$date->month}} "
                   class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-print fa-w-20"></i></span>Print
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="col-12">
            <tbody>
            <tr>
                <td style="max-width: 50px" class="text-right">
                    <a href="#" id="prev_button" class="btn-lg" data-original-title="Previous Month">
                        <i class="fa fa-angle-double-left fa-lg text-default"></i>
                    </a>
                </td>
                <td>
                    <input type="hidden" id="prev_month"
                           value="{{$prev_month}}">
                    <input type="hidden" id="next_month"
                           value="{{$next_month}}">
                    <div class="form-group">
                        <select class="form-control" name="monthpicker" id="month">
                            @foreach($months as $key => $month)
                                @if($currentMonth == $key )
                                    <option selected value="{{$key}}">{{$month}}</option>
                                @else
                                    <option value="{{$key}}">{{$month}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="monthpicker" id="year">
                            @foreach($years as $year)
                                @if($currentYear ==$year )
                                    <option selected value="{{$year}}">{{$year}}</option>
                                @else
                                    <option value="{{$year}}">{{$year}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </td>
                <td style="max-width: 50px" class="text-left">
                    <a href="#" id="next_button" class="btn-lg"
                       data-original-title="Next Month"><i
                            class="fa fa-angle-double-right fa-lg text-default"></i></a>
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="3">
                    <button id="show_report_button" class="btn btn-primary">Show</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span
                            class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                <table id="datatable" class="mb-0 table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Airlines Name</th>
                        <th>Previous Balance</th>
                        <th>Total Deposit</th>
                        <th>Total Airline Sales</th>
                        <th>Total Airline Profit</th>
                        <th>Total Bonus</th>
                        <th>Current Balance Of Month</th>
                        <th>Total Travel Sales</th>
                        <th>Total Travel Profit</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($airlines as $key => $item)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td><b>{{$item->name}}</b></td>
                            <td>{{$item->getPreviousMonthBalance}}</td>
                            <td>{{$item->total_deposit}}</td>
                            <td>{{$item->total_airline_price}}</td>
                            <td>{{$item->total_airline_profit}}</td>
                            <td>{{$item->total_bonus}}</td>
                            <td> <b>{{$item->currentBalance}}</b></td>
                            <td>{{$item->total_ticket_price}}</td>
                            <td>{{$item->total_profit}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function () {
            // $('#datatable').DataTable();
            $("#show_report_button").click(function () {
                var url = '/reports/monthly?month=' + $('#month').val() + '&year=' + $('#year').val();
                $(location).attr("href", url);
            });
            $("#prev_button").click(function () {
                var date = $("#prev_month").val();
                var res = date.split("-");
                var year = res[0];
                var month = res[1];
                var url = '/reports/monthly?month=' + month + '&year=' + year;
                $(location).attr("href", url);
            });
            $("#next_button").click(function () {
                var date = $("#next_month").val();
                var res = date.split("-");
                var year = res[0];
                var month = res[1];
                var url = '/reports/monthly?month=' + month + '&year=' + year;
                $(location).attr("href", url);
            });
        });
    </script>
@endsection
