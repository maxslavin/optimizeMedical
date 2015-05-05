<?php
// Template Name: Appointments
/**
*	@Theme Name	:	Health-Center
* 	@file         :	appointments.php
* 	@package      :	Health-Center
* 	@author       :	MaksimSlavin
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/health-center/appointments.php
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
                <div class="hc_blog_post_content"><?php the_content( __( 'Read More' , 'health' ) ); ?></div>
                <div class="hc_blog_post_content">
                    <div id="myformdata" class="hc_comment_form_section" style="margin-bottom:0px;">
                        <form method="post" action"">
                        <?php wp_nonce_field('hc_name_nonce_check','hc_name_nonce_field'); ?>
                        <div class="hc_form_group">
                            <label>Full Name <small>*</small></label>
                            <input type="text" id="fullname" name="fullname" class="hc_con_input_control" value="<?php echo $_POST['fullname']; ?>">
                            <span style="display:none; color:red" id="fullname_error">Please Enter Your Full Name</span>
                        </div>
                        <div class="hc_form_group">
                            <label>E-Mail Address <small>*</small></label>
                            <input type="email" id="email_addr" name="email_addr" class="hc_con_input_control" value="<?php echo $_POST['email_addr']; ?>">
                            <span style="display:none; color:red" id="email_addr_error">Please Enter A Valid E-Mail Address</span>
                        </div>
                        <div class="hc_form_group">
                            <label>Phone Number <small>*</small></label>
                            <input type="tel" id="phone_number" name="phone_number" class="hc_con_input_control" value="<?php echo $_POST['phone_number']; ?>">
                            <span style="display:none; color:red" id="phone_number_error">Please Enter A Valid Phone Number</span>
                        </div>
                        <div class="hc_form_group">
                            <label>Service of Interest <small>*</small></label>
                            <select id="service" name="service" class="hc_con_input_control">
                                <option value=""></option>
                                <option value="chiro" <?php if($_POST['service'] == "chiro") { echo "selected='selected'"; } ?>>Chiropractic Care</option>
                                <option value="cosmetic" <?php if($_POST['service'] == "cosmetic") { echo "selected='selected'"; } ?>>Cosmetic Procedures</option>
                                <option value="endo" <?php if($_POST['service'] == "endo") { echo "selected='selected'"; } ?>>Functional Endocrinology</option>
                                <option value="weight" <?php if($_POST['service'] == "weight") { echo "selected='selected'"; } ?>>Medical Weight Loss</option>
                                <option value="nutri" <?php if($_POST['service'] == "nutri") { echo "selected='selected'"; } ?>>Nutrition Injections</option>
                                <option value="physmed" <?php if($_POST['service'] == "physmed") { echo "selected='selected'"; } ?>>Physical Medicine</option>
                                <option value="therapy" <?php if($_POST['service'] == "therapy") { echo "selected='selected'"; } ?>>Physical Therapy</option>
                                <option value="prolo" <?php if($_POST['service'] == "prolo") { echo "selected='selected'"; } ?>>Prolotherapy</option>
                                <option value="injury" <?php if($_POST['service'] == "injury") { echo "selected='selected'"; } ?>>Sports Injury</option>
                            </select>
                            <span style="display:none; color:red" id="service_error">Please Select The Service You Are Interested In.</span>
                        </div>
                        <div class="hc_form_group">
                            <div style="float:left;">
                                <label>Preferred Location <small>*</small></label>
                                <select id="location" name="location" class="hc_con_input_control" style="width:150px;">
                                    <option value=""></option>
                                    <option value="west" <?php if($_POST['location'] == "west") { echo "selected='selected'"; } ?>>West LA</option>
                                    <option value="downtown" <?php if($_POST['location'] == "downtown") { echo "selected='selected'"; } ?>>Downtown LA</option>
                                </select>
                            </div>
                            <div style="float:left; margin-left:85px;">
                                <label>Preferred Day of Week <small>*</small></label>
                                <select id="day" name="day" class="hc_con_input_control" style="width:130px;">
                                    <option value="any" <?php if($_POST['day'] == "any") { echo "selected='selected'"; } ?>>Any</option>
                                    <option value="mon" <?php if($_POST['day'] == "mon") { echo "selected='selected'"; } ?>>Monday</option>
                                    <option value="tue" <?php if($_POST['day'] == "tue") { echo "selected='selected'"; } ?>>Tuesday</option>
                                    <option value="wed" <?php if($_POST['day'] == "wed") { echo "selected='selected'"; } ?>>Wednesday</option>
                                    <option value="thu" <?php if($_POST['day'] == "thu") { echo "selected='selected'"; } ?>>Thursday</option>
                                    <option value="fri" <?php if($_POST['day'] == "fri") { echo "selected='selected'"; } ?>>Friday</option>
                                    <option value="sat" <?php if($_POST['day'] == "sat") { echo "selected='selected'"; } ?>>Saturday</option>
                                    <option value="sun" <?php if($_POST['day'] == "sun") { echo "selected='selected'"; } ?>>Sunday</option>
                                </select>
                            </div>
                            <div style="float:left; margin-left:85px;">
                                <label>Preferred Time <small>*</small></label>
                                <select id="time" name="time" class="hc_con_input_control" style="width:130px;">
                                    <option value="any" <?php if($_POST['time'] == "any") { echo "selected='selected'"; } ?>>Any</option>
                                    <option value="morning" <?php if($_POST['time'] == "morning") { echo "selected='selected'"; } ?>>Morning</option>
                                    <option value="afternoon" <?php if($_POST['time'] == "afternoon") { echo "selected='selected'"; } ?>>Afternoon</option>
                                    <option value="evening" <?php if($_POST['time'] == "evening") { echo "selected='selected'"; } ?>>Evening</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div style="display:none; color:red" id="location_error">Please Enter Your Preferred Location</div>
                            <div style="display:none; color:red" id="day_error">Please Enter Your Preferred Day of the Week</div>
                            <div style="display:none; color:red" id="time_error">Please Enter Your Preferred Appointment Time</div>
                        </div>
                        <div class="appointments_button"><button type="submit" id="submit_request" name="submit_request" class="hc_btn">Request Appointment</button></div>
                        <span style="display:none; color:red" id="contact_nonce_error"><?php _e('Sorry, we were not able to process your request because your nonce did not verify.','health'); ?></span>
                        </form>
                    </div>
                    <div id="mailsentbox" style="display:none">
                        <div class="alert alert-success" >
                            <strong><?php _e('Thank  you!','health');?></strong> <?php _e('You have successfully sent your appointment request. Someone from our office will contact you shortly.','health');?>
                        </div>
                    </div>
                </div>
            </div>
            <?php comments_template('',true); ?>
        </div>
        <?php if($content_page_layout == "fullwidth_right") {  get_sidebar(); } ?>
    </div>


    <?php
        if(isset($_POST['submit_request']))
        {
            $flag = 1;
            if(empty($_POST['fullname']))
            {
                $flag = 0;
                echo "<script>jQuery('#fullname_error').show();</script>";
            }
            else if(empty($_POST['email_addr']) || (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$_POST['email_addr'])))
            {
                $flag = 0;
                echo "<script>jQuery('#email_addr_error').show();</script>";
            }
            else if(empty($_POST['phone_number']) || strlen(preg_replace('/\D/', '', $_POST['phone_number'])) < 10 || str_contains_only($_POST["phone_number"],"()- 0123456789") == false)
            {
                $flag = 0;
                echo "<script>jQuery('#phone_number_error').show();</script>";
            }
            else if(!wp_verify_nonce($_POST['hc_name_nonce_field'],'hc_name_nonce_check'))
            {
                echo "<script>jQuery('#contact_nonce_error').show();</script>";
                exit;
            }
            else if(empty($_POST['service']))
            {
                $flag = 0;
                echo "<script>jQuery('#service_error').show();</script>";
            }
            else if(empty($_POST['location']))
            {
                $flag = 0;
                echo "<script>jQuery('#location_error').show();</script>";
            }
            else
            {
                if($flag == 1)
                {
                    $to = get_option('admin_email');
                    $subject = "Appointment Request";
                    $massage = "Name:: " . trim($_POST['fullname']) .
                        "\r\nEmail:: " . trim($_POST['email_addr']) .
                        "\r\nPhone:: " . trim($_POST['phone_number']) .
                        "\r\nService of Interest:: " . $_POST['service'] .
                        "\r\nPreferred Location:: " . $_POST['location'] .
                        "\r\nPreferred Day of Week:: " . $_POST['day'] .
                        "\r\nPreferred Time:: " . $_POST['time'];
                    $headers = "From: " . trim($_POST['fullname']) . " <" . trim($_POST['email_addr']) . ">\r\nReply-To:" . trim($_POST['email_addr']);
                    $maildata = wp_mail($to, $subject, $massage, $headers);

                    echo "<script>jQuery('#myformdata').hide();</script>";
                    echo "<script>jQuery('#mailsentbox').show();</script>";
                }
            }
        }

        //======================== START OF FUNCTION ==========================//
        // FUNCTION: str_contains_only                                         //
        //=====================================================================//
        /**
         * Checks whether a string contains only characters specified in the gama.
         * @param String $string
         * @param String $gama
         * @return boolean
         */
        function str_contains_only($string, $gama)
        {
            $chars = str_split($string);
            $gama = str_split($gama);
            foreach($chars as $char) {
                if(in_array($char, $gama) == false) return false;
            }
            return true;
        }
        //=====================================================================//
        //  FUNCTION: str_contains_only                                        //
        //========================= END OF FUNCTION ===========================//
    ?>


</div>
<?php get_footer(); ?>