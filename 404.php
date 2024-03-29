<?php

/**
 *
 * 404 Page
 *
 **/
 
global $tpl; 

gk_load('header');
gk_load('before');

?>
<div><img src="<?php echo get_template_directory_uri(); ?>/images/body/404_bg.png" width="35%" style="margin: 0 auto"/></div>
<section id="gk-mainbody" class="page404">
    <p>
		<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', DPTPLNAME); ?>
		<small>
			<?php _e('Perhaps searching, or one of the links below, can help.', DPTPLNAME); ?>
		</small>
	</p>
	
	<?php get_search_form(); ?>
    
  <div>
		<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>
	
		<div class="widget">
			<h2 class="widgettitle"><?php _e( 'Most Used Categories', DPTPLNAME); ?></h2>
			<ul>
			<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
			</ul>
		</div>
	</div>
	
	<div>
		<?php
			$archive_content = '<p>' . __( 'Try looking in the monthly archives.', DPTPLNAME) . '</p>';
			the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
		?>
	
		<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
	</div>
</section>

<?php

gk_load('after');
gk_load('footer');

// EOF