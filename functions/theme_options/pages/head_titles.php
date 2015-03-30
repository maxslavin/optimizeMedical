<div class="block ui-tabs-panel deactive" id="option-ui-id-15" >	
	<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_15']))
	{	
		if($_POST['webriti_settings_save_15'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
							
				$current_options['hc_head_news']=sanitize_text_field($_POST['hc_head_news']);
				$current_options['hc_head_faq']=sanitize_text_field($_POST['hc_head_faq']);
				$current_options['hc_head_testimonial']=$_POST['hc_head_testimonial'];
				$current_options['hc_head_one_team']=$_POST['hc_head_one_team'];
				$current_options['hc_head_two_team']=$_POST['hc_head_two_team'];
				$current_options['hc_head_team_tagline']=$_POST['hc_head_team_tagline'];
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_15'] == 2) 
		{	
			$current_options['hc_head_news']="Recent News";
			$current_options['hc_head_faq']="Why Choose Us?";			
			$current_options['hc_head_testimonial']="Testmonials";			
			$current_options['hc_head_one_team']="Meet Our";
			$current_options['hc_head_two_team']="Great Team";
			$current_options['hc_head_team_tagline']="We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.";
			
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_15">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Section Headings','health');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_15_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('15');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('15')" >
				</td>
				</tr>
			</table>	
		</div>	
		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Home Page News Section Heading','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_head_news" id="hc_head_news" value="<?php if($current_options['hc_head_news']!='') { echo esc_attr($current_options['hc_head_news']); } ?>" >		
				<span class="explain"><?php  _e('Enter Heading for News Section.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Home Page FAQ Heading','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_head_faq" id="hc_head_faq" value="<?php if($current_options['hc_head_faq']!='') { echo esc_attr($current_options['hc_head_faq']); } ?>" >		
				<span class="explain"><?php  _e('Enter Heading for FAQ Section.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Home Page Testmonials Heading','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_head_testimonial" id="hc_head_testimonial" value="<?php if($current_options['hc_head_testimonial']!='') { echo esc_attr($current_options['hc_head_testimonial']); } ?>" >		
				<span class="explain"><?php  _e('Enter Heading for Testimonials Section.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('About Us Page Team Heading One','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_head_one_team" id="hc_head_one_team" value="<?php if($current_options['hc_head_one_team']!='') { echo esc_attr($current_options['hc_head_one_team']); } ?>" >		
				<span class="explain"><?php  _e('Enter Team Heading One for ABOUT US Page.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('About Us Page Team Heading Two','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_head_two_team" id="hc_head_two_team" value="<?php if($current_options['hc_head_two_team']!='') { echo esc_attr($current_options['hc_head_two_team']); } ?>" >		
				<span class="explain"><?php  _e('Enter Team Heading Two for ABOUT US Page.','health');?></span>
		</div>
		<div class="section">
			<h3><?php _e('About Us Page Team Tag line','health');?></h3>
			<input class="webriti_inpute"  type="text" name="hc_head_team_tagline" id="hc_head_team_tagline" value="<?php if($current_options['hc_head_team_tagline']!='') { echo esc_attr($current_options['hc_head_team_tagline']); } ?>" >		
				<span class="explain"><?php  _e('Enter Team Tag line for ABOUT US Page.','health');?></span>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_15" name="webriti_settings_save_15" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('15');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('15')" >
		</div>
	</form>
</div>