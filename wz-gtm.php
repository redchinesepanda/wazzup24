<?php
	/*
	 *  Подгружаем скрипт Google Tag Manager в раздел <head></head>
	 */
	
	function wz_gtm_script() {
		$message = array('<pre>');
		array_push($message, 'wz_gtm_method');
		$script_url = get_stylesheet_directory_uri() . '/js/wz-gtm.js';
		array_push($message, 'script_url: ' . $script_url);
		array_push($message, '</pre>');
		//if( current_user_can('administrator') ){
		//	echo implode('<br />', $message);
		//}
		echo '<script type="text/javascript" async="" src="' . $script_url . '"></script>';
		
	}
	add_action("wp_head", "wz_gtm_script", 0);

?>