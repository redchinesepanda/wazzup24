<?php
/*
 * Изменить html содержимое шаблона
 */
add_filter( 'wpcf7_form_tag', 'filter_function_name_9275', 10, 2 );
function filter_function_name_9275( $scanned_tag, $replace ){
	$message = array('<pre>');
	array_push($message, 'filter_function_name_9275');
	//array_push($message, '$scanned_tag: ' . print_r($scanned_tag, true));
	$fields_search = array(
		'raw_values',
		'values',
		'before',
		'after',
		'labels',
	);
	//array_push($message, '$fields_search: ' . print_r($fields_search, true));
	$fields = array_keys($scanned_tag);
	//array_push($message, '$fields: ' . print_r($fields, true));
	foreach ($fields as $field) {
		if (in_array($field, $fields_search)) {
			array_push($message, '$field: ' . $field);
			$modify = $scanned_tag[$field];
			array_walk($modify, function(&$value, $key) {
				$value = __($value, 'astra');
			});
			array_push($message, '$modify: ' . print_r($modify, true));
			$scanned_tag[$field] = $modify;
		}
		//array_push($message, '$scanned_tag[$field]: ' . $scanned_tag[$field]);
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return $scanned_tag;
}

add_action( 'elementor/frontend/widget/before_render', 'add_attributes_to_elements' );
//add_action( 'elementor/frontend/widget/after_render', 'add_attributes_to_elements' );
function add_attributes_to_elements( $element ) {
	$message = array('<pre>');
	array_push($message, 'add_attributes_to_elements');
	if ($element instanceof Elementor\Widget_Image) {
		//array_push($message, 'add_attributes_to_elements element: ' . print_r($element, true));
		$settings = $element->get_settings();
		//array_push($message, 'add_attributes_to_elements settings: ' . print_r($settings, true));
		//$image = $settings['image'];
		$image = $element->get_settings('image');
		array_push($message, 'add_attributes_to_elements image: ' . print_r($image, true));
		//$image_id = $settings['image']['id'];
		//array_push($message, 'add_attributes_to_elements image_id: ' . $image_id);
		$image_lang = pll_current_language('slug');
		array_push($message, 'add_attributes_to_elements image_lang: ' . $image_lang);
		$image_id_lang = get_post_meta($image['id'], 'wz-image-translate-' . $image_lang, true);
		array_push($message, 'add_attributes_to_elements image_id_lang: ' . $image_id_lang);
		array_push($message, 'add_attributes_to_elements image_id_lang not found');
		if ($image_id_lang) {
			array_push($message, 'add_attributes_to_elements image_id_lang found');
			$image['id'] = $image_id_lang;
			$image['url'] = wp_get_attachment_url($image_id_lang);
			$element->set_settings('image', $image);
		}
		$image = $element->get_settings('image');
		array_push($message, 'add_attributes_to_elements image: ' . print_r($image, true));
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
}

/*
 * [wz-url-lang url='/privacy-policy/']
 */
function wz_url_lang_shortcode( $atts ) {
	$messages = array('<pre>');
	array_push($messages, 'wz_url_lang_shortcode');
	array_push($messages, 'atts: ' . print_r($atts, true));
	$url = '';
	$external = false;
	if (array_key_exists('external', $atts)) {
		$url_prefix = $atts['external'];
		$current_language = pll_current_language();
		/* hi temp start */
		if ($current_language == 'hi') {
			$current_language = 'en';
		}
		/* hi temp end */
		array_push($messages, 'current_language: ' . $current_language);
		if (array_key_exists('url', $atts)) {
			$url_suffix = $atts['url'];
			$url_suffix_array = explode('/', $url_suffix);
			foreach($url_suffix_array as $key => $value) {
				if (!empty($value)) {
					$url_suffix_array[$key] = $value . '-' . $current_language;
				}
			}
			$url_suffix = implode('/', $url_suffix_array);
			$url = $url_prefix . $current_language . $url_suffix;
			$external = true;
		}
	}
	if (array_key_exists('url', $atts) && !$external) {
		$url = $atts['url'];
		$current_language = pll_current_language();
		/* hi temp start */
		if ($current_language == 'hi') {
			$current_language = 'en';
		}
		/* hi temp end */
		array_push($messages, 'current_language: ' . $current_language);
		if ($current_language != 'ru') {
			if( $url == '/' ) {
			   $front_page_url = pll_home_url($current_language);
			   array_push($messages, 'front_page_url: ' . $front_page_url);
			   $url = $front_page_url;
			} else {
				$url_parts = explode('/', $url);
				array_push($messages, 'url_parts: ' . print_r($url_parts, true));
				$url_last_index = count($url_parts) - 2;
				array_push($messages, 'url_last_index: ' . $url_last_index);
				$url_parts[$url_last_index] = $url_parts[$url_last_index] . '-' . $current_language;
				$url_prefix_index = count($url_parts) - 3;
				array_push($messages, 'url_prefix_index: ' . $url_prefix_index);
				$url_parts[$url_prefix_index] = '/' . $current_language;
				$url = implode('/', $url_parts);
			}
		}
	}
	array_push($messages, 'url: ' . $url);
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
    return $url;
}
add_shortcode( 'wz-url-lang', 'wz_url_lang_shortcode' );

/*
 * [wz-translate text='User agreement']
 */
function wz_translate_shortcode( $atts ) {
	$messages = array('<pre>');
	array_push($messages, 'wz_translate_shortcode');
	array_push($messages, 'atts: ' . print_r($atts, true));
	$text = '';
	if (array_key_exists('text', $atts)) {
		$text = $atts['text'];
		$text = __($text, 'astra');
	}
	array_push($messages, 'text: ' . $text);
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
    return $text;
}
add_shortcode( 'wz-translate', 'wz_translate_shortcode' );

/*
 * [wz-current-lang] shows pll_current_language
 */
function wz_current_lang_shortcode( $atts = array() ) {
	$output = pll_current_language();
	return $output;
}
add_shortcode( 'wz-current-lang', 'wz_current_lang_shortcode' );

/*
 * [wz-detect-crm-show condition='wz-business wz-whatsapp' shortcode-id='33915']
 * [wz-detect-crm-show condition='wz-business wz-instagram' shortcode-id='25456']
 * [wz-detect-crm-show condition='wz-business wz-instagram wz-ru' shortcode-id='25456']
 * [wz-detect-crm-show exclude='wz-business' shortcode-id='25456']
 */
add_shortcode( 'wz-detect-crm-show', 'wz_detect_crm_show_shortcode' );
function wz_detect_crm_show_shortcode($atts, $content) {
	$message = array('<pre>');
	array_push($message, 'wz_detect_crm_show_shortcode');
    array_push($message, 'atts: ' . print_r($atts, true));
	$result = '';
    $shortcode_id = 0;
	if (array_key_exists('shortcode-id', $atts)) {
		$shortcode_id = $atts['shortcode-id'];
		array_push($message, 'shortcode_id: ' . $shortcode_id);
    }
    $current = explode(' ', wz_detect_crm_shortcode(array()));
    $current_lang = wz_current_lang_shortcode();
    array_push($current, 'wz-' . $current_lang);
    array_push($message, 'current: ' . print_r($current, true));
    $condition_passed = true;
    if (array_key_exists('condition', $atts)) {
        $condition = explode(' ', $atts['condition']);
        array_push($message, 'condition: ' . print_r($condition, true));
        array_push($message, 'condition_passed: ' . ($condition_passed ? 'true' : 'false'));
        foreach ($condition as $condition_item) {
            array_push($message, 'condition_item: ' . $condition_item);
            array_push($message, 'in_array: ' . (in_array($condition_item, $current) ? 'true' : 'false'));
            if (!in_array($condition_item, $current)) {
                $condition_passed = false;
            }
        }
    }
    array_push($message, 'condition_passed: ' . ($condition_passed ? 'true' : 'false'));
    $exclude_passed = true;
    array_push($message, 'exclude_passed: ' . ($exclude_passed ? 'true' : 'false'));
    if (array_key_exists('exclude', $atts)) {
        $exclude = explode(' ', $atts['exclude']);
        array_push($message, 'exclude: ' . print_r($exclude, true));
        foreach ($exclude as $exclude_item) {
            array_push($message, 'exclude_item: ' . $exclude_item);
            array_push($message, 'in_array: ' . (in_array($exclude_item, $current) ? 'true' : 'false'));
            if (in_array($exclude_item, $current)) {
                $exclude_passed = false;
            }
        }
    }
    array_push($message, 'exclude_passed: ' . ($exclude_passed ? 'true' : 'false'));
    if ($condition_passed && $exclude_passed) {
        if ($shortcode_id != 0) {
            $result = '[elementor-template id="' . $shortcode_id . '"]';
        }
        if (!empty($content)) {
            $result = $content;
        }
        //array_push($message, 'result: ' . print_r($result, true));
    } else {
        array_push($message, 'condition not passed');
    }
	array_push($message, '</pre>');
	//if (current_user_can('administrator')){
	//	echo implode('<br />', $message);
    //}
	return $result;
}

/*
 * [wz-detect-crm-content condition='wz-business wz-whatsapp' shortcode-id='33915']
 * [wz-detect-crm-content condition='wz-business wz-instagram' shortcode-id='25456']
 * [wz-detect-crm-content condition='wz-business wz-instagram wz-ru' shortcode-id='25456']
 * [wz-detect-crm-content exclude='wz-business' shortcode-id='25456']
 */
add_shortcode( 'wz-detect-crm-content', 'wz_detect_crm_content_shortcode' );
function wz_detect_crm_content_shortcode($atts, $content = '' ) {
	$message = array('<pre>');
	array_push($message, 'wz_detect_crm_content_shortcode');
	$result = '';
    $shortcode_id = 0;
	if (array_key_exists('shortcode-id', $atts)) {
		$shortcode_id = $atts['shortcode-id'];
		array_push($message, 'shortcode_id: ' . $shortcode_id);
    }
    $display = '';
	if (!empty($content)) {
		$display = $content;
		array_push($message, 'content: ' . $content);
    }
    $current = explode(' ', wz_detect_crm_shortcode(array()));
    $current_lang = wz_current_lang_shortcode();
    array_push($current, 'wz-' . $current_lang);
    array_push($message, 'current: ' . print_r($current, true));
    $condition_passed = true;
    if (array_key_exists('condition', $atts) && array_key_exists('shortcode-id', $atts)) {
        $condition = explode(' ', $atts['condition']);
        array_push($message, 'condition: ' . print_r($condition, true));
        array_push($message, 'condition_passed: ' . ($condition_passed ? 'true' : 'false'));
        foreach ($condition as $condition_item) {
            array_push($message, 'condition_item: ' . $condition_item);
            array_push($message, 'in_array: ' . (in_array($condition_item, $current) ? 'true' : 'false'));
            if (!in_array($condition_item, $current)) {
                $condition_passed = false;
            }
        }
    }
    array_push($message, 'condition_passed: ' . ($condition_passed ? 'true' : 'false'));
    $exclude_passed = true;
    array_push($message, 'exclude_passed: ' . ($exclude_passed ? 'true' : 'false'));
    if (array_key_exists('exclude', $atts)) {
        $exclude = explode(' ', $atts['exclude']);
        array_push($message, 'exclude: ' . print_r($exclude, true));
        foreach ($exclude as $exclude_item) {
            array_push($message, 'exclude_item: ' . $exclude_item);
            array_push($message, 'in_array: ' . (in_array($exclude_item, $current) ? 'true' : 'false'));
            if (in_array($exclude_item, $current)) {
                $exclude_passed = false;
            }
        }
    }
    array_push($message, 'exclude_passed: ' . ($exclude_passed ? 'true' : 'false'));
    if ($condition_passed && $exclude_passed) {
        if ($shortcode_id != 0) {
            $result = '[elementor-template id="' . $shortcode_id . '"]';
        }
        if ($display != '') {
            $result = $display;
        }
    } else {
        array_push($message, 'condition not passed');
    }
	array_push($message, '</pre>');
	//if (current_user_can('administrator')){
	//	echo implode('<br />', $message);
	//}
	return $result;
}

/*function wz_detect_crm_show_shortcode($atts) {
	$message = array('<pre>');
	array_push($message, 'wz_detect_crm_show_shortcode');
	$result = '';
	if (array_key_exists('condition', $atts) && array_key_exists('shortcode-id', $atts)) {
		$condition = explode(' ', $atts['condition']);
		array_push($message, 'condition: ' . print_r($condition, true));
		$shortcode_id = $atts['shortcode-id'];
		array_push($message, 'shortcode_id: ' . $shortcode_id);
		$current = explode(' ', wz_detect_crm_shortcode(array()));
		$current_lang = wz_current_lang_shortcode();
		array_push($current, 'wz-' . $current_lang);
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
 * [wz-translate-options en='https://t.me/WazzupSupportbot' ru='https://t.me/wazzup_support_bot']
 */
function wz_translate_options_shortcode( $atts ) {
	$messages = array('<pre>');
	array_push($messages, 'wz_translate_options_shortcode');
	array_push($messages, 'atts: ' . print_r($atts, true));
	$output = '';
	if (array_key_exists('en', $atts)) {
		$output = $atts['en'];
	}
	$current_language = pll_current_language();
	if (array_key_exists($current_language, $atts)) {
		$output = $atts[$current_language];
	}
	array_push($messages, 'output: ' . $output);
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
    return $output;
}
add_shortcode( 'wz-translate-options', 'wz_translate_options_shortcode' );

?>