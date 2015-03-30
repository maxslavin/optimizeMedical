<?php/**
* @Theme Name	:	Health-Center
* @file         :	portfolio-strip.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/portfolio-strip.php
*/
?>
<!-- HC Portfolio Section -->
<div class="container">
	<?php $current_options=get_option('hc_pro_options'); ?>
	<!--HC Portfolio Detail Thumbnail-->
	<script type="text/javascript">	
	jQuery(function() {	
	//	This js For Portfolio Detail page Recent Item
		jQuery('#rec_portfolio').carouFredSel({						
		responsive : true,				
		circular: true,
		prev: '#prev3',
		next: '#next3',
		directon: 'left',
		auto: false,
		items:{visible:{min:1, max:4 } },
		scroll : {
				items : 1,						
				duration : 1000,
				timeoutDuration : 1000
			},
		});			
	});
	</script>	
	<?php $current_options=get_option('hc_pro_options'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="hc_heading_title">
				<?php if($current_options['hc_head_faq']!='') { ?>
				<h3><?php echo $current_options['hc_head_faq']; ?></h3>
				<?php } ?>
				<div class="hc_carousel-navi">
					<div id="prev3" class="hc_carousel-prev"><i class="fa fa-angle-left"></i></div>
					<div id="next3" class="hc_carousel-next"><i class="fa fa-angle-right"></i></div>
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div id="rec_portfolio" class="hc_rec_portfolio_section row pull-left">
			<?php  
			$pp_count_posts = wp_count_posts( 'healthcenter_project')->publish;
			$args = array( 'post_type' => 'healthcenter_project','posts_per_page' =>$pp_count_posts); 	
			$project = new WP_Query( $args ); 
			$class=array('class'=>'hc_img_responsive');
			if( $project->have_posts() )
			{ while ( $project->have_posts() ) : $project->the_post(); ?>
			<?php 
				if(get_post_meta( get_the_ID(),'meta_project_link', true )) 
				{ $meta_project_link=get_post_meta( get_the_ID(),'meta_project_link', true ); }
				else { $meta_project_link = get_post_permalink(); } ?>
				<div class="col-xs-3 col-sm-3 col-md-3 hc_portfolio_area">
					<div class="hc_portfolio_showcase">
						<div class="hc_portfolio_showcase_media">
						<?php $class = array('class'=>'hc_img_responsive');
						if(has_post_thumbnail()):
							the_post_thumbnail('portfolio-4c-thumb',$class); 
							$post_thumbnail_id = get_post_thumbnail_id();
							$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );						
						?>
						<div class="hc_portfolio_showcase_overlay">
							<div class="hc_portfolio_showcase_overlay_inner">
								<div class="hc_portfolio_showcase_icons">
									<a title="Health Center" href="<?php echo $meta_project_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_project_target', true )) { echo "target='_blank'"; }  ?>><i class="fa fa-link"></i></a>
									<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="Health Center" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
					</div>
					<div class="hc_portfolio_caption">
						<h3><a href="<?php echo $meta_project_link; ?>" <?php  if(get_post_meta( get_the_ID(),'meta_project_target', true )) { echo "target='_blank'"; }  ?>><?php echo the_title(); ?></a></h3>
					<small><?php echo get_post_meta( get_the_ID(),'portfolio_client_project_title', true ); ?></small>	
					</div>
				</div>
			<?php endwhile; 
			} ?>				
		</div><!--HC Portfolio Detail Thumbnail-->
	</div>	
</div>