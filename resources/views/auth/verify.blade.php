@extends('layouts.app')


@section('content')
    {{-- <style>
        .login-page,
        .register-page {
            align-items: center !important;
            background: #e9ecef !important;
            background-image: url("https://images.unsplash.com/photo-1511818966892-d7d671e672a2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80") !important;
            display: flex !important;
            flex-direction: column !important;
            height: 100vh !important;
            justify-content: center !important;
            -webkit-background-size: cover !important;
            -moz-background-size: cover !important;
            -o-background-size: cover !important;
            background-size: cover !important;
        }

    </style> --}}



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verify Your Email Address</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">A fresh verification link has been sent to
                                your email address
                            </div>
                        @endif
                        <p>Before proceeding, please check your email for a verification link.If you did not receive
                            the email,</p>
                        <a href="{{ route('verification.resend') }}">click here to request another'</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
