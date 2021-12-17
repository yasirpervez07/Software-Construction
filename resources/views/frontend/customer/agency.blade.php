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
                            <h2 class="text-capitalize text-white ">agency list</h2>
                            <ul class="list-inline ">
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

                            </ul>
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



    <!-- LISTING LIST -->
    <section>
        <div class="profile__agency">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-none">
                        <!-- ARCHIVE CATEGORY -->
                        <div class=" wrapper__list__category">
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
                        </div>
                        <!-- End ARCHIVE CATEGORY -->
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

                    <div class="col-lg-12">
                        <meta name="csrf-token" content="{{ csrf_token() }}" />

                        <div class="p-5" style="display: flex;">
                            <div class="input-group border-bottom rounded-pill "
                                style="box-shadow: 0px 0px 7px rgb(48, 57, 131);">
                                <input style="background: transparent" name="keyword" id="keyword" type="text"
                                    placeholder="Search Agency" aria-describedby="loader"
                                    class="form-control bg-none border-0">
                                <div class="input-group-append border-0">
                                    <button id="loader" type="submit" class="btn btn-link text-blue"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="data" class="row">
                            @include('frontend.customer.agencytable')
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-6 mt-0">
                                <div class="cards">
                                    <div class="profile__agency-header">
                                        <a href="#" class="profile__agency-logo">
                                            <img src="images/500x400.jpg" alt="" class="img-fluid">
                                            <div class="total__property-agent">20 listing</div>
                                        </a>
                                    </div>
                                    <div class="profile__agency-body">
                                        <div class="profile__agency-info">
                                            <h5 class="text-capitalize">
                                                <a href="#" target="_blank">real estate company</a>
                                            </h5>
                                            <p class="text-capitalize mb-1">Los Angeles, city, United States of America
                                            </p>
                                            <ul class="list-unstyled mt-2">
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-building"></i>
                                                            office :</span> 123 456
                                                        789</a>
                                                </li>
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-phone"></i>
                                                            mobile :</span> 123 456
                                                        789</a></li>
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-fax"></i>
                                                            fax : </span> 342 655</a></li>
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-envelope"></i>
                                                            email :</span>
                                                        agents@property.com</a></li>
                                            </ul>
                                            <p class="mb-0 mt-3">
                                                <button class="btn btn-social btn-social-o facebook mr-1">
                                                    <i class="fa fa-facebook-f"></i>
                                                </button>
                                                <button class="btn btn-social btn-social-o twitter mr-1">
                                                    <i class="fa fa-twitter"></i>
                                                </button>

                                                <button class="btn btn-social btn-social-o linkedin mr-1">
                                                    <i class="fa fa-linkedin"></i>
                                                </button>
                                                <button class="btn btn-social btn-social-o instagram mr-1">
                                                    <i class="fa fa-instagram"></i>
                                                </button>

                                                <button class="btn btn-social btn-social-o youtube mr-1">
                                                    <i class="fa fa-youtube"></i>
                                                </button>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-0">
                                <div class="cards">
                                    <div class="profile__agency-header">
                                        <a href="#" class="profile__agency-logo">
                                            <img src="images/500x400.jpg" alt="" class="img-fluid">
                                            <div class="total__property-agent">20 listing</div>
                                        </a>
                                    </div>
                                    <div class="profile__agency-body">
                                        <div class="profile__agency-info">
                                            <h5 class="text-capitalize">
                                                <a href="#" target="_blank">real estate company</a>
                                            </h5>
                                            <p class="text-capitalize mb-1">Los Angeles, city, United States of America
                                            </p>
                                            <ul class="list-unstyled mt-2">
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-building"></i>
                                                            office :</span> 123 456
                                                        789</a>
                                                </li>
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-phone"></i>
                                                            mobile :</span> 123 456
                                                        789</a></li>
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-fax"></i>
                                                            fax : </span> 342 655</a></li>
                                                <li><a href="#" class="text-capitalize"><span><i class="fa fa-envelope"></i>
                                                            email :</span>
                                                        agents@property.com</a></li>
                                            </ul>
                                            <p class="mb-0 mt-3">
                                                <button class="btn btn-social btn-social-o facebook mr-1">
                                                    <i class="fa fa-facebook-f"></i>
                                                </button>
                                                <button class="btn btn-social btn-social-o twitter mr-1">
                                                    <i class="fa fa-twitter"></i>
                                                </button>

                                                <button class="btn btn-social btn-social-o linkedin mr-1">
                                                    <i class="fa fa-linkedin"></i>
                                                </button>
                                                <button class="btn btn-social btn-social-o instagram mr-1">
                                                    <i class="fa fa-instagram"></i>
                                                </button>

                                                <button class="btn btn-social btn-social-o youtube mr-1">
                                                    <i class="fa fa-youtube"></i>
                                                </button>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> --}}
                        <div id="wow" class="justify-content-center pagination">
                            {{ $agencies->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END LISTING LIST -->

    <!-- CALL TO ACTION -->
    <section class="bg-theme-v1">
        <div class="cta">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-12 text-center">
                        <h2 class="text-uppercase text-white">signup & build your dream house</h2>
                        <p class="text-capitalize text-white">We'll help you to grow your career and growth, please contact
                            team
                            walls real estate and get this offer promo</p>
                        <a href="#" class="btn btn-primary text-uppercase ">request a quote
                            <i class="fa fa-angle-right ml-3 arrow-btn "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CALL TO ACTION -->


    <script>
        $('#keyword').on('keyup', function() {
            var value = $(this).val();
            $('#loader').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
            $('#data').addClass('animate__animated animate__fadeOut');


            // console.log($value);
            ajaxSearch(value)
        });

        function ajaxSearch(value, page) {
            $.ajax({
                type: "POST",
                url: "agency/ajax" + "?page=" + page,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'keyword': value,
                },
                success: function(responese) {


                    // console.log(responese.pagination)
                    $('#data').removeClass('animate__animated animate__fadeOut');

                    // console.log(responese.pagination)

                    $('#data').html(responese.data);
                    $('#data').addClass('animate__animated animate__fadeIn');
                    $('#wow').html(responese.pagination);
                    $('#loader').html('<i class="fa fa-search"></i>');
                    // $('#total').html(responese.total);
                },
            });
        }
        //   {{-- ajaxSearch --}}

        //   {{-- ajaxPagination --}}
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            $value = $('#keyword').val();
            var href = $(this).attr('href');
            var page = $(this).attr('href').split('page=')[1];
            // console.log(href);
            ajaxSearch($value, page)
        });

    </script>
@endsection
