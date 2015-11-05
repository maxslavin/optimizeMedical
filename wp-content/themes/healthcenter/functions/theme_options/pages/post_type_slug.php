<div class="block ui-tabs-panel deactive" id="option-ui-id-13" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_13']))
	{	
		if($_POST['webriti_settings_save_13'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['hc_slider_slug']=sanitize_text_field($_POST['hc_slider_slug']);
				$current_options['hc_service_slug']=sanitize_text_field($_POST['hc_service_slug']);
				$current_options['hc_portfolio_slug']=sanitize_text_field($_POST['hc_portfolio_slug']);
				$current_options['hc_testimonial_slug']=sanitize_text_field($_POST['hc_testimonial_slug']);
				$current_options['hc_team_slug']=sanitize_text_field($_POST['hc_team_slug']);
				
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_13'] == 2) 
		{
			$current_options['hc_slider_slug']= "healthcenter_slider";
			$current_options['hc_service_slug']= "healthcenter_service";		
			$current_options['hc_portfolio_slug']= "healthcenter_project";
			$current_options['hc_testimonial_slug']= "healthcenter_testimonial";
			$current_options['hc_team_slug']= "healthcenter_team";
			
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_13">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Post Type Slug','health');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_13_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_13_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_13_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('13');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('13')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">		
			<h3><?php _e('Slider Slug','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="hc_slider_slug" id="hc_slider_slug" value="<?php echo $current_options['hc_slider_slug']; ?>" >
			<span class="explain"><?php _e('Enter slider slug.','health'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Service Slug','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="hc_service_slug" id="hc_service_slug" value="<?php echo $current_options['hc_service_slug']; ?>" >
			<span class="explain"><?php _e('Enter service slug.','health'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Testimonial Slug','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="hc_testimonial_slug" id="hc_testimonial_slug" value="<?php echo $current_options['hc_testimonial_slug']; ?>" >
			<span class="explain"><?php _e('Enter testimonial slug.','health'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio/Project Slug','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="hc_portfolio_slug" id="hc_portfolio_slug" value="<?php echo $current_options['hc_portfolio_slug']; ?>" >
			<span class="explain"><?php _e('Enter portfolio slug.','health'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Our Team Slug','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="hc_team_slug" id="hc_team_slug" value="<?php echo $current_options['hc_team_slug']; ?>" >
			<span class="explain"><?php _e('Enter our team slug.','health'); ?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_13" name="webriti_settings_save_13" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('13');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('13')" >
		</div>
	</form>
</div>