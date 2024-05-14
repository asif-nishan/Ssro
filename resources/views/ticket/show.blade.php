@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body">
                @isset($title)
                    <h5 class="card-title">{{$title}}</h5>
                @endisset
                <div class="table-responsive">
                    <table style="" id="example"
                           class="table table-sm table-hover table-striped  text-center">
                        <tbody>
                        <tr>
                            <td>দলিল নং</td>
                            <td>{{ $ticket->name }}</td>
                        </tr>
                        <tr>
                            <td>সন</td>
                            <td>{{ $ticket->date_of_issue }}</td>
                        </tr>
                        <tr>
                            <td>দাতার নাম</td>
                            <td>{{ $ticket->data }}</td>
                        </tr>
                        <tr>
                            <td>গ্রহিতার নাম</td>
                            <td>{{ $ticket->address }}</td>
                        </tr>
                        <tr>
                            <td>বি এস খতিয়ান নং</td>
                            <td>{{ $ticket->bsk }}</td>
                        </tr>
                        <tr>
                            <td>বি এস দাগ নং</td>
                            <td>{{ $ticket->bsd }}</td>
                        </tr>
                        <tr>
                            <td>মুল্য</td>
                            <td>{{ $ticket->price }}</td>
                        </tr>
                        
                        @if(auth()->user()->hasRole('admin'))
                            <tr>
                                <td>Created By</td>
                                <td>{{$ticket->createdBy !=null ? $ticket->createdBy->name :'NA'  }}</td>
                            </tr>
                            <tr>
                                <td>Created On</td>
                                <td>{{\Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y g:ia')}}</td>
                            </tr>
                            <tr>
                                <td>Last Updated By</td>
                                <td>{{$ticket->lastUpdatedBy !=null ? $ticket->lastUpdatedBy->name :'NA'  }}</td>
                            </tr>
                            <tr>
                                <td>Last Updated On</td>
                                <td>{{\Carbon\Carbon::parse($ticket->updated_at)->format('d-m-Y g:ia')}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2" class="text-center">
                                <a class="btn btn-primary" href="{{route('ticket.edit',$ticket->id)}}">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
