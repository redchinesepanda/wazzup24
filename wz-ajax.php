<?php
/*
 * Добавление переменной с адресом /ajax для файла javascript Ajax во фронтэнде
 */
add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
function myajax_data(){
	wp_localize_script( 'jquery', 'myajax',
		array(
			//'url' => admin_url('admin-ajax.php')
			'url' => '/ajax'
		)
	);
}

/*
 * Вывод ipinfo при получении на адрес admin-ajax.php параметра action = get_ipinfo
 */
add_action( 'wp_ajax_get_ipinfo', 'wz_show_ipinfo' );
add_action( 'wp_ajax_nopriv_get_ipinfo', 'wz_show_ipinfo' );
function wz_show_ipinfo() {
	$message = array('<pre>');
	array_push($message, 'wz_show_ipinfo');
	$ipinfo_json = wz_get_ipinfo();
	array_push($message, 'ipinfo_json: ' . print_r($ipinfo_json, true));
	array_push($message, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $message);
	//}
	echo wz_get_ipinfo($ipinfo_json);
	wp_die();
}

/*
 * Вывод [elementor-template id='25606'] при получении на адрес admin-ajax.php параметра action = get_tariff_single с дополнительным параметром duration 6mon 12mon
 */
add_action( 'wp_ajax_get_tariff_single', 'wz_show_tariff_single' );
add_action( 'wp_ajax_nopriv_get_tariff_single', 'wz_show_tariff_single' );
function wz_show_tariff_single() {
	$message = array('<pre>');
	array_push($message, 'wz_show_tariff_single');
	$output = 'section not in list';
	global $post;
	array_push($message, 'post: ' . print_r($post, true));
	if (array_key_exists('post_id', $_GET)) {
		$post = get_post($_GET['post_id']);
		array_push($message, 'post: ' . print_r($post, true));
	}
	if (!empty($post)) {
		array_push($message, 'post->ID: ' . $post->ID);
		if (array_key_exists('section_name', $_GET)) {
			if ($_GET['section_name'] == 'elementor-tab-content-2913') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-2913');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-ym-start='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-start='wz-plan-subscription-rur-1-per-price-1'
						wz-tariff-usd-start='wz-plan-subscription-usd-1-per-price-1'
						wz-tariff-eur-start='wz-plan-subscription-eur-1-per-price-1'
						wz-tariff-kzt-start='wz-plan-subscription-kzt-1-per-price-1'
						wz-tariff-rur-start-before='empty'
						wz-tariff-usd-start-before='empty'
						wz-tariff-eur-start-before='empty'
						wz-tariff-kzt-start-before='empty'
						wz-tariff-ym-pro='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-pro='wz-plan-subscription-rur-1-per-price-2'
						wz-tariff-usd-pro='wz-plan-subscription-usd-1-per-price-2'
						wz-tariff-eur-pro='wz-plan-subscription-eur-1-per-price-2'
						wz-tariff-kzt-pro='wz-plan-subscription-kzt-1-per-price-2'
						wz-tariff-rur-pro-before='empty'
						wz-tariff-usd-pro-before='empty'
						wz-tariff-eur-pro-before='empty'
						wz-tariff-kzt-pro-before='empty'
						wz-tariff-ym-max='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-max='wz-plan-subscription-rur-1-per-price-3'
						wz-tariff-usd-max='wz-plan-subscription-usd-1-per-price-3'
						wz-tariff-eur-max='wz-plan-subscription-eur-1-per-price-3'
						wz-tariff-kzt-max='wz-plan-subscription-kzt-1-per-price-3'
						wz-tariff-rur-max-before='empty'
						wz-tariff-usd-max-before='empty'
						wz-tariff-eur-max-before='empty'
						wz-tariff-kzt-max-before='empty'
					]
						[elementor-template id='25606']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-2912') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-2912');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-ym-start='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-ym-start='wz-plan-subscription-below-button-ym-6-start'
						wz-tariff-rur-start='wz-plan-subscription-rur-6-per-price-1'
						wz-tariff-usd-start='wz-plan-subscription-usd-6-per-price-1'
						wz-tariff-eur-start='wz-plan-subscription-eur-6-per-price-1'
						wz-tariff-kzt-start='wz-plan-subscription-kzt-6-per-price-1'
						wz-tariff-rur-start-before='wz-plan-subscription-rur-1-per-price-1'
						wz-tariff-usd-start-before='wz-plan-subscription-usd-1-per-price-1'
						wz-tariff-eur-start-before='wz-plan-subscription-eur-1-per-price-1'
						wz-tariff-kzt-start-before='wz-plan-subscription-kzt-1-per-price-1'
						wz-tariff-ym-pro='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-pro='wz-plan-subscription-rur-6-per-price-2'
						wz-tariff-usd-pro='wz-plan-subscription-usd-6-per-price-2'
						wz-tariff-eur-pro='wz-plan-subscription-eur-6-per-price-2'
						wz-tariff-kzt-pro='wz-plan-subscription-kzt-6-per-price-2'
						wz-tariff-rur-pro-before='wz-plan-subscription-rur-1-per-price-2'
						wz-tariff-usd-pro-before='wz-plan-subscription-usd-1-per-price-2'
						wz-tariff-eur-pro-before='wz-plan-subscription-eur-1-per-price-2'
						wz-tariff-kzt-pro-before='wz-plan-subscription-kzt-1-per-price-2'
						wz-tariff-ym-max='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-max='wz-plan-subscription-rur-6-per-price-3'
						wz-tariff-usd-max='wz-plan-subscription-usd-6-per-price-3'
						wz-tariff-eur-max='wz-plan-subscription-eur-6-per-price-3'
						wz-tariff-kzt-max='wz-plan-subscription-kzt-6-per-price-3'
						wz-tariff-rur-max-before='wz-plan-subscription-rur-1-per-price-3'
						wz-tariff-usd-max-before='wz-plan-subscription-usd-1-per-price-3'
						wz-tariff-eur-max-before='wz-plan-subscription-eur-1-per-price-3'
						wz-tariff-kzt-max-before='wz-plan-subscription-kzt-1-per-price-3'
					]
						[elementor-template id='25606']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-2911') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-2911');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-ym-start='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-start='wz-plan-subscription-rur-12-per-price-1'
						wz-tariff-usd-start='wz-plan-subscription-usd-12-per-price-1'
						wz-tariff-eur-start='wz-plan-subscription-eur-12-per-price-1'
						wz-tariff-kzt-start='wz-plan-subscription-kzt-12-per-price-1'
						wz-tariff-rur-start-before='wz-plan-subscription-rur-1-per-price-1'
						wz-tariff-usd-start-before='wz-plan-subscription-usd-1-per-price-1'
						wz-tariff-eur-start-before='wz-plan-subscription-eur-1-per-price-1'
						wz-tariff-kzt-start-before='wz-plan-subscription-kzt-1-per-price-1'
						wz-tariff-ym-pro='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-pro='wz-plan-subscription-rur-12-per-price-2'
						wz-tariff-usd-pro='wz-plan-subscription-usd-12-per-price-2'
						wz-tariff-eur-pro='wz-plan-subscription-eur-12-per-price-2'
						wz-tariff-kzt-pro='wz-plan-subscription-kzt-12-per-price-2'
						wz-tariff-rur-pro-before='wz-plan-subscription-rur-1-per-price-2'
						wz-tariff-usd-pro-before='wz-plan-subscription-usd-1-per-price-2'
						wz-tariff-eur-pro-before='wz-plan-subscription-eur-1-per-price-2'
						wz-tariff-kzt-pro-before='wz-plan-subscription-kzt-1-per-price-2'
						wz-tariff-ym-max='wz-plan-subscription-below-button-ym-12-start'
						wz-tariff-rur-max='wz-plan-subscription-rur-12-per-price-3'
						wz-tariff-usd-max='wz-plan-subscription-usd-12-per-price-3'
						wz-tariff-eur-max='wz-plan-subscription-eur-12-per-price-3'
						wz-tariff-kzt-max='wz-plan-subscription-kzt-12-per-price-3'
						wz-tariff-rur-max-before='wz-plan-subscription-rur-1-per-price-3'
						wz-tariff-usd-max-before='wz-plan-subscription-usd-1-per-price-3'
						wz-tariff-eur-max-before='wz-plan-subscription-eur-1-per-price-3'
						wz-tariff-kzt-max-before='wz-plan-subscription-kzt-1-per-price-3'
					]
						[elementor-template id='25606']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-1883') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-1883');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-usd-start='wz-plan-subscription-usd-1-per-price-1'
						wz-tariff-usd-start-before='empty'
						wz-tariff-usd-pro='wz-plan-subscription-usd-1-per-price-2'
						wz-tariff-usd-pro-before='empty'
						wz-tariff-usd-max='wz-plan-subscription-usd-1-per-price-3'
						wz-tariff-usd-max-before='empty'
					]
						[elementor-template id='32115']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-1882') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-1882');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-usd-start='wz-plan-subscription-usd-6-per-price-1'
						wz-tariff-usd-start-before='wz-plan-subscription-usd-1-per-price-1'
						wz-tariff-usd-pro='wz-plan-subscription-usd-6-per-price-2'
						wz-tariff-usd-pro-before='wz-plan-subscription-usd-1-per-price-2'
						wz-tariff-usd-max='wz-plan-subscription-usd-6-per-price-3'
						wz-tariff-usd-max-before='wz-plan-subscription-usd-1-per-price-3'
					]
						[elementor-template id='32115']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-1881') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-1881');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-usd-start='wz-plan-subscription-usd-12-per-price-1'
						wz-tariff-usd-start-before='wz-plan-subscription-usd-1-per-price-1'
						wz-tariff-usd-pro='wz-plan-subscription-usd-12-per-price-2'
						wz-tariff-usd-pro-before='wz-plan-subscription-usd-1-per-price-2'
						wz-tariff-usd-max='wz-plan-subscription-usd-12-per-price-3'
						wz-tariff-usd-max-before='wz-plan-subscription-usd-1-per-price-3'
					]
						[elementor-template id='32115']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-4513') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-4513');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-eur-start='wz-plan-subscription-eur-1-per-price-1'
						wz-tariff-eur-start-before='empty'
						wz-tariff-eur-pro='wz-plan-subscription-eur-1-per-price-2'
						wz-tariff-eur-pro-before='empty'
						wz-tariff-eur-max='wz-plan-subscription-eur-1-per-price-3'
						wz-tariff-eur-max-before='empty'
					]
						[elementor-template id='32182']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-4512') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-4512');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-eur-start='wz-plan-subscription-eur-6-per-price-1'
						wz-tariff-eur-start-before='wz-plan-subscription-eur-1-per-price-1'
						wz-tariff-eur-pro='wz-plan-subscription-eur-6-per-price-2'
						wz-tariff-eur-pro-before='wz-plan-subscription-eur-1-per-price-2'
						wz-tariff-eur-max='wz-plan-subscription-eur-6-per-price-3'
						wz-tariff-eur-max-before='wz-plan-subscription-eur-1-per-price-3'
					]
						[elementor-template id='32182']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-4511') {
				array_push($message, 'wz_show_tariff_single elementor-tab-content-4511');
				$output = do_shortcode(
					"[lcg-meta
						wz-tariff-eur-start='wz-plan-subscription-eur-12-per-price-1'
						wz-tariff-eur-start-before='wz-plan-subscription-eur-1-per-price-1'
						wz-tariff-eur-pro='wz-plan-subscription-eur-12-per-price-2'
						wz-tariff-eur-pro-before='wz-plan-subscription-eur-1-per-price-2'
						wz-tariff-eur-max='wz-plan-subscription-eur-12-per-price-3'
						wz-tariff-eur-max-before='wz-plan-subscription-eur-1-per-price-3'
					]
						[elementor-template id='32182']
					[/lcg-meta]"
				);
			}
			/* https://cdn.edgecenter.ru/ */
			//$output = str_replace('https://wazzup24.com', 'https://cache.wazzup24.com', $output);
		}
	}
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	echo $output;
	wp_die();
}

/*
 * Вывод [elementor-template id='15862'] при получении на адрес admin-ajax.php параметра action = get_integration_single с дополнительным параметром messenger whatsapp instagram telegram vk
 */
add_action( 'wp_ajax_get_integration_single', 'wz_show_integration_single' );
add_action( 'wp_ajax_nopriv_get_integration_single', 'wz_show_integration_single' );
function wz_show_integration_single() {
	$message = array('<pre>');
	array_push($message, 'wz_show_integration_single');
	global $post;
	array_push($message, 'post: ' . print_r($post, true));
	if (array_key_exists('post_id', $_GET)) {
		$post = get_post($_GET['post_id']);
		array_push($message, 'post: ' . print_r($post, true));
	}
	if (!empty($post)) {
		array_push($message, 'post->ID: ' . $post->ID);
		if (array_key_exists('messenger', $_GET)) {
			if ($_GET['messenger'] == 'whatsapp') {
				array_push($message, 'wz_show_integration_single whatsapp');
				echo do_shortcode(
					"[lcg-meta
						wz-section-integration-image='wz-section-integration-image1'
						wz-section-integration-text='wz-section-integration-text1'
						wz-section-integration-prefix='wz-section-integration-prefix1'
						wz-section-integration-suffix='wz-section-integration-suffix']
						[elementor-template id='15862']
					[/lcg-meta]"
				);
			}
			if ($_GET['messenger'] == 'instagram') {
				array_push($message, 'wz_show_integration_single instagram');
				echo do_shortcode(
					"[lcg-meta
						wz-section-integration-image='wz-section-integration-image2'
						wz-section-integration-text='wz-section-integration-text2'
						wz-section-integration-prefix='wz-section-integration-prefix2'
						wz-section-integration-suffix='wz-section-integration-suffix']
						[elementor-template id='15862']
					[/lcg-meta]"
				);
			}
			if ($_GET['messenger'] == 'telegram') {
				array_push($message, 'wz_show_integration_single telegram');
				echo do_shortcode(
					"[lcg-meta
						wz-section-integration-image='wz-section-integration-image3' 
						wz-section-integration-text='wz-section-integration-text3' 
						wz-section-integration-prefix='wz-section-integration-prefix3' 
						wz-section-integration-suffix='wz-section-integration-suffix']
						[elementor-template id='15862']
					[/lcg-meta]"
				);
			}
			if ($_GET['messenger'] == 'vk') {
				array_push($message, 'wz_show_integration_single vk');
				echo do_shortcode(
					"[lcg-meta
						wz-section-integration-image='wz-section-integration-image4'
						wz-section-integration-text='wz-section-integration-text4'
						wz-section-integration-prefix='wz-section-integration-prefix4'
						wz-section-integration-suffix='wz-section-integration-suffix']
						[elementor-template id='15862']
					[/lcg-meta]"
				);
			}
		}
	}
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	wp_die();
}

/*
 * Вывод [elementor-template id='26746'] при получении на адрес admin-ajax.php параметра action = get_sell_single
 */
add_action( 'wp_ajax_get_sell_single', 'wz_show_sell_single' );
add_action( 'wp_ajax_nopriv_get_sell_single', 'wz_show_sell_single' );
function wz_show_sell_single() {
	$message = array('<pre>');
	array_push($message, 'wz_show_sell_single');
	$output = 'section not in list';
	global $post;
	array_push($message, 'post: ' . print_r($post, true));
	if (array_key_exists('post_id', $_GET)) {
		$post = get_post($_GET['post_id']);
		array_push($message, 'post: ' . print_r($post, true));
	}
	$output = 'Запись не найдена';
	if (!empty($post)) {
		array_push($message, 'post->ID: ' . $post->ID);
		$section_name = 'elementor-tab-content-1901';
		if (array_key_exists('section_name', $_GET)) {
			$section_name = $_GET['section_name'];
		}
		array_push($message, 'section_name: ' . $section_name);
		$shortcodes = array(
			'elementor-tab-content-1901' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-1'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-left'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-left']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-1902' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-2'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-right'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-right']
						[elementor-template id='26746']
					[/lcg-meta]",
		);
		$output = do_shortcode($shortcodes[$section_name]);
		/* https://cdn.edgecenter.ru/ */
		//$output = str_replace('https://wazzup24.com', 'https://cache.wazzup24.com', $output);
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	echo $output;
	wp_die();
}

/*
 * Вывод [elementor-template id='26746'] при получении на адрес admin-ajax.php параметра action = get_sell_single_en (es, pt, hi)
 */
add_action( 'wp_ajax_get_sell_single_en', 'wz_show_sell_single_en' );
add_action( 'wp_ajax_nopriv_get_sell_single_en', 'wz_show_sell_single_en' );
function wz_show_sell_single_en() {
	$message = array('<pre>');
	array_push($message, 'wz_show_sell_single_en');
	$output = 'section not in list';
	global $post;
	array_push($message, 'post: ' . print_r($post, true));
	if (array_key_exists('post_id', $_GET)) {
		$post = get_post($_GET['post_id']);
		array_push($message, 'post: ' . print_r($post, true));
	}
	$output = 'Запись не найдена';
	if (!empty($post)) {
		array_push($message, 'post->ID: ' . $post->ID);
		$section_name = 'elementor-tab-content-3121';
		if (array_key_exists('section_name', $_GET)) {
			$section_name = $_GET['section_name'];
		}
		array_push($message, 'section_name: ' . $section_name);
		$shortcodes = array(
			'elementor-tab-content-3121' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-1'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-1'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-1']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-3122' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-2'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-2'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-2']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-3123' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-3'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-3'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-3']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-3124' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-4'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-4'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-4']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-9181' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-1'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-1'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-1']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-9182' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-2'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-2'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-2']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-9183' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-3'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-3'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-3']
						[elementor-template id='26746']
					[/lcg-meta]",
			'elementor-tab-content-9184' => "[lcg-meta
						wz-sell-single-tab-title='wz-sell-single-tab-title-4'
						wz-sell-single-tab-desktop='wz-sell-tab-desktop-img-4'
						wz-sell-single-tab-mobile='wz-sell-tab-mobile-img-4']
						[elementor-template id='26746']
					[/lcg-meta]",
		);
		$output = do_shortcode($shortcodes[$section_name]);
		/* https://cdn.edgecenter.ru/ */
		//$output = str_replace('https://wazzup24.com', 'https://cache.wazzup24.com', $output);
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	echo $output;
	wp_die();
}

/*
 * Вывод [elementor-template id='26896'] при получении на адрес admin-ajax.php параметра action = get_thanks_single
 */
add_action( 'wp_ajax_get_thanks_single', 'wz_show_thanks_single' );
add_action( 'wp_ajax_nopriv_get_thanks_single', 'wz_show_thanks_single' );
function wz_show_thanks_single() {
	$message = array('<pre>');
	array_push($message, 'wz_show_thanks_single');
	$output = 'section not in list';
	global $post;
	array_push($message, 'post: ' . print_r($post, true));
	if (array_key_exists('post_id', $_GET)) {
		$post = get_post($_GET['post_id']);
		array_push($message, 'post: ' . print_r($post, true));
	}
	if (!empty($post)) {
		array_push($message, 'post->ID: ' . $post->ID);
		if (array_key_exists('section_name', $_GET)) {
			if ($_GET['section_name'] == 'elementor-tab-content-2371' || $_GET['section_name'] == 'elementor-tab-content-1711') {
				array_push($message, 'wz_show_sell_thanks elementor-tab-content-2371');
				/*$output = do_shortcode(
					"[lcg-meta
						wz-thanks-tab-subtitle='wz-thanks-tab-subtitle-1'
						wz-thanks-tab-description='wz-thanks-tab-description-1'
						wz-thanks-tab-img-desktop='wz-thanks-tab-img-desktop-1']
						[elementor-template id='26896']
					[/lcg-meta]"
				);*/
				$output = do_shortcode(
					"[lcg
						wz-thanks-tab-subtitle='" . __('The client&rsquo;s phone number is&nbsp;already in&nbsp;CRM', 'astra') . "'
						wz-thanks-tab-description='" . __('Just click it&nbsp;and, hey presto, you can write.', 'astra') . "'
						wz-thanks-tab-img-desktop='32089']
						[elementor-template id='26896']
					[/lcg]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-2372' || $_GET['section_name'] == 'elementor-tab-content-1712' || $_GET['section_name'] == 'elementor-tab-content-9182') {
				array_push($message, 'wz_show_sell_thanks elementor-tab-content-2372');
				/*$output = do_shortcode(
					"[lcg-meta
						wz-thanks-tab-subtitle='wz-thanks-tab-subtitle-2'
						wz-thanks-tab-description='wz-thanks-tab-description-2'
						wz-thanks-tab-img-desktop='wz-thanks-tab-img-desktop-2']
						[elementor-template id='26896']
					[/lcg-meta]"
				);*/
				$output = do_shortcode(
					"[lcg
						wz-thanks-tab-subtitle='" . __('Templates save time', 'astra') . "'
						wz-thanks-tab-description='" . __('Quickly insert templates as&nbsp;you type. It&nbsp;takes three seconds to&nbsp;send a&nbsp;contract, directions to&nbsp;the office, a&nbsp;link to&nbsp;a&nbsp;website, or&nbsp;to&nbsp;reply to&nbsp;standard questions.', 'astra') . "'
						wz-thanks-tab-img-desktop='32006']
						[elementor-template id='26896']
					[/lcg]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-2373' || $_GET['section_name'] == 'elementor-tab-content-1713' || $_GET['section_name'] == 'elementor-tab-content-9183') {
				array_push($message, 'wz_show_sell_thanks elementor-tab-content-2373');
				/*$output = do_shortcode(
					"[lcg-meta
						wz-thanks-tab-subtitle='wz-thanks-tab-subtitle-3'
						wz-thanks-tab-description='wz-thanks-tab-description-3'
						wz-thanks-tab-img-desktop='wz-thanks-tab-img-desktop-3']
						[elementor-template id='26896']
					[/lcg-meta]"
				);*/
				$output = do_shortcode(
					"[lcg
						wz-thanks-tab-subtitle='" . __('From chat to deal in one click', 'astra') . "'
						wz-thanks-tab-description='" . __('<p>No need to copy the phone number and search for the client in CRM.</p><p>Just click the suitcase icon and proceed directly from chat to deal.</p>', 'astra') . "'
						wz-thanks-tab-img-desktop='32007']
						[elementor-template id='26896']
					[/lcg]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-2374' || $_GET['section_name'] == 'elementor-tab-content-1714' || $_GET['section_name'] == 'elementor-tab-content-9184') {
				array_push($message, 'wz_show_sell_thanks elementor-tab-content-2374');
				/*$output = do_shortcode(
					"[lcg-meta
						wz-thanks-tab-subtitle='wz-thanks-tab-subtitle-4'
						wz-thanks-tab-description='wz-thanks-tab-description-4'
						wz-thanks-tab-img-desktop='wz-thanks-tab-img-desktop-4']
						[elementor-template id='26896']
					[/lcg-meta]"
				);*/
				$output = do_shortcode(
					"[lcg
						wz-thanks-tab-subtitle='" . __('Ticks show when a message was sent, delivered, and read', 'astra') . "'
						wz-thanks-tab-description='" . __('You can build a&nbsp;proper dialog with the client: call if&nbsp;a&nbsp;message goes unread, check in&nbsp;if&nbsp;they don&rsquo;t reply.', 'astra') . "'
						wz-thanks-tab-img-desktop='32008']
						[elementor-template id='26896']
					[/lcg]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-2375' || $_GET['section_name'] == 'elementor-tab-content-1715') {
				array_push($message, 'wz_show_sell_thanks elementor-tab-content-2375');
				/*$output = do_shortcode(
					"[lcg-meta
						wz-thanks-tab-subtitle='wz-thanks-tab-subtitle-5'
						wz-thanks-tab-description='wz-thanks-tab-description-5'
						wz-thanks-tab-img-desktop='wz-thanks-tab-img-desktop-5']
						[elementor-template id='26896']
					[/lcg-meta]"
				);*/
				$output = do_shortcode(
					"[lcg
						wz-thanks-tab-subtitle='" . __('Notifications show who&rsquo;s waiting for your reply', 'astra') . "'
						wz-thanks-tab-description='" . __('The chat will not &laquo;sink&raquo; and the notification will not go&nbsp;away until you answer the client. So&nbsp;it&rsquo;s nothing terrible if&nbsp;you read a&nbsp;message in&nbsp;a&nbsp;rush and didn&rsquo;t reply right away.', 'astra') . "'
						wz-thanks-tab-img-desktop='32009']
						[elementor-template id='26896']
					[/lcg]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-2376' || $_GET['section_name'] == 'elementor-tab-content-1716') {
				array_push($message, 'wz_show_sell_thanks elementor-tab-content-2376');
				/*$output = do_shortcode(
					"[lcg-meta
						wz-thanks-tab-subtitle='wz-thanks-tab-subtitle-6'
						wz-thanks-tab-description='wz-thanks-tab-description-6'
						wz-thanks-tab-img-desktop='wz-thanks-tab-img-desktop-6']
						[elementor-template id='26896']
					[/lcg-meta]"
				);*/
				$output = do_shortcode(
					"[lcg
						wz-thanks-tab-subtitle='" . __('Wazzup is a messenger', 'astra') . "'
						wz-thanks-tab-description='" . __('It supports all the basic WhatsApp features that sellers are used to.', 'astra') . "'
						wz-thanks-tab-img-desktop='32010']
						[elementor-template id='26896']
					[/lcg]"
				);
			}
			/* https://cdn.edgecenter.ru/ */
			//$output = str_replace('https://wazzup24.com', 'https://cache.wazzup24.com', $output);
		}
	}
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	echo $output;
	wp_die();
}

/*
 * Вывод [elementor-template id='28227'] при получении на адрес admin-ajax.php параметра action = get_automatization_single
 */
add_action( 'wp_ajax_get_automatization_amo_single', 'wz_show_automatization_amo_single' );
add_action( 'wp_ajax_nopriv_get_automatization_amo_single', 'wz_show_automatization_amo_single' );
function wz_show_automatization_amo_single() {
	$message = array('<pre>');
	array_push($message, 'wz_show_automatization_amo_single');
	global $post;
	array_push($message, 'post: ' . print_r($post, true));
	if (array_key_exists('post_id', $_GET)) {
		$post = get_post($_GET['post_id']);
		array_push($message, 'post: ' . print_r($post, true));
	}
	if (!empty($post)) {
		array_push($message, 'post->ID: ' . $post->ID);
		if (array_key_exists('section_name', $_GET)) {
			if ($_GET['section_name'] == 'elementor-tab-content-5331') {
				array_push($message, 'wz_show_automatization_amo_single first');
				echo do_shortcode(
					"[lcg-meta
						wz-automatization-amo-tab-subtitle='wz-automatization-amo-tab-subtitle-1'
						wz-automatization-amo-tab-description='wz-automatization-amo-tab-description-1'
						wz-automatization-amo-tab-img-desktop='wz-automatization-amo-tab-img-desktop-1'
						wz-automatization-amo-tab-img-mobile='wz-automatization-amo-tab-img-mobile-1']
						[elementor-template id='28227']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-5332') {
				array_push($message, 'wz_show_automatization_amo_single second');
				echo do_shortcode(
					"[lcg-meta
						wz-automatization-amo-tab-subtitle='wz-automatization-amo-tab-subtitle-2'
						wz-automatization-amo-tab-description='wz-automatization-amo-tab-description-2'
						wz-automatization-amo-tab-img-desktop='wz-automatization-amo-tab-img-desktop-2'
						wz-automatization-amo-tab-img-mobile='wz-automatization-amo-tab-img-mobile-2']
						[elementor-template id='28227']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-5333') {
				array_push($message, 'wz_show_automatization_amo_single third');
				echo do_shortcode(
					"[lcg-meta
						wz-automatization-amo-tab-subtitle='wz-automatization-amo-tab-subtitle-3'
						wz-automatization-amo-tab-description='wz-automatization-amo-tab-description-3'
						wz-automatization-amo-tab-img-desktop='wz-automatization-amo-tab-img-desktop-3'
						wz-automatization-amo-tab-img-mobile='wz-automatization-amo-tab-img-mobile-3']
						[elementor-template id='28227']
					[/lcg-meta]"
				);
			}
			if ($_GET['section_name'] == 'elementor-tab-content-5334') {
				array_push($message, 'wz_show_automatization_amo_single fourth');
				echo do_shortcode(
					"[lcg-meta
						wz-automatization-amo-tab-subtitle='wz-automatization-amo-tab-subtitle-4'
						wz-automatization-amo-tab-description='wz-automatization-amo-tab-description-4'
						wz-automatization-amo-tab-img-desktop='wz-automatization-amo-tab-img-desktop-4'
						wz-automatization-amo-tab-img-mobile='wz-automatization-amo-tab-img-mobile-4']
						[elementor-template id='28227']
					[/lcg-meta]"
				);
			}
		}
	}
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	wp_die();
}

/*
 * Вывод admin пользователь или нет при получении на адрес admin-ajax.php параметра action = get_adminbar
 */
add_action( 'wp_ajax_get_adminbar', 'wz_show_adminbar' );
add_action( 'wp_ajax_nopriv_get_adminbar', 'wz_show_adminbar' );
function wz_show_adminbar() {
	$message = array('<pre>');
	array_push($message, 'wz_show_adminbar');
	$adminbar = array('permission' => false);
	if(
		current_user_can('administrator') 
		|| current_user_can('editor')
		|| current_user_can('wpseo_manager')
	) {
		$adminbar['permission'] = true;
	}
	$json = json_encode($adminbar);
	array_push($message, 'json: ' . print_r($json, true));
	array_push($message, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $message);
	//}
	echo $json;
	wp_die();
}

/*
 * Вывод [elementor-template id="<template_id>"] при получении на адрес admin-ajax.php параметра action=get_section с дополнительными параметрами post_id=<post_id> и section_name=footer
 */
add_action( 'wp_ajax_get_section', 'wz_show_section' );
add_action( 'wp_ajax_nopriv_get_section', 'wz_show_section' );

/*
 * Вывод [elementor-template id="<template_id>"] при получении на адрес admin-ajax.php параметра action=get_section с дополнительными параметрами post_id=<post_id> и section_name=footer
 */
add_action( 'wp_ajax_get_section', 'wz_show_section' );
add_action( 'wp_ajax_nopriv_get_section', 'wz_show_section' );
function wz_show_section() {
	$message = array('<pre>');
	array_push($message, 'wz_show_section');
	$output = 'section not in list';
	$post = null;
	if (array_key_exists('post_id', $_GET)) {
		$post = get_post($_GET['post_id']);
	}
	$section_name = 'footer';
	if (array_key_exists('section_name', $_GET)) {
		$section_name = $_GET['section_name'];
	}
	array_push($message, 'section_name: ' . $section_name);
	if (!empty($post)) {
		array_push($message, 'post->ID: ' . $post->ID);
		$templates = array(
			'wz-ajax-main-companies' => "[elementor-template id='26709']",
			'wz-ajax-main-problems' => "[elementor-template id='26834']",
			'wz-ajax-main-problems-en' => "[elementor-template id='31946']",
			'wz-ajax-millionmakers-problems-en' => "[elementor-template id='32764']",
			'wz-ajax-main-review' => "[elementor-template id='27015']",
			'wz-ajax-main-integration' => "[elementor-template id='26929']",
			'wz-ajax-main-integration-en' => "[elementor-template id='31960']",
			'wz-ajax-millionmakers-integration-en' => "[elementor-template id='32770']",
			'wz-ajax-main-communicate' => "[elementor-template id='29865']",
			'wz-ajax-main-communicate-en' => "[elementor-template id='31967']",
			//'wz-ajax-main-cases' => "[elementor-template id='26952']",
			'wz-ajax-main-cases' => "[elementor-template id='33813']",
			'wz-ajax-footer' => "[elementor-template id='26149']",
			'wz-ajax-consultation' => "[elementor-template id='30428']",
			'wz-ajax-main-fastanswer' => "[elementor-template id='27683']",
			'wz-ajax-consultation-form' => "[contact-form-7 id='27876' title='wz-ajax-consultation-form']",
			'wz-ajax-benefit' => "[elementor-template id='20278']",
			'wz-ajax-business' => "[elementor-template id='14632']",
			'wz-ajax-integration-single' => "[elementor-template id='20075']",
			'wz-ajax-connect' => "[elementor-template id='14640']",
			'wz-ajax-why' => "[elementor-template id='20122']",
			'wz-ajax-offer' => "[elementor-template id='20191']",
			'wz-ajax-lost' => "[elementor-template id='14673']",
			'wz-ajax-graph' => "[elementor-template id='14692']",
			'wz-ajax-review-background' => "[elementor-template id='15091']",
			'wz-ajax-try' => "[elementor-template id='17075']",
			'wz-ajax-steps' => "[elementor-template id='29700']",
			'wz-ajax-authomatization' => "[elementor-template id='29487']",
			'wz-ajax-income' => "[elementor-template id='24109']",
			'wz-ajax-partners-form' => "[elementor-template id='24315']",
			'wz-ajax-reasons' => "[elementor-template id='24159']",
			'wz-ajax-partners-steps' => "[elementor-template id='24195']",
			'elementor-tab-content-2731' => "[elementor-template id='25253']",
			'elementor-tab-content-2732' => "[elementor-template id='25279']",
			'elementor-tab-content-3121' => "[elementor-template id='26746']",
		);
		if (array_key_exists($section_name, $templates)) {
			$output = do_shortcode($templates[$section_name]);
			array_push($message, 'do_shortcode: ' . $section_name);
		}
	}
	array_push($message, '</pre>');
	echo $output;
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	wp_die();
}

/*
 * [wz-cache-buffer]
 */
function wz_cache_buffer_shortcode( $atts ) {
	$messages = array('<pre>');
	array_push($messages, 'wz_cache_buffer_shortcode');
	array_push($messages, 'atts: ' . print_r($atts, true));
	$output = 'wz_cache_buffer_shortcode';
	$url_path ='/wp-admin/admin-ajax.php';
	array_push($messages, 'wz_suffix_host: ' . $wz_suffix_host);
	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];
	array_push($messages, 'url: ' . $url);
	//$url = 'https://wazzup24.com/wp-admin/admin-ajax.php?action=get_section&post_id=26651&section_name=wz-ajax-main-companies';
	$url_components = parse_url($url);
	array_push($messages, 'url_components: ' . print_r($url_components, true));
	$url = $url_components['scheme'] . '://' . $url_components['host'] . $url_path . '?' . $url_components['query'];
	array_push($messages, 'url: ' . $url);
	$url_contents = file_get_contents($url);
	//array_push($messages, 'url_contents: ' . $url_contents);
	if ($url_contents !== false) {
		$output = $url_contents;
	}
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
    return $output;
}
add_shortcode( 'wz-cache-buffer', 'wz_cache_buffer_shortcode' );

/*
 * Use a template file for a specific url without creating a page
 */
/*add_action('init', function() {
	$messages = array('<pre>');
	array_push($messages, 'Use a template file for a specific url without creating a page');
	$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
	array_push($messages, 'url_path: ' . print_r($url_path, true));
	$template_path = '';
	$path = 'wz-cache-buffer-template';
	$template = 'wz-cache-buffer-template.php';
	if ( $url_path === $path ) {
		// load the file if exists
		//$template_path = locate_template($template, true);
		$template_path = locate_template($template);
		array_push($messages, 'template_path: ' . print_r($template_path, true));
	}
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
	if ($template_path != '') {
		load_template($template_path, true);
		exit(); // just exit if template was found and loaded
	}
});*/

?>