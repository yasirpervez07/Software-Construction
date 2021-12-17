@extends('frontend2mobile.layouts.app',['title'=>'Agency Detail'])

@section('content')

@livewire('component.single-detail',['agency'=>$agency])

@endsection
