//@prepros-prepend plugin/swiper-bundle.min.js

$(function () {
	$('.proMenu li').on('click', function(){
		$(this).addClass('active')
		$(this).siblings().removeClass('active')
		$('.infoPage li').removeAttr('style');
		$('.infoPage li').eq($(this).index()).siblings().css('display', 'none');
	})

	
    var swiper = new Swiper(".mySwiper", {
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
    });
})
