@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
            {{--<div class="page-title-actions">
                <button @if($tickets == null) disabled @endif id="print" class="btn-shadow btn btn-info">  <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-print fa-w-20"></i></span>Print</button>
            </div>--}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body col-md-12">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="fdate">From Date</label>
                        <input style="max-width: 250px" id="fdate" name="fdate" value="{{$fdate}}" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tdate">To Date</label>
                        <input style="max-width: 250px" id="tdate" name="tdate" value="{{$tdate}}" type="text" class="form-control">
                    </div>
                    {{--<div class="form-group col-md-3">
                        <label for="airline_id">Airlines</label>
                        <select style="max-width: 250px" class="form-control" name="airline_id" id="airline_id">
                            @foreach($airlines as $key => $item)
                                <option @if($airline_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="form-group col-md-3">
                        <input id="show_report_button"  type="button" value="Show" style="margin-top: 33px;min-width: 100px" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span
                            class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                    @isset($title)
                        <h5 class="card-title">{{$title}}</h5>
                    @endisset
                <table id="datatable" class="mb-0 table table-bordered  table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Airlines</th>
                        <th>Deposit Amount</th>
                        <th>Date</th>
                        <th>Created By</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $key => $item)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>{{$item->airline->name}}</td>
                            <td>{{$item->deposit_amount}}</td>
                            <td>{{\Carbon\Carbon::parse($item->date)->format('d-m-Y')}}</td>
                            <td>{{$item->createdBy->name}}</td>


                            <td>
                                {{--                                <a class="mt-2 btn btn-danger">Delete</a>--}}
                                <form class="" action="{{route('deposit.destroy', $item->id)}}" method="post">
                                    {{csrf_field()}}
                                    <a href="{{route('deposit.edit',$item->id)}}" class="mt-2 btn btn-primary">Edit</a>
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="mt-2 btn btn-danger">Delete
                                    </button>
                                </form>
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
                var url = '/deposit?fdate=' + $('#fdate').val() + '&tdate=' + $('#tdate').val();
                $(location).attr("href", url);
            });
            $('#datatable').DataTable();
        });
    </script>
@endsection
