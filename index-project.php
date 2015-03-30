<?php/**
* @Theme Name	:	Health-Center
* @file         :	index-project.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/index-project.php
*/
?>
<!-- HC Portfolio Section -->
<div class="container">
	<?php $current_options=get_option('hc_pro_options'); ?>
	<div class="row">
		<div class="hc_portfolio_title">
			<?php if($current_options['portfolio_title']!='') { ?>
			<h1><?php echo $current_options['portfolio_title']; ?></h1>
			<?php } ?>
			<?php if($current_options['portfolio_description']!='') { ?>
			<p><?php echo $current_options['portfolio_description']; ?>.</p>
			<?php } ?>			
		</div>
	</div>		
	<div class="row">
		<?php  
		$pp_count_posts = wp_count_posts( 'healthcenter_project')->publish;
		if($pp_count_posts > 4)
		{	$pp_count_posts = 4;	}
		$args = array( 'post_type' => 'healthcenter_project','posts_per_page' =>$pp_count_posts); 	
		$project = new WP_Query( $args ); 
		$class=array('class'=>'hc_img_responsive');
		if( $project->have_posts() )
		{ while ( $project->have_posts() ) : $project->the_post(); ?>
		<?php 
			if(get_post_meta( get_the_ID(),'meta_project_link', true )) 
			{ $meta_project_link=get_post_meta( get_the_ID(),'meta_project_link', true ); }
			else { $meta_project_link = get_post_permalink(); } ?>
					
		<div class="col-md-3 hc_home_portfolio_area">
			<div class="hc_home_portfolio_showcase">
				<div class="hc_home_portfolio_showcase_media">
					<?php if(has_post_thumbnail()):?>
						<?php the_post_thumbnail('portfolio-4c-thumb',$class); 
						$post_thumbnail_id = get_post_thumbnail_id();
						$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );						
					?>
					<!--<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/hc_home_port1.jpg"> -->
					<div class="hc_home_portfolio_showcase_overlay">
						<div class="hc_home_portfolio_showcase_overlay_inner">
							<div class="hc_home_portfolio_showcase_icons">
								<a title="Health Center" href="<?php echo $meta_project_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_project_target', true )) { echo "target='_blank'"; }  ?>><i class="fa fa-link"></i></a>
								<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="Health Center" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="hc_home_portfolio_caption">
				<h3><a href="<?php echo $meta_project_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_project_target', true )) { echo "target='_blank'"; }  ?>><?php echo the_title(); ?></a></h3>
				<small><?php echo get_post_meta( get_the_ID(),'portfolio_project_summary', true ); ?></small>	
			</div>
		</div>	
		<?php endwhile; 
		} else { 
		for($i=1; $i<=4; $i++) { 
		?>
		<div class="col-md-3 hc_home_portfolio_area">
			<div class="hc_home_portfolio_showcase">
				<div class="hc_home_portfolio_showcase_media">
					<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/default/project<?php echo $i; ?>.png">
					<div class="hc_home_portfolio_showcase_overlay">
						<div class="hc_home_portfolio_showcase_overlay_inner">
							<div class="hc_home_portfolio_showcase_icons">
								<a title="Health Center" href="#"><i class="fa fa-link"></i></a>
								<a href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/default/project<?php echo $i; ?>.png"  data-lightbox="image" title="Health Center" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hc_home_portfolio_caption">
				<h3><a href="portfolio_datail.html"><?php _e('Responsive Design','health');  ?></a></h3>
				<small><?php _e('Photography','health'); ?></small>	
			</div>
		</div>
		<?php } // end of default portfolio
		} ?>
	</div>
	<div class="row"><div class="hc_home_border"></div></div>
</div>	
<!-- /HC Portfolio Section -->