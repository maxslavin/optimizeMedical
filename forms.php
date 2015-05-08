<?php
// Template Name: Forms
/**
 *	@Theme Name	:	Health-Center
 * 	@file         :	forms.php
 * 	@package      :	Health-Center
 * 	@author       :	MaksimSlavin
 * 	@license      :	license.txt
 * 	@filesource   :	wp-content/themes/health-center/forms.php
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
            <?php $content_page_layout = get_post_meta( get_the_ID(),'content_page_layout', true ); ?>
            <?php if($content_page_layout == "fullwidth_left") {  get_sidebar();  } ?>
            <?php if($content_page_layout == "fullwidth") { $page_width_type=12; } else { $page_width_type = 8; } ?>
            <!--Blog Content-->
            <div class="col-md-<?php echo $page_width_type; ?>">
                <?php the_post(); ?>
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
                    <div class="hc_blog_post_content"><?php /* the_content( __( 'Read More' , 'health' ) ); ?></div> */
                        // Put page content into a variable
                        ob_start();
                        the_content();
                        $content = ob_get_contents();
                        ob_end_clean();

                        $docs_defined = true;
                        while($docs_defined)
                        {
                            // Find start and end of doc definition
                            $start = strpos($content, "[doc ");
                            $end = strpos($content, "][/doc]");
                            if(!$start || !$end) {
                                $docs_defined = false;
                            }
                            else
                            {
                                // Parse out the attributes
                                $attrs_str = substr($content, $start+5, $end-($start+5));
                                $attrs = explode(" || ", $attrs_str);

                                // Build the array
                                $docArr = array();
                                for($i = 0; $i < count($attrs); $i++)
                                {
                                    list($key, $value) = preg_split("[=]", $attrs[$i]);
                                    $docArr[$key] = $value;
                                }

                                // Apply HTML formatting
                                ob_start(); ?>

                                <div class="form_box">
                                    <div class="icon"><img src="<?php echo $docArr["icon"]; ?>" alt="<?php echo $docArr["alt"]; ?>" title="<?php echo $docArr["alt"]; ?>" /></div>
                                    <div class="content"><a href="<?php echo $docArr["url"]; ?>"><?php echo $docArr["title"]; ?></a><p><?php echo $docArr["desc"]; ?></p></div>
                                    <div class="clear"></div>
                                </div>

                                <?php
                                $form_doc = ob_get_contents();
                                ob_end_clean();

                                // Replace pseudo-code doc definition with HTML formatted version, within content
                                $content = substr($content, 0, $start) . $form_doc . substr($content, $end+7);
                            }
                        }

                        // Display the content
                        echo $content;
                    ?>
                    </div>
                </div>
                <?php comments_template('',true); ?>
            </div>
            <?php if($content_page_layout == "fullwidth_right") {  get_sidebar(); } ?>
        </div>
    </div>
<?php get_footer(); ?>