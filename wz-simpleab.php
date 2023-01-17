<?php
/*
 *  Подгружаем скрипт только для страниц с meta kb_main_mobile == wz-enabled
 */

add_action('wp', 'wz_simpleab_check');

function wz_simpleab_check(){
	$message = array('<pre>');
	array_push($message, 'wz_simpleab_check');
	$post = get_post();
	$meta_value = get_post_meta($post->ID, 'wz-simpleab-enabled', true);
	if ($meta_value == 'wz-simpleab') {
	//if (is_front_page()) {
		add_action( 'wp_enqueue_scripts', 'wz_simpleab_script' );
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
}

function wz_simpleab_script() {
	$script_url = get_stylesheet_directory_uri() . '/js/simpleab.js';
	wp_register_script('simpleab', $script_url, array ('jquery'), '1.1', true);
	wp_enqueue_script('simpleab');
	$script_url = get_stylesheet_directory_uri() . '/js/wp-simpleab-ym.js';
	wp_register_script('wz-simpleab-ym', $script_url, array ('jquery', 'simpleab'), '1.1', true);
	wp_enqueue_script('wz-simpleab-ym');
}

add_action('wp', 'wz_ym_64950046_check');

function wz_ym_64950046_check(){
	$message = array('<pre>');
	array_push($message, 'wz_ym_64950046_check');
	if (!is_front_page()) {
		//add_action( 'wp_enqueue_scripts', 'wz_ym_64950046_script' );
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
}

function wz_ym_64950046_script() {
	$script_url = get_stylesheet_directory_uri() . '/js/wz-ym-64950046.js';
	wp_register_script('wz-ym-64950046', $script_url, array(), '1.1', true);
	wp_enqueue_script('wz-ym-64950046');
}

/*
 * [wz-simpleab-class]
 */
function wz_simpleab_class_shortcode( $atts ) {
	$messages = array('<pre>');
	array_push($messages, 'wz_simpleab_class_shortcode');
	$class = '';
	$current_lang = pll_current_language('name');
	//array_push($messages, 'current_lang: ' . $current_lang);
	//Поле wz-simpleab может быть wz-simpleab или wz-simpleab-off
	$post = get_post();
	$meta_value = get_post_meta($post->ID, 'wz-simpleab-enabled', true);
	if ($meta_value !== false) {
		$class = $meta_value;
	}
	/*if (
	    is_front_page()
	    && $current_lang == 'RU'
	) {
		$class = 'wz-simpleab';
	}*/
	array_push($messages, 'class: ' . $class);
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
    return $class;
}
add_shortcode( 'wz-simpleab-class', 'wz_simpleab_class_shortcode' );

/*
 * body simpleab class
 */
function wz_body_simpleab_class($classes) {
	$atts = array();
	$class = wz_simpleab_class_shortcode( $atts );
	if ($class) {
		$classes[] = $class;
	}
    return $classes;
}
add_filter('body_class', 'wz_body_simpleab_class');
?>