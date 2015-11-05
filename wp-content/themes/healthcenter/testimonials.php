<?php
// Template Name: Testimonials
/**
 *	@Theme Name	:	Health-Center
 * 	@file         :	testimonials.php
 * 	@package      :	Health-Center
 * 	@author       :	MaksimSlavin
 * 	@license      :	license.txt
 * 	@filesource   :	wp-content/themes/health-center/testimonials.php
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
<!-- HC Blog right Sidebar Section -->
<div class="container">
    <div class="row hc_blog_wrapper">
        <?php
        $content_page_layout = get_post_meta(get_the_ID(),'content_page_layout', true);
        if($content_page_layout == "fullwidth_left") { get_sidebar(); }
        if($content_page_layout == "fullwidth") { $page_width_type = 12; }
        else { $page_width_type = 8; }
        ?>
        <!--Blog Content-->
        <div class="col-md-<?php echo $page_width_type; ?>">
            <div class="hc_blog_detail_section testimonials">
                <div class="clear"></div>
                <div class="hc_blog_post_content">
                    <?php
                    $count_posts = wp_count_posts( 'health_testimonial')->publish;
                    $args = array('post_type' => 'health_testimonial', 'posts_per_page' => $count_posts);
                    $testis = new WP_Query($args);
                    if( $testis->have_posts() )
                    {
                        // to get author, use $meta_author_designation
                        while ( $testis->have_posts() ) : $testis->the_post();
                            $meta_author_designation = get_post_meta( get_the_ID(),'author_designation_meta_save', true );
                            $meta_desc = get_post_meta( get_the_ID(),'description_meta_save', true );
                            // echo "date: " . get_the_date("M j Y");
                        ?>
                            <div class="hc_blog_section">
                                <div class="hc_post_date">
                                        <span class="date"><?php echo get_the_date("j"); ?></span>
                                        <h6><?php echo get_the_date("M"); ?></h6>
                                        <span class="year"><?php echo get_the_date("Y"); ?></span>
                                </div>
                                <div class="hc_post_title_wrapper">
                                    <h2><?php echo the_title(); ?></h2>
                                    <?php
                                        // Define Start and End tags
                                        $start_tag = "[embed=";
                                        $end_tag = "]";
                                        // Find start and end of embed definition
                                        $start_pos = strpos($meta_desc, $start_tag);
                                        $end_pos = strpos($meta_desc, $end_tag);
                                        // If embed code cannot be found
                                        if($start_pos === true && $end_pos === true) { /* assume plain text, no action needed */ }
                                        else
                                        {
                                            // Parse out the embed address
                                            $embed = substr($meta_desc, $start_pos + strlen($start_tag), $end_pos - ($start_pos + strlen($start_tag)));
                                            // display formatted iframe HTML
                                            $embed = "<iframe width='560' height='315' src='".$embed."' frameborder='0' allowfullscreen></iframe>";
                                            // get text (if any) before and after the embed code
                                            $pre_embed = substr($meta_desc, 0, $start_pos);
                                            $post_embed = substr($meta_desc, $end_pos + strlen($end_tag));
                                            // Replace pseudo-code embed definition with HTML formatted embed, and paragraph tags around pre/post embed text
                                            $meta_desc = (empty($pre_embed) ? "" : "<p>$pre_embed</p>") . $embed . (empty($post_embed) ? "" : "<p>$post_embed</p>");
                                        }
                                    ?>
                                    <p><?php echo $meta_desc ?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?php endwhile;
                    }
                    else {
                        echo "<p>Sorry no testimonials have been posted yet.  Please check back soon.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>