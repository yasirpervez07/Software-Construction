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
    <div class="clearfix"></div>
@endsection
@section('content')


    <section id="app">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @include('frontend.customer.listingtable.propertiescontent');
    </section>
    <!-- END LISTING LIST -->

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
    {{-- <script>
        function singleproperty(id) {
            var val = $('#' + id).val()
            console.log(val);


            // $.ajax({
            //     type: "POST",
            //     url: "lead/ajax",
            //     dataType: 'JSON',
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     data: {
            //         callstatus_id: id,
            //         callstatus_val: val
            //     },
            // });
        }

        // function kjdkd(id){
        // .ajax({
        //     type: "POST",
        //     url: "property/ajax" + "?page=" + page,
        //     dataType: 'JSON',
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     data: {
        //         'keyword': page,
        //     },
        //     success: function(responese) {


        //         // console.log(responese.pagination)
        //         $('#tb1').removeClass('animate__animated animate__fadeOut');
        //         $('#tb2').removeClass('animate__animated animate__fadeOut');

        //         $('#tb1').html(responese.tb1);
        //         $('#tb2').html(responese.tb2);
        //         $('#tb1').addClass('animate__animated animate__fadeIn');
        //         $('#tb2').addClass('animate__animated animate__fadeIn');

        //         $('#wow').html(responese.pagination);
        //         // $('#total').html(responese.total);
        //     },
        // });

        }

    </script> --}}
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
            var page = $(this).attr('href').split('page=')[1];
            // console.log(page);
            ajaxSearch(page)
        });

        function ajaxSearch(page) {
            $.ajax({
                type: "POST",
                url: "property/ajax" + "?page=" + page,
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
