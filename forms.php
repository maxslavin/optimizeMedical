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

                        // Define counter to uniquely identify doc hyperlinks
                        $aId = 1;

                        $docs_defined = true;
                        while($docs_defined)
                        {
                            // Define Start and End tags
                            $start_tag = "[doc ";
                            $end_tag = "][/doc]";
                            // Find start and end of doc definition
                            $start_pos = strpos($content, $start_tag);
                            $end_pos = strpos($content, $end_tag);
                            if(!$start_pos || !$end_pos) {
                                $docs_defined = false;
                            }
                            else
                            {
                                // Parse out the attributes
                                $attrs_str = substr($content, $start_pos + strlen($start_tag), $end_pos - ($start_pos + strlen($start_tag)));
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

                                <div class="form_box" onclick="document.getElementById('doc<?php echo $aId; ?>').click();">
                                    <div class="icon"><img src="<?php echo $docArr["icon"]; ?>" alt="<?php echo $docArr["alt"]; ?>" title="<?php echo $docArr["alt"]; ?>" /></div>
                                    <div class="content"><a href="<?php echo $docArr["url"]; ?>" id="doc<?php echo $aId; ?>"><?php echo $docArr["title"]; ?></a><p><?php echo $docArr["desc"]; ?></p></div>
                                    <div class="clear"></div>
                                </div>

                                <?php
                                $form_doc = ob_get_contents();
                                ob_end_clean();

                                // Replace pseudo-code doc definition with HTML formatted version, within content
                                $content = substr($content, 0, $start_pos) . $form_doc . substr($content, $end_pos + strlen($end_tag));

                                // Increment counter
                                $aId++;
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