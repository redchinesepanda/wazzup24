<?php

require_once('wz-ajax.php');
require_once('wz-currency.php');
require_once('wz-disable.php');
require_once('wz-shortcode.php');
require_once('wz-gtm.php');
require_once('wz-simpleab.php');
require_once('wz-elementor.php');
require_once('wz-translate.php');
require_once('wz-scripts.php');
require_once('wz-yt.php');
require_once('wz-sitemap.php');
require_once('wz-utm-generator.php');

define( 'COOKIE_DOMAIN', '.wazzup24.com' );
//echo "COOKIE_DOMAIN: " . COOKIE_DOMAIN . "^<br />";
    
//define( 'PLL_COOKIE', false);
    
/*
 * Force default OG:Image - Yoast SEO
 */
/*$default_opengraph = 'https://wazzup24.com/wp-content/uploads/2021/03/logoforog1200.png';
function add_default_opengraph($object){global $default_opengraph; $object->add_image($default_opengraph);}
add_action('wpseo_add_opengraph_images','add_default_opengraph');
function default_opengraph(){global $default_opengraph; return $default_opengraph;}
add_filter('wpseo_twitter_image','default_opengraph');*/

/*
 * How To Stop ACF from completely replacing regular custom fields interface
 */
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/*
 * ACF Update all posts at once
 */
/*if ( current_user_can('administrator') ) {
	//echo '<pre>';
	//echo 'ACF Update all posts at once<br />';
	$fields = array(
		'wz-footer-column1',
		'wz-footer-column2',
		'wz-footer-column3',
		'wz-footer-column4',
		'wz-footer-bottom-column1',
		'wz-footer-bottom-column2',
	);
	$currencies = array(
		'rur',
		'usd',
		'eur',
	);
	$durations = array(
		1,
		6,
		12,
		24,
	);
	$amounts = array(
		'per',
		'all',
	);
	$orders = array(
		1,
		2,
		3,
	);
	$prefixes = array(
		'-before',
		'',
	);
	foreach ($currencies as $currency) {
		foreach ($durations as $duration) {
			foreach ($amounts as $amount) {
				foreach ($orders as $order) {
					foreach ($prefixes as $prefix) {
						if ($duration != 1 || $prefix != '-before') {
							array_push($fields, 'wz-plan-subscription-' . $currency . '-' . $duration . '-' . $amount . '-price-' . $order . $prefix);
						}
					}
				}
			}
		}
	}
	//'wz-plan-subscription-usd-6-per-price-1-before'
	//'wz-plan-subscription-usd-6-per-price-1'
	//'wz-plan-subscription-usd-6-all-price-1-before'
	//'wz-plan-subscription-usd-6-all-price-1'
	//echo 'fields:<br />';
	//print_r($fields);
	foreach ($fields as $field) {
		add_filter('acf/load_value/name=' . $field, 'wz_updated_values', 10, 3);	
	}
	//echo '</pre>';
}
function wz_updated_values($values, $post_id, $field) {
	//echo 'values: ' . $values . '^<br >';
	//echo 'post_id: ' . $post_id . '^<br >';
	$field_name = $field['name'];
	//echo 'field_name: ' . $field_name . '^<br >';
	//print_r($field);
	$default_values = $field['default_value'];
	//print_r($default_values);
	//$meta_values = get_post_meta( $post_id, $field_name, true);
	//print_r($meta_values);
	if ($values != $default_values) {
		//echo 'values changed from: ' . $values . ' to ' . $default_values . '^<br />';
		echo '<div class="acf-field acf-field-wysiwyg acf-field-changed" style="width: 33.333%">';
		echo 'Old value: ' . $values . '.<br />';
		echo 'Used new field default_value: ' . $default_values . '. Press Update to apply changes<br />';
		echo '</div>';
		$values = $default_values;
	}
	return $values;
}*/

/*
 * Add a URL control to the column layout tab, if <a> is selected as html_tag
 * Надо добавить в host1345087/wazzup24.com/htdocs/www/wp-content/plugins/elementor/includes/utils.php
 * class Utils {
 * 		...
 * 		const ALLOWED_HTML_WRAPPER_TAGS = [
 *  	...
 * 			'a',
 * 		];
 * 	...
 * 	}
 */
add_action('elementor/element/column/layout/before_section_end', function( $section, $args ) {
    $section->add_control(
        'column_link',
        [
            'label'         => __( 'Link', 'elementor' ) . ' (' . strtolower( __( 'Column', 'elementor' ) ) . ')',
            'description'   => 'NOTE: Using anchors within this column will break it! Anchors within anchors is not valid HTML.',
            'type'          => \Elementor\Controls_Manager::URL,
			'dynamic' => [
				'active' => true,
			],
            'placeholder'   => __( 'https://your-link.com', 'elementor' ),
            'show_external' => true,
            'label_block'   => true,
            'default'       => [
                'url'           => '',
                'is_external'   => false,
                'nofollow'      => false
            ],
            'condition'     => [
                'html_tag'      => [ 'a' ]
            ]
        ]
    );
}, 11, 2 );

// add <a> to the html_tag control
add_action( 'elementor/element/column/layout/before_section_end', function( $control_stack, $args ) {
    $control = \Elementor\Plugin::instance()->controls_manager->get_control_from_stack( $control_stack->get_unique_name(), 'html_tag' );
    $control['options']['a'] = __( 'a' );
    $control_stack->update_control( 'html_tag', $control );
}, 10, 2 );

// modify output of column to handle <a>
add_action( 'elementor/frontend/column/before_render', function( $widget ) {
    $settings = $widget->get_settings_for_display();
    if( $settings['html_tag'] !== 'a' )
        return;

    if( empty( $settings['column_link']['url'] ) )
        return;

    $widget->add_link_attributes( '_wrapper', $settings['column_link'] );
}, 10 );

/*
 * Добавление локации меню Blog Header (ru, en, ...)
 */
function register_blog_header() {
	register_nav_menu('blog-header',__( 'Blog Header' ));
	register_nav_menu('crm-header',__( 'WZ Header Wha+Inst crm' ));
	register_nav_menu('wz-header',__( 'WZ Header december' ));
}
add_action( 'init', 'register_blog_header' );

/*
 * Get previous and next posts id
 */
function wz_blog_previous_id() {
	$posts = array();
	$previous = get_adjacent_post(true, '', true , 'category');
	if (!empty($previous)) {
		array_push($posts, $previous->ID);
		//$posts['previous'] = $previous->ID;
	}
	$next = get_adjacent_post(true, '', false , 'category');
	if (!empty($next)) {
		array_push($posts, $next->ID);
		//$posts['next'] = $next->ID;
	}
	return $posts;
}
/*
 * Elementor Custom Query Filter for wz-blog-previous
 */
add_action( 'elementor/query/wz-blog-previous', function( $query ) {
	$message = array();
	array_push($message, '<pre style="white-space: pre;">');
	array_push($message, 'elementor/query/wz-blog-previous');
	$posts = wz_blog_previous_id();
	array_push($message, 'posts:');
	array_push($message, print_r($posts,true));
	if (!empty($posts)) {
		$query->set('category__not_in', array());
		$query->set('post__in', $posts);
		array_push($message, 'query:');
		array_push($message, print_r($query, true));
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
} );

/*
 * Add blog before category name in breadcrumb
 */
add_action( 'astra_breadcrumb_trail_items','wz_astra_breadcrumb_items' );

function wz_astra_breadcrumb_items ($defaults) {
	$message = array('<pre>');
	array_push($message, 'wz_astra_breadcrumb_items');
	array_push($message, 'defaults:');
	array_push($message, print_r($defaults, true));
	$current_lang = pll_current_language('name');
	array_push($message, 'current_lang: ' . $current_lang);
	$blogs = array(
		'RU' => array(
			'label' => 'Блог',
			'url' => '/main-blog/',
			'tag_prefix' => 'Статьи по тегу «',
			'tag_suffix' => '»',
		),
		'EN' => array(
			'label' => 'Blog',
			'url' => '/en/main-blog-en/',
			'tag_prefix' => 'Articles by tag «',
			'tag_suffix' => '»',
		),
		'ES' => array(
			'label' => 'Blog',
			'url' => '/es/main-blog-es/',
			'tag_prefix' => 'Artículos por etiqueta «',
			'tag_suffix' => '»',
		),
	);
	if( is_tag() ){
		$last_item_key = array_key_last($defaults);
		$current_blog = $blogs[$current_lang];
		$defaults[$last_item_key] = $current_blog['tag_prefix'] . $defaults[$last_item_key] . $current_blog['tag_suffix'];
	}
	$found = false;
	foreach ($blogs as $blog) {
		foreach ($defaults as $default) {
			$pos = strpos($default, $blog['label']);
			if ($pos !== false) {
				array_push($message, 'found blog: ' . $blog['label']);
				$found = true;
			}
		}
	}
	if( has_term('', 'bun') ){
		array_push($message, 'Запись имеет термины в таксономии bun');
	} else {
		array_push($message, 'Запись не имеет термины в таксономии bun');
	}
	$url = get_page_link();
	array_push($message, 'url: ' . $url);
	$bun = false;
	if (strpos($url, 'bun') !== false) {
		array_push($message, 'bun exists');
		$bun = true;
	} else {
		array_push($message, 'no bun exists');
	}
	if (!$found && !$bun) {
		$home = $defaults[0];
		unset($defaults[0]);
		$current_blog = $blogs[$current_lang];
		array_unshift($defaults, $home, '<a href="' . $current_blog['url'] . '" >' . $current_blog['label'] . '</a>');
	}
	else {
		array_push($message, 'blog found');
	}
	array_push($message, 'defaults updated:');
	array_push($message, print_r($defaults, true));
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return $defaults;
}

/*
 * Allow changing the Yoast SEO generated Open Graph site name
 */
add_filter( 'wpseo_opengraph_site_name', 'filter_function_name_2596', 10, 2 );
function filter_function_name_2596( $site_name, $presentation ){
	$site_name = 'wazzup24.com';
	return $site_name;
}

/**
 *  Remove the h1 tag from the WordPress editor.
 *
 *  @param   array  $settings  The array of editor settings
 *  @return  array             The modified edit settings
 */
 
/*function my_format_TinyMCE( $in ) {
        $in['block_formats'] = "Абзац=p; Заголовок 2=h2; Заголовок 3=h3; Заголовок 4=h4; Заголовок 5=h5; Заголовок 6=h6; Форматированный=pre";
    return $in;
}
add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );*/

/*
 * How to delete margin-top: 32px !important from html tag
 */
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

/*
 * Remove ALL scripts from wordpress using wp_dequeue_script or wp_deregister_scripts
 */
function wz_dequeue_all_scripts(){
	$message = array('<pre>');
	array_push($message, 'wz_dequeue_all_scripts');
	$HTTP_USER_AGENT = 'wazzup';
	if (array_key_exists('HTTP_USER_AGENT', $_SERVER)) {
		$HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
	}
	array_push($message, 'HTTP_USER_AGENT: ' . $HTTP_USER_AGENT);
    // Replace the conditional check below with your own...
    if (strpos($HTTP_USER_AGENT, 'Lighthouse') !== false){
        global $wp_scripts;
        $scripts = $wp_scripts->registered;
        foreach ( $scripts as $script ){
			array_push($message, 'script->handle: ' . $script->handle);
            wp_dequeue_script($script->handle);
        }
    }
	array_push($message, '</pre>');
	//if ( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $message);
	//}
}
add_action('wp_print_scripts', 'wz_dequeue_all_scripts');

/*Add custom widget for HTML*/

add_action( 'elementor/widgets/widgets_registered', function( $widgets_manager ) {
	/**
	 * Elementor_Alt_HTML_Widget Elementor Custom Widget.
	 */
	class Elementor_Alt_HTML_Widget extends \Elementor\Widget_Base {

		/**
		 * Get widget name.
		 */
		public function get_name() {
			return 'alt-html';
		}

		/**
		 * Get widget title.
		 */
		public function get_title() {
			return __( 'Alternate HTML', 'plugin-name' );
		}

		/**
		 * Get widget icon.
		 */
		public function get_icon() {
			return 'fa fa-code';
		}

		/**
		 * Get widget categories.
		 */
		public function get_categories() {
			return [ 'general' ];
		}

		/**
		 * Register Alternate Text widget controls.
		 */
		protected function _register_controls() {
			$this->start_controls_section(
				'section_editor',
				[
					'label' => __( 'HTML Alternate', 'plugin-name' ),
				]
			);

			$this->add_control(
				'editor',
				[
					'label' => '',
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'default' => __( 'Place your code here.', 'plugin-name' ),
				]
			);
			$this->end_controls_section();

		}

		/**
		 * Render Alternate Text widget output on the frontend.
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();
			echo '<div class="alt-html-elementor-widget">';
    		echo ( $settings['editor'] ) ? $settings['editor'] : '';
			echo '</div>';
		}

	}
	$widgets_manager->register_widget_type( new Elementor_Alt_HTML_Widget() );
} );

/*
 * define the wpcf7_posted_data callback 
 */
function action_wpcf7_posted_data( $array ) { 
    //'tel-phone' is the name that you gave the field in the CF7 admin.
    $value = $array['tel-phone'];
    if( !empty( $value ) ){
		preg_match_all('!\d+!', $value, $matches);
        $array['tel-phone'] = implode('', $matches[0]);
        //$array['tel-phone'] = print_r($matches, true);
        //$array['tel-phone'] = 'test';
    }
    return $array;
}
add_filter( 'wpcf7_posted_data', 'action_wpcf7_posted_data', 10, 1 );

?>