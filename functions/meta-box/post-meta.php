<?php
/************ Home slider meta post ****************/
add_action('admin_init','health_center_init');
function health_center_init()
	{
		$layout = array( 'post', 'page' );
		add_meta_box('home_slider_meta', 'Description', 'hc_meta_slider', 'healthcenter_slider', 'normal', 'high');
		add_meta_box('home_service_meta', 'featured Service', 'hc_meta_service', 'healthcenter_service', 'normal', 'high');
		add_meta_box('health_testimonilas', 'Description', 'health_meta_testimonial', 'health_testimonial', 'normal', 'high');
		add_meta_box('home_project_meta', 'Portfolio Featured Project Details', 'hc_meta_project', 'healthcenter_project', 'normal', 'high');
		add_meta_box('health_team_member', 'Our Team', 'health_meta_team', 'healthcenter_team', 'normal', 'high');
		add_meta_box('health_page', 'Page Layout', 'page_layout_meta', 'page', 'normal', 'high');
		add_meta_box('health_post', 'Post Layout', 'post_layout_meta', 'post', 'normal', 'high');
		
		add_action('save_post','health_center_meta_save');
	}	
	function post_layout_meta()
	{
		global $post ;
		$content_post_layout=sanitize_text_field( get_post_meta( get_the_ID(), 'content_post_layout', true ));
		if(!$content_post_layout) { $content_post_layout= "fullwidth"; } 
		?>
		<p>
		<input id="radio1" 	<?php if($content_post_layout == "fullwidth") { echo "checked"; } ?> type="radio" name="content_post_layout" value="fullwidth">
		<label for="radio1" <?php if($content_post_layout == "fullwidth") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/full-width.png"></label>
		<input  id="radio2" <?php if($content_post_layout == "fullwidth_left") { echo "checked"; } ?> type="radio" name="content_post_layout" value="fullwidth_left">
		<label for="radio2" <?php if($content_post_layout == "fullwidth_left") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/left-sidebar.png"></label>
		<input  id="radio3" <?php if($content_post_layout == "fullwidth_right") { echo "checked"; } ?> type="radio" name="content_post_layout" value="fullwidth_right">
		<label for="radio3" <?php if($content_post_layout == "fullwidth_right") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/right-sidebar1.png"></label>
		<p/>			
		<?php
	}
	function page_layout_meta()
	{
		global $post ;
		$content_page_layout=sanitize_text_field( get_post_meta( get_the_ID(), 'content_page_layout', true ));
		if(!$content_page_layout) { $content_page_layout= "fullwidth"; }
		?>
		<p>
			<input id="radio1" 	<?php if($content_page_layout == "fullwidth") { echo "checked"; } ?> type="radio" name="content_page_layout" value="fullwidth">
			<label for="radio1" <?php if($content_page_layout == "fullwidth") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/full-width.png"></label>
			<input  id="radio2" <?php if($content_page_layout == "fullwidth_left") { echo "checked"; } ?> type="radio" name="content_page_layout" value="fullwidth_left">
			<label for="radio2" <?php if($content_page_layout == "fullwidth_left") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/left-sidebar.png"></label>
			<input  id="radio3" <?php if($content_page_layout == "fullwidth_right") { echo "checked"; } ?> type="radio" name="content_page_layout" value="fullwidth_right">
			<label for="radio3" <?php if($content_page_layout == "fullwidth_right") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/right-sidebar1.png"></label>
		<p/>
		<?php
	}
	
	// code for slider banner description
	function hc_meta_slider()
	{	global $post ;
		$slider_text=sanitize_text_field( get_post_meta( get_the_ID(), 'slider_text', true ));
		$slider_url=sanitize_text_field( get_post_meta( get_the_ID(), 'slider_url', true ));
		?>	
		<p><label><?php _e('Slider text','health');?></label></p> 
		<p><input class="inputwidth"  name="slider_text" id="slider_text" style="width: 480px" placeholder="Enter slider text " type="text" value="<?php if (!empty($slider_text)) echo esc_attr($slider_text);?>"> </input></p>		
		<?php
	}

	// code for service description
	function hc_meta_service()
	{	global $post ;
		
		$service_icon_image =sanitize_text_field( get_post_meta( get_the_ID(), 'service_icon_image', true ));
		$meta_service_link =sanitize_text_field( get_post_meta( get_the_ID(), 'meta_service_link', true ));
		$meta_service_target =sanitize_text_field( get_post_meta( get_the_ID(), 'meta_service_target', true ));
	?>	
		<p><h4 class="heading"><?php _e('Service Icon (Using Font Awesome icons name) like: fa-rub .','health');?> <label style="margin-left:10px;"><a target="_blank" href="http://fontawesome.io/icons/"> <?php _e('Get your fontawesome icons.','health') ;?></a></label></h4>
		<p><input class="inputwidth"  name="service_icon_image" id="service_icon_image" style="width: 480px" placeholder="Enter the fontawesome icon" type="text" value="<?php if (!empty($service_icon_image)) echo esc_attr($service_icon_image);?>"> </input></p>	
		<p><h4 class="heading"><?php _e('Service Link','Health');?></h4>
		<p><input type="checkbox" id="meta_service_target" name="meta_service_target" <?php if($meta_service_target) echo "checked"; ?> ><?php _e('Open link in a new window/tab','health'); ?></p>
		<p><input class="inputwidth"  name="meta_service_link" id="meta_service_link" style="width: 480px" placeholder="Enter the service link" type="text" value="<?php if (!empty($meta_service_link)) echo esc_attr($meta_service_link);?>"> </input></p>
		
<?php }
	//Meta boxes for testimonials
	function health_meta_testimonial()
	{	global $post ;
		$description_meta_save=sanitize_text_field( get_post_meta( get_the_ID(), 'description_meta_save', true ));
		$author_designation_meta_save=sanitize_text_field( get_post_meta( get_the_ID(), 'author_designation_meta_save', true ));	
		?>	
		<p><label><?php _e('Testimonial Description','health');?></label>	</p>
		<p><textarea name="description_meta_save" id="description_meta_save" style="width: 480px; height: 56px; padding: 0px;" placeholder="Enter Desc for your Testimonial"  rows="3" cols="10" ><?php if (!empty($description_meta_save)) echo esc_textarea( $description_meta_save ); ?></textarea></p>
		<p><label><?php _e('Testimonial Author Designation','health');?></label></p> 
		<p><input class="inputwidth" name="author_designation_meta_save" id="author_designation_meta_save" style="width: 480px;" placeholder="Author Designation"	type="text" value="<?php if (!empty($author_designation_meta_save)) echo esc_attr($author_designation_meta_save);?>"></input></p>	
	<?php
	}

// code for project description
	function hc_meta_project()
	{	global $post ;		
		$portfolio_client_project_title =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_client_project_title', true ));
		$meta_project_target =sanitize_text_field( get_post_meta( get_the_ID(), 'meta_project_target', true ));
		$meta_project_link =sanitize_text_field( get_post_meta( get_the_ID(), 'meta_project_link', true ));
		$portfolio_project_visit_site =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_project_visit_site', true ));
		$portfolio_project_summary =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_project_summary', true ));
	?>
	<p><h4 class="heading"><?php _e('Portfolio / Project Link','Health');?></h4>
	<p><input class="inputwidth"  name="meta_project_link" id="meta_project_link" style="width: 480px" placeholder="Enter the project / portfolio link" type="text" value="<?php if (!empty($meta_project_link)) echo esc_attr($meta_project_link);?>"> </input></p>	
	<p><input type="checkbox" id="meta_project_target" name="meta_project_target" <?php if($meta_project_target) echo "checked"; ?> ><?php _e('Open link in a new window/tab','health'); ?></p>
	<p><h4 class="heading"><?php _e('Your clients','health');?></h4>
	<p><input class="inputwidth"  name="portfolio_client_project_title" id="portfolio_client_project_title" style="width: 480px" placeholder="Enter the client title, For example: Webriti" type="text" value="<?php if (!empty($portfolio_client_project_title)) echo esc_attr($portfolio_client_project_title);?>"> </input></p>	
	<p><h4 class="heading"><?php _e('Visit Website URL','health');?></h4>
	<p><input class="inputwidth"  name="portfolio_project_visit_site" id="portfolio_project_visit_site" style="width: 480px" placeholder="Enter visit site url, For example: : http://webriti.com" type="text" value="<?php if (!empty($portfolio_project_visit_site)) echo esc_attr($portfolio_project_visit_site);?>"> </input></p>
	<p><h4 class="heading"><?php _e('Summay Text','health');?></h4>
	<p><input class="inputwidth"  name="portfolio_project_summary" id="portfolio_project_summary" style="width: 480px" placeholder="Enter the single line text summary" type="text" value="<?php if (!empty($portfolio_project_summary)) echo esc_attr($portfolio_project_summary);?>"> </input></p>	
	
<?php }

	function health_meta_team()
	{ 
		global $post;
		$designation = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_designation', true ));
		$description = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_description', true ));
		$fb_url = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_fb_url', true ));
		$fb_url_cb = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_fb_url_cb', true ));
		$twt_url = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_twt_url', true ));
		$twt_url_cb = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_twt_url_cb', true ));
		$lnkd_url = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_lnkd_url', true ));
		$lnkd_url_cb = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_lnkd_url_cb', true ));
		$google_url = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_google_url', true ));
		$google_url_cb = sanitize_text_field( get_post_meta( get_the_ID(), 'meta_google_url_cb', true ));
	?>
	<p><h4 class="heading"><?php _e('Members Designation','health');?></h4></p>
	<p><input class="inputwidth"  name="designation" id="designation" style="width: 480px" placeholder="Enter Member's Designation Here" type="text" value="<?php if (!empty($designation)) echo esc_attr($designation);?>"></input></p>
	<p><h4 class="heading"><?php _e('Role Description','health');?></h4></p>
	<p><textarea name="description" id="description" style="width: 480px; height: 56px; padding: 0px;" placeholder="Describe the Roles for the member(Use max-word 140)"  rows="3" cols="10" ><?php if (!empty($description)) echo esc_textarea( $description ); ?></textarea></p>	
	
	<p><h4 class="heading"><span><?php _e('Social Media Setting','health');?></span></h4>
	<p><h4 class="heading"><label><?php _e('Facebook','health');?></label></h4>
	<input style="width:80%;padding: 10px;"  name="fb_url" id="fb_url" placeholder="Enter Your Fb's URL in https formate" value="<?php if(!empty($fb_url)) echo esc_attr($fb_url); ?>"/>
	<input type="checkbox" name="fb_url_cb" value="1"<?php if(isset($fb_url_cb)) checked($fb_url_cb,'1') ; ?> /></p>
	<p><h4 class="heading"><?php _e('Twitter Url','health')?></h4>	 
	 <p><input style="width:80%; padding: 10px;"  name="twt_url" id="twt_url" placeholder="Enter Your Twitter's URL in https formate"  value="<?php if(!empty($twt_url)) echo esc_attr($twt_url); ?>"/>	
	<input type="checkbox" name="twt_url_cb" value="1"<?php if(isset($twt_url_cb)) checked($twt_url_cb,'1') ; ?> /></p>
	
	<p><h4 class="heading"><label><?php _e('LinkedIn Url','health');?></label></h4>
	<input style="width:80%;padding: 10px;"  name="lnkd_url" id="lnkd_url" placeholder="Enter Your LinkedIn's URL in https formate" value="<?php if(!empty($lnkd_url)) echo esc_attr($lnkd_url); ?>"/>
	<input type="checkbox" name="lnkd_url_cb" value="1" <?php if(isset($lnkd_url_cb)) checked($lnkd_url_cb,'1') ; ?> /></p>
	
	<p><h4 class="heading"><label><?php _e('Google Url','health');?></label></h4>
	<input style="width:80%; padding: 10px;"  name="google_url" id="google_url" placeholder="Enter Your Google's URL in https formate" value="<?php if(!empty($google_url)) echo esc_attr($google_url); ?>"/>
	<input type="checkbox" name="google_url_cb" value="1" <?php if(isset($google_url_cb)) checked($google_url_cb,'1') ; ?> /></p>
	
	<?php
	}

function health_center_meta_save($post_id) 
{	if ( ! current_user_can( 'edit_page', $post_id ) )
	{     return ;	} 		
	if(isset( $_POST['post_ID']))
	{ 	
		$post_ID = $_POST['post_ID'];				
		$post_type=get_post_type($post_ID);
		if($post_type=='healthcenter_slider'){
			if(isset($_POST['slider_text'])) {
			update_post_meta($post_ID, 'slider_text', sanitize_text_field($_POST['slider_text']));
			}
		} 
		elseif($post_type=='healthcenter_service'){
			if(isset($_POST['service_icon_image'])) {
			update_post_meta($post_ID, 'service_icon_image', sanitize_text_field($_POST['service_icon_image']));				
			}			
			if(isset($_POST['meta_service_link'])) {
			update_post_meta($post_ID, 'meta_service_link', sanitize_text_field($_POST['meta_service_link']));
			}
			if(isset($_POST['meta_service_target'])) {
			update_post_meta($post_ID, 'meta_service_target', sanitize_text_field($_POST['meta_service_target']));
			}
		}
		elseif($post_type=='health_testimonial') {
			if(isset($_POST['description_meta_save'])) {
			update_post_meta($post_ID, 'description_meta_save', sanitize_text_field($_POST['description_meta_save']));
			}
			if(isset($_POST['author_designation_meta_save'])) {
			update_post_meta($post_ID, 'author_designation_meta_save', sanitize_text_field($_POST['author_designation_meta_save']));
			}
		}	
		elseif($post_type=='healthcenter_project'){	
			if(isset($_POST['portfolio_client_project_title'])) {
			update_post_meta($post_ID, 'portfolio_client_project_title', sanitize_text_field($_POST['portfolio_client_project_title']));
			}
			if(isset($_POST['meta_project_target'])) {
			update_post_meta($post_ID, 'meta_project_target', sanitize_text_field($_POST['meta_project_target']));	
			}
			if(isset($_POST['meta_project_link'])) {
			update_post_meta($post_ID, 'meta_project_link', sanitize_text_field($_POST['meta_project_link']));	
			}
			if(isset($_POST['portfolio_project_visit_site'])) {
			update_post_meta($post_ID, 'portfolio_project_visit_site', sanitize_text_field($_POST['portfolio_project_visit_site']));
			}
			if(isset($_POST['portfolio_project_summary'])) {
			update_post_meta($post_ID, 'portfolio_project_summary', sanitize_text_field($_POST['portfolio_project_summary']));
			}
		}
		elseif($post_type=='healthcenter_team'){
			if(isset($_POST['designation'])) {
			update_post_meta($post_ID, 'meta_designation', sanitize_text_field($_POST['designation']));	
			}
			if(isset($_POST['description'])) {
			update_post_meta($post_ID, 'meta_description', sanitize_text_field($_POST['description']));
			}
			if(isset($_POST['fb_url'])) {
			update_post_meta($post_ID, 'meta_fb_url', sanitize_text_field($_POST['fb_url']));
			}
			if(isset($_POST['fb_url_cb'])) {
			update_post_meta($post_ID, 'meta_fb_url_cb', sanitize_text_field($_POST['fb_url_cb']));
			}
			if(isset($_POST['twt_url'])) {
			update_post_meta($post_ID, 'meta_twt_url', sanitize_text_field($_POST['twt_url']));
			}
			if(isset($_POST['twt_url_cb'])) {
			update_post_meta($post_ID, 'meta_twt_url_cb', sanitize_text_field($_POST['twt_url_cb']));
			}
			if(isset($_POST['lnkd_url'])) {
			update_post_meta($post_ID, 'meta_lnkd_url', sanitize_text_field($_POST['lnkd_url']));
			}
			if(isset($_POST['lnkd_url_cb'])) {
			update_post_meta($post_ID, 'meta_lnkd_url_cb', sanitize_text_field($_POST['lnkd_url_cb']));
			}
			if(isset($_POST['google_url'])) {
			update_post_meta($post_ID, 'meta_google_url', sanitize_text_field($_POST['google_url']));
			}
			if(isset($_POST['google_url_cb'])) {
			update_post_meta($post_ID, 'meta_google_url_cb', sanitize_text_field($_POST['google_url_cb']));
			}
		}
		elseif($post_type=='page'){
			if(isset($_POST['content_page_layout'])) {
			update_post_meta($post_ID, 'content_page_layout', sanitize_text_field($_POST['content_page_layout']));	
			}
		}
		elseif($post_type=='post'){
			if(isset($_POST['content_post_layout'])) {
			update_post_meta($post_ID, 'content_post_layout', sanitize_text_field($_POST['content_post_layout']));
			}
		}			
	}			
} 
?>