<?php

/**
 *
 * The default template for displaying content
 *
 **/

global $tpl; 
$values = get_post_custom( $post->ID );  
$params_title = isset( $values['dp-post-params-title'] ) ? esc_attr( $values['dp-post-params-title'][0] ) : 'Y';
$params_featured = isset( $values['dp-post-params-featuredimg'] ) ? esc_attr( $values['dp-post-params-featuredimg'][0] ) : 'Y';
if ($params_title == 'N')  {$display_feed_title= false;} else {$display_feed_title= true;}  ;
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php include('layouts/content.post.header.php'); ?>
		</header>
		
	<?php 
	if ($params_featured == 'Y')  {
	include('layouts/content.post.featured.php');
	}?>
		<?php if((!is_page_template('template.fullwidth.php') && ('post' == get_post_type())) && get_the_title() != '') : ?>
		<?php gk_post_meta(); ?>
		<?php endif; ?>
		<?php if ( is_search() || is_archive() || is_tag() ) : ?>
		<section class="summary">
			<?php the_excerpt(); ?>
		</section>
		<?php else : ?>
		<section class="content">
        
			<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', DPTPLNAME ) ); 
			?>
            
			
			<?php gk_post_links(); ?>
		</section>
		<?php endif; ?>
		
		<?php include('layouts/content.post.footer.php'); ?>
	</article>