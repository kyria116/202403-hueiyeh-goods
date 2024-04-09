
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


	var galleryThumbs = new Swiper('.gallery-thumbs', {
		slidesPerView: 'auto',
		loop: true,
		loopedSlides: 12,
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
			}
		}
	});

	var galleryTop = new Swiper('.gallery-top', {
		loop: true,
		loopedSlides: 12,
		noSwiping : true,
		effect : 'fade',  
	});

	galleryTop.controller.control = galleryThumbs;
	galleryThumbs.controller.control = galleryTop;
	


	function showMonth(items){
		num = items
		$('.swiper-slide-active .content li').removeClass('active')
		$('.swiper-slide-active .content li').eq(num).addClass('active')
		
		$('.swiper-slide-active .showMonth').text($('.swiper-slide-active .monthBox li').eq(num).find('a').attr('data-month'))

		if(items >= frequency){
			items = frequency
			$('.contentList.swiper-slide-active .rightBtn').addClass('noPage')
			$('.contentList.swiper-slide-active .leftBtn').removeClass('noPage')
		}else if(items == 0){
			$('.contentList.swiper-slide-active .leftBtn').addClass('noPage')
			$('.contentList.swiper-slide-active .rightBtn').removeClass('noPage')
		}
		if(num != 0){
			$('.contentList.swiper-slide-active .leftBtn').removeClass('noPage')
		}
		$('.contentList.swiper-slide-active .monthBox ul').stop(true).animate({
			scrollLeft: ary[items]
		}, 400)
	}
	
	$('.contentList.swiper-slide-active .monthBox li').each(function(e){
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
	$('.monthContent .swiper-slide').each(function(){
		$(this).find('.topMenu li').each(function(){
			if($(this).find('a').attr('data-month') == month ){
				$(this).addClass('repeat')
			}else{
				month = $(this).find('a').attr('data-month')
			}
		})
	})
	
	// 點擊月份後顯示active月份+content
	$('body').on('click', '.swiper-slide-active .topMenu li a', function(){
		num = $(this).parent().index()
		showMonth(num)
	})

	$('body').on('click', '.contentList.swiper-slide-active .rightBtn', function () {
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

	$('body').on('click', '.contentList.swiper-slide-active .leftBtn', function () {
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

$(document).ready(function() {
	$('[data-vbg]').youtube_background();
});

