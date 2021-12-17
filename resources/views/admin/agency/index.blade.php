@extends('layouts.app')
@section('content')

    <section class="content-header">
        <div class="row">
            <div class="filtersdiv">

                <style>
                    /* .filtersdiv {
                                    border: 1px solid;
                                    border-color: lightgray;
                                    border-radius: 100px;
                                    margin: 3px;
                                    width: 80%;
                                } */
                    .filter-control {
                        display: inline;
                    }

                    .filters .select2-container--default .select2-selection--single {
                        /* width: 220px; */
                    }

                </style>

                <div class="filters row" style="display:none">
                    <form action="{{ route('agencies.filter') }}">
                        @csrf
                        <div class="col-md-12">


                            <div class="float-left mx-3 my-3">
                                <label> Status:</label><br>
                                <select style="width: 129%" class="form-control filter-control filter-select" name="status">
                                    <option @if (request()->get('status') == null) selected @endif value="">Select
                                    </option>
                                    <option @if (request()->get('status') == '1') selected @endif value="1">Active</option>
                                    <option @if (request()->get('status') == '0') selected @endif value="0">Non Active</option>

                                </select>
                            </div>
                            <div class="float-left mx-4 my-3">
                                <label>Verified:</label><br>
                                <select style="width: 140%" class="form-control abc filter-control filter-select"
                                    name="verified">
                                    <option @if (request()->get('verified') == null) selected @endif value="">Select
                                    </option>
                                    <option @if (request()->get('verified') == '1') selected @endif value="1">Verified</option>
                                    <option @if (request()->get('verified') == '0') selected @endif value="0">Non Verified</option>

                                </select>
                            </div>

                            <div class="float-left mx-4 my-3">
                                <label>Major Area:</label><br>
                                <select style="width: 140%" class="form-control abc filter-control filter-select"
                                    name="area_one_id">
                                    <option @if (request()->get('area_one_id') == null) selected @endif value="">Select
                                    </option>
                                    @foreach ($area_one as $item)


                                        <option @if (request()->get('area_one_id') == $item->id) selected @endif value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="float-left mx-4 my-3">
                                <label>Minor Area:</label><br>
                                <select style="width: 140%" class="form-control abc filter-control filter-select"
                                    name="area_two_id">
                                    <option @if (request()->get('area_two_id') == null) selected @endif value="">Select
                                    </option>
                                    @foreach ($area_two as $item)


                                        <option @if (request()->get('area_two_id') == $item->id) selected @endif value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="float-left mx-4 my-3">
                                <label>Created At:</label><br>
                                <select style="width: 140%" class="form-control abc filter-control filter-select"
                                    name="created_at">
                                    <option @if (request()->get('created_at') == null) selected @endif value="">Select
                                    </option>
                                    <option @if (request()->get('created_at') == '1') selected @endif value="ascending">Ascending</option>
                                    <option @if (request()->get('created_at') == '0') selected @endif value="descending">Descending</option>

                                </select>
                            </div>

                            <div class="float-left mx-4 my-3">
                                <label>Updated At:</label><br>
                                <select style="width: 140%" class="form-control abc filter-control filter-select"
                                    name="updated_at">
                                    <option @if (request()->get('updated_at') == null) selected @endif value="">Select
                                    </option>
                                    <option @if (request()->get('updated_at') == '1') selected @endif value="ascending">Ascending</option>
                                    <option @if (request()->get('updated_at') == '0') selected @endif value="descending">Descending</option>

                                </select>
                            </div>
                            <div class="col-md-0 mx-3 my-3">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{ route('agencies.index') }}"><button type="button"
                                        class="btn btn-danger">Cancel</button></a>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="heading col-sm-6">
                    <h1>Agencies</h1>
                </div>
                <div class="col-sm-2">
                    <span data-toggle="tooltip" title="Filter" class="filterbtn"><i id="icon"
                            class='fas fa-angle-down icon'></i></span>
                </div>
                <div class="offset-sm-2 col-sm-2">
                    <h1 class="float-sm-right"><span id="total"
                            class="badge badge-pill total">{{ $agencies->total() }}</span></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <style>
        .btn1 {
            border: 2px solid black;
            background-color: white;
            color: black;
            padding: 8px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 25px;
        }

        .info {
            border-color: #1F6182;
            color: #1F6182;
        }

        .info:hover {
            background: #1F6182;
            color: white;
        }

        .abc {
            width: 200%;
        }

    </style>

    <div class="container-fluid">
        {{-- <button class="btn1 info filterbtn">Filter</button> --}}


        <div class="col-12">

            <div class="card searcharea">
                <div class="align-right">
                </div>
                <div class="card-header">
                    <br>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="align-items: center">
                            <div style="display: flex;">
                                <div class="input-group border rounded-pill keysearch">
                                    <input id="keyword" name="keyword" type="text" placeholder="Search"
                                        style="background: transparent;color: white" aria-describedby="button-addon3"
                                        class="form-control bg-none border-0">
                                    <div class="input-group-append border-0">
                                        <button id="button-addon3" type="submit" class="btn btn-link text-blue"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>

                            <a class="addbutton" href="{{ route('agencies.create') }}"><button type="button"
                                    class="btn btn-primary rounded-pill rounded-bill">Add
                                    Agency</button></a>
                        </div>
                    </div>

                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-dark table-dark table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>User</th>
                                <th>Area</th>
                                <th>Major Area</th>
                                <th>Minor Area</th>

                                <th>Contact</th>
                                <th>Status</th>
                                <th>Verified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            @include('admin.agency.table')
                        </tbody>
                    </table>
                    <div id="wow" class="align-right paginationstyle">
                        {{ $agencies->links() }}
                    </div>
                </div>
            </div>
            <!-- /.card-header -->


            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>
    </div>

    <script>
        var icon = document.getElementById("icon");
        var toggleiconnumb = 0;
        $('.filterbtn').on('click', function() {
            toggleicon();
            tooglefilter();
        })

        function toggleicon() {
            if (toggleiconnumb == 1) {
                icon.className = "fas fa-angle-down icon";
                toggleiconnumb = 0;
            } else {
                icon.className = "fas fa-angle-up icon";
                toggleiconnumb = 1;
            }
        }

        function tooglefilter() {
            $('.filters').toggle(300);
        }

    </script>

    <script>
        //   {{-- ajaxSearch --}}


        $('#keyword').on('keyup', function() {
            $value = $(this).val();
            $('tbody').addClass('animate__animated animate__fadeOut');


            // console.log($value);
            ajaxSearch($value)
        });

        function ajaxSearch(value, page) {
            $.ajax({
                type: "POST",
                url: "/agenciesajax" + "?page=" + page,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'keyword': value,
                },
                success: function(responese) {


                    // console.log(responese.pagination)
                    $('tbody').removeClass('animate__animated animate__fadeOut');

                    $('tbody').html(responese.data);
                    $('tbody').addClass('animate__animated animate__fadeIn');
                    $('#wow').html(responese.pagination);
                    $('#total').html(responese.total);
                },
            });
        }
        //   {{-- ajaxSearch --}}

        //   {{-- ajaxPagination --}}
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            $value = $('#keyword').val();
            $('tbody').addClass('animate__animated animate__fadeOut');


            var href = $(this).attr('href');
            var page = $(this).attr('href').split('page=')[1];
            // console.log(href);
            ajaxSearch($value, page)
        });

    </script>
@endsection
