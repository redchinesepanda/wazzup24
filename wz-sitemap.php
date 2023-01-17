<?php
/*
 * Adding other pages to the sitemap via other plugins
 */
function your_pages() {
	//$generatorObject = &GoogleSitemapGenerator::GetInstance();
	//$gsg = &GoogleSitemapGenerator::GetInstance();
	//$current_language = pll_current_language();
	$current_language = 'ru';
	$domains = array(
		'wazzup24.ru' => 'ru',
		'wazzup-24.kz' => 'ru',
		'wazzup24.com' => 'en',
		'wazzup24.eu' => 'en',
		'wazzup24.es' => 'es',
		'wazzup24.com.br' => 'pt',
		'wazzup24.in' => 'hi',
	);
	if (array_key_exists($_SERVER['HTTP_HOST'], $domains)) {
		$current_language = $domains[$_SERVER['HTTP_HOST']];
	}
	$gsg = GoogleSitemapGenerator::get_instance();
	if ( $gsg->old_file_exists() ) {
		$gsg->delete_old_files();
	}
	//if($gsg != null) {
	//$gsg->add_url("https://dev-wazzup24.com/instagram-business-cubics-es/",time(),"daily",0.5);
	//}
	/*$args = array(
	'post_type' => 'recipe_cpt',
	'tax_query' => array(
		array(
		'taxonomy' => 'recipe_tx',
		'field' => 'term_id',
		'terms' => 37
		 )
	  )
	);*/
	$args = array (
		'posts_per_page' => -1,
		'post_type' => array('post','page'),
		'post_status' => 'publish',
		//'meta_key' => 'lang',
		'orderby' => array('post_type' => 'ASC', 'ID' => 'DESC'),
		'tax_query' => array(
			array(
				'taxonomy' => 'language',
				//'field' => 'term_id',
				'field' => 'slug',
				//'terms' => 290
				'terms' => $current_language
			)
		)
	);
	$posts = get_posts( $args );
	$homepage_id = get_option('page_on_front');
	foreach ($posts as $post) {
		$priority = 0.2;
		$change_frequency = 'monthly';
		if ($post->ID == $homepage_id) {
			$priority = 0.8;
			$change_frequency = 'weekly';
		}
		if ($post->post_type == 'page' && $post->ID != $homepage_id) {
			$priority = 0.6;
			$change_frequency = 'weekly';
		}
		if ($post->post_type == 'post') {
			$priority = 0.4;
			$change_frequency = 'daily';
		}
		//$gsg->add_url(get_permalink($post->ID) . '?homepage_id=' . $homepage_id . '&post_id=' . $post->ID,time(),$change_frequency,$priority);
		//$gsg->add_url(get_permalink($post->ID) . '?current_language=' . $current_language,time(),$change_frequency,$priority);
		$gsg->add_url(get_permalink($post->ID),time(),$change_frequency,$priority);
	}
}
add_action("sm_buildmap", "your_pages");
?>