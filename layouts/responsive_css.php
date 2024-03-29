<?php 
	
	/**
	 *
	 * Template part loading the responsive CSS code
	 *
	 **/
	
	// create an access to the template main object
	global $tpl;
	global $fullwidth;
	
	// disable direct access to the file	
	defined('GAVERN_WP') or die('Access denied');
	
?>

<style type="text/css">
	<?php $boxed_template_width = (int)get_option($tpl->name . '_template_width', 980)?>
	.gk-page, .boxed #gk-page-box, .page-template-template-boxedpage-php #gk-page-box  {max-width: <?php echo $boxed_template_width; ?>px;;}
	<?php if(
		get_option($tpl->name . '_page_layout', 'right') != 'none' && 
		gk_is_active_sidebar('sidebar') && 
		($fullwidth != true)
	) : ?>
	#gk-mainbody-columns > aside { width: <?php echo get_option($tpl->name . '_sidebar_width', '30'); ?>%;}
	#gk-mainbody-columns > section { width: <?php echo 100 - get_option($tpl->name . '_sidebar_width', '30'); ?>%; }
	<?php else : ?>
	#gk-mainbody-columns > section { width: 100%; }
	<?php endif; ?>
</style>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet.css" media="(max-width: <?php echo get_option($tpl->name . '_tablet_width', '800'); ?>px)" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mobile.css" media="(max-width: <?php echo get_option($tpl->name . '_mobile_width', '800'); ?>px)" />