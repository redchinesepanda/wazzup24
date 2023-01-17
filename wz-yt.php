<?php
/*
 * Как задать произвольный заголовок для записей? 
 */
add_filter( 'yturbo_custom_title', 'my_custom_title_for_turbo' );
function my_custom_title_for_turbo( $title ) {
    //просто пример добавления "Статья: " к заголовку записи
    //$title = 'Статья: ' . get_the_title();
	$title = 'Блог';
	$meta_key = 'wz-slider-title';
	$post = get_post();
	if ($post) {
		$post_title = $post->post_title;
		if (strpos($post_title, '_') !== false) {
			$post_id = $post->ID;
			$meta_value = get_post_meta($post_id, $meta_key, true);
			if ($meta_value) {
				$title = $meta_value;
			}
		} else {
			$title = $post_title;
		}
	}
	$title = strip_tags($title);
	$title = str_replace('<br>', '', $title);
	$title = str_replace('<br />', '', $title);
	$title = str_replace('&nbsp;', ' ', $title);
    //удаляем эмоджи (яндекс выдает на них ошибку)
    $title = yturbo_remove_emoji($title);
    //устанавливаем заголовком название сайта, если заголовок пустой
    $title = yturbo_empty_title($title);
    //преобразуем спец. символы в html-сущности
    $title = esc_html($title);
    //обрезаем заголовок по словам, чтобы не превышать ограничение в 240 символов
    $title = yturbo_cut_by_words(237, $title);
    return $title;
}

/*
 * Shortcode [wz-meta-turbo field='wz-slider-title']
 */
add_shortcode('wz-meta-turbo', 'wz_meta_turbo_shortcode');
function wz_meta_turbo_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_meta_turbo_shortcode');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$output = array('wz_meta_turbo_shortcode');
	//$text = 'Нет мета-поля';
	$text = '';
	array_push($output, 'text: ' . $text);
	if (array_key_exists('field', $args)) {
		$meta_key = $args['field'];
		array_push($output, 'meta_key: ' . $meta_key);
		$post = get_post();
		$post_id = $post->ID;
		array_push($output, 'post_id: ' . $post_id);
		$meta_value = get_post_meta($post_id , $meta_key, true);
		array_push($output, 'meta_value: ' . print_r($meta_value, true));
		if ($meta_value) {
			$text = $meta_value;
		}
	}
	$text = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si",'<$1$2>', $text);
	array_push($output, 'text preg_replace: ' . $text);
	$text = strip_tags($text);
	array_push($output, 'text strip_tags: ' . $text);
	$text = str_replace('<br>', '', $text);
	array_push($output, 'text str_replace <br>: ' . $text);
	$text = str_replace('<br />', '', $text);
	array_push($output, 'text str_replace <br />: ' . $text);
	$text = str_replace('&nbsp;', ' ', $text);
	array_push($output, 'text str_replace &nbsp;: ' . $text);
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	//return implode('|', $output);
	return $text;
}

/*
 * Shortcode [wz-post-content-turbo]
 */
add_shortcode('wz-post-content-turbo', 'wz_post_content_turbo_shortcode');
function wz_post_content_turbo_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_post_content_turbo_shortcode');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$output = array('wz_post_content_turbo_shortcode');
	$text = '';
	$post = get_post();
	if ($post) {
		$text = $post->post_content;
		array_push($output, 'text: ' . $text);
	}
	array_push($output, 'text: ' . $text);
	//$text = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si",'<$1$2>', $text);
	//array_push($output, 'text preg_replace: ' . $text);
	//$text = strip_tags($text);
	//array_push($output, 'text strip_tags: ' . $text);
	//$text = str_replace('<br>', '', $text);
	//array_push($output, 'text str_replace <br>: ' . $text);
	//$text = str_replace('<br />', '', $text);
	//array_push($output, 'text str_replace <br />: ' . $text);
	//$text = str_replace('&nbsp;', ' ', $text);
	//array_push($output, 'text str_replace &nbsp;: ' . $text);
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	//return implode('|', $output);
	return $text;
}


?>