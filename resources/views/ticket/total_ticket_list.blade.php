@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
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
                        <input id="show_report_button" type="button"  value="Show" style="margin-top: 33px;width: 150px" class="btn btn-primary">
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
                <table style="font-size: 10px" id="datatable" class="text-center table table-sm table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Passenger Name</th>
                        <th>Airlines</th>
                        <th>Ref.</th>
                        <th>Ph. Number</th>
                        <th>No. Of Passenger</th>
                        <th style="min-width: 80px">Date of issue</th>
                        <th style="min-width: 80px">Departure</th>
                        <th style="min-width: 80px">Return Date</th>
                        <th>Airline price</th>
                        <th>Airline Profit</th>
                        <th>Passenger price</th>
                        <th>Travel Profit</th>
                        <th>Paid</th>
                        <th>Due</th>

                        <th>Commission</th>
                        <th>Total Profit</th>
                        <th>PNR</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="main_tbody">
                    @foreach($tickets as $key => $item)
                        <tr style="padding: 0px">
                            <input type="hidden" class="id" value="{{$item->id}}">
                            <td scope="row">{{$key +1}}</td>
                            <td>{{$item->passenger_name}}</td>
                            <td>{{$item->airline->name}}</td>
                            <td><a href="{{route('profile.show',$item->profile->id)}}">{{$item->profile->name}}</a></td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->number_of_passenger}}</td>
                            <td>{{\Carbon\Carbon::parse($item->date_of_issue)->format('d-m-Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($item->departure)->format('d-m-Y')}}</td>
                            <td>{{ $item->return_date !=null? \Carbon\Carbon::parse($item->return_date)->format('d-m-Y') : 'NA'}}</td>
                            <td>{{$item->airline_price}}</td>
                            <td>{{$item->airline_profit}}</td>
                            <td>{{$item->purchase_price}}</td>
                            <td>{{$item->profit}}</td>
                            <td>{{$item->paid_amount}}</td>
                            <td>{{$item->purchase_price-$item->paid_amount}}</td>
                            <td>{{$item->commission}}</td>
                            <td>{{$item->total_profit}}</td>
                            <td>{{$item->pnr}}</td>
                            <td style="min-width: 220px">
                                <a href="{{route('ticket.show',$item->id)}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-eye"></i></a>
                                <a target="_blank" href="{{route('ticket.download',$item->id)}}"
                                   class="btn btn-sm btn-warning"><i
                                        class="fa fa-print"></i></a>
                                <a href="{{route('ticket.edit',$item->id)}}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-pen"></i></a>
                                @if($item->refund)
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger disabled">Refunded</a>
                                @else
                                    <a href="{{route('ticket.refund',$item->id)}}"
                                       class="btn btn-sm btn-danger">Refund</a>
                                @endif
                                <a href="javascript:void(0)">
                                    <form style="width: 20px" action="{{route('ticket.destroy', $item->id)}}"
                                          method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Total</th>
                        <th colspan="8"></th>
                        <th>{{$tickets->sum('airline_price')}}</th>
                        <th>{{$tickets->sum('airline_profit')}}</th>
                        <th>{{$tickets->sum('purchase_price')}}</th>
                        <th>{{$tickets->sum('profit')}}</th>
                        <th>{{$tickets->sum('paid_amount')}}</th>
                        <th>{{($tickets->sum('purchase_price') - $tickets->sum('paid_amount'))}}</th>
                        <th>{{$tickets->sum('commission')}}</th>
                        <th>{{$tickets->sum('total_profit')}}</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            //$('#datatable').DataTable();
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
                var url = '/total-tickets?fdate=' + $('#fdate').val() + '&tdate=' + $('#tdate').val();
                $(location).attr("href", url);
            });
            $('.refund_btn').click(function () {
                let button = $(this);
                let id = $(this).closest('tr').find('.id').val();
                Swal.fire({
                    title: "Warning!",
                    text: "Are you sure you want to refund?",
                    type: "warning",
                    showCancelButton: true,
                    //useRejections: true,
                    confirmButtonText: "Refund",
                    cancelButtonText: "Cancel",
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: '/tickets/refund/' + id,
                            cache: false,
                            success: function (objects) {
                                if (objects) {
                                    button.attr("disabled", "disabled");
                                    Swal.fire(
                                        'Success!',
                                        'Successful!',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Failed!',
                                        'Failed To Do the operation',
                                        'danger'
                                    )
                                }
                            }
                        });
                    } else if (result.dismiss == 'cancel') {
                        $(location).attr("href", '/ticket');
                    }
                });

            });
        });
    </script>
@endsection
