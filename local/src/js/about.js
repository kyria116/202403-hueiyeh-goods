
	//@prepros-prepend plugin/jquery_min.js
	//@prepros-prepend plugin/swiper-bundle.min6.js
	//@prepros-prepend plugin/jquery.youtube-background


$(function(){

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
		on:{
			click: function(){
				num = 0
				$('.contentList.swiper-slide-active .monthBox li').each(function(e){
					if(e == 0){
						firstAry = $(this).offset().left
					}
					ary.push($(this).offset().left - firstAry)
				})
			},
			slideChangeTransitionEnd: function(){
				activeSlide = $('.gallery-thumbs .swiper-slide-active').attr('data-slide')
				activeSlides()
			},
			touchEnd: function(){
				activeSlide = $('.gallery-thumbs .swiper-slide-active').attr('data-slide')
				activeSlides()
			},
		}
	});

	function activeSlides(){
		$('.contentList').removeClass('active')
		$('.contentList').eq(activeSlide).addClass('active')
	}

	function showMonth(items){
		num = items
		$('.contentList.active .content li').removeClass('active')
		$('.contentList.active .content li').eq(num).addClass('active')
		
		$('.contentList.active .showMonth').text($('.contentList.active .monthBox li').eq(num).find('a').attr('data-month'))

		if(items >= frequency){
			items = frequency
			$('.contentList.active .rightBtn').addClass('noPage')
			$('.contentList.active .leftBtn').removeClass('noPage')
		}else if(items == 0){
			$('.contentList.active .leftBtn').addClass('noPage')
			$('.contentList.active .rightBtn').removeClass('noPage')
		}
		if(num != 0){
			$('.contentList.active .leftBtn').removeClass('noPage')
		}
		$('.contentList.active .monthBox ul').stop(true).animate({
			scrollLeft: ary[items]
		}, 400)
		console.log(ary[items]);
	}
	
	$('.contentList.active .monthBox li').each(function(e){
		if(e == 0){
			firstAry = $(this).offset().left
		}
		if(ulWidth < $(this).offset().left - firstAry){
			frequency++
		}
		ary.push($(this).offset().left - firstAry)
	})
	$('.contentList .monthBox li').each(function(e){
		if($(this).hasClass('active')){
			$(this).parent().parent().siblings('.showMonth').text($(this).find('a').attr('data-month'))
		}
	})


	//月份是否重複
	$('.monthContent .contentList').each(function(){
		$(this).find('.topMenu li').each(function(){
			if($(this).find('a').attr('data-month') == month ){
				$(this).addClass('repeat')
			}else{
				month = $(this).find('a').attr('data-month')
			}
		})
	})
	
	// 點擊月份後顯示active月份+content
	$('body').on('click', '.contentList.active .topMenu li a', function(){
		num = $(this).parent().index()
		showMonth(num)
	})

	$('body').on('click', '.contentList.active .rightBtn', function () {
		num++
		if(num >= frequency){
			num = frequency
			$('.contentList.swiper-slide-active .rightBtn').addClass('noPage')
		}
		$('.contentList.swiper-slide-active .leftBtn').removeClass('noPage')
		$('.contentList.swiper-slide-active .monthBox ul').stop(true).animate({
			scrollLeft: ary[num]
		}, 400)
		showMonth(num)
	});

	$('body').on('click', '.contentList.active .leftBtn', function () {
		num--
		if(num <= 0){
			num = 0
			$('.contentList.swiper-slide-active .leftBtn').addClass('noPage')
		}
		$('.contentList.swiper-slide-active .rightBtn').removeClass('noPage')
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

$('.video').each(function(num,item){
	if($(this).attr('id') != undefined){
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
            autoplay: 1, // 自動播放影片
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
                e.target.mute(); //播放時靜音
                e.target.playVideo(); //強制播放(手機才會自動播放，但僅限於Android)
            }
        }
    });
}

$('#stop').click(function () {
    players.forEach(function (el) {
        el.stopVideo();
    });
});

