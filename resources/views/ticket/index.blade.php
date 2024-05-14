@extends('layouts.layout')

@section('css')
    <style>
        table td {
            padding: 0px;
            color: #0b0b0b;
            font-size: medium; /* Adjusted font size to medium */
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        <em>{!! session('flash_message') !!}</em>
                    </div>
                @endif

                @isset($title)
                    <h5 class="card-title">{{$title}}</h5>
                @endisset

                <!-- <div class="mb-3">
                    <button id="export-excel" class="btn btn-primary">Export to Excel</button>
                </div> -->

                <table id="datatable" class="table table-sm table-bordered table-striped">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $key => $item)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->date_of_issue}}</td>
                                <td>{{$item->data}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->bsk}}</td>
                                <td>{{$item->bsd}}</td>
                                <td>{{$item->price}}</td>
                                <td style="min-width: 100px">
                                    <a href="{{route('ticket.show',$item->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('ticket.edit',$item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                   
                                    <form style="display: inline-block;" action="{{route('ticket.destroy', $item->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                "dom": 'Bfrtip',
                "buttons": [
                    'excelHtml5'
                ]
            });

            $('#export-excel').click(function() {
                $('#datatable').DataTable().button('.buttons-excel').trigger();
            });
        });
    </script>
@endsection
