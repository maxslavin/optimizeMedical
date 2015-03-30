<?php	
	$current_options = get_option('hc_pro_options');
	if (  $current_options['front_page'] != 'on' ) {
	get_template_part('index');
	}	
	else 
	{
		get_header();	
		get_template_part('index', 'slider') ;				
		$data = $current_options['front_page_data'];
		if($data) 
		{
			foreach($data as $key=>$value)
			{			
				switch($value) 
				{	
					case 'Service': 
					//****** get index service  ********
					get_template_part('index', 'service') ;
					break;
					
					case 'Project':
					//****** get index project  ********
					get_template_part('index', 'project');					
					break;
					
					case 'News': 			
					//****** get index recent blog  ********
					get_template_part('index', 'news');					
					break; 	
					
					case 'Testimonials': 			
					//****** get index recent blog  ********
					get_template_part('index', 'testimonials');					
					break;
					
					case 'CallOut': 			
					//****** get index recent blog  ********
					get_template_part('index', 'calloutarea');					
					break; 
				}
			}
		} 	
	get_footer(); 
	}
?>