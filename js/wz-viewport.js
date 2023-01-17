/* in-viewport start */
console.log('in-viewport start');
jQuery(document).ready(function($) {
	let wz_sections_all = 
		'#wz-ajax-main-companies, ' +
		'#wz-ajax-main-problems, ' +
		'#wz-ajax-main-problems-en, ' +
		'#wz-ajax-millionmakers-problems-en, ' +
		'#wz-ajax-main-review, ' +
		'#wz-ajax-main-integration, ' +
		'#wz-ajax-main-integration-en, ' +
		'#wz-ajax-millionmakers-integration-en, ' +
		'#wz-ajax-main-communicate, ' +
		'#wz-ajax-main-communicate-en, ' +
		'#wz-ajax-main-cases, ' +
		'#wz-ajax-main-fastanswer, ' +
		'#wz-ajax-footer, ' +
		'#wz-ajax-main-sell .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-main-sell-en .elementor-tab-content[data-tab="1"],' +
		'#wz-ajax-main-thanks .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-main-thanks-en .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-tariff .elementor-tab-content[data-tab="1"], ' +
		'.bun-wz-price #wz-ajax-tariff .elementor-tab-content[data-tab="1"], ' +
		'#wz-automatization-amo-tabs .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-benefit, ' +
		'#wz-ajax-business, ' +
		'#wz-ajax-integration-single, ' +
		'#wz-ajax-connect, ' +
		'#wz-ajax-why, ' +
		'#wz-ajax-offer, ' +
		'#wz-ajax-lost, ' +
		'#wz-ajax-graph, ' +
		'#wz-ajax-review-background, ' +
		'#wz-ajax-try, ' +
		'#wz-ajax-steps, ' +
		'#wz-ajax-authomatization, ' +
		'#wz-ajax-income, ' +
		'#wz-ajax-partners-form, ' +
		'#wz-ajax-reasons, ' +
		'#wz-ajax-partners-steps, ' +
		'#wz-ajax-partners-reviews .elementor-tab-content[data-tab="1"]';
	let wz_sections_avaible = [];
	$(wz_sections_all).each(function(){
		let section_id = $(this).attr('id');
		let wz_prefix = '';
		if (section_id.indexOf('tab') != -1) {
			let wz_parent = $(this).closest('.elementor-widget-tabs');
			wz_prefix = '#' + wz_parent.attr('id') + ' ';
		}
		wz_sections_avaible.push(wz_prefix + '#' + $(this).attr('id'));
	});
	console.log('in-viewport wz_sections_avaible: ' + wz_sections_avaible.join(', '));
	let wz_sections = wz_sections_avaible.map((section, section_index) => {
		let wz_prefix = '';
		let wz_suffix = ':not(.wz-visible)';
		if (section.indexOf('tab') != -1) {
			let section_selector = section.split(' ');
			section_selector[0] = section_selector[0] + wz_suffix;
			section = section_selector.join(' ');
			wz_suffix = '';
		}
		return wz_prefix + section + wz_suffix;
	}).join(', ');
	console.log('in-viewport wz_sections: ' + wz_sections);
	/*let wz_sections = 
		'#wz-ajax-main-companies:not(.wz-visible), ' +
		'#wz-ajax-main-problems:not(.wz-visible), ' +
		'#wz-ajax-main-review:not(.wz-visible), ' +
		'#wz-ajax-main-integration:not(.wz-visible), ' +
		'#wz-ajax-main-communicate:not(.wz-visible), ' +
		'#wz-ajax-main-cases:not(.wz-visible), ' +
		'#wz-ajax-main-fastanswer:not(.wz-visible), ' +
		'#wz-ajax-footer:not(.wz-visible), ' +
		'#wz-ajax-main-sell:not(.wz-visible) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-main-thanks:not(.wz-visible) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-tariff:not(.wz-visible) .elementor-tab-content[data-tab="1"], ' +
		'.bun-wz-price #wz-ajax-tariff .elementor-tab-content[data-tab="1"], ' +
		'#wz-automatization-amo-tabs .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-benefit:not(.wz-visible), ' +
		'#wz-ajax-business:not(.wz-visible), ' +
		'#wz-ajax-integration-single:not(.wz-visible), ' +
		'#wz-ajax-connect:not(.wz-visible), ' +
		'#wz-ajax-why:not(.wz-visible), ' +
		'#wz-ajax-offer:not(.wz-visible), ' +
		'#wz-ajax-lost:not(.wz-visible), ' +
		'#wz-ajax-graph:not(.wz-visible), ' +
		'#wz-ajax-review-background:not(.wz-visible), ' +
		'#wz-ajax-try:not(.wz-visible), ' +
		'#wz-ajax-steps:not(.wz-visible), ' +
		'#wz-ajax-authomatization:not(.wz-visible), ' +
		'#wz-ajax-income:not(.wz-visible), ' +
		'#wz-ajax-partners-form:not(.wz-visible), ' +
		'#wz-ajax-reasons:not(.wz-visible), ' +
		'#wz-ajax-partners-steps:not(.wz-visible), ' +
		'#wz-ajax-partners-reviews:not(.wz-visible) .elementor-tab-content[data-tab="1"]';*/
	let wz_sections_static = wz_sections_avaible.map((section, section_index) => {
		let wz_prefix = '';
		let wz_suffix = ':not(.wz-visible):in-viewport';
		if (section.indexOf('tab') != -1) {
			let section_selector = section.split(' ');
			section_selector[0] = section_selector[0] + wz_suffix;
			section = section_selector.join(' ');
			wz_suffix = '';
		}
		return wz_prefix + section + wz_suffix;
	}).join(', ');
	console.log('in-viewport wz_sections_static: ' + wz_sections_static);
	/*let wz_sections_static = 
		'#wz-ajax-main-companies:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-main-problems:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-main-review:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-main-integration:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-main-communicate:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-main-cases:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-main-fastanswer:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-footer:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-main-sell:not(.wz-visible):in-viewport .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-main-thanks:not(.wz-visible):in-viewport .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-tariff:not(.wz-visible):in-viewport .elementor-tab-content[data-tab="1"], ' +
		'.bun-wz-price #wz-ajax-tariff .elementor-tab-content[data-tab="1"], ' +
		'#wz-automatization-amo-tabs:not(.wz-visible):in-viewport .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-benefit:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-business:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-integration-single:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-connect:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-why:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-offer:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-lost:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-graph:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-review-background:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-try:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-steps:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-authomatization:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-income:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-partners-form:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-reasons:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-partners-steps:not(.wz-visible):in-viewport, ' +
		'#wz-ajax-partners-reviews:not(.wz-visible):in-viewport .elementor-tab-content[data-tab="1"]';*/
	let wz_sections_scroll_down = wz_sections_avaible.map((section, section_index) => {
		//console.log('in-viewport section_index: ' + section_index);
		let wz_tolerance = '1080';
		if (section_index == 0) {
			wz_tolerance = '800';
		}
		let wz_prefix = '';
		let wz_suffix = ':not(.wz-visible):in-viewport(' + wz_tolerance + ')';
		if (section.indexOf('tab') != -1) {
			let section_selector = section.split(' ');
			section_selector[0] = section_selector[0] + wz_suffix;
			section = section_selector.join(' ');
			wz_suffix = '';
		}
		return wz_prefix + section + wz_suffix;
	}).join(', ');
	console.log('in-viewport wz_sections_scroll_down: ' + wz_sections_scroll_down);
	/*let wz_sections_scroll_down = 
		'#wz-ajax-main-companies:not(.wz-visible):in-viewport(800), ' +
		'#wz-ajax-main-problems:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-main-review:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-main-integration:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-main-communicate:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-main-cases:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-main-fastanswer:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-footer, ' +
		'#wz-ajax-main-sell:not(.wz-visible):in-viewport(1080) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-main-thanks:not(.wz-visible):in-viewport(1080) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-tariff:not(.wz-visible):in-viewport(1080) .elementor-tab-content[data-tab="1"], ' +
		'#wz-automatization-amo-tabs:not(.wz-visible):in-viewport(1080) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-benefit:not(.wz-visible):in-viewport(800), ' +
		'#wz-ajax-business:not(.wz-visible):in-viewport(800), ' +
		'#wz-ajax-integration-single:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-connect:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-why:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-offer:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-lost:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-graph:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-review-background:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-try:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-steps:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-authomatization:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-income:not(.wz-visible):in-viewport(600), ' +
		'#wz-ajax-partners-form:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-reasons:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-partners-steps:not(.wz-visible):in-viewport(1080), ' +
		'#wz-ajax-partners-reviews:not(.wz-visible):in-viewport(1080) .elementor-tab-content[data-tab="1"]';*/
	let wz_sections_avaible_length = wz_sections_avaible.length;
	console.log('in-viewport wz_sections_avaible_length: ' + wz_sections_avaible_length);
	let wz_sections_scroll_up = wz_sections_avaible.map((section, section_index) => {
		let wz_tolerance = '-1080';
		if (section_index == (wz_sections_avaible_length - 2)) {
			wz_tolerance = '-800';
		}
		if (section_index == (wz_sections_avaible_length - 1)) {
			wz_tolerance = '0';
		}
		let wz_prefix = '';
		let wz_suffix = ':not(.wz-visible):in-viewport(' + wz_tolerance + ')';
		if (section.indexOf('tab') != -1) {
			let section_selector = section.split(' ');
			section_selector[0] = section_selector[0] + wz_suffix;
			section = section_selector.join(' ');
			wz_suffix = '';
		}
		return wz_prefix + section + wz_suffix;
	}).join(', ');
	console.log('in-viewport wz_sections_scroll_up: ' + wz_sections_scroll_up);
	/*let wz_sections_scroll_up = 
		'#wz-ajax-main-companies:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-main-problems:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-main-review:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-main-integration:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-main-communicate:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-main-cases:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-main-fastanswer:not(.wz-visible):in-viewport(-800), ' +
		'#wz-ajax-main-sell:not(.wz-visible):in-viewport(-1080) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-main-thanks:not(.wz-visible):in-viewport(-1080) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-tariff:not(.wz-visible):in-viewport(-800) .elementor-tab-content[data-tab="1"], '+
		'#wz-automatization-amo-tabs:not(.wz-visible):in-viewport(-1080) .elementor-tab-content[data-tab="1"], ' +
		'#wz-ajax-benefit:not(.wz-visible):in-viewport(-800), ' +
		'#wz-ajax-business:not(.wz-visible):in-viewport(-800), ' +
		'#wz-ajax-integration-single:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-connect:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-why:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-offer:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-lost:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-graph:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-review-background:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-try:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-steps:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-authomatization:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-income:not(.wz-visible):in-viewport(-600), ' +
		'#wz-ajax-partners-form:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-reasons:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-partners-steps:not(.wz-visible):in-viewport(-1080), ' +
		'#wz-ajax-partners-reviews:not(.wz-visible):in-viewport(-1080) .elementor-tab-content[data-tab="1"]';*/
	let wz_sections_click_all = 
		'#wz-ajax-main-sell .elementor-tab-title[data-tab!="1"], ' +
		'#wz-ajax-main-sell-en .elementor-tab-title[data-tab!="1"], ' +
		'#wz-ajax-main-thanks .elementor-tab-title[data-tab!="1"], ' +
		'#wz-ajax-main-thanks-en .elementor-tab-title[data-tab!="1"], ' +
		'#wz-ajax-tariff .elementor-tab-title[data-tab!="1"], ' +
		'#wz-automatization-amo-tabs .elementor-tab-title[data-tab!="1"], ' +
		//'#wz-get-consultation-modal, ' +
		'#wz-ajax-partners-reviews .elementor-tab-title[data-tab!="1"], ' +
		'.elementor-item-anchor[href="#plan"]';
	let wz_sections_click_avaible = [];
	$(wz_sections_click_all).each(function(){
		console.log('in-viewport wz_sections_click each start');
		console.log('in-viewport wz_sections_click each $(this).attr(id): ' + $(this).attr('id'));
		if (typeof $(this).attr('id') !== 'undefined') {
			wz_sections_click_avaible.push('#' + $(this).attr('id'));
		} else {
			let parent = $(this).closest('.elementor-widget-tabs');
			console.log('in-viewport wz_sections_click parent.attr(id): ' + parent.attr('id'));
			if (typeof parent.attr('id') !== 'undefined') {
				wz_sections_click_avaible.push('#' + parent.attr('id')
					+ ' .elementor-tabs .elementor-tab-title[data-tab='
					+ $(this).data('tab') + ']');
			} else {
				console.log('in-viewport wz_sections_click each $(this).attr(href): ' + $(this).attr('href'));
				if (typeof $(this).attr('href') !== 'undefined') {
					let parent = $(this).closest('.elementor-nav-menu');
					console.log('in-viewport wz_sections_click parent.attr(id): ' + parent.attr('id'));
					if (typeof parent.attr('id') !== 'undefined') {
						wz_sections_click_avaible.push('#' + parent.attr('id')
							+ ' a[href="' + $(this).attr('href') + '"]');
					}
				}
			}
		}
		console.log('in-viewport wz_sections_click each end');
	});
	wz_sections_click = wz_sections_click_avaible.join(', ');
	console.log('in-viewport wz_sections_click: ' + wz_sections_click);
	console.log('in-viewport static body request-static: ' + $('body').data('request-static'));
	if (!$('body').data('request-static')) {
		$('body').data('request-static', true);
		console.log('in-viewport static body request-static: ' + $('body').data('request-static'));
		console.log('in-viewport static body home:' + $('body').hasClass('home'));
		console.log('in-viewport static html attr lang:' + $('html').attr('lang'));
		if (
			$('body').hasClass('home')
			&& $('html').attr('lang') == 'ru-RU'
		) {
			ym_scripts = {
				"simpleab": "/wp-content/themes/astra-child/js/simpleab.js",
				"wz-ym-64950046-simpleab": "/wp-content/themes/astra-child/js/wp-simpleab-ym.js"
			};
		} else {
			ym_scripts = {
				"wz-ym-64950046": "/wp-content/themes/astra-child/js/wz-ym-64950046.js"
			};
		}
		ym_css = {};
		wzGetScriptAndCSS(ym_scripts, ym_css);
		$(document).one('wzEventSectionsStatic', function(event) {
			$(wz_sections_static).each( function () {
				console.log('in-viewport static each id: ' + $(this).attr('id') + ' start');
				if ($(this).data('request') !== true) {
					$(this).data('request', true);
					console.log('in-viewport static each request: ' + $(this).data('request'));
					wzGetSection(wzSetTab($(this)));
				}
				console.log('in-viewport static each id: ' + $(this).attr('id') + ' end');
			});
		});
	}
	console.log('in-viewport click start');
	$(wz_sections_click).each(function() {
		let wz_click_element = $(this);
		console.log('in-viewport click each class: ' + wz_click_element.attr('class') + ' start');
		//console.log('in-viewport click each href: ' + wz_click_element.attr('href'));
		//console.log('in-viewport click each id: ' + wz_click_element.attr('id'));
		//console.log('in-viewport click each aria-controls: ' + wz_click_element.attr('aria-controls'));
		wz_click_element.one('click', function() {
			console.log('in-viewport click each one href: ' + wz_click_element.attr('href') + ' click');
			//console.log('in-viewport click each one id: ' + wz_click_element.attr('id') + ' click');
			if (typeof wz_click_element.attr('href') !== "undefined") {
				let wz_anchors = {
					'#plan' : 'elementor-tab-title-2911'
				};
				if (wz_anchors.hasOwnProperty(wz_click_element.attr('href'))) {
					let wz_id = wz_anchors[wz_click_element.attr('href')];
					console.log('in-viewport click each one wz_id: ' + wz_id);
					wz_click_element = $('#' + wz_id);
				}
				//console.log('in-viewport click each one id: ' + wz_click_element.attr('id'));
				console.log('in-viewport click each one class: ' + wz_click_element.attr('class'));
			}
			if (!wz_click_element.data('request')) {
				wz_click_element.data('request', true);
				//console.log('in-viewport click each one in-viewport id: ' + wz_click_element.attr('id'));
				console.log('in-viewport click each in-viewport class: ' + wz_click_element.attr('class'));
				wzGetSection(wzSetTab(wz_click_element));
			}
		});
		//console.log('in-viewport click each id ' + wz_click_element.attr('id') + ' end');
		console.log('in-viewport click each class: ' + wz_click_element.attr('class') + ' end');
	});
	console.log('in-viewport click end');
	console.log('in-viewport scroll start');
	let position = $(window).scrollTop(); 
	//console.log('in-viewport scroll direction position: ' + position);
	let direction = 'none';
	//$(window).scroll(function() {
	$(window).one('scroll', function() {
		console.log('in-viewport scroll body request-scroll: ' + $('body').data('request-scroll'));
		if ($('body').data('request-scroll') !== true) {
			$('body').data('request-scroll', true);
			console.log('in-viewport scroll body request-scroll: ' + $('body').data('request-scroll'));
			let ym_scripts = {};
			console.log('in-viewport scroll html lang:' + $('html').attr('lang'));
			if ($('html').attr('lang') == 'ru-RU') {
				ym_scripts["wz-widget-profeat"] = "/wp-content/themes/astra-child/js/wz-widget-profeat.js";
			}
			ym_css = {};
			wzGetScriptAndCSS(ym_scripts, ym_css);
		}
	});
	let wz_position = $(window).scrollTop(); 
	let wz_direction_down = true;
	$(window).on('scroll', function() {
		let wz_sections_scroll = '';
		let wz_scroll = $(window).scrollTop();
		if(wz_scroll > wz_position) {
			wz_direction_down = true;
			wz_sections_scroll = wz_sections_scroll_down;
		} else {
			wz_direction_down = false;
			wz_sections_scroll = wz_sections_scroll_up;
		}
		//console.log('in-viewport on scroll wz_sections_scroll: ' + wz_sections_scroll);
		wz_position = wz_scroll;
		$(wz_sections_scroll).each(function() {
			console.log('in-viewport on scroll each wz_direction_down: ' + wz_direction_down);
			$(this).addClass('wz-visible');
			var wzInViewportEvent = jQuery.Event('wzInViewport');
			wzInViewportEvent.wz_object = $(this);
			$(this).trigger(wzInViewportEvent);
			console.log('in-viewport on scroll each id: ' + $(this).attr('id') + ' wzInViewport trigger');
		});
	});
	//$(wz_sections_scroll_down + ', ' + wz_sections_scroll_up).one('in-viewport', function () {
	//$(wz_sections_scroll_down + ', ' + wz_sections_scroll_up).change( function () {
	$(wz_sections).each(function() {
		$(this).one('wzInViewport', {wz_object: $(this)}, function () {
			console.log('in-viewport wzInViewport one id: ' + $(this).attr('id') + ' start');
			if ($(this).data('request') !== true) {
				$(this).data('request', true);
				console.log('in-viewport wzInViewport one request: ' + $(this).data('request'));
				wzGetSection(wzSetTab($(this)));
			}
			console.log('in-viewport wzInViewport one id: ' + $(this).attr('id') + ' end');
		});
	});
	console.log('in-viewport scroll end');
	function wzSetTab(element) {
		let content_element = element;
		let action = 'get_section';
		let tab_id = element.data('tab');
		console.log('in-viewport wzSetTab tab_id: ' + tab_id);
		if (!isNaN(tab_id)) {
			let parent = element.closest('.elementor-widget-tabs');
			element.data('parent-id', parent.attr('id'));
			let post_id = parent.data('post-id');
			console.log('in-viewport wzSetTab post_id: ' + post_id);
			let content_element_selector = '#' + parent.attr('id') + ' .elementor-tab-content[data-tab=' + tab_id + ']';
			console.log('in-viewport wzSetTab content_element_selector: ' + content_element_selector);
			content_element = $(content_element_selector);
			content_element.data('parent-id', parent.attr('id'));
			content_element.data('post-id', post_id);
			element.data('post-id', post_id);
			if (parent.attr('id') == 'wz-ajax-main-sell') {
				action = 'get_sell_single';
			}
			if (parent.attr('id') == 'wz-ajax-main-sell-en') {
				action = 'get_sell_single_en';
			}
			if (parent.attr('id') == 'wz-ajax-main-thanks') {
				action = 'get_thanks_single';
			}
			if (parent.attr('id') == 'wz-ajax-main-thanks-en') {
				action = 'get_thanks_single';
			}
			if (parent.attr('id') == 'wz-ajax-tariff') {
				action = 'get_tariff_single';
			}
			if (parent.attr('id') == 'wz-automatization-amo-tabs') {
				action = 'get_automatization_amo_single';
			}
		}
		let content_element_container = content_element.data('container');
		console.log('in-viewport wzSetTab content_element_container: ' + content_element_container);
		if (typeof content_element_container !== "undefined") {
			content_element = $('#' + content_element_container);
			console.log('in-viewport wzSetTab content_element: ' + content_element);
		}
		content_element.data('action', action);
		console.log('in-viewport wzSetTab action: ' + action);
		return content_element;
	}
	function wzGetSection(element) {
		let action = element.data('action');
		console.log('in-viewport wzGetSection action: ' + action);
		let post_id = element.data('post-id');
		console.log('in-viewport wzGetSection post_id: ' + post_id);
		let element_id = element.attr('id');
		console.log('in-viewport wzGetSection element_id: ' + element_id);
		element.data('request', true);
		let url = myajax.url;
		//let url = myajax.url.replace('wazzup24.com', 'cache.wazzup24.com');
		let data = { action: action, post_id: post_id, section_name: element_id };
		let element_url = element.data('url');
		console.log('in-viewport wzGetSection element_url: ' + element_url);
		let ajax_permission = false;
		if (typeof element_url !== "undefined") {
			ajax_permission = true;
			url = element_url;
			data = {};
		}
		if (!isNaN(post_id)) {
			ajax_permission = true;
		}
		if (ajax_permission) {
			console.log('in-viewport wzGetSection url: ' + url);
			var jqxhr = $.ajax(
				{
					url: url,
					cache: true,
					method: 'GET',
					data: data
				}
			)
			.done(function(data) {
				console.log( 'in-viewport wzGetSection $.ajax done' );
				let container = '#' + element_id;
				if (isNaN(element.data('tab'))) {
					container += ' > .elementor-widget-container';
				}
				console.log( 'in-viewport wzGetSection $.ajax done container: ' + container );
				//$(container).html( data );
				$(container).fadeOut(400, function() {
					$(container).html(data).fadeIn(400);
				});
				/*$(container).find('img').each(function() {
					$(this).hide();
					$(this).one('load', function() {
						$(this).fadeIn(400);
					})
				});*/
				let time = 100;
				console.log( 'in-viewport wzGetSection $.ajax done element_id: ' + element_id );
				if (
					element_id == 'wz-ajax-main-review'
					|| element_id == 'elementor-tab-content-2732'
				) {
					wz_script = {
						"wz-review-plyr": "/wp-content/plugins/html5-audio-player/js/plyr.min.js?ver=2.1.6",
						"wz-review-public": "/wp-content/plugins/html5-audio-player/dist/public.js?ver=2.1.6"
					};
					wz_css = {
						"wz-review-player-style": "/wp-content/plugins/html5-audio-player/style/player-style.css?ver=2.1.6"
					};
					wzGetScriptAndCSS(wz_script, wz_css);
					time += 200;
				}
				/*if (element_id == 'wz-ajax-partners-form') {
					wz_script = {
						"grecaptcha":"https://www.google.com/recaptcha/api.js?render=6LeNczEaAAAAAIlxn1zMx839ebRszK4331nl3123&#038;ver=3.0",
						"contact-form-7-js-extra":"/wp-content/themes/astra-child/js/contact-form-7-js-extra.js?ver=5.5.6",
						"wpcf7-recaptcha-js-extra":"/wp-content/themes/astra-child/js/wpcf7-recaptcha-js-extra.js?ver=5.5.6",
						"contact-form-7-js":"/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.5.6",
						"wpcf7-recaptcha-js":"/wp-content/plugins/contact-form-7/modules/recaptcha/index.js?ver=5.5.6",
						"wz-wpcf7-init": "/wp-content/themes/astra-child/js/wz-wpcf7-init.js?ver=1.1"
					};
					wz_css = {
						"wz-wpcf7-styles": "/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.5.6",
						"contact-form-7-main-min-css":"/wp-content/themes/astra/assets/css/minified/compatibility/contact-form-7-main.min.css?ver=3.6.2"
					};
					wzGetScriptAndCSS(wz_script, wz_css);
					time += 200;
				}*/
				if (element_id == 'wz-ajax-review-background') {
					wz_script = {
						"wz-review-background": "/wp-content/themes/astra-child/js/wz-review-background.js"
					};
					wz_css = {};
					wzGetScriptAndCSS(wz_script, wz_css);
				}
				let parent_id = element.data('parent-id');
				console.log( 'in-viewport wzGetSection $.ajax done parent_id: ' + parent_id );
				if (parent_id == 'wz-ajax-tariff') {
					wz_tariff_tooltip(element);
				}
				//console.log('in-viewport wzGetSection $.ajax done time: ' + time);
			})
			.fail(function(jqxhr, textStatus) {
				console.log( 'in-viewport wzGetSection $.ajax fail: ' + textStatus );
			})
			.always(function() {
				//console.log( 'in-viewport wzGetSection $.ajax always' );
			});
		}
	}
	$.getCSS = function( url, media, callback ) {
		$( document.createElement('link') ).attr({
			href: url,
			media: media || 'screen',
			type: 'text/css',
			rel: 'stylesheet'
		}).appendTo('head');
		$( document.createElement('img') ).attr('src', url).on("error", callback);
	};
	
	function wzGetScriptAndCSS(wz_script, wz_css) {
		console.log('in-viewport wzGetScriptAndCSS start');
		function findNext(key, obj) {
			let keys = Object.keys(obj);
			//console.log('in-viewport wzGetScriptAndCSS findNext: ' +
			//	keys[(keys.indexOf(key) + 1) % keys.length]
			//);
			return keys[(keys.indexOf(key) + 1) % keys.length];
		}
		$.ajaxSetup({
			cache: true
		});
		wz_value_first = '';
		$.each( wz_script, function(wz_key_current, wz_value_current) {
			if (wz_value_first == '') {
				wz_value_first = wz_value_current;
				console.log('in-viewport wzGetScriptAndCSS each wz_value_first: ' + wz_value_first);
			}
			let wz_key_next = findNext(wz_key_current, wz_script);
			console.log('in-viewport wzGetScriptAndCSS each wz_key_next: ' + wz_key_next);
			let wz_value_next = wz_script[wz_key_next];
			console.log('in-viewport wzGetScriptAndCSS each wz_value_next: ' + wz_value_next);
			if (wz_value_next == wz_value_first) {
				wz_value_next = '';
			}
			//$( document ).on(
			$( document ).one(
				'wzEventScriptLoaded',
				//null,
				{
					wz_value_current: wz_value_current,
					wz_value_next: wz_value_next
				},
				//null,
				function(event) {
					console.log('in-viewport wzGetScriptAndCSS one event.data.wz_value_current: ' + event.data.wz_value_current + ' start');
					$.when( 
						$.getScript(event.data.wz_value_current)
						.done(function( script, textStatus ) {
							console.log('in-viewport wzGetScriptAndCSS when $.getScript: ' + event.data.wz_value_current
								+ ' done textStatus: ' + textStatus );
						})
						.fail(function( jqxhr, settings, exception ) {
							console.log('in-viewport wzGetScriptAndCSS when $.getScript: ' + event.data.wz_value_current + ' fail');
						})
					).then(function( data, textStatus, jqXHR ) {
						if (event.data.wz_value_next != '') {
							let wzEventScriptLoaded = jQuery.Event( 'wzEventScriptLoaded' );
							wzEventScriptLoaded.wz_value_current = event.data.wz_value_current;
							wzEventScriptLoaded.wz_value_next = event.data.wz_value_next;
							$(document).trigger(wzEventScriptLoaded);
							console.log('in-viewport wzGetScriptAndCSS then wzEventScriptLoaded: '
								+ wzEventScriptLoaded.wz_value_current + ' trigger');
						} else {
							$(document).trigger('wzEventSectionsStatic');
							console.log('in-viewport wzGetScriptAndCSS then wzEventSectionsStatic trigger');
						}
					});
					console.log('in-viewport wzGetScriptAndCSS one event.data.wz_value_current: '
						+ event.data.wz_value_current + ' end');
				}
			);
			if (wz_value_first == wz_value_current) {
				let wzEventScriptLoaded = jQuery.Event( 'wzEventScriptLoaded' );
				wzEventScriptLoaded.wz_value_current = wz_value_current;
				wzEventScriptLoaded.wz_value_next = wz_value_next;
				$(document).trigger(wzEventScriptLoaded);
				console.log('in-viewport wzGetScriptAndCSS each wzEventScriptLoaded: ' + wzEventScriptLoaded.wz_value_current + ' trigger first');
			}
		});
		
		$.each( wz_css, function( key, value ) {
			$.getCSS(value, 'all');
			console.log('in-viewport wzGetScriptAndCSS $.getCSS: ' + value + ' done');
		});
		console.log('in-viewport wzGetScriptAndCSS end');
	}
	
	/*function wzGetScriptAndCSS(wz_script, wz_css) {
		console.log('in-viewport wzGetScriptAndCSS start');
		let time = 0;
		$.each( wz_script, function( key, value ) {
			setTimeout( function(){
				$.ajaxSetup({
				  cache: true
				});
				$.getScript(value)
				.done(function( script, textStatus ) {
					console.log('in-viewport wzGetScriptAndCSS $.getScript: ' + value + ' done textStatus: ' + textStatus );
				})
				.fail(function( jqxhr, settings, exception ) {
					console.log('in-viewport wzGetScriptAndCSS $.getScript: ' + value + ' fail');
				});
			}, time);
			time += 200;
		});
		$.each( wz_css, function( key, value ) {
			$.getCSS(value, 'all');
			console.log('in-viewport wzGetScriptAndCSS $.getCSS: ' + value + ' done');
		});
		console.log('in-viewport wzGetScriptAndCSS end');
	}*/
	function wz_tariff_tooltip(element){
		/*console.log('wz-tariff-tooltip start');
		$('#' + element.data('parent-id') + ' .elementor-tab-content').each(function(){
			let tab_id = $(this).attr('id');
			console.log('wz-tariff-tooltip tab_id: ' + tab_id);
			let button_selector = '#' + tab_id + ' .wz-tooltip-button';
			console.log('wz-tariff-tooltip button_selector: ' + button_selector);
			$(button_selector).each(function(){
				let button_id = $(this).attr('id');
				console.log('wz-tariff-tooltip button_id: ' + button_id);
				$(this).click(
					function(event) {
						event.preventDefault();
						let button_id_click = $(this).attr('id');
						console.log('wz-tariff-tooltip button_id_click: ' + button_id_click);
						let tooltipIdArray = button_id_click.split('-');
						//'wz-tooltip-description-channel-start'
						let tooltip_selector = '#' + tab_id + ' #wz-tooltip-description-' + tooltipIdArray[3] + '-' + tooltipIdArray[4]; 
						console.log('wz-tariff-tooltip tooltip_selector: ' + tooltip_selector);
						$(tooltip_selector).toggleClass('wz-hide');
						console.log('wz-tariff-tooltip tooltip_selector class: ' + $(tooltip_selector).attr('class'));
					}
				);
			});
		});*/
	}
	/*$('#wz-tooltip-button-title').click(function (e) {
		e.preventDefault();
		$('#wz-tooltip-description-title').toggleClass('wz-hide');
	});*/
});
console.log('in-viewport end');
/* in-viewport end */