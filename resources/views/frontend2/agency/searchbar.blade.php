<!--=================================
Search Bar -->
<form id="searchform" onsubmit="searchAgencies()" action="{{ route('customer.agency.index') }}">
    <div class="tab-content mt-5" id="pills-tabContent">
        <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
            <div class="search">
                <i class="fas fa-search" onclick="searchAgencies()"></i>
                <input name="keyword" type="text" class="form-control"
                    placeholder="Search for Estate Agencies by Name, Phone or Area....">
                <input class="d-none" type="submit" value="aaaaaaaaaa">
            </div>
        </div>
    </div>
</form>
<!--=================================
Search Bar -->
