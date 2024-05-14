@extends('layouts.layout')
@section('css')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            {{--            @isset($title)--}}
            {{--                <h5 class="card-title">{{$title}}</h5>--}}
            {{--            @endisset--}}
            <form class="" action="{{route('ticket.update', $ticket->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="position-relative form-group">
                    <label for="name" class="">দলিল নং</label>
                    <input name="name" id="name" placeholder="" type="text"
                           value="{{  old('name' , $ticket->name) }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <em class="error invalid-feedback">{{$errors->first('name')}}
                    </em>
                    @enderror
                </div>

               

                <div class="position-relative form-group">
                    <label for="date_of_issue" class="">সন</label>
                    <input name="date_of_issue" id="date_of_issue" placeholder="" type="text" autocomplete="off"
                           value="{{ old('date_of_issue',$ticket->date_of_issue )}}"
                           class="form-control @error('date_of_issue') is-invalid @enderror">
                    @error('date_of_issue')
                    <em class="error invalid-feedback">{{$errors->first('date_of_issue')}}
                    </em>
                    @enderror
                </div>
                
                
                <div class="position-relative form-group">
                    <label for="data" class="">দাতার নাম</label>
                    <input name="data" id="data" placeholder="" type="text"
                           value="{{   old('data' ,$ticket->data) }}"
                           class="form-control @error('data') is-invalid @enderror">
                    @error('data')
                    <em class="error invalid-feedback">{{$errors->first('data')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="address" class="">গ্রহিতার নাম</label>
                    <input name="address" id="address" placeholder="" type="text"
                           value="{{   old('address' ,$ticket->address) }}"
                           class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                    <em class="error invalid-feedback">{{$errors->first('address')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="bsk" class="">বি এস খতিয়ান নং</label>
                    <input name="bsk" id="bsk" placeholder="" type="text"
                           value="{{   old('bsk' ,$ticket->bsk) }}"
                           class="form-control @error('bsk') is-invalid @enderror">
                    @error('bsk')
                    <em class="error invalid-feedback">{{$errors->first('bsk')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="bsd" class="">বি এস দাগ নং</label>
                    <input name="bsd" id="bsd" placeholder="" type="text"
                           value="{{   old('bsd' ,$ticket->bsd) }}"
                           class="form-control @error('bsd') is-invalid @enderror">
                    @error('bsd')
                    <em class="error invalid-feedback">{{$errors->first('bsd')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="price" class="">মূল্য</label>
                    <input name="price" id="price" placeholder="" type="text"
                           value="{{   old('price' ,$ticket->price) }}"
                           class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    <em class="error invalid-feedback">{{$errors->first('price')}}
                    </em>
                    @enderror
                </div>
                
                {{--                <div class="position-relative form-group">--}}
                {{--                    <label for="total_profit" class="">Total Profit</label>--}}
                {{--                    <input name="total_profit" id="total_profit" placeholder="" type="number" value="{{ $ticket->total_profit }}"--}}
                {{--                           class="form-control @error('total_profit') is-invalid @enderror">--}}
                {{--                    @error('total_profit')--}}
                {{--                    <em class="error invalid-feedback">{{$errors->first('total_profit')}}--}}
                {{--                    </em>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}
                

                <div class="position-relative form-group">
                    <input type="submit" value="Update" class="mt-2 btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('#departure').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
            $('#date_of_issues').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'yyyy-mm-dd',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
            $('#return_date').datepicker({
                showOtherMonths: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                showRightIcon: false,
                modal: true,
                header: true,
                uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons'
            });
        })
    </script>
@endsection
