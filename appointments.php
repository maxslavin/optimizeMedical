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
                        <div class="hc_form_group">
                            <label>Full Name <small>*</small></label>
                            <input type="text" id="name" name="name" class="hc_con_input_control">
                            <span style="display:none; color:red" id="name_error">Please Enter Your Full Name</span>
                        </div>
                        <div class="hc_form_group">
                            <label>E-Mail Address <small>*</small></label>
                            <input type="text" id="email" name="email" class="hc_con_input_control">
                            <span style="display:none; color:red" id="email_error">Please Enter Your E-Mail</span>
                        </div>
                        <div class="hc_form_group">
                            <label>Phone Number <small>*</small></label>
                            <input type="text" id="phone" name="phone" class="hc_con_input_control">
                            <span style="display:none; color:red" id="phone_error">Please Enter Your Phone Number</span>
                        </div>
                        <div class="hc_form_group">
                            <label>Service of Interest <small>*</small></label>
                            <select id="service" name="service" class="hc_con_input_control">
                                <option value=""></option>
                                <option value="chiro">Chiropractic Care</option>
                                <option value="cosmetic">Cosmetic Procedures</option>
                                <option value="endo">Functional Endocrinology</option>
                                <option value="weight">Medical Weight Loss</option>
                                <option value="nutri">Nutrition Injections</option>
                                <option value="physmed">Physical Medicine</option>
                                <option value="therapy">Physical Therapy</option>
                                <option value="prolo">Prolotherapy</option>
                                <option value="injury">Sports Injury</option>
                            </select>
                            <span style="display:none; color:red" id="service_error">Please Enter Your Service of Interest</span>
                        </div>
                        <div class="hc_form_group">
                            <div style="float:left;">
                                <label>Preferred Location <small>*</small></label>
                                <select id="location" name="location" class="hc_con_input_control" style="width:150px;">
                                    <option value=""></option>
                                    <option value="west">West LA</option>
                                    <option value="downtown">Downtown LA</option>
                                </select>
                            </div>
                            <div style="float:left; margin-left:85px;">
                                <label>Preferred Day of Week <small>*</small></label><select id="day" name="day" class="hc_con_input_control" style="width:130px;">
                                    <option value=""></option>
                                    <option value="mon">Monday</option>
                                    <option value="tue">Tuesday</option>
                                    <option value="wed">Wednesday</option>
                                    <option value="thu">Thursday</option>
                                    <option value="fri">Friday</option>
                                    <option value="sat">Saturday</option>
                                    <option value="sun">Sunday</option>
                                </select>
                            </div>
                            <div style="float:left; margin-left:85px;">
                                <label>Preferred Time <small>*</small></label><select id="time" name="time" class="hc_con_input_control" style="width:130px;">
                                    <option value=""></option>
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                    <option value="evening">Evening</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div style="display:none; color:red" id="location_error">Please Enter Your Preferred Location</div>
                            <div style="display:none; color:red" id="day_error">Please Enter Your Preferred Day of the Week</div>
                            <div style="display:none; color:red" id="time_error">Please Enter Your Preferred Appointment Time</div>
                        </div>
                        <div class="appointments_button"><button type="submit" id="submit_request" name="submit_request" class="hc_btn">Request Appointment</button></div>
                        </form>
                    </div>
                    <div id="mailsentbox" style="display:none">
                        <div class="alert alert-success" >
                            <strong><?php _e('Thank  you!','health');?></strong> <?php _e('You successfully sent contact information...','health');?>
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
            if(empty($_POST['name']))
            {
                $flag = 0;
                echo "<script>jQuery('#name_error').show();</script>";
            }
            else
            {
                if($flag == 1)
                {
                    $to = get_option('admin_email');
                    $subject = "Appointment Request";
                    $massage = stripslashes(trim($_POST['user_comment']))."Message sent from:: ".trim($_POST['email']);
                    $headers = "From: ".trim($_POST['name'])." <".trim($_POST['email']).">\r\nReply-To:".trim($_POST['email']);
                    $maildata = wp_mail($to, $subject, $massage, $headers);

                    echo "<script>jQuery('#myformdata').hide();</script>";
                    echo "<script>jQuery('#mailsentbox').show();</script>";

                }
            }
        }
    ?>


</div>
<?php get_footer(); ?>