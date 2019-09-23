<?php

/**
 *
 * Archive page
 *
 **/

global $tpl;

gk_load('header');
gk_load('before');

?>

<section id="gk-mainbody">
<?php if(get_option($tpl->name . '_archive_title_state') == 'Y') { ?>
	<h1 class="page-title">
		<?php if ( is_day() ) : ?>
			<?php printf( __( 'Daily Archives: %s', DPTPLNAME ), '<span>' . get_the_date() . '</span>' ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'Monthly Archives: %s', DPTPLNAME ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Yearly Archives: %s', DPTPLNAME ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
		<?php else : ?>
			<?php _e( 'Blog Archives', DPTPLNAME ); ?>
		<?php endif; ?>
	</h1>
	<?php }?>

	<?php if ( have_posts() ) : ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
	
		<?php gk_content_nav(); ?>
	<?php else : ?>
	
		<h1 class="entry-title"><?php _e( 'Nothing Found', DPTPLNAME ); ?></h1>
						
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', DPTPLNAME ); ?></p>
		
		<?php get_search_form(); ?>
	
	<?php endif; ?>
</section>

<?php

gk_load('after');
gk_load('footer');

// EOF