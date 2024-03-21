var swiper = new Swiper(".strip-ads", {
    direction: "vertical",
    autoplay:true,
    speed:1000,
    loop:true,
});
$('#close_ad').on('click', function () {
    $('.text_ticker').css('display', 'none')
    })
var swiper = new Swiper(".mySwiper1", {
    pagination: {
        el: ".swiper-pagination",
    },
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1.3,
    spaceBetween: 20,
    centeredSlides: true,
    loop: true,
    hashNavigation: {
        watchState: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        768: {
            spaceBetween: 30,
            slidesPerView: 1.5,
        },
        1200: {
            spaceBetween: 40,
            slidesPerView: 2.35,
        },
        1600: {
            spaceBetween: 46,
            slidesPerView: 2.35,
        }
    }
});

(function () {
    'use strict';

    let breakpoint = window.matchMedia('(min-width:991px)');
    let mySwiper2 = null;
    let swiperOptions = {
        loop: true,
        slidesPerView: '2.2',
        spaceBetween: 12,

        centeredSlides: false,
    };

    const breakpointChecker = function () {
        if (breakpoint.matches === true) {
            // 如果寬度大於 991px，銷毀 Swiper 實例（如果存在）
            if (mySwiper2 !== null) {
                mySwiper2.destroy(true, true);
                mySwiper2 = null;
            }
        } else {
            // 如果寬度小於 991px，啟用 Swiper 實例
            enableSwiper();
        }
    };

    const enableSwiper = function () {
        // 如果 Swiper 實例不存在，則建立它
        if (mySwiper2 === null) {
            mySwiper2 = new Swiper(".mySwiper2", swiperOptions);
        }
    };

    // 監聽視窗大小變化
    window.addEventListener('resize', function () {
        // 更新 breakpoint 的狀態
        breakpoint = window.matchMedia('(min-width:991px)');
        // 檢查斷點狀態
        breakpointChecker();
    });

    // 初始檢查斷點狀態
    breakpointChecker();
})();

function onYouTubeIframeAPIReady() {
    var player;
    player = new YT.Player('YouTubeVideoPlayerAPI', {
        videoId: '9DPRtYDHTks', // YouTube 影片ID
        width: '100%', // 播放器寬度 (px)
        height: '100%', // 播放器高度 (px)
        playerVars: {
            autoplay: 1, // 自動播放影片
            controls: 0, // 顯示播放器
            showinfo: 0, // 隱藏影片標題
            modestbranding: 0, // 隱藏YouTube Logo
            loop: 1, // 重覆播放
            playlist: '9DPRtYDHTks', // 當使用影片要重覆播放時，需再輸入YouTube 影片ID
            fs: 0, // 隱藏全螢幕按鈕
            cc_load_policty: 0, // 隱藏字幕
            iv_load_policy: 3, // 隱藏影片註解
            autohide: 0 // 影片播放時，隱藏影片控制列
        },
        events: {
            onReady: function (e) {
                e.target.mute(); //播放時靜音
                e.target.playVideo(); //強制播放(手機才會自動播放，但僅限於Android)
            }
        }
    });
}