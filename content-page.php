<?php

/**
 *
 * The template used for displaying page content in page.php
 *
 **/
 
global $tpl;

$show_title = true;

if ((is_page_template('template.fullwidth.php') && ('post' == get_post_type())) || get_the_title() == '') {
	$show_title = false;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($show_title ? '' : 'no-title'); ?>>

	<?php include('layouts/content.post.featured.php'); ?>

	<section class="content">
		<?php the_content(); ?>
		
		<?php gk_post_links(); ?>
	</section>
	
	<?php include('layouts/content.post.footer.php'); ?>
</article>