<?php

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	

/**
 *
 * Maximus layout fragments
 *
 * Functions used to create Maximus-specific functions 
 *
 **/
 
/**
 *
 * Template for comments and pingbacks.
 *
 * @param comment - the comment to render
 * @param args - additional arguments
 * @param depth - the depth of the comment
 *
 * @return null
 *
 **/
function gavern_comment_template( $comment, $args, $depth ) {
	global $tpl;
	
	$GLOBALS['comment'] = $comment;
	
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="pingback">
		<p>
			<?php _e( 'Pingback:', DPTPLNAME ); ?> 
			<?php comment_author_link(); ?>
			<?php edit_comment_link( __( 'Edit', DPTPLNAME ), '<span class="edit-link">', '</span>' ); ?>
		</p>
		<?php break; ?>
	<?php default : ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">	
			<aside>
				<?php echo get_avatar( $comment, ($comment->comment_parent == '0') ? 40 : 32); ?>
			</aside>
					
			<section class="content">				
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', DPTPLNAME ); ?></em>
				<?php endif; ?>
				
				<?php comment_text(); ?>
				
				<footer>
					<?php
						/* translators: 1: comment author, 2: date and time */
						printf( 
							__( '%1$s on %2$s', DPTPLNAME ),
							sprintf( 
								'<span class="author">%s</span>', 
								get_comment_author_link() 
							),
							sprintf( 
								'<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								sprintf( __( '%1$s at %2$s', DPTPLNAME ), 
								get_comment_date(), 
								get_comment_time() )
							)
						);
					?>
					
					<?php edit_comment_link( __( 'Edit', DPTPLNAME ), '<span class="edit-link">', '</span>' ); ?>
					
					<span class="reply">
						<?php comment_reply_link( 
							array_merge( 
								$args,
								array( 
									'reply_text' => __( 'Reply', DPTPLNAME ), 
									'depth' => $depth, 
									'max_depth' => $args['max_depth'] 
								) 
							) 
						); ?>
					</span>
				</footer>
			</section>
		</article>

	<?php
			break;
	endswitch;
}


/**
 *
 * Function used to generate post meta data
 *
 * @param attachment - for the attachment size the script generate additional informations
 *
 * @return null
 *
 **/
function gk_post_meta($attachment = false) {
 	global $tpl;
 	$tag_list = get_the_tag_list( '', __( ', ', DPTPLNAME ) );
 	?>
 	<div class="meta">
	 	
	 		<div class="mfield date">	 		
			

	 			<a  href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr(get_the_time()); ?>" rel="bookmark">
                    <?php echo mysql2date('j M Y',get_post()->post_date); ?>
 	 			</a></div>
	 		
	 		
	 		
	 		<?php if(!(is_tag() || is_search())) : ?>
		 		
			<?php if(get_option($tpl->name . '_postmeta_author_state') == 'Y') : ?>
		 	<div class="mfield author"><a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(sprintf(__('View all posts by %s', DPTPLNAME), get_the_author())); ?>" rel="author"><?php echo get_the_author(); ?></a></div>
            <?php  endif; ?>
		 	<?php if ( comments_open() && ! post_password_required() ) : ?>
			<?php if(get_option($tpl->name . '_postmeta_coments_state') == 'Y') : ?>
		 			<div class="mfield comments"><?php 
		 				comments_popup_link(
		 					'<span class="leave-reply">' . __( 'Leave a reply', DPTPLNAME ) . '</span>', 
		 					__( '<b>1</b> Comment', DPTPLNAME ), 
		 					__( '<b>%</b> Comments', DPTPLNAME )
		 				);
		 			?></div>
            <?php  endif; ?>
		 		<?php endif; ?> 		
		 		<?php if($tag_list != ''): ?>
		 		<div class="mfield tags"><?php echo $tag_list; ?></div>
		 		
		 		<?php endif; ?>
	 		<?php endif; ?>
            <?php if(get_post_format() != '') : ?>
	 		<span class="format gk-format-<?php echo get_post_format(); ?>">
	 			<?php echo get_post_format(); ?>
	 		</span>
	 		<?php endif; ?>	 		

 	</div>
 	
 	<?php
}

/**
 *
 * Function to generate the post pagination
 *
 * @return null
 *
 **/
function gk_post_links() {
	global $tpl;
	
	wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', DPTPLNAME ) . '</span>', 'after' => '</div>' ) );
}

/**
 *
 * Function to generate the post navigation
 * by Krisi 
 * @param id - id of the NAV element
 *
 * @return null
 *
 **/

function gk_content_nav($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

/**
 *
 * Function to generate the comment form
 *
 **/
function dp_comment_form( $args = array(), $post_id = null ) {
	global $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', DPTPLNAME ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', DPTPLNAME  ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s', DPTPLNAME ), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', DPTPLNAME ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', DPTPLNAME  ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', DPTPLNAME ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>', DPTPLNAME  ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave Comment', DPTPLNAME  ),
		'title_reply_to'       => __( 'Leave a Reply to %s', DPTPLNAME  ),
		'cancel_reply_link'    => __( 'Cancel reply', DPTPLNAME  ),
		'label_submit'         => __( 'Submit', DPTPLNAME ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond">
				<h3 class="heading-line" id="reply-title"><span><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?></span><small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							do_action( 'comment_form_before_fields' );

							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<p class="form-submit">
							<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</p>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}


/**
 *
 * Function to generate the post Social API elements
 *
 * @param title - title of the post
 * @param postID - ID of the post
 *
 * @return string - HTML output
 *
 **/
 
function gk_social_api($title, $postID) {
	global $tpl;
	// check if the social api is enabled on the specific page
	$social_api_mode = get_option($tpl->name . '_social_api_exclude_include', 'exclude');
	$social_api_articles = explode(',', get_option($tpl->name . '_social_api_articles', ''));
	$social_api_pages = explode(',', get_option($tpl->name . '_social_api_pages', ''));
	$social_api_categories = explode(',', get_option($tpl->name . '_social_api_categories', ''));
	//
	$is_excluded = false;
	//
	if($social_api_mode == 'include' || $social_api_mode == 'exclude') {
		//
		$is_excluded = 
			($social_api_pages != FALSE ? is_page($social_api_pages) : FALSE) || 
			($social_api_articles != FALSE ? is_single($social_api_articles) : FALSE) || 
			($social_api_categories != FALSE ? in_category($social_api_categories) : FALSE);
		//
		if($social_api_mode == 'exclude') {
			$is_excluded = !$is_excluded;
		}
	}
	//
	if($social_api_mode != 'none' && $is_excluded) {
		// variables for output
		$fb_like_output = '';
		$gplus_output = '';
		$twitter_output = '';
		$pinterest_output = '';
		// FB like
		if(get_option($tpl->name . '_fb_like', 'Y') == 'Y') {
			// configure FB like
			$fb_like_attributes = ''; 
			// configure FB like
			if(get_option($tpl->name . '_fb_like_send', 'Y') == 'Y') { $fb_like_attributes .= ' data-send="true"'; }
			$fb_like_attributes .= ' data-layout="'.get_option($tpl->name . '_fb_like_layout', 'standard').'"';
			$fb_like_attributes .= ' data-show-faces="'.get_option($tpl->name . '_fb_like_show_faces', 'true').'"';
			$fb_like_attributes .= ' data-width="'.get_option($tpl->name . '_fb_like_width', '500').'"';
			$fb_like_attributes .= ' data-action="'.get_option($tpl->name . '_fb_like_action', 'like').'"';
			$fb_like_attributes .= ' data-font="'.get_option($tpl->name . '_fb_like_font', 'arial').'"';
			$fb_like_attributes .= ' data-colorscheme="'.get_option($tpl->name . '_fb_like_colorscheme', 'light').'"';
			
			$fb_like_output = '<div class="fb-like" data-href="'.get_current_page_url().'" '.$fb_like_attributes.'></div>';
		}
		// G+
		if(get_option($tpl->name . '_google_plus', 'Y') == 'Y') {
			// configure +1 button
			$gplus_attributes = '';    		
			// configure +1 button attributes
			$gplus_attributes .= ' annotation="'.get_option($tpl->name . '_google_plus_count', 'none').'"'; 
			$gplus_attributes .= ' width="'.get_option($tpl->name . '_google_plus_width', '300').'"'; 
			$gplus_attributes .= ' expandTo="top"'; 
				
			if(get_option($tpl->name . '_google_plus_size', 'medium') != 'standard') { 
				$gplus_attributes .= ' size="'.get_option($tpl->name . '_google_plus_size', 'medium').'"'; 
			}
			
			$gplus_output = '<g:plusone '.$gplus_attributes.' callback="'.get_current_page_url().'"></g:plusone>';
		}
		// Twitter
		if(get_option($tpl->name . '_tweet_btn', 'Y') == 'Y') {
			// configure Twitter buttons    		  
			$tweet_btn_attributes = '';
			$tweet_btn_attributes .= ' data-count="'.get_option($tpl->name . '_tweet_btn_data_count', 'vertical').'"';
			if(get_option($tpl->name . '_tweet_btn_data_via', '') != '') {
				$tweet_btn_attributes .= ' data-via="'.get_option($tpl->name . '_tweet_btn_data_via', '').'"'; 
			}
			$tweet_btn_attributes .= ' data-lang="'.get_option($tpl->name . '_tweet_btn_data_lang', 'en').'"';
			  
			$twitter_output = '<a href="http://twitter.com/share" class="twitter-share-button" data-text="'.$title.'" data-url="'.get_current_page_url().'" '.$tweet_btn_attributes.'>'.__('Tweet', DPTPLNAME).'</a>';
		}
		// Pinterest
		if(get_option($tpl->name . '_pinterest_btn', 'Y') == 'Y') {
		      // configure Pinterest buttons               
		      $pinterest_btn_attributes = get_option($tpl->name . '_pinterest_btn_style', 'horizontal');
		      $pinterest_output = '<a href="http://pinterest.com/pin/create/button/?url='.get_current_page_url().'&amp;media='.get_post_meta($postID, 'gavern_opengraph_image', true).'&amp;description='.$title.'" class="pin-it-button" count-layout="'.$pinterest_btn_attributes.'"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="'.__('Pin it', DPTPLNAME).'" /></a>';
		}
		
		return '<section id="gk-social-api">' . $fb_like_output . $gplus_output . $twitter_output . $pinterest_output . '</section>';
	}
}

/**
 *
 * Function to generate the author info block
 *
 * @return null
 *
 **/
 
function gk_author($author_page = false) {
    global $tpl;

	// check if the author info is enabled on the specific page
	$authorinfo_mode = get_option($tpl->name . '_authorinfo_exclude_include', 'exclude');
	$authorinfo_articles = explode(',', get_option($tpl->name . '_authorinfo_articles', ''));
	$authorinfo_pages = explode(',', get_option($tpl->name . '_authorinfo_pages', ''));
	$authorinfo_categories = explode(',', get_option($tpl->name . '_authorinfo_categories', ''));
	//
	$is_excluded = false;
	//
	if($authorinfo_mode == 'include' || $authorinfo_mode == 'exclude') {
		//
		$is_excluded = 
			($authorinfo_pages != FALSE ? is_page($authorinfo_pages) : FALSE) || 
			($authorinfo_articles != FALSE ? is_single($authorinfo_articles) : FALSE) || 
			($authorinfo_categories != FALSE ? in_category($authorinfo_categories) : FALSE);
		//
		if($authorinfo_mode == 'exclude') {
			$is_excluded = !$is_excluded;
		}
	}
	//
	if($authorinfo_mode != 'none' && $is_excluded) :
		if(
			(is_page() && get_option($tpl->name . '_template_show_author_info_on_pages') == 'Y') ||
			!is_page()
		) :
		    if(
		        get_the_author_meta( 'description' ) && 
		        (
		        	$author_page ||
		        	get_option($tpl->name . '_template_show_author_info') == 'Y'
		        )
		    ): 
		    ?>
		    <section class="author-info">
		        <aside class="author-avatar">
		            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 64 ); ?>
		        </aside>
		        <div class="author-desc">
		            <h2>
		                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
		                    <?php printf( __( 'Author: %s %s', DPTPLNAME ), get_the_author_meta('first_name', get_the_author_meta( 'ID' )), get_the_author_meta('last_name', get_the_author_meta( 'ID' )) ); ?> 
		                </a>
		            </h2>
		            <p>
		                <?php the_author_meta( 'description' ); ?>
		            </p>
		
		            <?php 
		                $www = get_the_author_meta('user_url', get_the_author_meta( 'ID' ));
		                if($www != '') : 
		            ?>
		            <p class="author-www">
		                <?php _e('Website: ', DPTPLNAME); ?><a href="<?php echo $www; ?>"><?php echo $www; ?></a>
		            </p>
		            <?php endif; ?>
		            
		            <?php
		            	$google_profile = get_the_author_meta( 'google_profile' );
		            	if ($google_profile != '') :
		            ?>
		            <p class="author-google">
		            	<a href="<?php echo esc_url($google_profile); ?>" rel="me"><?php _e('Google Profile', DPTPLNAME); ?></a>
		            </p>
		            <?php endif; ?>
		        </div>
		    </section>
		    <?php 
		    endif;
		endif;
	endif;
}
/**
 *
 * Function to generate the recen post list
 *
 **/
function dp_print_recent_post($post_cat,$show_num,$thumb_width, $word_limit ) {
			 
			if ($post_cat =='All') $post_cat = '';
			$custom_posts = get_posts('showposts='.$show_num.'&cat='.get_cat_ID($post_cat));
			$output = "<div class='dp-recent-post-widget'>";
			if( !empty($custom_posts) ){  
			foreach($custom_posts as $custom_post) { 
				$output .= "<div class='recent-post-widget' >";
								$thumbnail_id = get_post_thumbnail_id( $custom_post->ID );				
								$thumbnail = wp_get_attachment_image_src( $thumbnail_id);
								$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);	
								if( !empty($thumbnail) ){
				$output .= "<div class='thumbnail'>";
				$output .= "<a href=".get_permalink( $custom_post->ID )."><img class='pic2' width='".$thumb_width."' src='" . $thumbnail[0] . "' alt='". $alt_text ."'/></a></div>";
					}
					$output .= "<div><div class='excerpt'> <a href='".get_permalink( $custom_post->ID )."'>"; 
							$excerpt =  get_post_field('post_content', $custom_post->ID);
							$excerpt = preg_replace('/<img[^>]+./','',$excerpt);
					$output .= string_limit_words($excerpt,$word_limit)."&hellip;</a></div>";
					$output .= "<div class='date'>".mysql2date('j M Y',$custom_post->post_date)."</div></div><div style='clear:both'></div></div>";
							
				
			} 
		
		 }
         $output .= "</div>";
return $output;
}
/**
 *
 * Function to generate the popular post list
 *
 **/

function dp_print_popular_posts($show_num,$thumb_width,$word_limit) {
	global $post;
		$popular_posts = get_popular_posts($show_num); 
		if($popular_posts->have_posts()){
		while($popular_posts->have_posts()): $popular_posts->the_post();
		 			 
			$output = "<div class='recent-post-widget'>";
				$thumbnail_id = get_post_thumbnail_id( $post->ID );				
				$thumbnail = wp_get_attachment_image_src( $thumbnail_id);
				$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
				if( !empty($thumbnail) ){
						$output .= '<div class="thumbnail">';
						$output .= '<a href="'.get_permalink( $post->ID ). '">';
						$output .=  '<img class="pic2" width="'.$thumb_width.'" src="' . $thumbnail[0] . '" alt="'. $alt_text .'"/>'; 
						$output .=  '</a></div>';
	
				}
						$output .=  '<div class="content">';
                		$output .=  '<div class="excerpt"><a href="'.get_permalink( $post->ID ).'">';
					 $excerpt = preg_replace('/<img[^>]+./','',get_the_content());
					 	$output .=  string_limit_words($excerpt,$word_limit).'&hellip;</a></div>';
						$output .= '<div class="date">';
                       	$output .=  mysql2date('j M Y',$post->post_date); 
						$output .=  '</div>';
						$output .=  '</div>';
						$output .=  '<div style="clear:both"></div>';
			$output .=  "</div>";

		endwhile;
		}
return $output;		
}



/**
 *
 * Function to generate the related projects thumbnail grid
 *
 **/
function dp_print_related_projects_grid($post_id,$show_num) {
	global $post;
	$related_projects = get_related_projects($post_id, $show_num);
	if($related_projects->have_posts()){
		echo '<div class="portfolio-wrapper">';
		while($related_projects->have_posts()): $related_projects->the_post();?>
		 <div class='portfolio-item'>
			<?php if(has_post_thumbnail()): ?> 
<div class="image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('portfolio-four'); ?>
					</a>
                 <?php
				 	$title = $post->post_title;
					$content = preg_replace('/<img[^>]+./','',get_the_content());  
					$content = string_limit_words($content,15).'&hellip;';
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
		<?php	endif; ?>
		<?php echo "</div>";

		endwhile;
		echo '</div>';
		}
		
}

/**
 *
 * Function to generate the related projects thumbnail grid
 *
 **/
function dp_print_recent_projects_grid($show_num, $thumb_width, $word_limit) {
	global $post;
	$recent_projects = get_recent_projects($show_num);
	echo '<div class="portfolio-grid">';
	if($recent_projects->have_posts()){
		while($recent_projects->have_posts()): $recent_projects->the_post();?>
		 <div class='recent-port' style="width: <?php echo $thumb_width ?>px">
			<?php if(has_post_thumbnail()): ?> 

					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('portfolio-recent'); ?>
					</a>
                 <?php
				 	$title = $post->post_title;
					$content = preg_replace('/<img[^>]+./','',get_the_content());  
					$content = string_limit_words($content,$word_limit).'&hellip;';
					$imageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				  ?>
				<div class="mask">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $content; ?></p>
               
                <a class="preview" rel="dp_lightbox[]" title="<?php echo $title; ?>" class="zoom" href="<?php echo $imageurl; ?>">
                </a><a title="View details" class="link" href="<?php the_permalink(); ?>"></a>

	
				</div>
                </div>			
		<?php	endif; 
		endwhile;
		echo '</div><div style="clear:both"></div>';
		}
}

// EOF