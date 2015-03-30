<?php/**
* @Theme Name	:	Health-Center
* @file         :	index-calloutarea.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt
* @filesource   :	wp-content/themes/health-center/index-calloutarea.php
*/
?>
<!-- HC Callout Section -->
<div class="hc_callout_section">
	<div class="row hc_callout_area">
		<?php $current_options=get_option('hc_pro_options'); ?>
		<div class="col-md-9">
			<?php if($current_options['call_out_text']!='') { ?>
			<h1><?php echo $current_options['call_out_text']; ?></h1>
			<?php } ?>
		</div>
		<div class="col-md-3">
		<?php if($current_options['call_out_button_text']!='') { ?>
			<a href="<?php if($current_options['call_out_button_link']!='') { echo $current_options['call_out_button_link']; }?>" <?php if($current_options['call_out_button_link_target']=='on') { echo "target='_blank'"; } ?> class="hc_callout_btn"><?php echo $current_options['call_out_button_text']; ?></a>
		<?php } ?>
		</div>
	</div>
</div>
<!-- /HC Callout Section -->