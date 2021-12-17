@extends('frontend.layouts.app')

@section('header')
    <header class="bg-theme">
        <nav class=" navbar navbar-hover navbar-expand-lg navbar-soft ">
            <div class="container">
                <a class="navbar-brand" href="">
                    {{-- <img src="images/logo-blue.png" alt=""> --}}
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
        {{-- <div class="bg-overlay"></div> --}}
        <div class="bg-theme-overlay">

            <section class="section__breadcrumb ">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 text-center">
                            <h2 class="text-capitalize text-white ">Property</h2>
                            {{-- <ul class="list-inline ">
                                <li class="list-inline-item">
                                    <a href="#" class="text-white">
                                        Property
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-white">
                                        Seatch
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-white">
                                        agency list
                                    </a>
                                </li>

                            </ul> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <!-- END BREADCRUMB -->
    {{-- </header> --}}
@endsection
{{-- @section('banner')

    @endsection --}}
@section('content')

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

        .wrap__intro {
            height: 50vh !important;
        }

        @media screen and (max-width: 520px) {
            .btn-padding {
                padding-left: 0px !important;
            }
        }


        button.btn.btn-primary.btn-primarysearch.btn-block {
            border-radius: 0px 10px 10px 0px;
            /* background: white; */
            background: #00000045;
            color: #ef7821;
            border: 1px solid #bababa;
            transition: all 1s ease;

        }

        .search__container .select_option {

            background: #00000045
        }


        button.btn.btn-primary.btn-primarysearch.btn-block:hover {
            background: #ef7821;
            border: 1px solid #ef7821;

            color: #fff;
            transition: all 1s ease;
        }

        .srchselect.nice-select.select_option.form-control {
            border-radius: 10px 0 0px 10px;
            background: #00000045;

        }

    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="clearfix"></div>

    <div class="wrap__intro d-flex align-items-md-center ">
        <div class="container  ">
            <div class="row align-items-center justify-content-start flex-wrap">
                <div class="col-md-10 mx-auto">
                    <div class="wrap__intro-heading text-center">
                        <!-- <h4>the walls property</h4> -->
                        {{-- <h1>Find Your Dream House </h1> --}}

                        <!-- SEARCH BAR -->
                        {{-- <h1>{{$title}}</h1> --}}


                        <div class="bg__overlay">
                            <div class="search__property">
                                <div id="position-relative" class="position-relative">
                                    <ul class="nav nav-tabs nav-tabs-02 mb-3 justify-content-center" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item mr-1">
                                            <a class="nav-link active" data-toggle="pill" style="color: black">Buy </a>
                                        </li>
                                        <li class="nav-item mr-1">
                                            <a class="nav-link" data-toggle="pill" style="color: black">Rent</a>
                                        </li>
                                        <li class="nav-item mr-1">
                                            <a class="nav-link" data-toggle="pill" style="color: black">Booking</a>
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
                                                                                /* background: white; */
                                                                                background: #00000045;

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
                                                                                background: #00000045;
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
                                                                                    <a href="" target="_blank" hidden></a>
                                                                                    <input id="srchinput" autocomplete="off"
                                                                                        type="text"
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
                                            <br>
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






    <section id="app">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <div class="container">
            <p id="result">Showing result out of {{ $properties->total() }}</p>
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs__custom-v2 ">
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills myTab" role="tablist">
                                    <li class="list-inline-item mr-auto">
                                        <span class="title-text">Sort by</span>
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Based Properties
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)">Low to High Price</a>
                                                <a class="dropdown-item" href="javascript:void(0)">High to Low Price
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0)">Sell Properties</a>

                                                <a class="dropdown-item" href="javascript:void(0)">Rent Properties</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#pills-tab-one" role="tab"
                                            aria-controls="pills-tab-one" aria-selected="true">
                                            <span class="fa fa-th-list"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#pills-tab-two" role="tab"
                                            aria-controls="pills-tab-two" aria-selected="false">
                                            <span class="fa fa-th-large"></span></a>
                                    </li>
                                </ul>



                                <div class="tab-content" id="myTabContent">
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />

                                    <div class="tab-pane fade " id="pills-tab-one" role="tabpanel"
                                        aria-labelledby="pills-tab-one">
                                        <div id="tb1">
                                            @include('frontend.customer.property.table1')
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="tab-pane fade show active" id="pills-tab-two" role="tabpanel"
                                        aria-labelledby="pills-tab-two">
                                        <div id="tb2">
                                            @include('frontend.customer.property.table2')
                                        </div>

                                        <div class="cleafix"></div>
                                    </div>
                                </div>

                                <div id="wow" class="justify-content-center pagination p-4">
                                    {{ $properties->links() }}
                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END LISTING LIST -->

    <!-- CALL TO ACTION -->
    {{-- <section class="cta-v1 py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <h2 class="text-uppercase text-white">Looking To Sell Or Rent Your Property?</h2>
                    <p class="text-capitalize text-white">We Will Assist You In The Best And Comfortable Property
                        Services
                        For You
                    </p>

                </div>
                <div class="col-lg-3">
                    <a href="#" class="btn btn-light text-uppercase ">request a quote
                        <i class="fa fa-angle-right ml-3 arrow-btn "></i></a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- END CALL TO ACTION -->

    <script>
        $(function() {
            // $('#position-relative').addClass('animate__animated animate__zoomInDown');

            ajaxSuggestions();
            // $('#position-relative').addClass('animate__animated animate__zoomInDown');

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

    <script>
        function singleproperty(id) {
            // var val = $('#' + id).val()
            $('#app').addClass('animate__animated animate__fadeOut');
            // console.log(id);


            $.ajax({
                type: "GET",
                url: "property/" + id,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(responese) {


                    $('#app').removeClass('animate__animated animate__fadeOut');

                    $('#app').addClass('animate__animated animate__fadeIn');

                    $('#app').html(responese.data);
                    owl = $("#" + divId);

                    $('#app').trigger('destroy.owl.carousel').removeClass(
                        'owl-carousel owl-loaded');
                    $('#app').find('.owl-stage-outer').children().unwrap();
                    owl.owlCarousel({
                        loop: !0,
                        margin: 30,
                        dots: !0,
                        nav: 0,
                        rtl: !1,
                        autoplayHoverPause: !1,
                        autoplay: !0,
                        singleItem: !0,
                        smartSpeed: 1200,
                        navText: ['<i class="fa fa-arrow-left"></i>',
                            '<i class="fa fa-arrow-right"></i>'
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: !1
                            },
                            480: {
                                items: 1,
                                center: !1
                            },
                            600: {
                                items: 1,
                                center: !1
                            },
                            768: {
                                items: 2
                            },
                            992: {
                                items: 2
                            },
                            1200: {
                                items: 2
                            },
                            1366: {
                                items: 3
                            },
                            1400: {
                                items: 3
                            }
                        }
                    });
                    $('.owl-prev').hide()
                    $('.owl-next').hide()
                },
            });


        }

    </script>
    <script>
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            $('#tb1').addClass('animate__animated animate__fadeOut');
            $('#tb2').addClass('animate__animated animate__fadeOut');
            // $value = $('#keyword').val();
            var href = $(this).attr('href');
            // console.log(href);
            var page = $(this).attr('href').split('page=')[1];
            window.history.pushState('new', 'Title', href);
            // console.log(page);
            ajaxSearch(href);
        });

        function ajaxSearch(page) {
            $.ajax({
                type: "GET",
                url: "searchareas" + "" + page,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // data: {
                //     'keyword': value,
                // },
                success: function(responese) {


                    // console.log(responese.pagination)
                    $('#tb1').removeClass('animate__animated animate__fadeOut');
                    $('#tb2').removeClass('animate__animated animate__fadeOut');

                    $('#tb1').html(responese.tb1);
                    $('#tb2').html(responese.tb2);
                    $('#tb1').addClass('animate__animated animate__fadeIn');
                    $('#tb2').addClass('animate__animated animate__fadeIn');

                    $('#wow').html(responese.pagination);
                    // $('#total').html(responese.total);
                },
            });
        }

    </script>


@endsection
