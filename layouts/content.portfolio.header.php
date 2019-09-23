<?php

/**
 *
 * The template fragment to show portfolio header
 *
 **/

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');

global $tpl,$display_feed_title; 
?>

<?php if((!is_home() and !is_front_page() and !is_page_template('template.frontpage.php')) || (get_option($tpl->name . "_template_homepage_title")=='Y') || $display_feed_title == true  ) : ?>
<?php if(get_the_title() != '') : ?>
<hgroup>
	<h3 class="heading-line">
		<span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', DPTPLNAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span>
		
		<?php if(is_sticky()) : ?>
		<sup>
			<?php _e( 'Featured', DPTPLNAME ); ?>
		</sup>
		<?php endif; ?>
	</h3>
</hgroup>
<?php endif; ?>
<?php endif; ?>