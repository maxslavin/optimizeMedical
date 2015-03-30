<?php
/*
* @Theme Name	:	Health-Center
* @file         :	taxonomies.php
* @package      :	Health-Center
* @author       :	Hari Maliya
* @license      :	license.txt* 
 * Add custom taxonomies
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
 function create_project_taxonomy() {
    register_taxonomy('portfolio_categories', 'healthcenter_project',
    array(  'hierarchical' => true,
			'show_in_nav_menus' => false,
            'label' => 'Portfolio Categories',
            'query_var' => true));
	//Default category id		
	$defualt_tex_id = get_option('custom_texo_health');
	//quick update category
	if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
		wp_update_term($_POST['tax_ID'], 'portfolio_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug']
		));	
		update_option('custom_texo_health', $defualt_tex_id);
	} 
	else 
	{ 	//insert default category 
		if(!$defualt_tex_id){
			wp_insert_term('ALL','portfolio_categories', array('description'=> 'Default Category','slug' => 'ALL'));
			$Current_text_id = term_exists('ALL', 'portfolio_categories');
			update_option('custom_texo_health', $Current_text_id['term_id']);
		}
	}
	//update category
	if(isset($_POST['submit']) && isset($_POST['action']) )
	{	wp_update_term($_POST['tag_ID'], 'portfolio_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug'],
		  'description' =>$_POST['description']
		));
	}
	// Delete default category
	if(isset($_POST['action']) && isset($_POST['tag_ID']) )
	{	if(($_POST['tag_ID'] == $defualt_tex_id) && $_POST['action']	 =="delete-tag")
		{	
			delete_option('custom_texo_health'); 
		} 
	}	
	
}
add_action( 'init', 'create_project_taxonomy' );
?>