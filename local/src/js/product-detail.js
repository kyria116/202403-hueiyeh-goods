//@prepros-prepend plugin/swiper-bundle.min.js

$(function () {
	let marTop = 0
	function init() {
		if (winW > 767) {
			marTop = 128
		} else {
			// marTop = 24
			marTop = 91
		}
		$('.productBox').css('margin-top', `${Number(marTop) + Number($('.fixedBuy').outerHeight())}px`)

		if (winW > 991) {
			$('.buyBox .buyLeft').css('height', $('.buyRight').outerHeight())
		}
		
		if($('.buyLeft').children().length === 0) {
			$('.buyLeft').addClass('buyLeft_none');
		}

	}


	init()

	$(window).on('resize', function () {
		init()

	});

	$('.proMenu li').on('click', function () {
		$(this).addClass('active')
		$(this).siblings().removeClass('active')
		$('.infoPage li').removeAttr('style');
		$('.infoPage li').eq($(this).index()).siblings().css('display', 'none');
	})

	// let num = 1
	// $('.plus').on('click', function () {
	// 	$('.minus').removeClass('hidden')
	// 	num++
	// 	if (num > 10) {
	// 		$(this).addClass('hidden')
	// 		return
	// 	} if (num == 10) {
	// 		$(this).addClass('hidden')
	// 	} else {
	// 		$(this).removeClass('hidden')
	// 	}
	// 	$('.number').text(num)
	// });
	// $('.minus').on('click', function () {
	// 	$('.plus').removeClass('hidden')
	// 	num--
	// 	if (num < 1) {
	// 		$(this).addClass('hidden')
	// 		return
	// 	} else if (num == 1) {
	// 		$(this).addClass('hidden')
	// 	} else {
	// 		$(this).removeClass('hidden')
	// 	}
	// 	$('.number').text(num)
	// });

	var s_imgBox = new Swiper(".s_imgBox .mySwiper", {
		spaceBetween: 9,
		slidesPerView: 4.5,
		freeMode: true,
		watchSlidesProgress: true,
		loop: true,
		breakpoints: {
			768: {
				direction: 'vertical',
				slidesPerView: 'auto',
				spaceBetween: 12,
			},
		}
	});
	var b_imgBox = new Swiper(".b_imgBox .mySwiper", {
		spaceBetween: 0,
		loop: true,
		thumbs: {
			swiper: s_imgBox,
		},
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
	$('.likeSwiper-next').on('click', function () {
		if ($(this).hasClass('swiper-button-disabled')) {
			$('.likeSwiper').removeClass('mask')
		}
	})
	$('.likeSwiper-prev').on('click', function () {
		$('.likeSwiper').addClass('mask')
	})

	$('.buyLeft a').on('click', function () {
		$('#modalBgProduct').css('display', 'block');
		$('body').addClass('modal-open-product')
		$('html, body').css('overflow', 'hidden')
	})
	$('.closeIcon').on('click', function () {
		$('#modalBgProduct').css('display', 'none')
		$('body').removeClass('modal-open-product')
		$('html, body').css('overflow', 'hidden auto')
	})
	const outerProduct = document.getElementById('modalBgProduct')
	const innerProduct = document.getElementById('popupProduct')
	outerProduct.addEventListener("click", function (e) {
		$('#modalBgProduct').css('display', 'none')
		$('body').removeClass('modal-open-product')
		$('html, body').css('overflow', 'hidden auto')
		e.stopPropagation();
	}, false);
	innerProduct.addEventListener('click', function (e) {
		e.stopPropagation();
	}, false);
})
