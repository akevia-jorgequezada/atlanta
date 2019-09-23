<?php

/**
 *
 * Tag page
 *
 **/

global $tpl;

gk_load('header');
gk_load('before');

?>

<section id="gk-mainbody" class="tag-page">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title">
			<?php
				printf( __( 'Tag Archives: %s', DPTPLNAME ), '<strong>' . single_tag_title( '', false ) . '</strong>' );
			?>
		</h1>
		<?php
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) )
				echo apply_filters( 'tag_archive_meta', '<section class="intro">' . $tag_description . '</section>' );
		?>
		
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php gk_content_nav(); ?>
		
	<?php else : ?>
		<h1 class="page-title">
			<?php _e( 'Nothing Found', DPTPLNAME ); ?>
		</h1>
	
		<section class="intro">
			<?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', DPTPLNAME ); ?>
		</section>
		
		<?php get_search_form(); ?>
	<?php endif; ?>
</section>

<?php

gk_load('after');
gk_load('footer');

// EOF