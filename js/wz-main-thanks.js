/* wz-main-thanks start */
jQuery(document).ready(function ($) {
	console.log('wz-main-thanks start');
	//if ($(window).width() < 1200) {
	//	console.log('wz-main-thanks $(window).width() < 1200');
	//}
	let thanksTabsTabButton;
	//if (!window.matchMedia("(max-width: 1199px)").matches) {
	//	console.log('wz-main-thanks window.matchMedia("(max-width: 1199px)").matches');
	//	thanksTabsTabButton = $('#wz-thanks-tabs .elementor-tab-desktop-title');
	//} else {
		/* the viewport is less than 400 pixels wide */
	//}
	//if ($(window).width() > 1199) {
	//	console.log('wz-main-thanks $(window).width() > 1199');
	//	thanksTabsTabButton = $('#wz-thanks-tabs .elementor-tab-desktop-title');
	//} else {
		console.log('wz-main-thanks not $(window).width() > 1199');
		//console.log('wz-main-thanks not window.matchMedia("(max-width: 1199px)").matches');
		thanksTabsTabButton = $('#wz-thanks-tabs .elementor-tab-mobile-title');
		console.log('wz-main-thanks thanksTabsTabButton: ' + thanksTabsTabButton);
		let delay = 10;
		setTimeout(function() { 
			$('#wz-thanks-tabs .elementor-tab-title').removeClass('elementor-active');
			$('#wz-thanks-tabs .elementor-tab-content').css('display', 'none').removeClass('elementor-active');
			console.log('wz-main-thanks setTimeout');
		}, delay);
		$('#wz-thanks-tabs .elementor-tab-title').off();
		console.log('wz-main-thanks #wz-thanks-tabs .elementor-tab-title length:' + $('#wz-thanks-tabs .elementor-tab-title').length);
		$('#wz-thanks-tabs .elementor-tab-title').on('click touchend', function (e) {
			e.preventDefault();
			console.log('wz-main-thanks click touchend class id: ' + $(this).attr('id'));
			if ($(this).hasClass('elementor-active')) {
				$(this).removeClass('elementor-active');
				$(`#wz-thanks-tabs .elementor-tab-content[data-tab="${$(this).attr('data-tab')}"]`).css('display','none').removeClass('elementor-active'); 
			}else{
				$(this).addClass('elementor-active');
				$(`#wz-thanks-tabs .elementor-tab-content[data-tab="${$(this).attr('data-tab')}"]`).css('display','block').addClass('elementor-active');
			}
		});
	//}
	
	$.each(thanksTabsTabButton, function (index, value) {
		switch (index) {
			case 0:
				$(this).attr('data-wzthanks','first');
				break;
			case 1:
				$(this).attr('data-wzthanks','second');
				break;
			case 2:
				$(this).attr('data-wzthanks','third');
				break;
			case 3:
				$(this).attr('data-wzthanks','fourth');
				break;
			case 4:
				$(this).attr('data-wzthanks','fifth');
				break;
			case 5:
				$(this).attr('data-wzthanks','sixth');
				break;
			default:
				break;
		}
		console.log('wz-main-thanks index: ' + index);
	});
	
	thanksTabsTabButton.each(function () {
		let page_id = $('#page_id_thanks .elementor-text-editor').html().trim();
		console.log('wz-main-thanks page_id: ' + page_id);
		let thanksTab = $(this).attr('data-wzthanks');
		console.log('wz-main-thanks thanksTab: ' + thanksTab);
		let tab_title_aria_controls_selector = '#'
		+ $(this).attr('aria-controls');
		console.log('wz-main-thanks tab_title_aria_controls_selector: ' + tab_title_aria_controls_selector);
		$(this).one('click touchend', function () {
		//$(this).one('click touchend', function (e) {
			//e.preventDefault();
			console.log('wz-main-thanks click touchend ajax id: ' + $(this).attr('id'));
			console.log('wz-main-thanks $.ajax start');
			console.log('wz-main-thanks myajax.url: ' + myajax.url);
			let jqxhr = $.ajax({
				method: "GET",
				url: myajax.url,
				data: { action: 'get_thanks_single', post_id: page_id, thanks: thanksTab }
			})
				.done(function(msg) {
					$(tab_title_aria_controls_selector).html(msg);
					console.log('wz-main-thanks $.ajax done');
				})
				.fail(function( jqXHR, textStatus ) {
					console.log( "wz-main-thanks error: " + textStatus  );
				})
				.always(function() {
					console.log( "wz-main-thanks complete" );
				});
			jqxhr.always(function() {
				console.log( "wz-main-thanks second complete" );
			});
			console.log('wz-main-thanks $.ajax end');
		});
	});
	console.log('wz-main-thanks end');
});
/* wz-main-thanks end */