<?php
/*	@Theme Name	:	Health-Center
* 	@file         :	single.php
* 	@package      :	Health-Center
* 	@author       :	Hari Maliya
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/single-healthcenter_project.php
*/
?>
<?php get_header();?>	
<!-- HC Page Header Section -->	
<div class="container">
	<div class="row">
		<div class="hc_project_header_area">
			<h1><?php the_title();?></h1>					
		</div>
	</div>
</div>
<!-- /HC Page Header Section -->	
	
<!-- HC Portfolio Detail Section -->	
<div class="container">	
	<div class="row hc_portfolio_detail_section">
		<div class="col-md-8">
			<?php if(has_post_thumbnail()){
			$class=array('class'=>'hc_img_responsive'); ?>
			<?php the_post_thumbnail('portfolio-1c-thumb', $class); ?>					
			<?php } else { ?>
			<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio_detail.jpg">
			<?php } ?>			
		</div>		
		<div class="col-md-4 hc_portfolio_detail_sidebar">
			<ul class="hc_portfolio_detail_pagi">
				<?php	$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
					<li><a rel="next" href="<?php echo get_permalink( $prev_post->ID ); ?>"><span class="fa fa-angle-left"></span></a></li>
			<?php endif; ?>	
			<?php	$next_post = get_next_post();
					if (!empty( $next_post )): ?>
					<li><a rel="prev" href="<?php echo get_permalink( $next_post->ID ); ?>"><span class="fa fa-angle-right"></span></a></li>
			<?php endif; ?>	
			</ul>
			<div class="hc_portfolio_detail_description">
				<h3><?php the_title(); ?></h3>
					<?php the_post();?>
				<p><?php the_content(); ?></p>	
			</div>	
			
			<div class="hc_portfolio_detail_info">
			<?php 
				$portfolio_client_project_title =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_client_project_title', true ));
				$portfolio_project_visit_site =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_project_visit_site', true ));
				
				if($portfolio_client_project_title) { ?>
				<p><?php _e('Client:','health'); ?> <small><?php echo $portfolio_client_project_title; ?></small></p>
				<?php } ?>
				<p><?php _e('Date:','health'); ?> <small><?php echo the_date('d M Y');?></small></p>
				<?php if($portfolio_project_visit_site) { ?>
				<p><?php _e('Visit Website:','health') ?> <small><?php echo $portfolio_project_visit_site; ?></small></p>
				<?php } ?>
				<p><a href="#" title="Launch Project"><?php _e('Launch Project','health'); ?></a></p>
			</div>	
		</div>
	</div>	
</div>
<!------ project portfolio strip --------->
<?php get_template_part('portfolio', 'strip');	?>
<!-- /HC Portfolio Detail Column -->
<?php get_footer();?>