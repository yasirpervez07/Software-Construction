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
<div class="pb-2">
    <div class="container">
        <div class="">
            <div class="p-2">
                <div class="d-flex align-items-center justify-content-between">
                    <small class="">Featured Properties</small>
                    <small class=""><a href="pages/properties.html">SEE MORE</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="top-products-area pb-2">
    <div class="container">
        <div class="row g-3">
            @forelse ($featureproperties as $item)
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="card single-product-card">
                        <div class="card-body p-3">
                            <!-- Product Thumbnail-->
                            <a class="product-thumbnail d-block" href="page-shop-details.html"><img
                                    src="https://chhatt.s3.ap-south-1.amazonaws.com/properties/{{ $item->images[0]->name }}"
                                    alt="">
                                <!-- Badge--><span class="badge bg-warning">PK
                                    {{ convert_rupee($item->price) }}</span></a>
                            <!-- Product Title-->
                            <h4 class="text-muted"><a class="product-title d-block text-truncate"
                                    href="page-shop-details.html">{{ $item->property_type }}</a>
                            </h4>
                            <!-- Product Details-->
                            <h6><i class="bi bi-geo-alt"></i> {{ @$item->areaOne->name }} {{ @$item->areTwo->name }}
                            </h6>
                            <p><i class="bi bi-journals"> {{ @$item->bed ?? '0' }} </i> <i class="bi bi-trash2-fill">
                                    {{ @$item->bath ?? '0' }} </i> <i class="bi bi-aspect-ratio"> 500 </i></p>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
