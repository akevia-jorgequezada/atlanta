<?php
/*
Template Name: Latest Posts Small Thumb
*/

global $tpl,$post;
gk_load('header');
gk_load('before');
if (get_option($tpl->name . "_feed_title_state")=='Y'):
 $display_feed_title = true;
 else : $display_feed_title = false;
 endif;

global $more;
$more = 0;
$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
$params = get_post_custom();
$params_category = isset($params['dp-post-params-category']) ? esc_attr( $params['dp-post-params-category'][0] ) : '';
$args = array(
				'paged' => $paged,
				'posts_per_page' =>  get_option('posts_per_page'),
				'orderby' => 'date&order=ASC',
				'category_name' => $params_category
			);
$newsquery = new WP_Query($args);

query_posts('posts_per_page=' . get_option('posts_per_page').'&paged=' . $paged);

?>

<?php if ( have_posts() ) : ?>
	<section id="gk-mainbody">
	<?php while($newsquery->have_posts()): $newsquery->the_post(); ?>
	<?php if (get_post_format( $post->ID) =='' and get_option('rss_use_excerpt') == 1) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php include('layouts/content.post.header.php'); ?>
		</header>
        <?php if((!is_page_template('template.fullwidth.php') && ('post' == get_post_type())) && get_the_title() != '') : ?>
		<?php gk_post_meta(); ?>
		<?php endif; ?>
		<div class="space10"></div>
        <?php if(has_post_thumbnail()) { ?>
		<div class="one_third" style="margin-top:-10px">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', DPTPLNAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php include('layouts/content.post.featured.php'); ?>
            </a>
        </div>
        <div class="two_third_last">
		<section class="summary">
			<?php
			echo get_post_format( $post->ID); 
			the_excerpt(); 
			?>
		</section>
        </div>
        <?php } else { ?>
		<section class="summary">
			<?php
			echo get_post_format( $post->ID); 
			the_excerpt(); 
			?>
		</section>        
		<?php }?>
        <div style="clear:both"></div>
		<?php include('layouts/content.post.footer.php'); ?>
	</article>
    	<?php else : ?>
        <?php get_template_part( 'content', get_post_format() ); ?>
		<?php endif ?>

		<?php endwhile; ?>
       <?php gk_content_nav($newsquery->max_num_pages, $range = 2); ?>
		<?php wp_reset_query(); ?>
	</section>
<?php else : ?>
	<section id="gk-mainbody">
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', DPTPLNAME ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', DPTPLNAME ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	</section>
<?php endif; ?>

<?php

gk_load('after');
gk_load('footer');

// EOF