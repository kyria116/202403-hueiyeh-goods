//@prepros-prepend plugin/jquery_min.js


$(function () {

    //@prepros-prepend template/header.js
    //@prepros-prepend template/topbtn.js
    //@prepros-prepend plugin/swiper-bundle.min.js

    // --------------------main min-height---------------------
    var windowHeight = $(window).height();
    var miniHeight = windowHeight - $('footer').outerHeight() + $('header').outerHeight();
    $('main').css({
        "min-height": miniHeight + "px"
    });

    $(window).on('resize', function (e) {
        var windowHeight = $(this).height();
        var miniHeight = windowHeight - $('footer').outerHeight() + $('header').outerHeight();

        $('main').css({
            "min-height": miniHeight + "px"
        });
    });

    //全站換頁淡入淡出
    setTimeout(function () {
        document.body.classList.add('fade-in');
    }, 600);

});
