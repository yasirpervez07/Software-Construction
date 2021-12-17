<!--=================================
Listing – grid view -->
<section class="p-4">
    <div class="">
        <div class="row">

            @include('frontend2.property.sidebar')

            <div class="col-lg-12">
                {{-- @include('frontend2.property.filters') --}}

                <div id="list" class="row mt-4">
                    @if (isset($properties))
                        @include('frontend2.property.list-item')
                    @endif
                </div>

                @if (isset($properties))
                {{ $properties->links('pagination::bootstrap-4') }}
                @endif

            </div>
        </div>
    </div>
</section>
<!--=================================
Listing – grid view -->
