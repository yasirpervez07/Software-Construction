@extends('frontend2.layouts.app')
@section('content')

@include('frontend2.banners.agencybanner',['searchbar'=>true])
@include('frontend2.agency.list')

<script>
    loadAgencies()
    function loadAgencies() {
            $.ajax({
                type: "get",
                url: "{{ route('customer.agency.index') }}?view=2",
                dataType: 'html',
                success: function(response) {
                    console.log(response)
                    $('#list').append(response);
                }
            })
        }


        function searchAgencies(){
            event.preventDefault()
            var data = $('#searchform').serialize();
            console.log(data)
            $.ajax({
                type: "get",
                url: "{{ route('customer.agency.index') }}?view=2",
                data:data,
                dataType: 'html',
                success: function(response) {
                    // console.log(response)
                    $('#list').html(response);
                }
            })
        }
</script>
@endsection
