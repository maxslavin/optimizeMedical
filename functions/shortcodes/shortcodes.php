<?php	
//get shortcodes pop-up editor == in the dashboard only, would be silly to load on the front end
if(defined('WP_ADMIN') && WP_ADMIN ) {	require_once('shortcode_popup.php'); }
/*--button--*/
function parse_shortcode_content( $content ) {

   /* Parse nested shortcodes and add formatting. */
	$content = trim( do_shortcode( shortcode_unautop( $content ) ) );

	/* Remove '' from the start of the string. */
	if ( substr( $content, 0, 4 ) == '' )
		$content = substr( $content, 4 );

	/* Remove '' from the end of the string. */
	if ( substr( $content, -3, 3 ) == '' )
		$content = substr( $content, 0, -3 );

	/* Remove any instances of ''. */
	$content = str_replace( array( '<p></p>' ), '', $content );
	$content = str_replace( array( '<p>  </p>' ), '', $content );
	return $content;
}


function button_shortcode( $atts,$content = null ){ 
   $atts = shortcode_atts(
    array(	'style' => '',
			'size' => 'small',
			'target'=> 'self',
			'url' => '#',
			'textdata' => 'Button'
		), $atts );		 
	$size = $atts['size'];
	$style = $atts['style'];
	$url = $atts['url'];
	$target = $atts['target'];	
	$target = ($target == 'blank') ? ' target="_blank"' : '';
	$style = ($style) ? ' '.$style : '';    
	$out = '<a' .$target. ' class="' .$style.' '. $size.'  " href="' .$url. '" target="' .$target. '">' .do_shortcode($content). '</a>';
	return $out;
}
add_shortcode('button', 'button_shortcode');

function webriti_shortcode_row($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $params));	
    $result = '<div class="row-fluid">';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}
add_shortcode('row', 'webriti_shortcode_row');

/*--------------------------------------*/
/*	Accordian
/*--------------------------------------*/
function accordion_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(  array(
							'fields'=>'1',
							'accordian_group' => 'check',     
							'accordian_title' => 'hello',
							'accordian_text'=>'sdsd',
							'echo'=>false,
							
							),$atts 
						);
	$fields = $atts['fields'];
	$accordian_group = $atts['accordian_group'];
	$accordian_title = $atts['accordian_title'];
	$title = explode(',',$accordian_title);
	
	
	
	$accordian_text = $atts ['accordian_text'];
	$text = explode(',',$accordian_text);
	
	$out ='';
	$out .='<div class="panel-group" id="'.$accordian_group.'">';
	for($i=1;$i<=$fields;$i++)
	{
	$title[$i] = preg_replace("/__/", ',', $title[$i]);
	$text[$i] = preg_replace("/__/", ',', $text[$i]);
		if($i=='1')
		{
		
		
			$out .='<div class="hc_panel panel-default">
					<div class="hc_panel-heading">
					  <h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$accordian_group.'" href="#'.$accordian_group.''.$i.'">
						  <span class="fa fa-minus"></span>
						 '.$title[$i].'
						</a>
					  </h4>
					</div>
				<div id="'.$accordian_group.''.$i.'" class="panel-collapse collapse in">
					<div class="panel-body">
						<p>'.$text[$i].'</p>
					</div>
				</div>
				</div>';
		}
		else{
		
		$out .='<div class="hc_panel panel-default">
					<div class="hc_panel-heading">
					  <h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$accordian_group.'" href="#'.$accordian_group.''.$i.'">
						  <span class="fa fa-plus"></span>
						 '.$title[$i].'
						</a>
					  </h4>
					</div>
				<div id="'.$accordian_group.''.$i.'" class="panel-collapse collapse">
					<div class="panel-body">
						<p>'.$text[$i].'</p>
					</div>
				</div>
				</div>';
		
		}		
				
	} 
	$out .='</div>';
	return $out;
}
add_shortcode('accordian', 'accordion_shortcode');

/*-----------Tabs short code-----------*/
if (!function_exists('tabgroup')) {
	function tabgroup( $atts, $content = null ) 
{	  

		$atts = shortcode_atts(array('tabs_title' => 'This is tabs heading','echo'=>false), $atts );	
		$tabs_title1 = $atts['tabs_title'];
	

		// Extract the tab titles for use in the tab shortcode
		preg_match_all( '/tabs_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();$webriti_tabs_title =array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }		
		$output = '';	
		
		if( count($tab_titles) )
		{	$output .= '<ul class="hc_short_tabs" id="tabsgroup-'.preg_replace('~[^A-Za-z\d\s-]+~u', 'wr', $tabs_title1).'">';
			$count=0;			
			foreach( $tab_titles as $tabs_title )
			{	if($count==0){
				$webriti_tabs_title[0] = str_replace(' ', '_', $tabs_title[0]);
				  $output .= '<li class="active" style="list-style:none;"><a data-toggle="tab" href="#'.preg_replace('~[^A-Za-z\d\s-]+~u', 'wr', $webriti_tabs_title[0]).'">'.$tabs_title[0].'</a></li>';
				 } else {
				  $webriti_tabs_title[0] = str_replace(' ', '_', $tabs_title[0]);	
				  $output .= '<li class="" style="list-style:none;"><a data-toggle="tab" href="#'.preg_replace('~[^A-Za-z\d\s-]+~u', 'wr', $webriti_tabs_title[0]).'">'.$tabs_title[0].'</a></li>';
				 } 
				  $count++;
			}		    
			$output .= '</ul><div class="tab-content" >';
			$output .= do_shortcode( $content );			
		} 		 
		 $output .= '</div>';
		return $output;	
	}
	add_shortcode( 'tabgroup', 'tabgroup' );
}
function tabs_shortcode( $atts, $content = null ){
	
	$atts = shortcode_atts(array('tabs_title' => 'This is tabs heading','tabs_text' => 'Description','wrap'=>'yes','echo'=>false), $atts );	
	$tabs_title = $atts['tabs_title'];
	$tabs_text = $atts['tabs_text'];
	$wrap = $atts['wrap'];
	$webriti_tabs_title = str_replace(' ', '_', $tabs_title);
	static $c=0;  
	$out ='';
    if($c==0 || $wrap=="yes")
	{
	$out .='<div id="'.preg_replace('~[^A-Za-z\d\s-]+~u', 'wr', $webriti_tabs_title).'" class="tab-pane fade active in">';
	}
	else{
	$out .='<div id="'.preg_replace('~[^A-Za-z\d\s-]+~u', 'wr', $webriti_tabs_title).'" class="tab-pane fade ">';
	}
	$c++;
	$out .='<p class="hc_short_tabs_content">'.$tabs_text.'</p>'.do_shortcode( $content ).'</div>';			  
	return $out;	
}
add_shortcode( 'tabs', 'tabs_shortcode' );
/*-----------Alert short code-----------*/

function alert_shortcode( $atts, $content = null )
{
	$atts = shortcode_atts(  array(
							'alert_heading' => 'Please enter alert heading',     
							'alert_text' => 'Please enter text in alert text',
							'alert_style'=>'',
							
							),$atts 
						);
	$alert_heading = $atts['alert_heading'];
	$alert_text = $atts['alert_text'];
	$alert_style = $atts ['alert_style'];
	
	$out='<div class="'.$alert_style.'">
			<button data-dismiss="alert" class="close" type="button"  >x</button>
		   <strong>'.$alert_heading.'</strong>&nbsp;&nbsp;'.$alert_text. do_shortcode($content).'</div>';	
	return $out;
}
add_shortcode( 'alert', 'alert_shortcode' );

/*-----------Dropcap-----------*/
function dropcp_shortcode( $atts, $content = null ){
    $atts = shortcode_atts(array(      	
		'dropcp_style'=>'dropcap_simple_content',
		'dropcp_text'=>'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
		'dropcp_first_letter' => 'L',
		'echo'=>false,
		),
      $atts );
	
	$dropcp_text = $atts['dropcp_text'];
	$dropcp_style = $atts ['dropcp_style'];
	$dropcp_first_letter = $atts ['dropcp_first_letter'];
	
	$out='<p class="'.$dropcp_style.'"><span class="first">'.$dropcp_first_letter.'</span>&nbsp;&nbsp;'.$dropcp_text.'</p>';	
	return $out;
}
add_shortcode( 'dropcap', 'dropcp_shortcode' );

function gridsystemlayout_function ($atts , $content = null)
{
	$grid_layout = $atts['grid_layout'];
	
   if($grid_layout == "one-column")
	{	
		$atts = shortcode_atts(array(	
			'one_column_title'=>'One Column',
			'one_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.'
			),$atts );
		
		$one_column_title = $atts ['one_column_title'];		
		$one_column_description = $atts ['one_column_description'];			
		$out='<div class="row">
				<div class="col-md-12"><div class="hc_head_title"><span>'.$one_column_title.'</span></div>
					<p>'.$one_column_description.'</p>
				</div>
			</div>';
	} else
	if($grid_layout == "two-column")
	{ 	
		$atts = shortcode_atts(array(	
			'one_column_title'=>'two Column',
			'one_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'two_column_title'=>'two Column',
			'two_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'echo'=>false,
			),$atts );
		
		$one_column_title = $atts ['one_column_title'];		
		$one_column_description = $atts ['one_column_description'];		
		$two_column_title = $atts ['two_column_title'];		
		$two_column_description = $atts ['two_column_description'];
		
		$out='<div class="row">
				<div class="col-md-6"><div class="hc_head_title"><span>'.$one_column_title.'</span></div>
					<p>'.$one_column_description.'</p>
				</div>
				<div class="col-md-6"><div class="hc_head_title"><span>'.$two_column_title.'</span></div>
					<p>'.$two_column_description.'</p>
				</div>				
		</div>';			
	} else
	if($grid_layout == "three-column")
	{ 	$atts = shortcode_atts(array(	
			'one_column_title'=>'Three Column',
			'one_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'two_column_title'=>'Three Column',
			'two_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'three_column_title'=>'Three Column',
			'three_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'echo'=>false,
			),$atts );
		
		$one_column_title = $atts ['one_column_title'];		
		$one_column_description = $atts ['one_column_description'];			
		$two_column_title = $atts ['two_column_title'];		
		$two_column_description = $atts ['two_column_description'];		
		$three_column_title = $atts ['three_column_title'];		
		$three_column_description = $atts ['three_column_description'];			
		$out='<div class="row">
				<div class="col-md-4"><div class="hc_head_title"><span>'.$one_column_title.'</span></div>
					<p>'.$one_column_description.'</p>
				</div>
				<div class="col-md-4"><div class="hc_head_title"><span>'.$two_column_title.'</span></div>
					<p>'.$two_column_description.'</p>
				</div>
				<div class="col-md-4"><div class="hc_head_title"><span>'.$three_column_title.'</span></div>
					<p>'.$three_column_description.'</p>
				</div>				
		</div>';			
	} else
	if($grid_layout == "fourth-column")
	{ 	
		$atts = shortcode_atts(array(	
			'one_column_title'=>'fourth Column',
			'one_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'two_column_title'=>'fourth Column',
			'two_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'three_column_title'=>'fourth Column',
			'three_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'fourth_column_title'=>'fourth Column',
			'fourth_column_description' => 'orem ipsum dolor sit amet, Integer commodo tristiqu odio, aliquet ut. Maecenas sed justo imperdiet bibendum. Vivamus nec sapien imperdiet diam. Aliquam erat volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet,volutpat. Sed onsectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, volutpat.',
			'echo'=>false,
			),$atts );
			
		$one_column_title = $atts ['one_column_title'];		
		$one_column_description = $atts ['one_column_description'];		
		$two_column_title = $atts ['two_column_title'];		
		$two_column_description = $atts ['two_column_description'];		
		$three_column_title = $atts ['three_column_title'];		
		$three_column_description = $atts ['three_column_description'];		
		$fourth_column_title = $atts ['fourth_column_title'];		
		$fourth_column_description = $atts ['fourth_column_description'];	
		
		$out='<div class="row">
				<div class="col-md-3"><div class="hc_head_title"><span>'.$one_column_title.'</span></div>
					<p>'.$one_column_description.'</p>
				</div>
				<div class="col-md-3"><div class="hc_head_title"><span>'.$two_column_title.'</span></div>
					<p>'.$two_column_description.'</p>
				</div>
				<div class="col-md-3"><div class="hc_head_title"><span>'.$three_column_title.'</span></div>
					<p>'.$three_column_description.'</p>
				</div>
				<div class="col-md-3"><div class="hc_head_title"><span>'.$fourth_column_title.'</span></div>
					<p>'.$fourth_column_description.'</p>
				</div>
		</div>';						
	}	
return $out;
}
add_shortcode('gridsystemlayout','gridsystemlayout_function');

/*Tool Tip*/
function tooltip_function ($atts , $content = null)
{
	wp_enqueue_style ('tool-tip',get_template_directory_uri().'/css/css-tooltips.css'); //ToolTip
	$atts= shortcode_atts(array (
						'tooltip_word' => 'sample',
						'tooltip_url' => '#',
						'tip_word' => 'ToolTip',
						'echo'=>false,
					),$atts );
	
	
	$tooltip_word = $atts['tooltip_word'];
	$tooltip_url = $atts['tooltip_url'];
	$tip_word = $atts['tip_word'];		
	
	$out ='<a data-tip="'.$tip_word.'" href="'.$tooltip_url.'">'.$tooltip_word.'</a>';
	return $out;
}
add_shortcode('tooltip','tooltip_function');

/******* heading shortcode **********/
/*Tool Tip*/
function heading_function ($atts , $content = null)
{
	$atts= shortcode_atts(array (
						'heading_style' => 'h1',
						'title' => 'Heading'						
					),$atts );
	
	$heading_style = $atts['heading_style'];
	$title = $atts['title'];	
	$out ='<div class="typography_heading"><'.$heading_style.'>'.$title.'</'.$heading_style.'></div>';
	return $out;
}
add_shortcode('heading','heading_function');
?>