@extends('frontend2mobile.layouts.app',['title'=>'Agency'])

@section('content')
    @livewire('component.search',['search'=>"agency",'agency'=>$agencies])
@endsection
