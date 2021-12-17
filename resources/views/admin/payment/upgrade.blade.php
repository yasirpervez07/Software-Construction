@extends('layouts.app')
@section('content')
<center>
    <div style="padding-top:25%;">
    <a href="{{route('stripe')}}"><button class="btn btn-danger">Please upgrade to continue</button></a>
</div>
</center>

@endsection
