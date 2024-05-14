<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/jpg" href="{{asset('images/prova.png')}}"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
    @yield('meta')

    <link href="/assets/main.css" rel="stylesheet">
    {{--    <link href="{{asset('assets/main.css')}}" rel="stylesheet">--}}


    @yield('css')

</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    {{--    <div class="app-header header-shadow">--}}
    <div class="app-header header-shadow bg-vicious-stance header-text-light">
        <div class="app-header__logo">
            <div class="logo-src">Sub Register Office</div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="42" class="rounded-circle"
                                             src="{{asset('assets/images/avatars/dummy.jpg')}}"
                                             alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        {{--<button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>--}}
                                        {{--                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>--}}
                                        {{--<div tabindex="-1" class="dropdown-divider"></div>--}}
                                        <a href="/logout" class="dropdown-item">Logout</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                </div>
                                <div class="widget-subheading">
                                    {{\Illuminate\Support\Facades\Auth::user()->email}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui-theme-settings">
        <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
        </button>
    </div>
    <div class="app-main">
        {{--        <div class="app-sidebar sidebar-shadow">--}}
        {{--<div class="app-sidebar sidebar-shadow bg-asteroid sidebar-text-light">--}}
        @include('layouts.sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                @if(Session::has('message'))
                    <div class="col-12">
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('message') }}
                        </div>
                    </div>
                @endif
                @isset($title)

                @endif
                @yield('content')
            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-right">

                            <ul class="nav">

                                <li class="nav-item">

                                    <a target="_blank" href="https://www.shadownicsoft.com/" class="nav-link">
                                        Maintain And Developed By Shadownicsoft
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script type="text/javascript" src="/assets/scripts/main.js"></script>--}}
<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('script')
</body>
</html>

