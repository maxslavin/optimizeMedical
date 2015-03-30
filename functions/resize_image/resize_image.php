<?php
 if ( function_exists( 'add_image_size' ) ) 
 { 
	add_image_size('home_slider',1200,450,true);
	// service details
	add_image_size('service_details',750,500,true);
	
	//portfolio image resize	
	add_image_size('portfolio-1c-thumb',770,473,true);
	add_image_size('portfolio-2c-thumb',560,330,true);
	add_image_size('portfolio-3c-thumb',360,220,true);
	add_image_size('portfolio-4c-thumb',270,160,true);
	
	//testimonial
	add_image_size('health_center_testimonial',50,50,true);
	add_image_size('crop_hc_media_sidebar_img',60,60,true);
	add_image_size('health_center_recentpostwidget',40,40,true);//POst F'Image for Recent Work FOoter Widget
	add_image_size('health_center-blog_detail',750,350,true);
	add_image_size('health_blog_fullwidth',1170,450,true);
	
	add_image_size('hc_team_thumb',360,240,true);
	add_image_size('hc_team_thumb_two',220,220,true);

}
// code for home slider post types 
add_filter( 'intermediate_image_sizes', 'hc_image_presets');

function hc_image_presets($sizes){
   $type = get_post_type($_REQUEST['post_id']);	
    foreach($sizes as $key => $value){
    	if($type=='healthcenter_slider'  &&  $value != 'home_slider' )
		 {        unset($sizes[$key]);      }
		elseif($type=='health_testimonial'  &&  $value != 'health_center_testimonial' )
		 {        unset($sizes[$key]);      }
		else if($type=='post'  &&  $value != 'health_center_recentpostwidget' &&  $value != 'health_center-blog_detail' && $value !='crop_hc_media_sidebar_img'  && $value !='health_blog_fullwidth')
		 {        unset($sizes[$key]);      }
		 else if($type=='healthcenter_service'  && $value != 'service_details')
		 {        unset($sizes[$key]);      }
		 else  if($type=='healthcenter_project' && $value != 'portfolio-1c-thumb' && $value != 'portfolio-2c-thumb' && $value != 'portfolio-3c-thumb' && $value != 'portfolio-4c-thumb')
		 { unset($sizes[$key]);  }
		 elseif($type=='healthcenter_team'  &&  $value != 'hc_team_thumb' &&  $value != 'hc_team_thumb_two' )
		 {        unset($sizes[$key]);      }			
    }
    return $sizes;	 
}
?>