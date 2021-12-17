@extends('frontend2.layouts.app')
@section('content')

    @include('frontend2.banners.mainbanner')
    @include('frontend2.section.cards')
    @include('frontend2.section.properties')
    @include('frontend2.section.projects')


    <script>
        loadMainBanner()
        loadFeaturedProperties()
        loadFeaturedProjects()
        ajaxSuggestions()
    </script>
@endsection
