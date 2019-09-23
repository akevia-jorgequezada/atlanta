<?php 
	
	/**
	 *
	 * Template header
	 *
	 **/
	
	// create an access to the template main object
	global $tpl;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php gk_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<?php if(get_option($tpl->name . '_chromeframe_state', 'Y') == 'Y') : ?>
	<meta http-equiv="X-UA-Compatible" content="chrome=1"/>
	<?php endif; ?>
	<?php gk_metatags(); ?>
	<?php gk_opengraph_metatags(); ?>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="<?php get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/template.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/wp.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/stuff.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/wp.extensions.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/extensions.css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" />
	<![endif]-->
	
	<?php gk_head_fonts(); ?>
	<?php gk_head_config(); ?>
   
	<?php wp_enqueue_script("jquery"); ?>
	 
	<?php if(is_singular() && get_option('thread_comments' )) wp_enqueue_script( 'comment-reply' ); ?>
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
	<![endif]-->
	
    <?php wp_head(); ?>
	<?php gk_head_shortcodes(); ?>
	<?php gk_head_style_pages(); ?>	
	
	<?php echo $assets_output; ?>
	
	<?php gk_load('responsive_css'); ?>
	<?php if(get_option($tpl->name . '_prefixfree_state', 'N') == 'Y') : ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/prefixfree.js"></script>
	<?php endif; ?>
	
	<?php gk_thickbox_load(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/gk.scripts.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/gk.menu.js"></script>
	
	<?php if(get_option($tpl->name . "_overridecss_state", 'Y') == 'Y') : ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/override.css" />
	<?php endif; ?>
    <?php echo "\n<script type='text/javascript' src='http://maps.google.com/maps/api/js'></script>\n";?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.gmap.min.js"></script>
	<?php do_action('gavernwp_head'); ?>
	<?php 
		echo stripslashes(
			htmlspecialchars_decode(
				get_option($tpl->name . '_head_code', '')
			)
		); 
	?>
</head>
<body <?php body_class(); ?><?php if($tpl->browser->get("tablet") == true) echo ' data-tablet="true"'; ?> data-tablet-width="<?php echo get_option($tpl->name . '_tablet_width', 800); ?>">
<section id="gk-top-panel-wrap" >
<?php if(gk_is_active_sidebar('top_panel')) : ?>

<section id="gk-top-panel" >
<section class="gk-page widget-area">
	<?php gk_dynamic_sidebar('top_panel'); ?>
</section>    
</section>
<div class="top-line">
    <div><a href="#" class="top-panel-switcher"></a></div>
</div>
<?php endif; ?>
</section>
	<section id="gk-page-box"<?php if(get_option($tpl->name . "_page_wrap_state")=='boxed') : ?> class="gk-page-box"<?php endif;?> >
	<section id="gk-head-wrap" class="expand15" >
		<header id="gk-head" >
        <div class="gk-page">
			<?php if(get_option($tpl->name . "_branding_logo_type", 'css') != 'none') : ?>
			<h1>
				<a href="<?php echo home_url(); ?>" class="<?php echo get_option($tpl->name . "_branding_logo_type", 'css'); ?>Logo"><?php gk_blog_logo(); ?></a>
			</h1>
			<?php endif; ?>
			
			<?php if(gk_show_menu('mainmenu')) : ?>
			<a href="#" id="gk-mainmenu-toggle">
				<?php _e('Main menu', DPTPLNAME); ?>
			</a>
			
			<div id="gk-mainmenu-collapse" class="menu-hidden" data-btn="gk-mainmenu-toggle">	
				<?php
					wp_nav_menu(array(
				  		  'theme_location'  => 'mainmenu',
						  'container'       => false, 
						  'container_class' => 'menu-{menu slug}-container', 
						  'container_id'    => 'gk-main-menu',
						  'menu_class'      => 'menu ' . $tpl->menu['mainmenu']['style'], 
						  'menu_id'         => 'main-menu',
						  'echo'            => true,
						  'fallback_cb'     => 'wp_page_menu',
						  'before'          => '',
						  'after'           => '',
						  'link_before'     => '',
						  'link_after'      => '',
						  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						  'depth'           => $tpl->menu['mainmenu']['depth'],
						  'walker'			=> new GKMenuWalker()
					));
				?>
			</div>
			<?php endif; ?>
            </div>
		</header>
        <?php if (get_option($tpl->name . "_header_separator_state")=='Y') : ?>
        <div class=" dp-area-separator <?php echo get_option($tpl->name . "_header_separator") ?> tinside expand15"></div>
        <?php endif; ?>
	</section>