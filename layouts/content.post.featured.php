<?php

/**
 *
 * The template fragment to show post featured image
 *
 **/

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');

global $tpl; 

?>

<?php if(has_post_thumbnail()) : ?>
<figure class="featured-image">
	<?php $imageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
    <img class="pic2" src="<?php echo $imageurl; ?>" title="" alt="" />
</figure>
<?php endif; ?>