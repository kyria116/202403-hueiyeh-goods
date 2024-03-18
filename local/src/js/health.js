


$(function(){
    let numMenu = $('main').attr('data-health')
    $('#top-menu-ul li').removeClass('active')
    $('#top-menu-ul li').eq(numMenu).addClass('active')

    //@prepros-prepend template/top_menu.js

    window.setTimeout(function () {
        slider_ul_list("top-menu-ul-2");
    }, 1);



    //音樂
    $('.healthMusic li').on('click', function(){
        $(this).siblings().removeClass('active')
        $(this).toggleClass('active')
    });
    var songList = document.querySelectorAll(".healthMusic li");
    var audioPlay = document.querySelector(".song_music");
    var audioSrc = document.querySelector(".song_music source");
    var musicList = document.querySelectorAll(".musicList li")
    songList.forEach((i,idx) => {
        i.addEventListener('click', function(){
            if(i.classList.contains('playNow')){
                i.classList.remove('playNow')
                audioPlay.pause()
            }else{
                i.classList.add('playNow')
                audioSrc.src = musicList[idx].dataset.src
                audioPlay.load()
                audioPlay.play()
                siblings(i)
            }
        })
    })
    function siblings(item){
        var p = item.parentNode.children;
        for(var i=0, pl=p.length; i<pl ;i++){
            if(p[i] !== item){
                p[i].classList.remove('playNow')
            }
        }
    }

    //影片
    $('.healthVideo li').on('click', function(){
        let ytLink = $(this).find('>a').attr('data-yt')
        $('#popup iframe').attr('src', `https://www.youtube.com/embed/${ytLink}`)
        $('html').addClass('popupOpen')
    })
    $('.closeIcon').on('click', function () {
        $('html').removeClass('popupOpen')
        $('#popup iframe').attr('src', ``)
    });
    setTimeout(function(){console.clear()}, 500)

    if(winW < 768){
        $('.health_topMenu select option').each(function(){
            if($(this).text().trim() == $('main').attr('data-name')){
                $(this).prop('selected', true)
            }
        })
    }
});