function catalogMenu() {
    $(".sidebar .categories ul a").click(function (event) {
        event.preventDefault();
        let target = $(this).attr('href'),
            top = $(target).offset().top;
        $('body,html').animate({scrollTop: top}, Math.abs(top - $(document).scrollTop()));
    });
}

function cartCounter() {
    const min = 0;
    jQuery('body #cart').on('click', '.plus', function (e) {
        e.preventDefault();
        let input = jQuery(this).parent().find('input');
        let current = parseInt(jQuery(input).val());
        jQuery(input).val(current + 1).trigger("change");
        jQuery('.actions button').removeAttr('disabled');
        jQuery(".actions button").trigger("click");
    }).on('click', '.minus', function (e) {
        e.preventDefault();
        let input = jQuery(this).parent().find('input');
        let current = parseInt(jQuery(input).val());
        if (current > min) {
            jQuery(input).val(current - 1).trigger("change");
            jQuery('.actions button').removeAttr('disabled');
        }
        jQuery(".actions button").trigger("click");
    });
}

class Product {
    constructor() {
        this.productCounter();
        this.submit();
    }

    calculatePrice(e) {
        let table = $(e.currentTarget).closest('.table').find('input'),
            btn = $(e.currentTarget).closest('.cart-side').find('.add-to-cart'),
            sum = 0;
        table.each(function () {
            sum += parseInt($(this).val()) * parseInt($(this).attr('data-price'));
        });
        if (sum >= 1000) {
            sum = (sum / 1000).toFixed(3).toString().replace('.', ' ');
        }
        $(e.currentTarget).closest('.cart-side').find('.sub-totals span').text(`${sum} р.`);
        if (parseInt(sum) > 0) {
            btn.removeAttr('disabled');
        } else {
            btn.attr('disabled', true);
        }
    }

    productCounter() {
        const min = 0;
        jQuery('.cart-side').on('click', '.plus', (e) => {
            e.preventDefault();
            let input = jQuery(e.currentTarget).parent().find('input');
            let current = parseInt(jQuery(input).val());
            jQuery(input).val(current + 1);
            this.calculatePrice(e);

        }).on('click', '.minus', (e) => {
            e.preventDefault();
            let input = jQuery(e.currentTarget).parent().find('input');
            let current = parseInt(jQuery(input).val());
            if (current > min) {
                jQuery(input).val(current - 1);
                this.calculatePrice(e);
            }
        });
        $( "body" ).on( 'updated_cart_totals', function(){
            let count = 0;
            $("body").find('.modal .quantity input').each(function () {
                count+= parseInt($(this).val());
            });
           $('.cart-count').text(count);
        });
    }

    submit(){
        $('.modal .form').submit(function (e) {
            e.preventDefault();
            let data = {
                action: 'ajax_add_to_cart',
                name: $('#name').val(),
                tel: $('#tel').val(),
                billing: $('#billing').val(),
                payment: $('#payment').val(),
                comment: $('#comment').val(),
            };
            $.post(wc_add_to_cart_params.ajax_url, data, function (res) {
                res = JSON.parse(res);
                console.log(res)
                if (res.status == 'success') {
                    $('#success').modal('show');
                    $('.mini-cart').replaceWith(res.cart);
                    setTimeout(function () {
                        $('#success').modal('hide');
                    }, 8000);
                }
            }).done(function () {
                $('#cart').modal('hide');
            });
        });
    }
}

$(() => {
    $('.fancybox').fancybox();
    catalogMenu();
    new Product();
    cartCounter();
    $('#tel').mask('+8 (999) 999 - 9999');
    $('.owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true
    });
});