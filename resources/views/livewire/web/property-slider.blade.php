<div class="widget">
    <div class="widget-title widget-collapse">
        <h6>Status of property</h6>
        <a class="ml-auto" data-toggle="collapse" href="#status-property" role="button" aria-expanded="false"
            aria-controls="status-property"> <i class="fas fa-chevron-down"></i> </a>
    </div>
    <div class="collapse show" id="status-property">
        <ul class="list-unstyled mb-0 pt-3">
            <li><a href="#">For rent<span class="ml-auto">({{ $values['for_rent'] }})</span></a></li>
            <li><a href="#">For Sale<span class="ml-auto">({{ $values['for_sale'] }})</span></a></li>
        </ul>
    </div>
</div>

<div class="widget">
    <div class="widget-title widget-collapse">
        <h6>Type of property</h6>
        <a class="ml-auto" data-toggle="collapse" href="#type-property" role="button" aria-expanded="false"
            aria-controls="type-property"> <i class="fas fa-chevron-down"></i> </a>
    </div>
    <div class="collapse show" id="type-property">
        <ul class="list-unstyled mb-0 pt-3">
            <li><a href="{{ route('customer.property.index') }}?view=2&search=2&type=Residential">Residential<span class="ml-auto">({{ $values['residential'] }})</span></a></li>
            <li><a href="{{ route('customer.property.index') }}?view=2&search=2&type=Commercial">Commercial<span class="ml-auto">({{ $values['commercial'] }})</span></a></li>
            <li><a href="{{ route('customer.property.index') }}?view=2&search=2&type=Industrial">Industrial<span class="ml-auto">({{ $values['industrial'] }})</span></a></li>
        </ul>
    </div>
</div>

<div class="widget">
    <div class="widget-title">
        <h6>Recently listed properties</h6>
    </div>
    <div class="recent-list-item">
        <img class="img-fluid" src="images/property/list/01.jpg" alt="">
        <div class="recent-list-item-info">
            <a class="address mb-2" href="property-detail-style-01.html">Awesome family home</a>
            <span class="text-primary">$1,456,233 </span>
        </div>
    </div>
    <div class="recent-list-item">
        <img class="img-fluid" src="images/property/list/02.jpg" alt="">
        <div class="recent-list-item-info">
            <a class="address mb-2" href="property-detail-style-01.html">Contemporary apartment</a>
            <span class="text-primary">$2,496,454 </span>
        </div>
    </div>
    <div class="recent-list-item">
        <img class="img-fluid" src="images/property/list/03.jpg" alt="">
        <div class="recent-list-item-info">
            <a class="address mb-2" href="property-detail-style-01.html">Family home for sale</a>
            <span class="text-primary">$4,662,457 </span>
        </div>
    </div>
    <div class="recent-list-item">
        <img class="img-fluid" src="images/property/list/04.jpg" alt="">
        <div class="recent-list-item-info">
            <a class="address mb-2" href="property-detail-style-01.html">184 lexington avenue</a>
            <span class="text-primary">$2,456,452 </span>
        </div>
    </div>
</div>
