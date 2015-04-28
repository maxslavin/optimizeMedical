<?php
// Template Name: Service Template 
/**
* @Theme Name	:	Health-Center
* @file         :	service-template.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/service-template.php
*/
?>
<?php get_header(); ?>	
<!-- HC Page Header Section -->	
<div class="container">
	<div class="row">
		<div class="hc_page_header_area">
			<h1><?php the_title();?></h1>			
		</div>
	</div>
</div>
<!-- /HC Page Header Section -->	
	
<!-- HC Service Section -->	
<div class="container healthcare-services">
	<div class="row">
	<?php  
	$count_posts = wp_count_posts( 'healthcenter_service')->publish;
	$args = array( 'post_type' => 'healthcenter_service','posts_per_page' =>$count_posts, 'orderby' => 'menu_order', 'order' => 'ASC' );
    $service = new WP_Query( $args );
	if( $service->have_posts() )
	{ while ( $service->have_posts() ) : $service->the_post(); ?>
		<div class="col-md-4 col-sm-6">
			<div class="media hc_service_section">
				<?php if(get_post_meta( get_the_ID(),'meta_service_link', true )) 
					{ $meta_service_link=get_post_meta( get_the_ID(),'meta_service_link', true ); }
					else { $meta_service_link = get_post_permalink(); } ?>
				<div class="pull-left">					
					<div class="pull-left" href="#">				
						<i class="fa <?php echo get_post_meta( get_the_ID(),'service_icon_image', true ) ; ?> hc_main_service"></i>
					</div>
				</div>
				<div class="media-body">
					<h3><a href="<?php echo $meta_service_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_service_target', true )) { echo "target='_blank'"; }  ?>><?php echo the_title(); ?></a></h3>
					<p><?php echo get_service_template_excerpt(); ?></p>
				</div>
			</div>
		</div>
	<?php endwhile;
	} else { for($i=1; $i<=6; $i++) { ?>		
		<div class="col-md-4">
			<div class="media hc_service_section">
				<div class="pull-left" href="#">
					<div class="pull-left" href="#">				
						<i class="fa fa-bullhorn hc_main_service"></i>
					</div>
				</div>
				<div class="media-body">
					<h3><a href="#"><?php _e('Awesome Slider Post','health'); ?></a></h3>
					<p><?php _e('Lorem ipsum dolor sit amet, consectetur Unlimited ColorsCras pulvin, mauris at so mauris at lectus lectus.','health'); ?></p>
				</div>
			</div>
		</div>
		<?php }
		} //Default service end ?>	
	</div>
</div>
<!-- /HC Service Column -->
<?php /* get_template_part('index','testimonials'); */ ?>
<!-- /HC Testimonial Column -->
<?php get_footer(); ?>