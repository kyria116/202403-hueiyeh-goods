
$(window).on('scroll', gotop);
$(window).on('resize', gotop);
function gotop(){
    let topbtnH = $('.fixBoxBtn').outerHeight();
    let winH = $(window).height();
    let winscroll = $(window).scrollTop();
    let topBtnStop = $(document).height() - winH - $('footer').outerHeight() + (topbtnH / 2) + 20;

    if ($(window).width() > 991 && winscroll >= topBtnStop) {
        $('.fixBoxBtn').addClass('change');
        $('.fixBoxBtn').removeClass('change_mo');
    } else if ($(window).width() < 991 && $(window).width() > 768 &&  winscroll >= topBtnStop) {
        $('.fixBoxBtn').removeClass('change');
        $('.fixBoxBtn').addClass('change_mo_991');
    } else if ($(window).width() < 768 && winscroll >= topBtnStop) {
        $('.fixBoxBtn').removeClass('change');
        $('.fixBoxBtn').addClass('change_mo');
    }else {
        $('.fixBoxBtn').removeClass('change');
        $('.fixBoxBtn').removeClass('change_mo_991');
        $('.fixBoxBtn').removeClass('change_mo');
        $('.fixBoxBtn').removeAttr('style');
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
