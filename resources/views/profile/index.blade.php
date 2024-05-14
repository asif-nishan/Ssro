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
                <h5>Profile List</h5>
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
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $key => $item)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>{{$item->name}}</a></td>
                            <td>{{$item->phoneNumber}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->bsk}}</td>
                            <td>{{$item->bsd}}</td>
                            <td>{{$item->price}}</td>
                            
                            <td class="text-center">
                                <a href="{{route('profile.edit',$item->id)}}" class="btn btn-sm btn-primary">Edit</a>
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
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });

    </script>
@endsection

