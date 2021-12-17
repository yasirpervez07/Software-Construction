<div class="row">

    @forelse ($properties as $item)

        <div class="col-md-6 col-lg-4">
            <div class="card__image card__box-v1 cardbd" onclick="window.location='{{ route('customer.property.edit', $item->id) }}'" {{--id="tb2card{{$item->id}}"--}}>
                <div class="card__image-header h-250">
                    {{-- <div class="ribbon text-capitalize">featured</div> --}}
                    {{-- <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition"> --}}
                    @if (!$item->images->isEmpty())
                        <img src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{ $item->images[0]->name }}"
                            alt="" class="img-fluid w100 img-transition">
                    @else
                        <img src="https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg"
                            alt="" class="img-fluid w100 img-transition">

                    @endif
                    <div class="info"> {{ $item->property_for }}</div>
                </div>
                <div class="card__image-body">
                    <span class="badge badge-primary text-capitalize mb-2">{{ $item->property_type }}</span>
                    <h6 class="text-capitalize">
                        {{ $item->property_type }} in {{ optional($item->areaOne)->name }}
                    </h6>

                    <p class="text-capitalize">
                        <i class="fa fa-map-marker"></i>
                        {{ optional($item->areaThree)->name }}, {{ optional($item->areaTwo)->name }},
                        {{ optional($item->areaOne)->name }}
                    </p>
                    <ul class="list-inline card__content">
                        <li class="list-inline-item">

                            <span>
                                baths <br>
                                <i class="fa fa-bath"></i> {{ $item->bath }}
                            </span>
                        </li>
                        <li class="list-inline-item">
                            <span>
                                beds <br>
                                <i class="fa fa-bed"></i> {{ $item->bed }}
                            </span>
                        </li>
                        <li class="list-inline-item">
                            <span>
                                rooms <br>
                                <i class="fa fa-inbox"></i> {{ $item->bed }}
                            </span>
                        </li>
                        <li class="list-inline-item">
                            <span>
                                area <br>
                                <i class="fa fa-map"></i> {{ $item->size }} {{ $item->size_type }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card__image-footer">
                    <figure>
                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                    </figure>
                    <ul class="list-inline my-auto">
                        <li class="list-inline-item ">
                            <a href="#">
                                {{ optional($item->user)->name }}
                            </a>
                        </li>
                    </ul>
                    <ul class="list-inline my-auto ml-auto">
                        <li class="list-inline-item">
                            <h6>Rs. {{ $item->price }}</h6>
                        </li>

                    </ul>
                </div>
            </div>
        </div>


    @empty
        <p class="justify-content-center">No Property Found</p>
    @endforelse
</div>
