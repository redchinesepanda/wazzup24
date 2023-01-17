<?php
/*
 * Deactivate Font Awesome, Eicons in Elementor
 */
add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 ); 
function remove_default_stylesheet() {
	wp_deregister_style( 'elementor-icons' );
}

/*
 * How to Remove Inline CSS from Astra?
 */
function astra_force_remove_style() {
    add_filter( 'print_styles_array', function($styles) {

        // Set styles to remove.
        $styles_to_remove = array('astra-theme-css', 'astra-addon-css');
        if(is_array($styles) AND count($styles) > 0){
            foreach($styles AS $key => $code){
                if(in_array($code, $styles_to_remove)){
                    unset($styles[$key]);
                }
            }
        }
        return $styles;
    }); 
}
add_action('wp_enqueue_scripts', 'astra_force_remove_style', 99);

/*
 * Disable Google Fonts in Elementor
 */
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

/*
 * Disable Astra Fonts
 */
add_filter( 'astra_enable_default_fonts', '__return_false' );

/*
 * Disable Google Fonts in Astra 
 */
add_filter( 'astra_google_fonts_selected', '__return_empty_array' );

/*
 * Custom Fonts `font-display` support
 * https://developers.elementor.com/elementor-pro-2-7-custom-fonts-font-display-support/
 */
add_filter( 'elementor_pro/custom_fonts/font_display', function( $current_value, $font_family, $data ) {
	return 'swap';
}, 10, 3 );


/*
 * How to disable Lazy Load in WordPress 5.5 without a plugin
 * https://www.wppagebuilders.com/disable-lazy-load-in-wordpress-5-5/
 */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/*
 * Включение скриптов только при использовании шорткода формы
 */
add_action( 'get_header', 'wz_disable_cf7' );	
function wz_disable_cf7() {
	$message = array('<pre>');
	array_push($message, 'wz_disable_cf7');
	array_push($message, 'wz_disable_cf7 not is_front_page');
	$cf7_disabled = true;
	$post = get_post();
	if ($post) {
		if (strpos($post->post_name, 'partnership')) {
			$cf7_disabled = false;
		}	
	}
	if ($cf7_disabled) {
		array_push($message, 'wz_disable_cf7 is_front_page');
		add_filter( 'wpcf7_load_js', '__return_false' );
		add_filter( 'wpcf7_load_css', '__return_false' );
		remove_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20, 0 );
	}
	array_push($message, '</pre>');
	//if ( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
}

/*
 * Remove Wordpress Comment Feed Link from header
 */
remove_action( 'wp_head', 'feed_links', 2 ); 


?>