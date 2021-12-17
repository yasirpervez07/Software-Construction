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
                            <h2 class="text-capitalize text-white ">Property Detail</h2>
                            {{-- <ul class="list-inline ">
                                <li class="list-inline-item">
                                    <a href="#" class="text-white">
                                        home
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-white">
                                        agency
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
    <div class="clearfix"></div>
@endsection

@section('content')

    <section id="main" class="single__Detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- SLIDER IMAGE DETAIL -->
                    <div class="slider__image__detail-large owl-carousel owl-theme">
                        @foreach ($property->images as $key => $item)

                            <div class="item">
                                <div class="slider__image__detail-large-one">
                                    <img src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{ $item->name }}"
                                        alt="" class="img-fluid w-100 img-transition">
                                    <div class="description">
                                        <figure>
                                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                                        </figure>
                                        <span class="badge badge-primary text-capitalize mb-2">house</span>
                                        <div class="price">
                                            <h5 class="text-capitalize">$13,000/mo</h5>
                                        </div>
                                        <h4 class="text-capitalize">{{$property->property_type}} in {{$property->areaOne->name}}</h4>

                                    </div>

                                </div>
                            </div>

                        @endforeach



                    </div>


                    <div class="slider__image__detail-thumb owl-carousel owl-theme">
                        @foreach ($property->images as $key => $item)
                            <div class="item">
                                <div class="slider__image__detail-thumb-one">
                                    <img src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{ $item->name }}"
                                        alt="" class="img-fluid w-100 img-transition">
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- END SLIDER IMAGE DETAIL -->
                    <div class="row">
                        <div class="col-md-9 col-lg-9">
                            <div class="single__detail-title mt-4">
                                <h3 class="text-capitalize">{{$property->property_type}} in {{$property->areaOne->name}}</h3>
                                <p> {{$property->address}}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="single__detail-price mt-4">
                                <h3 class="text-capitalize text-gray">$13.000/mo</h3>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i class="fa fa-print"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-exchange"></i></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i class="fa fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- DESCRIPTION -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single__detail-desc">
                                <h6 class="text-capitalize detail-heading">description</h6>
                                <div class="show__more">
                                    <p>{{ $property->description }}</p>

                                    <a href="javascript:void(0)" class="show__more-button ">read more</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!-- PROPERTY DETAILS SPEC -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">property details</h6>
                                <!-- INFO PROPERTY DETAIL -->
                                <div class="property__detail-info">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Property ID:</b> {{$property->id}}</li>
                                                <li><b>Price:</b> Rs.{{$property->price}}</li>
                                                <li><b>Property Size:</b> {{$property->size}} - {{$property->size_type}}</li>
                                                <li><b>Bedrooms:</b> {{$property->bed}}</li>
                                                <li><b>Bathrooms:</b> {{$property->bath}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">

                                                <li><b>Property Type:</b> {{$property->type}}</li>
                                                <li><b>Property Status:</b> {{$property->property_for}}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- <h6 class="text-primary">Additional details</h6>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Property ID:</b> RV151</li>
                                                <li><b>Price:</b> $484,400</li>
                                                <li><b>Property Size:</b> 1466 Sq Ft</li>
                                                <li><b>Bedrooms:</b> 4</li>
                                                <li><b>Bathrooms:</b> 2</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Garage:</b> 1</li>
                                                <li><b>Garage Size:</b> 458 SqFt</li>
                                                <li><b>Year Built:</b> 2019-01-09</li>
                                                <li><b>Property Type:</b> Full Family Home</li>
                                                <li><b>Property Status:</b> For rent</li>
                                            </ul>
                                        </div>
                                    </div> --}}

                                </div>
                                <!-- END INFO PROPERTY DETAIL -->
                            </div>
                            <!-- END PROPERTY DETAILS SPEC -->
                            <div class="clearfix"></div>

                            <!-- FEATURES -->
                            {{-- <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">features</h6>
                                <ul class="list-unstyled icon-checkbox">
                                    <li>air conditioning</li>
                                    <li>swiming pool</li>
                                    <li>Central Heating</li>
                                    <li>spa & massage</li>
                                    <li>pets allow</li>

                                    <li>air conditioning</li>
                                    <li>gym</li>
                                    <li>alarm</li>

                                    <li>window Covering</li>
                                    <li>free wiFi</li>
                                    <li>car parking </li>
                                </ul>
                            </div> --}}
                            <!-- END FEATURES -->

                            <!-- FLOR PLAN -->
                            {{-- <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">floor plan</h6>
                                <!-- FLOR PLAN IMAGE -->
                                <div id="accordion" class="floorplan" role="tablist">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <a class="text-capitalize" data-toggle="collapse" href="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                first floor <span class="badge badge-light rounded p-1 ml-2">460 sq
                                                    ft</span>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" role="tabpanel"
                                            aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <figure>
                                                    <img src="images/floorplan.jpg" alt="" class="img-fluid">
                                                </figure>

                                                Excepteur sint ocaec at cupdatat proident suntin culpa qui officia
                                                deserunt mol anim id esa laborum
                                                perspiciat.
                                                Duis aute irure dolor reprehenderit in voluptate velit essle cillum
                                                dolore eu fugiat nulla pariatur.

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">

                                            <a class="collapsed text-capitalize" data-toggle="collapse" href="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                second floor <span class="badge badge-light rounded p-1 ml-2">460 sq
                                                    ft</span>
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <figure>
                                                    <img src="images/floorplan2.jpg" alt="" class="img-fluid">
                                                </figure>
                                                They offers a host of logistic management services and supply chain . We
                                                provide innovative solutions
                                                with the best. tempor incididunt ut labore et dolor empor tempor
                                                incididunt innovative solutions

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingThree">
                                            <a class="collapsed text-capitalize" data-toggle="collapse"
                                                href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                garage <span class="badge badge-light rounded p-1 ml-2">460 sq ft</span>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" role="tabpanel"
                                            aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                <figure>
                                                    <img src="images/floorplan3.jpg" alt="" class="img-fluid">
                                                </figure>
                                                They offers a host of logistic management services and supply chain . We
                                                provide innovative solutions
                                                with the best. tempor incididunt ut labore et dolor empor tempor
                                                incididunt innovative solutions

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}
                            <!-- END FLOR PLAN -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">property video</h6>
                                <div class="single__detail-features-video">
                                    <figure class=" mb-0">
                                        <div class="home__video-area text-center">
                                            <img src="images/1920x1080.jpg" alt="" class="img-fluid">
                                            <a href="https://youtu.be/dQtLx6dsbcI" class="play-video-1 ">
                                                <i class="icon fa fa-play text-white"></i>
                                            </a>
                                        </div>

                                    </figure>
                                </div>
                            </div>

                            <!-- LOCATION -->
                            {{-- <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">location</h6>
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-map-location-tab" data-toggle="pill"
                                            href="#pills-map-location" role="tab" aria-controls="pills-map-location"
                                            aria-selected="true">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-street-view-tab" data-toggle="pill"
                                            href="#pills-street-view" role="tab" aria-controls="pills-street-view"
                                            aria-selected="false">
                                            <i class="fa fa-street-view "></i></a>
                                    </li>


                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-map-location" role="tabpanel"
                                        aria-labelledby="pills-map-location-tab">
                                        <div id="map-canvas">
                                            <iframe class="h600 w100"
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d50446.89789906054!2d-122.41577600000001!3d37.791654!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd473843de08ff793!2sBetter%20Property%20Management!5e0!3m2!1sen!2sus!4v1591226304089!5m2!1sen!2sus"
                                                style="border:0;" allowfullscreen="" aria-hidden="false"
                                                tabindex="0"></iframe>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="pills-street-view" role="tabpanel"
                                        aria-labelledby="pills-street-view-tab">
                                        <iframe class="h600 w100"
                                            src="https://www.google.com/maps/embed?pb=!4v1553797194458!6m8!1m7!1sR4K_5Z2wRHTk9el8KLTh9Q!2m2!1d36.82551718071267!2d-76.34864590837246!3f305.15097!4f0!5f0.7820865974627469"
                                            style="border:0;" allowfullscreen></iframe>
                                    </div>


                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div> --}}
                            <!-- END LOCATION -->

                            <!-- PROPERTY VIEWS -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">property views</h6>
                                <!-- CANVAS -->
                                <div class="wrapper">
                                    <canvas id="myChart" class="chart"></canvas>
                                </div>
                            </div>
                            <!-- END PROPERTY VIEWS -->

                            <!-- NEARBY -->
                            {{-- <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">what's nearby</h6>
                                <div class="single__detail-features-nearby">
                                    <h6 class="text-capitalize"><span>
                                            <i class="fa fa-building "></i></span>education</h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <span>Eladia's Kids</span>
                                            <p>2.5 km</p>
                                        </li>
                                        <li>
                                            <span>Brooklyn Brainery</span>
                                            <p>3.5 km</p>

                                        </li>
                                        <li>
                                            <span>Wikdom Senior High Scool</span>
                                            <p>2.5 km</p>
                                        </li>

                                    </ul>

                                    <h6 class="text-capitalize"><span><i class="fa fa-ambulance"></i></span>health &
                                        medical
                                    </h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <span>Eladia's Kids</span>
                                            <p>2.5 km</p>
                                        </li>
                                        <li>
                                            <span>Brooklyn Brainery</span>
                                            <p>3.5 km</p>

                                        </li>
                                        <li>
                                            <span>Wikdom Senior High Scool</span>
                                            <p>2.5 km</p>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                            <!-- END NEARBY -->

                            <!-- RATE US  WRITE -->
                            {{-- <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">Rate us and Write a Review</h6>
                                <div class="single__detail-features-review">
                                    <div class="media mt-4">
                                        <img class="mr-3 img-fluid rounded-circle" src="images/80x80.jpg" alt="">
                                        <div class="media-body">
                                            <h6 class="mt-0">{{$property->user->name}}</h6>
                                            <span class="mb-3">{{$property->created_at}}</span>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">3/5</li>
                                            </ul>
                                            <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus
                                                viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                                Donec
                                                lacinia congue felis in faucibus.</p>

                                            <div class="media mt-4">
                                                <a class="pr-3" href="#">
                                                    <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="mt-0">Christine </h6>
                                                    <span class="mb-3">Mei 13, 2020</span>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                        </li>
                                                        <li class="list-inline-item">5/5</li>
                                                    </ul>
                                                    <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                                        scelerisque ante sollicitudin. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media mt-4">
                                        <img class="mr-3 img-fluid rounded-circle" src="images/80x80.jpg" alt="">
                                        <div class="media-body">
                                            <h6 class="mt-0">Jhon Doe</h6>
                                            <span class="mb-3">Mei 13, 2020</span>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                </li>
                                                <li class="list-inline-item">5/5</li>
                                            </ul>
                                            <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus
                                                viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                                Donec
                                                lacinia congue felis in faucibus.</p>


                                        </div>
                                    </div>
                                    <!-- COMMENT -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="mb-2">Your rating for this listing:</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">3/5</li>
                                            </ul>
                                            <div class="form-group">
                                                <label>Your Name</label>
                                                <input type="text" class="form-control" required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>What's your Email?</label>
                                                <input type="email" class="form-control" required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Your message</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary float-right "> Submit review <i
                                            class="fa fa-paper-plane ml-2"></i></button>
                                    <!-- END COMMENT -->

                                </div>
                            </div> --}}
                            <!-- END RATE US  WRITE -->
                        </div>
                    </div>
                    <!-- END DESCRIPTION -->
                </div>
                <div class="col-lg-4">
                    <!-- FORM FILTER -->
                    {{-- <div class="products__filter mb-30">
                        <div class="products__filter__group">
                            <div class="products__filter__header">

                                <h5 class="text-center text-capitalize">property filter</h5>
                            </div>
                            <div class="products__filter__body">
                                <div class="form-group">

                                    <select class="wide select_option">
                                        <option data-display="Property Status">Property Status</option>
                                        <option>For Sale</option>
                                        <option>For Rent</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="wide select_option">
                                        <option data-display="Property Type">Property Type</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Land</option>
                                        <option>Luxury</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="wide select_option">
                                        <option data-display="Area From">Area From </option>
                                        <option>1500</option>
                                        <option>1200</option>
                                        <option>900</option>
                                        <option>600</option>
                                        <option>300</option>
                                        <option>100</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="wide select_option">
                                        <option data-display="Locations">Locations</option>
                                        <option>United Kingdom</option>
                                        <option>American Samoa</option>
                                        <option>Belgium</option>
                                        <option>Canada</option>
                                        <option>Delaware</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="wide select_option">
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
                                <div class="form-group">
                                    <div class="form-group">
                                        <select class="wide select_option">
                                            <option data-display="Bathrooms">Bathrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="mb-3">Price range</label>
                                    <div class="filter__price">
                                        <input class="price-range" type="text" name="my_range" value="" />
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-2">

                                    <a class="btn btn-outline-primary btn-block text-capitalize advanced-filter"
                                        data-toggle="collapse" href="#multiCollapseExample1"
                                        aria-controls="multiCollapseExample1"><i class="fa fa-plus-circle"></i> advanced
                                        filter
                                    </a>

                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="advancedfilter">
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2" class="label-brand text-capitalize">
                                                    Air Conditioning
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox3" type="checkbox">
                                                <label for="checkbox3" class="label-brand text-capitalize">
                                                    Swiming Pool
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox4" type="checkbox">
                                                <label for="checkbox4" class="label-brand text-capitalize">
                                                    Central Heating
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox5" type="checkbox">
                                                <label for="checkbox5" class="label-brand text-capitalize">
                                                    Spa & Massage
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox6" type="checkbox">
                                                <label for="checkbox6" class="label-brand text-capitalize">
                                                    Pets Allow
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox7" type="checkbox">
                                                <label for="checkbox7" class="label-brand text-capitalize">
                                                    Air Conditioning
                                                </label>

                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox8" type="checkbox">
                                                <label for="checkbox8" class="label-brand text-capitalize">
                                                    Gym
                                                </label>

                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox9" type="checkbox">
                                                <label for="checkbox9" class="label-brand text-capitalize">
                                                    Alarm
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox10" type="checkbox">
                                                <label for="checkbox10" class="label-brand text-capitalize">
                                                    Window Covering
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox11" type="checkbox">
                                                <label for="checkbox11" class="label-brand text-capitalize">
                                                    Free WiFi
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox12" type="checkbox">
                                                <label for="checkbox12" class="label-brand text-capitalize">
                                                    Car Parking
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary text-capitalize btn-block"><i
                                            class="fa fa-search ml-1"></i> search
                                        property </button>

                                </div>
                            </div>
                        </div>

                    </div> --}}
                    <!-- END FORM FILTER -->
                    <!-- FORM FILTER -->
                    {{-- <div class="products__filter mb-30">
                        <div class="products__filter__group">
                            <div class="products__filter__header">

                                <h5 class="text-center text-capitalize">simulation calculator </h5>
                            </div>
                            <div class="products__filter__body">
                                <div class="form-group">
                                    <label>Sale Price</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>

                                        </div>
                                        <input type="text" class="form-control" placeholder="$130.000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Down Payment</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="$6.000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Long Term (Years)</label>
                                    <select class="select_option wide">

                                        <option value="1">10</option>
                                        <option value="2">15</option>
                                        <option value="3">20</option>
                                        <option value="4">25</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Interest Rate</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">%</span>

                                        </div>
                                        <input type="text" class="form-control" placeholder="10%">
                                    </div>
                                </div>
                            </div>
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary text-capitalize btn-block"> calculate
                                        <i class="fa fa-calculator ml-1"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- END FORM FILTER -->
                    <div class="sticky-top">
                        <!-- PROFILE AGENT -->
                        <div class="profile__agent mb-30">
                            <div class="profile__agent__group">

                                <div class="profile__agent__header">
                                    <div class="profile__agent__header-avatar">
                                        <figure>
                                            <img src="https://chhatt.s3.ap-south-1.amazonaws.com/users/{{$property->user->thumbnail}}" alt="" class="img-fluid">
                                        </figure>

                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h5 class="text-capitalize">{{$property->user->name}}</h5>
                                            </li>
                                            <li><a href="tel:123456"><i
                                                        class="fa fa-phone-square mr-1"></i>{{$property->user->phone}}</a></li>
                                            <li><a href="javascript:void(0)"><i class=" fa fa-building mr-1"></i>
                                                {{optional(optional($property->user->agent)->agency)->name}}</a>
                                            </li>
                                            {{-- <li> <a href="javascript:void(0)" class="text-primary">View My Listing</a> --}}
                                            </li>
                                        </ul>


                                    </div>

                                </div>
                                <form action="{{route('leadproperties.store')}}" method="POST">
                                    @csrf
                                <div class="profile__agent__body">
                                    <div class="form-group">
                                        <input type="hidden" value="{{$property->id}}" name="property_id">
                                        <input type="hidden" value="{{$property->user->id}}" name="user_id">

                                        <input type="text" class="form-control" name="name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <textarea class="form-control required" rows="5" name="message" required="required"
                                            placeholder="I'm interest in [ Listing Single ]"></textarea>
                                    </div>
                                </div>
                                <div class="profile__agent__footer">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary text-capitalize btn-block"> send message <i
                                                class="fa fa-paper-plane ml-1"></i></button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <!-- END PROFILE AGENT -->
                        <div class="download mb-0">
                            <h5 class="text-center text-capitalize">Property Attachments</h5>
                            <div class="download__item">
                                <a href="#" target="_blank"><i class="fa fa-file-pdf-o mr-3" aria-hidden="true"></i>Download
                                    Document.Pdf</a>
                            </div>
                            <div class="download__item">
                                <a href="#" target="_blank"><i class="fa fa-file-word-o mr-3"
                                        aria-hidden="true"></i>Presentation
                                    2016-17.Doc</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SIMILIAR PROPERTY -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="similiar__item">
                        <h6 class="text-capitalize detail-heading">
                            similar properties
                        </h6>
                        <div class="similiar__property-carousel owl-carousel owl-theme">
                            @foreach ($similar_properties as $item)

                            <div class="item">
                                <!-- ONE -->
                                <div class="card__image">
                                    <div class="card__image-header h-250">
                                        {{-- <div class="ribbon text-capitalize">featured</div> --}}
                                        <img src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{$item->images[0]->name}}" alt="" class="img-fluid w100 img-transition">
                                        <div class="info">{{$item->property_for}}</div>
                                    </div>
                                    <div class="card__image-body">
                                        <span class="badge badge-primary text-capitalize mb-2">{{$item->property_type}}</span>
                                        <h6 class="text-capitalize">
                                            <a href="#">{{$item->property_type}} in {{$item->areaOne->name}}</a>
                                        </h6>

                                        <p class="text-capitalize">
                                            <i class="fa fa-map-marker"></i>
                                            {{$item->address}}
                                        </p>
                                        <ul class="list-inline card__content">
                                            <li class="list-inline-item">

                                                <span>
                                                    baths <br>
                                                    <i class="fa fa-bath"></i> {{$item->bath}}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    beds <br>
                                                    <i class="fa fa-bed"></i> {{$item->bed}}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    rooms <br>
                                                    <i class="fa fa-inbox"></i> {{$item->bed}}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    area <br>
                                                    <i class="fa fa-map"></i> {{$item->size}} {{$item->size_type}}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card__image-footer">
                                        <figure>
                                            <img src="https://chhatt.s3.ap-south-1.amazonaws.com/users/{{$item->user->thumbnail}}" alt="" class="img-fluid rounded-circle">
                                        </figure>
                                        <ul class="list-inline my-auto">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    {{$item->user->name}} <br>
                                                </a>

                                            </li>

                                        </ul>
                                        <ul class="list-inline my-auto ml-auto">
                                            <li class="list-inline-item">

                                                <h6 class="text-primary">$350.000</h6>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIMILIAR PROPERTY -->
        </div>

    </section>
    <!-- END SINGLE DETAIL -->

    <!-- CALL TO ACTION -->
    <section class="cta-v1 py-5">
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
    </section>
    <!-- END CALL TO ACTION -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->
    <script src="./js/index.bundle.js?fd365619e86ad9137a29"></script>
    <script src="./js/app.js"></script>
    <script>
        $(function() {
            // window.location.hash = 'main';
            // window.location.reload(true);
            $('#main').addClass('animate__animated animate__fadeIn');

            // ajaxSuggestions();
            // $('#position-relative').addClass('animate__animated animate__zoomInDown');

        })

    </script>
@endsection
