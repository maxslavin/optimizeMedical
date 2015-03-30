<?php
// Template Name: Contact-Us
/**
* @Theme Name	:	Health-Center
* @file         :	contact-page.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/contact-page.php
*/
?>
<?php get_header(); ?>	
<!-- HC Contact Form Section -->
<?php $current_options=get_option('hc_pro_options'); 
	$mapsrc= $current_options['hc_contact_google_map_url']; 
	$mapsrc=$mapsrc.'&amp;output=embed';
?>
<div class="container">
	<div class="row">
		<div class="hc_page_header_area">
			<h1><?php the_title(); ?></h1>							
		</div>
	</div>
</div>
	
<!-- HC Google Map Section -->	
<?php if($current_options['contact_google_map_enabled'] == "on"){?>
<div class="container">
	<div class="row hc_contactv1_section">		
		<div class="col-md-12 hc_google_map">			
			<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $mapsrc; ?>"></iframe>
		</div>
	</div>
</div>
<?php } ?>
<!-- /HC Google Map Section -->
<div class="container">
	<div class="row">	
		<div class="col-md-8 hc_contactv1_area">
		<div id="myformdata">
			<?php if($current_options['hc_send_usmessage']!='') { ?>
			<h2><?php echo $current_options['hc_send_usmessage']; ?></h2>
			<?php } ?>
			<form role="form" method="post"  action="">
				<?php wp_nonce_field('hc_name_nonce_check','hc_name_nonce_field'); ?>
				<div class="hc_form_group">
					<label for="user_name"><?php _e('Name','health'); ?><small>*</small></label>
					<input type="text" id="user_name" name="user_name" class="hc_con_input_control">
					<span  style="display:none; color:red" id="contact_user_name_error"><?php _e('Please Enter Your Name','health'); ?> </span>
				</div>
				<div class="hc_form_group">
					<label for="user_email"><?php _e('Email','health'); ?><small>*</small></label>
					<input type="email" id="user_email" name="user_email" class="hc_con_input_control">
					<span  style="display:none; color:red" id="contact_email_error"><?php _e('Please Enter valid email','health'); ?> </span>
				</div>
				<div class="hc_form_group">
					<label for="user_website"><?php _e('Website','health'); ?></label>
					<input type="text" id="user_website" name= "user_website" class="hc_con_input_control">
				</div>
				<div class="hc_form_group">
					<label for="Comment"><?php _e('Comment','health') ?></label>
					<textarea class="hc_con_textarea_control" name="user_comment" id="user_comment" rows="5"></textarea>
					<span  style="display:none; color:red" id="contact_massage_error"><?php _e('Please Enter your contact message','health'); ?></span>
				</div>
				<button class="hc_btn" type="submit" name="contact_submit" id="contact_submit"><?php _e('Send Message','health'); ?></button>
				<span  style="display:none; color:red" id="contact_nonce_error"><?php _e('Sorry, your nonce did not verify','health');?></span>			</form>
		</div>
		<div id="mailsentbox" style="display:none">
				<div class="alert alert-success" >
					<strong><?php _e('Thank  you!','health');?></strong> <?php _e('You successfully sent contact information...','health');?>
				</div>
		</div>
		</div>		
		
		<div class="col-md-4 hc_contactv1_sidebar">
						
			<div class="hc_contactv1_address">
				<?php if($current_options['hc_get_in_touch']!='') { ?>
				<h3><?php echo $current_options['hc_get_in_touch']; ?></h3>
				<?php } ?>
				<address>
				  <?php if($current_options['hc_contact_address']!='')
				  { echo $current_options['hc_contact_address']; } ?><br>
				  <?php if($current_options['hc_contact_address_two']!='')
				  { echo $current_options['hc_contact_address_two']; } ?><br>
				  <?php if($current_options['hc_contact_phone_number']!='') { ?>
				  <abbr title="Phone"><?php _e('Phone','health'); ?>:</abbr><?php echo $current_options['hc_contact_phone_number']; ?><br>
				  <?php } ?>
				  <?php if($current_options['hc_contact_fax_number']!='') { ?>
				  <abbr title="Fax"><?php _e('Fax','health'); ?>:</abbr><?php echo $current_options['hc_contact_fax_number']; ?><br>
				  <?php } ?>
				  <?php if($current_options['hc_contact_email']!='') { ?>
				  <abbr title="Email"><?php _e('Email','health')?>:</abbr> <a href="mailto:#">info@healthcenter.com</a><br>
				  <?php } ?>
				</address>
  			</div>
			<?php if($current_options['social_media_in_contact_page_enabled'] =='on') { ?>
			<div class="hc_contactv1_address">
				<h3><?php _e('Social Network','health'); ?></h3>
				<div class="hc_contactv1_social">
				<?php if($current_options['social_media_facebook_link']!='') { ?>
					<a href="<?php echo $current_options['social_media_facebook_link']; ?>" title="Facebook" class="facebook">&nbsp;</a>
				<?php }
					if($current_options['social_media_twitter_link']!='') { ?>
					<a href="<?php echo $current_options['social_media_twitter_link']; ?>" title="Twitter" class="twitter">&nbsp;</a>
				<?php }
					if($current_options['social_media_linkedin_link']!='') { ?>
					<a href="<?php echo $current_options['social_media_linkedin_link']; ?>" title="Linked-id" class="linked_in">&nbsp;</a>
				<?php }
					if($current_options['social_media_google_plus']!='') { ?>
					<a href="<?php echo $current_options['social_media_google_plus']; ?>" title="Google+" class="google_plus">&nbsp;</a>
				<?php } ?>
				</div>
			</div>	
			<?php } ?>
		</div>		
	</div>
	<?php 
		if(isset($_POST['contact_submit']))
		{ 	$flag=1;
			if(empty($_POST['user_name']))
			{	
				$flag=0;
				echo "<script>jQuery('#contact_user_name_error').show();</script>";
			}else
			if($_POST['user_email']=='') 
			{	
				$flag=0;
				echo "<script>jQuery('#contact_email_error').show();</script>";
			}else
			if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$_POST['user_email'])) 
			{	
				$flag=0;
				echo "<script>jQuery('#contact_email_error').show();</script>";
			}else
			if($_POST['user_comment']=='')
			{
				$flag=0;
				echo "<script>jQuery('#contact_massage_error').show();</script>";
			}else
			if(empty($_POST) || !wp_verify_nonce($_POST['hc_name_nonce_field'],'hc_name_nonce_check') )
			{
				echo "<script>jQuery('#contact_nonce_error').show();</script>";
			   exit;
			}
			else
			{	if($flag==1)
				{	
					$to = get_option('admin_email');
					$subject = "MAIL FROM YOUR WORDPRESS BLOG SITE";
					$massage = stripslashes(trim($_POST['user_comment']))."Message sent from:: ".trim($_POST['user_email']);
					$headers = "From: ".trim($_POST['user_name'])." <".trim($_POST['user_email']).">\r\nReply-To:".trim($_POST['user_email']);
					$maildata =wp_mail($to, $subject, $massage, $headers);
					
					echo "<script>jQuery('#myformdata').hide();</script>";
					echo "<script>jQuery('#mailsentbox').show();</script>";
					
				}
			}
		}
		?>
		
</div>
<!-- /HC Contact Form Section -->
<?php get_footer(); ?>