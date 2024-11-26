
//@prepros-prepend plugin/jquery_min.js
//@prepros-prepend plugin/swiper-bundle.min6.js
//@prepros-prepend plugin/jquery.youtube-background


$(function () {

	let ary = []
	let month = '00'
	let ulWidth = $('.monthBox').width() //ul的寬
	let firstAry = 0 //第一個按鈕的起始位置
	let frequency = 0 //可以點擊按鈕的次數
	let num = 0 //第幾個li被active
	let activeSlide = 0 //年份是誰被active

	var galleryThumbs = new Swiper('.gallery-thumbs', {
		slidesPerView: 'auto',
		loop: true,
		slideToClickedSlide: true,
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
		breakpoints: {
			992: {
				direction: 'vertical',
				slidesPerView: 6,
			},
		},
		on: {
			click: function () {
				num = 0
			},
			slideChangeTransitionEnd: function () {
				activeSlide = $('.gallery-thumbs .swiper-slide-active').attr('data-slide')
				activeSlides()
				showMonth(0)
			},
			touchEnd: function () {
				activeSlide = $('.gallery-thumbs .swiper-slide-active').attr('data-slide')
				activeSlides()
				showMonth(0)
			},
		}
	});

	function activeSlides() {
		$('.contentList').removeClass('active')
		$('.contentList').eq(activeSlide).addClass('active')
		ary.length = 0; // 清空陣列
		frequency = 0; // 清空陣列
		$('.contentList.active .monthBox li').each(function (e) {
			if (e == 0) {
				firstAry = $(this).offset().left
			}
			if (ulWidth < $(this).offset().left - firstAry) {
				frequency++
			}
			ary.push($(this).offset().left - firstAry)
		})
	}

	function showMonth(items) {
		num = items
		let liLength = $('.contentList.active .content li').length

		$('.contentList.active .content li').removeClass('active')
		$('.contentList.active .content li').eq(num).addClass('active')

		$('.contentList.active .showMonth').text($('.contentList.active .monthBox li').eq(num).find('a').attr('data-month'))


		//判斷是否為一筆資料
		if (liLength == 1) {
			$('.contentList.active .rightBtn').addClass('noPage')
		} else {
			$('.contentList.active .leftBtn').removeClass('noPage')
			$('.contentList.active .rightBtn').removeClass('noPage')
			if (frequency == 0) {
				if (items == 0) {
					$('.contentList.active .leftBtn').addClass('noPage')
				} else if (items == (liLength - 1)) {
					$('.contentList.active .rightBtn').addClass('noPage')
				}
			} else {
				if (items == (liLength - 1)) {
					$('.contentList.active .rightBtn').addClass('noPage')
				} else if (items == 0) {
					$('.contentList.active .leftBtn').addClass('noPage')
				}
			}
		}
		// console.log("showMonth1", items, frequency, liLength)
		$('.contentList.active .monthBox ul').stop(true).animate({
			scrollLeft: ary[items]
		}, 400)
	}

	$('.contentList .monthBox li').each(function (e) {
		if ($(this).hasClass('active')) {
			$(this).parent().parent().siblings('.showMonth').text($(this).find('a').attr('data-month'))
		}
	})


	//月份是否重複
	$('.monthContent .contentList').each(function () {
		$(this).find('.topMenu li').each(function () {
			if ($(this).find('a').attr('data-month') == month) {
				$(this).addClass('repeat')
			} else {
				month = $(this).find('a').attr('data-month')
			}
		})
	})

	// 點擊月份後顯示active月份+content
	$('body').on('click', '.contentList.active .topMenu li a', function () {
		num = $(this).parent().index()
		showMonth(num)
	})

	$('body').on('click', '.contentList.active .rightBtn', function () {
		num++
		$('.contentList.swiper-slide-active .monthBox ul').stop(true).animate({
			scrollLeft: ary[num]
		}, 400)
		showMonth(num)
	});

	$('body').on('click', '.contentList.active .leftBtn', function () {
		num--
		$('.contentList.swiper-slide-active .monthBox ul').stop(true).animate({
			scrollLeft: ary[num]
		}, 400)
		showMonth(num)
	});


})

// $(document).ready(function() {
// 	$('[data-vbg]').youtube_background();
// });


var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var playerInfoList = []

$('.video').each(function (num, item) {
    if ($(this).attr('id') != undefined) {
        let str = {
            id: $(this).attr('id'),
            videoId: $(this).attr('data-video')
        }
        playerInfoList.push(str)
    }
})

function onYouTubeIframeAPIReady() {
    if (typeof playerInfoList === 'undefined') return;

    for (var i = 0; i < playerInfoList.length; i++) {
        var curplayer = createPlayer(playerInfoList[i]);
        players[i] = curplayer;
    }
}

var players = new Array();

function createPlayer(playerInfo) {
    return new YT.Player(playerInfo.id, {
        videoId: playerInfo.videoId,
        width: '100%', // 播放器寬度 (px)
        height: '100%', // 播放器高度 (px)
        playerVars: {
            autoplay: 0, // 禁止自動播放影片
            controls: 0, // 顯示播放器
            showinfo: 0, // 隱藏影片標題
            modestbranding: 0, // 隱藏YouTube Logo
            loop: 1, // 重覆播放
            playlist: playerInfo.videoId, // 當使用影片要重覆播放時，需再輸入
            fs: 0, // 隱藏全螢幕按鈕
            cc_load_policty: 0, // 隱藏字幕
            iv_load_policy: 3, // 隱藏影片註解
            autohide: 0 // 影片播放時，隱藏影片控制列
        },
        events: {
            onReady: function (e) {
                e.target.mute(); // 靜音
                // e.target.playVideo(); // 強制播放 - 已註解以避免自動播放
            }
        }
    });
}

$('#stop').click(function () {
    players.forEach(function (el) {
        el.stopVideo();
    });
});


// 存儲滾軸位置到 Cookie
window.addEventListener("beforeunload", function () {
    const scrollPosition = window.scrollY; // 垂直滾軸位置
    document.cookie = `scrollPosition=${scrollPosition}; path=/;`;
});

// 加載時恢復滾動位置
window.addEventListener("load", function () {
    const scrollPosition = getCookie("scrollPosition");
    if (scrollPosition) {
        window.scrollTo(0, parseInt(scrollPosition, 10));
    }
});

// 取得 Cookie 的函數
function getCookie(name) {
    const cookies = document.cookie.split("; ");
    for (let cookie of cookies) {
        const [key, value] = cookie.split("=");
        if (key === name) {
            return value;
        }
    }
    return null;
}
