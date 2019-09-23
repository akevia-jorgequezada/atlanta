<?php

/*
Template Name: Portfolio 6 columns
*/
 
global $tpl;

$fullwidth = true;

gk_load('header');
gk_load('before', null, array('sidebar' => false));

?>

<section id="gk-mainbody" class="portfolio portfolio-six">
<?php the_post(); ?>
<section class="content">
		<?php the_content(); ?>
		
		<?php gk_post_links(); ?>
	</section>
		<?php
		$portfolio_category = get_terms('portfolios');
		if($portfolio_category):
		?>
		<ul class="portfolio-tabs">
			<li class="active"><a data-filter="*" href="#"><?php _e('All', DPTPLNAME); ?></a></li>
			<?php foreach($portfolio_category as $portfolio_cat): ?>
			<li><a data-filter=".<?php echo $portfolio_cat->slug; ?>" href="#"><?php echo $portfolio_cat->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
<div class="portfolio-wrapper">
			<?php
			$item_per_page = get_option($tpl->name . "_portfolio_items_per_page");
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'portfolio',
				'paged' => $paged,
				'posts_per_page' => $item_per_page,
				'orderby' => 'menu_order'
			);
			$gallery = new WP_Query($args);
			while($gallery->have_posts()): $gallery->the_post();
				if(has_post_thumbnail()):
			?>
			<?php
			$item_classes = '';
			$item_cats = get_the_terms($post->ID, 'portfolios');
			if($item_cats):
			foreach($item_cats as $item_cat) {
				$item_classes .= $item_cat->slug . ' ';
			}
			endif;
			?>
			<div class="portfolio-item <?php echo $item_classes; ?>">
				<?php if(has_post_thumbnail()): ?>
				<div class="image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('portfolio-six'); ?>
					</a>
                 <?php
				 	$title = $post->post_title;
					$content = preg_replace('/<img[^>]+./','',get_the_content());  
					$content = string_limit_words($content,10).'&hellip;';
					$imageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				  ?>
                  <div class="item-info"><h3><?php echo $title; ?></h3></div>
				<div class="item-info-overlay">
                <p class="links">
<a class="preview" rel="dp_lightbox[]" title="<?php echo $title; ?>" class="zoom" href="<?php echo $imageurl; ?>">
</a><a title="View details" class="link" href="<?php the_permalink(); ?>"></a>
</p>
                <h3><?php echo $title; ?></h3>
<p class="p_excerpt"><?php echo $content; ?></p>


</div>	
				</div>
                
				<?php endif; ?>
			</div>
			<?php endif; endwhile; ?> 
			
		</div>
		<?php gk_content_nav($gallery->max_num_pages, $range = 2); ?>
        </section>

<?php

gk_load('after', null, array('sidebar' => false));
gk_load('footer');

// EOF