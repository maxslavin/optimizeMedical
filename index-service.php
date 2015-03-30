<?php/**
* @Theme Name	:	Health-Center
* @file         :	index-slider.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/index-slider.php
*/
?>
<!-- HC Service Section -->
<div class="container">
	<?php $current_options=get_option('hc_pro_options'); ?>
	<div class="row hc_home_callout">		
		<?php if($current_options['site_intro_tex']!='') { ?>
		<div class="col-md-6 hc_home_title">
			<h1><?php echo $current_options['site_intro_tex']; ?></h2>
		</div>
		<?php } ?>
		<?php if(($current_options['call_now_text']!='') || $current_options['call_now_number']!='') { ?>
		<div class="col-md-6 hc_home_callnow_title">			
			<h1><?php echo $current_options['call_now_text']; ?>: <span><?php echo $current_options['call_now_number']; ?></span></h2>
		</div>
		<?php } ?>
	</div>	
	<div class="row"><div class="hc_home_border"></div></div>
	<div class="row">
		<div class="hc_service_title">
			<?php if($current_options['service_title']!='') { ?>
			<h1><?php echo $current_options['service_title']; ?></h1>
			<?php } ?>
			<?php if($current_options['service_description']!='') { ?>
			<p><?php echo $current_options['service_description']; ?>.</p>
			<?php } ?>		
		</div>
	</div>
	
	<div class="row">
	<?php  
	$hs_count_posts = wp_count_posts( 'healthcenter_service')->publish;
	if($hs_count_posts > 4)
	{	$hs_count_posts = 4;	}
	$args = array( 'post_type' => 'healthcenter_service','posts_per_page' =>$hs_count_posts); 	
	$service = new WP_Query( $args ); 
	if( $service->have_posts() )
	{ while ( $service->have_posts() ) : $service->the_post(); ?>	
		<div class="col-md-3 hc_service_area">			
			<i class="fa <?php echo get_post_meta( get_the_ID(),'service_icon_image', true ) ; ?>"></i>
			<?php if(get_post_meta( get_the_ID(),'meta_service_link', true )) 
					{ $meta_service_link=get_post_meta( get_the_ID(),'meta_service_link', true ); }
					else { $meta_service_link = get_post_permalink(); } ?>					
			<h2><a href="<?php echo $meta_service_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_service_target', true )) { echo "target='_blank'"; }  ?> ><?php echo the_title(); ?></a></h2>
			<p><?php echo get_home_service_excerpt(); ?></p>
			<p><a href="<?php echo $meta_service_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_service_target', true )) { echo "target='_blank'"; }  ?> ><?php _e('Read more','health'); ?> <span class="fa fa-arrow-circle-right hc_service_reamore_icon"></span></a></p>
		</div>
	<?php endwhile; 
	} else { 
		$fontawsome =array('wheelchair', 'medkit', 'ambulance', 'user-md');
		$serivec_defualttext =array('Medical Guidance', 'Emergency Help', 'Cardio Monitoring', 'Medical Treatment');		
		for($i=0; $i<=3; $i++) {	?>
		<div class="col-md-3 hc_service_area">
			<i class="fa fa-<?php echo $fontawsome[$i]; ?>"></i>
			<h2><a href="#"><?php echo $serivec_defualttext[$i]; ?></a></h2>
			<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health'); ?></p>
			<p><a href="#"><?php _e('Read more','health'); ?> <span class="fa fa-arrow-circle-right hc_service_reamore_icon"></span></a></p>
		</div>		
	<?php } 
	} //end of default service ?>
	</div>
	<div class="row"><div class="hc_home_border"></div></div>
</div>
<!-- /HC Service Section -->