@extends('layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="heading col-sm-6">
                    <h1>Public Notices</h1>
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
                    <div class="card-header">
                        <br>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <form action="{{ route('publicnotice.index') }}" style="display: flex;">
                                    <div class="input-group border rounded-pill ">
                                        <input name="keyword" type="search" placeholder="Search"
                                            aria-describedby="button-addon3" class="form-control bg-none border-0">
                                        <div class="input-group-append border-0">
                                            <button id="button-addon3" type="submit" class="btn btn-link text-blue"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <a href="{{ route('publicnotice.create') }}"><button type="button"
                                        class="btn btn-primary rounded-pill rounded-bill">Add</button></a>
                            </div>
                        </div>

                    </div>


                    <div class="card-body table-responsive p-0">
                        <table class="table table-dark table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Plot/Bunglow/Flat No.</th>
                                    <th>Size</th>
                                    <th>Street/Area</th>
                                    <th>Phase/Sector/Block</th>
                                    <th>Agency</th>
                                    <th>Contact No.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($publicnotices as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->created_at->format('d-M-y') }}</td>
                                        <td>{{ @$item->property_number }}</td>
                                        <td>{{ @$item->size }} {{ @$item->size_type }}</td>
                                        <td>{{ @$item->areaOne->name }}</td>
                                        <td>{{ @$item->areaTwo->name }}</td>
                                        <td>{{ @$item->agency->name }}</td>
                                        <td>{{ @$item->number }}</td>
                                        <td>
                                            <a href="{{ route('publicnotice.edit', $item->id) }}" class="float-left"><i
                                                    class="fas fa-edit"></i></a>
                                            <form
                                                action="{{ route('publicnotice.destroy', ['publicnotice' => $item->id]) }}"
                                                method="POST">
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
                            {{ $publicnotices->links() }}
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
