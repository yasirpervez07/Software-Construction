@foreach ($projects as $item)

<div class="item">
    <div class="property-item">
      <div class="property-image bg-overlay-gradient-04">
        <img class="img-fluid" src="{{$item->image}}" alt="">
        <div class="property-lable">
          <span class="badge badge-md badge-primary">Type</span>
          <span class="badge badge-md badge-info">Hot </span>

        </div>


        <div class="property-agent">
          <div class="property-agent-image">
            <img class="img-fluid" src="{{$item->image}}" alt="">
          </div>
          <div class="property-agent-info">
            <a class="property-agent-name" href="#">Alice Williams</a>
            <span class="d-block">Company Agent</span>
            <ul class="property-agent-contact list-unstyled">
              <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
              <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
            </ul>
          </div>
        </div>

      </div>
      <div class="property-details">
        <div class="property-details-inner">
          <h5 class="property-title"><a href="property-detail.html">{{$item->name}} </a></h5>
          <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{$item->address}}</span>
          <div class="property-price">PKR  </div>


          <ul class="property-info list-unstyled d-flex">
            <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>{{$item->bed}}</span></li>

          </ul>
        </div>
        <div class="property-btn">
          <a class="property-link" href="property-detail-style-01.html">See Details</a>
          <ul class="property-listing-actions list-unstyled mb-0">
            <li class="property-compare"><a data-toggle="tooltip" data-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
            <li class="property-favourites"><a data-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

@endforeach
