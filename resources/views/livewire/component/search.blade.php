@php
function convert_rupee($amount)
{
    $length = strlen($amount);
    if ($length >= 6 && $length <= 7) {
        return round($amount / 100000, 2) . ' Lacs';
    } elseif ($length >= 8 && $length <= 9) {
        return round($amount / 10000000, 2) . ' Cr.';
    } elseif ($length >= 4 && $length <= 5) {
        return round($amount / 1000, 2) . ' K';
    } else {
        return 0;
    }
}
@endphp
<div>
    <!-- search-->
    <div class="container mb-3 pt-4">
        <div class="card">
            @if (isset($search))

                @if ($search == 'agency')

                    <div class="input-group"><span class="input-group-text" id="searchbox"><i
                                class="bi bi-search"></i></span>
                        <input class="form-control" type="text" placeholder="Search Agency"
                            wire:keyup="search('agency')" wire:model="searchagencies" aria-describedby="searchbox">
                    </div>

                @endif

                @if ($search == 'property')

                    <div class="card">
                        <div class="form-group mb-0">
                            <div class="input-group d-flex">
                                <input wire:model="searchproperties" wire:keyup="search('property')"
                                    class="form-control w-100" type="text" placeholder="Search Properties"
                                    aria-describedby="searchbox">
                                <i class="bi bi-search" wire:click="searchProperty"
                                    style="position: absolute;right: 10px; top: 12px"></i>
                            </div>

                            <div style="position: absolute;z-index: 999;width: 100%;max-height: 210px;overflow: auto;"
                                id="autoCompleteCountriesautocomplete-list" class="autocomplete-items">
                                @foreach ($suggestions as $count => $item)
                                    <div wire:click="elementChange('{{ @$item->name }}')">
                                        {{ @$item->name }},{{ @$item->parent }}
                                        {{-- <input type="hidden" value="{{ @$item->name }}"> --}}
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>



                @endif

            @endif
        </div>
    </div>
    <!-- Featured Properties-->
    <div class="top-products-area pb-2">
        <div class="container">
            <div class="row g-3">
                @if (isset($search))

                    @if ($search == 'agency')
                        @forelse ( $agencies as $item )

                            <div class="col-6 col-sm-4 col-lg-3">
                                <div class="card single-product-card">
                                    <div class="card-body p-3">
                                        <!-- Product Thumbnail--><a class="product-thumbnail d-block"
                                            href="{{ route('customer.agency.show', ['agency' => $item->id]) }}"><img
                                                src="https://chhatt.s3.ap-south-1.amazonaws.com/agencies/{{ $item->image }}"
                                                alt="">
                                            <!-- Product Title-->
                                            <h4 class="text-muted"><a class="product-title d-block text-truncate"
                                                    href="page-shop-details.html">{{ $item->name }}</a></h4>
                                            <!-- Product Details-->
                                            <h6><i class="bi bi-geo-alt"></i> {{ @$item->areaOne->name }},
                                                {{ @$item->areaTwo->name }} </h6>

                                    </div>
                                </div>
                            </div>

                        @empty

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-9 col-md-8 col-lg-6">
                                        <div class="card">
                                            <div class="card-body px-5 text-center"><img class="mb-4"
                                                    src="{{ asset('frontend2mob/img/bg-img/39.png') }}" alt="">
                                                <h4>OOPS... <br>Nothing Found</h4>
                                                <p class="mb-4">We couldn't find any results for your search. Try again.
                                                </p>
                                                {{-- <a class="btn btn-creative btn-danger" href="page-home.html">Go to Home</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforelse

                        @unless($agencies->isEmpty())

                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between direction-rtl">
                                            <div class="d-flex align-items-center justify-content-between direction-rtl">
                                                <div class="goto-page-form">
                                                    <div class="d-flex align-items-center" action="#">
                                                        <label for="gotoPageNumber m-0">Showing Result</label>
                                                        @if ($total < $loadmorecount)

                                                            <input class="form-control form-control-sm mx-2"
                                                                id="gotoPageNumber" type="text" value="{{ $total }}">

                                                        @else

                                                            <input class="form-control form-control-sm mx-2"
                                                                id="gotoPageNumber" type="text"
                                                                value="{{ $loadmorecount }}">

                                                        @endif

                                                        <label for="gotoPageNumber">Out Of</label>
                                                        <input class="form-control form-control-sm mx-2"
                                                            style="max-width: 60px !important;" id="gotoPageNumber"
                                                            type="text" value="{{ $total }}">
                                                    </div>
                                                </div>


                                                @unless($total <= $loadmorecount) <div
                                                        class="d-flex justify-content-center">
                                                        <a wire:click="loadmore('agency')" class="btn m-1 btn-light">
                                                            <svg class="bi bi-arrow-repeat me-2" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                                                </path>
                                                                <path fill-rule="evenodd"
                                                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                                                </path>
                                                            </svg><span wire:loading.remove wire:target="loadmore">Load
                                                                More</span>

                                                            <div wire:loading wire:target="loadmore">
                                                                Loading...
                                                            </div>
                                                        </a>
                                                </div>

                                            @endunless

                                            @unless($total > $loadmorecount)

                                                <div class="d-flex justify-content-center">
                                                    <a wire:click="$refresh" class="btn m-1 btn-light">
                                                        <svg class="bi bi-arrow-repeat me-2" width="16" height="16"
                                                            viewBox="0 0 16 16" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                                            </path>
                                                        </svg>Reload
                                                    </a>
                                                </div>
                                            @endunless

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endunless

                    @endif

                    @if ($search == 'property')

                        @forelse ( $propertiesitem as $item )
                            <div class="col-6 col-sm-4 col-lg-3">
                                <div class="card single-product-card">
                                    <div class="card-body p-3">
                                        <!-- Product Thumbnail-->
                                        <a class="product-thumbnail d-block"
                                            href="{{ route('customer.property.show', ['property' => $item->id]) }}"><img
                                                src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{ $item->images[0]->name }}"
                                                alt="">
                                            <!-- Badge--><span class="badge bg-warning ">PK
                                                {{ convert_rupee($item->price) }}</span></a>
                                        <!-- Product Title-->
                                        <h4 class="text-muted"><a class="product-title d-block text-truncate"
                                                href="page-shop-details.html">{{ $item->property_type }}
                                                {{ $item->property_for }}</a></h4>
                                        <!-- Product Details-->
                                        <h6 class="text-truncate"><i class="bi bi-geo-alt"></i>
                                            {{ $item->areaOne->name }} {{ $item->areaTwo->name }} </h6>
                                        <p class="text-truncate"><i class="bi bi-journals">{{ @$item->bath ?? '0' }}
                                            </i> <i class="bi bi-trash2-fill"> {{ $item->bed ?? 0 }} </i> <i
                                                class="bi bi-aspect-ratio"> {{ $item->size }}
                                                {{ $item->size_type }} </i></p>
                                    </div>
                                </div>
                            </div>

                        @empty

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-9 col-md-8 col-lg-6">
                                        <div class="card">
                                            <div class="card-body px-5 text-center"><img class="mb-4"
                                                    src="{{ asset('frontend2mob/img/bg-img/39.png') }}" alt="">
                                                <h4>OOPS... <br>Nothing Found</h4>
                                                <p class="mb-4">We couldn't find any results for your search. Try again.
                                                </p>
                                                {{-- <a class="btn btn-creative btn-danger" href="page-home.html">Go to Home</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforelse

                        @unless($propertiesitem->isEmpty())


                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between direction-rtl">
                                            <div class="d-flex align-items-center justify-content-between direction-rtl">
                                                <div class="goto-page-form">
                                                    <div class="d-flex align-items-center" action="#">
                                                        <label for="gotoPageNumber m-0">Showing Result</label>
                                                        @if ($total < $loadmorecount)

                                                            <input class="form-control form-control-sm mx-2"
                                                                id="gotoPageNumber" type="text"
                                                                value="{{ $total }}">

                                                        @else

                                                            <input class="form-control form-control-sm mx-2"
                                                                id="gotoPageNumber" type="text"
                                                                value="{{ $loadmorecount }}">

                                                        @endif
                                                        <label for="gotoPageNumber">Out Of</label>
                                                        <input class="form-control form-control-sm mx-2"
                                                            style="max-width: 60px !important;" id="gotoPageNumber"
                                                            type="text" value="{{ $total }}">
                                                    </div>
                                                </div>


                                                @unless($total <= $loadmorecount) <div
                                                        class="d-flex justify-content-center">
                                                        <a wire:click="loadmore('property')" class="btn m-1 btn-light">
                                                            <svg class="bi bi-arrow-repeat me-2" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                                                </path>
                                                                <path fill-rule="evenodd"
                                                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                                                </path>
                                                            </svg><span wire:loading.remove wire:target="loadmore">Load
                                                                More</span>

                                                            <div wire:loading wire:target="loadmore">
                                                                Loading...
                                                            </div>
                                                        </a>
                                                </div>
                                            @endunless

                                            @unless($total > $loadmorecount)

                                                <div class="d-flex justify-content-center">
                                                    <a wire:click="$refresh" class="btn m-1 btn-light">
                                                        <svg class="bi bi-arrow-repeat me-2" width="16" height="16"
                                                            viewBox="0 0 16 16" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                                            </path>
                                                        </svg>Reload
                                                    </a>
                                                </div>
                                            @endunless

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endunless

                    @endif

                @endif

            </div>
        </div>
    </div>
</div>
