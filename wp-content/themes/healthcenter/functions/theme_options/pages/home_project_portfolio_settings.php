<div class="block ui-tabs-panel deactive" id="option-ui-id-4" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_4']))
	{	
		if($_POST['webriti_settings_save_4'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['portfolio_title'] = sanitize_text_field($_POST['portfolio_title']);
				$current_options['portfolio_description']= sanitize_text_field($_POST['portfolio_description']);
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_4'] == 2) 
		{
			$current_options['portfolio_title'] ='Welcome to Health Center';
			$current_options['portfolio_description'] ='Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet';
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_4">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Project Portfolio','health');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_4_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('4');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('4')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">		
			<h3><?php _e('Portfolio Title','health'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title" id="portfolio_title" value="<?php echo $current_options['portfolio_title']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','health'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description','health'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_description" name="portfolio_description"><?php if($current_options['portfolio_description']!='') { echo esc_attr($current_options['portfolio_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description.','health'); ?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_4" name="webriti_settings_save_4" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('4');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('4')" >
		</div>
		<div class="webriti_spacer"></div>
	</form>
</div>