@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <!-- /.card -->
                <!-- Form Element sizes -->
                <!-- /.card -->
                <!-- /.card -->
                <!-- Input addon -->
                <!-- /.card -->
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Property For</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">

                        <form action="{{ route('publicnotice.update', $publicnotice->id) }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Plot/Bunglow/Flat No.</label>
                                    <div class="col-sm-6">
                                        <input required type="text" value="{{ $publicnotice->property_number }}"
                                            name="property_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Size</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" name="size"
                                            placeholder="Enter Size" value="{{ $publicnotice->size }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Size Type</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="size_type">
                                            <option disabled selected value="">Select Size Type</option>
                                            <option @if ($publicnotice->size_type == 'sq ft.') selected @endif value="sq ft.">Square ft.</option>
                                            <option @if ($publicnotice->size_type == 'yards') selected @endif value="yards">Square Yards</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Street/Area</label>
                                    <div class="col-sm-6">
                                        <select required class="form-control" name="area_one_id" id="area_one_id">
                                            @foreach ($areaones as $item)
                                                <option @if ($publicnotice->area_one_id == $item->id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Phase/Sector/Block</label>
                                    <div class="col-sm-6">
                                        <select required class="form-control" name="area_two_id" id="area_two_id">
                                            @foreach ($areatwos as $item)
                                                <option @if ($publicnotice->area_two_id == $item->id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }} -
                                                    {{ $item->area_one->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Agency</label>
                                    <div class="col-sm-6">
                                        <select required class="form-control" name="agency_id" id="agency_id">
                                            @foreach ($agencies as $item)
                                                <option @if ($publicnotice->agency_id == $item->id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Contact No.</label>
                                    <div class="col-sm-6">
                                        <input required type="number" name="number" value="{{ $publicnotice->number }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-10">
                                        <button type="submit" class="btn btn-info rounded-bill rounded-pill">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer">
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer --> --}}
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
@endsection
