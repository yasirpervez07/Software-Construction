@extends('frontend2mobile.layouts.app',['title'=>'Home'])

@section('content')
    <livewire:section.hero-slider />
    <livewire:section.feature-card />
    <livewire:section.feature-properties />
    <livewire:section.add-linker />
    <livewire:section.feature-projects />
    <livewire:section.feature-builders />
    <livewire:section.feature-architecture />
@endsection
