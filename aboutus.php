<?php
/*	@Theme Name	:	Health-Center
* 	@file         :	aboutus.php
* 	@package      :	Health-Center
* 	@author       :	VibhorPurandare
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/aboutus.php
*/

//Template Name:About-Us
get_header();
$current_options=get_option('hc_pro_options');
the_post(); ?>
<!-- HC Page Header Section -->	
<div class="container">
	<div class="row">
		<div class="hc_page_header_area">
			<h1><?php the_title(); ?></h1>				
		</div>
	</div>
</div>
<!-- /HC Page Header Section -->
<!-- HC Aboutus Section -->	
<div class="container">
	<div class="row hc_aboutus_area">
		<div class="col-md-6">
			<?php $defalt_arg =array('class' => 'hc_img_shadow hc_img_responsive'); ?>
			   <?php if(has_post_thumbnail()): ?>
					<?php the_post_thumbnail('', $defalt_arg); ?>
					<?php else : ?>
					<img class="hc_img_responsive hc_img_shadow" alt="Health Center" src="<?php echo get_template_directory_uri(); ?>/images/default/aboutus.png">
				<?php endif; ?>			
		</div>
		<div class="col-md-6">
		<p><?php the_content (); ?></p>	
		</div>
	</div>
</div>	
<!-- /HC Aboutus Section -->
<!-- HC Team Section -->	
<div class="container">
	<div class="row">
		<div class="hc_service_title">
			<h1>
			<?php if($current_options['hc_head_one_team']!='') { 
			 echo $current_options['hc_head_one_team']; 
			 } else { echo _e('Meet Our','health'); } ?>			
			<?php if($current_options['hc_head_two_team']!='') { 
			 echo $current_options['hc_head_two_team']; 
			 } else { echo _e('Meet Our','health'); } ?>			
			</h1>
			<p>
			<?php if($current_options['hc_head_team_tagline']!='') { 
			 echo $current_options['hc_head_team_tagline']; 
			 } else { echo _e('We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers','health'); } ?>
			</p>
			
		</div>
	</div>
	<div class="row hc_team_section">
	<?php  	$count_posts = wp_count_posts( 'healthcenter_team')->publish;
			$arg = array( 'post_type' => 'healthcenter_team','posts_per_page' =>$count_posts);
			$team = new WP_Query( $arg ); 
			if($team->have_posts())
			{	while ( $team->have_posts() ) : $team->the_post();	?>
		<div class="col-md-4">
			<div class="hc_team_showcase">
				<?php if(has_post_thumbnail()): ?>
				<?php the_post_thumbnail('hc_team_thumb'); ?>
				<?php endif; ?>				
			<div class="caption">
				<h3><?php the_title(); ?></h3>
				<?php $designation=get_post_meta( get_the_ID(), 'meta_designation', true ); ?>
				<h6><?php if (!empty($designation)) echo esc_attr($designation); ?></h6>
				<?php $description=get_post_meta( get_the_ID(), 'meta_description', true ); ?>
				<p><?php if (!empty($description)) echo esc_attr($description); ?></p>
				<div class="hc_aboutus1_team_social">
				<?php
					$fb_url_cb = get_post_meta( get_the_ID(), 'meta_fb_url_cb', true );
					$twt_url_cb = get_post_meta( get_the_ID(), 'meta_twt_url_cb', true );
					$lnkd_url_cb = get_post_meta( get_the_ID(), 'meta_lnkd_url_cb', true );
					$google_url_cb = get_post_meta( get_the_ID(), 'meta_google_url_cb', true );
					$fb_url = get_post_meta( get_the_ID(), 'meta_fb_url', true );
					$twt_url =  get_post_meta( get_the_ID(), 'meta_twt_url', true );
					$lnkd_url = get_post_meta( get_the_ID(), 'meta_lnkd_url', true );
					$google_url =get_post_meta( get_the_ID(), 'meta_google_url', true );					
					?>
					<?php if($fb_url_cb==1): ?>
					<a href="<?php if(isset($fb_url)){ echo esc_html($fb_url);} else { echo "http://facebook.com"; } ?>" target="_blank" title="Facebook" id="fb_tooltip" class="facebook">&nbsp;</a>
					<?php endif; ?>
					<?php if($twt_url_cb==1): ?>
					<a href="<?php if(isset($twt_url)){ echo esc_html($twt_url);} else { echo "http://twitter.com"; } ?>" target="_blank" title="Twitter" id="twi_tooltip" class="twitter">&nbsp;</a>
					<?php endif; ?>
					<?php if($lnkd_url_cb==1): ?>
					<a href="<?php if(isset($lnkd_url)){ echo esc_html($lnkd_url);} else { echo "http://linkeding.com"; } ?>" target="_blank" title="Linked-in" id="in_tooltip" class="linked-in">&nbsp;</a>
					<?php endif; ?>
					<?php if($google_url_cb==1): ?>
					<a href="<?php if(isset($google_url)){ echo esc_html($google_url);} else { echo "http://google.com"; } ?>" target="_blank" title="Google+" id="plus_tooltip" class="google_plus">&nbsp;</a>
					<?php endif; ?>				
				</div>
			</div>
			</div>
		</div>
		<?php endwhile; 
			}
			else
			{
			for($dp=1; $dp<4; $dp++) { ?>
			<div class="col-md-4">
			<div class="hc_team_showcase">
				<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/default/member<?php echo $dp; ?>.png">
				<div class="caption">
					<h3><?php _e('Jane Doe','health'); ?></h3>
					<h6><?php _e('Financial Manager','health'); ?></h6>
					<p><?php _e('Aenean dignissim ac leo et varius. Maecenas enim leo, pharetra nec cursuseu, pell entesque eget sapien. Morbi pellentesqu non nulla scelerisque. Pellentesque mollis erat et elit porta venenatis augue. Aendignissim ac leo et varius. Maecenas enim pharetra nec Aendign issim ac leo etvarius','health'); ?></p>
					<div class="hc_aboutus1_team_social">
						<a href="#" title="Facebook" id="fb_tooltip" class="facebook">&nbsp;</a>
						<a href="#" title="Twitter" id="twi_tooltip" class="twitter">&nbsp;</a>
						<a href="#" title="Linked-in" id="in_tooltip" class="linked-in">&nbsp;</a>
						<a href="#" title="Google+" id="plus_tooltip" class="google_plus">&nbsp;</a>
					</div>
				</div>
			</div>
			</div>
			<?php } 
			} ?>
	</div>
</div><?php get_footer(); ?>