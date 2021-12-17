@extends('frontend2mobile.layouts.app',['title'=>'Properties'])

@section('content')

    @livewire('component.search',['search'=>"property",'properties'=>$properties])

@endsection
