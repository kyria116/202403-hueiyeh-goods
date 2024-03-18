


$(function(){
    //@prepros-prepend plugin/swiper-bundle.min.js

    
    //音樂
    $('.relevant .healthMusic').on('click', function(){
        $(this).siblings().removeClass('active')
        $(this).toggleClass('active')
    });
    var songList = document.querySelectorAll(".relevant .healthMusic");
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
    $('.healthVideo').on('click', function(){
        let ytLink = $(this).find('>a').attr('data-yt')
        $('#popup iframe').attr('src', `https://www.youtube.com/embed/${ytLink}`)
        $('html').addClass('popupOpen')
    })
    $('.closeIcon').on('click', function () {
        $('html').removeClass('popupOpen')
        $('#popup iframe').attr('src', ``)
    });
    setTimeout(function(){console.clear()}, 500)


    
    var swiper = new Swiper(".relevant .swiper", {
        slidesPerView: 1.6,
        spaceBetween: 32,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },  
        breakpoints: {
            // when window width is >= 480px
            576: {
                slidesPerView: 2.5,
            },
            // when window width is >= 640px
            768: {
                slidesPerView: 3,
                spaceBetween: 16,
                centeredSlides: false,
            },
            // when window width is >= 640px
            1200: {
                slidesPerView: 3,
                spaceBetween: 32,
                centeredSlides: false,
            }
        }
    });
});