<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!-- Theme Css -->
	<?php $hc_current_options=get_option('hc_pro_options'); ?>	
	<?php if($hc_current_options['hc_stylesheet']!='')
		{  $hc_css=$hc_current_options['hc_stylesheet']; } else { $hc_css="default.css"; } ?>
	<link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/<?php echo $hc_css; ?>" type="text/css" media="screen" />
	<?php if($hc_current_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo $hc_current_options['upload_image_favicon']; ?>" /> 
	<?php } ?>		
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<?php
$page_bg_image_url = get_background_image();
$background_color = get_background_color();
	if($hc_current_options['custom_background_enabled']=='on')
	{
		  if($page_bg_image_url)
		  { 
		  ?>
		  <body <?php body_class(); ?> >
		  <?php } else if($background_color){ ?>
		  <body <?php body_class(); ?> >
	<?php }
	} else { ?>
	<?php	$hc_back_image = $hc_current_options['hc_back_image']; 	 ?>
	<body <?php body_class(); ?> style='background-image: url("<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/<?php echo $hc_back_image; ?>");' >
	<?php } ?>

<!-- Wrapper -->
<div id="wrapper">
<!-- Header Section -->
<div class="header_section">
	<div class="container">
		<!-- Logo & Contact Info -->
		<div class="row">
			<div class="col-md-6">
				<div class="hc_logo">
					<h1>
						<a title="Health Center" href="<?php echo home_url( '/' ); ?>">
						<?php if($hc_current_options['hc_texttitle'] =="on")
						{ echo get_bloginfo( ); }
						else if($hc_current_options['upload_image_logo']!='') 
						{ ?>
						<img src="<?php echo $hc_current_options['upload_image_logo']; ?>" style="height:<?php if($hc_current_options['height']!='') { echo $hc_current_options['height']; }  else { "50"; } ?>px; width:<?php if($hc_current_options['width']!='') { echo $hc_current_options['width']; }  else { "150"; } ?>px;" />
						<?php } else { ?> <?php _e('Health','health'); ?> <span><?php _e('Center','health'); ?></span> <?php } ?>
						</a>
					</h1> 
				</div>
			</div>					
			<div class="col-md-6">
			
				<div class="head_cont_info">
					<ul><?php if($hc_current_options['hc_contact_email']!='') { ?>
						<li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $hc_current_options['hc_contact_email']; ?>"><?php echo $hc_current_options['hc_contact_email']; ?></a></li>
						<?php } 
						if($hc_current_options['hc_contact_phone_number']!='') {
						?>
						<li><i class="fa fa-mobile"></i>+<?php echo $hc_current_options['hc_contact_phone_number']; ?></li>
						<?php } ?>
					</ul>
				</div>
				<div class="clear"></div>
				<?php if($hc_current_options['header_social_media_enabled']=='on') {?>
				<ul class="head_social_icons">
					<?php if($hc_current_options['social_media_facebook_link']!='') { ?>
					<li class="facebook"><a title="Facebook" href="<?php echo $hc_current_options['social_media_facebook_link']; ?>"></a></li>
					<?php }
					if($hc_current_options['social_media_twitter_link']!='') { ?>
					<li class="twitter"><a title="Twitter" href="<?php echo $hc_current_options['social_media_twitter_link']; ?>"></a></li>
					<?php }
					if($hc_current_options['social_media_google_plus']!='') { ?>
					<li class="google"><a title="Google Plus" href="<?php echo $hc_current_options['social_media_google_plus']; ?>"></a></li>
					<?php }
					if($hc_current_options['social_media_linkedin_link']!='') { ?>
					<li class="linkedin"><a title="LinkenId" href="<?php echo $hc_current_options['social_media_linkedin_link']; ?>"></a></li>
					<?php } ?>					
				</ul>
				<?php } ?>
			</div>
		</div>
		<!-- /Logo & Contact Info -->
	</div>	
</div>	
<!-- /Header Section -->	
<!-- Navbar Section -->
<div class="navigation_section">
	<div class="container navbar-container">
		<nav class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
		  </div>
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php
			wp_nav_menu( array(  
					'theme_location' => 'primary',
					'container'  => 'nav-collapse collapse navbar-inverse-collapse',
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => 'webriti_fallback_page_menu',
					'walker' => new webriti_nav_walker()
					)
				);	
			?>
		  </div>
		</nav>
	</div>
</div><!-- /Navbar Section -->