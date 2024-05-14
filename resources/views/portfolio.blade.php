<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login </title>
    <meta name="viewport"  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Easy Accounting Software">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" type="image/jpg" href="{{asset('images/prova.png')}}"/>
    <link href="/assets/main.css" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-plum-plate bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100 mx-auto">
                        <div class="modal-content">
                            <form action="{{url('post-login')}}" method="POST" id="logForm" class="">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <div><img class="ml-auto" style="width:100px;" src="/assets/images/logo.png"
                                                  alt=""></div>
                                        <h4 class="mt-2">
                                            <span>Please sign in to your account below.</span>
                                        </h4>
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="email"
                                                       id="exampleEmail"
                                                       placeholder="Email here..."
                                                       type="email"
                                                       value="{{$errors->first('old_email') ?? ''}}"
                                                       class="form-control @error('msg') is-invalid @enderror">
                                                @error('email')
                                                <em class="error invalid-feedback">{{$errors->first('email')}}
                                                </em>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="password"
                                                       id="examplePassword"
                                                       placeholder="Password here..."
                                                       type="password"
                                                       class="form-control @error('msg') is-invalid @enderror">
                                                @error('msg')
                                                <em class="error invalid-feedback">{{$errors->first('msg')}} </em>
                                                @enderror

                                            </div>
                                        </div>


                                    </div>
                                    {{--                                    <div class="col-md-12">--}}
                                    {{--                                        <div class="position-relative form-group">--}}
                                    {{--                                            <p class="text-danger ">{{ $errors->first('msg') }} </p>--}}
                                    {{--                                            @error('msg')--}}
                                    {{--                                            @enderror--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="position-relative form-check">
                                        <input name="check" id="exampleCheck"
                                               type="checkbox"
                                               class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                    </div>
                                    <div class="divider"></div>
                                    <h6 class="mb-0">No account? <a href="/registration" class="text-primary">Sign up
                                            now</a></h6>
                                </div>
                                <div class="modal-footer clearfix">
                                    {{--                                <div class="float-left"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a></div>--}}
                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3">Copyright © Shadownic</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/assets/scripts/main.js"></script>
</body>
</html>
