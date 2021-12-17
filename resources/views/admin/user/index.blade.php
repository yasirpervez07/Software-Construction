@extends('layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
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
                        <div class="col-md-12">


                            <div class="float-left mx-3 my-3">
                                <label>Role:</label>
                                <select style="width: 120%" class="form-control filter-control filter-select" id="role_id"
                                    name="role_id" onchange="filter(name=this.options[this.selectedIndex].value)">
                                    <option @if (request()->get('role_id') == null) selected @endif value="">Select
                                    </option>
                                    @foreach ($roles as $item)
                                        <option @if (request()->get('role_id') == $item->id) selected @endif value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>



                        {{-- <div class="col-md-0 mx-3 my-3">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('users.index') }}"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>

                        </div> --}}
                </div>
            </div>

            <div class="row mb-2">
                <div class=" heading col-sm-6">
                    <h1>Users</h1>
                </div>
                {{-- <button class="btn1 info filterbtn">Filter</button> --}}
                <div class="col-sm-2">
                    <span data-toggle="tooltip" title="Filter" class="filterbtn"><i id="icon"
                            class='fas fa-angle-down icon'></i></span>
                </div>
                <div class=" offset-sm-2  col-sm-2">
                    <h1 class="float-sm-right"><span id="total"
                            class="badge badge-pill total">{{ $users->total() }}</span></h1>
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

    </style>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card searcharea">
                    <div class="align-right">
                    </div>
                    <div class="card-header">
                        <br>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="align-items: center;">
                                <div style="display: flex;">
                                    <div class="input-group border rounded-pill keysearch">
                                        <input name="keyword" id="keyword" type="text" placeholder="Search"
                                            style="background: transparent;color: white" aria-describedby="button-addon3"
                                            class="form-control bg-none border-0 ">
                                        <div class="input-group-append border-0">
                                            <button id="button-addon3" type="submit" class="btn btn-link text-blue"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <a class="addbutton" href="{{ route('users.create') }}"><button type="button"
                                        class="btn btn-primary rounded-pill rounded-bill">Add
                                        User</button></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-dark table-dark table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Firebase ID</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Phone</th>
                                    <th>Mobile</th>
                                    <th>Locked</th>
                                    <th>Created At</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                @include('admin.user.usertable')
                            </tbody>
                        </table>
                        <div id="wow" class="align-right paginationstyle">
                            {{ $users->links() }}
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
        function filter(){
            var role_id = $('#role_id').children("option:selected").val();
            $('tbody').addClass('animate__animated animate__fadeOut');
            ajaxSearch(null,null,role_id);
        }

        $('#keyword').on('keyup', function() {
            $value = $(this).val();
            $('tbody').addClass('animate__animated animate__fadeOut');

            // console.log($value);

            // ager yeh lagaya tou role null chalajayega aur fresh serach houga

            ajaxSearch($value);

            // ager yeh lagaya tou role jo houga usmay serach houga

            // ajaxSearch($value,null,null);
        });

        function ajaxSearch(value, page,role_id) {
            $.ajax({
                type: "POST",
                url: "/usersajax" + "?page=" + page,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'keyword': value,
                    'role_id' : role_id
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
            var role_id = $('#role_id').children("option:selected").val();
            // console.log(href);
            ajaxSearch($value, page, role_id)
        });


        function statusToggle(id) {
            var val;

            if ($('#status' + id).prop("checked") == true) {
                // console.log("Checkbox is checked.");
                val = 1;
            } else if ($('#status' + id).prop("checked") == false) {
                // console.log("Checkbox is unchecked.");
                val = 0;
            }


            $.ajax({
                type: "POST",
                url: "user/locked",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    locked_id: id,
                    locked_val: val
                },
            });

        }

    </script>




@endsection
