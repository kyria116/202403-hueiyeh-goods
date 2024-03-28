
    //@prepros-prepend plugin/jquery_min.js
	//@prepros-prepend plugin/swiper-bundle.min.js


$(function(){
	let ary = [] //每個li距離左邊的位置
	let ulWidth = $('.monthBox').width() //ul的寬
	let firstAry = 0 //第一個按鈕的起始位置
	let aryNum = 0
	let frequency = 0 //可以點擊按鈕的次數
	let num = 0 //第幾個li被active
	let month = '00'

	//月份是否重複
	$('.topMenu li').each(function(){
		if($(this).find('a').attr('data-month') == month ){
			$(this).addClass('repeat')
		}else{
			month = $(this).find('a').attr('data-month')
		}
	})

	// 點擊月份後顯示active月份+content
	$('.topMenu li a').on('click', function(){
		num = $(this).parent().index()
		showMonth(num)
		if(num > frequency){
			aryNum = frequency
		}
	})

	// 點擊月份至左的距離
	$('.itemX').each(function(e){
		if(e == 0){
			firstAry = $(this).offset().left
		}
		if(ulWidth < $(this).offset().left - firstAry){
			frequency++
		}
		ary.push($(this).offset().left - firstAry)
	})

	function showMonth(items){
		num = items
		$('.topMenu li').removeClass('active')
		$('.topMenu li').eq(items).addClass('active')
		$('.content li').removeClass('active')
		$('.content li').eq(items).addClass('active')
		$('.showMonth').text($('.topMenu li').eq(items).find('a').attr('data-month'))
		$('.itemsX').stop(true).animate({
			scrollLeft: ary[items]
		}, 400)
		if(items != 0){
			$('.leftBtn').removeClass('noPage')
		}else{
			$('.leftBtn').addClass('noPage')
		}
		if(items >= frequency){
			$('.rightBtn').addClass('noPage')
		}else{
			$('.rightBtn').removeClass('noPage')
		}
	}

	//點擊月份按鈕
	$('.rightBtn').on('click', function () {
		if(aryNum < frequency){
			$('.leftBtn').removeClass('noPage')
			$(this).removeClass('noPage')
			aryNum++ 
		}else{
			$(this).addClass('noPage')
		}
		showMonth(aryNum)
	});
	$('.leftBtn').on('click', function () {
		if(aryNum > 0){
			$('.rightBtn').removeClass('noPage')
			$(this).removeClass('noPage')
			aryNum-- 
		}else{
			$(this).addClass('noPage')
		}
		showMonth(aryNum)
	});


	//month拖曳
	let isDown = false;
	let startX;
	let scrollLeft;
	const sliderX = document.querySelector('.itemsX');
	const endx = () => {
		isDown = false;
		sliderX.classList.remove('active');
		for(let i=0; i<ary.length ; i++){
			if(sliderX.scrollLeft > ary[i] + 50 && sliderX.scrollLeft < ary[i+1]){
				num = i > frequency ? frequency : i+1
				showMonth(num)
			}else if(sliderX.scrollLeft <= ary[i] + 50 && sliderX.scrollLeft > ary[i]){
				num = i > frequency ? frequency : i
				showMonth(num)
			}else if(sliderX.scrollLeft < 50){
				num = 0
				showMonth(num)
			}
		}
	}
	const startx = (e) => {
		isDown = true;
		sliderX.classList.add('active');
		startX = e.pageX || e.touches[0].pageX - sliderX.offsetLeft;
		scrollLeft = sliderX.scrollLeft;	
	}
	const movex = (e) => {
		if(!isDown) return;
		e.preventDefault();
		const x = e.pageX || e.touches[0].pageX - sliderX.offsetLeft;
		const distX = (x - startX);
		sliderX.scrollLeft = scrollLeft - distX;
	}
	sliderX.addEventListener('mousedown', startx);
	sliderX.addEventListener('touchstart', startx);
	sliderX.addEventListener('mousemove', movex);
	sliderX.addEventListener('touchmove', movex);
	sliderX.addEventListener('mouseleave', endx);
	sliderX.addEventListener('mouseup', endx);
	sliderX.addEventListener('touchend', endx);
	
	
	//years拖曳
	let startY;
	let scrollTop;
	const sliderY = document.querySelector('.itemsY');
	const endy = () => {
		isDown = false;
		sliderY.classList.remove('active');
	}
	const starty = (e) => {
		isDown = true;
		sliderY.classList.add('active');
		startY = e.pageY || e.touches[0].pageY - sliderY.offsetTop;
		scrollTop = sliderY.scrollTop;	
	}
	const movey = (e) => {
		if(!isDown) return;
		e.preventDefault();
		const y = e.pageY || e.touches[0].pageY - sliderY.offsetTop;
		const distY = (y - startY);
		sliderY.scrollTop = scrollTop - distY;
	}

	let aryYears = []
	let aryTop = []
	let firstTop = 0
	$('.itemY').each(function(e){
		aryYears.push($(this).find('a').text())
	})
	function itemArray(){
		aryTop = []
		$('.itemY').each(function(e){
			if(e == 0){
				firstTop = $(this).offset().top
			}
			aryTop.push($(this).offset().top - firstTop)
		})
	}
	if(aryYears.length > 6){
		for(let i=0; i<aryYears.length; i++){
			$(`<li class="itemY"><a href="javascript:;">${aryYears[i]}</a></li>`).appendTo('.itemsY')
		}
		itemArray()
		sliderY.addEventListener('mousedown', starty);
		sliderY.addEventListener('touchstart', starty);
		sliderY.addEventListener('mousemove', movey);
		sliderY.addEventListener('touchmove', movey);
		sliderY.addEventListener('mouseleave', endy);
		sliderY.addEventListener('mouseup', endy);
		sliderY.addEventListener('touchend', endy);
	}
	
	$('body').on('click', '.itemY', function(){
		$(this).addClass('active')
		$(this).siblings().removeClass('active')
		$('.itemsY').stop(true).animate({
			scrollTop: aryTop[$(this).index()]
		}, 400)
		for(let i=0; i<aryYears.length; i++){
			$(`<li class="itemY"><a href="javascript:;">${aryYears[i]}</a></li>`).appendTo('.itemsY')
		}
		itemArray()
	})
	
})