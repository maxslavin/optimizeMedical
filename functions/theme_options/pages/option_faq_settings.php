<?php $current_options = get_option('hc_pro_options');
$total = count($current_options['hc_faq'])+1;
if(isset($_POST['webriti_settings_save_6']))
{	
	if($_POST['webriti_settings_save_6'] == 1) 
	{
		if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
		{  print 'Sorry, your nonce did not verify.';	exit; }
		else  
		{		
			$totalfaq = $_POST['totalfaq'];
			$faqdata=array();
			for($i=1; $i<$totalfaq; $i++)
			{	$title='faq-title'.$i;
				$text='faq-text'.$i;					
				$title = $_POST[$title];					
				$text = $_POST[$text];					
				$faqdata[$i]=array('faq-title'=>$title, 'faq-text'=>$text);
				
			}
			$current_options['hc_faq']=$faqdata;
			$current_options['totalfaq']=$totalfaq;
			update_option('hc_pro_options',$current_options);
		}
	}
	$tt=array();
	$tt[] = array('faq-title' => ' Our Mission ?','faq-text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula feugiat blandit. Nulla facilisi. Nulla tellus nisi, congue id.');
	$tt[] = array('faq-title' => 'What We Do ?','faq-text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula.');
	$tt[] = array('faq-title' => 'What We Do ?','faq-text' => 'Lorem ipsum dolor sit amet, fgfgconsectetur adipiscing elit. Nulla vehicula.');	
	if($_POST['webriti_settings_save_6'] == 2) 
	{	
		$current_options['hc_faq']=$tt;
		$current_options['totalfaq']='';			
		update_option('hc_pro_options',$current_options);
	}
}  
?>
<script type="text/javascript">
	fields = <?php if($total){ echo $total ; } else { echo "1"; } ; ?>;
	function addInput() 
	{
	  jQuery('#hc_faq').append('<div class="section" id="faq-field'+fields+'"><h3>Faq-Title'+fields+'</h3><input class="webriti_inpute" type="text" id="faq-title'+fields+'" name="faq-title'+fields+'" value="" /><h3>Faq-Text'+fields+'</h3><textarea rows="8" cols="8" id="faq-text'+fields+'" name="faq-text'+fields+'" value="" type="text"></textarea></div>');
	  fields += 1;	  
	  jQuery("#remove_button").show();
	  jQuery('#totalfaq').val(fields);
	}
	function remove_field()
	{
		if(fields!="1"){
		 fields=fields-1;
		jQuery("#faq-field"+fields).remove();
		jQuery('#totalfaq').val(fields);			
		}
	}
</script>
<div class="block ui-tabs-panel deactive" id="option-ui-id-6" >
	<form method="post" id="webriti_theme_options_6">
		<div id="heading">
			<table style="width:100%;">
				<tr><td><h2><?php _e('FAQ','health');?></h2></td>
					<td style="width:30%;">
						<div class="webriti_settings_loding" id="webriti_loding_6_image"></div>
						<div class="webriti_settings_massage" id="webriti_settings_save_6_success" ><?php _e('Options data successfully Saved','health');?></div>
						<div class="webriti_settings_massage" id="webriti_settings_save_6_reset" ><?php _e('Options data successfully reset','health');?></div>
					</td>
					<td style="text-align:right;">
						<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('6');">
						<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('6')" >
					</td>
				</tr>
			</table>	
		</div>
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div id="hc_faq">
		<?php $i=1;
			foreach($current_options['hc_faq'] as $tt)
			{	?>
				<div class="section" id="faq-field<?php echo $i ?>"> 
					<h3>Faq-Title<?php echo $i ?></h3>
					<input class="webriti_inpute" type="text" id="faq-title<?php echo $i ?>" name="faq-title<?php echo $i ?>" value=" <?php echo $tt['faq-title']; ?>" />
					<span class="explain"><?php _e('Enter the Faq Title.','health'); ?></span>
					<h3>Faq-Text<?php echo $i ?></h3><textarea rows="8" cols="8" id="faq-text<?php echo $i ?>" name="faq-text<?php echo $i;  ?>" ><?php echo  $tt['faq-text']; ?></textarea>
					<span class="explain"><?php _e('Enter the Faq Description.','health'); ?></span>
				</div>	
			<?php	$i=$i+1;
			}	?>
		</div>
		<div class="setion" style="margin-bottom:30px;">
			<a onclick="addInput()" href="#" class="btn btn-primary" name="add" id="more_faq" >Add FAQ Field</a>
			<a onclick="remove_field()" href="#" class="btn btn-inverse"  id="remove_button" style="display:<?php if(!$total) { ?>none<?php } ?>;">Remove Last FAQ Field</a>		
		</div>
		<input type="hidden" class="webriti_inpute" type="text" id="totalfaq" name="totalfaq" value="<?php echo $total; ?> " />
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_6" name="webriti_settings_save_6" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('6');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('6')" >
		</div>
	</form>
</div>