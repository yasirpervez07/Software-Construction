
@forelse ($agencies as $item)

    <div class="col-lg-4" onclick="location.href='{{route('customeragency.detail' , $item->id)}}';">
        <div class="cards mt-0">
            <div class="profile__agency-header">
                <a  class="profile__agency-logo">
                    <img src='https://chhatt.s3.ap-south-1.amazonaws.com/agencies/{{ $item->image }}'
                        class="img-fluid">
                    <div class="total__property-agent">listing</div>
                </a>
            </div>
            <div class="profile__agency-body">
                <div class="profile__agency-info">
                    <h5 class="text-capitalize">
                        <a  target="_blank">{{ $item->name }}</a>
                    </h5>
                    {{-- <p class="text-capitalize mb-1">Los Angeles, city, United States of America</p> --}}
                    <ul class="list-unstyled mt-2">
                        <li><a  class="text-capitalize"><span><i class="fa fa-building"></i>
                                    office :</span> {{ $item->user->phone }}</a>
                        </li>
                        <li><a  class="text-capitalize"><span><i class="fa fa-phone"></i>
                                    mobile :</span> {{ $item->user->mobile }}</a></li>
                        <li><a  class="text-capitalize"><span><i class="fa fa-map-marker"></i>Address :</span> {{ optional($item->areaOne)->name }}, {{optional($item->areaTwo)->name}}</a></li>
                        <li><a  class="text-capitalize"><span><i class="fa fa-envelope"></i>
                                    email :</span>
                                {{ $item->user->email }}</a></li>
                    </ul>
                    {{-- <p class="mb-0 mt-3">
                        <button class="btn btn-social btn-social-o facebook mr-1">
                            <i class="fa fa-facebook-f"></i>
                        </button>
                        <button class="btn btn-social btn-social-o twitter mr-1">
                            <i class="fa fa-twitter"></i>
                        </button>

                        <button class="btn btn-social btn-social-o linkedin mr-1">
                            <i class="fa fa-linkedin"></i>
                        </button>
                        <button class="btn btn-social btn-social-o instagram mr-1">
                            <i class="fa fa-instagram"></i>
                        </button>

                        <button class="btn btn-social btn-social-o youtube mr-1">
                            <i class="fa fa-youtube"></i>
                        </button>
                    </p> --}}

                </div>
            </div>
        </div>
    </div>

    @empty
        <p class="justify-content-center">No Agency Found</p>

    @endforelse

