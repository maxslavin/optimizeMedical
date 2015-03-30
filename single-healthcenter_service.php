<?php
/*	@Theme Name	:	Health-Center
* 	@file         :	single.php
* 	@package      :	Health-Center
* 	@author       :	Hari Maliya
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/single-healthcenter_service.php
*/
?>
<?php get_header();?>	
<!-- HC Page Header Section -->	
<div class="container">
	<div class="row">
		<div class="hc_page_header_area">
			<h1><?php the_title();?></h1>				
		</div>
	</div>
</div>
<!-- /HC Page Header Section -->	
	
<!-- HC Service Detail Section -->	
<div class="container">
	<div class="row hc_service_detail_section">		
		<div class="col-md-8">
			<?php if(has_post_thumbnail()){ ?>
			<?php the_post_thumbnail('service_details'); ?>					
			<?php } else { ?>
			<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio_detail.jpg">
			<?php } ?>
		</div>		
		<div class="col-md-4 hc_service_detail_sidebar">			
			<div class="hc_service_detail_description">
				<h3><?php the_title(); ?></h3>
				<?php the_post();?>
				<p><?php the_content(); ?></p>	
			</div>	
		</div>		
	</div>
</div>
<div class="container">
	<div class="row hc_service_detail_section">		
	<?php comments_template('',true); ?>
	
	</div>
</div>
<!-- /HC Service Detail Section -->
<?php get_footer();?>
