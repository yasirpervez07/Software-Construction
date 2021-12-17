<!--=================================
Listing – grid view -->
<section class="p-4">
    <div class="">
        <div class="row">

            {{-- @include('frontend2.agency.sidebar') --}}

            <div class="col-lg-12">
                @include('frontend2.agency.filters')

                <div id="list" class="row mt-4">

                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3">
                            <li class="page-item disabled mr-auto">
                                <span class="page-link b-radius-none">Prev</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span
                                    class="sr-only">(current)</span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item ml-auto">
                                <a class="page-link b-radius-none" href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
Listing – grid view -->
