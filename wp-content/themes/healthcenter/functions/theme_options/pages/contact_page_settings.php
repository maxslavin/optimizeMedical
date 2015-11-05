<div class="block ui-tabs-panel deactive" id="option-ui-id-7" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_7']))
	{	
		if($_POST['webriti_settings_save_7'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['hc_get_in_touch']=sanitize_text_field($_POST['hc_get_in_touch']);
				//$current_options['hc_get_in_touch_description']=sanitize_text_field($_POST['rambo_get_in_touch_description']);
				
				$current_options['hc_send_usmessage']=sanitize_text_field($_POST['hc_send_usmessage']);
				$current_options['hc_contact_address']=sanitize_text_field($_POST['hc_contact_address']);
				$current_options['hc_contact_address_two']=$_POST['hc_contact_address_two'];
				$current_options['hc_contact_phone_number']=sanitize_text_field($_POST['hc_contact_phone_number']);
				$current_options['hc_contact_fax_number']=sanitize_text_field($_POST['hc_contact_fax_number']);
				$current_options['hc_contact_email']=sanitize_text_field($_POST['hc_contact_email']);
				$current_options['hc_contact_website']=sanitize_text_field($_POST['hc_contact_website']);
			
				// service section enabled yes ya on
				if($_POST['hc_get_in_touch_enabled'])
				{ echo $current_options['hc_get_in_touch_enabled']= sanitize_text_field($_POST['hc_get_in_touch_enabled']); } 
				else { echo $current_options['hc_get_in_touch_enabled']="off"; } 
				
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_7'] == 2) 
		{	
			$current_options['hc_get_in_touch_enabled']="on";	
			$current_options['hc_get_in_touch']="Get in Touch";
			$current_options['hc_get_in_touch_description']="Lorem ipsum dolor sit amet, usu rebum errem pericula ea, ei alia quaerendum vix. Ea justo tritani sit, odio ignota quo te. Lorem ipsum dolor sit amet.";			
			$current_options['hc_send_usmessage']="Send Us a Message";	
			$current_options['hc_contact_address']="25, Lorem Lis Street";
			$current_options['hc_contact_address_two']="Dhanmandi California, US";
			$current_options['hc_contact_phone_number']="420-300-3850";
			$current_options['hc_contact_fax_number']="800 123 3456";			
			$current_options['hc_contact_email']="info@hctheme.com";
			$current_options['hc_contact_website']="https://www.healthcenter.com";				
			
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_7">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Contact Information','hc');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_7_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_7_success" ><?php _e('Options data successfully Saved','rambo');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_7_reset" ><?php _e('Options data successfully reset','rambo');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('7');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('7')" >
				</td>
				</tr>
			</table>	
		</div>	
		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Get in Touch','health'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['hc_get_in_touch_enabled']=='on') echo "checked='checked'"; ?> id="hc_get_in_touch_enabled" name="hc_get_in_touch_enabled" > <span class="explain"><?php _e('Enable Get in touch in contact page.','rambo'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Get in Touch Text:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_get_in_touch" id="hc_get_in_touch" value="<?php if($current_options['hc_get_in_touch']!='') { echo esc_attr($current_options['hc_get_in_touch']); } ?>" >
			<span class="explain"><?php  _e('Enter Get in touch text.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Send Us a Message Text:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_send_usmessage" id="hc_send_usmessage" value="<?php if($current_options['hc_send_usmessage']!='') { echo esc_attr($current_options['hc_send_usmessage']); } ?>" >
			<span class="explain"><?php  _e('Enter Get in touch text.','health');?></span>
		</div>		
		<div class="section">
			<h3><?php _e('Contact Address Line One:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_contact_address" id="hc_contact_address" value="<?php if($current_options['hc_contact_address']!='') { echo esc_attr($current_options['hc_contact_address']); } ?>" >
			<span class="explain"><?php  _e('Enter Contact address.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Contact Address Line Two:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_contact_address_two" id="hc_contact_address_two" value="<?php if($current_options['hc_contact_address_two']!='') { echo esc_attr($current_options['hc_contact_address_two']); } ?>" >
			<span class="explain"><?php  _e('Enter Contact address.','health');?></span>
		</div>		
		<div class="section">
			<h3><?php _e('Contact Phone Number:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_contact_phone_number" id="hc_contact_phone_number" value="<?php if($current_options['hc_contact_phone_number']!='') { echo esc_attr($current_options['hc_contact_phone_number']); } ?>" >
			<span class="explain"><?php  _e('Enter Contact phone number.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Contact Fax Number:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_contact_fax_number" id="hc_contact_fax_number" value="<?php if($current_options['hc_contact_fax_number']!='') { echo esc_attr($current_options['hc_contact_fax_number']); } ?>" >
			<span class="explain"><?php  _e('Enter Contact fax number.','health');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Contact Email:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_contact_email" id="hc_contact_email" value="<?php if($current_options['hc_contact_email']!='') { echo esc_attr($current_options['hc_contact_email']); } ?>" >
			<span class="explain"><?php  _e('Enter Contact email address.','health');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Website :','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_contact_website" id="hc_contact_website" value="<?php if($current_options['hc_contact_website']!='') { echo esc_attr($current_options['hc_contact_website']); } ?>" >
			<span class="explain"><?php  _e('Enter your website address.','health');?></span>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_7" name="webriti_settings_save_7" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('7');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('7')" >
		</div>
	</form>
</div>