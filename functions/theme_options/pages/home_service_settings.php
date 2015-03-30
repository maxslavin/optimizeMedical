<div class="block ui-tabs-panel deactive" id="option-ui-id-3" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_3']))
	{	
		if($_POST['webriti_settings_save_3'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['site_intro_tex'] = sanitize_text_field($_POST['site_intro_tex']); 
				$current_options['call_now_text'] = sanitize_text_field($_POST['call_now_text']); 
				$current_options['call_now_number'] = $_POST['call_now_number'];
				$current_options['service_title'] = sanitize_text_field($_POST['service_title']);
				$current_options['service_description'] = sanitize_text_field($_POST['service_description']);
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_3'] == 2) 
		{
			$current_options['site_intro_tex']="Welcome to Health Center";
			$current_options['call_now_text']="Call Now";
			$current_options['call_now_number']="+1 800 55 55555";
			$current_options['service_title']='Awesome Services';
			$current_options['service_description'] ='Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.';
			
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_3">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Service Settings','health');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_3_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">			
			<h3><?php _e('Site intro','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="site_intro_tex" id="site_intro_tex" value="<?php echo $current_options['site_intro_tex']; ?>" >
			<span class="explain"><?php _e('Add your site intro text.','health'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Call Now Text','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="call_now_text" id="call_now_text" value="<?php echo $current_options['call_now_text']; ?>" >
			<span class="explain"><?php _e('Add your Call Now Tex text.','health'); ?></span>
		</div>
		<div class="section">	
			<h3><?php _e('Call Now Number','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="call_now_number" id="call_now_number" value="<?php echo $current_options['call_now_number']; ?>" >
			<span class="explain"><?php _e('Add your Call Now Number.','health'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Awesome Services','health'); ?></h3>
			<hr>
			<h3><?php _e('Services Title','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title" id="service_title" value="<?php echo $current_options['service_title']; ?>" >
			<span class="explain"><?php _e('Enter the service title.','health'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Services Description','health'); ?></h3>
			<textarea rows="3" cols="8" id="service_description" name="service_description"><?php if($current_options['service_description']!='') { echo esc_attr($current_options['service_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service description.','health'); ?></span>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_3" name="webriti_settings_save_3" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
		</div>
	</form>
</div>