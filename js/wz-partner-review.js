jQuery(document).ready(function ($) {
	console.log('wz-partner-review start');
	function getCookie(name) {
		let matches = document.cookie.match(
		  new RegExp(
			"(?:^|; )" +
			  name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
			  "=([^;]*)"
		  )
		);
		return matches ? decodeURIComponent(matches[1]) : undefined;
	}
	const pics = {
	  picListRU: [
		"/wp-content/uploads/2021/12/review-card-1.png",
		"/wp-content/uploads/2021/12/review-card.png",
		/*"/wp-content/uploads/2021/12/bambit-review-long.png",*/
	  ],
	  picListRUmobile: [
		"/wp-content/uploads/2021/12/review-card-mob-1.png",
		"/wp-content/uploads/2021/12/review-card-mob.png",
	  ],
	  picListEN: [
		"/wp-content/uploads/2021/12/11_382968.png",
		"/wp-content/uploads/2021/12/22_382968.png",
	  ],
	  picListENmobile: [
		"/wp-content/uploads/2021/12/1_mobilka-1.png",
		"/wp-content/uploads/2021/12/2_mobilka-1.png",
	  ],
	  picListES: [
		"/wp-content/uploads/2021/12/11_382968.png",
		"/wp-content/uploads/2021/12/22_382968.png",
	  ],
	  picListESmobile: [
		"/wp-content/uploads/2021/12/1_mobilka-1.png",
		"/wp-content/uploads/2021/12/2_mobilka-1.png",
	  ],
	  picListPT: [
		"/wp-content/uploads/2021/12/11_382968.png",
		"/wp-content/uploads/2021/12/22_382968.png",
	  ],
	  picListPTmobile: [
		"/wp-content/uploads/2021/12/1_mobilka-1.png",
		"/wp-content/uploads/2021/12/2_mobilka-1.png",
	  ],
	};
	switch (getCookie('pll_language')) {
		case 'ru':
			if ($(window).width() > 767) {
				$.each(pics.picListRU, function(index, value) {
					$('.slider-box').append(`<div class="slider-card"><img src="${value}"/></div>`);
				});
				if (pics.picListRU.length > 2) {
					$('.slider-wrapper').css({'height':'1024px','overflow-y':'scroll'});
					$('.slider-card').css({'width':'1168px','height':'366px','margin-left':'10px'});
					$('.slider-card:first-child').css({'margin-top':'10px'});
					$('.slider-card:last-child').css({'margin-bottom':'10px'});
				}
			}else{
				$.each(pics.picListRUmobile, function(index, value) {
					if (index == 0) {
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot slider-dot--active" data-id="${index}"></span>`);
					}else{
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot" data-id="${index}"></span>`);
					}
				}); 
			}
			break;
		case 'pt':
			if ($(window).width() > 767) {
				$.each(pics.picListPT, function(index, value) {
					$('.slider-box').append(`<div class="slider-card"><img src="${value}"/></div>`);
				});
				if (pics.picListPT.length > 2) {
					$('.slider-wrapper').css({'height':'1024px','overflow-y':'scroll'});
					$('.slider-card').css({'width':'1168px','height':'366px','margin-left':'10px'});
					$('.slider-card:first-child').css({'margin-top':'10px'});
					$('.slider-card:last-child').css({'margin-bottom':'10px'});
				}
			}else{
				$.each(pics.picListPTmobile, function(index, value) {
					if (index == 0) {
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot slider-dot--active" data-id="${index}"></span>`);
					}else{
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot" data-id="${index}"></span>`);
					}
				}); 
			}
			break;
		case 'es':
			if ($(window).width() > 767) {
				$.each(pics.picListES, function(index, value) {
					$('.slider-box').append(`<div class="slider-card"><img src="${value}"/></div>`);
				});
				if (pics.picListES.length > 2) {
					$('.slider-wrapper').css({'height':'1024px','overflow-y':'scroll'});
					$('.slider-card').css({'width':'1168px','height':'366px','margin-left':'10px'});
					$('.slider-card:first-child').css({'margin-top':'10px'});
					$('.slider-card:last-child').css({'margin-bottom':'10px'});
				}
			}else{
				$.each(pics.picListESmobile, function(index, value) {
				   if (index == 0) {
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot slider-dot--active" data-id="${index}"></span>`);
					}else{
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot" data-id="${index}"></span>`);
					}
				}); 
			}
			break;
		case 'en':
			if ($(window).width() > 767) {
				$.each(pics.picListEN, function(index, value) {
					$('.slider-box').append(`<div class="slider-card"><img src="${value}"/></div>`);
				});
				if (pics.picListEN.length > 2) {
					$('.slider-wrapper').css({'height':'1024px','overflow-y':'scroll'});
					$('.slider-card').css({'width':'1168px','height':'366px','margin-left':'10px'});
					$('.slider-card:first-child').css({'margin-top':'10px'});
					$('.slider-card:last-child').css({'margin-bottom':'10px'});
				}
			}else{
				$.each(pics.picListENmobile, function(index, value) {
					if (index == 0) {
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot slider-dot--active" data-id="${index}"></span>`);
					}else{
						$('.slider-box').append(`<div class="slider-card" data-id="${index}"><img src="${value}"/></div>`);
						$('.slider-dots').append(`<span class="slider-dot" data-id="${index}"></span>`);
					}
				}); 
			}
			break;
		default:
			break;
	}
	
	$('.slider-arrow-right').click(function () {
		if ($('.slider-box').css('left') != `${($('.slider-card').size()-1) * -960}px`) {
			$('.slider-box').animate({'left':'-=960px'}, 500);
		}
		
	});
	
	$('.slider-arrow-left').click(function () {
		if ($('.slider-box').css('left') != '0px') {
			$('.slider-box').animate({'left':'+=960px'}, 500);
		}
	});
	
	$('.slider-dot').click(function () {
		let currentDotIndex = +$('.slider-dot--active').attr('data-id');
		let clickedDotIndex = +$(this).attr('data-id');
		if ((currentDotIndex - clickedDotIndex) < 0) {
			$('.slider-box').animate({'left':`${clickedDotIndex * -360}px`}, 500);
		}else{
			$('.slider-box').animate({'left':`${clickedDotIndex * -360}px`}, 500);
		}
		$('.slider-dot--active').removeClass('slider-dot--active');
		$(this).addClass('slider-dot--active');
	});
	
	$('.slider-card').on('touchstart', function(event) {
		let currentSlide = $(this),
		firstTouchPos = event.touches[0].clientX,
		currentTouchPos = 0,
		currentSlideId = +$(this).attr('data-id');
		
		currentSlide.on('touchmove', function (event) {
			currentTouchPos = event.touches[0].clientX;
		});
		console.log($('.slider-card').size());
		currentSlide.on('touchend', function (event) {
			if ((firstTouchPos - currentTouchPos) > 0) {
				if (Math.abs(firstTouchPos - currentTouchPos) > 40) {
					if ($('.slider-box').css('left') != `${($('.slider-card').size()-1) * -360}px`) {
						$('.slider-box').animate({'left':`${(currentSlideId + 1) * -360}px`}, 500);
						$('.slider-dot--active').removeClass('slider-dot--active');
						$('.slider-dot[data-id="'+ (currentSlideId + 1) +'"]').addClass('slider-dot--active');
					}
				}
			}else{
				if (Math.abs(firstTouchPos - currentTouchPos) > 40) {
					if ($('.slider-box').css('left') != '0px') {
						$('.slider-box').animate({'left':`${(currentSlideId - 1) * -360}px`}, 500);
						$('.slider-dot--active').removeClass('slider-dot--active');
						$('.slider-dot[data-id="'+ (currentSlideId - 1) +'"]').addClass('slider-dot--active');
					}
				}
			}
			currentSlide.off('touchend');
			currentSlide.off('touchmove');
		});
	});
	console.log('wz-partner-review end');
});