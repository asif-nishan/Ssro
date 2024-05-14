@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="main-card mb-6 card">
            <div class="card-body">
                @isset($title)
                    <h5 class="card-title text-center">{{$title}}</h5>
                @endisset
                <div class="table-responsive">
                    <table style="" id="example"
                           class="table table-sm table-hover table-striped  text-center">
                        <tbody>
                        <tr>
                            <td>Passenger Name</td>
                            <td>{{ $ticket->passenger_name }}</td>
                        </tr>
                        <tr>
                            <td>Airline</td>
                            <td>{{ $ticket->airline->name }}</td>
                        </tr>
                        <tr>
                            <td>Reference</td>
                            <td>{{ $ticket->profile->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $ticket->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Number Of Passenger</td>
                            <td>{{ $ticket->number_of_passenger }}</td>
                        </tr>
                        <tr>
                            <td>Date of issue</td>
                            <td>{{ $ticket->date_of_issue }}</td>
                        </tr>
                        <tr>
                            <td>Departure</td>
                            <td>{{ $ticket->departure }}</td>
                        </tr>
                        <tr>
                            <td>Purchase Price</td>
                            <td>{{ $ticket->purchase_price }}</td>
                        </tr>
                        <tr>
                            <td>Paid Amount</td>
                            <td>{{ $ticket->paid_amount }}</td>
                        </tr>
                        <tr>
                            <td>Profit</td>
                            <td>{{ $ticket->profit }}</td>
                        </tr>
                        <tr>
                            <td>Commission</td>
                            <td>{{ $ticket->commission }}</td>
                        </tr>

                        <tr>
                            <td>PNR</td>
                            <td>{{ $ticket->pnr }}</td>
                        </tr>

                        <tr>
                            <td>Refund Status</td>
                            <td>{{$ticket->refund ?'Refunded' :'NA'  }}</td>
                        </tr>
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
                        <tr class="text-center">
                            <td>Refund Amount</td>
                            <td>
                                <table style="width: 300px">
                                    <tr>
                                        <form action="{{route('ticket.refundPost',$ticket->id)}}">
                                            {{csrf_field()}}
                                            <td>
                                                <input name="refund_amount" value="0" class="form-control" type="text"></td>
                                            <td style="padding-left: 0px;">
                                                <button type="submit" class="btn btn-primary">Refund</button>
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
