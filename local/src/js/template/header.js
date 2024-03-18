
let winscroll = $(window).scrollTop();
let winH = $(window).height();
let winW = $(window).width();
    
//--------------MENU-------------------
$('.searchBox .img').on('click', function () {
    $(this).parent().toggleClass('open')
});


let num = $('body').data('menu')
$('.menu > li').eq(num).addClass('active')
let numSec = $('body').data('child')
$('li.active .menu-second > li').eq(numSec).addClass('active')
$('.menu-list').on('click',function(){
    if(winW < 992){
        $(this).parent().addClass('active')
        $(this).siblings().addClass('active')
        $('.closeMenu').addClass('open')
        $('.menu-ham').addClass('close')
    }
    $(this).parent().siblings().removeClass('active')
})

$('.closeMenu').on('click', function () {
    $('.closeMenu').removeClass('open')
    $('.menu-ham').removeClass('close')
    $('.menu li').removeClass('active')
    $('.menu-second').removeClass('active')
});

//-------------------HAMBUR 開合--------------------
$('.menu-ham').on('click', function () {
    $(this).toggleClass('hamActive');
    $('body').toggleClass('openMenu');

    if ($(this).hasClass('hamActive')) {
        $('html').css('overflow-y', 'hidden');
        $('header').removeClass('scroll');
    } else {
        $('html').css('overflow-y', 'auto');
        $('.menu li').removeClass('active')
    }
});


//當畫面大於991時，移除漢堡選單目前開闔的情況
$(window).on('resize', function () {
    winW = $(window).width();
    if (winW > 991) {
        // $('.menu li').removeClass('active')
        $('body').removeClass('openMenu');
        $('.menu-ham').removeClass('hamActive');
    }
});



if (winW < 992) {

    $('footer .f_top ul li').on('click', function(){
        $(this).addClass('open')
        $(this).siblings().removeClass('open')
    })
    
    $(window).on('click', function(e){
        var icon = $('footer .f_top ul'); 
        if(!icon.is(e.target) && icon.has(e.target).length === 0){
            $('footer .f_top ul li').removeClass('open');
        }
    });
}

