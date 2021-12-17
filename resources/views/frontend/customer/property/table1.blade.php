@forelse ($properties as $item)
    <div class="row">
        <div class="col-lg-12">
            <div class="card__image card__box-v1 cardbd " onclick="singleproperty('{{$item->id}}');">
                <div class="row no-gutters" id="tb1card{{$item->id}}">
                    <div class="col-md-4 col-lg-3 col-xl-4">
                        <div class="card__image__header h-250">
                            <a>
                                {{-- <div class="ribbon text-capitalize">sold out</div> --}}
                                @if (!$item->images->isEmpty())
                                    <img src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{ $item->images[0]->name }}"
                                        alt="" class="img-fluid w100 img-transition">
                                @else
                                    <img src="https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg"
                                        alt="" class="img-fluid w100 img-transition">

                                @endif
                                <div class="info"> {{ $item->property_for }}</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-6 col-xl-5 my-auto">
                        <div class="card__image__body">

                            <span class="badge badge-primary text-capitalize mb-2">{{ $item->property_type }}</span>
                            <h6>
                                <a>{{$item->property_type}} in {{optional($item->areaOne)->name}}</a>
                            </h6>
                            <div class="card__image__body-desc">
                                {{-- <p class="text-capitalize">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Libero, alias!

                                </p> --}}
                                <p class="text-capitalize">
                                    <i class="fa fa-map-marker"></i>
                                    {{optional($item->areaThree)->name}}, {{optional($item->areaTwo)->name}}, {{optional($item->areaOne)->name}}
                                </p>
                            </div>

                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> {{$item->bath}}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> {{$item->bed}}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> {{$item->bed}}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> {{$item->size}} {{$item->size_type}}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 my-auto card__image__footer-first">
                        <div class="card__image__footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item name">
                                    <a href="#">
                                        {{optional($item->user)->name}}
                                    </a>

                                </li>


                            </ul>
                            <ul class="list-inline my-auto ml-auto price">
                                <li class="list-inline-item ">

                                    <h6>Rs. {{$item->price}}</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <p class="justify-content-center">No Property Found</p>
@endforelse

