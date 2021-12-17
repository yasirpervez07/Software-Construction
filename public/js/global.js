// $('.fa-search').on('click', function(e) {
//     keyword=$('#table_search').val()
//     event.preventDefault()
//     data = {
//         'keyword': $('#table_search').val()
//     }
//     e.preventDefault();
//     $.ajax({
//         type: "GET",
//         url: window.location.href+'?keyword='+$('#table_search').val(),
//         dataType: 'html',

//         success: function(response) {
//             $('body').html(response)
//             $('#table_search').val(keyword)
//             $('#table_search').focus()
//             // console.log(response)
//             // alert('Data Saved!');
//         },
//     });
// });

// $('#table_search').on('keyup', function(e) {
//     keyword=$('#table_search').val()
//     event.preventDefault()
//     data = {
//         'keyword': $('#table_search').val()
//     }
//     e.preventDefault();
//     $.ajax({
//         type: "GET",
//         url: window.location.href,
//         dataType: 'html',
//         data: data,
//         success: function(response) {
//             $('.searcharea').html(response)
//             $('#table_search').val(keyword)
//             $('#table_search').focus()
//             // console.log(response)
//             // alert('Data Saved!');
//         },
//     });
// });

function search() {
    keyword = $('#table_search').val()
    event.preventDefault()
    data = {
        'keyword': keyword
    }
    history.replaceState('.', '.', window.location.href.split('?')[0] + '?page=1');
    $.ajax({
        type: 'get',
        url: window.location.href,
        dataType: 'html',
        data: data,
        success: function(response) {
            $('.searcharea').html(response)
            $('#table_search').val(keyword)
            $('#table_search').focus()
                // console.log(response)
                // alert('Data Saved!');
        },
    });
}


// {{-- --------------------------displaying image after uploading--------------------------------------- --}}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result)
                .width('100%')
                .height('90%');
        };

        reader.readAsDataURL(input.files[0]);
    }
}


// {{-- -------------------------------------------------------------------------------------------- --}}

$('select').select2();



$('.fa-trash-alt').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
            title: `Are you sure you want to delete?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
                swal("Your  file has been deleted!", {
                    icon: "success",
                });
            }
        });
});



// {{-- -------------------------------dynamic dropdown---------------------------------------- --}}

$('#area_one_id').change(function() {
    // alert('h')
    var id = $(this).val();
    var name1 = $("#area_one_id option:selected").text();

    $('#area_two_id').find('option').not(':first').remove();
    $.ajax({
        url: '/categories/' + id,
        type: 'get',
        dataType: 'json',
        success: function(response) {
            var len = 0;
            if (response.data != null) {
                len = response.data.length;
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var id = response.data[i].id;
                    var name = response.data[i].name;

                    var option = "<option value='" + id + "'>" + name + '-' + name1 + "</option>";

                    $("#area_two_id").append(option);
                }
            }
            $("#area_three_id").html(
                '<option disabled selected value="">Select Sub-Sub-Area</option>');
        }
    })
});

$('#area_two_id').change(function() {

    var id = $(this).val();

    $('#area_three_id').find('option').not(':first').remove();

    $.ajax({
        url: '/subcategories/' + id,
        type: 'get',
        dataType: 'json',
        success: function(response) {
            var len = 0;
            if (response.data != null) {
                len = response.data.length;
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var id = response.data[i].id;
                    var name = response.data[i].name;

                    var option = "<option value='" + id + "'>" + name + "</option>";

                    $("#area_three_id").append(option);
                }
            }

        }
    })
});


// {{-- ----------------------------------------------------------------------- --}}



function disableButton() {
    var e = this;
    setTimeout(function() { e.disabled = true; }, 0);
    return true;
}

// rotate();
function rotate(degree, id) {
    // alert(id)
    // degree=degree*.5
    var $elie = $('#' + id);
    $elie.css({ WebkitTransform: 'rotate(' + degree + 'deg)' });
    $elie.css({ '-moz-transform': 'rotate(' + degree + 'deg)' });


}

function reloadCarousel(divId) {
    owl = $("#" + divId);
    $('#' + divId).trigger('destroy.owl.carousel').removeClass(
        'owl-carousel owl-loaded');
    $('#' + divId).find('.owl-stage-outer').children().unwrap();
    owl.owlCarousel({
        loop: !0,
        margin: 30,
        dots: !0,
        nav: 0,
        rtl: !1,
        autoplayHoverPause: !1,
        autoplay: !0,
        singleItem: !0,
        smartSpeed: 1200,
        navText: ['<i class="fa fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: !1
            },
            480: {
                items: 1,
                center: !1
            },
            600: {
                items: 1,
                center: !1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 2
            },
            1366: {
                items: 3
            },
            1400: {
                items: 3
            }
        }
    });
    $('.owl-prev').hide()
    $('.owl-next').hide()
}
