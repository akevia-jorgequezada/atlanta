<?php



global $shortname;


# Register custom post type


$labels = array(
	'name' => _x('Slides', 'post type general name', DPTPLNAME),
    'singular_name' => _x('Slide', 'post type singular name', DPTPLNAME),
    'add_new' => _x('Add New', 'slide', DPTPLNAME),
    'add_new_item' => __('Add New Slide', DPTPLNAME),
    'edit_item' => __('Edit Slide', DPTPLNAME),
    'new_item' => __('New Slide', DPTPLNAME),
    'view_item' => __('Preview Slide', DPTPLNAME),
    'search_items' => __('Search Slides', DPTPLNAME),
    'not_found' => __('No slides found.', DPTPLNAME),
    'not_found_in_trash' => __('No slides found in Trash.', DPTPLNAME),
	'parent_item_colon' => '',
    'menu_name' => 'Slides'
);

register_post_type('slide', array(
    'label' => __('Slides', DPTPLNAME),
    'labels' => $labels,
    'singular_label' => __('Slide', DPTPLNAME),
    'public' => true,
    'show_ui' => true, 
	'show_in_menu' => true,
	'menu_position' => null, 
    '_builtin' => false, 
    'exclude_from_search' => true, 
    'capability_type' => 'page',
    'hierarchical' => true,
	'rewrite' => array("slug" => "slide"), 
    'query_var' => "slide", 
     'supports' => array('title', 'thumbnail', 'page-attributes', 'editor'),
    'menu_icon' => get_template_directory_uri() . '/images/admin/slides.png'
));




##############################################################
# Register associated taxonomy
##############################################################

$labels_slideshow = array(
    'name' => __('Slideshows', 'post type general name'),
    'all_items' => __('All Slideshows', 'all items'),
    'add_new_item' => __('Add New Slideshow', 'adding a new item'),
    'new_item_name' => __('New Slideshow Name', 'adding a new item'),
);

$args_slideshow = array(
    'labels' => $labels_slideshow,
    'hierarchical' => true
);

register_taxonomy( 'slideshows', 'slide', $args_slideshow );

##############################################################
# Customize Manage Posts interface
##############################################################

function edit_columns_slide($columns) {
    
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("Slide Title", DPTPLNAME),
        "slideshows" =>__("Slideshow", DPTPLNAME),
        "slide_type" => __("Slide Type", DPTPLNAME),
        "slide_image" => __("Image", DPTPLNAME)
    );

    return $columns;
}

function custom_columns_slide($column) {
    global $post;
   $type = get_post_meta(get_the_ID(),'dp_slide_type',TRUE);
   switch ($column) {

        case "slide_image":
            if ( $type == "i") {if (has_post_thumbnail()) { $imageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <img src="<?php echo $imageurl ?>" height="120"  />
			<?php } else  _e("Oops! This is an image slide, but you forgot a featured image.", DPTPLNAME);}
            if ( $type == "r") {if (has_post_thumbnail()) { $imageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <img src="<?php echo $imageurl ?>" height="120"  />
            <?php } else  _e("This is an revolution slide, but you don't use featured image. Slide will have transparent background.", DPTPLNAME);}
			if ( $type == "c") {echo '<img src="'. get_template_directory_uri().'/images/admin/html.png" width="48" height="48" />';} 
            break;

        case "slideshows":

            $slideshows = get_the_terms(0, "slideshows");
            $slideshows_html = array();
            if($slideshows) {
                foreach ($slideshows as $slideshow)
                    array_push($slideshows_html, $slideshow->name);

                echo implode($slideshows_html, ", ");
            }
            break;

        case "slide_type":
		if ($type == "i") { _e("Image Slide", DPTPLNAME);} 
		if ($type == "r") { _e("Revolution Animated Slide", DPTPLNAME);}
		if ($type == "c") { _e("Content Slide", DPTPLNAME);}
            break;

    }
}

add_filter("manage_edit-slide_columns", "edit_columns_slide");
add_action("manage_pages_custom_column", "custom_columns_slide");




?>