/* wz-main-sell start */
jQuery(document).ready(function ($) {
	console.log('wz-main-sell start');
	let sellTabsTabButton = $('#wz-sell-tabs .elementor-tab-desktop-title');
	$.each(sellTabsTabButton, function (index, value) {
		switch (index) {
			case 0:
				$(this).attr('data-wzcrm','amoCRM');
				break;
			case 1:
				$(this).attr('data-wzcrm','Bitrix');
				break;
			default:
				break;
		}
		console.log('wz-main-sell data-wzcrm: ' + $(this).attr('data-wzcrm'));
	});
	
	sellTabsTabButton.each(function () {
		let page_id = $('#page_id_sell .elementor-text-editor').html().trim();
		console.log('wz-main-sell page_id: ' + page_id);
		let crmTab = $(this).attr('data-wzcrm');
		let tab_title_aria_controls_selector = '#'
		+ $(this).attr('aria-controls');
		$(this).one('click', function () {
			console.log('wz-main-sell click id: ' + $(this).attr('id'));
			let jqxhr = $.ajax({
				method: "GET",
				url: myajax.url,
				data: { action: 'get_sell_single', post_id: page_id, crm: crmTab }
			})
				.done(function(msg) {
					$(tab_title_aria_controls_selector).html(msg);
					console.log( "wz-main-sell done" );
				})
				.fail(function( jqXHR, textStatus ) {
					console.log( "wz-main-sell error: " + textStatus  );
				})
				.always(function() {
					console.log( "wz-main-sell complete" );
				});
			jqxhr.always(function() {
				console.log( "wz-main-sell second complete" );
			});
		});
	});
	console.log('wz-main-sell end');
});
/* wz-main-sell end */