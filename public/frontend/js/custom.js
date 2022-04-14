$(document).ready(function() {

    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadcart() {
        $.ajax({
            type: "GET",
            url: "/user/load-cart-data",
            success: function(response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);

            }
        });
    }


    function loadwishlist() {
        $.ajax({
            type: "GET",
            url: "/user/load-wishlist-data",
            success: function(response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);

            }
        });
    }

    $('.addTocartBtn').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        var bega = $(this).closest('.product_data').find('.bega-input').val();
        var mkono = $(this).closest('.product_data').find('.mkono-input').val();
        var kifua = $(this).closest('.product_data').find('.kifua-input').val();
        var urefu_juu = $(this).closest('.product_data').find('.urefujuu-input').val();
        var urefu_mguu = $(this).closest('.product_data').find('.urefumguu-input').val();
        var paja = $(this).closest('.product_data').find('.paja-input').val();
        var kiuno = $(this).closest('.product_data').find('.kiuno-input').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $.ajax({
            type: "POST",
            url: "/user/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
                'bega': bega,
                'paja': paja,
                'kifua': kifua,
                'kiuno': kiuno,
                'mkono': mkono,
                'urefu_juu': urefu_juu,
                'urefu_mguu': urefu_mguu,



            },
            success: function(response) {
                swal(response.status);
                loadcart();

            }
        });


    });

    $('.addTo-wish-cartBtn').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        var bega = $(this).closest('.product_data').find('.bega-input').val();
        var mkono = $(this).closest('.product_data').find('.mkono-input').val();
        var kifua = $(this).closest('.product_data').find('.kifua-input').val();
        var urefu_juu = $(this).closest('.product_data').find('.urefujuu-input').val();
        var urefu_mguu = $(this).closest('.product_data').find('.urefumguu-input').val();
        var paja = $(this).closest('.product_data').find('.paja-input').val();
        var kiuno = $(this).closest('.product_data').find('.kiuno-input').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/user/add-to-wishcart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
                'bega': bega,
                'paja': paja,
                'kifua': kifua,
                'kiuno': kiuno,
                'mkono': mkono,
                'urefu_juu': urefu_juu,
                'urefu_mguu': urefu_mguu,



            },
            success: function(response) {
                swal(response.status);
                loadcart();

            }
        });


    });

    $('.addToWishlist').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/user/add-to-wishlist",
            data: {
                'product_id': product_id,

            },
            success: function(response) {
                swal(response.status);
                loadwishlist();

            }
        });


    });

    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {

            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {

            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);

        }
    });
    $('.delete-cart-item').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            type: "POST",
            url: "/user/delete-cart-item",
            data: {
                'prod_id': prod_id,
            },

            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");

            }
        });

    });

    $('.remove-wishlist-btn').click(function(e) {
        e.preventDefault();


        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/user/delete-wishlist-item",
            data: {
                'prod_id': prod_id,
            },

            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");

            }
        });

    });

    $('.changeQuantity ').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajax({
            type: "POST",
            url: "/user/update-cart",
            data: {
                'prod_id': prod_id,
                'prod_qty': qty,
            },

            success: function(response) {
                window.location.reload();

            }
        });


    });


});