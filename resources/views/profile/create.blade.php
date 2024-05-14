@extends('layouts.layout')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
{{--            @isset($title)--}}
{{--                <h5 class="card-title">{{$title}}</h5>--}}
{{--            @endisset--}}
            <form class="" action="{{route('profile.store')}}" method="post">
                {{csrf_field()}}
                
                <div class="position-relative form-group">
                    <label for="name" class="">দলিল নং</label>
                    <input name="name" id="name" placeholder="" type="text" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <em class="error invalid-feedback">{{$errors->first('name')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="date_of_issue" class="">Date of issue</label>
                    <input name="date_of_issue" id="date_of_issue" placeholder="" autocomplete="off"
                           value="{{ old('date_of_issue') }}"
                           class="form-control datepicker @error('date_of_issue') is-invalid @enderror">
                    @error('date_of_issue')
                    <em class="error invalid-feedback">{{$errors->first('date_of_issue')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="email" class="">দাতার নাম</label>
                    <input name="email" id="email" placeholder="" type="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <em class="error invalid-feedback">{{$errors->first('email')}}
                    </em>
                    @enderror
                </div>

                <div class="position-relative form-group">
                    <label for="address" class="">গ্রহিতার নাম</label>
                    <input name="address" id="address" placeholder="" type="text" value="{{ old('address') }}"
                           class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                    <em class="error invalid-feedback">{{$errors->first('address')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="bsk" class="">বি এস খতিয়ান নং</label>
                    <input name="bsk" id="bsk" placeholder="" type="text" value="{{ old('bsk') }}"
                           class="form-control @error('bsk') is-invalid @enderror">
                    @error('bsk')
                    <em class="error invalid-feedback">{{$errors->first('bsk')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="bsd" class="">বি এস দাগ নং</label>
                    <input name="bsd" id="bsd" placeholder="" type="text" value="{{ old('bsd') }}"
                           class="form-control @error('bsd') is-invalid @enderror">
                    @error('bsd')
                    <em class="error invalid-feedback">{{$errors->first('bsd')}}
                    </em>
                    @enderror
                </div>
                <div class="position-relative form-group">
                    <label for="price" class="">মুল্য</label>
                    <input name="price" id="price" placeholder="" type="number" value="{{ old('price') }}"
                           class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    <em class="error invalid-feedback">{{$errors->first('price')}}
                    </em>
                    @enderror
                </div>
                


                <div class="position-relative form-group">
                    <input type="submit" value="Create" class="mt-2 btn btn-primary">
                </div>
            </form>
        </div>
    </div>

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
         $('#date_of_issue').datepicker({
             showOtherMonths: true,
             autoclose: true,
             format: 'yy/mm/dd',
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