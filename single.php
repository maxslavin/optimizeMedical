<?php
/*	@Theme Name	:	Health-Center
* 	@file         :	single.php
* 	@package      :	Health-Center
* 	@author       :	VibhorPurandare
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/single.php
*/
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="hc_blog_detail_header_section">
				<?php the_post(); ?>
				<div class="hc_post_date"><span class="date"><?php echo the_date('j'); ?></span><h6><?php echo the_time('M'); ?></h6>
					<span class="year"><?php echo the_time('Y'); ?></span>
				</div>				
				<div class="hc_post_title_wrapper">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>					
					<div class="hc_post_detail">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
							<a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php comments_number( 'no comments', 'one comments', '% comments' ); ?></a>
							<?php if(get_the_tag_list() != '') { ?>
							<div class="hc_tags">
							<i class="fa fa-tags"></i><a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', '<br />'); ?></a>					
							</div>
							<?php } ?>
					</div>
				</div>
				<div class="clear"></div>	
			</div>
		</div>
	</div>
</div>
<!-- /HC Page Header Section -->
<!-- HC Blog right Sidebar Section -->	
<div class="container">
	<div class="row hc_blog_wrapper">
	<?php $content_post_layout = get_post_meta( get_the_ID(),'content_post_layout', true ); ?>
	<?php if($content_post_layout == "fullwidth_left") { get_sidebar(); } ?>
	<?php if($content_post_layout == "fullwidth") { $page_width_type=12; } else { $page_width_type = 8; } ?>
		<!--Blog Content-->
		<div class="col-md-<?php echo $page_width_type; ?>">
				<div class="hc_blog_detail_section">
					<div class="hc_blog_post_img">
						<?php $defalt_arg =array('class' => "img-responsive" ); ?>
						<?php if(has_post_thumbnail()): ?>
						<a  href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('health_center-blog_detail', $defalt_arg); ?>
						</a>
						<?php endif;?>				
					</div>
					<div class="hc_blog_post_content"><p><?php the_content( __( 'Read More' , 'health' ) ); ?></p></div>	
				</div>
			<?php // Disable Comments comments_template('',true); ?>
		</div>
		<?php if($content_post_layout == "fullwidth_right") { get_sidebar(); } ?>
		</div>
	</div>
<?php get_footer(); ?>