<?php
// Template Name: Contact Custom
/**
 *	@Theme Name	:	Health-Center
 * 	@file         :	contact-custom.php
 * 	@package      :	Health-Center
 * 	@author       :	MaksimSlavin
 * 	@license      :	license.txt
 * 	@filesource   :	wp-content/themes/health-center/contact-custom.php
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

                        $maps_defined = true;
                        while($maps_defined)
                        {
                            // Define Start and End tags
                            $start_tag = "[gmap ";
                            $end_tag = "][/gmap]";
                            // Locate them within the content
                            $start_pos = strpos($content, $start_tag);
                            $end_pos = strpos($content, $end_tag);

                            if($start_pos === false || $end_pos === false) {
                                $maps_defined = false;
                            }
                            else
                            {
                                // Parse out the attributes
                                $attrs_str = substr($content, $start_pos + strlen($start_tag), $end_pos - ($start_pos + strlen($start_tag)));
                                $attrs = explode(" || ", $attrs_str);

                                // Build the array
                                $mapArr = array();
                                for($i = 0; $i < count($attrs); $i++)
                                {
                                    list($key, $value) = preg_split("[==]", $attrs[$i]);
                                    $mapArr[$key] = $value;
                                }

                                // Apply HTML formatting
                                ob_start(); ?>

                                <div class="hc_google_map gmap <?php if($mapArr["seq"] == 2) { echo "gmap2"; } ?>">
                                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $mapArr["src"]; ?>"></iframe>
                                    <div class="hc_contactv1_address">
                                        <h3><?php echo $mapArr["loc_title"]; ?></h3>
                                        <address><?php echo $mapArr["loc_addr"]; ?></address>
                                        <h5><?php echo $mapArr["sub_title1"]; ?></h5>
                                        <p><?php echo $mapArr["sub_text1"]; ?></p>
                                        <h5><?php echo $mapArr["sub_title2"]; ?></h5>
                                        <p><?php echo $mapArr["sub_text2"]; ?></p>
                                    </div>
                                </div>

                                <?php
                                $map_section = ob_get_contents();
                                ob_end_clean();

                                // Replace pseudo-code map definition with HTML formatted version, within content
                                if($mapArr["seq"] == 2) {
                                    $content = substr($content, 0, $start_pos) . $map_section . "<div class='clear'></div>" . substr($content, $end_pos + strlen($end_tag));
                                }
                                else {
                                    // Replace pseudo-code map definition with HTML formatted version, within content
                                    $content = substr($content, 0, $start_pos) . $map_section . substr($content, $end_pos + strlen($end_tag));
                                }
                            }
                        }

                        // Display the content
                        echo $content;  ?>
                    </div>
                </div>
                <?php comments_template('',true); ?>
            </div>
            <?php if($content_page_layout == "fullwidth_right") {  get_sidebar(); } ?>
        </div>
    </div>
<?php get_footer(); ?>