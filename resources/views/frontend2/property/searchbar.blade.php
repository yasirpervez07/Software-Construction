<form id="searchform" action="{{ route('customer.property.index') }}" onsubmit="searchProperties()">
    <input type="hidden" name="view" value="2">
    <input type="hidden" name="search" value="1">
    <input type="hidden" name="property_for" id="property_for" value="For Buy">
    <div class="bg__overlay-black p-4">
        <div class="search__property">
            <div id="position-relative" class="position-relative">
                <ul class="nav nav-tabs nav-tabs-02 mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item mr-1">
                        <a class="nav-link active" data-toggle="pill"
                            onclick="changeInputValue('#property_for','For Buy')">Buy</a>
                    </li>
                    <li class="nav-item mr-1">
                        <a class="nav-link" data-toggle="pill"
                            onclick="changeInputValue('#property_for','For Rent')">Rent</a>
                    </li>
                    <li class="nav-item mr-1">
                        <a class="nav-link" data-toggle="pill">Booking</a>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="buy" role="tabpanel" aria-labelledby="buy-tab">

                        <div class=" search__container">
                            <div class="wrapper__section">
                                <div class="wrapper__section__components">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <h3 class="section_heading mt-4">Form Search with Categories</h3> -->
                                            <div class="search__container">
                                                <div class="row input-group no-gutters">

                                                    <div class="col-sm-12 col-md-2 input-group  "
                                                        style="margin-left: 0px !important">

                                                        <select class="srchselect select_option form-control"
                                                            name="city" id="city" onchange="ajaxSuggestions()">
                                                            {{-- <option selected="">All Categories</option> --}}
                                                            @foreach ($city as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach

                                                        </select>


                                                    </div>

                                                    <div class="col-sm-12 col-md-8 ">
                                                        {{-- <input type="text" class="form-control"
                                                    aria-label="Text input"
                                                    placeholder="Search for Homes"> --}}
                                                        <div class="srch" id="srch">
                                                            <div class="search-input">
                                                                <a href="" target="_blank" hidden></a>
                                                                <input id="srchinput" autocomplete="off" type="text"
                                                                    placeholder="Search for Homes">
                                                                <div class="autocom-box">
                                                                </div>
                                                                <div class="icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="btn-padding col-sm-12 col-md-2 input-group-append">
                                                        <button {{-- onclick="window.location='{{ route('properties.search', ['parameter1']) }}'" --}} onclick="PropertySearch();"
                                                            class="btn btn-primary btn-primarysearch btn-block icon"
                                                            type="submit">
                                                            <i class="fa fa-search"></i> <span
                                                                class="ml-1 text-uppercase">Search</span>
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-link text-danger" onclick="showDiv('moreoptions')">More
                            Options</button>

                        <div class="search__container moreoptions" style="display: none;">
                            <div class="row input-group no-gutters">
                                <div class="col-sm-12 col-md-2 pr-1">
                                    <select class="font-size-select form-control" name="property_type">
                                        <option selected value="">Property Type</option>
                                        @foreach ($propertytypes as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}
                                            </option>

                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-sm-4 col-md-2 pr-1">
                                    <select class="font-size-select form-control" name="min_area">
                                        <option value="" data-display="Area From">Area From</option>
                                        @for ($i = 0; $i <= 10000; $i++)
                                            <option value={{ $i }}>{{ $i }}</option>
                                            @php
                                                $i += 99;
                                            @endphp
                                        @endfor


                                    </select>

                                </div>

                                <div class="col-sm-4 col-md-2 pr-1">
                                    <select class="font-size-select form-control" name="max_area">
                                        <option value="" data-display="Area To">Area To</option>
                                        @for ($i = 10000; $i >= 0; $i--)
                                            <option value={{ $i }}>{{ $i }}</option>
                                            @php
                                                $i -= 99;
                                            @endphp
                                        @endfor

                                    </select>

                                </div>

                                <div class="col-sm-4 col-md-2 pr-1">
                                    <select class="font-size-select form-control" name="min_price">
                                        <option value="" data-display="Area From">Price From</option>
                                        @for ($i = 0; $i <= 10000; $i++)
                                            <option value={{ $i }}>{{ $i }}</option>
                                            @php
                                                $i += 99;
                                            @endphp
                                        @endfor
                                    </select>

                                </div>

                                <div class="col-sm-4 col-md-2 pr-1">
                                    <select class="font-size-select form-control" name="max_price">
                                        <option value="" data-display="Price To">Price To</option>
                                        @for ($i = 10000; $i >= 0; $i--)
                                            <option value={{ $i }}>{{ $i }}</option>
                                            @php
                                                $i -= 99;
                                            @endphp
                                        @endfor

                                    </select>

                                </div>

                                <div class="col-sm-4 col-md-2 pr-1">
                                    <select class="font-size-select form-control" name="bed">
                                        <option value="" value="">Bedrooms</option>
                                        @for ($i = 1; $i <= 25; $i++)
                                            <option value={{ $i }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</form>

<script>
    var suggestions = [];
    var suggestionskey = [];
    var suggestionsparent = [];
    const searchWrapper = document.querySelector(".search-input");
    const inputBox = searchWrapper.querySelector("input");
    const suggBox = searchWrapper.querySelector(".autocom-box");
    const icon = searchWrapper.querySelector(".icon");
    let linkTag = searchWrapper.querySelector("a");
    let webLink;
    var keyofsearch;
    var textofsearch;


    inputBox.onkeyup = (e) => {

        let userData = e.target.value; //user enetered data
        let emptyArray = [];
        if (userData) {
            icon.onclick = () => {
                webLink = "https://www.google.com/search?q=" + userData;
                linkTag.setAttribute("href", webLink);
                linkTag.click();
            }
            emptyArray = suggestions.filter((data) => {
                //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
            emptyArray = emptyArray.map((data) => {
                // passing return data inside li tag
                var indexofparent = suggestions.indexOf(data);
                var parent = suggestionsparent[indexofparent];
                return data = '<li>' + data + "," +
                    '<span style="border-radius:10px"  class="badge badge-pill badge-link" >' + parent +
                    '</span>' + '</li>';
            });
            searchWrapper.classList.add("active"); //show autocomplete box
            showSuggestions(emptyArray);
            let allList = suggBox.querySelectorAll("li");
            for (let i = 0; i < allList.length; i++) {
                //adding onclick attribute in all li tag
                allList[i].setAttribute("onclick", "select(this)");
            }
        } else {
            searchWrapper.classList.remove("active"); //hide autocomplete box
        }
    }
</script>
