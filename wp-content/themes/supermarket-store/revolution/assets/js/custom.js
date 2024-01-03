jQuery(document).ready(function ($) {

    if ($('.go-to-top').length) {
        var scrollTrigger = $('body').position(); // px
        goToTop = function () {

            var scrollTop = $(window).scrollTop();
            if (scrollTop > 150) {
                $('.footer-go-to-top').addClass('show');
            } else {
                $('.footer-go-to-top').removeClass('show');
            }
        };
        goToTop();
        $(window).on('scroll', function () {
            goToTop();
        });
        $('.go-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: scrollTrigger.top
            }, 700);
        });
    }

    // Mobile Menu Focus
    $(window).resize(navTrapp)

    function navTrapp() {
        var width = $(window).width();
        if (width < 992) {
            $('.main-navigation').on('keydown', function (e) {
                if ($('.main-navigation').hasClass('toggled')) {
                    var focusableEls = $('.main-navigation a[href]:not([disabled]), .main-navigation button');
                    var firstFocusableEl = focusableEls[0];
                    var lastFocusableEl = focusableEls[focusableEls.length - 1];
                    var KEYCODE_TAB = 9;
                    var KEYCODE_ESC = 27;
                    if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                        if (e.shiftKey) /* shift + tab */ {
                            if (document.activeElement === firstFocusableEl) {
                                lastFocusableEl.focus();
                                e.preventDefault();
                            }
                        }
                        else /* tab */ {
                            if (document.activeElement === lastFocusableEl) {
                                firstFocusableEl.focus();
                                e.preventDefault();
                            }
                        }
                    }
    
                    if (e.keyCode === KEYCODE_ESC) {
                        console.log(e.keyCode);
                        $('.main-navigation').removeClass('toggled');
                        return;
                    }
                }
                
            });
        }
    }
   
    navTrapp()
    var owl = jQuery('#main-slider-wrap .owl-carousel');
    owl.owlCarousel({
        margin:20,
        nav: true,
        autoplay : false,
        lazyLoad: false,
        autoplayTimeout: 2000,
        loop: true,
        dots: false,
        navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i> '],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });
});

jQuery(document).ready(function(){
    jQuery(".product-cat").hide();
    jQuery("button.product-btn").click(function(){
        jQuery(".product-cat").toggle();
    });
});
