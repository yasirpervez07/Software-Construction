@extends('frontend2mobile.layouts.app',['title'=>'Property Detail'])

@section('content')

@livewire('component.single-detail',['property'=>$property])

@endsection
