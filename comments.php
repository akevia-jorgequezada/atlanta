<?php

/**
 *
 * Comments part
 *
 **/

?>

<?php if ( post_password_required() ) : ?>
<section id="comments">
	<p class="no-password"><?php _e( 'This post is password protected. Enter the password to view any comments.', DPTPLNAME ); ?></p>
</section>
<?php
	return;/* Stop the rest of comments.php from being processed */	
	endif;
?>

<?php if ( have_comments() ) : ?>
<section id="comments">
	<h3 class="heading-line"><span>

		<?php if(get_comments_number() == 1) : ?>
		<?php printf(__( '%1$s comment to &ldquo;%2$s&rdquo;', DPTPLNAME),number_format_i18n( get_comments_number() ), get_the_title()); ?>
		<?php elseif(get_comments_number() >= 2) : ?>
		<?php printf(__( '%1$s comments to &ldquo;%2$s&rdquo;', DPTPLNAME), number_format_i18n( get_comments_number() ), get_the_title()); ?>
		<?php endif; ?>
        </span>
	</h3>

	<?php if ( get_comment_pages_count() > 1 && get_option('page_comments' )) : ?>
	<nav>
		<div class="nav-prev">
			<?php previous_comments_link( __( '&larr; Older Comments', DPTPLNAME ) ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', DPTPLNAME ) ); ?>
		</div>
	</nav>
	<?php endif; ?>
	
	<ol>
		<?php wp_list_comments(array( 'callback' => 'gavern_comment_template', 'style' => 'ol')); ?>	
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option('page_comments' )) : ?>
	<nav>
		<div class="nav-prev">
			<?php previous_comments_link( __( '&larr; Older Comments', DPTPLNAME ) ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', DPTPLNAME ) ); ?>
		</div>
	</nav>
	<?php endif; ?>
	
	<?php dp_comment_form(); ?>
</section>
<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
<section id="comments" class="nocomments">	
	<p class="no-comments"><?php _e( 'Comments are closed.', DPTPLNAME ); ?></p>
</section>
<?php else : ?>
<section id="comments" class="nocomments">
	<?php dp_comment_form(); ?>
</section>
<?php endif; ?>