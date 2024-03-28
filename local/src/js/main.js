//@prepros-prepend plugin/jquery_min.js


$(function () {

    //@prepros-prepend template/header.js
    //@prepros-prepend template/topbtn.js
    //@prepros-prepend template/modal.js
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

    //回上一頁
    document.querySelector('.back-btn').onclick = function () {
        window.history.back();
    }
});

