@extends('frontend2.layouts.app')
@section('content')
    {{-- @include('frontend2.property.searchbar') --}}
    @include('frontend2.banners.propertybanner')
    @include('frontend2.property.list')

    <script>
        loadProperties()
        loadPropertyBanner()


        function searchProperties() {
            event.preventDefault()
            var data = $('#searchform').serialize();
            // console.log(data)
            $.ajax({
                type: "get",
                url: "{{ route('customer.property.index') }}",
                data: data,
                dataType: 'html',
                success: function(response) {
                    // console.log(response)
                    $('#list').html(response);
                }
            })
        }
    </script>
@endsection
