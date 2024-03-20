
$(window).on('scroll', gotop);
$(window).on('resize', gotop);
function gotop(){
    let topbtnH = $('.fixBoxBtn').outerHeight();
    let winH = $(window).height();
    let winscroll = $(window).scrollTop();
    let topBtnStop = $(document).height() - winH - $('footer').outerHeight() + ($('.fixBtn').outerHeight() / 2) + 20;
    let topPc = $(document).height() - $('footer').outerHeight() - topbtnH + ($('.fixBtn').outerHeight() / 2) - 20;
    let topMo = $(document).height() - $('footer').outerHeight() - topbtnH + ($('.fixBtn').outerHeight() / 2);
    
    //show info icon
    
    if (winscroll > 0) {
        $('.fixBtn').addClass('show');
    } else {
        $('.fixBtn').removeClass('show');
    }
    if ($(window).width() > 991 && winscroll >= topBtnStopPc) {
        $('.fixBtn').addClass('change');
        $('.change').css('bottom', 'auto');
        $('.change').css('top', topPc);

    } else if ($(window).width() <= 991 && winscroll >= topBtnStopMo) {
        $('.fixBtn').addClass('change');
        $('.change').css('bottom', 'auto');
        $('.change').css('top', topMo);
    } else {
        $('.fixBtn').removeClass('change');
        $('.fixBtn').removeAttr('style');
    }

    //向上scroll
    $('.fixBtn').on('click',function(){
        $('html,body').stop(true).animate({
            scrollTop: 0
        }, 1000);
    })
}

$(window).on('scroll', function () {
    var scrollTop = $(this).scrollTop();
    var top = $('.fixBoxBtn');
    if (scrollTop > 99) {
        top.addClass('show_fixBoxBtn');
    } else {
        top.removeClass('show_fixBoxBtn');
    }
});
