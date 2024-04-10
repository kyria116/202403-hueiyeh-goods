
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
    }
    $(this).parent().siblings().removeClass('active')
})

$('.closeMenu').on('click', function () {
    $('.closeMenu').removeClass('open')
    $('.menu-ham').removeClass('close')
    $('.menu li').removeClass('active')
});

//-------------------HAMBUR 開合--------------------
$('.menu-ham').on('click', function () {
    $(this).toggleClass('hamActive');
    $('body').toggleClass('openMenu');
$('.menu >li:first').addClass('active')
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

//search
$(document).ready(function() {
    $(document).on('click', function(event) {
        // 如果點擊的元素不是搜索圖標、搜索框或菜單框，則取消樣式
        if (!$(event.target).closest('.search_icon, .searchBox, .menuBox').length) {
            $('.searchBox').css({
                'opacity': '0',
                'pointer-events': 'none'
            });
        }
    });

    $('.search_icon').click(function() {
        $('.searchBox').toggleClass('searchBox_open').css({
            'opacity': function(_, value) {
                return value === '1' ? '0' : '1'; // 如果當前 opacity 為 1，則點擊後設為 0；如果不是 1，則設為 1
            },
            'pointer-events': function(_, value) {
                return value === 'all' ? 'none' : 'all'; // 如果當前 pointer-events 為 all，則點擊後設為 none；如果不是 all，則設為 all
            }
        });
    });

    $('.menu li').hover(function() {
        // 當滑鼠懸停在菜單項上時，取消樣式
        $('.searchBox').css({
            'opacity': '0',
            'pointer-events': 'none'
        });
    });
});


//member

document.querySelector('.member_icon').addEventListener('click', function() {
    document.querySelector('.member_menu_list').classList.add('show_member_menu_list');
});

function removeMenuClass() {
    document.querySelector('.member_menu_list').classList.remove('show_member_menu_list');
}

document.querySelector('#close_member').addEventListener('click', function() {
    removeMenuClass();
});

window.addEventListener('resize', function() {
    removeMenuClass();
});
