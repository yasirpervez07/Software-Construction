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
                            <h2 class="text-capitalize text-white ">Agency Detail</h2>
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

<section class="profile__agents">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row no-gutters">
                    <div class="col-lg-12 cards mt-0">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <a href="#" class="profile__agency-logo">
                                    <img src="https://chhatt.s3.ap-south-1.amazonaws.com/agencies/{{ $agency->image }}" alt="" class="img-fluid">

                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 my-auto">
                                <div class="profile__agency-info">
                                    <h5 class="text-capitalize">
                                        <a  target="_blank">{{$agency->name}}</a>
                                    </h5>
                                    <p class="text-capitalize mb-1">{{@$agency->areaTwo->name}} {{@$agency->areaOne->name}} ,{{@$agency->areaOne->city->name}}</p>

                                    <ul class="list-unstyled mt-2">
                                        <li><a  class="text-capitalize"><span><i class="fa fa-phone"></i>
                                            Name :</span> {{$agency->user->name}}</a></li>

                                        <li><a  class="text-capitalize"><span><i class="fa fa-phone"></i>
                                                    mobile :</span> {{$agency->user->phone}}</a></li>

                                        <li><a  class="text-capitalize"><span><i class="fa fa-envelope"></i>
                                                    email :</span>
                                                    {{$agency->user->email}}
                                                </a></li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LOCATION -->
                <div class="single__detail-features tabs__custom">
                    <h5 class="text-capitalize detail-heading ">Agency details</h5>
                    <!-- FILTER VERTICAL -->
                    <ul class="nav nav-pills myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active pills-tab-one" data-toggle="pill" href="#pills-tab-one"
                                role="tab" aria-controls="pills-tab-one" aria-selected="true">
                                Description
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link pills-tab-three" data-toggle="pill" href="#pills-tab-three"
                                role="tab" aria-controls="pills-tab-three" aria-selected="false">
                                Agents</a>
                        </li>



                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pills-tab-one" role="tabpanel"
                            aria-labelledby="pills-tab-one">
                            <div class="single__detail-desc">
                                <h5 class="text-capitalize detail-heading">Hi, nice to meet you</h5>
                                <div class="show__more">
                                    <p>Evans Tower very high demand corner junior one bedroom plus a large balcony
                                        boasting
                                        full open NYC views. You need to see the views to believe them. Mint
                                        condition
                                        with
                                        new hardwood floors. Lots of closets plus washer and dryer.</p>
                                    <p>
                                        Fully furnished. Elegantly appointed condominium unit situated on premier
                                        location.
                                        PS6. The wide entry hall leads to a large living room with dining area. This
                                        expansive 2 bedroom and 2 renovated marble bathroom apartment has great
                                        windows.
                                        Despite the interior views, the apartments Southern and Eastern exposures
                                        allow
                                        for
                                        lovely natural light to fill every room. The master suite is surrounded by
                                        handcrafted milkwork and features incredible walk-in closet and storage
                                        space.
                                    </p>
                                    <p>Fully furnished. Elegantly appointed condominium unit situated on premier
                                        location. PS6. The wide entry hall leads to a large living room with dining
                                        area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has
                                        great windows. Despite the interior views, the apartments Southern and
                                        Eastern
                                        exposures allow for lovely natural light to fill every room. The master
                                        suite is
                                        surrounded by handcrafted milkwork and features incredible walk-in closet
                                        and
                                        storage space.</p>
                                    <a href="javascript:void(0)" class="show__more-button ">read more</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="tab-pane fade" id="pills-tab-three" role="tabpanel"
                            aria-labelledby="pills-tab-three">
                            <div class="row no-gutters">
                                @foreach ($agents as $item)


                                <div class="col-lg-12 cards">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <a href="#" class="profile__agents-avatar">
                                                <img src="https://chhatt.s3.ap-south-1.amazonaws.com/users/{{ $item->user->thumbnail }}" alt="" class="img-fluid ">

                                            </a>
                                        </div>
                                        <div class="col-md-6 col-lg-6 my-auto">
                                            <div class="profile__agents-info">
                                                <h4 class="text-capitalize">
                                                    <a  target="_blank">{{$item->user->name}}</a>
                                                </h4>
                                                <h6 class="text-capitalize">
                                                    <a  target="_blank">Property Agent</a>
                                                </h6>


                                                <ul class="list-unstyled mt-2">

                                                    <li><a  class="text-capitalize"><span><i
                                                                    class="fa fa-phone"></i> mobile :</span> {{$item->user->phone}}</a></li>

                                                    <li><a  class="text-capitalize"><span><i
                                                                    class="fa fa-envelope"></i> email :</span> {{$item->user->email}}</a></li>
                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="clearfix"></div>
                        </div>



                    </div>
                    <!-- END FILTER VERTICAL -->
                </div>
                <!-- END LOCATION -->
            </div>
            {{-- <div class="col-lg-4">
                <div class="sticky-top">
                    <!-- FORM FILTER -->
                    <div class="products__filter mb-30">
                        <div class="products__filter__group">
                            <div class="products__filter__header">
                                <h5 class="text-center text-capitalize">Contact Form</h5>
                            </div>
                            <div class="products__filter__body">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email (Optional)</label>
                                    <input type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Your message</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>

                            </div>
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary text-capitalize btn-block"> submit <i
                                            class="fa fa-paper-plane ml-1"></i></button>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END FORM FILTER -->
                    <!-- ARCHIVE CATEGORY -->
                    <aside class=" wrapper__list__category">
                        <!-- CATEGORY -->
                        <div class="widget widget__archive">
                            <div class="widget__title">
                                <h5 class="text-dark mb-0 text-center">Categories Property</h5>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="text-capitalize">
                                        apartement
                                        <span class="badge badge-primary">14</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        villa
                                        <span class="badge badge-primary">4</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        family house
                                        <span class="badge badge-primary">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        modern villa
                                        <span class="badge badge-primary">8</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        town house
                                        <span class="badge badge-primary">10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        office
                                        <span class="badge badge-primary">12</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END CATEGORY -->
                    </aside>
                    <!-- End ARCHIVE CATEGORY -->

                    <div class="download mb-0">
                        <h5 class="text-center text-capitalize">Property Attachments</h5>
                        <div class="download__item">
                            <a href="#" target="_blank"><i class="fa fa-file-pdf-o mr-3"
                                    aria-hidden="true"></i>Download Document.Pdf</a>
                        </div>
                        <div class="download__item">
                            <a href="#" target="_blank"><i class="fa fa-file-word-o mr-3"
                                    aria-hidden="true"></i>Presentation
                                2016-17.Doc</a>
                        </div>
                    </div>
                </div>

            </div> --}}

        </div>
    </div>
</section>
@endsection
