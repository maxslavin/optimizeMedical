<div class="block ui-tabs-panel deactive" id="option-ui-id-5" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_5']))
	{	
		if($_POST['webriti_settings_save_5'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['call_out_text']=$_POST['call_out_text'];
				$current_options['call_out_button_text']=sanitize_text_field($_POST['call_out_button_text']);
				$current_options['call_out_button_link']=sanitize_text_field($_POST['call_out_button_link']);
				if($_POST['call_out_button_link_target'])
				{ echo $current_options['call_out_button_link_target']=sanitize_text_field($_POST['call_out_button_link_target']); } 
				else
				{ echo $current_options['call_out_button_link_target']="off"; } 
				
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_5'] == 2) 
		{
			$current_options['call_out_text']="We Care has a wide range of health care options, from health treatments to surgery procedures...!";
			$current_options['call_out_button_text']="Purchase Now";
			$current_options['call_out_button_link']="#";	
			$current_options['call_out_button_link_target']="on";					
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_5">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Footer Call Out Area','health');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_5_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('5');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('5')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">		
			<h3><?php _e('Call Out Text','health'); ?></h3>
			<textarea rows="4" cols="8" id="call_out_text" name="call_out_text"><?php if($current_options['call_out_text']!='') { echo esc_attr($current_options['call_out_text']); } ?></textarea>
			<span class="explain"><?php _e('Enter the call out text.','health'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Call Out Button Text','health'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="call_out_button_text" id="call_out_button_text" value="<?php if(isset($current_options['call_out_button_text'])) { echo $current_options['call_out_button_text']; } ?>" >
			<span class="explain"><?php _e('Enter the Call Out Button Text.','health'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Call Out Button Link','health'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="call_out_button_link" id="call_out_button_link" value="<?php if(isset($current_options['call_out_button_link'])) { echo $current_options['call_out_button_link']; } ?>" >
			<span class="explain"><?php _e('Enter the Call Out Button Link.','health'); ?></span>
			<p><input type="checkbox" id="call_out_button_link_target" name="call_out_button_link_target" <?php if($current_options['call_out_button_link_target']=='on') echo "checked='checked'"; ?> > <?php _e('Open link in a new window/tab','busi_prof'); ?></p>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_5" name="webriti_settings_save_5" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('5');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('5')" >
		</div>
	</form>
</div>