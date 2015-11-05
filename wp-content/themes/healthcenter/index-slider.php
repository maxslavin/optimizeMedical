<?php/**
* @Theme Name	:	Health-Center
* @file         :	index-slider.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/index-slider.php
*/
?>
<!-- Slider -->
<?php 
$current_options = get_option('hc_pro_options');
$animation= $current_options['animation'];
$animationSpeed=$current_options['animationSpeed'];
$direction=$current_options['slide_direction'];
$slideshowSpeed=$current_options['slideshowSpeed'];
?>
<script>
jQuery(window).load(function() {
 jQuery('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    asNavFor: '#slider'
  });
   
  jQuery('#slider').flexslider({
	animation: "<?php echo $animation; ?>",
	animationSpeed: <?php echo $animationSpeed; ?>,
	direction: "<?php echo $direction; ?>",
	slideshowSpeed: <?php echo $slideshowSpeed; ?>,	
    controlNav: false,
    animationLoop: false,  
    sync: "#carousel"
  });
});
</script>
<div class="hc_slider">
		<?php 	
		$count_posts = wp_count_posts( 'healthcenter_slider')->publish;
		$args = array( 'post_type' => 'healthcenter_slider','posts_per_page' =>$count_posts); 	
		$slider = new WP_Query( $args );
		if( $slider->have_posts() )
		{ ?>
			<div id="slider" class="flexslider">
			<ul class="slides">	
			<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
				<li><?php if(has_post_thumbnail()):?>
						<?php $defalt_arg =array('class' => "img-responsive"); ?>
						<?php the_post_thumbnail('home_slider', $defalt_arg); ?>
						<?php endif; ?>					
				</li>
			<?php endwhile; ?>
			</ul>
		</div>		
		<div id="carousel" class="flexslider">
			<ul class="slides slide_thumb">
				<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
				<li>
					<h5><?php echo the_title(); ?></h5>
					<p><?php echo get_post_meta( get_the_ID(),'slider_text', true ) ; ?></p>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>			
		<?php } else { ?>
		<div id="slider" class="flexslider">
			<ul class="slides">	
			<?php for($i=1; $i<=5; $i++) {  ?>
				<li><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/default/slide<?php echo $i; ?>.png" class="img-responsive" /></li>
			<?php } ?>				
			</ul>
		</div>		
		<div id="carousel" class="flexslider">
			<ul class="slides slide_thumb">
				<?php for($i=1; $i<=5; $i++) {  ?>
				<li>
					<h5><?php _e('Exercise Routines.','health'); ?></h5>
					<p><?php _e('Lorem ipsum dolor sit amet','health'); ?></p>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
</div>	
<!-- /Slider -->