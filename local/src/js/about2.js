
	//@prepros-prepend plugin/jquery_min.js
	//@prepros-prepend plugin/swiper-bundle.min6.js


$(function(){
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
		
	}
	
	let ary = []
	let month = '00'
	let aryNum = 0
	let ulWidth = $('.monthBox').width() //ul的寬
	let firstAry = 0 //第一個按鈕的起始位置
	let frequency = 0 //可以點擊按鈕的次數
	let num = 0 //第幾個li被active


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

	
})