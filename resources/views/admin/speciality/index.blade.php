@extends('layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Speciality</h1>
                </div>
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div> --}}
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card searcharea">
                    <div class="align-right">
                    </div>
                    <div class="card-header" style="padding-left:1% ">
                        <h3 class="card-title"><button style="padding: 3px" type="button" class="btn btn-primary">
                                TOTAL <span class="badge badge-pill badge-light">{{$specialities->total()}}</span>
                            </button></h3>
                        <br>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <form action="{{ route('specialities.index') }}" style="display: flex;">
                                    <input type="text" name="keyword" id="keyword" class="form-control check"
                                        placeholder="Search" style="height:93%; width:40%; margin-left:auto;">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default mr-2  "><i
                                                class="fas fa-search"></i></button>
                                </form>

                                <a href="{{ route('specialities.create') }}"><button type="button" class="btn btn-primary">Add
                                        Category</button></a>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-dark table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($specialities as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('specialities.edit', $item->id) }}" class="float-left"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('specialities.destroy', $item->id) }}" method="POST">
                                            @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                    class="fas fa-trash-alt"></i></button> </form>
                                    </td>
                                </tr>
                            @empty
                                <p>No Data Found</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="align-right paginationstyle">
                        {{ $specialities->links() }}
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

@endsection
