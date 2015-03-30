<div class="block ui-tabs-panel deactive" id="option-ui-id-9" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_9']))
	{	
		if($_POST['webriti_settings_save_9'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['hc_contact_google_map_url']=sanitize_text_field($_POST['hc_contact_google_map_url']);
				// Google map enabled in contact page yes ya on
				if($_POST['contact_google_map_enabled'])
				{ echo $current_options['contact_google_map_enabled']= sanitize_text_field($_POST['contact_google_map_enabled']); } 
				else { echo $current_options['contact_google_map_enabled']="off"; } 
				
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_9'] == 2) 
		{
			$current_options['contact_google_map_enabled']="on";
			$current_options['hc_contact_google_map_url']='https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538';					
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_9">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Google Maps','health');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_9_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_9_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_9_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('9');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('9')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Google Map in contact page :','health'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['contact_google_map_enabled']=='on') echo "checked='checked'"; ?> id="contact_google_map_enabled" name="contact_google_map_enabled" > <span class="explain"><?php _e('Enable Google map on contact page.','health'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Google Map URL:','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_contact_google_map_url" id="hc_contact_google_map_url" value="<?php if($current_options['hc_contact_google_map_url']!='') { echo esc_attr($current_options['hc_contact_google_map_url']); } ?>" >
			<span class="icons help">
				<span class="tooltip"><?php  _e('Enter google map url.','health');?></span>
			</span>		
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_9" name="webriti_settings_save_9" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('9');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('9')" >
		</div>
	</form>
</div>