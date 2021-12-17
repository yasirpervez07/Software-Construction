@foreach ($agencies as $item)

    <div class="col-sm-4">
        <div class="item">
            <div class="blog-post">
                <div class="blog-post-image">
                    <a href="{{ route('customer.agency.show',$item->id) }}">
                        <img class="img-fluid" src="/frontend2/images/blog/02.jpg" alt="">
                    </a>
                </div>
                <div class="blog-post-content">
                    <div class="blog-post-title mt-3">
                        <h5><a href="blog-detail.html">{{ $item->name }}</a></h5>
                    </div>
                    <div class="blog-post-category">
                        <a href="#"><strong><i class="fas fa-map-marker-alt fa-xs"></i>
                                {{ optional($item->areaOne)->name }}, {{ optional($item->areaTwo)->name }}
                            </strong></a><br>
                        <a class="btn btn-light mt-2 mb-3" href="#">{{ $item->user->phone }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
