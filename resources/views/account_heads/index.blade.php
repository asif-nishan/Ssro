@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body table-responsive">
                @isset($title)
                    <h5 class="card-title">{{$title}}</h5>
                @endisset
                <table id="datatable" class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Account Head Name</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accountHeads as $key=> $accountHead)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>{{$accountHead->name}}</td>
                            <td>{{$accountHead->code}}</td>
                            <td>{{$accountHead->type}}</td>
                            <td>
                                <a href="{{route('account-heads.edit',$accountHead->id)}}" class="mt-2 btn btn-primary">Edit</a>
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
