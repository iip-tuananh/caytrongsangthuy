/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");

/* Exists */
$.fn.exists = function(){
    return this.length;
};
if($(".auto_click").exists()){
    setTimeout(function(){$(".auto_click").click();}, 500);   
}
/* Paging ajax */
if($(".paging-product").exists())
{
    loadPagingAjax("ajax/ajax_product.php?perpage=12",'.paging-product');
}

/* Paging category ajax */
if($(".menu-left li").exists())
{
    $('.menu-left li').hover(function(event) {
        if($(this).hasClass('act')){
            $(this).removeClass('act');
            $(this).children('ul').stop().slideUp();
        }else{
            $(this).parent('ul').children('li.act').children('ul').stop().slideUp();
            $(this).parent('ul').children('li.act').removeClass('act');
            $(this).addClass('act');
            $(this).children('ul').stop().slideDown();
        }
    });

}

/* Paging category ajax */
if($(".paging-product-category").exists())
{
    $('body').on("click",".paging-product-category",function() {
        if (!$(this).hasClass('active')) {

            $(this).parent().children(".paging-product-category").removeClass('active');
            $(this).addClass('active');
            var type = $(this).data("type");
            var cat = $(this).data("cat");
            var list = $(this).data("list");
            var cont = $(this).data("cont");
            var noibat = $(this).data("noibat");
            var pp = $(this).data("pp");
            loadPagingAjax("ajax/ajax_product.php?perpage="+pp+"&type="+type+"&noibat="+noibat+"&idList="+list+"&idCat="+cat,cont);
        }
    })
    $('.paging-product-category').each(function() {
        if ($(this).is(":first-child")) {
            $(this).click();
        }
        
    });
}
if($(".tabs").exists())
{
    $('body').on("click",".tabs .title_tab .name",function() {
        if (!$(this).hasClass('active')) {
            var type = $(this).data("type");
            var table = $(this).data("table");
            var lv = $(this).data("lv");
            var id = $(this).data("id");
            var noibat = $(this).data("noibat");
            var cont = $(this).data("cont");

            loadPagingAjax("ajax/ajax_tab.php?&type="+type+"&noibat="+noibat+"&table="+table+"&lv="+lv+"&id="+id,cont);

            $(this).parents('.title_tab').find(".name").removeClass('active');
            $(this).addClass('active');
        }
    })
}

/* Back to top */
NN_FRAMEWORK.BackToTop = function(){
    $(window).scroll(function(){
        if(!$('.scrollToTop').length) $("body").append('<div class="scrollToTop"><img src="'+GOTOP+'" alt="Go Top"/></div>');
        if($(this).scrollTop() > 100) $('.scrollToTop').fadeIn();
        else $('.scrollToTop').fadeOut();
    });

    $('body').on("click",".scrollToTop",function() {
        $('html, body').animate({scrollTop : 0},800);
        return false; 
    });
};

/* Alt images */
NN_FRAMEWORK.AltImages = function(){
    $('img').each(function(index, element) {
        if(!$(this).attr('alt') || $(this).attr('alt')=='')
        {
            $(this).attr('alt',WEBSITE_NAME);
        }
    });
};

/* Fix menu */
NN_FRAMEWORK.FixMenu = function(){
    $(window).scroll(function(){
        $( ".box_scroll" ).each(function() {
            // var d_top = $('#slider').offset().top + $('#slider').height();
            var d_top = $(this).prev().offset().top + $(this).prev().height();
            var w_offset = $(window).scrollTop();
            if($(window).scrollTop()> d_top) {
                $(this).addClass('scroll-fix');     
                $(this).removeClass('hd_dmsp'); 
            }else{
                $(this).removeClass('scroll-fix'); 
                $(this).addClass('hd_dmsp');     
            }
        });
    });
};

/* Tools */
NN_FRAMEWORK.Tools = function(){
    if($(".toolbar").exists())
    {
        $(".footer").css({marginBottom:$(".toolbar").innerHeight()});
    }
};

/* Popup */
NN_FRAMEWORK.Popup = function(){
    if($("#popup").exists())
    {
        $('#popup').modal('show');
    }
};

/* Wow */
NN_FRAMEWORK.WowAnimation = function(){
    new WOW().init();
};

/* Mmenu */
NN_FRAMEWORK.Mmenu = function(){
    if($("nav#menu").exists())
    {
        $('nav#menu').mmenu({
            navbars     : [
            {
                position    : 'top',
                content     : [
                'prev',
                'title',
                'close'
                ]
            }
            ]
        });
    }
};

/* Toc */
NN_FRAMEWORK.Toc = function(){
    if($(".toc-list").exists())
    {
        $(".toc-list").toc({
            content: "div#toc-content",
            headings: "h2,h3,h4"
        });

        if(!$(".toc-list li").length) $(".meta-toc").hide();

        $('.toc-list').find('a').click(function(){
            var x = $(this).attr('data-rel');
            goToByScroll(x);
        });
    }
};

/* Simply scroll */
NN_FRAMEWORK.SimplyScroll = function(){
    if($(".newshome-scroll ul").exists())
    {
        $(".newshome-scroll ul").simplyScroll({
            customClass: 'vert',
            orientation: 'vertical',
            // orientation: 'horizontal',
            auto: true,
            manualMode: 'auto',
            pauseOnHover: 1,
            speed: 1,
            loop: 0
        });
    }
};

/* Tabs */
NN_FRAMEWORK.Tabs = function(){
    if($(".ul-tabs-pro-detail").exists())
    {
        $(".ul-tabs-pro-detail li").click(function(){
            var tabs = $(this).data("tabs");
            $(".content-tabs-pro-detail, .ul-tabs-pro-detail li").removeClass("active");
            $(this).addClass("active");
            $("."+tabs).addClass("active");
        });
    }
};

/* Photobox */
NN_FRAMEWORK.Photobox = function(){
    if($(".album-gallery").exists())
    {
        $('.album-gallery').photobox('a',{thumbs:true,loop:false});
    }
};

/* Datetime picker */
NN_FRAMEWORK.DatetimePicker = function(){
    if($('#ngaysinh').exists())
    {
        $('#ngaysinh').datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            minDate: '01/01/1950',
            maxDate: TIMENOW
        });
    }
};

/* Search */
NN_FRAMEWORK.Search = function(){
    if($(".icon-search").exists())
    {
        $(".icon-search").click(function(){
            if($(this).hasClass('active'))
            {
                $(this).removeClass('active');
                $(".search-grid").stop(true,true).animate({opacity: "0",width: "0px"}, 200);   
            }
            else
            {
                $(this).addClass('active');                            
                $(".search-grid").stop(true,true).animate({opacity: "1",width: "230px"}, 200);
            }
            document.getElementById($(this).next().find("input").attr('id')).focus();
            $('.icon-search i').toggleClass('fa fa-search fa fa-times');
        });
    }

    if($(".search_open").exists())
    {
        $(".search_open").click(function(){
            if($(this).hasClass('opening')){
                $(this).removeClass('opening');
                $(".search_box_hide").stop().slideUp();
            }else{
                $(this).addClass('opening');
                $(".search_box_hide").stop().slideDown();
            }
        }); 
    }

};

/* Videos */
NN_FRAMEWORK.Videos = function(){
    /* Fancybox */
    // $('[data-fancybox="something"]').fancybox({
    //     // transitionEffect: "fade",
    //     // transitionEffect: "slide",
    //     // transitionEffect: "circular",
    //     // transitionEffect: "tube",
    //     // transitionEffect: "zoom-in-out",
    //     // transitionEffect: "rotate",
    //     transitionEffect: "fade",
    //     transitionDuration: 800,
    //     animationEffect: "fade",
    //     animationDuration: 800,
    //     slideShow: {
    //         autoStart: true,
    //         speed: 3000
    //     },
    //     arrows: true,
    //     infobar: false,
    //     toolbar: false,
    //     hash: false
    // });

    if($(".video").exists())
    {
        $('[data-fancybox="video"]').fancybox({
            transitionEffect: "fade",
            transitionDuration: 800,
            animationEffect: "fade",
            animationDuration: 800,
            arrows: true,
            infobar: false,
            toolbar: true,
            hash: false
        });
    }
};


/* Owl pro detail */
NN_FRAMEWORK.Slick = function(){
    if($(".slick-img-thumb").exists())
    {
        $('.slick-img-thumb').slick({
            dots: false,
            infinite: false,
            speed: 300,
            swipe:true,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows:true,
            vertical:false,
            verticalSwiping:false,
            nextArrow: '<img src="./assets/images/next-20.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./assets/images/prev-20.png" alt="Prev" class="slick-prev">',

        });        
    }
    if($(".slick_2").exists())
    {
        $('.slick_2').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay:true,
            arrows:true,
            nextArrow: '<img src="./frontend/images/next-37.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./frontend/images/prev-37.png" alt="Prev" class="slick-prev">',
            responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });
    }
    if($(".slick_3").exists())
    {
        $('.slick_3').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay:true,
            nextArrow: '<img src="./frontend/images/next-37.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./frontend/images/prev-37.png" alt="Prev" class="slick-prev">',
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });        
    }

    if($(".slick_4").exists())
    {
        $('.slick_4').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay:true,
            nextArrow: '<img src="./frontend/images/next-37.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./frontend/images/prev-37.png" alt="Prev" class="slick-prev">',

            responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });        
    }
    if($(".slick_service").exists())
    {
        $('.slick_service').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay:true,
            nextArrow: '<img src="./frontend/images/next-37.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./frontend/images/prev-37.png" alt="Prev" class="slick-prev">',

            responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });        
    }
    if($(".slick_sp").exists())
    {
        $('.slick_sp').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay:true,
            nextArrow: '<img src="./frontend/images/next-37.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./frontend/images/prev-37.png" alt="Prev" class="slick-prev">',

            responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 320,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });        
    }
    if($(".slick_dt").exists())
    {
        $('.slick_dt').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay:true,
            nextArrow: '<img src="./assets/images/next_16.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./assets/images/prev_16.png" alt="Prev" class="slick-prev">',

            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                }
            },          

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },

            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 570,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
            ]
        });        
    }
    if($(".slick_1").exists())
    {
        $('.slick_1').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            autoplay:true,
            fade: true,
            speed:300,
            arrows: true,
            nextArrow: '<img src="./frontend/images/next-37.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./frontend/images/prev-37.png" alt="Prev" class="slick-prev">',
        });
    }
    if($(".slick_ha").exists())
    {
        $('.slick_ha').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            autoplay:true,
            fade: true,
            speed:300,
            arrows: false,
            nextArrow: '<img src="./frontend/images/next-37.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./frontend/images/prev-37.png" alt="Prev" class="slick-prev">',
        });
    }

    if($(".single-item").exists() && $(".slider-nav").exists())
    {
        $('.single-item').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            nextArrow: '<img src="./assets/images/next-45.png" alt="Next" class="slick-next">',
            prevArrow: '<img src="./assets/images/prev-45.png" alt="Prev" class="slick-prev">',
            autoplay:true,
            speed:300,
            fade: false,
            lazyLoad: 'ondemand',
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            dots: false,
            infinite: true,
            asNavFor: '.single-item',
            slidesToShow: 3,
            slidesToScroll: 1,
            vertical:false,
            verticalSwiping:false,
            arrows:false,
            autoplay:true,
            speed:300,    
            slide: 'div',
            focusOnSelect: true,
        });
    }
    if($(".slick-v").exists() )
    {
        $('.slick-v').slick({
            dots: false,
            fade:false,
            infinite: true, 
            slidesToShow: 2,
            slidesToScroll: 1,
            vertical:true,
            verticalSwiping:true,
            arrows:false,
            autoplay:true,
            pauseOnHover:true,

        });
    }
    if($(".variable-width").exists() )
    {
        $('.variable-width').slick({
            dots: false,
            infinite: true,
            autoplay:true,
            speed: 300,
            slidesToShow: 1,
            variableWidth: true
        });
    }
};
/* Cart */
NN_FRAMEWORK.Cart = function(){
    $("body").on("click",".addcart",function(){
        var mau = ($(".color-pro-detail input:checked").val()) ? $(".color-pro-detail input:checked").val() : 0;
        var size = ($(".size-pro-detail input:checked").val()) ? $(".size-pro-detail input:checked").val() : 0;
        var id = $(this).data("id");
        var action = $(this).data("action");
        var quantity = ($(".qty-pro").val()) ? $(".qty-pro").val() : 1;

        if(id)
        {
            $.ajax({
                url:'ajax/ajax_cart.php',
                type: "POST",
                dataType: 'json',
                async: false,
                data: {cmd:'add-cart',id:id,mau:mau,size:size,quantity:quantity},
                success: function(result){
                    if(action=='addnow')
                    {
                        $('.count-cart').html(result.max);
                        $.ajax({
                            url:'ajax/ajax_cart.php',
                            type: "POST",
                            dataType: 'html',
                            async: false,
                            data: {cmd:'popup-cart'},
                            success: function(result){
                                $("#popup-cart .modal-body").html(result);
                                $('#popup-cart').modal('show');
                            }
                        });
                    }
                    else if(action=='buynow')
                    {
                        window.location = CONFIG_BASE + "gio-hang";
                    }
                }
            });
        }
    });

    $("body").on("click",".del-procart",function(){
        if(confirm(LANG['delete_product_from_cart']))
        {
            var code = $(this).data("code");
            var ship = $(".price-ship").val();

            $.ajax({
                type: "POST",
                url:'ajax/ajax_cart.php',
                dataType: 'json',
                data: {cmd:'delete-cart',code:code,ship:ship},
                success: function(result){
                    $('.count-cart').html(result.max);
                    if(result.max)
                    {
                        $('.price-temp').val(result.temp);
                        $('.load-price-temp').html(result.tempText);
                        $('.price-total').val(result.total);
                        $('.load-price-total').html(result.totalText);
                        $(".procart-"+code).remove();
                    }
                    else
                    {
                        $(".wrap-cart").html('<a href="" class="empty-cart text-decoration-none"><i class="fa fa-cart-arrow-down"></i><p>'+LANG['no_products_in_cart']+'</p><span>'+LANG['back_to_home']+'</span></a>');
                    }
                }
            });
        }
    });

    $("body").on("click",".counter-procart",function(){
        var $button = $(this);
        var quantity = 1;
        var input = $button.parent().find("input");
        var id = input.data('pid');
        var code = input.data('code');
        var oldValue = $button.parent().find("input").val();
        if($button.text() == "+") quantity = parseFloat(oldValue) + 1;
        else if(oldValue > 1) quantity = parseFloat(oldValue) - 1;
        $button.parent().find("input").val(quantity);
        update_cart(id,code,quantity);
    });

    $("body").on("change","input.quantity-procat",function(){
        var quantity = $(this).val();
        var id = $(this).data("pid");
        var code = $(this).data("code");
        update_cart(id,code,quantity);
    });

    if($(".select-city-cart").exists())
    {
        $(".select-city-cart").change(function(){
            var id = $(this).val();
            load_district(id);
            // load_chinhanh(id,0);
            load_ship(id,0,0);
        });
    }

    if($(".select-district-cart").exists())
    {
        $(".select-district-cart").change(function(){
            var id_city = $("#city").val();
            var id = $(this).val();

            // load_chinhanh(id_city,id);
            load_wards(id);
            load_ship(id_city,id,0);
        });
    }

    if($(".select-wards-cart").exists())
    {
        $(".select-wards-cart").change(function(){
            var id_city = $("#city").val();
            var id_district = $("#district").val();
            var id = $(this).val();
            load_ship(id_city,id_district,id);
        });
    }

    if($(".payments-label").exists())
    {
        $(".payments-label").click(function(){
            var payments = $(this).data("payments");
            $(".payments-cart .payments-label, .payments-info").removeClass("active");
            $(this).addClass("active");
            $(".payments-info-"+payments).addClass("active");
        });
    }

    if($(".color-pro-detail").exists())
    {
        $(".color-pro-detail").click(function(){
            $(".color-pro-detail").removeClass("active");
            $(this).addClass("active");
            
            var id_mau=$("input[name=color-pro-detail]:checked").val();
            var idpro=$(this).data('idpro');

            $.ajax({
                url:'ajax/ajax_color.php',
                type: "POST",
                dataType: 'html',
                data: {id_mau:id_mau,idpro:idpro},
                success: function(result){
                    if(result!='')
                    {
                        $('.price-new-pro-detail').html(result);
/*                        $('.left-pro-detail').html(result);
                        MagicZoom.refresh("Zoom-1");
                        NN_FRAMEWORK.OwlProDetail();*/
                    }
                }
            });
        });
    }

    if($(".size-pro-detail").exists())
    {
        $(".size-pro-detail").click(function(){
            $(".size-pro-detail").removeClass("active");
            $(this).addClass("active");
        });
    }

    if($(".quantity-pro-detail span").exists())
    {
        $(".quantity-pro-detail span").click(function(){
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if($button.text() == "+")
            {
                var newVal = parseFloat(oldValue) + 1;
            }
            else
            {
                if(oldValue > 1) var newVal = parseFloat(oldValue) - 1;
                else var newVal = 1;
            }
            $button.parent().find("input").val(newVal);
        });
    }
};

/* Ready */
$(document).ready(function(){
    // NN_FRAMEWORK.Tools();
    NN_FRAMEWORK.Popup();
    NN_FRAMEWORK.WowAnimation();
    NN_FRAMEWORK.AltImages();
    NN_FRAMEWORK.BackToTop();
    NN_FRAMEWORK.FixMenu();
    NN_FRAMEWORK.Mmenu();
    NN_FRAMEWORK.Slick();
    // NN_FRAMEWORK.OwlPage();
    // NN_FRAMEWORK.OwlProDetail();
    // NN_FRAMEWORK.Toc();
    NN_FRAMEWORK.Cart();
    NN_FRAMEWORK.SimplyScroll();
    NN_FRAMEWORK.Tabs();
    NN_FRAMEWORK.Videos();
    NN_FRAMEWORK.Photobox();
    NN_FRAMEWORK.Search();
    NN_FRAMEWORK.DatetimePicker();
});