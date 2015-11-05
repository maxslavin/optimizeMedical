<?php
/*---------------------------------------------------------------------------------*
 * @file           theme_stup_data.php
 * @package        Health-Center
 * @copyright      2013 webriti
 * @license        license.txt
 * @author       :	webriti
 * @filesource     wp-content/themes/health=center/theme_setup_data.php
 *	Admin  & front end defual data file 
 *-----------------------------------------------------------------------------------*/ 
function theme_data_setup()
{	$tt=array();
	$tt[] = array('faq-title' => ' Our Mission ?','faq-text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula feugiat blandit. Nulla facilisi. Nulla tellus nisi, congue id.');
	$tt[] = array('faq-title' => 'What We Do ?','faq-text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula.');
	$tt[] = array('faq-title' => 'What We Do ?','faq-text' => 'Lorem ipsum dolor sit amet, fgfgconsectetur adipiscing elit. Nulla vehicula.');
	return $health_center_theme_options=array(
			//Logo and Fevicon header			
			'front_page'  => 'on',
			'layout_selector' => 'wide',
			'hc_stylesheet'=>'default.css',
			'hc_back_image' =>'bg_img1.png',
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'150',
			'hc_texttitle'=>'on',
			'custom_background_enabled'=>'off',
			'upload_image_favicon'=>'',
			'site_intro_tex'=>'Welcome to Health Center',
			'call_now_text' =>'Call Now',
			'call_now_number' =>'+1 800 55 55555',
			'service_title'=>'Awesome Services',
			'service_description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.',
			'portfolio_title' =>'Welcome to Health Center',
			'portfolio_description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet',
			'google_analytics'=>'',
			'webrit_custom_css'=>'',
			'call_out_text'=>'We Care has a wide range of health care options, from health treatments to surgery procedures...!',
			'call_out_button_text'=>'Purchase Now',
			'call_out_button_link'=>'#',
			'call_out_button_link_target' =>'on',			
			// front page
			'front_page_data'=>array('Service','Project','News','Testimonials','CallOut'),
			
			//Slide 	
			'home_slider_enabled'=>'on',
			'animation' => 'slide',								
			'animationSpeed' => '500',
			'slide_direction' => 'horizontal',
			'slideshowSpeed' => '2000',
			
			//Page and Sections Headings
			'hc_head_news' =>'Recent News',
			'hc_head_faq' => 'Why Choose Us?',
			'hc_head_testimonial' => 'Testmonials',
			'hc_head_one_team' => 'Meet Our',
			'hc_head_two_team' => 'Great Team',
			'hc_head_team_tagline' => 'We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.',
			
			//Post Type slug Options
			'hc_slider_slug' => 'healthcenter_slider',
			'hc_service_slug' => 'healthcenter_service',
			'hc_portfolio_slug' => 'healthcenter_project',
			'hc_testimonial_slug' => 'healthcenter_testimonial',
			'hc_team_slug' => 'healthcenter_team',			
			
			//Social media links
			'social_media_in_contact_page_enabled'=>'on',
			'header_social_media_enabled'=>'on',
			'footer_social_media_enabled'=>'on',
			'social_media_twitter_link' =>"https://twitter.com/",
			'social_media_facebook_link' =>"https:www.facebook.com",
			'social_media_linkedin_link' =>"http://linkedin.com/",
			'social_media_google_plus' =>"https://plus.google.com/",
			
			//contact page settings	
			'hc_get_in_touch_enabled'=>'on',
			'hc_get_in_touch' =>'Get in Touch',
			'hc_get_in_touch_description'=>'Lorem ipsum dolor sit amet, usu rebum errem pericula ea, ei alia quaerendum vix. Ea justo tritani sit, odio ignota quo te. Lorem ipsum dolor sit amet.',
			
			'hc_send_usmessage' => 'Send Us a Message',
			'hc_our_office_enabled'=>'on',
			'hc_contact_address'=>'25, Lorem Lis Street',
			'hc_contact_address_two'=>'Dhanmandi California, US',
			'hc_contact_phone_number'=>'420-300-3850',
			'hc_contact_fax_number'=>'800 123 3456',
			'hc_contact_email'=>'themes@webriti.com',			
			'hc_contact_website'=>'https://www.webriti.com',
			
			'contact_google_map_enabled'=>'on',
			'hc_contact_google_map_url' => 'https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538',
			'footer_customizations' => ' @ 2014 Health Center. All Rights Reserved. Powered by',
			'created_by_text' => 'Created by',
			'created_by_webriti_text' => 'Webriti',
			'created_by_link' => 'http://www.webriti.com',
			
			'enable_custom_typography'=>'off',
			
			// general typography			
			'general_typography_fontsize'=>'13',
			'general_typography_fontfamily'=>'Helvetica Neue,Helvetica,Arial,sans-serif',
			'general_typography_fontstyle'=>"",
			
			// menu title
			'menu_title_fontsize'=>'18',
			'menu_title_fontfamily'=>'RobotoRegular',
			'menu_title_fontstyle'=>"",
			
			// post title
			'post_title_fontsize'=>'26',
			'post_title_fontfamily'=>'RobotoRegular',
			'post_title_fontstyle'=> "",
			
			// Service  title
			'service_title_fontsize'=>'26',
			'service_title_fontfamily'=>'RobotoBold',
			'service_title_fontstyle'=>"",
			
			// Potfolio  title Widget Heading Title
			'portfolio_title_fontsize'=>'20',
			'portfolio_title_fontfamily'=>'RobotoRegular',
			'portfolio_title_fontstyle'=>"",
			
			// Widget Heading Title
			'widget_title_fontsize'=>'24',
			'widget_title_fontfamily'=>'RobotoLight',
			'widget_title_fontstyle'=>"",
			
			// Call out area Title   
			'calloutarea_title_fontsize'=>'34',
			'calloutarea_title_fontfamily'=>'RobotoBold',
			'calloutarea_title_fontstyle'=>"",
			
			// Call out area descritpion      
			'calloutarea_description_fontsize'=>'15',
			'calloutarea_description_fontfamily'=>'RobotoRegular',
			'calloutarea_description_fontstyle'=>"",
			
			// Call out area purches button      
			'calloutarea_purches_fontsize'=>'16',
			'calloutarea_purches_fontfamily'=>'RobotoBold',
			'calloutarea_purches_fontstyle'=>"",
			'hc_faq'=>$tt,
		);
}
?>