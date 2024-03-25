

$(function(){
	let aryFaq = []
	let num = 0

	$('.faqBox').each(function(){
		$(this).find('.faqList').each(function(){
			$(this).attr('data-num', num)
			aryFaq.push($(this).offset().top - $('header').outerHeight())
			num++
		})
	})

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

	
	$('.top-menu-ul-2 li').on('click', function(){
		$(this).addClass('active')
		$(this).siblings().removeClass('active')
		$('.searchAllBox .box > li').css('display', 'none');
		$('.searchAllBox .box > li').eq($(this).index()).removeAttr('style');
	})
})