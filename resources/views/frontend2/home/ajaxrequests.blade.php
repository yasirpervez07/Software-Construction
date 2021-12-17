<script>
    function loadFeaturedProperties() {
        $.ajax({
            type: "get",
            url: "{{ route('customer.property.index') }}?featured=0&view=1",
            dataType: 'html',
            success: function(response) {
                console.log(response)
                $('#featured').append(response);
                reloadCarousel('#featured')
            }
        })
    }

    function loadMainBanner() {
        $.ajax({
            type: "get",
            url: "{{ route('customer.searchbar') }}?view=1",
            dataType: 'html',
            success: function(response) {
                console.log(response)
                $('.searchbar').after(response);
            }
        })
    }

    function loadFeaturedProjects() {
        $.ajax({
            type: "get",
            url: "{{ route('customer.projects.search') }}",
            dataType: 'html',
            success: function(response) {
                console.log(response)
                $('#featuredprojects').append(response);
                reloadCarousel('#featuredprojects')
            }
        })
    }


    function loadProperties() {
        $.ajax({
            type: "get",
            url: "{{ route('customer.property.index') }}?featured=0&view=2",
            dataType: 'html',
            success: function(response) {
                $('#list').append(response);
            }
        })
    }



    function loadPropertyBanner() {
        $.ajax({
            type: "get",
            url: "{{ route('customer.searchbar') }}?view=1",
            dataType: 'html',
            success: function(response) {
                $('.searchbar').after(response);
            }
        })
    }

    function reloadCarousel(divId) {
        $(divId).owlCarousel('destroy');
        $(divId).owlCarousel({
            dots: false,
            nav: true,
            loop: true,
            margin: 15,
            smartSpeed: 700,
            items: 4,
            autoplay: true,
        });
    }

    // For Search Dropdown Start

    function ajaxSuggestions() {
        var city = $('#city').children("option:selected").val();
        let userData = $('#srchinput').val(); //user enetered data
        let emptyArray = [];

        $.ajax({
            type: "GET",
            url: "api/allareas",
            dataType: 'JSON',
            data: {
                city: city,
            },
            success: function(responese) {
                suggestions = []
                suggestionsparent = []
                suggestionskey = []

                let dataFected = responese.data.forEach((prev) => {
                    suggestions.push(prev.name);
                    suggestionsparent.push(prev.parent);
                    suggestionskey.push(prev.key);
                })
                emptyArray = suggestions.filter((data) => {
                    return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
                });
                emptyArray = emptyArray.map((data) => {

                    var indexofparent = suggestions.indexOf(data);
                    var parent = suggestionsparent[indexofparent];
                    return data = '<li>' + data + "," +
                        '<span style="border-radius:10px"  class="badge badge-pill badge-link" >' +
                        parent +
                        '</span>' + '</li>';
                });

                // searchWrapper.classList.add("active"); //show autocomplete box
                showSuggestions(emptyArray);
                let allList = suggBox.querySelectorAll("li");
                for (let i = 0; i < allList.length; i++) {
                    allList[i].setAttribute("onclick", "select(this)");
                }


            },
        });
    }

    function showSuggestions(list) {
        let listData;
        if (!list.length) {
            userValue = inputBox.value;
            listData = '<li>' + userValue + '</li>';
        } else {
            listData = list.join('');
        }
        suggBox.innerHTML = listData;
    }

    function select(element) {
        let selectData = element.textContent;
        var res = selectData.split(",");
        // console.log(res[0]);
        var indexof = suggestions.indexOf(res[0]);
        var indexofkey = suggestionskey[indexof];
        // console.log(indexofkey);
        keyofsearch = indexofkey;
        textofsearch = selectData
        inputBox.value = res[0];
        icon.onclick = () => {
            webLink = "https://www.google.com/search?q=" + selectData;
            linkTag.setAttribute("href", webLink);
            linkTag.click();
        }
        searchWrapper.classList.remove("active");
    }

    

    // For Search Dropdown End

</script>
