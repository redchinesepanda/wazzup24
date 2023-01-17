<?php

/*
 * Класс WZLcg для хранения аргументов шорткодов lcg, lcg-meta для передачи в шорткод elementor-template и приеме через lcg-param, lcg-param-currency
 * [lcg title1="Hello"][elementor-template id='614'][/lcg]
 * [lcg-param title1]
 * [lcg-param title1 rur]
 * [lcg-param-currency title1 rur]
 * [lcg-meta wz-section-integration-text='wz-section-integration-title'][elementor-template id="15862"][/lcg-meta]
 */
require_once('inc/wzlcg.class.php');
$wzlcg = new WZLcg();
//echo '$wzlcg: ' . ($wzlcg->getDebug() ? 'true' : 'false');

/*
 * Шорткод [wz-blog-tags] выводит список тегов
 * [wz-blog-tags number='5']
 * [wz-blog-tags order='0']
 * [wz-blog-tags action='current']
 */
add_shortcode( 'wz-blog-tags', 'wz_blog_tags' );
function wz_blog_tags($args) {
	//echo '<pre>';
	//echo 'wz_blog_tags<br />';
	//echo 'args:<br />';
	//print_r($args);
	$body_class = get_body_class();
	//echo 'body_class:<br />';
	//print_r($body_class);
	//$tags = get_tags();
	$action = 'all';
	if (array_key_exists('action', $args)) {
		$action = $args['action'];
	}
	//echo 'action: ' . $action . '^<br />';
	$tags = array();
	if (in_array($action, array('all'))) {
		$terms_args = array(
			'orderby'     => 'meta_value',
			//'orderby'     => array('meta_value', 'name'),
			'order'       => 'DESC',
			'taxonomy'    => 'post_tag',
			'meta_key'	=> 'wz-blog-tag-order'
		);
		if (array_key_exists('order', $args)) {
			$terms_args['meta_value'] = $args['order'];
		}
		if (array_key_exists('number', $args)) {
			$terms_args['number'] = $args['number'];
		}
		//echo 'terms_args:<br />';
		//print_r($terms_args);
		$tags = get_terms($terms_args);
		
		//echo 'tags:<br />';
		//print_r($tags);
	}
	if (in_array($action, array('current'))) {
		$post = get_post();
		//echo 'post->ID: ' . $post->ID . '^<br />';
		//echo 'post->post_title: ' . $post->post_title . '^<br />';
		$tags = wp_get_post_terms($post->ID);
		//$length  = null;
		//if (array_key_exists('number', $args)) {
		//	$length = $args['number'];
		//}
		//$tags = array_slice(wp_get_post_terms($post->ID), 0, $length);
		
	}
	$html = array();
	array_push($html, '<div class="wz-blog-tags">');
	if (!empty($tags)) {
		foreach ( $tags as $tag ) {
			$meta_value = get_term_meta( $tag->term_id, 'wz-blog-tag-order', true );
			/*echo 'meta_value: ' . $meta_value . '^<br />';
			if (empty($meta_value)) {
				update_term_meta( $tag->term_id, 'wz-blog-tag-order', '0' );
			}*/
			$active = '';
			if (in_array('tag-' . $tag->term_id, $body_class)) {
				$active = ' wz-active-tag';
			} 
			$tag_link = get_tag_link( $tag->term_id );
			//echo 'tag_link: ' . $tag_link . '^<br />';
			$tag_html = '<a href="' . $tag_link
				. '" title="' . $tag->name
				. '" class="' . $tag->slug . $active
				. '">#' . $tag->name . '</a> ';
			//echo 'tag_html: ' . $tag_html . '^<br />';
			array_push($html, $tag_html);
		}
	} else {
	    //$message = 'Tags not found';
		$message = _e('Tags not found', 'astra');
		if (array_key_exists('message', $args)) {
			$message = $args['message'];
		}
		array_push($html, $message);
	}
	array_push($html, '</div>');
	//echo '</pre>';
	return implode('', $html);
}

/*
 * Get previous or next posts link with url
 * [wz-blog-previous-link]
 * [wz-blog-previous-link adjacent='next']
 */
add_shortcode('wz-blog-previous-link', 'wz_blog_previous_link');
function wz_blog_previous_link($args) {
	$message = array();
	array_push($message, '<pre>');
	array_push($message, 'wz_blog_previous_link');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$link = '';
	$previous = true;
	$previous_label = 'Предыдущая статья';
	if (array_key_exists('adjacent', $args)) {
		if (in_array($args['adjacent'], array('next'))) {
			$previous = false;
			$previous_label = 'Следующая статья';
		}
	}
	if (array_key_exists('message', $args)) {
		$previous_label = $args['message'];
	}
	array_push($message, 'previous: ' . $previous . '^');
	array_push($message, 'previous_label: ' . $previous_label . '^');
	$post = get_adjacent_post(true, '', $previous , 'category');
	if (!empty($post)) {
		array_push($message, '$post->ID: ' . $post->ID . '^');
		$post_permalink = get_permalink($post->ID);
		array_push($message, 'post_permalink: ' . $post_permalink . '^');
		$link = '<a href="'  . $post_permalink . '">' . $previous_label . '</a>';
		//array_push($message, 'link: ' . $link . '^');
	}
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return $link;
}

/*
 * Шорткод [wz-blog-single-action title="Последние новости — в телеге Wazzup" button="Подписаться" ym="ym(64950046,'reachGoal','StepThreeTelNum2'); return true;"]
 * [lcg-param title]
 * [lcg-param button]
 * [lcg-param ym]
 */
add_shortcode('wz-blog-single-action', 'wz_blog_single_action');
function wz_blog_single_action($args) {
	$message = array('<pre>');
	array_push($message, 'wz_blog_single_action:');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$args_default = array(
		'title' => 'Последние новости — в телеге Wazzup',
		'button' => 'Подписаться',
		'url' => 'https://app.wazzup24.com/signup',
		'ym' => "data-ymclick|ym(64950046,'reachGoal','StepThreeTelNum2'); return true;",
	);
	$shortcode_attrs = array();
	foreach ($args_default as $arg_default_key => $arg_default_value) {
		if (array_key_exists($arg_default_key, $args)) {
			array_push($message, 'arg_default_key: ' . $arg_default_key);
			$prefix = '';
			if (in_array($arg_default_key, array('ym'))) {
				$prefix = 'data-ymclick|';
			}
			$args_default[$arg_default_key] = $prefix . $args[$arg_default_key];
		}
		array_push($shortcode_attrs, $arg_default_key . '="' . $args_default[$arg_default_key] . '"');
	}
	array_push($message, 'shortcode_attrs:');
	array_push($message, print_r($shortcode_attrs, true));
	array_push($message, '[lcg ' . implode(' ', $shortcode_attrs) . '][elementor-template id="18778"][/lcg]');
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return do_shortcode('[lcg ' . implode(' ', $shortcode_attrs) . '][elementor-template id="18778"][/lcg]');
}

/*
 * [wz-polylang]
 */

add_shortcode( 'wz-polylang', 'wz_polylang_shortcode' );

function wz_polylang_shortcode( $atts ) {
	$switcher_default = 'Languages not found';
	$current_lang = pll_current_language('name');
	if (!empty($current_lang)) {
		$switcher .= '<div class="wz-pll-current-lang"><span class="wz-pll-current-lang-label">' . $current_lang . '</span></div>';
	}
	$args = array(
		'dropdown' => 0,
		'hide_if_empty' => 0,
		'echo' => 0,
		//'raw' => 1,
	);
	$current_lang_list = pll_the_languages($args);
	if (!empty($current_lang_list)) {
		$switcher .= '<div class="wz-pll-lang-list">' . print_r($current_lang_list, true) . '</div>';
	}
	if (empty($switcher)) {
		$switcher .= $switcher_default;
	}
	return '<div class="wz-pll-container">' . $switcher . '<div>';
}

/*
 * Shortcode [wz-heder-tag-prefix part='tag_prefix'] for header prefix on tag archive
 * [wz-heder-tag-prefix part='tag_suffix']
 */
add_shortcode( 'wz-heder-tag-prefix', 'wz_heder_tag_prefix' );

function wz_heder_tag_prefix( $atts ){
	//echo '<pre>';
	//echo 'wz_heder_tag_prefix<br />';
	//echo 'atts:<br />';
	//print_r($atts);
	//echo '<br />';
	$current_lang = pll_current_language('name');
	//echo 'current_lang: ' . $current_lang . '^<br />';
	$blogs = array(
		'RU' => array(
			'label' => 'Блог',
			'url' => '/main-blog/',
			'tag_prefix' => 'Статьи по тегу',
			'tag_prefix2' => '«',
			'tag_suffix' => '»',
		),
		'EN' => array(
			'label' => 'Blog',
			'url' => '/en/main-blog-en/',
			'tag_prefix' => 'Articles by tag',
			'tag_prefix2' => '«',
			'tag_suffix' => '»',
		),
		'ES' => array(
			'label' => 'Blog',
			'url' => '/es/main-blog-es/',
			'tag_prefix' => 'Artículos por etiqueta',
			'tag_prefix2' => '«',
			'tag_suffix' => '»',
		),
	);
	$result = '';
	$part_key = 'tag_prefix';
	if( is_tag() ){
		$current_blog = $blogs[$current_lang];
		if (array_key_exists('part', $atts)) {
			$atts_key = $atts['part'];
			//echo 'atts_key: ' . $atts_key . '^<br />';
			if (array_key_exists($atts_key, $current_blog)) {
				$part_key = $atts_key;
			}
			//echo 'part_key: ' . $part_key . '^<br />';
			$result = $current_blog[$part_key];
		}
	}
	//echo 'result: ' . $result . '^<br />';
	//echo '</pre>';
	return $result;
}

/*
 * [wz-detect-crm]
 */
add_shortcode( 'wz-detect-crm', 'wz_detect_crm_shortcode' );
function wz_detect_crm_shortcode( $atts ) {
	$message = array('<pre>');
	$crms = array(
	    'techpartner' => 'wz-empty wz-techpartner',
	    'business' => 'wz-business',
	    'main' => 'wz-empty',
		'whatsapp' => 'wz-whatsapp',
		'instagram' => 'wz-instagram',
		'telegram' => 'wz-telegram',
		'vk' => 'wz-vk',
		'-crm' => 'wz-crm',
		'pricing' => 'wz-empty',
		'contact' => 'wz-empty',
		'affiliate' => 'wz-empty wz-partner',
		'partnership' => 'wz-empty wz-partner',
		'privacy' => 'wz-empty',
		'agreement' => 'wz-empty',
		'elementor' => 'wz-empty',
		'amocrm' => 'wz-amocrm',
		'bitrix24' => 'wz-bitrix24',
	);
	$result = array();
	$url = get_permalink(get_the_ID());
	foreach ($crms as $crm_key => $crm_value) {
		if (strpos($url, $crm_key) !== false) {
			array_push($result, $crm_value);
		}
	}
	if (empty($result)) {
		//if (is_front_page()) {
		//	array_push($result, 'wz-whatsapp');
		//	array_push($result, 'wz-crm');
		//} else {
			array_push($result, 'wz-empty');
		//}
	}
	if (is_front_page()) {
		array_push($result, 'wz-main');
	}
	array_push($message, implode('<br />', $result));
	array_push($message, 'url: ' . $url . '^');
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return implode(' ', $result);
}

/*
 * [wz-detect-crm-show condition='wz-business wz-whatsapp' shortcode-id='33915']
 * [wz-detect-crm-show condition='wz-business wz-instagram' shortcode-id='25456']
 */
/*add_shortcode( 'wz-detect-crm-show', 'wz_detect_crm_show_shortcode' );
function wz_detect_crm_show_shortcode($atts) {
	$message = array('<pre>');
	array_push($message, 'wz_detect_crm_show_shortcode');
	$result = '';
	if (array_key_exists('condition', $atts) && array_key_exists('shortcode-id', $atts)) {
		$condition = explode(' ', $atts['condition']);
		array_push($message, 'condition: ' . print_r($condition, true));
		$shortcode_id = $atts['shortcode-id'];
		array_push($message, 'shortcode_id: ' . $shortcode_id);
		$current = explode(' ', wz_detect_crm_shortcode(array()));
		array_push($message, 'current: ' . print_r($current, true));
		$condition_passed = true;
		array_push($message, 'condition_passed: ' . print_r($condition_passed, true));
		foreach ($condition as $condition_item) {
			array_push($message, 'condition_item: ' . $condition_item);
			array_push($message, 'in_array: ' . print_r(in_array($condition_item, $current), true));
			if (!in_array($condition_item, $current)) {
				$condition_passed = false;
			}
		}
		array_push($message, 'condition_passed: ' . print_r($condition_passed, true));
		if ($condition_passed) {
			$result = '[elementor-template id="' . $shortcode_id . '"]';
			array_push($message, 'result1: ' . print_r($result, true));
		} else {
			array_push($message, 'condition not passed');
		}
		array_push($message, 'result2: ' . print_r($result, true));
	}
	array_push($message, '</pre>');
	//if (current_user_can('administrator')){
	//	echo implode('<br />', $message);
	//}
	return $result;
}*/

/*
 * [wz-detect-crm-footer]
 */
add_shortcode( 'wz-detect-crm-footer', 'wz_detect_crm_footer_shortcode' );
function wz_detect_crm_footer_shortcode( $atts ) {
	$message = array('<pre>');
	array_push($message, 'wz_detect_crm_footer_shortcode');
	$crms = array(
		'whatsapp-crm' => 'wz-crm',
		'instagram-crm' => 'wz-crm',
		'telegram-crm' => 'wz-crm',
		'vk-crm' => 'wz-crm',
		'whatsapp-for-' => 'wz-crm',
		'instagram-for-' => 'wz-crm',
		'telegram-for-' => 'wz-crm',
		'vk-for-' => 'wz-crm',
		'whatsapp-business-' => 'wz-crm',
		'instagram-business-' => 'wz-crm',
	);
	$result = array();
	$url = get_permalink(get_the_ID());
	array_push($message, 'url: ' . $url . '^');
	foreach ($crms as $crm_key => $crm_value) {
		array_push($message, 'crm_key: ' . $crm_key . '^');
		if (strpos($url, $crm_key) !== false) {
			array_push($message, 'crm_value: ' . $crm_value . '^');
			array_push($result, $crm_value);
		}
	}
	if (empty($result)) {
		array_push($result, 'wz-default');
	}
	array_push($message, implode('<br />', $result));
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return implode(' ', $result);
}

/*
 * shortcode
 * [wz-bun-coupon-url]
 * https://wazzup24.com/buns/?client=recived
 */
add_shortcode('wz-bun-coupon-url', 'wz_bun_coupon_url_shortcode');
function wz_bun_coupon_url_shortcode($args) {
	$message = array();
	array_push($message, '<pre>');
	array_push($message, 'wz_bun_coupon_url_shortcode');
	array_push($message, '_GET:');
	array_push($message, print_r($_GET, true));
	$url_suffix = '';
	if (array_key_exists('client', $_GET)) {
		if ($_GET['client'] == 'recived') {
			$url_suffix = '?client=recived';
		}
	}
	$url = get_page_link() . $url_suffix;
	array_push($message, 'url: ' . $url);
	array_push($message, '<pre>');
	/*if( current_user_can('administrator') ){
		echo implode('<br />', $message);
	}*/
	return $url;
}

/*
 * shortcode
 * [wz-bun-coupon-class]
 * https://wazzup24.com/buns/?client=recived
 */
add_shortcode('wz-bun-coupon-class', 'wz_bun_coupon_class_shortcode');
function wz_bun_coupon_class_shortcode($args) {
	$message = array();
	array_push($message, '<pre>');
	array_push($message, 'wz_bun_coupon_class_shortcode');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	array_push($message, '_GET:');
	array_push($message, print_r($_GET, true));
	$class = array();
	if (array_key_exists('client', $_GET)) {
		if ($_GET['client'] == 'recived') {
			array_push($class, 'wz-client');
		}
	}
	if (empty($class)) {
		array_push($class, 'wz-no-client');
	}
	$post_id = get_the_ID();
	$meta_coupon = get_post_meta( $post_id, 'wz-bun-card-offer-bonus-code', true);
	if (!empty($meta_coupon) && in_array('wz-client', $class)) {
		array_push($class, 'wz-show');
	} else {
		array_push($class, 'wz-hide');
	}
	array_push($message, 'class: ' . $class);
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return implode(' ', $class);
}

/*
 * Shortcode [wz-metas fields='wz-plan-subscription-rur-1-per-price-1,wz-plan-subscription-rur-6-all-price-1,wz-plan-subscription-rur-1-per-price-1']
 */
add_shortcode('wz-metas', 'wz_metas_shortcode');
function wz_metas_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_metas_shortcode');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$values = array();
	if (array_key_exists('fields', $args)) {
		$fields = explode(',', $args['fields']);
		$post = get_post();
		$post_id = $post->ID;
		array_push($message, 'post_id: ' . $post_id);
		foreach ($fields as $field) {
			array_push($message, 'field: ' . $field);
			$field_value = get_post_meta($post_id , $field, true);
			if (!empty($field_value)) {
				array_push($message, 'field_value: ' . $field_value);
				$classes = array();
				if (strpos($field, 'rur') !== false) {
					array_push($classes, 'wz-rur');
				}
				if (strpos($field, 'eur') !== false) {
					array_push($classes, 'wz-eur');
				}
				if (strpos($field, 'usd') !== false) {
					array_push($classes, 'wz-usd');
				}
				if (strpos($field, 'kzt') !== false) {
					array_push($classes, 'wz-kzt');
				}
				if (strpos($field, '12') === false and strpos($field, '6') === false) {
					array_push($classes, 'wz-1mon');
				}
				if (strpos($field, '6') !== false) {
					array_push($classes, 'wz-6mon');
				}
				if (strpos($field, '12') !== false) {
					array_push($classes, 'wz-12mon');
				}
				array_push($values, '<span class="' . implode(' ', $classes) . '">' . $field_value . '</span>');
			}
		}
	}
	//if (empty($values)) {
	//	array_push($values, '<span class="not-found">not-found</span>');
	//}
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return implode('', $values);
}

/*
 * Shortcode [wz-meta fields='wz-slider-title']
 * [wz-meta fields='wz-slider-title wz-slider-text-above']
 */
add_shortcode('wz-meta', 'wz_meta_shortcode');
function wz_meta_shortcode($args = array()) {
	$message = array('<pre>');
	array_push($message, 'wz_meta_shortcode');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$values = array();
	if (array_key_exists('fields', $args)) {
		$fields = explode(' ', $args['fields']);
		$post = get_post();
		$post_id = $post->ID;
		array_push($message, 'post_id: ' . $post_id);
		foreach ($fields as $field) {
			array_push($message, 'field: ' . $field);
			$field_value = get_post_meta($post_id , $field, true);
			if (!empty($field_value)) {
				array_push($values, '<span class="' . $field . '">' . $field_value . '</span>');
			}
		}
	}
	array_push($message, '<pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return implode('', $values);
}

/*
 * [wz-ym field='wz-plan-subscription-below-button-ym-12-start']
 */
add_shortcode('wz-ym', 'wz_ym_shortcode');
function wz_ym_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_ym_shortcode');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$data_attribute = '';
	if (array_key_exists('field', $args)) {
		$meta_value = '';
		$args_field_value = $args['field'];
		array_push($message, 'args_field_value: ' . $args_field_value);
		$lcg_value = do_shortcode('[lcg-param ' . $args_field_value . ']');
		array_push($message, 'lcg_value: ' . $lcg_value);
		if (!empty($lcg_value) && strpos($lcg_value, '(') === false) {
			$meta_value = $lcg_value;
		}
		if (empty($meta_value)) {
			$meta_key = $args_field_value;
			array_push($message, 'meta_key: ' . $meta_key);
			$post = get_post();
			$post_id = $post->ID;
			array_push($message, 'post_id: ' . $post_id);
			$meta_value = get_post_meta($post_id , $meta_key, true);
			array_push($message, 'meta_value: ' . $meta_value);
		}
		if (!empty($meta_value)) {
			$data_attribute ='data-wz-ym|' . $meta_value;
		}
	}
	array_push($message, 'data_attribute: ' . $data_attribute);
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return $data_attribute;
}

/*
 * [wz-img-by-id meta="wz-slider-img"] Шорткод вывода картинки по метаполю, в котором записан ID картинки
 */
add_shortcode('wz-img-by-id', 'wz_img_by_id_shortcode');
function wz_img_by_id_shortcode($args = null) {
	$output = array();
	$html = 'Параметр meta не указан';
	if (array_key_exists('meta', $args)) {
		$meta_key = $args['meta'];
		array_push($output, 'meta_key: ' . $meta_key);
		$post = get_post();
		$post_id = $post->ID;
		array_push($output, 'post_id: ' . $post_id);
		$img_id = 29237;
		$meta_value = get_post_meta($post_id, $meta_key, true);
		if ($meta_value) {
			$img_id = $meta_value;
		}
		array_push($output, 'img_id: ' . $img_id);
		$img_url = wp_get_attachment_image_url($img_id, 'full');
		array_push($output, 'img_url: ' . $img_url);
		$img_metadata = wp_get_attachment_metadata($img_id);
		$width = $img_metadata['width'];
		array_push($output, 'width: ' . $width);
		$height = $img_metadata['height'];
		array_push($output, 'height: ' . $height);
		if (array_key_exists('url', $args)) {
			$html = '<a href="' . $args['url'] . '"><img src="' . $img_url . '" width="' . $width . '" height="' . $height . '"/></a>';
			if (array_key_exists('blank', $args)) {
				if ($args['blank'] == true) {
					$html = '<a href="' . $args['url'] . '" target="_blank"><img src="' . $img_url . '" width="' . $width . '" height="' . $height . '"/></a>';
				}else{
					$html = '<a href="' . $args['url'] . '"><img src="' . $img_url . '" width="' . $width . '" height="' . $height . '"/></a>';
				}
			}
		} else {
			$html = '<img src="' . $img_url . '" width="' . $width . '" height="' . $height . '" />';
		}
	}
	//return $html . implode('|', $output);
	return $html;
}

/*
 * [wz-wpcf7-js-css] Load the files on pages which contain contact forms
 */
/*add_shortcode( 'wz-wpcf7-js-css', 'wz_wpcf7_js_css' );
function wz_wpcf7_js_css(){
	$message = array('<pre>');
	array_push($message, 'wz_wpcf7_js_css');
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
		wpcf7_enqueue_scripts();
		array_push($message, 'wpcf7_enqueue_scripts');
	}
	if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
		wpcf7_enqueue_styles();
		array_push($message, 'wpcf7_enqueue_styles');
	}
	//do_action( 'wpcf7_enqueue_scripts' );
	//array_push($message, 'wpcf7_enqueue_scripts');
	//do_action( 'wpcf7_enqueue_styles' );
	//array_push($message, 'wpcf7_enqueue_styles');
	array_push($message, '</pre>');
	if( current_user_can('administrator') ){
		echo implode('<br />', $message);
	}
	return '';
}*/

/*
 * [wz-post-id]
 */
add_shortcode( 'wz-post-id', 'wz_post_id' );
function wz_post_id(){
	$result = 0;
	$post = get_post();
	if ($post) {
		$result = $post->ID;
	}
	return $result;
}

/*
 * [wpcf7-enqueue]
 */
add_shortcode( 'wpcf7-enqueue', 'wpcf7_enqueue' );
function wpcf7_enqueue(){
	wpcf7_enqueue_styles();
	wpcf7_enqueue_scripts();
	return '';
}

/*
 * [wz-data-attr-meta attr='simpleab-label-a' meta-key='wz-simpleab-label-a']
 */
add_shortcode('wz-data-attr-meta', 'wz_data_attr_meta_shortcode');
function wz_data_attr_meta_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_data_attr_meta_shortcode');
	array_push($message, 'args:');
	array_push($message, print_r($args, true));
	$output = '';
	$attr = '';
	if (array_key_exists('attr', $args)) {
		$attr = $args['attr'];
	}
	array_push($message, 'attr: ' . $attr);
	$meta_key = '';
	if (array_key_exists('meta-key', $args)) {
		$meta_key = $args['meta-key'];
	}
	array_push($message, 'meta_key: ' . $meta_key);
	if ($attr != '' && $meta_key != '') {
		$post = get_post();
		$post_id = $post->ID;
		array_push($message, 'post_id: ' . $post_id);
		$meta_value = get_post_meta($post_id , $meta_key, true);
		array_push($message, 'meta_value: ' . $meta_value);
		if ($meta_value != '') {
			$output = 'data-' . $attr . '|' . $meta_value;
			array_push($message, print_r($output, true));
		}
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return $output;
}

/*
 * Шорткод:
 * [wz-blog-banner banner-class='wa amo']
 * [wz-blog-banner banner-class='wa bitrix']
 * [wz-blog-banner banner-class='tg amo']
 * [wz-blog-banner banner-class='tg bitrix']
 * В шаблоне используется:
 * [lcg-param banner-class]
 */
add_shortcode('wz-blog-banner', 'wz_blog_banner_shortcode');
function wz_blog_banner_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_blog_banner_shortcode');
	array_push($message, 'args: ' . print_r($args, true));
	$class = 'wa amo';
	if (array_key_exists('banner-class', $args)) {
		$class = $args['banner-class'];
	}
	array_push($message, 'class: ' . $class);
	$shortcode = '[lcg banner-class="' . $class . '"][elementor-template id="32975"][/lcg]';
	array_push($message, 'shortcode: ' . $shortcode);
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return do_shortcode($shortcode);
}

/*
 * Шорткод [wz-cookie-get name="__ref"]
 */
add_shortcode('wz-cookie-get', 'wz_cookie_get_shortcode');
function wz_cookie_get_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_cookie_get_shortcode:');
	$result = '';
	if (array_key_exists('name', $args)) {
		if (array_key_exists($args['name'], $_COOKIE))
		$result = '?' . $args['name']  . '=' . $_COOKIE[$args['name']];
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return $result;
}

/*
 * [wz-lang-domains]
 */
add_shortcode( 'wz-lang-domains', 'wz_lang_domains_shortcode' );
function wz_lang_domains_shortcode( $atts ) {
	$domains = array(
		"wazzup24.com" => "USA (EN)",
		"wazzup24.es" => "América Latina (ES)",
		"wazzup24.eu" => "Europe (EN)",
		"wazzup24.ru" => "Россия (RU)",
		"wazzup24.in" => "भारत (HI)",
		"wazzup-24.kz" => "Казахстан (RU)",
		"wazzup24.com.br" => "Brasil (PT)"
	);
	$current_domain = $_SERVER['HTTP_HOST'];
	$html = "<div class='wz-lang-switcher'><div class='wz-lang-list'>";
	foreach ($domains as $key => $domain) {
		$class = '';
		if ($key == 'wazzup24.in') {
			$class = ' wz-lang-list__item--hi';
		}
		$html .= "<div class='wz-lang-list__item" . $class . "'><a href='" . $_SERVER['HTTP_X_FORWARDED_PROTO'] . "://" . $key . wz_cookie_get_shortcode(array('name' => '__ref')) . "'>" . $domain . "</a></div>";
	}
	$html .= "</div></div>";
	return $html;
}

?>