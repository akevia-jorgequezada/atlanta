<?php

/**
 *
 * The template fragment to show post header
 *
 **/

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');

global $tpl,$display_feed_title;
$values = get_post_custom( $post->ID );  
$params_title = isset( $values['dp-post-params-title'] ) ? esc_attr( $values['dp-post-params-title'][0] ) : 'Y';
if ($params_title == 'N')  {$display_feed_title= false;} else {$display_feed_title= true;}  ;

?>

<?php if($params_title != 'N'  ) : ?>
<?php if(get_the_title() != '') : ?>
<hgroup>
	<h3 class="post-title">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', DPTPLNAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		
		<?php if(is_sticky()) : ?>
		<sup>
			<?php _e( 'Featured', DPTPLNAME ); ?>
		</sup>
		<?php endif; ?>
	</h3>
</hgroup>
<?php endif; ?>
<?php endif; ?>