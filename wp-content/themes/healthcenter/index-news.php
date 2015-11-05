<?php/**
* @Theme Name	:	Health-Center
* @file         :	index-slider.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/index-slider.php
*/
?>
<!-- HC Recent News & Why Choose us Section -->
<div class="container">
	<?php $current_options=get_option('hc_pro_options'); ?>
	<div class="row">
		<!--Recent News-->
		<div class="col-md-6 hc_post_section">	
		<div class="hc_heading_title">
		<?php if($current_options['hc_head_news']!='') { ?> 
		<h3><?php echo $current_options['hc_head_news']; ?>	</h3><?php } ?>		
		</div>
		
		<?php 
		$args = array( 'post_type' => 'post','posts_per_page' =>3,'post__not_in'=>get_option("sticky_posts")); 	
		query_posts( $args );
		if(query_posts( $args ))
		{	while(have_posts()):the_post();
			{ 	
			$recent_expet = get_the_excerpt(); ?>
			<div class="media hc_post_area">			
				<aside class="hc_post-date-type">
					<div class="date entry-date updated">
						<div class="day"><?php  echo get_the_date('d'); ?></div>
						<div class="month-year"><?php the_time('M, Y'); ?></div>
					</div>
				</aside>
				<div class="media-body">
					<h4><a href="<?php the_permalink(); ?>" title="webriti" ><?php the_title(); ?></a></h4>
					<p><?php echo $recent_expet; ?></p>
				</div>
			</div>			
			<?php } endwhile; 
			} else  {
			echo "No Posts to show...";
			} ?>
		</div><!--/Recent News-->
		
		<!--Why choose us-->
		<div class="col-md-6 hc_accordion_section">	
			<div class="hc_heading_title">
			<?php if($current_options['hc_head_faq']!='') { ?>
			<h3><?php echo $current_options['hc_head_faq']; ?></h3>
			<?php } ?>
			</div>
		<div class="panel-group" id="accordion">			
			<?php 
			$i=1;
			foreach($current_options['hc_faq'] as $tt)
				{ ?>
				<div class="hc_panel panel-default">
					<div class="hc_panel-heading">
					  <h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
						  <span class="fa fa-<?php if($i=="1"){ ?>minus<?php } else { ?>plus<?php } ?>"></span>
						  <?php echo $tt['faq-title']; ?>
						</a>
					  </h4>
					</div>
					<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php if($i=="1"){ ?> in <?php } ?> ">
						<div class="panel-body">
							<p><?php echo  $tt['faq-text']; ?></p>
						</div>
					</div>
				</div>					
				<?php
					$i=$i+1;
				}
				?>
		</div>
		<!--/Why choose us section-->	
		</div>
	</div>
</div>