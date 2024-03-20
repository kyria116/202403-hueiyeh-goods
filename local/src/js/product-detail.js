//@prepros-prepend plugin/swiper-bundle.min.js

$(function () {
	$('.proMenu li').on('click', function(){
		$(this).addClass('active')
		$(this).siblings().removeClass('active')
		$('.infoPage li').removeAttr('style');
		$('.infoPage li').eq($(this).index()).siblings().css('display', 'none');
	})

	var productBoxSwiper = new Swiper(".productBoxSwiper .mySwiper", {
		direction: 'vertical',
		slidesPerView: 3,
		spaceBetween: 32,
    });

    var addBoxSwiper = new Swiper(".addBoxSwiper .mySwiper", {
		slidesPerView: 1,
		spaceBetween: 0,
		navigation: {
			nextEl: ".addBoxSwiper-next",
			prevEl: ".addBoxSwiper-prev",
		},
		breakpoints: { 
			768: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1440: {
				slidesPerView: 3,
				spaceBetween: 32,
			}
		}
    });
	
    var likeSwiper = new Swiper(".likeSwiper .mySwiper", {
		slidesPerView: 1.65,
		spaceBetween: 10,
		navigation: {
			nextEl: ".likeSwiper-next",
			prevEl: ".likeSwiper-prev",
		},
		breakpoints: { 
			768: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			992: { 
				slidesPerView: 3,
				spaceBetween: 15
			},
			1440: {
				slidesPerView: 3,
				spaceBetween: 30,
			}
		}
    });

	$('.likeSwiper-next').on('click', function(){
		if($(this).hasClass('swiper-button-disabled')){
			$('.likeSwiper').removeClass('mask')
		}
	})
	$('.likeSwiper-prev').on('click', function(){
		$('.likeSwiper').addClass('mask')
	})
})
