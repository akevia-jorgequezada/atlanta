<?php

/**
 *
 * Category page
 *
 **/

global $tpl;

gk_load('header');
gk_load('before');

?>

<section id="gk-mainbody" class="category-page">
	<?php if ( have_posts() ) : ?>
	<?php if(get_option($tpl->name . '_archive_title_state') == 'Y') { ?>
		<h1 class="page-title">
			
	<?php			printf( __( 'Category Archives: %s', DPTPLNAME ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			
		</h1>
	<?php }?>
		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo apply_filters( 'category_archive_meta', '<section class="intro">' . $category_description . '</section>' );
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