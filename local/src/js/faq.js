
//@prepros-prepend product.js
$(function(){
	window.setTimeout(function () {
		slider_ul_list("top-menu-ul-3");
        
	}, 1);
	let aryFaq = []
	let aryTitle = [0, ]
	let num = 0

	$('.faqBox').each(function(){
		$(this).find('.faqList').each(function(){
			$(this).attr('data-num', num)
			aryFaq.push($(this).offset().top - $('header').outerHeight())
			num++
		})
		aryTitle.push($(this).find('.b_title').offset().top - $('header').outerHeight())
	})

	$('.top-menu-ul-3 .item_menu_list > li').on('click', function () {
		$('.faqList').find('.txt').slideUp()
		$('html,body').stop(true).animate({
			scrollTop: aryTitle[$(this).index()]
		}, 1000);
	});

	$('.faqList > a').on('click', function(){
		$(this).parent().addClass('active')
		$(this).parent().siblings().removeClass('active')
		$(this).parents('.faqBox').siblings().find('.faqList').removeClass('active')
		$(this).siblings().slideToggle()
		$(this).parent().siblings().find('.txt').slideUp()
		$(this).parents('.faqBox').siblings().find('.txt').slideUp()
		$('html,body').stop(true).animate({
			scrollTop: aryFaq[$(this).parent().attr('data-num')]
		}, 1000);
	})
})