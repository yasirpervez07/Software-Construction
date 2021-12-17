<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-http://127.0.0.1:60490/preview/app/index.htmlCompatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    {{-- <title>AC-Mobile UI Neumorphism</title> --}}
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

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

    <!-- Preloader-->

    {{-- <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
        <div class="spinner-grow text-primary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div> --}}

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area-->

    <div class="header-area" id="headerArea">
        @guest

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

        @endguest

        @auth

                <div class="container">

                    <div
                        class="header-content header-style-four position-relative d-flex align-items-center justify-content-between">
                        <!-- Navbar Toggler -->
                        <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas"
                            data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas"><span
                                class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
                        <!-- Logo Wrapper -->
                        @if (isset($title))
                            <div class="page-heading">
                                <h6 class="mb-0">{{ $title }}</h6>
                            </div>
                        @endif
                        <!-- User Profile -->
                        @if (auth()->user()->image == null)
                            <div class="user-profile-wrapper">
                                <a class="user-profile-trigger-btn" {{-- style="width: 3rem !important;height: 3rem !important;" --}} href="#">
                                    <svg id="Layer_1"  version="1.1"
                                        viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                       
                                        <g>
                                            <g id="Icon-User" transform="translate(278.000000, 278.000000)">
                                                <path class="st0"
                                                    d="M-246-222.1c-13.2,0-23.9-10.7-23.9-23.9s10.7-23.9,23.9-23.9c13.2,0,23.9,10.7,23.9,23.9     S-232.8-222.1-246-222.1L-246-222.1z M-246-267.3c-11.7,0-21.3,9.6-21.3,21.3c0,11.7,9.6,21.3,21.3,21.3     c11.7,0,21.3-9.6,21.3-21.3C-224.7-257.7-234.3-267.3-246-267.3L-246-267.3z"
                                                    id="Fill-57" />
                                                <path class="st0"
                                                    d="M-260-228.7l-2.4-1.1c0.7-1.7,2.9-2.6,5.4-3.7c2.4-1.1,5.4-2.4,5.4-4v-2.2     c-0.9-0.7-2.3-2.3-2.5-4.6c-0.7-0.7-1.8-2-1.8-3.6c0-1,0.4-1.8,0.7-2.3c-0.2-1.1-0.6-3.3-0.6-5c0-5.5,3.8-9.1,9.8-9.1     c1.7,0,3.8,0.5,4.9,1.7c2.7,0.5,4.9,3.7,4.9,7.4c0,2.4-0.4,4.4-0.7,5.3c0.3,0.5,0.6,1.2,0.6,2c0,1.9-0.9,3.1-1.8,3.7     c-0.2,2.3-1.5,3.8-2.3,4.5v2.2c0,1.4,2.5,2.3,4.8,3.2c2.7,1,5.5,2,6.4,4.3l-2.5,0.9c-0.4-1.2-2.8-2-4.8-2.8     c-3.1-1.1-6.6-2.4-6.6-5.6v-3.6l0.6-0.4c0.1,0,1.8-1.2,1.8-3.5v-0.9l0.8-0.3c0.1-0.1,0.9-0.5,0.9-1.7c0-0.4-0.3-0.8-0.4-0.9     l-0.5-0.6l0.2-0.7c0,0,0.7-2.2,0.7-5.2c0-2.5-1.4-4.8-2.9-4.8h-0.8l-0.4-0.7c-0.3-0.5-1.5-1-3.1-1c-4.5,0-7.2,2.4-7.2,6.5     c0,1.9,0.7,5,0.7,5l0.2,0.7l-0.5,0.5c0,0-0.4,0.5-0.4,1c0,0.7,0.9,1.6,1.3,2l0.5,0.4l0,0.7c0,2.2,1.9,3.4,1.9,3.4l0.6,0.4l0,3.6     c0,3.3-3.7,5-7,6.4C-257.5-230.4-259.6-229.4-260-228.7"
                                                    id="Fill-58" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        @else

                            <div class="user-profile-wrapper">
                                <a class="user-profile-trigger-btn" href="#">
                                    <img src="img/bg-img/20.jpg" alt=""></a>
                            </div>
                        @endif

                    </div>

                </div>

        @endauth
    </div>

    <!-- Dark mode switching-->
    {{-- <div class="dark-mode-switching">
        <div class="d-flex w-100 h-100 align-items-center justify-content-center">
            <div class="dark-mode-text text-center"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z" />
                </svg>
                <p class="mb-0">Switching to dark mode</p>
            </div>
            <div class="light-mode-text text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                    <path
                        d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                </svg>
                <p class="mb-0">Switching to light mode</p>
            </div>
        </div>
    </div> --}}

    <!-- Sidenav Black Overlay-->
    <!-- Side Nav Wrapper-->
    <livewire:layouts.sidenav />

    <div class="page-content-wrapper">

        @yield('content')

    </div>

    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
            <!-- Paste your Footer Content from here-->
            <!-- Footer Content-->
            <div class="footer-nav position-relative">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li class="active"><a href="page-home.html"><svg width="20" height="20" viewBox="0 0 16 16"
                                class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg><span>Home</span></a></li>


                    <li><a href="pages.html"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-building"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                <path
                                    d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                            </svg><span>Properties</span></a></li>


                    <li><a href="elements.html"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-gift"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z" />
                            </svg><span>Rewards</span></a></li>


                    <li><a href="page-chat-users.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                <path
                                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                <path
                                    d="M2.165 15.803l.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                            </svg><span>Chat</span></a></li>


                    <li><a href="settings.html"><svg width="20" height="20" viewBox="0 0 16 16"
                                class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg><span>Profile</span></a></li>



                </ul>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
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
    {{-- <script src="{{ asset('frontend2mob/js/form-autocomplete.js') }}"></script> --}}

    @livewireScripts
    <!-- PWA-->
    <script src="{{ asset('frontend2mob/js/pwa.js') }}"></script>
</body>


</html>
