


$(function(){
    //@prepros-prepend plugin/swiper-bundle.min.js
    
    var swiperBanner = new Swiper(".swiper_banner", {
        effect : 'fade',
        speed: 1500,
        loop: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    var swiperService = new Swiper(".swiper_service", {
        slidesPerView: 'auto',
        spaceBetween: 15,
        centeredSlides: true,
        navigation: {
            nextEl: ".nextService",
            prevEl: ".prevService",
        },
        breakpoints: { 
            768: {
                slidesPerView: 'auto',
                spaceBetween: 15,
                centeredSlides: false,
            },
            992: {
                slidesPerView: 'auto',
                spaceBetween: 20,
                centeredSlides: false,
            },
            1440: {
                slidesPerView: 'auto',
                spaceBetween: 24,
                centeredSlides: false,
            }
        }
    });
    var swiperNews = new Swiper(".swiper_news", {
        slidesPerView: 1.57,
        spaceBetween: 48,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 5000,
        },
        breakpoints: { 
            768: {
                spaceBetween: 20,
                slidesPerView: 3,
                centeredSlides: false,
            },
            1200: {
                spaceBetween: 40,
                slidesPerView: 4,
                centeredSlides: false,
            },
            1600: {
                spaceBetween: 68,
                slidesPerView: 4,
                centeredSlides: false,
            }
        }
    });

    $('.banner .btn_blue').on('click', function () {
        $('html,body').stop(true).animate({
            scrollTop: $('.information').offset().top - $('header').outerHeight() - 20
        }, 1000);
    });
});