<!-- Footer Widget Secton -->
<div class="hc_footer_widget_area">	
	<div class="container">
		<!--div class="row">
			<?php if ( is_active_sidebar( 'footer-widget-area' ) )
			{ ?>
			<div class="">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div>	
			<?php } else { ?> 
			<div class="col-md-3 hc_footer_widget_column">		
				<h3 class="hc_footer_widget_title"><?php _e('About Us...','health'); ?></h3>
				<h6><?php _e('Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Nulla vehicul feugiatblandit','health'); ?></h6>
				<p><?php _e('Lorem ipsum dolor sit amet, consectetur a dipiscing elit. Nulla vehicula feugiat blandit  Nulla facilisi. Nulla tellus nisi','health'); ?></p>
			</div>
			
			<div class="col-md-3 hc_footer_widget_column">		
				<h3 class="hc_footer_widget_title"><?php _e('Recent Work','health'); ?></h3>
				<div class="media hc_footer_widget_post">
					<a class="hc_footer_widget_move" href="#">
						<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/hc1.png" alt="health" class="hc_footer_widget_post_img">
					</a>
					<div class="media-body">
						<h3><a href="#"><?php _e('Awesome Slider Post','health'); ?></a></h3>
						<span class="hc_footer_widget_date"><?php _e('January 15, 2014','health'); ?></span>
					</div>
				</div>
				
				<div class="media hc_footer_widget_post">
					<a class="hc_footer_widget_move" href="#">
						<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/hc1.png" alt="health" class="hc_footer_widget_post_img">
					</a>
					<div class="media-body">
						<h3><a href="#"><?php _e('Easy to Customizable','health'); ?></a></h3>
						<span class="hc_footer_widget_date"><?php _e('January 15, 2014','health'); ?></span>
					</div>
				</div>
				
				<div class="media hc_footer_widget_post">
					<a class="hc_footer_widget_move" href="#">
						<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/hc1.png" alt="health" class="hc_footer_widget_post_img">
					</a>
					<div class="media-body">
						<h3><a href="#"><?php _e('Awesome Slider Post','health'); ?></a></h3>
						<span class="hc_footer_widget_date"><?php _e('January 15, 2014','health'); ?></span>
					</div>
				</div>				
			</div>			
			<div class="col-md-3 hc_footer_widget_column">		
				<h3 class="hc_footer_widget_title"><?php _e('Usefull Links','health');?></h3>
				<div class="hc_footer_widget_link">
					<a href="#"><i class="fa fa-arrow-circle-right"></i><?php _e('This is Health Center Responsive.','health');?></a>
					<a href="#"><i class="fa fa-arrow-circle-right"></i><?php _e('This is Health Center Responsive.','health');?></a>
					<a href="#"><i class="fa fa-arrow-circle-right"></i><?php _e('This is Health Center Responsive.','health');?></a>
					<a href="#"><i class="fa fa-arrow-circle-right"></i><?php _e('This is Health Center Responsive.','health');?></a>
					<a href="#"><i class="fa fa-arrow-circle-right"></i><?php _e('This is Health Center Responsive.','health');?></a>
				</div>
			</div>
			
			<div class="col-md-3 hc_footer_widget_column">		
				<h3 class="hc_footer_widget_title"><?php _e('Quick Contact','health'); ?></h3>
				<address>
				  <?php _e('25, Lorem Lis Street','health'); ?><br />
				  <?php _e('Dhanmandi California. US','health'); ?><br />
				  <abbr title="Phone"><?php _e('Phone:','health'); ?></abbr><?php _e('800 123 3456','health'); ?><br />
				  <abbr title="Phone"><?php _e('Fax:','health'); ?></abbr><?php _e('800 123 3456','health'); ?><br />
				  <abbr title="Phone"><?php _e('Email:','health'); ?></abbr> <a href="mailto:info@healthcenter.com">info@healthcenter.com</a><br />
				</address>
			</div>
			<?php } ?>
		</div-->
		
		<div class="row hc_footer_area">
			<div class="col-md-8">
			<p><?php  
					$current_options = get_option('hc_pro_options');
					if($current_options['footer_customizations']!='') { echo $current_options['footer_customizations']; }	?>
					<a href="http://wordpress.org/"><?php _e('WordPress','health'); ?></a>. <?php if($current_options['created_by_text']!='') { echo $current_options['created_by_text']; } ?>
					<a href="<?php if($current_options['created_by_link']!='') { echo $current_options['created_by_link']; } ?>"><?php if($current_options['created_by_webriti_text']!='') { echo $current_options['created_by_webriti_text']; } ?></a>.</p>
			</div>
			<?php if($current_options['footer_social_media_enabled']=='on') { ?>
			<div class="col-md-4">
				<div class="hc_footer_social">
					<?php if($current_options['social_media_facebook_link']!='') { ?>
					<a class="facebook" id="fb_tooltip" title="Facebook" href="<?php echo $current_options['social_media_facebook_link']; ?>">&nbsp;</a>
					<?php }
					if($current_options['social_media_twitter_link']!='') { ?>
					<a class="twitter" id="twi_tooltip" title="Twitter" href="<?php echo $current_options['social_media_twitter_link']; ?>">&nbsp;</a>
					<?php }
					if($current_options['social_media_linkedin_link']!='') { ?>
					<a class="linked-in" id="in_tooltip" title="Linked-in" href="<?php echo $current_options['social_media_linkedin_link']; ?>">&nbsp;</a>
					<?php }
					if($current_options['social_media_google_plus']!='') { ?>
					<a class="google_plus" id="plus_tooltip" title="Google+" href="<?php echo $current_options['social_media_google_plus']; ?>">&nbsp;</a>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		
	</div>
</div>
<!------  Google Analytics code --------->
<?php
$current_options=get_option('hc_pro_options');
if($current_options['webrit_custom_css']!='') {  ?>
<style>
<?php echo $current_options['webrit_custom_css']; ?>
</style>
<?php } 

if($current_options['google_analytics']!='') {  ?>
<script type="text/javascript">
<?php echo $current_options['google_analytics']; ?>
</script>
<?php } ?>	
<!------  Google Analytics code end ------->	
<!-- /Footer Widget Secton -->
</div><!-- /Close of wrapper -->  
<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top-->
<?php 
// Switcher css and js
	wp_enqueue_style('spectrum', WEBRITI_TEMPLATE_DIR_URI . '/css/switcher/spectrum.css');
	wp_enqueue_script('spectrum-js', WEBRITI_TEMPLATE_DIR_URI .'/js/switcher/spectrum.js');
	wp_enqueue_script('switcher-js', WEBRITI_TEMPLATE_DIR_URI .'/js/switcher/switcher.js');	
	require_once( WEBRITI_THEME_FUNCTIONS_PATH .'/scripts/colorscheme.php');
?>
<!--Switcher Panel-->
<?php wp_footer(); ?>
</body>
</html>