<?php

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	


function dp_load_css_style(){
	    // Function add inline css for dynamic stuff
	    // based on the settings in the option panel.
	    //
		global $tpl;
		$css = '<style type="text/css">'."\n";
		// Body and html tag styling
		$css .= 'body {color:'.get_option($tpl->name . '_maincontent_text_color').'}'."\n";
		$css .= '.price-table .highlight-column .price-container, .accented, #gk-head a.textLogo span, hgroup h3 a:hover,.meta a:hover {color:'.get_option($tpl->name . '_maincontent_accent_color').'}'."\n";
		if (get_option($tpl->name . '_page_wrap_state') =='boxed' || is_page_template('template.boxedpage.php')):
		{if (get_option($tpl->name . '_body_bg_image_state')=='Y') {
		$css .= 'body {background: none!important;} html {background: url('.get_option($tpl->name . '_body_bg_image').') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;}'."\n";}
			$css .= 'body {background:'.get_option($tpl->name . '_body_bgcolor').' url('. get_template_directory_uri().'/images/patterns/'.get_option($tpl->name . '_body_pattern').'.png) 50% 0;}'."\n";
			$css .= '.gk-page-box {border:'.get_option($tpl->name . '_pagewrap_bordercolor').' solid '.get_option($tpl->name . '_pagewrap_border_width').'px; -moz-box-shadow: 0 0 '.get_option($tpl->name . '_pagewrap_shadow_size').'px '.get_option($tpl->name . '_pagewrap_shadow_color').';
	-webkit-box-shadow: 0 0 '.get_option($tpl->name . '_pagewrap_shadow_size').'px '.get_option($tpl->name . '_pagewrap_shadow_color').';
	box-shadow: 0 0 '.get_option($tpl->name . '_pagewrap_shadow_size').'px '.get_option($tpl->name . '_pagewrap_shadow_color').'}'."\n";}
		endif;
		
		if (get_option($tpl->name . '_single_post_title_state')=='N') $css .= '.single-post h3.post-title {display:none}'."\n";
		// Top panel stylling
		$css .= '#gk-top-panel {background-color:'.get_option($tpl->name . '_toppanel_bgcolor').'}'."\n";
		$css .= '#gk-top-panel {color:'.get_option($tpl->name . '_toppanel_text_color').'}'."\n";
		$css .= '#gk-top-panel h3.box-title, #gk-top-panel h2 {color:'.get_option($tpl->name . '_toppanel_header_color').'}'."\n";
		$css .= '#gk-top-panel a {color:'.get_option($tpl->name . '_toppanel_link_color').'}'."\n";
		$css .= '#gk-top-panel a:hover {color:'.get_option($tpl->name . '_toppanel_hlink_color').'}'."\n";
		$css .= 'a.top-panel-switcher {border-color: '.get_option($tpl->name . '_toppanel_bgcolor').' transparent transparent transparent;}'."\n";
		
		// Menu stylling
		$css .= '#main-menu > li.root a {color:'.get_option($tpl->name . '_mainmenu_link_color').'}'."\n";
		$css .= '#main-menu > li.root a:hover, #main-menu > li.root .sub-menu a:hover{color:'.get_option($tpl->name . '_mainmenu_hlink_color').'}'."\n";
		$css .= '#main-menu > li.current-menu-item.root a {color:'.get_option($tpl->name . '_mainmenu_alink_color').'}'."\n";
		$css .= '#main-menu > li.root .sub-menu a {color:'.get_option($tpl->name . '_mainmenu_link_color').'}'."\n";
		$css .= '#main-menu .sub-menu {background-color:'.hexToRGBA(get_option($tpl->name . '_mainmenu_subwraper_bgcolor'),get_option($tpl->name . '_mainmenu_subwraper_opacity')).'}'."\n";
		$css .= '#main-menu .sub-menu li a {color:'.get_option($tpl->name . 'mainmenu_submenu_link_color').'}'."\n";
		$css .= '#main-menu .sub-menu li a:hover {color:'.get_option($tpl->name . 'mainmenu_submenu_link_color').'}'."\n";
		$css .= '#main-menu .sub-menu li:hover {}'."\n";
		if (get_option($tpl->name . '_mainmenu_subwraper_shadow_state') =='Y'):
		$css .= '#main-menu .sub-menu {	-webkit-box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.2);
	-ms-box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.2);
	-o-box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.2);}'."\n";
		endif;
		//Slideshow area styling
		// flex
		if (get_option($tpl->name . '_slider_flex2_dots') =='N') $css .='.flexslider {margin:0 0 5px 0!important}'."\n";
		$css .='.incontent_image .flexslider {margin:0!important}'."\n";
		$css.= '.flexslider:hover .flex-next:hover, .flexslider:hover .flex-prev:hover, .flex-control-paging li a.flex-active {background-color:'.get_option($tpl->name . '_maincontent_accent_color').'}'."\n";
		$css.= '.flex1 .slidedesc h1, .pad p {color:'.get_option($tpl->name . '_slider_flex1_desc_color').'}'."\n";
		$css.= '.flex1 .flexslider div.pad {background-color:'.hexToRGBA(get_option($tpl->name . '_slider_flex1_desc_bgcolor'),get_option($tpl->name . '_slider_flex1_desc_bgopacity')).'}'."\n";
		$css.= '.flex2 .slidedesc h1, .pad p {color:'.get_option($tpl->name . '_slider_flex2_desc_color').'}'."\n";
		$css.= '.flex2 .flexslider div.pad {background-color:'.hexToRGBA(get_option($tpl->name . '_slider_flex2_desc_bgcolor'),get_option($tpl->name . '_slider_flex2_desc_bgopacity')).'}'."\n";

		//revolution
		$css .= '.tp-caption.very_big_white  {background-color:'.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		// 3 circle
		if (get_option($tpl->name . '_three_circle_image_1') !='') $css.= '.ch-img-1 {background-image: url('.get_option($tpl->name . '_three_circle_image_1').')!important;}'."\n";		
		if (get_option($tpl->name . '_three_circle_image_2') !='') $css.= '.ch-img-2 {background-image: url('.get_option($tpl->name . '_three_circle_image_2').')!important;}'."\n";		
		if (get_option($tpl->name . '_three_circle_image_3') !='') $css.= '.ch-img-3 {background-image: url('.get_option($tpl->name . '_three_circle_image_3').')!important;}'."\n";		
		$css .= '.circle2 .ch-info {background-color:'.hexToRGBA(get_option($tpl->name . '_maincontent_accent_color'),0.8).';}'."\n";
		$css .= '.circle3 .ch-item {box-shadow: 
					inset 0 0 0 0 '.hexToRGBA(get_option($tpl->name . '_maincontent_accent_color'),0.8).',
					inset 0 0 0 16px rgba(255,255,255,0.6),
					0 1px 2px rgba(0,0,0,0.1);
					-webkit-transition: all 0.4s ease-in-out;
					-moz-transition: all 0.4s ease-in-out;
					-o-transition: all 0.4s ease-in-out;
					-ms-transition: all 0.4s ease-in-out;
					transition: all 0.4s ease-in-out;
		}'."\n";
		$css .= '.circle3 .ch-item:hover {box-shadow: inset 0 0 0 160px '.hexToRGBA(get_option($tpl->name . '_maincontent_accent_color'),0.8).', inset 0 0 0 16px rgba(255,255,255,0.6), 0 1px 2px rgba(0,0,0,0.1);
		}'."\n";
		$css .= '.circle4 .ch-info {background:'.get_option($tpl->name . '_maincontent_accent_color').' url(../images/noise.png);}'."\n";
		$css .= '.circle5 .ch-info .ch-info-back  {background:'.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		$css .= '.circle6 .ch-info .ch-info-back   {background:'.hexToRGBA(get_option($tpl->name . '_maincontent_accent_color'),0).';}'."\n";
		$css .= '.circle6 .ch-item:hover .ch-info-back {background:'.hexToRGBA(get_option($tpl->name . '_maincontent_accent_color'),0.8).';}'."\n";
		// Main content stylling
		$css .= '.gk-page-wrap {color:'.get_option($tpl->name . '_maincontent_text_color').';}'."\n";
		$css .= 'body a,.more, article section.content a, article section.intro a,.gk-page-wrap a{color:'.get_option($tpl->name . '_maincontent_link_color').';}'."\n";
		$css .= '.gk-page-wrap a:hover {color:'.get_option($tpl->name . '_maincontent_hlink_color').';}'."\n";
		$css .= '.lines span span, .box #wp-calendar td a, .box #wp-calendar #prev a, .box #wp-calendar #next a, .team h3.person   {color:'.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		$css .= '.box #wp-calendar #today, .pagination a:hover, .pagination .current, .format, .item-info-overlay, .recent-port .mask,.pic2:hover,.btn, button, input[type="button"], input[type="submit"] {background-color:'.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		$css .= '.frame img:hover, .price-table .highlight-column .column-title, .tabs li a:hover,.tabs li a.current, .tabs li a.current ,.social a:hover , .socialteam a:hover, .tagcloud a:hover, #back-to-top:hover {background-color:'.get_option($tpl->name . '_maincontent_accent_color').'}'."\n";
		$css .= '.box.heading-line .box-title  span {border-bottom:1px solid '.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		$css .= '.vtabs li.current { border-left-color: '.get_option($tpl->name . '_maincontent_accent_color').'}'."\n";
		$css .= 'h3.heading-line  span {border-bottom-color:'.get_option($tpl->name . '_maincontent_accent_color').'}'."\n";
		$css .= '.button.white {color:'.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		//Portfolio
		$css .= '.portfolio-tabs li.active a, .portfolio-tabs li a:hover{color:'.get_option($tpl->name . '_maincontent_accent_color').';border-bottom: solid 2px '.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		$css .= 'ul.item-nav li:hover{background: '.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";
		$css .= '.item-info h3 {color: '.get_option($tpl->name . '_maincontent_accent_color').';}'."\n";

		//Footer area styling
		$css .= '#gk-bottom-wrap {background-color:'.get_option($tpl->name . '_footer_bg_color').'}'."\n";
		$css .= '#gk-bottom{color:'.get_option($tpl->name . '_footer_text_color').'}'."\n";
		$css .= '#gk-bottom h3.box-title, #gk-bottom h2 {color:'.get_option($tpl->name . '_footer_header_color').'}'."\n";
		$css .= '#gk-bottom .box a, #gk-footer-wrap a {color:'.get_option($tpl->name . '_footer_link_color').'}'."\n";
		$css .= '#gk-bottom .box a:active, #gk-bottom .box a:focus, #gk-bottom .box a:hover {color:'.get_option($tpl->name . '_footer_hlink_color').'}'."\n";
		$css .= '#gk-bottom .dp-recent-post-widget a {color:'.get_option($tpl->name . '_footer_link_color').'}'."\n";
		$css .= '#gk-bottom .dp-recent-post-widget a:hover {color:'.get_option($tpl->name . '_footer_text_color').'}'."\n";
		$css .= '#gk-footer-wrap {background-color:'.hexToRGBA(get_option($tpl->name . '_copyright_bg_color'),get_option($tpl->name . '_copyright_bg_opacity')).'}'."\n";
		$css .= '#footer-menu, #footer-menu a {color:'.get_option($tpl->name . '_footer_text_color').'}'."\n";
		$css .= '#footer-menu a:hover, #footer-menu a:active, #footer-menu a:focus {color:'.get_option($tpl->name . '_footer_link_color').'}'."\n";
		$css .= get_option($tpl->name . '_custom_css_code');
		//close tag
		$css .='</style>'."\n";
		
	    echo $css;
	}  
// EOF