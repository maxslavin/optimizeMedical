<?php
/*	@Theme Name	:	Health-Center
* 	@file         :	page.php
* 	@package      :	Health-Center
* 	@author       :	VibhorPurandare
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/page.php
*/
?>
<?php get_header(); ?>
<!-- HC Page Header Section -->
<div class="container">
	<div class="row">
        <?php /* Maks Slavin - Start: Replace Blog Style Title with Std Title */ ?>
        <div class="hc_page_header_area">
            <h1><?php the_title();?></h1>
        </div>
        <?php /* Maks Slavin - End: Replace Blog Style Title with Std Title */ ?>

        <!--div class="col-md-12">
			<div class="hc_page_detail_header_section">
				<?php the_post(); ?>	
				<div class="hc_post_date"><span class="date"><?php echo the_date('j'); ?></span><h6><?php echo the_time('M'); ?></h6>
					<span class="year"><?php echo the_time('Y'); ?></span>
				</div>
				<div class="hc_post_title_wrapper">									
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>					
					<div class="hc_post_detail">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
						<?php /* Disable Comments <a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php comments_number( 'no comments', 'one comments', '% comments' ); ?></a> */ ?>
					</div>
				</div>
				<div class="clear"></div>	
			</div>
		</div-->
	</div>
</div>
<!-- /HC Page Header Section -->
<!-- HC Blog right Sidebar Section -->	
<div class="container">
	<div class="row hc_blog_wrapper">
		<?php $content_page_layout = get_post_meta( get_the_ID(),'content_page_layout', true ); ?>
		<?php if($content_page_layout == "fullwidth_left") {  get_sidebar();  } ?>
		<?php if($content_page_layout == "fullwidth") { $page_width_type=12; } else { $page_width_type = 8; } ?>
		<!--Blog Content-->
		<div class="col-md-<?php echo $page_width_type; ?>">
			<div class="hc_blog_detail_section">					
				<div class="clear"></div>
				<?php $defalt_arg =array('class' => "img-responsive" ); ?>
				<?php if(has_post_thumbnail()): ?>
				<div class="hc_blog_post_img">					
					<a  href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('health_center-blog_detail', $defalt_arg); ?>
					</a>	
				</div>
				<?php endif; ?>	
				<div class="hc_blog_post_content"><?php the_content( __( 'Read More' , 'health' ) ); ?></div>	
			</div>
			<?php comments_template('',true); ?>
		</div>
		<?php if($content_page_layout == "fullwidth_right") {  get_sidebar(); } ?>
	</div>
</div>
<?php get_footer(); ?>