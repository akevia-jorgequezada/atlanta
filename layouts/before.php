<?php 
	
	/**
	 *
	 * Template elements before the page content
	 *
	 **/
	
	// create an access to the template main object
	global $tpl, $post;
	
	// disable direct access to the file	
	defined('GAVERN_WP') or die('Access denied');
	
?>
<?php if( is_home() || is_front_page() || is_page_template('template.frontpage.php') ) { ?>
	<section id="gk-header">
		<?php if (get_option($tpl->name . "_slider_type")=='3circle') : ?>
        <?php wp_register_style('3circle-css', get_template_directory_uri().'/css/slider.3circle.css');
			  wp_enqueue_style('3circle-css'); 
		?>
        <div class="threecircle-wraper expand15">
        <div class="gk-page">
        <?php
        include_once (get_template_directory() . '/framework/helpers/helpers.3circle.slider.php');
		echo three_circle();
		?> 
        </div>
        </div>
	<?php 
	
	?>
        <?php elseif (get_option($tpl->name . "_slider_type")=='flex1') : ?>
        <div class="flex-container">
        <div class="gk-page"> 
		<?php
		include_once (get_template_directory() . '/framework/helpers/helpers.flex1.slider.php');
		echo flex1slider(); 
		?>
        </div>
        </div>
		<?php elseif (get_option($tpl->name . "_slider_type")=='flex2') : ?>
        <div class="flex-container">
        <div class="gk-page"> 
		<?php
		include_once (get_template_directory() . '/framework/helpers/helpers.flex2.slider.php');
		echo flex2slider(); 
		?>
        </div>
        </div>
		<?php elseif (get_option($tpl->name . "_slider_type")=='revolution') : ?>
		   <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
           <?php if (is_plugin_active('revslider/revslider.php')) :  
         		wp_register_style('revslider-css', get_template_directory_uri().'/css/slider.revolution.css');
			  	wp_enqueue_style('revslider-css');
			  	putRevSlider( get_option($tpl->name . "_slider_revolution_source")); 
			endif;?>
        <?php elseif (get_option($tpl->name . "_slider_type")=='static') : ?>
    	<?php if(gk_is_active_sidebar('header')) : ?> 
		<?php if (get_option($tpl->name . "_slider_static_content_width")=='N') : ?>
        <div class="gk-page"> 
		<?php endif; ?>
			<?php gk_dynamic_sidebar('header'); ?>
		<?php if (get_option($tpl->name . "_slider_static_content_width")=='N') : ?>
        </div> 
		<?php endif; ?>
        
    <?php endif; ?>
		
		<?php endif; ?>
	</section>        



<?php } else { ?>

<?php if(gk_is_active_sidebar('header')) : ?>
	<section id="gk-header" class="expand15">
		<?php if (get_option($tpl->name . "_slider_static_content_width")=='N') : ?>
        <div class="gk-page"> 
		<?php endif; ?>
			<?php gk_dynamic_sidebar('header'); ?>
		<?php if (get_option($tpl->name . "_slider_static_content_width")=='N') : ?>
        </div> 
		<?php endif; ?>
	</section>        
<?php endif; ?>

<?php } ?>
<?php if( !is_home() & !is_front_page() & !is_page_template('template.frontpage.php') ) : ?>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<?php endif; ?>
<section id="gk-page-header" class="expand15" style="background-image: url('<?php echo $image[0]; ?>">
<section class="gk-page">
<?php if (get_option($tpl->name . "_search_in_header_state")=='Y') { ?>
<div class="header-search">
 <?php the_widget('WP_Widget_Search'); ?> 
 </div>
 <?php } ?>
 <?php if (get_post_type( $post ) == 'portfolio') :?>
 <h1><?php _e( 'Portfolio', DPTPLNAME); ?></h1>
<?php else : ?>
 <h1><?php the_title(); ?></h1>
<?php endif;?>												
 <?php if(gk_show_breadcrumbs() and !is_page_template('template.frontpage.php')) : ?>
				<section id="gk-breadcrumb-fontsize">
					<?php if(gk_show_breadcrumbs()) gk_breadcrumbs_output(); ?>
				</section>
				<?php endif; ?>
 </section>
</section>
<?php  endif; ?>
<!-- <div class="brd2 expand15"></div> -->

<?php if(gk_is_active_sidebar('top')) : ?>
<section id="gk-top">
	<div class="gk-page widget-area">
		<?php gk_dynamic_sidebar('top'); ?>
	</div>
    
</section>
<?php endif; ?>


<section class="gk-page-wrap">

	<section class="gk-page">
		<section id="gk-mainbody-columns">
			<?php 
			if(
				get_option($tpl->name . '_page_layout', 'right') == 'left' && 
				gk_is_active_sidebar('sidebar') && 
				(
					$args == null || 
					($args != null && $args['sidebar'] == true)
				)
			) : ?>
			<aside id="gk-sidebar">
				<?php gk_dynamic_sidebar('sidebar'); ?>
			</aside>
			<?php endif; ?>
			
			<section>
				<?php if(gk_is_active_sidebar('mainbody_top')) : ?>
				<section id="gk-mainbody-top">
					<?php gk_dynamic_sidebar('mainbody_top'); ?>
				</section>
				<?php endif; ?>          
