<script>
jQuery(function() {
	//	This js For Homepage Testimonial Section
	jQuery('#hc_testimonial').carouFredSel({
		responsive : true,				
		circular: true,
		prev: '#prev3',
		next: '#next3',
		directon: 'left',
		auto: false,
		items:{visible:{min:1, max:2} },
		scroll : {
				items : 1,						
				duration : 1000,
				timeoutDuration : 1000
			},
	});				
});
</script>
<!-- Testimonial Section -->
<div class="container">
<?php $current_options=get_option('hc_pro_options'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="hc_heading_title">
			<?php if($current_options['hc_head_testimonial']!='') { ?>
				<h3><?php echo $current_options['hc_head_testimonial']; ?></h3>				
				<?php } ?>
				<div class="hc_carousel-navi">
					<div id="prev3" class="hc_carousel-prev"><i class="fa fa-angle-left"></i></div>
					<div id="next3" class="hc_carousel-next"><i class="fa fa-angle-right"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div id="hc_testimonial" class="row pull-left">	
	<?php $count_posts = wp_count_posts( 'health_testimonial')->publish;			
		$args = array( 'post_type' => 'health_testimonial','posts_per_page' =>$count_posts) ; 	
		$testis = new WP_Query( $args );
		if( $testis->have_posts() )
		{	while ( $testis->have_posts() ) : $testis->the_post();
			$meta_author_designation =  get_post_meta( get_the_ID(),'author_designation_meta_save', true ); 
			$meta_desc =  get_post_meta( get_the_ID(),'description_meta_save', true ); 
		?><div class="col-xs-12 col-sm-12 col-md-6 hc_testimonials_area">
				<div class="hc_testimonials_area_content">
					<p><?php echo $meta_desc; ?></p>				
				</div>
				<div class="hc_testimonials_area_content_bottom_arrow ">
					<div class="inner_area"></div>
				</div>
				<div class="hc_testimonials_user">
					<div class="hc_testimonials_avatar_wrapper">
						<?php $defalt_arg =array('class' => 'avatar avatar-45 photo'); ?>
						<div class="hc_testimonials_avatar">
						<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail('health_center_testimonial',$defalt_arg ); ?>
						<?php endif; ?>
						</div>
					</div>
					<h4 class="hc_testimonials_title"><?php the_title(); ?></h4>
					<div class="hc_testimonials_position"><?php echo $meta_author_designation; ?></div>
				</div>
			</div>
			<?php endwhile;
		} else { for($i=1; $i<7; $i++) { ?>
			<div class="col-xs-12 col-sm-12 col-md-6 hc_testimonials_area">
				<div class="hc_testimonials_area_content">
					<p><?php _e('Lorem ipsum dolor sit amet, contetur dipisultriciesem  Unlimited CoCras pulvin mauris,  contetur dipisultriciesem  Unlimited CoCras pulvinmauri at soicitudin.','health'); ?></p>				
				</div>
				<div class="hc_testimonials_area_content_bottom_arrow ">
					<div class="inner_area"></div>
				</div>
				<div class="hc_testimonials_user">
					<div class="hc_testimonials_avatar_wrapper">
						<div class="hc_testimonials_avatar">
							<img alt="" src="<?php echo WEBRITI_TEMPLATE_DIR_URI;?>/images/hc2.png" class="avatar avatar-45 photo" height="45" width="45">
						</div>
					</div>
					<h4 class="hc_testimonials_title"><?php _e('John Doe','health'); ?></h4>
					<div class="hc_testimonials_position"><?php _e('Author','health'); ?></div>
				</div>
			</div>			
			<?php } 
			} ?>
		</div>			
</div>
<!-- /Testimonial Section -->