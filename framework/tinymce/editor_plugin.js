(function() {
    tinymce.PluginManager.add('DPWPShortcodes', function( editor, url ) {
        editor.addButton( 'dp_style', {
			icon: 'dp-style',
			title: 'Add Popular HTML Tags Shortcode',
            icon: false,
            onclick: function() {
				editor.windowManager.open({
					file : url + '/style_dialog.php',
					width : 430 + editor.getLang('dp_style.delta_width', 0),
					height : 320 + editor.getLang('dp_style.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_columns', {
			icon: 'dp-columns',
			title: 'Add Columns Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/columns_dialog.php',
					width : 590 + editor.getLang('dp_columns.delta_width', 0),
					height : 370 + editor.getLang('dp_columns.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_button', {
			icon: 'dp-button',
			title: 'Add Button Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/buttons_dialog.php',
					width : 750 + editor.getLang('dp_button.delta_width', 0),
					height : 340 + editor.getLang('dp_button.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_lists', {
			icon: 'dp_lists',
			title: 'Add List Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/lists_dialog.php',
					width : 435 + editor.getLang('dp_lists.delta_width', 0),
					height : 395 + editor.getLang('dp_lists.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_testimonials', {
			icon: 'dp_testimonials',
			title: 'Add Testimonial Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/testimonials_dialog.php',
					width : 435 + editor.getLang('dp_testimonials.delta_width', 0),
					height : 395 + editor.getLang('dp_testimonials.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });


        editor.addButton( 'dp_boxes', {
			icon: 'dp_boxes',
			title: 'Add Info Boxes Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/boxes_dialog.php',
					width : 450 + editor.getLang('dp_boxes.delta_width', 0),
					height : 340 + editor.getLang('dp_boxes.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_icon_boxes', {
			icon: 'dp_icon_boxes',
			title: 'Add Icon Boxes Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/icon_boxes_dialog.php',
					width : 590 + editor.getLang('dp_icon_boxes.delta_width', 0),
					height : 560 + editor.getLang('dp_icon_boxes.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });


        editor.addButton( 'dp_images', {
			icon: 'dp_images',
			title: 'Add Image Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/images_dialog.php',
					width : 610 + editor.getLang('dp_images.delta_width', 0),
					height : 470 + editor.getLang('dp_images.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_lightbox', {
			icon: 'dp_lightbox',
			title: 'Add Lightbox Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/lightbox_dialog.php',
					width : 660 + editor.getLang('dp_lightbox.delta_width', 0),
					height : 440 + editor.getLang('dp_lightbox.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_tabs', {
			icon: 'dp_tabs',
			title: 'Add Tabs Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/tabs_dialog.php',
					width : 450 + editor.getLang('dp_tabs.delta_width', 0),
					height : 385 + editor.getLang('dp_tabs.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_slideshow', {
			icon: 'dp_slideshow',
			title: 'Add Slideshow Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/slideshow_dialog.php',
					width : 380 + editor.getLang('dp_slideshow.delta_width', 0),
					height : 320 + editor.getLang('dp_slideshow.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });


        editor.addButton( 'dp_map', {
			icon: 'dp-map',
			title: 'Add Google Map Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/map_dialog.php',
					width : 570 + editor.getLang('dp_maps.delta_width', 0),
					height : 555 + editor.getLang('dp_maps.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_vimeo', {
			icon: 'dp-vimeo',
			title: 'Add Vimeo Video Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/vimeo_dialog.php',
					width : 380 + editor.getLang('dp_vimeo.delta_width', 0),
					height : 260 + editor.getLang('dp_vimeo.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'dp_youtube', {
			icon: 'dp-youtube',
			title: 'Add Youtube Video Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/youtube_dialog.php',
					width : 380 + editor.getLang('dp_youtube.delta_width', 0),
					height : 260 + editor.getLang('dp_youtube.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

    });
})();
