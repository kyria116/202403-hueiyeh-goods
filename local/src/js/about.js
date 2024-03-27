//@prepros-prepend plugin/swiper-bundle.min.js


$(function(){
	let num = 0
	$('.topMenu li a').on('click', function(){
		$(this).parent().addClass('active')
		$(this).parent().siblings().removeClass('active')
		num = $(this).parent().index()
		$('.content li').removeClass('active')
		$('.content li').eq(num).addClass('active')
		$('.showMonth').text($(this).attr('data-month'))
	})
	let month = '00'
	$('.topMenu li').each(function(){
		if($(this).find('a').attr('data-month') == month ){
			$(this).addClass('repeat')
		}else{
			month = $(this).find('a').attr('data-month')
		}
	})
	let isDown = false;
	let startX;
	let scrollLeft;
	const slider = document.querySelector('.items');

	const end = () => {
		isDown = false;
		slider.classList.remove('active');
	}
	const start = (e) => {
		isDown = true;
		slider.classList.add('active');
		startX = e.pageX || e.touches[0].pageX - slider.offsetLeft;
		scrollLeft = slider.scrollLeft;	
	}
	const move = (e) => {
		if(!isDown) return;
		e.preventDefault();
		const x = e.pageX || e.touches[0].pageX - slider.offsetLeft;
		const dist = (x - startX);
		slider.scrollLeft = scrollLeft - dist;
	}
	(() => {
		slider.addEventListener('mousedown', start);
		slider.addEventListener('touchstart', start);

		slider.addEventListener('mousemove', move);
		slider.addEventListener('touchmove', move);

		slider.addEventListener('mouseleave', end);
		slider.addEventListener('mouseup', end);
		slider.addEventListener('touchend', end);
	})();

})