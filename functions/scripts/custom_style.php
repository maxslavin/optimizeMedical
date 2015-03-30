<?php $current_options=get_option('hc_pro_options'); 
if($current_options['enable_custom_typography']=="on")
{
?>
<style> 
/****** custom typography *********/ 
.hc_blog_post_content p  
{
	font-size:<?php echo $current_options['general_typography_fontsize'].'px'; ?> !important;
	font-family:<?php echo $current_options['general_typography_fontfamily']; ?> !important;
	font-style:<?php echo $current_options['general_typography_fontstyle']; ?> ;
	line-height:<?php echo ($current_options['general_typography_fontsize']+5).'px'; ?> !important;
	
}
/*** Menu title */
.navbar .nav > li > a{
	font-size:<?php echo $current_options['menu_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['menu_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['menu_title_fontstyle']; ?>;
}

/*** post title */
.hc_post_title_wrapper h2, .blog_section2 h2, .blog_section h2 {
	font-size:<?php echo $current_options['post_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['post_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['post_title_fontstyle']; ?>;
}
/*** service title */
.hc_service_area h2 , .hc_page_header_area h1, .hc_search_head
{
	font-size:<?php echo $current_options['service_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['service_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['service_title_fontstyle']; ?>;
}

.our_main_ser_title{ 
	font-size:<?php echo $current_options['service_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['service_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['service_title_fontstyle']; ?>;
}
/******** portfolio title ********/
.hc_project_header_area h1, .hc_home_portfolio_caption h3{ 
	font-size:<?php echo $current_options['portfolio_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['portfolio_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['portfolio_title_fontstyle']; ?>;
}
.hc_portfolio_caption h3 {
	font-size:<?php echo $current_options['portfolio_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['portfolio_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['portfolio_title_fontstyle']; ?>;
}
/******* footer widget title*********/
.hc_footer_widget_title{
	font-size:<?php echo $current_options['widget_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['widget_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['widget_title_fontstyle']; ?>;
}
.hc_sidebar_widget_title h2, h2.widgettitle{
	font-size:<?php echo $current_options['widget_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['widget_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['widget_title_fontstyle']; ?>;
}
.hc_home_title h1{
	font-size:<?php echo $current_options['calloutarea_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['calloutarea_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['calloutarea_title_fontstyle']; ?>;
}
.hc_callout_area h1{
	font-size:<?php echo $current_options['calloutarea_description_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['calloutarea_description_fontfamily']; ?>;
	font-style:<?php echo $current_options['calloutarea_description_fontstyle']; ?>;
}
.hc_callout_area a {	
	font-size:<?php echo $current_options['calloutarea_purches_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['calloutarea_purches_fontfamily']; ?>;
	font-style:<?php echo $current_options['calloutarea_purches_fontstyle']; ?>;
}
</style>
<?php } ?>