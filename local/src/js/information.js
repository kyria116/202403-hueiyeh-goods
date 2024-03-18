


$(function(){
    //@prepros-prepend template/top_menu.js

    window.setTimeout(function () {
        slider_ul_list("top-menu-ul-2");
    }, 1);
    window.setTimeout(function () {
        slider_ul_list("top-menu-ul-3");
    }, 1);

    let newIndex = 0
    $('.information_topMenu .item_menu_list li').on('click', function(){
        newIndex = $(this).index()
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
        $('.topMenuContain > li').eq(newIndex).addClass('active')
        $('.topMenuContain > li').eq(newIndex).siblings().removeClass('active')
    })
    $('.information_topMenu select').on('change', function () {
        newIndex = $(this).val()
        $('.topMenuContain > li').eq(newIndex).addClass('active')
        $('.topMenuContain > li').eq(newIndex).siblings().removeClass('active')
    });

    let traffic = 0
    let menuNum = [['outpatientList', 2], ['traffic', 5]]
    for(let i=0; i<menuNum.length; i++){
        if(location.href.split('?')[1] == menuNum[i][0]){
            if(winW > 767){
                $(`.${menuNum[i][0]}`).click()
                traffic = $(`.${menuNum[i][0]}`).offset().top - $('header').outerHeight() - 20
            }else{
                $('.information_topMenu select option').each(function(){
                    if($(this).val() == menuNum[i][1]){
                        $(this).prop('selected', true)
                        $('.topMenuContain li').removeClass('active')
                        $('.topMenuContain > li').eq( menuNum[i][1]).addClass('active')
                    }
                })
                traffic = $('.informationContain').offset().top - $('header').outerHeight() - 20
            }
            
            $('html,body').stop(true).animate({
                scrollTop: traffic 
            }, 1000);
        }
    }
});