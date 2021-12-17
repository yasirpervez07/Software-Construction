@php
$devicecheck = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile'));

@endphp

@if ($devicecheck == 1)

    <!DOCTYPE html>
    <html lang="en">

    <!-- Mirrored from designing-world.com/affan-1.2.0/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Aug 2021 18:06:18 GMT -->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Affan - PWA Mobile HTML Template">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#0134d4">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title -->
        <title>Affan - PWA Mobile HTML Template</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
            rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
        <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/ion.rangeSlider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend2mob/css/apexcharts.css') }}">
        @livewireStyles
        <!-- Core Stylesheet-->
        <link rel="stylesheet" href="{{ asset('frontend2mob/app.css') }}">
        <!-- Web App Manifest-->
        <link rel="manifest" href="{{ asset('mix-manifest.json') }}">
    </head>

    <body>
        <!-- Preloader -->

        <!-- Internet Connection Status -->
        <!-- # This code for showing internet connection status -->
        <div class="internet-connection-status" id="internetStatus"></div>
        <!-- Back Button -->
        <div class="header-area" id="headerArea">
            <div class="container">
                <div
                    class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                    <!-- Logo Wrapper-->
                    <div class="logo-wrapper">
                        <a href="page-home.html">
                            <img src="{{ asset('frontend2mob/img/icons/ACoding.png') }}" alt="">
                        </a>
                    </div>

                    @if (isset($title))
                        <div class="page-heading">
                            <h6 class="mb-0">{{ $title }}</h6>
                        </div>
                    @endif
                    <!-- Navbar Toggler-->
                    <div class="navbar--toggler" id="affanNavbarToggler">
                        <span class="d-block"></span>
                        <span class="d-block"></span>
                        <span class="d-block"></span>
                    </div>
                </div>
                <!-- # Header Five Layout End-->
            </div>
        </div>

        <livewire:layouts.sidenav />

        <!-- Login Wrapper Area -->
        <div class="login-wrapper d-flex align-items-center justify-content-center">
            <div class="custom-container">
                <div class="text-center px-4"><img class="login-intro-img"
                        src="{{ asset('frontend2mob/img/bg-img/36.png') }}" alt=""></div>

                <!-- Register Form -->
                <div class="register-form mt-4">
                    <h6 class="mb-3 text-center">Log in to continue.</h6>
                    <form method="post" action="{{ route('login') }}">

                        @csrf
                        <div class="form-group">
                            <input class="form-control" name="email" type="text" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" type="password" placeholder="Enter Password">
                        </div>
                        @if ($errors->any())
                            <div class="divider divider-center-icon border-danger"><i class="fa fa-cog"></i></div>
                            <div class="toast custom-toast-1 toast-danger mb-2 fade show" role="alert"
                                aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="false">
                                <div class="toast-body">
                                    <i class="bi bi-shield-lock"></i>
                                    <div class="toast-text ms-3 me-2">
                                        <p class="mb-0 text-white">The Credentials does not match</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <button class="btn btn-primary w-100" type="submit">Sign In</button>
                    </form>
                </div>
                <!-- Login Meta -->
                <div class="login-meta-data text-center"><a class="stretched-link forgot-password d-block mt-3 mb-1"
                        href="{{ route('password.request') }}">Forgot Password?</a>
                    <p class="mb-0">Didn't have an account? <a class="stretched-link"
                            href="{{ route('register') }}">Register
                            Now</a></p>
                </div>
            </div>
        </div>
        <!-- All JavaScript Files -->
        <script src="{{ asset('frontend2mob/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/default/internet-status.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/default/dark-mode-switch.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/default/active.js') }}"></script>
        <script src="{{ asset('frontend2mob/js/default/clipboard.js') }}"></script>
        <!-- PWA -->
        <script src="js/pwa.js"></script>
    </body>

    <!-- Mirrored from designing-world.com/affan-1.2.0/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Aug 2021 18:06:19 GMT -->

    </html>
@else

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }}</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
            integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
            crossorigin="anonymous" />

        {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    </head>
    <style>
        input[type="text"],
            {

            background-color: #d1d1d100;

        }

        .login-card-body {
            background: transparent;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #fff;
            background-color: #21252900;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-shadow: inset 0 0 0 rgb(0 0 0 / 0%);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .img-roundedm {
            border-radius: 1.75rem;
        }

    </style>

    <body style="overflow: hidden" class="hold-transition login-page " style="min-height: 341.688px;">
        <div class="login-box ">
            <center>
                <div>
                    <img style="width: 100px" src="{{ asset('images/onlylogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-bordered-smm img-roundedm elevation-3 animate__animated animate__fadeInDownBig">
                </div>
            </center>
            {{-- <div class="login-logo animate__animated animate__fadeInLeft">
            <a href="{{ url('/home') }}"><b>Admin Panel</b></a>
            {{ config('app.name') }}
        </div> --}}
            <!-- /.login-logo -->

            <!-- /.login-box-body -->
            <div class="card animate__animated animate__fadeInUpBig">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form method="post" action="{{ url('/login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="row">
                            <div class="col-8">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember">
                                    <label class="custom-control-label" for="remember">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                        </div>
                    </form>
                    @if ($errors->any())
                        <h6 class="text-white">{{ $errors->first() }}</h6>
                    @endif
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>

        </div>
        <!-- /.login-box -->

        <script src="{{ mix('js/app.js') }}" defer></script>

    </body>

    </html>

@endif
