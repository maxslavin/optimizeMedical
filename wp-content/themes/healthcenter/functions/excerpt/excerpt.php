<?php
//code to change length of Home service section excerpt
	function get_home_service_excerpt(){
		global $post;
		$excerpt = get_the_content();
		$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);		
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 245);		
		$len=strlen($excerpt);	 
		 if($original_len>245)
		   $excerpt = $excerpt;
		return $excerpt;
	}
	function get_service_template_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);		
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 110);		
		$len=strlen($excerpt);	 
		if($original_len>110)
		   $excerpt = $excerpt;
		return $excerpt;
	}	
?>