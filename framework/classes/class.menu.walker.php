<?php

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	

/**
 *
 * Menu Walker class
 *
 * Used to generate the proper menu structure
 *
 **/
	
class GKMenuWalker extends Walker {
	
	// tree types for the menu
	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
	// database fields map
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
	
	
	/**
	 *
	 * Function used to generate the start code of the submenu
	 *
	 * @param output - reference to the variable with the output
	 * @param depth - depth of the element
	 *
	 * @return null (use reference instead of returning values)
	 * 
	 **/
	function start_lvl(&$output, $depth) {
		// generate the indent
		$indent = str_repeat("\t", $depth);
		// generate the opening tags
		$output .= "\n$indent<div class=\"sub-menu\"><ul>\n";
	}

	/**
	 *
	 * Function used to generate the end code of the submenu
	 *
	 * @param output - reference to the variable with the output
	 * @param depth - depth of the element
	 *
	 * @return null (use reference instead of returning values)
	 * 
	 **/
	function end_lvl(&$output, $depth) {
		// generate the indent
		$indent = str_repeat("\t", $depth);
		// generate the closing tag
		$output .= "$indent</ul></div>\n";
	}

	/**
	 *
	 * Function used to generate the start code of the menu element
	 *
	 * @param output - reference to the variable with the output
	 * @param item - the menu item to show
	 * @param depth - depth of the element
	 * @param args - additional arguments
	 *
	 * @return null (use reference instead of returning values)
	 * 
	 **/
	
	function start_el(&$output, $item, $depth, $args) {
		// access to the WordPress query
		global $wp_query;
		global $tpl;
		// generate indent
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		// variables for the value and class names
		$class_names = $value = '';
		// generate the list of classes (if the predefined classes exists)
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		// add the menu item class with ID
		$classes[] = 'menu-item-' . $item->ID;
		// filter all classes and join it with spaces
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		// generate the attribute class with all classes
		$class_names = ' class="' . esc_attr( $class_names ). ' root"';
		$submenuwidth = get_option($tpl->name . '_menu-item-data-submenu-cols-width-'.$item->ID);
		$class_names .= '"';
		if ($submenuwidth !='') $class_names .= ' data-submenu-width ="'.$submenuwidth.'" ';
		// prepare the menu item ID
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		// generate the ID attribute
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		// add the indent to the LI element structure
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		// check the attributes for the A element which will be put inside the create LI element 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$subtext = get_option($tpl->name . '_menu-item-data-subtext-'.$item->ID);
		$icon = get_option($tpl->name . '_menu-item-data-icon-'.$item->ID);
		// add to the output also the before element if exists
		$item_output = $args->before;
		// create the A element
		if ($depth == 0) $item_output .= '<div class="item-container">';
		$item_output .= '<a'. $attributes .'>';
		$item_output .= '<div class="menu-title">';
		// add icon if exist
		if ($icon != '') $item_output .='<img src="'.get_template_directory_uri() . '/images/icons/'.$icon.'" alt="">';
		// add the before and after elements for the link content if exists
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after.'</div>';
		$item_output .='<div  class="menu-subtitle">'. $subtext.'</div>';
		// close the A element
		$item_output .='</a>';
		if ($depth == 0) $item_output .='</div>';
		// add the after element for the link
		$item_output .= $args->after;
		// generate the final output
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 *
	 * Function used to generate the end code of the menu element
	 *
	 * @param output - reference to the variable with the output
	 * @param item - menu item - here not used but required by API
	 * @param depth - depth of the element
	 *
	 * @return null (use reference instead of returning values)
	 * 
	 **/
	function end_el(&$output, $item, $depth) {
		// close the LI tag
		$output .= "</li>\n";
	}
}

// EOF