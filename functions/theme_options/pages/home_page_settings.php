<div class="block ui-tabs-panel active" id="option-ui-id-1" >
<?php $current_options = get_option('hc_pro_options');
	if(isset($_POST['webriti_settings_save_1']))
	{	
		if($_POST['webriti_settings_save_1'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{	$current_options['front_page'] = sanitize_text_field($_POST['front_page']); 
				$current_options['hc_stylesheet']=sanitize_text_field($_POST['hc_stylesheet']);
				$current_options['upload_image_logo']=sanitize_text_field($_POST['upload_image_logo']);			
				$current_options['height']=sanitize_text_field($_POST['height']);
				$current_options['width']=sanitize_text_field($_POST['width']);
				$current_options['upload_image_favicon']=sanitize_text_field($_POST['upload_image_favicon']);
				$current_options['google_analytics'] = $_POST['google_analytics'];
				$current_options['webrit_custom_css'] =$_POST['webrit_custom_css'];
				$current_options['layout_selector'] =$_POST['layout_selector'];
				$current_options['hc_back_image'] =$_POST['hc_back_image'];
				if($_POST['hc_texttitle'])
				{ echo $current_options['hc_texttitle']=sanitize_text_field($_POST['hc_texttitle']); } 
				else
				{ echo $current_options['hc_texttitle']="off"; } 
				
				// Custom Background Enable
				if($_POST['custom_background_enabled'])
				{ echo $current_options['custom_background_enabled']=sanitize_text_field($_POST['custom_background_enabled']); } 
				else
				{ echo $current_options['custom_background_enabled']="off"; }
				
				update_option('hc_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_1'] == 2) 
		{
			$current_options['front_page'] = "on" ;
			$current_options['layout_selector']	= "wide";
			$current_options['hc_stylesheet']="default.css";
			$current_options['hc_back_image']="bg_img1.png";
			$current_options['upload_image_logo']="";
			$current_options['height']=50;
			$current_options['width']=150;
			$current_options['upload_image_favicon']="";
			$current_options['hc_texttitle']="on";
			$current_options['custom_background_enabled']="off";
			$current_options['google_analytics']="";
			$current_options['webrit_custom_css']="";		
			update_option('hc_pro_options',$current_options);
		}
	}  ?>
	<?php $current_options['front_page']; ?>
	<form method="post" id="webriti_theme_options_1">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Quick Start Settings','health');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_1_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_1_success" ><?php _e('Options data successfully Saved','health');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_1_reset" ><?php _e('Options data successfully reset','health');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('1');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('1')" >
				</td>
				</tr>
			</table>			
		</div>	
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Front Page','health'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['front_page']=='on') echo "checked='checked'"; ?> id="front_page" name="front_page" > <span class="explain"><?php _e('Enable front page .','health'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Theme Color Schemes','health'); ?></h3>
			<?php $hc_stylesheet = $current_options['hc_stylesheet']; ?>	
			<select id="hc_stylesheet" name="hc_stylesheet" class="webriti_inpute">
				<option <?php echo selected($hc_stylesheet, 'default.css' ); ?> ><?php _e('default.css','health'); ?></option>
				<option <?php echo selected($hc_stylesheet, 'blue.css' ); ?> ><?php _e('blue.css','health'); ?></option>
				<option <?php echo selected($hc_stylesheet, 'green.css' ); ?> ><?php _e('green.css','health'); ?></option>
				<option <?php echo selected($hc_stylesheet, 'orange.css' ); ?> ><?php _e('orange.css','health'); ?></option>
				<option <?php echo selected($hc_stylesheet, 'pink.css' ); ?> ><?php _e('pink.css','health'); ?></option>
				<option <?php echo selected($hc_stylesheet, 'gray.css' ); ?> ><?php _e('gray.css','health'); ?></option>
				<option <?php echo selected($hc_stylesheet, 'purple.css' ); ?> ><?php _e('purple.css','health'); ?></option>
				<option <?php echo selected($hc_stylesheet, 'teal.css' ); ?> ><?php _e('teal.css','health'); ?></option>
			</select><span class="explain"><?php _e('Select color for you theme.','health');?></span>
		</div>		
		<div class="section">
			<h3><?php _e('Theme Layout','health');?></h3>
			<?php $layout_selector = $current_options['layout_selector']; ?>
			<select id="layout_selector" name="layout_selector" class="webriti_inpute">
				<option <?php echo selected($layout_selector, 'wide' ); ?> ><?php _e('wide','health'); ?></option>
				<option <?php echo selected($layout_selector, 'boxed' ); ?> ><?php _e('boxed','health'); ?></option>
			</select><span class="explain"><?php _e('With the Help of box layout you can show sites background','health');?></span>			
		</div>
		<div class="section">
			<h3><?php _e('Custom Background Enabled','health'); ?></h3>
			<input type="checkbox" <?php if($current_options['custom_background_enabled']=='on') echo "checked='checked'"; ?> id="custom_background_enabled" name="custom_background_enabled" ><span class="explain"><?php _e('Enable Custom Background (Add Custom Background Image)','health');?> <a href="<?php echo admin_url(); ?>themes.php?page=custom-background"><?php _e('Click Here','health');?></a>.</span>
		</div>
		
		<div class="section">
			<h3><?php _e('Default Background ','health');?></h3>
			<hr>
			<p><?php $hc_back_image = $current_options['hc_back_image']; ?>
			<input id="radio1" 	<?php if($hc_back_image == "bg_img1.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img1.png">
			<label for="radio1" <?php if($hc_back_image == "bg_img1.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img1.png" id="custom_back_image" ></label>
			<input  id="radio2" <?php if($hc_back_image == "bg_img2.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img2.png">
			<label for="radio2" <?php if($hc_back_image == "bg_img2.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img2.png" id="custom_back_image" ></label>
			<input  id="radio3" <?php if($hc_back_image == "bg_img3.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img3.png">
			<label for="radio3" <?php if($hc_back_image == "bg_img3.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img3.png" id="custom_back_image" ></label>
			<input id="radio4" 	<?php if($hc_back_image == "bg_img4.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img4.png">
			<label for="radio4" <?php if($hc_back_image == "bg_img4.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img4.png" id="custom_back_image" ></label>
			<br>
			<input  id="radio5" <?php if($hc_back_image == "bg_img5.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img5.png">
			<label for="radio5" <?php if($hc_back_image == "bg_img5.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img5.png" id="custom_back_image" ></label>
			<input  id="radio6" <?php if($hc_back_image == "bg_img6.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img6.png">
			<label for="radio6" <?php if($hc_back_image == "bg_img6.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img6.png" id="custom_back_image" ></label>
			<input id="radio7" 	<?php if($hc_back_image == "bg_img7.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img7.png">
			<label for="radio7" <?php if($hc_back_image == "bg_img7.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img7.png" id="custom_back_image" ></label>
			<input  id="radio8" <?php if($hc_back_image == "bg_img8.png") { echo "checked"; } ?> type="radio" name="hc_back_image" value="bg_img8.png">
			<label for="radio8" <?php if($hc_back_image == "bg_img8.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img8.png" id="custom_back_image" ></label>
			<p/>
			<!--<div class="explain"><?php _e('Set your background','health');?> <a href="<?php echo home_url( '/' ); ?>wp-admin/themes.php?page=custom-background"><?php //_e('Click here','health'); ?> </a></div> -->
		</div>
		<div class="section">
			<h3><?php _e('Custom Logo','health'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add custom logo from here suggested size is 150X50 px','health');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" id="upload_image_logo" name="upload_image_logo" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Custom Logo" class="upload_image_button" />
			
			<?php if($current_options['upload_image_logo']!='') { ?>
			<p><img style="height:60px;width:100px;" src="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Logo Height','health'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Default Logo Height : 50px, if you want to increase than specify your value','health'); ?></span></span>
			</h3>
			<input class="webriti_inpute"  type="text" name="height" id="height" value="<?php echo $current_options['height']; ?>" >						
		</div>
		<div class="section">
			<h3><?php _e('Logo Width','health'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Default Logo Width : 150px, if you want to increase than specify your value','health');?></span></span>
			</h3>
			<input  class="webriti_inpute" type="text" name="width" id="width"  value="<?php echo $current_options['width']; ?>" >			
		</div>
		<div class="section">
			<h3><?php _e('Text Title','health'); ?></h3>
			<input type="checkbox" <?php if($current_options['hc_texttitle']=='on') echo "checked='checked'"; ?> id="hc_texttitle" name="hc_texttitle" > <span class="explain"><?php _e('Enable text-based Site Title.   Setup title','health');?> <a href="<?php echo home_url( '/' ); ?>wp-admin/options-general.php"><?php _e('Click Here','health');?></a>.</span>
		</div>
		<div class="section">
			<h3><?php _e('Custom Favicon','health'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Make sure you upload .icon image type which is not more then 25X25 px.','health');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_favicon']!='') { echo esc_attr($current_options['upload_image_favicon']); } ?>" id="upload_image_favicon" name="upload_image_favicon" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Favicon Icon" class="upload_image_button"  />			
			<?php if($current_options['upload_image_favicon']!='') { ?>
			<p><img style="height:60px;width:100px;" src="<?php  echo esc_attr($current_options['upload_image_favicon']);  ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Google Tracking Code','health'); ?></h3>
			<textarea rows="8" cols="8" id="google_analytics" name="google_analytics" ><?php if($current_options['google_analytics']!='') { echo esc_attr($current_options['google_analytics']); } ?></textarea>
			<div class="explain"><?php _e('Paste your Google Analytics tracking code here. This will be added into themes footer. Copy only scripting code i.e no need to use script tag ','rambo'); ?><br></div>
		</div>
		<div class="section">
			<h3><?php _e('Custom css','health'); ?></h3>
			<textarea rows="8" cols="8" id="webrit_custom_css" name="webrit_custom_css"><?php if($current_options['webrit_custom_css']!='') { echo esc_attr($current_options['webrit_custom_css']); } ?></textarea>
			<div class="explain"><?php _e('This is a powerful feature provided here. No need to use custom css plugin, just paste your css code and see the magic.','health'); ?><br></div>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_1" name="webriti_settings_save_1" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('1');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('1')" >
			<!--  alert massage when data saved and reset -->
		</div>
	</form>
	<style type="text/css">
		input[type=radio] {	display:none; margin:10px; }
		input[type=radio] + label {	display:inline-block;	margin:-2px;
			padding: 4px 12px;	background-color: #e7e7e7;	border-color: #ddd; }

		input[type=radio]:checked + label { 	background-image: none;
			background-color:#d0d0d0;
		}
		input[type=radio] + label, input[type=checkbox] + label {
			display:inline-block;	margin:-2px;	padding: 4px 12px;	margin-bottom: 0;
			font-size: 14px;	line-height: 20px;	color: #333;	text-align: center;
			text-shadow: 0 1px 1px rgba(255,255,255,0.75);
			vertical-align: middle;
			cursor: pointer;
			background-color: #f5f5f5;
			background-repeat: repeat-x;
			border: 0px solid #ccc;
			border-color: #e6e6e6 #e6e6e6 #bfbfbf;
			border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
			border-bottom-color: #b3b3b3;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe6e6e6',GradientType=0);
			filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
			-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
			-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
			box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
		}

		 input[type=radio]:checked + label, input[type=checkbox]:checked + label{
			   background-image: none;
			outline: 0;
			-webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
			-moz-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
			box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
				background-color:#e0e0e0;
		}
		#custom_back_image
		{	border-radius: 7px;
			box-shadow: 0 0 2px #777777;
			cursor: pointer;
			display: block;
			height: 29px;
			width: 29px;"
		}
		</style>
</div>