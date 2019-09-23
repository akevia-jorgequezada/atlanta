<?php

/**
 *
 * Single page
 *
 **/

global $tpl;
$fullwidth = true;
gk_load('header');
gk_load('before', null, array('sidebar' => false));

?>

<section id="gk-mainbody">
	<?php while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(is_page_template('template.fullwidth.php') ? ' page-fullwidth' : null); ?>>
        <ul class="item-nav">
            <?php previous_post_link("<li class='prev'> %link </li>", "%title"); ?>
            <?php if (get_option($tpl->name . '_portfolio_default_page') != '') : ?>
            <li class="all"><a href="<?php echo get_option($tpl->name . '_portfolio_default_page'); ?>" title="All items">All</a></li>
            <?php endif ?>
            <?php next_post_link("<li class='next'> %link </li>", "%title"); ?>
        </ul>
        <div class="clear:both"></div>
        <div class="two_third">
        <header>
		<?php include('layouts/content.portfolio.header.php'); ?>
		</header>
       	<?php if (get_post_meta($post->ID, 'item_type', true)== 'v') : 	?>
        <?php if (get_post_meta($post->ID, 'item_video', true) != '') : ?>
        <iframe id="player_1" src="<?php echo get_post_meta($post->ID, 'item_video', true);?>" frameborder="0" width="500" height="281"></iframe>
        <?php else :?>
		<div class="help">
        <div class="typo-icon">
        This is a portfolio item <b>‘video’</b> type. But you have not given video URL. Please fill in this field. 
        </div>
        </div>        
		<?php endif ?>
        <?php elseif (get_post_meta($post->ID, 'item_type', true)== 'g'):?>
        <?php 
		wp_register_style('gallery-css', get_template_directory_uri().'/css/templates/gallery.css');
		wp_enqueue_style('gallery-css');
		?>
		<section class="content">
			<?php
				// Load images
				$thumb_ID = get_post_thumbnail_id( $post->ID );
				$images = get_children(

					array(
						'numberposts' => -1, // Load all posts
						'orderby' => 'menu_order', // Images will be loaded in the order set in the page media manager
						'order'=> 'ASC', // Use ascending order
						'post_mime_type' => 'image', // Loads only images
						'post_parent' => $post->ID, // Loads only images associated with the specific page
						'post_status' => null, // No status
						'post_type' => 'attachment', // Type of the posts to load - attachments
						'exclude' => $thumb_ID
					)
				);
			?>
			
			<?php if($images): ?>
			<section id="gallery">
            
				<?php 
					$id = "flexslider_".mt_rand();
					$output = '<script type="text/javascript">'."\n";
					$output .= "   jQuery(window).load(function() {"."\n"; 
					$output .=  "jQuery('#".$id."').flexslider({"."\n";
					$output .=  '    animation: "slide",'."\n";
					$output .=  '    slideshowSpeed:"5000",'."\n";
					$output .=  '    pauseOnHover: true,'."\n";
					$output .=  '    smoothHeight: true'."\n";
					$output .=  "  });"."\n";      
					$output .= "   });"."\n";
					$output .= "</script>"."\n";
					echo $output; 
				?>
                <div class="flexslider" id="<?php echo $id; ?>"><ul class="slides">
				<?php 
					foreach($images as $image) : 
				?>
				<li><figure>
					<img src="<?php echo $image->guid; ?>" alt="<?php echo $image->post_title; ?>" title="<?php echo $image->post_title; ?>" />
					
					<?php if($image->post_title != '' || $image->post_content != '' || $image->post_excerpt != '') : ?>
					<figcaption>
						<h3><?php echo $image->post_title; // get the attachment title ?></h3>
						<p><?php echo $image->post_content; // get the attachment description ?></p>
						<small><?php echo $image->post_excerpt; // get the attachment caption ?></small>
					</figcaption>
					<?php endif; ?>
				</figure></li>
				<?php 
					endforeach;
				?>
			</ul></div>	
			</section>
		  	<?php endif; ?>
		</section>
        
        <?php else : ?>
        <?php include('layouts/content.post.featured.php'); ?>
        <?php endif ?>
        </div>
        <div class="one_third_last">
        <h3 class="heading-line"><span><?php echo __("Project details", DPTPLNAME); ?></span></h3>
        <section class="content">
		<?php the_content(); ?>
        <?php if( get_post_meta($post->ID, 'item_desc', true) ): ?>
        <h3 class="heading-line"><span><?php echo __("Job description", DPTPLNAME); ?></span></h3>
        <p><?php echo get_post_meta($post->ID, 'item_desc', true); ?></p>
        <?php endif ?>
        <?php if( get_post_meta($post->ID, 'item_date', true) || get_post_meta($post->ID, 'item_client', true) ) :
			 ?>
		<?php if( get_post_meta($post->ID, 'item_date', true) ): ?>
        <div class="mfield date"><?php echo get_post_meta($post->ID, 'item_date', true); ?></div>
        <?php endif ?>
        <?php if( get_post_meta($post->ID, 'item_client', true) ): ?>
        <div class="mfield client"><?php echo get_post_meta($post->ID, 'item_client', true); ?></div>
        <?php endif ?>
        <div class="space15"></div>
        <?php endif ?>
        <div style="clear:both"></div>
        <?php if( get_post_meta($post->ID, 'item_link', true) ): ?>
        <p><a class="btn" href="<?php echo get_post_meta($post->ID, 'item_link', true); ?>" target="_blank"><?php echo  __("Launch Project", DPTPLNAME) ?></a></p>       
        <?php endif ?>
		</section>

        </div>
	<?php include('layouts/content.post.footer.php'); ?>
    <div class="related-projects">
        <div style="margin-top:-30px;"><h3 class="heading-line"><span><?php echo __("Related projects", DPTPLNAME); ?></span></h3></div>
        <?php dp_print_related_projects_grid($post->ID,4); ?>
        <div style="clear:both"></div>
	</div>
</article>
				
	<?php endwhile; // end of the loop. ?>
</section>

<?php

gk_load('after', null, array('sidebar' => false));
gk_load('footer');

// EOF