@extends('layouts.app')

@section('content')
    <style>
        /* not to change */
        /* body {
                            overflow-x: hidden
                        } */

        .navbar-custom {
            border: none !important;
        }

        .animate__animated.animate__fadeInDown {
            --animate-duration: 1.9s;
        }

        /* .ani {
                                                            position: relative;
                                                            animation: mymove 5s;
                                                            animation-iteration-count: 9999999;
                                                        }

                                                        @keyframes mymove {
                                                            from {
                                                                left: 0px;
                                                            }

                                                            to {
                                                                left: 10px;
                                                            }
                                                        } */

        .ani:hover {

            /* Start the shake animation and make the animation last for 0.5 seconds */
            animation: shake 0.3s;

            /* When the animation is finished, start again */
            animation-iteration-count: 1;
        }

        @keyframes shake {
            0% {
                transform: translate(1px, 1px) rotate(0deg);
            }

            10% {
                transform: translate(-1px, -2px) rotate(-1deg);
            }

            20% {
                transform: translate(-3px, 0px) rotate(1deg);
            }

            30% {
                transform: translate(3px, 2px) rotate(0deg);
            }

            40% {
                transform: translate(1px, -1px) rotate(1deg);
            }

            50% {
                transform: translate(-1px, 2px) rotate(-1deg);
            }

            60% {
                transform: translate(-3px, 1px) rotate(0deg);
            }

            70% {
                transform: translate(3px, 1px) rotate(-1deg);
            }

            80% {
                transform: translate(-1px, -1px) rotate(1deg);
            }

            90% {
                transform: translate(1px, 2px) rotate(0deg);
            }

            100% {
                transform: translate(1px, -2px) rotate(-1deg);
            }
        }

        .highlight:hover {
            /* background: #c5c3c396; */
            /* color: #26526a;
                                                                text-shadow: 1px 1px 1px #030e15f7, 0 0 35px #13547ac1, 0 0 5px #13547a; */
            /* color: white; */
            /* background-image: linear-gradient(121deg, #13547a 1%, #07100f 250%); */
            background-image: linear-gradient(121deg, #f5f6f7 1%, #07100f 250%);
            color: black;
            /* color: white */
            text-shadow: 3px 3px 4px #e8e8e8;
            text-transform: capitalize;
            transition: transform .3s;
            transform: scale(1.1);
        }

        .info-box {

            /* background-image: linear-gradient(249deg, #fff 88%, #09103fb9 89%); */
            /* background-image: linear-gradient(236deg, #fff 36%, #09103fb9 106%); */
            /* color: white; */
            /* border: 1px solid black; */
            /* background-image: linear-gradient(236deg, #000 59%, #ef7821 120%); */


            background-image: linear-gradient(236deg, rgb(255 255 255 / 20%) -165%, #ef7821 168%);

        }

        .rowf {
            /* background-image: linear-gradient(121deg, #09103f 1%, #80d0c7 250%); */
            background-image: linear-gradient(159deg, #000 1%, #ef7821 131%);
            padding-top: 10px;
            padding-bottom: 2px;
            border-radius: 0px 0px 12px 12px;

        }

        .card {
            box-shadow: 1px 1px 5px rgba(68, 83, 106, 0.652);
            /* box-shadow: 6px 6px 3px #09103f48; */
        }

        .card .card-header {
            color: #383636
        }

        .tablecard .card-header {
            color: #ffffff
        }

        .tablecard {
            background-color: #212529;
        }

        /* .collapsed-card .card-header {
                                    background: white;
                                    color: rgb(16, 15, 15);
                                } */

        .card-header {
            color: rgb(218, 218, 218);
        }


        @media screen and (max-width: 500px) {
            li.page-item {
                display: none;
            }

            .page-item:first-child,
            .page-item:nth-child(2),
            .page-item:nth-last-child(2),
            .page-item:last-child,
            .page-item.active,
            .page-item.disabled {
                display: block;
            }
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #ef7821;
            background-color: #141617;
            border: 0px solid #212529;
            /* font-family: Copperplate Gothic Light; */
        }

        .page-link:hover {
            color: #000;
            background-color: #ef7821;
            border: 0px solid #13547a;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #000;
            background-color: #ef7821;
            border-color: #141617;
        }

        .page-item.disabled .page-link {
            z-index: 3;
            color: #ef7821;
            background-color: #141617;
            border-color: #000;
        }

    </style>
    <div class="row rowf">
        <div id="infoxboxx1" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('icons/agent.png') }}"
                        style="width: 50px;height: 50px;"></span>

                <div class="info-box-content">
                    <span class="info-box-text">Agents</span>
                    <span class="info-box-number">
                        {{ $agent }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div id="infoxboxx2" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><img src="{{ asset('icons/agency.png') }}"
                        style="width: 60px;height: 50px;"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Agencies</span>
                    <span class="info-box-number">{{ $agency }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div id="infoxboxx3" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><img src="{{ asset('icons/properties.png') }}"
                        style="width: 60px;height: 50px;"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Properties</span>
                    <span class="info-box-number">{{ $properties->total() }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div id="infoxboxx4" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">General Members</span>
                    <span class="info-box-number">{{ $general_members }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row pt-4 animate__animated animate__fadeInUpBig">
        <div class="col-md-8">
            <div class="card tablecard">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Properties</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button> --}}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive table-striped table-dark">
                        <table class="table table-dark m-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Area</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Type</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($properties as $key=>$item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                            {{-- {{ ++$key }} --}}
                                        </td>

                                        <td>{{ optional($item->areaOne)->name }},{{ optional($item->areaTwo)->name }}
                                        </td>
                                        <td>
                                            @if ($item->price != null)
                                                <span class="badge badge-pill badge-success">
                                                    Rs.{{ $item->price }}
                                                </span>
                                            @else
                                                <span class="badge badge-pill badge-danger">
                                                    No Price
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <h6>{{ $item->size }}<span
                                                    class="badge badge-pill">{{ $item->size_type }}</span></h6>
                                        </td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <p>No Data Found</p>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="{{ route('properties.index') }}" class="btn btn-sm btn-info float-right">View All
                        Properties</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Recently Added Leads</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">

                        @foreach ($leads as $item)
                            <li class="item">
                                <div class="product-img">
                                    <div class="img-size-50">

                                        {{ $item->name }}
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{ $item->phone }}
                                        @if ($item->budget == null)
                                            <span class="badge badge-warning float-right">No Budget</span>
                                    </a>
                                @else
                                    <span class="badge badge-warning float-right">Rs.{{ $item->budget }}</span></a>
                        @endif
                        <span class="product-description">
                            {{ $item->description }}
                        </span>
                </div>
                </li>
                @endforeach
                {{-- <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Samsung TV
                                    <span class="badge badge-warning float-right">$1800</span></a>
                                <span class="product-description">
                                    Samsung 32" 1080p 60Hz LED Smart HDTV.
                                </span>
                            </div>
                        </li> --}}
                {{-- <div class="table-responsive table-striped">
                            <table class="table table-dark m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Area</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($properties as $key=>$item)
                                        <tr>
                                            <td>{{ ++$key }}</td>

                                            <td>{{ optional($item->areaOne)->name }},{{ optional($item->areaTwo)->name }}</td>
                                            <td>
                                                @if ($item->price != null)
                                                    <span class="badge badge-pill badge-success">
                                                        Rs.{{ $item->price }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">
                                                        No Price
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <h6>{{ $item->size }}<span
                                                        class="badge badge-pill">{{ $item->size_type }}</span></h6>
                                            </td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->description }}</td>
                                        </tr>
                                    @empty
                                        <p>No Data Found</p>
                                    @endforelse
                                </tbody>

                            </table>
                        </div> --}}

                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="{{ route('leads.index') }}" class="uppercase">View All Lead</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>

    </div>


    <div class="card tablecard">
        <div class="card-header border-transparent">
            <h3 class="card-title">Areas</h3>

            <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <!-- /.card-header -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="card-body p-0">
            <div class="table-responsive table-dark">
                <table class="table table-dark m-0 ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            {{-- <th>agents</th> --}}
                            <th>Agencies</th>
                            <th>Properties</th>
                            <th>Leads</th>

                        </tr>
                    </thead>
                    <tbody id="areatbody">
                        @include('hometable.areatable')
                    </tbody>

                </table>


                {{-- <nav aria-label="Page navigation example">
                    <div id="wow" class="pagination justify-content-center">
                        {{ $areas->links() }}
                    </div>
                </nav> --}}
                <div id="wow" class="justify-content-center pagination">
                    {{ $areas->links() }}
                </div>
            </div>
            <!-- /.table-responsive -->
        </div>


        <!-- /.card-body -->
        {{-- <div class="card-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right">View All Properties</a>
        </div> --}}
        <!-- /.card-footer -->
    </div>
    {{-- <script>
        function timeSince(date) {

            var seconds = Math.floor((new Date() - date) / 1000);

            var interval = seconds / 31536000;

            if (interval > 1) {
                return Math.floor(interval) + " years";
            }
            interval = seconds / 2592000;
            if (interval > 1) {
                return Math.floor(interval) + " months";
            }
            interval = seconds / 86400;
            if (interval > 1) {
                return Math.floor(interval) + " days";
            }
            interval = seconds / 3600;
            if (interval > 1) {
                return Math.floor(interval) + " hours";
            }
            interval = seconds / 60;
            if (interval > 1) {
                return Math.floor(interval) + " minutes";
            }
            return Math.floor(seconds) + " seconds";
        }
        // var aDay = 24 * 60 * 60 * 1000;
        console.log(timeSince(new Date(Date.now())));
        console.log(timeSince(new Date(Date.now())));

    </script> --}}

    <script>
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('tbody').addClass('animate__animated animate__fadeOut');

            // console.log(href);
            paginated(page)
            // getMoreUsers(page);
        });

        function paginated(page) {


            $.ajax({
                type: "POST",
                url: "home/ajaxSearch" + "?page=" + page,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {

                },
                success: function(responese) {
                    $('tbody').removeClass('animate__animated animate__fadeOut');

                    // console.log(responese.pagination)
                    $('#areatbody').html(responese.data);
                    $('tbody').addClass('animate__animated animate__fadeIn');

                    $('#wow').html(responese.pagination);
                },
            });
        }

    </script>
    <script>
        $('#infoxboxx1').hover(
            function() {
                $(this).addClass('animate__fadeOut')
            },
            function() {
                $(this).removeClass('animate__fadeOut')
            }
        )
        $('#infoxboxx2').hover(
            function() {
                $(this).addClass('animate__fadeOut')
            },
            function() {
                $(this).removeClass('animate__fadeOut')
            }
        )

        $('#infoxboxx3').hover(
            function() {
                $(this).addClass('animate__fadeOut')
            },
            function() {
                $(this).removeClass('animate__fadeOut')
            }
        )

        $('#infoxboxx4').hover(
            function() {
                $(this).addClass('animate__fadeOut')
            },
            function() {
                $(this).removeClass('animate__fadeOut')
            }
        )


    </script>

@endsection
