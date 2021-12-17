@extends('frontend2.layouts.app')
@section('content')
@include('frontend2.banners.propertybanner')

<div class="wrapper">
    <!--=================================
    Property Detail -->
    <section class="p-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="property-detail-title">
              <h3>{{$property->property_type}} {{$property->property_for}} in {{$property->areaOne->name}}, {{$property->areaTwo->name}}</h3>
              <span class="d-block mb-4"><i class="fas fa-map-marker-alt fa-xs pr-2"></i>{{$property->address}}</span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="price-meta">
              <div class="mb-4 d-inline">
                <span class="price font-xll text-primary mr-2">Rs. {{$property->price}}</span>
                <span class="sub-price font-lg text-dark"><b>$6,500/Sqft </b> </span>
              </div>
              <ul class="property-detail-meta list-unstyled mt-1 mb-5 mb-lg-3">
                <li><a href="#"> <i class="fas fa-star text-warning pr-2"></i>3.9/5 </a></li>
                <li class="share-box">
                  <a href="#"> <i class="fas fa-share-alt"></i> </a>
                  <ul class="list-unstyled share-box-social">
                    <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-pinterest"></i></a> </li>
                  </ul>
                </li>
                <li><a href="#"> <i class="fas fa-heart"></i> </a></li>
                <li><a href="#"> <i class="fas fa-exchange-alt"></i> </a></li>
                <li><a href="#"> <i class="fas fa-print"></i> </a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
            <div class="sticky-top">
              <div class="sidebar">
                <div class="agent-contact mb-4">
                  <div class="agent-contact-inner bg-light p-4">
                    <div class="d-flex align-items-center mb-4">
                      <div class="agent-contact-avatar mr-3">
                        <img class="img-fluid rounded-circle avatar avatar-lg" src="images/avatar/01.jpg" alt="">
                      </div>
                      <div class="agent-contact-name">
                        <h6 class="">{{$property->user->name}}</h6>
                        <span>{{optional(optional($property->user->agent)->agency)->name}}</span>
                      </div>
                    </div>
                    <div class="d-flex mb-4 align-items-center">
                      <h6 class="text-primary border p-2 mb-0"><a href="#"><i class="fas fa-phone-volume pr-2"></i>(123) 345-6789</a></h6>
                      <a class="btn btn-link p-0 ml-auto" href="property-list.html"><u>View all listing </u></a>
                    </div>
                    <form>
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your email Adress">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Phone number">
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Write Message"></textarea>
                      </div>
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label font-sm" for="customCheck1">I here by agree for processing my personal data </label>
                      </div>
                      <a class="btn btn-primary btn-block" href="#">Send Message</a>
                    </form>
                  </div>
                </div>

                <div class="widget bg-light">
                  <div class="widget-title">
                    <h6>Recently listed properties</h6>
                  </div>
                  <div class="recent-list-item">
                    <img class="img-fluid" src="images/property/list/01.jpg" alt="">
                    <div class="recent-list-item-info">
                      <a class="address mb-2" href="#">Ample apartment at last floor</a>
                      <span class="text-primary">$1,147,457 </span>
                    </div>
                  </div>
                  <div class="recent-list-item">
                    <img class="img-fluid" src="images/property/list/02.jpg" alt="">
                    <div class="recent-list-item-info">
                      <a class="address mb-2" href="#">Contemporary apartment</a>
                      <span class="text-primary">$2,577,577 </span>
                    </div>
                  </div>
                  <div class="recent-list-item">
                    <img class="img-fluid" src="images/property/list/03.jpg" alt="">
                    <div class="recent-list-item-info">
                      <a class="address mb-2" href="#">3 bedroom house in gardner</a>
                      <span class="text-primary">$3,575,547 </span>
                    </div>
                  </div>
                  <div class="recent-list-item">
                    <img class="img-fluid" src="images/property/list/04.jpg" alt="">
                    <div class="recent-list-item-info">
                      <a class="address mb-2" href="#">Stunning 2 bedroom home in village</a>
                      <span class="text-primary">$1,475,575 </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 order-lg-1">

            <div class="property-detail-gallery overflow-hidden">
              <ul class="nav nav-tabs nav-tabs-02 mb-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link shadow active" id="photo-tab" data-toggle="pill" href="#photo" role="tab" aria-controls="photo" aria-selected="true">Photo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link shadow" id="map-tab" data-toggle="pill" href="#map" role="tab" aria-controls="map" aria-selected="false">Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link shadow" id="street-map-view-tab" data-toggle="pill" href="#street-map-view" role="tab" aria-controls="street-map-view" aria-selected="false">MAP</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                  <div class="slider-slick">
                    <div class="slider slider-for detail-big-car-gallery">
                      <img class="img-fluid" src="images/property/grid/01.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/02.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/03.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/04.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/05.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/06.jpg" alt="">
                    </div>
                    <div class="slider slider-nav">
                      <img class="img-fluid" src="images/property/grid/01.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/02.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/03.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/04.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/05.jpg" alt="">
                      <img class="img-fluid" src="images/property/grid/06.jpg" alt="">
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8351288872545!2d144.9556518!3d-37.8173306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1443621171568" style="border:0; width: 100%; height: 100%;"></iframe>
                </div>
                <div class="tab-pane fade" id="street-map-view" role="tabpanel" aria-labelledby="street-map-view-tab">
                  <div id="street-view"></div>
                </div>
              </div>
            </div>



            <div class="row pt-5">
              <div class="col-md-12">
                 <ul class="nav nav-tabs nav-tabs-02" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-01-tab" data-toggle="tab" href="#tab-01" role="tab" aria-controls="tab-01" aria-selected="true">Property Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-02-tab" data-toggle="tab" href="#tab-02" role="tab" aria-controls="tab-02" aria-selected="false">Description</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="tab-01" role="tabpanel" aria-labelledby="tab-01-tab">

                            <div class="row m-3">
                              <div class="col-sm-6">
                                <ul class="property-list list-unstyled">
                                  <li><b>Property ID:</b> RV151</li>
                                  <li><b>Price:</b> Rs. {{$property->price}}</li>
                                  <li><b>Property Size:</b> {{$property->size}} {{$property->size_type}}</li>
                                  <li><b>Bedrooms:</b> {{$property->bed}}</li>
                                  <li><b>Bathrooms:</b> {{$property->bath}}</li>
                                </ul>
                              </div>
                              <div class="col-sm-6">
                                <ul class="property-list list-unstyled">
                                  <li><b>Main Area:</b> {{$property->areaOne->name}}</li>
                                  <li><b>Sub Area:</b> {{$property->areaTwo->name}}</li>
                                  <li><b>Year Built:</b> 2019-01-09</li>
                                  <li><b>Property Type:</b> {{$property->property_type}}</li>
                                  <li><b>Property Status:</b> {{$property->property_for}}</li>
                                </ul>
                              </div>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="tab-02" role="tabpanel" aria-labelledby="tab-02-tab">
                    <p class="mt-4">The home features private entry copper-clad door leading to salon with marble floors. Stunning great room has soaring 45 foot ceilings with glass windows, polished concrete floors, exposed brick & sculptural steel beams. The chef's kitchen has honed granite counters, high-end S/S appliances, French cabinets & gas range.</p>
                    <p class="mt-4">Floor-to-ceiling windows accentuate the panoramic vistas that sweep across the Golden Gate Bridge, the downtown skyline, the artfully lit Bay Bridge and beyond. The floor plan features two bedroom suites, kitchen, living/dining room, two view terraces and ample storage space.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mt-4 mt-md-0">

                <ul class="nav nav-tabs mb-4" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-03-tab" data-toggle="pill" href="#tab-03" role="tab" aria-controls="tab-03" aria-selected="true">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-04-tab" data-toggle="pill" href="#tab-04" role="tab" aria-controls="tab-04" aria-selected="false">Address</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="tab-03" role="tabpanel" aria-labelledby="tab-03-tab">
                      <div class="row">
                          <div class="col-sm-6">
                            <ul class="property-list-style-2 list-unstyled mb-0">
                              <li>TV Cable</li>
                              <li>Air Conditioning</li>
                              <li>Barbeque</li>
                              <li>Gym</li>
                              <li>Swimming Pool</li>
                              <li>Laundry</li>
                              <li>Microwave</li>
                              <li>Outdoor Shower</li>
                            </ul>
                          </div>
                          <div class="col-sm-6">
                            <ul class="property-list-style-2 list-unstyled mb-0">
                              <li>Lawn</li>
                              <li>Refrigerator</li>
                              <li>Sauna</li>
                              <li>Washer</li>
                              <li>Dryer</li>
                              <li>WiFi</li>
                              <li>Window Coverings</li>
                            </ul>
                          </div>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="tab-04" role="tabpanel" aria-labelledby="tab-04-tab">
                      <div class="row">
                          <div class="col-sm-9">
                            <div class="row">
                              <div class="col-sm-6">
                                <ul class="property-list list-unstyled mb-0">
                                  <li><b>Address:</b> Virginia drive temple hills</li>
                                  <li><b>State/County:</b> San francisco</li>
                                  <li><b>Area:</b> Embarcadero</li>
                                </ul>
                              </div>
                              <div class="col-sm-6">
                                <ul class="property-list list-unstyled mb-0">
                                  <li><b>City:</b> San francisco</li>
                                  <li><b>Zip:</b> 4848494</li>
                                  <li><b>Country:</b> United States</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
              </div>
              </div>
            </div>







          </div>

        </div>
      </div>
    </section>
    <!--=================================
    Property Detail -->

    <!--=================================
  Properties -->
  <section class="space-pt">
    <div class="container">
      <hr class="mb-5 mt-0">
      <h5 class="mb-4">Similar properties</h5>
      <div class="row">
        <div class="col-md-4">
          <div class="property-item">
            <div class="property-image bg-overlay-gradient-04">
              <img class="img-fluid" src="images/property/grid/01.jpg" alt="">
              <div class="property-lable">
                <span class="badge badge-md badge-primary">Bungalow</span>
                <span class="badge badge-md badge-info">Sale </span>
              </div>
              <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
              <div class="property-agent">
                <div class="property-agent-image">
                  <img class="img-fluid" src="images/avatar/01.jpg" alt="">
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
              <div class="property-agent-popup">
                <a href="#"><i class="fas fa-camera"></i> 06</a>
              </div>
            </div>
            <div class="property-details">
              <div class="property-details-inner">
                <h5 class="property-title"><a href="property-detail-style-01.html">Ample apartment at last floor </a></h5>
                <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Virginia drive temple hills</span>
                <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                <div class="property-price">$150.00<span> / month</span> </div>
                <ul class="property-info list-unstyled d-flex">
                  <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                  <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                  <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li>
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
        <div class="col-md-4">
          <div class="property-item">
            <div class="property-image bg-overlay-gradient-04">
              <img class="img-fluid" src="images/property/grid/02.jpg" alt="">
              <div class="property-lable">
                <span class="badge badge-md badge-primary">Apartment</span>
                <span class="badge badge-md badge-info">New </span>
              </div>
              <div class="property-agent">
                <div class="property-agent-image">
                  <img class="img-fluid" src="images/avatar/02.jpg" alt="">
                </div>
                <div class="property-agent-info">
                  <a class="property-agent-name" href="#">John doe</a>
                  <span class="d-block">Company Agent</span>
                  <ul class="property-agent-contact list-unstyled">
                    <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                  </ul>
                </div>
              </div>
              <div class="property-agent-popup">
                <a href="#"><i class="fas fa-camera"></i> 12</a>
              </div>
            </div>
            <div class="property-details">
              <div class="property-details-inner">
                <h5 class="property-title"><a href="property-detail-style-01.html">Awesome family home</a></h5>
                <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Vermont dr. hephzibah</span>
                <span class="property-agent-date"><i class="far fa-clock fa-md"></i>2 months ago</span>
                <div class="property-price">$326.00<span> / month</span> </div>
                <ul class="property-info list-unstyled d-flex">
                  <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span></li>
                  <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>3</span></li>
                  <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>215m</span></li>
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
        <div class="col-md-4">
          <div class="property-item">
            <div class="property-image bg-overlay-gradient-04">
              <img class="img-fluid" src="images/property/grid/03.jpg" alt="">
              <div class="property-lable">
                <span class="badge badge-md badge-primary">Summer House</span>
                <span class="badge badge-md badge-info">Hot </span>
              </div>
              <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
              <div class="property-agent">
                <div class="property-agent-image">
                  <img class="img-fluid" src="images/avatar/03.jpg" alt="">
                </div>
                <div class="property-agent-info">
                  <a class="property-agent-name" href="#">Felica queen</a>
                  <span class="d-block">Investment</span>
                  <ul class="property-agent-contact list-unstyled">
                    <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                  </ul>
                </div>
              </div>
              <div class="property-agent-popup">
                <a href="#"><i class="fas fa-camera"></i> 03</a>
              </div>
            </div>
            <div class="property-details">
              <div class="property-details-inner">
                <h5 class="property-title"><a href="property-detail-style-01.html">Contemporary apartment</a></h5>
                <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Newport st. mebane, nc</span>
                <span class="property-agent-date"><i class="far fa-clock fa-md"></i>6 months ago</span>
                <div class="property-price">$658.00<span> / month</span> </div>
                <ul class="property-info list-unstyled d-flex">
                  <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>3</span></li>
                  <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>4</span></li>
                  <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>3,189m</span></li>
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
      </div>
    </div>
  </section>
  <!--=================================
  Properties -->
  </div>


@endsection
