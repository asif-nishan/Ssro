@extends('layouts.layout')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon pe-7s-bookmarks"></i>
                </div>
                <div> @isset($title)
                        {{$title}}
                    @endisset
                    {{--                        <div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.</div>--}}
                </div>
            </div>
            <div class="page-title-actions">
                <button @if($tickets == null) disabled @endif id="print" class="btn-shadow btn btn-info"><span
                        class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-print fa-w-20"></i></span>Print
                </button>
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
                    <div class="form-group">
                        {{--<label for="airline_id">Airlines</label>--}}
                        <select class="form-control" name="airline_id" id="airline_id">
                            @foreach($airlines as $key => $item)
                                <option @if($airline_id == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->name}}</option>
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
                    <button id="show_report_button" class="btn btn-success">Show</button>
                    <button id="edit_report_button" class="btn btn-primary">Go to Edit</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <table class="col-12">
            <tbody>
            <tr>
                <td class="align-content-center">
                    {{-- <input type="hidden" id="prev_month"
                            value="{{$prev_month}}">
                     <input type="hidden" id="next_month"
                            value="{{$next_month}}">--}}


                </td>
            </tr>
            <tr>
                <td class="text-left">

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
                        {{--<th>Date of issue</th>--}}
                        <th>Departure</th>
                        <th>Return</th>
                        {{-- <th>Purchase price</th>--}}
                        <th>PNR</th>
                        <th>Point</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($tickets != null)
                        @foreach($tickets as $key => $item)
                            <tr>
                                <td scope="row">{{$key +1}}</td>
                                {{--<td>{{\Carbon\Carbon::parse($item->date_of_issue)->format('d-m-Y')}}</td>--}}
                                @if(\Carbon\Carbon::parse($item->departure)->month == $date->month)
                                    <td>{{\Carbon\Carbon::parse($item->departure)->format('d-m-Y')}}</td>
                                @else
                                    <td>NA</td>
                                @endif
                                @if( $item ->return_date != null )
                                    @if(\Carbon\Carbon::parse($item->return_date)->month == $date->month)
                                        <td>{{\Carbon\Carbon::parse($item->return_date)->format('d-m-Y')}}</td>
                                    @else
                                        <td>NA</td>
                                    @endif
                                @else
                                    <td>NA</td>
                                @endif
                                {{--<td>{{$item->purchase_price}}</td>--}}
                                <td>{{$item->pnr}}</td>
                                <td>{{$item->point != null ? $item->point : 0}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No data found</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="4" class="text-right"><b>Total</b></td>
                        <td colspan="1">{{$tickets != null ? $tickets->sum('point') : 0}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#fdate').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
            $('#tdate').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
            $("#show_report_button").click(function () {
                var url = '/reports/points?airline_id=' + $('#airline_id').val() + '&month=' + $('#month').val() + '&year=' + $('#year').val();
                $(location).attr("href", url);
            });
            $("#edit_report_button").click(function () {
                var url = '/tickets/point?airline_id=' + $('#airline_id').val() + '&month=' + $('#month').val() + '&year=' + $('#year').val();
                $(location).attr("href", url);
            });
            $("#prev_button").click(function () {
                var date = $("#prev_month").val();
                var res = date.split("-");
                var year = res[0];
                var month = res[1];
                var url = '/reports/points?airline_id=' + $('#airline_id').val() + '&month=' + month + '&year=' + year;
                $(location).attr("href", url);
            });
            $("#next_button").click(function () {
                var date = $("#next_month").val();
                var res = date.split("-");
                var year = res[0];
                var month = res[1];
                var url = '/reports/points?airline_id=' + $('#airline_id').val() + '&month=' + month + '&year=' + year;
                $(location).attr("href", url);
            });
            $("#print").click(function () {
                var url = '/reports/download/points?airline_id=' + $('#airline_id').val() + '&month=' + $('#month').val() + '&year=' + $('#year').val();
                $(location).attr("href", url);
            });
        });
    </script>
@endsection
