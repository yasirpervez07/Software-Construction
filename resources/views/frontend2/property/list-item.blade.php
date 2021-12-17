@foreach ($properties as $item)

    <div class="col-sm-3">
        <div class="property-item">
            <div class="property-image bg-overlay-gradient-04">
                <a href="{{ route('customer.property.show', $item->id) }}">
                    <img class="img-fluid img-fluid1" style="width: 100%; height:165px;"
                        src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{ $item->images[0]->name }}"
                        alt="">
                </a>

                <div class="property-lable">
                    <span class="badge badge-md badge-primary">{{ $item->property_type }}</span>
                    <span class="badge badge-md badge-info">{{ $item->property_for }} </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                    <div class="property-agent-image">
                        <img class="img-fluid" src="images/avatar/01.jpg" alt="">
                    </div>
                    <div class="property-agent-info">
                        <a class="property-agent-name" href="#">{{ $item->user->name }}</a>
                        <span
                            class="d-block">{{ optional(optional(optional($item->user)->agent)->agency)->name }}</span>
                        <ul class="property-agent-contact list-unstyled">
                            <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                            <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="property-agent-popup">
                    <a href="#"><i class="fas fa-camera"></i> {{ count($item->images) }}</a>
                </div>
            </div>
            <div class="property-details">
                <div class="property-details-inner">
                    <h5 class="property-title"><a href="property-detail-style-01.html">{{ $item->property_type }}
                            at {{ $item->areaOne->name }}  for {{ $item->property_for }} </a></h5>
                    <span class="property-address"><i
                            class="fas fa-map-marker-alt fa-xs"></i>{{ $item->areaOne->name }},
                        {{ $item->areaTwo->name }}</span>
                    <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days
                        ago</span>
                    <div class="property-price">Rs. {{ number_format($item->price) }}<span> / month</span> </div>
                    <ul class="property-info list-unstyled d-flex">
                        <li class="flex-fill property-bed"><i
                                class="fas fa-bed"></i>Bed<span>{{ $item->bed }}</span>
                        </li>
                        <li class="flex-fill property-bath"><i
                                class="fas fa-bath"></i>Bath<span>{{ $item->bath }}</span></li>
                        <li class="flex-fill property-m-sqft"><i
                                class="far fa-square"></i>{{ $item->size_type }}<span>{{ $item->size }}</span></li>

                    </ul>
                </div>
                <div class="property-btn">
                    <a class="property-link" href="{{ route('customer.property.show', $item->id) }}">See Details</a>
                    <ul class="property-listing-actions list-unstyled mb-0">
                        <li class="property-compare"><a data-toggle="tooltip" data-placement="top" title="Compare"
                                href="#"><i class="fas fa-exchange-alt"></i></a></li>
                        <li class="property-favourites"><a data-toggle="tooltip" data-placement="top" title="Favourite"
                                href="#"><i class="far fa-heart"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
