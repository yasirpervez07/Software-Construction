@extends('frontend.layouts.app')

@section('header')

    <header class="jumbotron bg-theme">
        <div class="bg-overlay"></div>
        <!-- NAVBAR -->
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="images/logo-blue.png" alt="">
                    <img src="images/logo-blue-stiky.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav99">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('customer.home') }}"> Home </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#" data-toggle="dropdown"> Agents </a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active " href="{{ route('customer.agency.index') }}"> Agencies </a>

                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ route('customer.property.index') }}">
                                Properties </a></li>
                    </ul>


                    <!-- Search bar.// -->
                    <ul class="navbar-nav ">
                        {{-- <li>
                        <a href="#" class="btn btn-primary text-capitalize">
                            <i class="fa fa-plus-circle mr-1"></i> add listing</a>
                    </li> --}}
                    </ul>
                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="#">

                                    {{-- <div class="row no-gutters mt-3">
                                    <div class="col">
                                        <input class="form-control border-secondary border-right-0 rounded-0"
                                            type="search" value="" placeholder="Search " id="example-search-input4">
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                            href="/search-result.html">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                </div> --}}

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>
        <!-- END NAVBAR -->
        {{-- @yield('banner') --}}
        {{-- @section('banner')/ --}}
        <style>
            @media screen and (max-width: 760px) {
                .search__container .select_option {
                    border: 0;
                    border-left: 0.5px solid #ddd;
                    font-family: "Open Sans", sans-serif;
                    padding: 0.75rem 1rem;
                    border-radius: 0px 0 0px 0px !important;
                    margin-left: 0px !important;
                }

                .btn-padding {
                    padding-left: 1px !important;
                }

                button.btn.btn-primary.btn-primarysearch.btn-block {
                    border-radius: 0px 0px 0px 0px !important;

                }

                .search-input.active .autocom-box {

                    border-bottom-right-radius: 0px !important;
                    border-bottom-left-radius: 0px !important;
                    line-height: 30px !important;

                }

            }

            @media screen and (max-width: 520px) {
                .btn-padding {
                    padding-left: 0px !important;
                }
            }

            button.btn.btn-primary.btn-primarysearch.btn-block {
                border-radius: 0px 10px 10px 0px;
                background: white;
                color: #ef7821;
                border: none;
                transition: all 1s ease;

            }

            button.btn.btn-primary.btn-primarysearch.btn-block:hover {
                background: #ef7821;
                color: #fff;
                transition: all 1s ease;
            }

            .srchselect.nice-select.select_option.form-control {
                border-radius: 10px 0 0px 10px;
            }

        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="wrap__intro d-flex align-items-md-center ">
            <div class="container  ">
                <div class="row align-items-center justify-content-start flex-wrap">
                    <div class="col-md-10 mx-auto">
                        <div class="wrap__intro-heading text-center" data-aos="fade-up">
                            <!-- <h4>the walls property</h4> -->
                            {{-- <h1>Find Your Dream House </h1> --}}

                            <!-- SEARCH BAR -->
                            {{-- <h1>{{$title}}</h1> --}}


                            <div class="bg__overlay-black p-4">
                                <div class="search__property">
                                    <div id="position-relative" class="position-relative">
                                        <ul class="nav nav-tabs nav-tabs-02 mb-3 justify-content-center" id="pills-tab"
                                            role="tablist">
                                            <li class="nav-item mr-1">
                                                <a class="nav-link active" data-toggle="pill">Buy </a>
                                            </li>
                                            <li class="nav-item mr-1">
                                                <a class="nav-link" data-toggle="pill">Rent</a>
                                            </li>
                                            <li class="nav-item mr-1">
                                                <a class="nav-link" data-toggle="pill">Booking</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade active show" id="buy" role="tabpanel"
                                                aria-labelledby="buy-tab">

                                                <div class=" search__container">
                                                    <div class="wrapper__section">
                                                        <div class="wrapper__section__components">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <!-- <h3 class="section_heading mt-4">Form Search with Categories</h3> -->
                                                                    <div class="search__container">
                                                                        <div class="row input-group no-gutters">

                                                                            <div class="col-sm-12 col-md-2 input-group  "
                                                                                style="margin-left: 0px !important">

                                                                                <select
                                                                                    class="srchselect select_option form-control"
                                                                                    name="city" id="city"
                                                                                    onchange="ajaxSuggestions()">
                                                                                    {{-- <option selected="">All Categories</option> --}}
                                                                                    @foreach ($city as $item)
                                                                                        <option value="{{ $item->id }}">
                                                                                            {{ $item->name }}</option>
                                                                                    @endforeach
                                                                                    {{-- <option>House</option>
                                                                                <option>Apartement </option>
                                                                                <option>Hotel</option>
                                                                                <option>Residential</option>
                                                                                <option>Land</option>
                                                                                <option>Luxury</option> --}}

                                                                                </select>


                                                                            </div>
                                                                            <style>
                                                                                ::-webkit-scrollbar {
                                                                                    width: 10px;

                                                                                }

                                                                                /* Track */
                                                                                ::-webkit-scrollbar-track {
                                                                                    background: #ffffff
                                                                                }

                                                                                /* Handle */
                                                                                ::-webkit-scrollbar-thumb {
                                                                                    background: #ffffff
                                                                                }

                                                                                /* Handle on hover */
                                                                                ::-webkit-scrollbar-thumb:hover {
                                                                                    background: rgba(247, 129, 2, 0.693);
                                                                                }





                                                                                /* width */
                                                                                ::-webkit-scrollbar {
                                                                                    width: 8px;
                                                                                    height: 10px;
                                                                                }

                                                                                ::-webkit-scrollbar-track {
                                                                                    background: #ffffff31;
                                                                                }

                                                                                ::-webkit-scrollbar-thumb {
                                                                                    background-color: #ef7821;
                                                                                    border-radius: 50px;
                                                                                    /* border: 2px solid #ffffff; */
                                                                                }

                                                                                .srch {}

                                                                                .srch .search-input {
                                                                                    background: #ff000000;
                                                                                    width: 100%;
                                                                                    /* border-radius: 5px; */
                                                                                    position: relative;
                                                                                    /* box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12); */
                                                                                }

                                                                                .search-input input {
                                                                                    /* height: 55px; */
                                                                                    width: 100%;
                                                                                    outline: none;
                                                                                    border: none;
                                                                                    background: white;
                                                                                    transition: all 1s ease;

                                                                                    /* border-radius: 5px; */
                                                                                    /* padding: 0 60px 0 20px; */
                                                                                    /* font-size: 1px; */
                                                                                    /* box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1); */
                                                                                }

                                                                                .search-input.active input {
                                                                                    /* border-radius: 5px 5px 0 0; */
                                                                                }


                                                                                .search-input input:focus {
                                                                                    /* background: #fefefecb; */
                                                                                    /* transition: all 1s ease; */
                                                                                    /* border-radius: 5px 5px 0 0; */
                                                                                }

                                                                                .search__container input :focus {
                                                                                    /* background: transparent */

                                                                                }

                                                                                .search-input .autocom-box {
                                                                                    padding: 0;
                                                                                    opacity: 0;
                                                                                    pointer-events: none;
                                                                                    max-height: 200px;
                                                                                    overflow-y: auto;
                                                                                }

                                                                                .search-input.active .autocom-box {
                                                                                    padding: 0px 1px 0px 15px;
                                                                                    opacity: 1;
                                                                                    pointer-events: auto;
                                                                                    background: #fefefe;
                                                                                    border-bottom-right-radius: 15px;
                                                                                    border-bottom-left-radius: 15px;
                                                                                    line-height: 180%;

                                                                                }

                                                                                .autocom-box li {
                                                                                    background: #ff000000 list-style: none;
                                                                                    /* padding: 8px 12px; */
                                                                                    display: none;
                                                                                    width: 100%;
                                                                                    cursor: default;
                                                                                    transition: all .2s ease;

                                                                                    /* border-radius: 3px; */
                                                                                }

                                                                                .search-input.active .autocom-box li {
                                                                                    display: block;
                                                                                    text-align: -webkit-auto;
                                                                                    /* padding-left: 2%; */

                                                                                }

                                                                                .autocom-box li:hover {
                                                                                    /* background: #bf60075f; */
                                                                                    /* transform: scale(2, 2); */
                                                                                    font-size: 17px !important;
                                                                                    transition: all .2s ease;

                                                                                }

                                                                                .search-input .icon {
                                                                                    position: absolute;
                                                                                    right: 0px;
                                                                                    top: 0px;
                                                                                    /* height: 55px; */
                                                                                    /* width: 55px; */
                                                                                    /* text-align: center; */
                                                                                    line-height: 55px;
                                                                                    font-size: 20px;
                                                                                    color: #644bff;
                                                                                    cursor: pointer;
                                                                                }

                                                                            </style>
                                                                            <div class="col-sm-12 col-md-8 ">
                                                                                {{-- <input type="text" class="form-control"
                                                                                aria-label="Text input"
                                                                                placeholder="Search for Homes"> --}}
                                                                                <div class="srch" id="srch">
                                                                                    <div class="search-input">
                                                                                        <a href="" target="_blank"
                                                                                            hidden></a>
                                                                                        <input id="srchinput"
                                                                                            autocomplete="off" type="text"
                                                                                            placeholder="Search for Homes">
                                                                                        <div class="autocom-box">
                                                                                        </div>
                                                                                        <div class="icon"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="btn-padding col-sm-12 col-md-2 input-group-append">
                                                                                <button {{-- onclick="window.location='{{ route('properties.search', ['parameter1']) }}'" --}}
                                                                                    onclick="PropertySearch();"
                                                                                    class="btn btn-primary btn-primarysearch btn-block icon"
                                                                                    type="submit">
                                                                                    <i class="fa fa-search"></i> <span
                                                                                        class="ml-1 text-uppercase">Search</span>
                                                                                </button>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button href="#" class="btn btn-link text-danger"
                                                    onclick="showDiv('moreoptions')">More Options</button>
                                                <style>


                                                </style>
                                                <script>
                                                    $(function() {

                                                        $("#srchinput").focus(function() {
                                                            // alert("Handler for .focus() called.");
                                                            $('.moreoptions').show('slow')


                                                            $('.btn-link').html('Less Options')
                                                            count = 1;


                                                        });
                                                    })
                                                    var count = 0;

                                                    function showDiv(div) {
                                                        $('.' + div).toggle('slow')
                                                        if (count == 0) {

                                                            $('.btn-link').html('Less Options')
                                                            count = 1;
                                                        } else {
                                                            $('.btn-link').html('More Options')
                                                            count = 0;

                                                        }
                                                    }
                                                </script>
                                                <div class="search__container moreoptions" style="display: none;">
                                                    <div class="row input-group no-gutters">
                                                        <div class="col-sm-12 col-md-2 pr-1">
                                                            <select class="select_option form-control" name="select">
                                                                <option selected>Property Type</option>
                                                                @foreach ($propertytypes as $item)
                                                                    <option value="{{ $item->name }}">{{ $item->name }}
                                                                    </option>

                                                                @endforeach


                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 pr-1">
                                                            <select class="select_option form-control" name="select">
                                                                <option data-display="Area From">Area From</option>
                                                                <option>1500</option>
                                                                <option>1200</option>
                                                                <option>900</option>
                                                                <option>600</option>
                                                                <option>300</option>
                                                                <option>100</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 pr-1">
                                                            <select class="select_option form-control" name="select">
                                                                <option data-display="Bedrooms">Bedrooms</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                            </select>
                                                        </div>
                                                        {{-- <div class="col-12 col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <div class="filter__price">
                                                                <input class="price-range" type="text" name="my_range" value="" />
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                        <div class="col-sm-12 col-md-2 pr-1">
                                                            <select class="select_option form-control" name="select">
                                                                <option data-display="Bathrooms">Bathrooms</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>

                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- HERO -->

        <!-- END HERO -->
    </header>
@endsection




@section('content')

    <style>
        .item1 {
            /* background: linear-gradient(-45deg, rgb(0, 0, 0), #ffffff, rgb(0, 0, 0)); */
            background: linear-gradient(128deg, #ffffff 40%, #575252aa 50%, rgb(0 0 0 / 8%) 60%);

            background-size: 400% 400%;
            animation: gradient 1s ease infinite;
            color: transparent;

        }

        @keyframes gradient {
            0% {
                background-position: 0% 100%;
            }

            /* 25% {
                                                                                                                                                                                                                        background-position: 25% 50%;
                                                                                                                                                                                                                    }

                                                                                                                                                                                                                    50% {
                                                                                                                                                                                                                        background-position: 50% 75%;
                                                                                                                                                                                                                    } */

            100% {
                background-position: 100% 100%;
            }
        }

    </style>

    <section id=app>

        <!-- FEATURED PROPERTIES -->
        <section class="featured__property ">
            <div class="container">
                <div class="row ">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                featured properties
                            </h2>
                            <p class="text-center text-capitalize">handpicked exclusive properties by our team.</p>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="featured" class="featured__property-carousel owl-carousel owl-theme">


                            <div class="item item1">
                                <div class="card__image card__box ">
                                    <div class="card__image-header h-250 item1">
                                        <div class="ribbon text-capitalize"></div>
                                        <img src="" alt="" class="img-fluid w100 img-transition">
                                        <div class="info item"> </div>
                                    </div>
                                    <div class="card__image-body item1">
                                        <div style="color: transparent">

                                            <span class="badge badge-primary text-capitalize mb-2"></span>
                                            <h6 class="text-capitalize">

                                            </h6>

                                            <p class="text-capitalize item1">
                                                <i style="color: transparent" class="fa fa-map-marker"></i>

                                            </p>
                                            <ul class="list-inline card__content item1">
                                                <li class="list-inline-item ">

                                                    <span style="color: transparent">
                                                        baths <br>
                                                        <i style="color: transparent" class="fa fa-bath "></i>
                                                    </span>
                                                </li>
                                                <li class="list-inline-item ">
                                                    <span style="color: transparent">
                                                        beds <br>
                                                        <i style="color: transparent" class="fa fa-bed"></i>
                                                    </span>
                                                </li>
                                                <li class="list-inline-item ">
                                                    <span style="color: transparent">
                                                        rooms <br>
                                                        <i style="color: transparent" class="fa fa-inbox"></i>
                                                    </span>
                                                </li>
                                                <li class="list-inline-item ">
                                                    <span style="color: transparent">
                                                        area <br>
                                                        <i style="color: transparent" class="fa fa-map"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card__image-footer item1">
                                        <figure>
                                            <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                        </figure>
                                        <ul class="list-inline my-auto">
                                            <li style="color: transparent" class="list-inline-item">
                                                <a style="color: transparent" href="#">
                                                    tom wilson <br>
                                                </a>

                                            </li>

                                        </ul>
                                        <ul class="list-inline my-auto ml-auto">
                                            <li style="color: transparent" class="list-inline-item">

                                                <h6 style="color: transparent">$350.000</h6>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- END FEATURED PROPERTIES -->

        <!-- RECENT PROPERTY -->
        <section class="featured__property bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                Recent Property
                            </h2>
                            <p class="text-center text-capitalize">We provide full service at every step.</p>

                        </div>
                    </div>
                </div>
                <div id="recent" class="featured__property-carousel owl-carousel owl-theme">

                    <div class="item item1">
                        <div class="card__image card__box ">
                            <div class="card__image-header h-250 item1">
                                <div class="ribbon text-capitalize"></div>
                                <img src="" alt="" class="img-fluid w100 img-transition">
                                <div class="info item"> </div>
                            </div>
                            <div class="card__image-body item1">
                                <div style="color: transparent">

                                    <span class="badge badge-primary text-capitalize mb-2"></span>
                                    <h6 class="text-capitalize">

                                    </h6>

                                    <p class="text-capitalize item1">
                                        <i style="color: transparent" class="fa fa-map-marker"></i>

                                    </p>
                                    <ul class="list-inline card__content item1">
                                        <li class="list-inline-item ">

                                            <span style="color: transparent">
                                                baths <br>
                                                <i style="color: transparent" class="fa fa-bath "></i>
                                            </span>
                                        </li>
                                        <li class="list-inline-item ">
                                            <span style="color: transparent">
                                                beds <br>
                                                <i style="color: transparent" class="fa fa-bed"></i>
                                            </span>
                                        </li>
                                        <li class="list-inline-item ">
                                            <span style="color: transparent">
                                                rooms <br>
                                                <i style="color: transparent" class="fa fa-inbox"></i>
                                            </span>
                                        </li>
                                        <li class="list-inline-item ">
                                            <span style="color: transparent">
                                                area <br>
                                                <i style="color: transparent" class="fa fa-map"></i>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card__image-footer item1">
                                <figure>
                                    <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                </figure>
                                <ul class="list-inline my-auto">
                                    <li style="color: transparent" class="list-inline-item">
                                        <a style="color: transparent" href="#">
                                            tom wilson <br>
                                        </a>

                                    </li>

                                </ul>
                                <ul class="list-inline my-auto ml-auto">
                                    <li style="color: transparent" class="list-inline-item">

                                        <h6 style="color: transparent">$350.000</h6>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- END RECENT PROPERTY -->




        <!-- MOST POPULAR PLACES -->
        <section class="wrap__heading ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                Our Projects
                            </h2>
                            <p class="text-center text-capitalize">find properties in these cities.</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-xl-5 col-padd">
                        <!-- CARD IMAGE -->

                        <a href="#">
                            <div id="projectmain" class="card__image-hover-style-v3">
                                <div class="card__image-hover-style-v3-thumb h-475">
                                    <img src="images/700x980.jpg" alt="" class="img-fluid w-100">
                                </div>
                                <div class="overlay">
                                    <div class="desc">
                                        <h6 class="text-capitalize">tokyo</h6>
                                        <p class="text-capitalize">70 properties</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-7 col-xl-7">
                        <div id="mostpopular2" class="row">


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END MOST POPULAR PLACES -->




        <!-- ABOUT -->
        <section class="home__about bg-theme-v4">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="title__leading">
                            <!-- <h6 class="text-uppercase">trusted By thousands</h6> -->
                            <h2 class="text-capitalize"> why choose use?</h2>
                            <p>
                                The first step in selling your property is to get a valuation from local experts. They will
                                inspect your home and take into account its unique features, the area and market conditions
                                before providing you with the most accurate valuation.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla
                                quae alias tempora. Placeat voluptatem eum numquam quas distinctio obcaecati quaerat,
                                repudiandae qui! Quia, omnis, doloribus! Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quod libero amet, laborum qui nullas tempora.</p>

                            <a href="#" class="btn btn-primary mt-3 text-capitalize"> read more
                                <i class="fa fa-angle-right ml-3 "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- OUR PARTNERS -->
        {{-- <section class="projects__partner bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">our partners</h2>
                        <p class="text-center text-capitalize">brand partners successful projects trusted many clients
                            real estate </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="projects__partner-logo">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <img src="images/partner-logo6.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo7.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo8.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo1.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo5.png" alt="" class="img-fluid">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </section> --}}
        <!-- END OUR PARTNERS -->

        <!-- TESTIMONIAL -->
        {{-- <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            what people says
                        </h2>
                        <p class="text-center text-capitalize">people says about walls property.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="testimonial owl-carousel owl-theme">
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->

            </div>
        </div>
        </section> --}}
        <!-- END TESTIMONIAL -->

        <!-- CALL TO ACTION -->
        {{-- <section class="bg-theme-v1">
        <div class="cta">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-12 text-center">
                        <h2 class="text-uppercase text-white">signup & build your dream house</h2>
                        <p class="text-capitalize text-white">We'll help you to grow your career and growth, please
                            contact
                            team
                            walls real estate and get this offer promo</p>
                        <a href="#" class="btn btn-primary text-uppercase ">request a quote
                            <i class="fa fa-angle-right ml-3 arrow-btn "></i></a>
                    </div>
                </div>
            </div>
        </div>
        </section> --}}


        <!-- BLOG -->
        <section class="blog__home">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                Agencies
                            </h2>
                            <p class="text-center text-capitalize">find of the most popular real estate company all around
                                indonesia. </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    @foreach ($agencies as $item)

                        <div class="col-md-4">
                            <!-- BLOG  -->
                            <div class="card__image">
                                <div class="card__image-header h-250">
                                    <img src="https://chhatt.s3.ap-south-1.amazonaws.com/agencies/{{ $item->image }}"
                                        alt="" class="img-fluid w100 img-transition">
                                    <div class="info"> event</div>
                                </div>
                                <div class="card__image-body">
                                    <!-- <span class="badge badge-secondary p-1 text-capitalize mb-3">May 08, 2019 </span> -->
                                    <h6 class="text-capitalize">
                                        <a href="/blog-single.html">{{ $item->name }} </a>
                                    </h6>
                                    <p class=" mb-0">
                                        {{-- Real estate festival is one of the famous feval for explain to you how all this mistaolt
                                deand praising pain
                                wasnad I will give complete --}}

                                    </p>


                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    {{-- <ul class="list-inline my-auto">
                                <li class="list-inline-item ">
                                    <a href="#">
                                        tom wilson
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item ">
                                    <a href="/blog-single.html" class="btn btn-sm btn-primary "><small
                                            class="text-white ">read more <i class="fa fa-angle-right ml-1"></i></small></a>
                                </li>

                            </ul> --}}
                                </div>
                            </div>
                            <!-- END BLOG -->
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- END BLOG -->

        <form action="">
            {{-- <x-search title="footer" /> --}}

        </form>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            loadProperties()
            loadFeaturedProperties()
            loadProjects()

            function loadProperties() {
                $.ajax({
                    type: "get",
                    url: "/api/properties/search?status=1",
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        onstartup: 'properties',
                    },
                    success: function(response) {
                        $('#recent').html('')

                        $.each(response.data, function(key, value) {
                            // if(value.bed=='Null' || value.bed==null){
                            //     value.bed=""
                            // }
                            $('#recent').append(
                                `
                                                                                                                                                                                                                <div class="card__image card__box">
                                                                                                                                                                                                     <div class="card__image-header h-250">
                                                                                                                                                                                                         <div class="ribbon text-capitalize">` +
                                value
                                .priority +
                                `</div>

                                                                                                                                                                                                             <img src="` +
                                value
                                .images[0]
                                .original +
                                `" alt=""
                                                                                                                                                                                                                 class="img-fluid w100 img-transition">


                                                                                                                                                                                                         <div class="info">` +
                                value
                                .property_for +
                                `</div>
                                                                                                                                                                                                     </div>
                                                                                                                                                                                                     <div class="card__image-body">
                                                                                                                                                                                                         <span class="badge badge-primary text-capitalize mb-2">` +
                                value
                                .property_type +
                                `</span>
                                                                                                                                                                                                         <h6 class="text-capitalize">
                                                                                                                                                                                                             ` +
                                value
                                .property_type +
                                ` in ` +
                                value
                                .area_one_name +
                                `
                                                                                                                                                                                                         </h6>

                                                                                                                                                                                                         <p class="text-capitalize">
                                                                                                                                                                                                             <i class="fa fa-map-marker"></i>
                                                                                                                                                                                                             ` +
                                value
                                .area_three_name +
                                `,` +
                                value
                                .area_two_name +
                                `,` +
                                value
                                .area_one_name +
                                `
                                                                                                                                                                                                         </p>
                                                                                                                                                                                                         <ul class="list-inline card__content">
                                                                                                                                                                                                             <li class="list-inline-item">

                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     baths <br>
                                                                                                                                                                                                                     <i class="fa fa-bath"></i> ` +
                                value
                                .bath +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     beds <br>
                                                                                                                                                                                                                     <i class="fa fa-bed"></i> ` +
                                value
                                .bed +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     rooms <br>
                                                                                                                                                                                                                     <i class="fa fa-inbox"></i> ` +
                                value
                                .bed +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     area <br>
                                                                                                                                                                                                                     <i class="fa fa-map"></i> ` +
                                value
                                .size +
                                ` ` +
                                value
                                .size_type +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                         </ul>
                                                                                                                                                                                                     </div>
                                                                                                                                                                                                     <div class="card__image-footer">
                                                                                                                                                                                                         <figure>
                                                                                                                                                                                                             <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                                                                                                                                                                                         </figure>
                                                                                                                                                                                                         <ul class="list-inline my-auto">
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <a href="#">
                                                                                                                                                                                                                     username
                                                                                                                                                                                                                 </a>

                                                                                                                                                                                                             </li>

                                                                                                                                                                                                         </ul>
                                                                                                                                                                                                         <ul class="list-inline my-auto ml-auto">
                                                                                                                                                                                                             <li class="list-inline-item">

                                                                                                                                                                                                                 <h6>Rs. ` +
                                value
                                .price +
                                `</h6>
                                                                                                                                                                                                             </li>

                                                                                                                                                                                                         </ul>
                                                                                                                                                                                                     </div>
                                                                                                                                                                                                 </div>
                                                                                                                                                                                                 `
                            )
                        });
                        // $('#recent').html(response.properties);
                        reloadCarousel('recent')
                    }
                });
            }

            function loadProjects() {
                $.ajax({
                    type: "get",
                    url: "/api/projects",
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // data: {
                    //     onstartup: 'properties',
                    // },
                    success: function(response) {

                        // console.log(response)
                        $.each(response.data, function(key, value) {
                            // if(value.bed=='Null' || value.bed==null){
                            //     value.bed=""
                            // }
                            // console.log(key)
                            if (key != 0) {
                                $('#mostpopular2').append(
                                    `
                                                                                                                                                                                                <div class="col-md-6 col-padd">
                                                                                                                                                                                                <!-- CARD IMAGE -->
                                                                                                                                                                                                <a href="#">
                                                                                                                                                                                                    <div class="card__image-hover-style-v3">
                                                                                                                                                                                                        <div class="card__image-hover-style-v3-thumb h-230">
                                                                                                                                                                                                            <img src="` +
                                    value
                                    .image +
                                    `" alt="" class="img-fluid w-100">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="overlay">
                                                                                                                                                                                                            <div class="desc">
                                                                                                                                                                                                                <h6 class="text-capitalize">` +
                                    value
                                    .name +
                                    `</h6>
                                                                                                                                                                                                                <p class="text-capitalize">70 properties</p>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </a>
                                                                                                                                                                                            </div>
                                                                                                                                                                                                 `
                                )
                            } else {
                                $('#projectmain').html(
                                    `
                                                                                                                                                                                            <div class="card__image-hover-style-v3-thumb h-475">
                                                                                                                                                                                                    <img src="` +
                                    value
                                    .image +
                                    `" alt="" class="img-fluid w-100">
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="overlay">
                                                                                                                                                                                                    <div class="desc">
                                                                                                                                                                                                        <h6 class="text-capitalize">` +
                                    value
                                    .name +
                                    `</h6>
                                                                                                                                                                                                        <p class="text-capitalize">70 properties</p>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            `
                                )
                            }
                        });

                        // $('#recent').html(response.properties);

                        // reloadCarousel('recent')
                    }
                });
            }

            function loadFeaturedProperties() {
                $.ajax({
                    type: "get",
                    url: "/api/properties/search?featured=0",
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        onstartup: 'featured',
                    },
                    success: function(response) {
                        $('#featured').html('')
                        // console.log(response);
                        $.each(response.data, function(key, value) {
                            // if(value.bed=='Null' || value.bed==null){
                            //     value.bed=""
                            // }
                            $('#featured').append(
                                `
                                                                                                                                                                                                                <div class="card__image card__box">
                                                                                                                                                                                                     <div class="card__image-header h-250">
                                                                                                                                                                                                         <div class="ribbon text-capitalize">` +
                                value
                                .priority +
                                `</div>

                                                                                                                                                                                                             <img src="` +
                                value
                                .images[0]
                                .original +
                                `" alt=""
                                                                                                                                                                                                                 class="img-fluid w100 img-transition">


                                                                                                                                                                                                         <div class="info">` +
                                value
                                .property_for +
                                `</div>
                                                                                                                                                                                                     </div>
                                                                                                                                                                                                     <div class="card__image-body">
                                                                                                                                                                                                         <span class="badge badge-primary text-capitalize mb-2">` +
                                value
                                .property_type +
                                `</span>
                                                                                                                                                                                                         <h6 class="text-capitalize">
                                                                                                                                                                                                             ` +
                                value
                                .property_type +
                                ` in ` +
                                value
                                .area_one_name +
                                `
                                                                                                                                                                                                         </h6>

                                                                                                                                                                                                         <p class="text-capitalize">
                                                                                                                                                                                                             <i class="fa fa-map-marker"></i>
                                                                                                                                                                                                             ` +
                                value
                                .area_three_name +
                                `,` +
                                value
                                .area_two_name +
                                `,` +
                                value
                                .area_one_name +
                                `
                                                                                                                                                                                                         </p>
                                                                                                                                                                                                         <ul class="list-inline card__content">
                                                                                                                                                                                                             <li class="list-inline-item">

                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     baths <br>
                                                                                                                                                                                                                     <i class="fa fa-bath"></i> ` +
                                value
                                .bath +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     beds <br>
                                                                                                                                                                                                                     <i class="fa fa-bed"></i> ` +
                                value
                                .bed +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     rooms <br>
                                                                                                                                                                                                                     <i class="fa fa-inbox"></i> ` +
                                value
                                .bed +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <span>
                                                                                                                                                                                                                     area <br>
                                                                                                                                                                                                                     <i class="fa fa-map"></i> ` +
                                value
                                .size +
                                ` ` +
                                value
                                .size_type +
                                `
                                                                                                                                                                                                                 </span>
                                                                                                                                                                                                             </li>
                                                                                                                                                                                                         </ul>
                                                                                                                                                                                                     </div>
                                                                                                                                                                                                     <div class="card__image-footer">
                                                                                                                                                                                                         <figure>
                                                                                                                                                                                                             <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                                                                                                                                                                                         </figure>
                                                                                                                                                                                                         <ul class="list-inline my-auto">
                                                                                                                                                                                                             <li class="list-inline-item">
                                                                                                                                                                                                                 <a href="#">
                                                                                                                                                                                                                     username
                                                                                                                                                                                                                 </a>

                                                                                                                                                                                                             </li>

                                                                                                                                                                                                         </ul>
                                                                                                                                                                                                         <ul class="list-inline my-auto ml-auto">
                                                                                                                                                                                                             <li class="list-inline-item">

                                                                                                                                                                                                                 <h6>Rs. ` +
                                value
                                .price +
                                `</h6>
                                                                                                                                                                                                             </li>

                                                                                                                                                                                                         </ul>
                                                                                                                                                                                                     </div>
                                                                                                                                                                                                 </div>
                                                                                                                                                                                                 `
                            )
                        });


                        reloadCarousel('featured')
                    }
                });
            }





        });
    </script>

    <script>
        $(function() {
            $('#position-relative').addClass('animate__animated animate__zoomInDown');

            ajaxSuggestions();
            $('#position-relative').addClass('animate__animated animate__zoomInDown');

        })
        var suggestions = [

        ];
        var suggestionskey = [

        ];

        var suggestionsparent = [];

        const searchWrapper = document.querySelector(".search-input");
        const inputBox = searchWrapper.querySelector("input");
        const suggBox = searchWrapper.querySelector(".autocom-box");
        const icon = searchWrapper.querySelector(".icon");
        let linkTag = searchWrapper.querySelector("a");
        let webLink;
        var keyofsearch;
        var textofsearch;



        function ajaxSuggestions() {
            // $('#srch').addClass('animate__animated animate__fadeOut');

            var city = $('#city').children("option:selected").val();
            // console.log(city);

            let userData = $('#srchinput').val(); //user enetered data
            let emptyArray = [];

            $.ajax({
                type: "GET",
                url: "api/allareas",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    city: city,
                },
                success: function(responese) {

                    suggestions = []
                    suggestionsparent = []
                    suggestionskey = []

                    let dataFected = responese.data.forEach((prev) => {
                        var a = prev.name
                        var b = prev.parent
                        var c = prev.key

                        // suggestions.push(a + " " + b);
                        suggestions.push(a);
                        suggestionsparent.push(b);
                        suggestionskey.push(c);
                        // console.log(suggestionskey);

                    })

                    emptyArray = suggestions.filter((data) => {
                        //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                        return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
                    });
                    emptyArray = emptyArray.map((data) => {
                        // passing return data inside li tag
                        var indexofparent = suggestions.indexOf(data);
                        var parent = suggestionsparent[indexofparent];
                        return data = '<li>' + data + "," +
                            '<span style="border-radius:10px"  class="badge badge-pill badge-link" >' +
                            parent +
                            '</span>' + '</li>';
                    });
                    // searchWrapper.classList.add("active"); //show autocomplete box
                    showSuggestions(emptyArray);
                    let allList = suggBox.querySelectorAll("li");
                    for (let i = 0; i < allList.length; i++) {
                        //adding onclick attribute in all li tag
                        allList[i].setAttribute("onclick", "select(this)");
                    }

                    // $('#srch').removeClass('animate__animated animate__fadeOut');
                    // $('#srch').addClass('animate__animated animate__fadeIn');
                },
            });
        }
        inputBox.onkeyup = (e) => {

            let userData = e.target.value; //user enetered data
            let emptyArray = [];
            if (userData) {
                icon.onclick = () => {
                    webLink = "https://www.google.com/search?q=" + userData;
                    linkTag.setAttribute("href", webLink);
                    // console.log(webLink);
                    linkTag.click();
                }
                emptyArray = suggestions.filter((data) => {
                    //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                    return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
                });
                emptyArray = emptyArray.map((data) => {
                    // passing return data inside li tag
                    var indexofparent = suggestions.indexOf(data);
                    var parent = suggestionsparent[indexofparent];
                    return data = '<li>' + data + "," +
                        '<span style="border-radius:10px"  class="badge badge-pill badge-link" >' + parent +
                        '</span>' + '</li>';
                });
                searchWrapper.classList.add("active"); //show autocomplete box
                showSuggestions(emptyArray);
                let allList = suggBox.querySelectorAll("li");
                for (let i = 0; i < allList.length; i++) {
                    //adding onclick attribute in all li tag
                    allList[i].setAttribute("onclick", "select(this)");
                }
            } else {
                searchWrapper.classList.remove("active"); //hide autocomplete box
            }
        }

        function PropertySearch() {
            // console.log(keyofsearch);
            // console.log(textofsearch);
            var url = '{{ route('customerproperty.search', 'areas=:key') }}';
            url = url.replace(':key', keyofsearch);
            document.location.href = url;
        }



        function select(element) {
            let selectData = element.textContent;
            var res = selectData.split(",");
            // console.log(res[0]);
            var indexof = suggestions.indexOf(res[0]);
            var indexofkey = suggestionskey[indexof];
            // console.log(indexofkey);
            keyofsearch = indexofkey;
            textofsearch = selectData
            inputBox.value = res[0];
            icon.onclick = () => {
                webLink = "https://www.google.com/search?q=" + selectData;
                linkTag.setAttribute("href", webLink);
                linkTag.click();
            }
            searchWrapper.classList.remove("active");
        }

        function showSuggestions(list) {
            let listData;
            if (!list.length) {
                userValue = inputBox.value;
                listData = '<li>' + userValue + '</li>';
            } else {
                listData = list.join('');
            }
            suggBox.innerHTML = listData;
        }
    </script>

    <style>
        .owl-dots .owl-dot {
            background-color: transparent;
            margin-right: 15px;
            vertical-align: middle;
            outline: none;
            box-shadow: none
        }

        .owl-dots .owl-dot span {
            background-color: #cccccc;
            border-radius: 50%;
            margin: 3px;
            width: 6px;
            height: 6px;
            transition: all 0.3s ease
        }

        .owl-dots .owl-dot.active span {
            border-radius: 50%;
            background-color: #3454d1 !important;
            border: 5px solid #e0e2e3;
            height: 15px;
            width: 15px;
            background: #3454d1;
            outline: 0;
            box-shadow: none;
            transition: all 0.3s ease
        }

        .owl-dot {
            background: none;
            color: inherit;
            border: none;
            padding: 0 !important;
            font: inherit;
        }

    </style>
@endsection
