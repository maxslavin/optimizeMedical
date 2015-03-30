<?php
/************* Home slider custom post type ************************/
	$current_options = get_option('hc_pro_options');
	$slug_slide = $current_options['hc_slider_slug'];
	$slug_service = $current_options['hc_service_slug'];
	$slug_portfolio = $current_options['hc_portfolio_slug'];
	$slug_team = $current_options['hc_team_slug'];
	$slug_testimonial = $current_options['hc_testimonial_slug'];
		
function healthcenter_slider() {
	register_post_type( 'healthcenter_slider',
		array(
			'labels' => array(
			'name' => 'Featured Slider',
			//'singular_name' => 'Featured Services',
			'add_new' => __('Add New Slide', 'health'),
			'add_new_item' => __('Add New Slider','health'),
			'edit_item' => __('Add New Slide','health'),
			'new_item' => __('New Link','health'),
			'all_items' => __('All Featured Sliders','health'),
			'view_item' => __('View Link','health'),
			'search_items' => __('Search Links','health'),
			'not_found' =>  __('No Links found','health'),
			'not_found_in_trash' => __('No Links found in Trash','health'), 
			),
		'supports' => array('title','thumbnail'),
		'show_in' => true,
		//'show_in_nav_menus' => false,
		//'rewrite' => array('slug' => $GLOBALS['slug_slide']),
		'public' => true,
		'menu_position' =>20,
		'public' => true,
		'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/slides.png',
		)
	);
}
add_action( 'init', 'healthcenter_slider' );

/************* Home Service custom post type ***********************/	
function healthcenter_service_type()
{	register_post_type( 'healthcenter_service',
		array(
			'labels' => array(
			'name' => 'Service',
			//'singular_name' => 'Featured Services',
			'add_new' => __('Add New service', 'health'),
			'add_new_item' => __('Add New Service','health'),
			'edit_item' => __('Add New service','health'),
			'new_item' => __('New Link','health'),
			'all_items' => __('All Services','health'),
			'view_item' => __('View Link','health'),
			'search_items' => __('Search Links','health'),
			'not_found' =>  __('No Links found','health'),
			'not_found_in_trash' => __('No Links found in Trash','health'), 
			),
		'supports' => array('title','editor','thumbnail'),
		'show_in' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array('slug' => $GLOBALS['slug_service']),
		'public' => true,
		'menu_position' =>20,
		'public' => true,
		'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/option-icon-general.png',
		)
	);
}
add_action( 'init', 'healthcenter_service_type' );

/*Testimonial*/
function health_testimonial() {
	register_post_type( 'health_testimonial',
		array(
			'labels' => array(
			'name' => 'Testimonial',
			'add_new' => __('Add New Testimonial', 'health'),
			'add_new_item' => __('Add New Testimonial','health'),
			'edit_item' => __('Add New Testimonial','health'),
			'new_item' => __('New Link','health'),
			'all_items' => __('All Testimonials','health'),
			'view_item' => __('View Testimonial','health'),
			'search_items' => __('Search Testimonials','health'),
			'not_found' =>  __('No Testimonials found','health'),
			'not_found_in_trash' => __('No Testimonials found in Trash','health'), 
			),
		'supports' => array('title','thumbnail'),
		'show_in' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array('slug' => $GLOBALS['slug_testimonial']),
		'public' => true,
		'menu_position' =>20,
		'public' => true,
		)
	);
}
add_action( 'init', 'health_testimonial' );

//************* Home project custom post type ***********************
function healthcenter_portfolio_type()
{	register_post_type( 'healthcenter_project',
		array(
			'labels' => array(
				'name' => 'Portfolio / Project',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New Item', 'health'),
				'add_new_item' => __('Add New Project','health'),
				'edit_item' => __('Add New Portfolio / project','health'),
				'new_item' => __('New Link','health'),
				'all_items' => __('All Portfolio Project','health'),
				'view_item' => __('View Link','health'),
				'search_items' => __('Search Links','health'),
				'not_found' =>  __('No Links found','health'),
				'not_found_in_trash' => __('No Links found in Trash','health'), 
			),
			'supports' => array('title','editor','thumbnail'),
			'show_in' => true,
			'show_in_nav_menus' => false,
			'rewrite' => array('slug' => $GLOBALS['slug_portfolio']),
			'public' => true,
			'menu_position' =>20,
			'public' => true,
			'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/option-icon-media.png',
		)
	);
}
add_action( 'init', 'healthcenter_portfolio_type' );

//************* Team POST TYPE *****************************
function healthcenter_team_type()
{	register_post_type( 'healthcenter_team',
		array(
			'labels' => array(
				'name' => 'Our Team',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New Team Member', 'health'),
                'add_new_item' => __('Add New Member','health'),
				'edit_item' => __('Add New Member','health'),
				'new_item' => __('New Link','health'),
				'all_items' => __('All Team Member','health'),
				'view_item' => __('View Link','health'),
				'search_items' => __('Search Links','health'),
				'not_found' =>  __('No Links found','health'),
				'not_found_in_trash' => __('No Links found in Trash','health'), 
				),
			'supports' => array('title','thumbnail'),
			'show_in' => true,
			'show_in_nav_menus' => false,
			'rewrite' => array('slug' => $GLOBALS['slug_team']),
			'public' => true,
			'menu_position' => 20,
			'public' => true,
			)
	);
}
add_action( 'init', 'healthcenter_team_type' );
?>