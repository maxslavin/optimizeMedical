<?php
// Template Name: Portfolio-2-column
/**
* @Theme Name	:	Health-Center
* @file         :	portfolio-2-column.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/portfolio-2-column.php
*/
?>
<?php get_header(); ?>	
<!-- HC Page Header Section -->	
<div class="container">
	<div class="row">
		<div class="hc_page_header_area">
			<h1><?php the_title(); ?></h1>	
		</div>
	</div>
</div>
<!-- /HC Page Header Section -->	
<!-- HC Portfolio 2 Column Section -->	
<div class="container">	
	<?php
	//for a given post type, return all
	$post_type = 'healthcenter_project';
	$tax = 'portfolio_categories'; 
	$term_args=array( 'hide_empty' => false);
	$tax_terms = get_terms($tax,$term_args);
	$defualt_tex_id = get_option('custom_texo_health'); 
	?>	
	<div class="row">
		<div class="col-md-12 hc_portfolio_tabs_section">
		<?php if($tax_terms) { ?>
			<ul id="mytabs" class="hc_portfolio_tabs">
			<?php	foreach ($tax_terms  as $tax_term) {
				$tax_term_name = str_replace(' ', '_', $tax_term->name);
				$tax_term_name = preg_replace('~[^A-Za-z\d\s-]+~u', 'hc', $tax_term_name);
				?>
				<li <?php if($tax_term->term_id == $defualt_tex_id) echo "class='active'"; ?>><a data-toggle="tab" href="#<?php echo $tax_term_name; ?>"><?php echo $tax_term->name; ?></a></li>
			<?php } ?>
			</ul>
			<?php } else { ?>
			<ul id="mytabs" class="hc_portfolio_tabs">
				<li class="active"><a data-toggle="tab" href="#showall"><?php _e('All','health'); ?></a></li>
				<li><a data-toggle="tab" href="#html"><?php _e('HTML','health'); ?></a></li>
				<li><a data-toggle="tab" href="#wordpress"><?php _e('Wordpress','health'); ?></a></li>
				<li><a data-toggle="tab" href="#css"><?php _e('CSS','health'); ?></a></li>
				<li><a data-toggle="tab" href="#jquery"><?php _e('jQuery','health'); ?></a></li>
			</ul>
		<?php } ?>
		</div>		
	</div>
<div class="tab-content hc_main_portfolio_section" id="myTabContent">
<?php 
	if ($tax_terms) 
	{ 	foreach ($tax_terms  as $tax_term)
		{	 $args = array (
			'post_type' => $post_type,
			'portfolio_categories' => $tax_term->slug,
			'post_status' => 'publish');
			$portfolio_query = null;
			$portfolio_query = new WP_Query($args);				
			if( $portfolio_query->have_posts() )
			{ 	$tax_term_name = str_replace(' ', '_', $tax_term->name);
				$tax_term_name = preg_replace('~[^A-Za-z\d\s-]+~u', 'hc', $tax_term_name);
			?>
			<div id="<?php echo $tax_term_name; ?>" class="tab-pane fade in <?php if($tax_term->term_id == $defualt_tex_id) echo "active"; ?>">
			<div class="row">
			<?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
			<?php 	if(get_post_meta( get_the_ID(),'meta_project_link', true )) 
					{ $meta_project_link=get_post_meta( get_the_ID(),'meta_project_link', true ); }
					else { $meta_project_link = get_post_permalink(); } ?>
					<div class="col-md-6 hc_portfolio_area">
						<div class="hc_portfolio_showcase">
							<div class="hc_portfolio_showcase_media">								
								<?php if(has_post_thumbnail())
								{ 
									$class=array('class'=>'hc_img_responsive');
									the_post_thumbnail('portfolio-2c-thumb', $class);
									$post_thumbnail_id = get_post_thumbnail_id();
									$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
								} 
								else 
								{ ?>
									<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg" alt="Health Center" class="hc_img_responsive">
									<?php $post_thumbnail_url=WEBRITI_TEMPLATE_DIR_URI .'/images/portfolio/hc_portfolio1.jpg'; 
								} ?>	
								<div class="hc_portfolio_showcase_overlay">
									<div class="hc_portfolio_showcase_overlay_inner">
										<div class="hc_portfolio_showcase_icons">
											<a title="Health Center" href="<?php echo $meta_project_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_project_target', true )) { echo "target='_blank'"; }  ?> ><i class="fa fa-link"></i></a>
											<a class="hover_thumb" data-lightbox="image"  title="Health Center" href="<?php echo $post_thumbnail_url; ?>"><i class="fa fa-picture-o"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="hc_portfolio_caption">
							<h3><a href="<?php echo $meta_project_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_project_target', true )) { echo "target='_blank'"; }  ?> ><?php the_title(); ?></a></h3>
							<small><?php echo get_post_meta( get_the_ID(),'portfolio_project_summary', true ); ?></small>		
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div><?php 
			} /* end term wise data */	wp_reset_query();
		} // end for-each tax_terms
	} // end of text data 
	 else { ?>
	<div id="showall" class="tab-pane fade in active">
		<div class="row">
			<?php for($i=1; $i<=7; $i++) { ?>
		      <div class="col-md-6 hc_portfolio_area">
					<div class="hc_portfolio_showcase">
						<div class="hc_portfolio_showcase_media">
							<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg" alt="Health Center" class="hc_img_responsive">
							<div class="hc_portfolio_showcase_overlay">
								<div class="hc_portfolio_showcase_overlay_inner">
									<div class="hc_portfolio_showcase_icons">
										<a title="Health Center" href="#"><i class="fa fa-link"></i></a>
										<a class="hover_thumb" data-lightbox="image"  title="Health Center" href="images/portfolio/hc_portfolio1.jpg"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hc_portfolio_caption">
						<h3><a href="portfolio_datail.html"><?php _e('Responsive Design','health'); ?></a></h3>
						<small><?php _e('Photography','health'); ?></small>		
					</div>
				</div>
				<?php } ?>
		</div>
	</div>
	<div id="html" class="tab-pane tab-pane fade">
		<div class="row">
			<?php for($i=1; $i<=4; $i++) { ?>
		      <div class="col-md-6 hc_portfolio_area">
					<div class="hc_portfolio_showcase">
						<div class="hc_portfolio_showcase_media">
							<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg">
							<div class="hc_portfolio_showcase_overlay">
								<div class="hc_portfolio_showcase_overlay_inner">
									<div class="hc_portfolio_showcase_icons">
										<a title="Health Center" href="#"><i class="fa fa-link"></i></a>
										<a href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg"  data-lightbox="image" title="Health Center" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hc_portfolio_caption">
						<h3><a href="portfolio_datail.html"><?php _e('Responsive Design','health'); ?></a></h3>
						<small><?php _e('Photography','health'); ?></small>	
					</div>
				</div>
				<?php } ?>
		</div>
	</div>	
	<div id="wordpress" class="tab-pane tab-pane fade">
		<div class="row">
			<?php for($i=1; $i<=4; $i++) { ?>
		      <div class="col-md-6 hc_portfolio_area">
					<div class="hc_portfolio_showcase">
						<div class="hc_portfolio_showcase_media">
							<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg">
							<div class="hc_portfolio_showcase_overlay">
								<div class="hc_portfolio_showcase_overlay_inner">
									<div class="hc_portfolio_showcase_icons">
										<a title="Health Center" href="#"><i class="fa fa-link"></i></a>
										<a href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg"  data-lightbox="image" title="Health Center" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hc_portfolio_caption">
						<h3><a href="portfolio_datail.html"><?php _e('Responsive Design','health'); ?></a></h3>
						<small><?php _e('Photography','health'); ?></small>	
					</div>
				</div>
				<?php } ?>
		</div>
	</div>
	<div id="css" class="tab-pane tab-pane fade">
		<div class="row">
			<?php for($i=1; $i<=2; $i++) { ?>
		      <div class="col-md-6 hc_portfolio_area">
					<div class="hc_portfolio_showcase">
						<div class="hc_portfolio_showcase_media">
							<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg">
							<div class="hc_portfolio_showcase_overlay">
								<div class="hc_portfolio_showcase_overlay_inner">
									<div class="hc_portfolio_showcase_icons">
										<a title="Health Center" href="#"><i class="fa fa-link"></i></a>
										<a href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg"  data-lightbox="image" title="Health Center" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hc_portfolio_caption">
						<h3><a href="portfolio_datail.html"><?php _e('Responsive Design','health'); ?></a></h3>
						<small><?php _e('Photography','health'); ?></small>	
					</div>
				</div>
			  <?php } ?>
		</div>
	</div>
	<div id="jquery" class="tab-pane tab-pane fade">
		<div class="row">
		<?php for($i=1; $i<=3; $i++) { ?>
		  <div class="col-md-6 hc_portfolio_area">
				<div class="hc_portfolio_showcase">
					<div class="hc_portfolio_showcase_media">
						<img class="hc_img_responsive" alt="Health Center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg">
						<div class="hc_portfolio_showcase_overlay">
							<div class="hc_portfolio_showcase_overlay_inner">
								<div class="hc_portfolio_showcase_icons">
									<a title="Health Center" href="#"><i class="fa fa-link"></i></a>
									<a href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/portfolio/hc_portfolio1.jpg"  data-lightbox="image" title="Health Center" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="hc_portfolio_caption">
					<h3><a href="portfolio_datail.html"><?php _e('Responsive Design','health'); ?></a></h3>
					<small><?php _e('Photography','health'); ?></small>	
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</div>	
</div>
<!-- /HC Portfolio 2 Column -->
<!-- /HC Testimonial Column -->
<?php get_footer(); ?>