<?php
/*
 * wz-viewport
 */
add_action( 'wp_enqueue_scripts', 'wz_viewport_script' );
function wz_viewport_script() {
	$wz_viewport_enabled = true;
    /*$post = get_post();
	if (in_array($post->ID, array(26651))) {
		$wz_viewport_enabled = false;
	}*/
	if (array_key_exists('elementor_library', $_GET)) {
		$wz_viewport_enabled = false;
	}
	if (array_key_exists('action', $_GET)) {
		if ($_GET['action'] == 'elementor') {
			$wz_viewport_enabled = false;
		}
	}
    if ($wz_viewport_enabled) {
		$script_url = get_stylesheet_directory_uri() . '/js/isInViewport.min.js';
		wp_register_script('isInViewport', $script_url, array ('jquery'), '1.1', true);
		wp_enqueue_script('isInViewport');
		$script_url = get_stylesheet_directory_uri() . '/js/wz-viewport.js';
		wp_register_script('wz-viewport', $script_url, array ('jquery', 'isInViewport'), '1.1', true);
		wp_enqueue_script('wz-viewport');
    }
}
?>