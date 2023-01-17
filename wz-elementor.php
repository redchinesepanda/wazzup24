<?php
/*
 * Custom image dynamic tag
 */
add_action( 'elementor/dynamic_tags/register_tags', function( $dynamic_tags ) {
	class Custom_Image_Tag extends Elementor\Core\DynamicTags\Data_Tag {
		public function get_name() {
			return 'my-custom-image';
		}
		public function get_categories() {
			return [ 'image' ];
		}
		public function get_group() {
			return [ 'site' ];
		}
		public function get_title() {
			return 'My Custom Image';
		}
		protected function register_controls() {
			$this->add_control(
				'custom_key',
				[
					'label' => __( 'Custom Key', 'elementor-pro' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => 'key',
				]
			);
		}
		protected function get_value( array $options = [] ) {
			$message = array('<pre>');
			array_push($message, 'Custom_Image_Tag get_value');
			//$image_id = 15872;
			$image_id = 26772;
			//$image_url = 'https://wazzup24.com/wp-content/uploads/2021/04/logo-placeholder.svg';
			$image_url = 'https://wazzup24.com/wp-content/uploads/2021/12/wz-placeholder.svg';
			$image_array = [
				'id' => $image_id, // attachment id
				'url' => $image_url, // attacment URL
			];
			array_push($message, 'Custom_Image_Tag image_array: ' . print_r($image_array, true));
			$key = $this->get_settings( 'custom_key' );
			if (!empty($key)) {
				array_push($message, 'Custom_Image_Tag key: ' . $key);
				$shortcode_id = do_shortcode('[lcg-param ' . $key .']');
				array_push($message, 'Custom_Image_Tag shortcode_id: ' . print_r($shortcode_id, true));
				//if (is_numeric($shortcode_id)) {
				if (strpos($shortcode_id, $key) === false) {
					$image_id = $shortcode_id;
				} else {
					$post = get_post();
					$image_id = get_post_meta($post->ID, $key, true);
				}
				$image_url = wp_get_attachment_url($image_id);
				if ($image_url !== false) {
					$image_array['id'] = $image_id;
					$image_array['url'] = $image_url;
				}
				$image_lang = pll_current_language('slug');
				array_push($message, 'add_attributes_to_elements image_lang: ' . $image_lang);
				$image_id_lang = get_post_meta($image_array['id'], 'wz-image-translate-' . $image_lang, true);
				array_push($message, 'add_attributes_to_elements image_id_lang: ' . $image_id_lang);
				array_push($message, 'add_attributes_to_elements image_id_lang not found');
				if ($image_id_lang) {
					array_push($message, 'add_attributes_to_elements image_id_lang found');
					$image_array['id'] = $image_id_lang;
					$image_array['url'] = wp_get_attachment_url($image_id_lang);
				}
			}
			array_push($message, 'Custom_Image_Tag image_array: ' . print_r($image_array, true));
			array_push($message, '</pre>');
			//if( current_user_can('administrator') ){
			//	echo implode('<br />', $message);
			//}
			return $image_array;
		}
	}
	$dynamic_tags->register_tag( 'Custom_Image_Tag' );
});

/*
 * Elementor Custom Query Filter for wz-blog-article in blog archive section
 */
add_action( 'elementor/query/wz-blog-article', function( $query ) {
	$message = array();
	array_push($message, '<pre style="white-space: pre;">');
	array_push($message, 'elementor/query/wz-blog-article');
	$category_translation = pll_get_term(100);
	array_push($message, 'category_translation: ' . $category_translation);
	$current_language = pll_current_language();
	array_push($message, 'current_language: ' . $current_language);
	$query->set('category__in', $category_translation);
	array_push($message, 'query: ' . print_r($query,true));
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
});

/*
 * Elementor Custom Query Filter for wz-blog-case in blog archive section
 */
add_action( 'elementor/query/wz-blog-case', function( $query ) {
	$message = array();
	array_push($message, '<pre style="white-space: pre;">');
	array_push($message, 'elementor/query/wz-blog-case');
	$term = pll_get_term(304);
	$category_translation = $term ? $term : 304;
	array_push($message, 'category_translation: ' . $category_translation);
	$current_language = pll_current_language();
	array_push($message, 'current_language: ' . $current_language);
	$query->set('category__in', $category_translation);
	array_push($message, 'query: ' . print_r($query,true));
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
});

/*
 * Elementor Custom Query Filter for wz-blog-changelog in blog archive section
 */
add_action( 'elementor/query/wz-blog-changelog', function( $query ) {
	$message = array();
	array_push($message, '<pre style="white-space: pre;">');
	array_push($message, 'elementor/query/wz-blog-changelog');
	$category_translation = pll_get_term(96);
	array_push($message, 'category_translation: ' . $category_translation);
	$current_language = pll_current_language();
	array_push($message, 'current_language: ' . $current_language);
	$query->set('category__in', $category_translation);
	array_push($message, 'query: ' . print_r($query,true));
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
});

/*
 * Elementor Custom Query Filter for wz-posts-by-tag
 */
add_action( 'elementor/query/wz-posts-by-tag', function( $query ) {
	$message = array();
	array_push($message, '<pre style="white-space: pre;">');
	array_push($message, 'elementor/query/wz-posts-by-tag');
	$post = get_post();
	array_push($message, 'post->ID: ' . print_r($post->ID, true));
	if ($post !== null) {
		$tags = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' )  );
		array_push($message, 'tags: ' . print_r($tags, true));
		if (!empty($tags)) {
			$query->set('tag__in', $tags);
			$query->set('category__not_in', array());
		}
	}
	array_push($message, 'query: ' . print_r($query, true));
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
});

?>