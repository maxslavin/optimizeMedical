<div class="block ui-tabs-panel deactive" id="option-ui-id-8" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_8']))
	{	
		if($_POST['webriti_settings_save_8'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['social_media_twitter_link']=sanitize_text_field($_POST['social_media_twitter_link']);
				$current_options['social_media_facebook_link']=sanitize_text_field($_POST['social_media_facebook_link']);
				$current_options['social_media_linkedin_link']=sanitize_text_field($_POST['social_media_linkedin_link']);
				$current_options['social_media_google_plus']=sanitize_text_field($_POST['social_media_google_plus']);	
			
				// social media in contact page yes ya on
				if($_POST['social_media_in_contact_page_enabled'])
				{ echo $current_options['social_media_in_contact_page_enabled']= sanitize_text_field($_POST['social_media_in_contact_page_enabled']); } 
				else { echo $current_options['social_media_in_contact_page_enabled']="off"; } 
				
				// Social Icons about us page yes or on
				if($_POST['header_social_media_enabled'])
				{ echo $current_options['header_social_media_enabled']= sanitize_text_field($_POST['header_social_media_enabled']); } 
				else { echo $current_options['header_social_media_enabled']="off"; } 
				
				// Social media enabled in footer section yes ya on
				if($_POST['footer_social_media_enabled'])
				{ echo $current_options['footer_social_media_enabled']= sanitize_text_field($_POST['footer_social_media_enabled']); } 
				else { echo $current_options['footer_social_media_enabled']="off"; } 
				
				
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_8'] == 2) 
		{
			$current_options['social_media_in_contact_page_enabled']="on";
			$current_options['header_social_media_enabled']="on";
			$current_options['footer_social_media_enabled']="on";	
			$current_options['social_media_twitter_link']="https://twitter.com/";
			$current_options['social_media_facebook_link']="https://facebook.com/";
			$current_options['social_media_linkedin_link']="https://linkedin.com/";
			$current_options['social_media_google_plus']="https://plus.google.com/";			
			
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_8">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Social media','health');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_8_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_8_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_8_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('8');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('8')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Social media:','health'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['social_media_in_contact_page_enabled']=='on') echo "checked='checked'"; ?> id="social_media_in_contact_page_enabled" name="social_media_in_contact_page_enabled" > <span class="explain"><?php _e('Enable social media in contact page.','health'); ?></span>
			<input type="checkbox" <?php if($current_options['header_social_media_enabled']=='on') echo "checked='checked'"; ?> id="header_social_media_enabled" name="header_social_media_enabled" > <span class="explain"><?php _e('Enable social media on Header.','health'); ?></span>
			<input type="checkbox" <?php if($current_options['footer_social_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_social_media_enabled" name="footer_social_media_enabled" > <span class="explain"><?php _e('Enable Social media in footer section.','health'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Twitter Link:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_twitter_link" id="social_media_twitter_link" value="<?php if($current_options['social_media_twitter_link']!='') { echo esc_attr($current_options['social_media_twitter_link']); } ?>" >
			<span class="explain"><?php  _e('Enter twitter link.','health');?></span>
			</div>
		<div class="section">
			<h3><?php _e('Linkedin Links:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_linkedin_link" id="social_media_linkedin_link" value="<?php if($current_options['social_media_linkedin_link']!='') { echo esc_attr($current_options['social_media_linkedin_link']); } ?>" >
			<span class="explain"><?php  _e('Enter linkedin link.','health');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Facebook Links:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_facebook_link" id="social_media_facebook_link" value="<?php if($current_options['social_media_facebook_link']!='') { echo esc_attr($current_options['social_media_facebook_link']); } ?>" >
			<span class="explain"><?php  _e('Enter facebook link.','health');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Google Plus Links:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="social_media_google_plus" id="social_media_google_plus" value="<?php if($current_options['social_media_google_plus']!='') { echo esc_attr($current_options['social_media_google_plus']); } ?>" >
			<span class="explain"><?php  _e('Enter google plus link.','health');?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_8" name="webriti_settings_save_8" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('8');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('8')" >
		</div>
	</form>
</div>