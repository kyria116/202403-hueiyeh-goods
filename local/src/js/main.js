
$(function () {

    //@prepros-prepend plugin/jquery_min.js
    //@prepros-prepend template/header.js
    //@prepros-prepend template/topbtn.js
    //@prepros-prepend template/animation.js
    //@prepros-prepend template/cookies.js


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

    
    //footer
    $('footer .mailBox a').on('click', function(){
        if($('body').hasClass('popupOpen2')){
            $('body').removeClass('popupOpen2')
            $('body, html').css('overflow-y', 'auto')
        }else{
            $('body').addClass('popupOpen2')
            $('body, html').css('overflow-y', 'hidden')
        }
    })
    $('.popup_mailbox2 .closeIcon2').on('click', function () {
        $('body').removeClass('popupOpen2')
        $('body, html').css('overflow-y', 'auto')
    });

});
