
//@prepros-prepend product.js
$(function(){
	window.setTimeout(function () {
		slider_ul_list("top-menu-ul-3");
        
	}, 1);


	let aryFaq = []
	let num = 0
	$('.faqBox').each(function(){
		$(this).find('.faqList').each(function(){
			$(this).attr('data-num', num)
			aryFaq.push($(this).offset().top - $('header').outerHeight())
			num++
		})
	})
	var dwidth = $(window).width();
	$(window).bind('resize', function(e){

		var wwidth = $(window).width();

		if(dwidth !== wwidth){
			dwidth = $(window).width();

			if (window.RT) clearTimeout(window.RT);
			window.RT = setTimeout(function(){
				aryFaq = []
				num = 0
				$('.faqBox').each(function(){
					$(this).find('.faqList').each(function(){
						$(this).attr('data-num', num)
						aryFaq.push($(this).offset().top - $('header').outerHeight())
						num++
					})
				})
			}, 1000);
		}
		
	});
	

	$('.faqList > a').on('click', function(){
		$(this).parent().toggleClass('active')
		$(this).parent().siblings().removeClass('active')
		$(this).parents('.faqBox').siblings().find('.faqList').removeClass('active')
		$(this).siblings().slideToggle(200)
		$(this).parent().siblings().find('.txt').slideUp(200)
		$(this).parents('.faqBox').siblings().find('.txt').slideUp(200)
		setTimeout(()=>{
			$('html,body').stop(true).animate({
				scrollTop: aryFaq[$(this).parent().attr('data-num')]
			}, 200);
		},500)
	})

	// $('.top-menu-ul-3 .slides li').on('click', function () {
	// 	let $index = $(this).index() - 1
	// 	$('.faqBox').each((e) => {
	// 		if(e == $index || $index < 0){
	// 			$('.faqBox').eq(e).css('display', 'block')
	// 		}else{
	// 			$('.faqBox').eq(e).css('display', 'none')
	// 		}
	// 	})
	// });
})