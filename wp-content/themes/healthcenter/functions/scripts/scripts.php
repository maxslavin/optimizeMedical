<?php
function webriti_scripts()
{	// Theme Css 
	wp_enqueue_style('responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');
	wp_enqueue_style('font', WEBRITI_TEMPLATE_DIR_URI . '/css/font/font.css');
	wp_enqueue_style('tooltips', WEBRITI_TEMPLATE_DIR_URI . '/css/css-tooltips.css');
	
	wp_enqueue_style('bootstrap', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');	
	wp_enqueue_style('font-awesome', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome-4.0.3/css/font-awesome.min.css');	
	
	// Bootstrap Js 
	wp_enqueue_script('menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
	wp_enqueue_script('bootstrap_min', WEBRITI_TEMPLATE_DIR_URI .'/js/bootstrap.min.js');	
	
	if(is_front_page())
	{	
		wp_enqueue_style('lightbox', WEBRITI_TEMPLATE_DIR_URI . '/css/lightbox.css');
		wp_enqueue_style('flexslider', WEBRITI_TEMPLATE_DIR_URI . '/css/flexslider/flexslider.css');	
		wp_enqueue_script('lightbox-js', WEBRITI_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
		wp_enqueue_script('jquery-flexslider-js', WEBRITI_TEMPLATE_DIR_URI .'/js/flexslider/jquery.flexslider.js');
		wp_enqueue_script('jquery_carouFredSel_js', WEBRITI_TEMPLATE_DIR_URI .'/js/carufredsel/jquery.carouFredSel-6.2.1-packed.js');
		wp_enqueue_script('accordion-tab', WEBRITI_TEMPLATE_DIR_URI .'/js/accordion-tab.js');
		wp_enqueue_script('collapse', WEBRITI_TEMPLATE_DIR_URI .'/js/collapse.js');
	
	}
	
	if(is_page_template('service-template.php') || 'healthcenter_project' == get_post_type())
	{
		wp_enqueue_script('jquery_carouFredSel_js', WEBRITI_TEMPLATE_DIR_URI .'/js/carufredsel/jquery.carouFredSel-6.2.1-packed.js');
		wp_enqueue_style('lightbox', WEBRITI_TEMPLATE_DIR_URI . '/css/lightbox.css');
		wp_enqueue_script('lightbox-js', WEBRITI_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
	}
	// Portfolio js and css
	if(is_page_template('portfolio-2-column.php') || is_page_template('portfolio-3-column.php') || is_page_template('portfolio-4-column.php') || is_page_template('single-healthcenter_project.php')){
		wp_enqueue_style('lightbox', WEBRITI_TEMPLATE_DIR_URI . '/css/lightbox.css');
		wp_enqueue_script('lightbox-js', WEBRITI_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
	}
	
	require_once('custom_style.php');
	
}
add_action('wp_enqueue_scripts', 'webriti_scripts');

if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}

function webriti_custom_enqueue_css()
{	global $pagenow;
	if ( in_array( $pagenow, array( 'post.php', 'post-new.php', 'page-new.php', 'page.php' ) ) ) {
		wp_enqueue_style('meta-box-css', WEBRITI_TEMPLATE_DIR_URI . '/css/meta-box.css');	
	}	
}
add_action( 'admin_print_styles', 'webriti_custom_enqueue_css', 10 );

function hc_shortcode_detect() {
    global $wp_query;	
    $posts = $wp_query->posts;
    $pattern = get_shortcode_regex();
	foreach ($posts as $post){
        if (   preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches ) && array_key_exists( 2, $matches ) && in_array( 'button', $matches[2] ) || in_array( 'row', $matches[2] ) || in_array( 'accordian', $matches[2] ) || in_array( 'tabgroup', $matches[2]) || in_array( 'tabs', $matches[2] ) || in_array( 'alert', $matches[2] ) || in_array( 'dropcap', $matches[2] )  || in_array( 'gridsystemlayout', $matches[2] ) || in_array( 'tooltip', $matches[2] ) || in_array( 'heading', $matches[2] )) {
			wp_enqueue_script('accordion-tab', WEBRITI_TEMPLATE_DIR_URI .'/js/accordion-tab.js',array('jquery'));
			wp_enqueue_script('collapse', WEBRITI_TEMPLATE_DIR_URI .'/js/collapse.js');
            break;
        }
    }
}
add_action( 'wp', 'hc_shortcode_detect' );
?>