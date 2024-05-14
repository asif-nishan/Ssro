@extends('layouts.layout')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @if(Session::has('message')) <div class="divider"> </div> @endif
    <div class="main-card mb-3 card">
        <div class="card-body col-md-12">
            <form class="" action="{{route('show_ticket_report')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="from_date">From Date</label>
                        <input style="max-width: 250px" id="from_date" name="from_date" value="{{$from_date}}"
                               type="text" class="form-control">
                        @error('from_date')
                        <em class="error invalid-feedback">{{$errors->first('from_date')}}
                        </em>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="to_date">To Date</label>
                        <input style="max-width: 250px" id="to_date" name="to_date" value="{{$to_date}}" type="text"
                               class="form-control">
                        @error('to_date')
                        <em class="error invalid-feedback">{{$errors->first('to_date')}}
                        </em>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <input id="show_report_button" type="submit" value="Show"
                               style="margin-top: 33px;min-width: 100px" class="btn btn-primary">
                    </div>
                    <!-- <div class="form-group col-md-3">
                        <input id="print"  class="btn btn-shadow btn-success" @if($tickets == null) disabled @endif type="button" style="margin-top: 33px;min-width: 100px" value="Print">
                    </div>
                </div> -->
            </form>
        </div>
    </div>
    @if(isset($tickets))
        <div class="col-lg-12">
            <div class="main-card mb-6 card">
                <div class="card-body table-responsive">

                    <h5 class="card-title"> Report</h5>
                    <table style="font-size: 11px" id="datatable" class="mb-0 table table-sm table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>ক্রমিক নং</th>
                        <th>দলিল নং</th>
                        <th>সন</th>
                        <th>দাতার নাম</th>
                        <th>গ্রহিতার নাম</th>
                        <th>বি এস খতিয়ান নং</th>
                        <th>বি এস দাগ নং</th>
                        <th>মুল্য</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $key => $item)
                            <tr>
                                <td scope="row">{{$key +1}}</td>
                                <td>{{$item->name}}</a></td>
                            <td>{{$item->date_of_issue}}</td>
                            <td>{{$item->data}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->bsk}}</td>
                            <td>{{$item->bsd}}</td>
                            <td>{{$item->price}}</td>
                                {{-- <td>
                                     <a href="{{route('ticket.edit',$item->id)}}" class="mt-2 btn btn-primary">Edit</a>
                                     --}}{{--                                <a class="mt-2 btn btn-danger">Delete</a>--}}{{--
                                 </td>--}}
                            </tr>
                        @endforeach
                        <tr>
                            
                            <th></th>
                            {{--<th></th>--}}
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
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
            $("#print").click(function () {
                var url = '/ticket-reports/download-all-tickets?fdate=' + $('#from_date').val() + '&tdate=' + $('#to_date').val();
                window.open(
                    url,
                    '_blank' // <- This is what makes it open in a new window.
                );
               // $(location).attr("href", url);
            });
        })
    </script>
@endsection

