<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register | Prova Travels</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <link rel="shortcut icon" type="image/jpg" href="{{asset('images/prova.png')}}"/>
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="/assets/main.css" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-300 bg-plum-plate">
            <div class="d-flex h-300 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100">
                        <form action="{{url('post-registration')}}" method="POST" id="regForm">
                            <div class="modal-content">
                                <div class="modal-body">
                                            <div class="col-md-12  text-center"><img class="" style="width:100px;" src="/assets/images/tareq.jpg" alt=""></div>
                                    <h5 class="modal-title">
                                        <h4 class="mt-2 text-center">

                                            <span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
                                        </h4>
                                    </h5>
                                    <div class="divider row"></div>
                                    <div class="form-row">
                                        @csrf
                                        <div class="col-md-12">

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Name</label>
                                                <input name="name" id="name" type="text"
                                                       value="{{@old('name')}}"
                                                       class="form-control @error('name') is-invalid @enderror ">
                                                @error('name')
                                                <em class="error invalid-feedback">{{$errors->first('name')}}
                                                </em>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="email" class="">Email</label>
                                                <input name="email" value="{{@old('email')}}" id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                <em class="error invalid-feedback">{{$errors->first('email')}}
                                                </em>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="phone_number" class="">Phone Number</label>
                                                <input name="phone_number" id="phone_number" type="number"
                                                       value="{{@old('phone_number')}}"
                                                       class="form-control  @error('phone_number') is-invalid @enderror">
                                                @error('phone_number')
                                                <em class="error invalid-feedback">{{$errors->first('phone_number')}}
                                                </em>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="password" class="">Password</label>
                                                <input name="password" id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror">
                                                @error('password')
                                                <em class="error invalid-feedback">{{$errors->first('password')}}
                                                </em>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="password_confirmation" class="">Confirm Password</label>
                                                <input name="password_confirmation" id="password_confirmation" type="password"
                                                       class="form-control @error('confirm_password') is-invalid @enderror">
                                                @error('password_confirmation')
                                                <em class="error invalid-feedback">{{$errors->first('password_confirmation')}}
                                                </em>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="divider row"></div>
                                    <h6 class="mb-0">Already have an account? <a href="/login"
                                                                                 class="text-primary">Sign in</a> | <a
                                                href="javascript:void(0);" class="text-primary">Recover Password</a>
                                    </h6></div>
                                <div class="modal-footer d-block text-center">
                                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">
                                        Create Account
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3">Copyright © Family Pharmacy {{ now()->year }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/assets/scripts/main.js"></script>
</body>
</html>
