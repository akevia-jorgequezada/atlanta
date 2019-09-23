<?php

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	

/**
 *
 * Helper functions
 *
 * Extend WP menu 
 *
 **/
add_filter( 'wp_edit_nav_menu_walker', 'modify_backend_walker');
add_action( 'wp_update_nav_menu_item', 'update_menu', 100, 3);

function modify_backend_walker($name)
		{
			return 'DPMenuWalkerNavMenuEdit';
		}


class DPMenuWalkerNavMenuEdit extends Walker_Nav_Menu { 
    function start_lvl(&$output) {}
	function end_lvl(&$output) {}
    function start_el(&$output, $item, $depth, $args) {
        global $tpl;
		global $_wp_nav_menu_max_depth;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        ob_start();
        $item_id = esc_attr($item->ID);
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = '';
        if ('taxonomy' == $item->type) {
            $original_title = get_term_field('name', $item->object_id, $item->object, 'raw');
        } elseif ('post_type' == $item->type) {
            $original_object = get_post($item->object_id);
            $original_title = $original_object->post_title;
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr($item->object),
            'menu-item-edit-' . ((isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item']) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if (isset($item->post_status) && 'draft' == $item->post_status) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf(__('%s (Pending)', DPTPLNAME), $item->title);
        }

        $title = empty($item->label) ? $title : $item->label;

        ?>
        <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                    <span class="item-title"><?php echo esc_html($title); ?></span>
					<span class="item-controls">
						<span class="item-type"><?php echo esc_html($item->type_label); ?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
                                echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-up-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                ),
                                'move-menu_item'
                            );
                            ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', DPTPLNAME); ?>">&#8593;</abbr></a>
							|
							<a href="<?php
                                echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-down-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                ),
                                'move-menu_item'
                            );
                            ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', DPTPLNAME); ?>">
                                &#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php _e('Edit Menu Item', DPTPLNAME); ?>"
                           href="<?php
                            echo (isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item']) ? admin_url('nav-menus.php') : add_query_arg('edit-menu-item', $item_id, remove_query_arg($removed_args, admin_url('nav-menus.php#menu-item-settings-' . $item_id)));
                           ?>"><?php _e('Edit Menu Item', DPTPLNAME); ?></a>
					</span>
                </dt>
            </dl>

            <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
            <?php if ('custom' == $item->type) : ?>
                <p class="field-url description description-wide">
                    <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                    <?php _e('URL', DPTPLNAME); ?><br/>
                        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>"
                               class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]"
                               value="<?php echo esc_attr($item->url); ?>"/>
                    </label>
                </p>
            <?php endif; ?>
                <p class="description description-thin">
                    <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                    <?php _e('Navigation Label', DPTPLNAME); ?><br/>
                        <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>"
                               class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]"
                               value="<?php echo esc_attr($item->title); ?>"/>
                    </label>
                </p>

                <p class="description description-thin">
                    <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                    <?php _e('Title Attribute', DPTPLNAME); ?><br/>
                        <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>"
                               class="widefat edit-menu-item-attr-title"
                               name="menu-item-attr-title[<?php echo $item_id; ?>]"
                               value="<?php echo esc_attr($item->post_excerpt); ?>"/>
                    </label>
                </p>

                <p class="field-link-target description description-thin">
                    <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                    <?php _e('Link Target', DPTPLNAME); ?><br/>
                        <select id="edit-menu-item-target-<?php echo $item_id; ?>" class="widefat edit-menu-item-target"
                                name="menu-item-target[<?php echo $item_id; ?>]">
                            <option value="" <?php selected($item->target, ''); ?>><?php _e('Same window or tab', DPTPLNAME); ?></option>
                            <option value="_blank" <?php selected($item->target, '_blank'); ?>><?php _e('New window or tab', DPTPLNAME); ?></option>
                        </select>
                    </label>
                </p>
                <p class="field-css-classes description description-thin">
                    <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                    <?php _e('CSS Classes (optional)', DPTPLNAME); ?><br/>
                        <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>"
                               class="widefat code edit-menu-item-classes"
                               name="menu-item-classes[<?php echo $item_id; ?>]"
                               value="<?php echo esc_attr(implode(' ', $item->classes)); ?>"/>
                    </label>
                </p>

                <p class="field-xfn description description-thin">
                    <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                    <?php _e('Link Relationship (XFN)', DPTPLNAME); ?><br/>
                        <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>"
                               class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]"
                               value="<?php echo esc_attr($item->xfn); ?>"/>
                    </label>
                </p>

                <p class="field-description description description-wide">
                    <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                    <?php _e('Description', DPTPLNAME); ?><br/>
                        <textarea id="edit-menu-item-description-<?php echo $item_id; ?>"
                                  class="widefat edit-menu-item-description" rows="3" cols="20"
                                  name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html($item->description); ?></textarea>
                        <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', DPTPLNAME); ?></span>
                    </label>
                </p>
                <p class="field-dpmenu_subtext description description-thin">
                    <?php $optname = $tpl->name.'_menu-item-data-subtext-'.$item_id; ?>
            		<label for="<?php echo $optname ?>">
            		<?php _e('Subtext', DPTPLNAME); ?><br/>
                	<input type="text" id="<?php echo $optname ?>"
                       class="widefat code edit-menu-item-subtext"
                       name="<?php echo $optname ?>"
                       value="<?php echo get_option($optname) ?>"/>
            		</label>
        		</p>
        	<p class="field-dpmenu_icon description description-thin">
            <?php $optname = $tpl->name.'_menu-item-data-icon-'.$item_id; ?>
            <label for="<?php echo $optname ?>">
            <?php _e('Icon', DPTPLNAME); ?><br/>
                <select id="<?php echo $optname ?>"
                        class="widefat code edit-menu-item-icon"
                        name="<?php echo $optname ?>">
                    <option value=""<?php if (get_option($optname) == ''): ?>
                            selected="selected"<?php endif;?>></option>
                <?php
                $icon_path = get_template_directory() . '/images/icons';
                $icons = array();
                if (file_exists($icon_path) && is_dir($icon_path)) {
                    $d = dir($icon_path);
                    while (false !== ($entry = $d->read())) {
                        if (!preg_match('/^\./', $entry) && preg_match('/\.png$/', $entry)) {
                            $icon_name = basename($entry, '.png');
                            $icons[$entry] = $icon_name;
                        }
                    }
                }?>
                <?php foreach ($icons as $iconurl => $iconname): ?>
                    <option value="<?php echo $iconurl;?>"<?php if (get_option($optname) == $iconurl): ?>
                            selected="selected"<?php endif;?>><?php echo $iconname;?></option>
                <?php endforeach;?>
                </select>
            	</label>
        		</p>
                <p class="field-dpmenu_submenu_cols_width description description-thin">
                    <?php $optname = $tpl->name.'_menu-item-data-submenu-cols-width-'.$item_id; ?>
            		<label for="<?php echo $optname ?>">
            		<?php _e('Submenu width (px)', DPTPLNAME); ?><br/>
                	<input type="text" id="<?php echo $optname ?>"
                       class="widefat code edit-menu-item-submenu-cols-width"
                       name="<?php echo $optname ?>"
                       value="<?php echo get_option($optname) ?>"/>
            		</label>
        		</p>
                <div class="menu-item-actions description-wide submitbox">
                <?php if ('custom' != $item->type) : ?>
                    <p class="link-to-original">
                    <?php printf(__('Original: %s', DPTPLNAME), '<a href="' . esc_attr($item->url) . '">' . esc_html($original_title) . '</a>'); ?>
                    </p>
                <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                    echo wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'delete-menu-item',
                                'menu-item' => $item_id,
                            ),
                            remove_query_arg($removed_args, admin_url('nav-menus.php'))
                        ),
                            'delete-menu_item_' . $item_id
                    ); ?>"><?php _e('Remove', DPTPLNAME); ?></a> <span class="meta-sep"> | </span> <a
                        class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>"
                        href="<?php	echo add_query_arg(array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg($removed_args, admin_url('nav-menus.php')));
                        ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', DPTPLNAME); ?></a>
                </div>


                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]"
                       value="<?php echo $item_id; ?>"/>
                <input class="menu-item-data-object-id" type="hidden"
                       name="menu-item-object-id[<?php echo $item_id; ?>]"
                       value="<?php echo esc_attr($item->object_id); ?>"/>
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]"
                       value="<?php echo esc_attr($item->object); ?>"/>
                <input class="menu-item-data-parent-id" type="hidden"
                       name="menu-item-parent-id[<?php echo $item_id; ?>]"
                       value="<?php echo esc_attr($item->menu_item_parent); ?>"/>
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]"
                       value="<?php echo esc_attr($item->menu_order); ?>"/>
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]"
                       value="<?php echo esc_attr($item->type); ?>"/>
            </div>
            <!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        <?php
                $output .= ob_get_clean();
    }
} 

function update_menu($menu_id, $menu_item_db)
		{ global $tpl;
		foreach($_POST as $key => $value) {
 			if(strpos($key, $tpl->name . '_menu-item-data') !== false) {
 				update_option($key, esc_attr($value)); 
 			}
			}
				
		}


// EOF