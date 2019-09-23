<?php
	
// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	

/**
 *
 * Shortcodes
 *
 * CSS loaded from shortcodes.css
 * JS loaded from shortcodes.js
 *
 * Groups of shortcodes
 *
 * - typography
 * - layout shortcodes
 * - page interactive elements
 * - template specific shortcodes
 *
 **/


		
	function typo_h1($atts, $content = null) {
		return '<h1>'.$content.'</h1>';
	}
	
	function typo_h2($atts, $content = null) {
		return '<h2>'.$content.'</h2>';
	}
	
	function typo_h3($atts, $content = null) {
		return '<h3>'.$content.'</h3>';
	}
	
	function typo_h4($atts, $content = null) {
		return '<h4>'.$content.'</h4>';
	}
	
	function typo_h5($atts, $content = null) {
		return '<h5>'.$content.'</h5>';
	}
	
	function typo_h6($atts, $content = null) {
		return '<h6>'.$content.'</h6>';
	}
	
	function typo_contentheading($atts, $content = null) {
		return '<div class="contentheading">'.$content.'</div>';
	}
	
	function typo_componentheading($atts, $content = null) {	
		return '<div class="component-header"><h2 class="componentheading">'.$content.'</h2></div>';
	}
	
	function typo_div($atts, $content = null) {
		extract(shortcode_atts(array(
			'class' => '',
			'class2' => ''
		), $atts));

		if($class != '') $class = ' class="'.$class.'"';
		if($class2 != '') $class2 = ' class="'.$class2.'"';
		return '<div'.$class.'><div'.$class2.'>'.do_shortcode($content).'</div></div>';
	}
	
	function typo_div2($atts, $content = null) {
		extract(shortcode_atts(array(
			'class' => ''
		), $atts));

		if($class != '') $class = ' class="'.$class.'"';
		return '<div'.$class.'>'.do_shortcode($content).'</div>';
	}

	function typo_div3($atts, $content = null) {
		extract(shortcode_atts(array(
			'class' => '',
			'class2' => '',
			'class3' => ''
		), $atts));

		if($class != '') $class = ' class="'.$class.'"';
		if($class2 != '') $class2 = ' class="'.$class2.'"';
		if($class3 != '') $class3 = ' class="'.$class3.'"';
		return '<div'.$class.'><div'.$class2.'><div'.$class3.'>'.do_shortcode($content).'</div></div></div>';
	}
	
	function typo_box($atts, $content = null) {
		extract(shortcode_atts(array(
			'class' => ''
			), $atts));

		if($class != '') $class = ' class="'.$class.'"';
		return '<div'.$class.'><div class="typo-icon">'.do_shortcode($content).'</div></div>';
	}
	
	function typo_iconbox($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',
			'style' => '',
			'badge' => '',
			'size' => '',
			'class' =>'',
			'title' =>''
			), $atts));
		$iconurl = get_template_directory_uri().'/images/icons/icon_boxes/'.$style.'/'.$size.'/'.$type.'.png';
		if ($class=='left1') {
		$outputcontent = '<div class="'.$class;
		if ($badge!='') $outputcontent.= ' badge-'.$size;
		$outputcontent.='"'; 
		$outputcontent.= '>';
		$outputcontent.= '<div class="icon_box"><div class="dp_icon" style="background-color:'.$badge.'"><img src="'.$iconurl.'" alt="" /></div><div class="iconbox_text"><h3>'.$title.'</h3>';
		
		$outputcontent.= do_shortcode($content).'</div></div></div>';}
		
		if ($class=='left2') {
		$outputcontent = '<div class="'.$class.'">';
		if ($badge!='') {$outputcontent.= '<div class="badge-'.$size.'">';} else {$outputcontent.= '<div class="'.$size.'">';}
		$outputcontent.= '<div class="icon_box"><span class="dp_icon" style="background-color:'.$badge.'"><img src="'.$iconurl.'" alt="" /></span><h3>'.$title.'</h3><div class="iconbox_text" style="clear:both">';
		$outputcontent.= '</div>';
		$outputcontent.= do_shortcode($content).'</div></div></div>';}

		if ($class=='left3') {
		$outputcontent = '<div class="'.$class;
		if ($badge!='') $outputcontent.= ' badge-'.$size;
		$outputcontent.='"'; 
		$outputcontent.= '>';
		$outputcontent.= '<div class="icon_box"><div class="iconbox_text"><h3>'.$title.'</h3><div class="dp_icon" style="background-color:'.$badge.'"><img src="'.$iconurl.'" alt="" /></div>';
		
		$outputcontent.= do_shortcode($content).'</div></div></div>';}

		return $outputcontent;
	}
	
	function typo_icon($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',
			'style' => '',
			'badge' => '',
			'size' => ''
			), $atts));
		$iconurl = get_template_directory_uri().'/images/icons/icon_boxes/'.$style.'/'.$size.'/'.$type.'.png';
		$outputcontent = '<div';
		if ($badge!='') $outputcontent.= ' class="badge-'.$size.'"';
		$outputcontent.= ' style="float:left"><div class="dp_icon" style="background-color:'.$badge.'"><img src="'.$iconurl.'" alt="" /></div></div>';
		return $outputcontent;
	}
	
	
	function typo_pre($atts, $content = null) {	
		return '<pre>'.$content.'</pre>';
	}
	
	function typo_blockquote($atts, $content = null) {	
		return '<blockquote>'.$content.'</blockquote>';
	}
	
	function typo_blockquote1($atts, $content = null) {	
		return '<blockquote><div class="dp_blockquote1"><div>'.$content.'</div></div></blockquote>';
	}
	
	function typo_blockquote2($atts, $content = null) {	
		return '<blockquote><div class="dp_blockquote2"><div>'.$content.'</div></div></blockquote>';
	}
	
	function typo_blockquote3($atts, $content = null) {	
		return '<blockquote><div class="dp_blockquote3"><div>'.$content.'</div></div></blockquote>';
	}
	
	function typo_blockquote4($atts, $content = null) {	
		return '<blockquote><div class="dp_blockquote4"><div>'.$content.'</div></div></blockquote>';
	}
	
	function typo_blockquote5($atts, $content = null) {	
		return '<blockquote><div class="dp_blockquote5"><div>'.$content.'</div></div></blockquote>';
	}
	
	function typo_legend1($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => ''
		), $atts));
		return '<div class="dp_legend1"> <h4>'.$title.'</h4><p>'.do_shortcode($content).'</p></div>';
	}

	function typo_legend2($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => ''
		), $atts));
		return '<div class="dp_legend2"> <h4>'.$title.'</h4><p>'.do_shortcode($content).'</p></div>';
	}
	
	function typo_list($atts, $content = null) {
		extract(shortcode_atts(array(
			'class' => ''
		), $atts));

		if($class != '') $class = ' class="'.$class.'"';
		return '<ul'.$class.'>'.do_shortcode($content).'</ul>';
	}
	
	function typo_li($atts, $content = null) {
		extract(shortcode_atts(array(
			'class' => ''
		), $atts));
		
		if($class != '') : 
			return '<li><div class="'.$class.'">'.do_shortcode($content).'</div></li>';
		else :
			return '<li>'.do_shortcode($content).'</li>';
		endif;
	}
	
	function typo_ord_list($atts, $content = null) {
		extract(shortcode_atts(array(
			'class' => ''
		), $atts));

		if($class != '') $class = ' class="'.$class.'"';
		return '<ol'.$class.'>'.do_shortcode($content).'</ol>';
	}
	
	function typo_discnumber($atts, $content = null) {
		extract(shortcode_atts(array(
			'number' => '',
			'class' => 'number1'
		), $atts));
		return '<div class="'.$class.'"><p><span>'.$number.'</span>'.do_shortcode($content).'</p></div>';
	}
	
	function typo_bignumber($atts, $content = null) {
		extract(shortcode_atts(array(
			'number' => '',
			'class' => '3'
		), $atts));
		
		return '<p  class="bignumber bignumber-'.$class.'"><span class="bnumber">'.$number.'</span>'.do_shortcode($content).'</p>';
	}
	
	function typo_bubble($atts, $content = null) {
		extract(shortcode_atts(array(
			'author' => '',
			'class' => '1',
			'class1' => ''
		), $atts));
		
		return '<div class="bubble '.$class1.' bubble-'.$class.'"><div class="bubblecontent">'.do_shortcode($content).'</div><p class="bubble-meta"><span class="bubble-arrow"></span><span class="bubble-author">'.$author.'</span></p></div>';
	}

	function typo_emphasis($atts, $content = null) {	
		return '<em class="color">'.$content.'</em>';
	}
	
	function typo_emphasisbold($atts, $content = null) {	
		return '<em class="bold">'.$content.'</em>';
	}
	
	function typo_emphasisbold2($atts, $content = null) {	
		return '<em class="bold2">'.$content.'</em>';
	}
	
	function typo_inset($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' => '',
			'side' => 'left'
		), $atts));

		return '<span class="inset-'.$side.'"><span class="inset-'.$side.'-title">'.$title.'</span>'.$content.'</span>';
	}
	
	function typo_dropcap($atts, $content = null) {
		extract(shortcode_atts(array(
			'cap' => ''
		), $atts));

		return '<p class="dropcap"><span class="dropcap">'.$cap.'</span>'.$content.'</p>';
	}
	
	function typo_important($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => ''
		), $atts));

		return '<div class="important"><span class="important-title">'.$title.'</span>'.$content.'</div>';
	}
	
	function typo_underline($atts, $content = null) {	
		return '<span style="text-decoration:underline;">'.$content.'</span>';
	}
	
	function typo_bold($atts, $content = null) {	
		return '<span style="font-weight:bold;">'.$content.'</span>';
	}
	
	function typo_italic($atts, $content = null) {	
		return '<span style="font-style:italic;">'.$content.'</span>';
	}
	
	function typo_clear($atts, $content = null) {	
		return '<div class="clear"></div>';
	}
	
	function typo_readon($atts, $content = null) {
		extract(shortcode_atts(array(
			'url' => ''
		), $atts));

		return '<p class="rt-readon-surround"><a class="readon" href="'.$url.'"><span>'.$content.'</span></a></p>';
	}
	
	function typo_readon2($atts, $content = null) {
		extract(shortcode_atts(array(
			'url' => ''
		), $atts));

		return '<a href="'.$url.'">&nbsp;|&nbsp;'.$content.' &rarr</a>';
	}
	
	function typo_clearboth() {
   return '<div class="clearboth"></div>';
	}
	
	function typo_divider() {
		return '<div class="divider"></div>';
	}
	
	function typo_divider_top() {
		return '<div class="divider top"><a href="#">'.__('Top','dp_theme').'</a></div>';
	}
	
	function typo_space($atts, $content = null) {
		extract(shortcode_atts(array(
			'size' => '5'
			), $atts));
		return '<div class="space'.$size.'"></div>';
	}
	
	function typo_divider_padding() {
		return '<div class="divider_padding"></div>';
	}
	
	function typo_divider_line() {
		return '<div class="divider_line"></div>';
	}
	function typo_divider_shadow() {
		return '<div class="brd3"></div>';
	}
		
	function typo_button($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'id' => false,
			'class' => false,
			'size' => 'small',
			'link' => '',
			'linktarget' => '',
			'style' => 'dark',
			'bgcolor' => '',
			'width' => false,
			'textcolor' => '',
			'hoverbgcolor' => '',
			'hovertextcolor' => '',
			'full' => "false",
			'align' => false,
			'button' => "false",
		), $atts));
		$id = $id?' id="'.$id.'"':'';
		$full = ($full==="false")?'':' full';
		$style = $style?' '.$style:'';
		$class = $class?' '.$class:'';
		$link = $link?' href="'.$link.'"':'';
		$linktarget = $linktarget?' target="'.$linktarget.'"':'';
		
		$hoverbgcolor = $hoverbgcolor?($bgcolor?' data-bg="'.$bgcolor.'"':'').' data-hoverBg="'.$hoverbgcolor.'"':'';
		$hovertextcolor = $hovertextcolor?($textcolor?' data-color="'.$textcolor.'"':'').' data-hoverColor="'.$hovertextcolor.'"':'';
		
		$bgcolor = $bgcolor?' style="background-color:'.$bgcolor.'"':'';
		$width = $width?'width:'.$width.'px;':'';
		$textcolor = $textcolor?'color:'.$textcolor.';':'';
		
		if($align != 'center' && $align !== false){
			$aligncss = ' align'.$align;
		}else{
			$aligncss = '';
		}
		if($button == 'true'){
			$tag = 'button_sc';
		}else{
			$tag = 'a';
		}
		$content = '<'.$tag.$id.$link.$linktarget.$bgcolor.$hoverbgcolor.$hovertextcolor.' class="button_sc '.$size.$style.$full.$class.$aligncss.'"><span'.(($textcolor!==''||$width!='')?' style="'.$textcolor.$width.'"':'').'>' . trim($content) . '</span></'.$tag.'>';
		if($align === 'center'){
			return '<p class="center">'.$content.'</p>';
		}else{
			return $content;
		}
	}
	function typo_button_standart($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'link' => '',
			'linktarget' => '',
		), $atts));
		$link = $link?' href="'.$link.'"':'';
		$linktarget = $linktarget?' target="'.$linktarget.'"':'';
		
		
		$content = '<a class="btn" '.$link.' '.$linktarget. '>' . trim($content) . '</a>';
			return $content;
	}
/**
 *
 * Layout shortcodes
 *
 **/
function dp_column($atts, $content = null, $code) {
		
		return '<div class="'.$code.'">' . do_shortcode(trim($content)) . '</div>';
	}
/**
 *
 * Page interactive elements shortcodes
 *
 **/
 function dp_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
		'history' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$output = '<ul class="'.$code.'">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			if($history=='true'){
				$href= '#'.str_replace(" ", "_", trim($matches[3][$i]['title']));
			}else{
				$href = '#';
			}
			$output .= '<li><a href="'.$href.'">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div>';
		
		if($history=='true'){
			$data_history = ' data-history="true"';
		}else{
			$data_history = '';
		}
		
		return '<div class="'.$code.'_container"'.$data_history.'>' . $output . '</div>';
	}
}

function dp_vtabs($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => false,
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$output = '<ul class="vtabs">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			
			$output .= '<li><h4 class="vtab_title">' . $matches[3][$i]['title'] . '</h4></li>';
		}
		$output .= '</ul>';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="vtab_pane"><div class="vtab_pane_inner">' . do_shortcode(trim($matches[5][$i])) . '</div></div>';
		}
		
		
		return '<div class="vertical_tabs">' . $output . '</div>';
	}
}

function dp_accordions($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
	), $atts));
	
	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="accordion"><h4 class="acc_title"><span class="toggle_indicator"></span>' . $matches[3][$i]['title'] . '</h4>';
			$output .= '<div class="tab_content">' . do_shortcode(trim($matches[5][$i])) . '</div></div>';
		}
		
		return '<div class="accordions">' . $output . '</div>';
	}
}

function dp_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false
	), $atts));
	return '<div class="toggle"><h4 class="toggle_title"><span class="toggle_indicator"></span>' . $title . '</h4><div class="toggle_content">' . do_shortcode(trim($content)) . '</div></div>';
}

function dp_frame_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'icon' => '',
		'lightbox' => '',
		'title' => '',
		'desc' => '',
		'popupw' => '',
		'popuph' => ''
		), $atts));
	if($link !='') { if($lightbox =='true') {$output= '<a class="imgeffect '.$icon.'" href="'.$link.'?width='.$popupw.'&height='.$popuph.'" rel="dp_lightbox" title="'.$title.' :: '.$desc.'"><img src="'.do_shortcode($content).'" /></a>';} 
	else {$output= '<a class="imgeffect '.$icon.'" href="'.$link.'"><img src="'.do_shortcode($content).'" /></a>';}} else {$output= '<img src="' .do_shortcode($content) . '" />';}; 
   return '<span class="frame alignleft">' .$output . '</span>';
}

function dp_frame_right( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'icon' => '',
		'lightbox' => '',
		'title' => '',
		'desc' => '',
		'popupw' => '',
		'popuph' => ''
		), $atts));
	if($link !='') { if($lightbox =='true') {$output= '<a class="imgeffect '.$icon.'" href="'.$link.'?width='.$popupw.'&height='.$popuph.'" rel="dp_lightbox" title="'.$title.' :: '.$desc.'"><img src="'.do_shortcode($content).'" /></a>';} 
	else {$output= '<a class="imgeffect '.$icon.'" href="'.$link.'"><img src="'.do_shortcode($content).'" /></a>';}} else {$output= '<img src="' .do_shortcode($content) . '" />';}; 
   return '<span class="frame alignright">' .$output . '</span>';
}

function dp_frame_center( $atts, $content = null ) {
extract(shortcode_atts(array(
		'link' => '',
		'icon' => '',
		'lightbox' => '',
		'title' => '',
		'desc' => '',
		'popupw' => '',
		'popuph' => ''
		), $atts));
	if($link !='') { if($lightbox =='true') {$output= '<a class="imgeffect '.$icon.'" href="'.$link.'?width='.$popupw.'&height='.$popuph.'" rel="dp_lightbox" title="'.$title.' :: '.$desc.'"><img src="'.do_shortcode($content).'" /></a>';} 
	else {$output= '<a class="imgeffect '.$icon.'" href="'.$link.'"><img src="'.do_shortcode($content).'" /></a>';}} else {$output= '<img src="' .do_shortcode($content) . '" />';}; 
    return '<div style="text-align:center;"><span class="frame aligncenter">' .$output . '</span></div>';
}
function dp_table($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => false,
		'width' => false,
	), $atts));
	
	
	if($width){
		$width = ' style="width:'.$width.'"';
	}else{
		$width = '';
	}
	
	$id = $id?' id="'.$id.'"':'';
	
	return '<div'.$id.$width.' class="table_style">' . do_shortcode(trim($content)) . '</div>';
}

function dp_photo_gallery( $atts, $content = null ) {
	//[photo_gallery]
	$dp_photo_gallery='<ul class="photo_gallery">';
	$dp_photo_gallery .= do_shortcode(strip_tags($content));
	$dp_photo_gallery.='</ul><div style="clear:both"></div>';
	return $dp_photo_gallery;
}

function dp_photo_gallery_lines( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'icon' => '',
		'lightbox' => '',
		'title' => '',
		'desc' => '',
		'twidth' => '',
		'theight' => ''
		), $atts));
	//dimension attiributes
	
	//dimension defaults
	if(!$twidth && !$theight):
		$twidth="145";
		$theight="100";
	endif;
 
 	
	$lightbox='rel="dp_lightbox[gallery]"';

	//title
	$title=trim($atts["title"]);
	$alt ='alt="'.$title.'"';
	$title ='title="'.$title.'"';
	

 
	$photo=trim($content);
	
	$photo_link=trim($content);
	 
	$dp_photo_gallery_lines='<li><a class="imgeffect plus" href="'.$photo_link.' " '.$title.'  '.$alt.'  '.$lightbox.' class="imgeffect plus"><img style="width:'.$twidth.'px; height: '.$theight.'px " src="'.$photo.'"  /></a></li>';
	
	return $dp_photo_gallery_lines;
}	


function lightbox_shortcode($atts, $content = null) {
   
	extract(shortcode_atts(array(
		'title' => '',
		'album' => '',
		'text' => '',
		'thumb' => '',
		'width' =>'',
		'height' =>'',
		'class' => '',
		'imgclass' => '',
		'twidth' => '150',
		'theight' => '100'
	), $atts));
	
	$isimage = 0;
	$last3 = strtolower(substr($content, -3));
	$last4 = strtolower(substr($content, -4));
	
	
	
	
	// Default vars
	
	$content = trim($content);
	$display = '';
	$title = strip_tags($title);
	
	if($class != '') :	$link_class = $class; elseif($album != '') : $link_class = $album; else : $link_class = 'lightbox-image'; endif;
	if($album != '') : $album = '['.$album.']'; endif;
	if ($width != '' || $height != '') : $content .='?width='.$width.'&height='.$height; endif;
	
	if ($last3 == "jpg" || $last3 == "png" || $last3 == "bmp" || $last3 == "gif" || $last4 == "jpeg") :
		$isimage = 1;
	endif;
	
	$generate_lightbox = '';
	
	
		if($thumb != '') {
		
			$generate_lightbox = '<a rel="dp_lightbox'.$album.'" title="'.$title.'" href="'.$content.'" class="'.$link_class.'"><img src="'.$thumb.'" alt="'.$title.'" class="'.$imgclass.'" /></a>';
	
		} elseif($text != '') {
		
			$generate_lightbox = '<a rel="dp_lightbox'.$album.'" title="'.$title.'" href="'.$content.'" class="'.$link_class.'">'.$text.'</a>';
		
		} elseif($text == '' && !$isimage) {
		
			$text = 'Click me!';
			
			$generate_lightbox = '<a rel="dp_lightbox'.$album.'" title="'.$title.'" href="'.$content.'" class="'.$link_class.'">'.$text.'</a>';
		
		} elseif($isimage) {
		
				$generate_lightbox = '<a rel="dp_lightbox'.$album.'" title="'.$title.'" href="'.$content.'" class="'.$link_class.'"><img style="width:'.$twidth.'px; height: '.$theight.'px " src="'.$content.'" alt="'.$title.'" class="'.$imgclass.'" /></a>';
					
	}
	
	return $generate_lightbox;
	
}

function dp_slideshow($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'id' => '',
		'speed' =>'5',
		'type' =>'image',
	), $atts));
	
	
	include_once (get_template_directory() . '/framework/helpers/helpers.contentslideshow.php');
		
		 
	$return_html = contentslideshow($id, $speed, $type);
	
	return $return_html;
}

function dp_carousel($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'id' => '',
		'itemwidth' =>'190',
		'itemmargin' =>'5',
		'minitem' =>'3',
		'maxitem' =>'5',

	), $atts));
	
	
	include_once (get_template_directory() . '/framework/helpers/helpers.contentcarousel.php');
		
		 
	$return_html = contentcarousel($id, $itemwidth ,$itemmargin ,$minitem , $maxitem);
	
	return $return_html;
}

function dp_pricing_table( $atts, $content = null ) {
	global $dp_pricing_table;
	extract(shortcode_atts(array(
		'columns' => '3'
    ), $atts));
	switch ($columns) {
		case '2':
			$columnsClass = 'two-column-table';
			break;
		case '3':
			$columnsClass = 'three-column-table';
			break;
		case '4':
			$columnsClass = 'four-column-table';
			break;
		case '5':
			$columnsClass = 'five-column-table';
			break;
		case '6':
			$columnsClass = 'six-column-table';
			break;
	}
	do_shortcode($content);
	$columnContent = '';
	if (is_array($dp_pricing_table)) {
		for ($i = 0; $i < count($dp_pricing_table); $i++) {
			$colClass = 'price-column'; $n = $i + 1;
			$colClass .= ( $n % 2 ) ?  '' : ' even-column';
			$colClass .= ( $dp_pricing_table[$i]['highlight'] ) ?  ' highlight-column' : '';
			$colClass .= ( $n == count($dp_pricing_table) ) ?  ' last-column' : '';
			$colClass .= ( $n == 1 ) ?  ' first-column' : '';
			$columnContent .= '<div class="'.$colClass.'">'; 
			$columnContent .= '<h3 class="column-title">'.$dp_pricing_table[$i]['title'].'</h3>'; 
			$columnContent .= str_replace(array("\r\n", "\n", "\r"), array("", "", ""), $dp_pricing_table[$i]['content']); 
			$columnContent .= '</div>'; 
		}
		$generate_table = '<div class="price-table '.$columnsClass.'">'.$columnContent.'</div>';
	}
	$dp_pricing_table = '';
	
	return $generate_table;
	
}
function dp_pricing_column( $atts, $content = null ) {
	global $dp_pricing_table;
	extract(shortcode_atts(array(
		'title' => '',
		'highlight' => 'false'
    ), $atts));

	$highlight = strtolower($highlight);
	$column['title'] = $title;
	$column['highlight'] = ( $highlight == 'true' || $highlight == 'yes' || $highlight == '1' ) ? true : false;
	$column['content'] = do_shortcode($content);
	
	$dp_pricing_table[] = $column;
}
function dp_price_data( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'price' => ''
    ), $atts));

	$price_data = '<div class="price-container">';
	if ($price) $price_data .= '<div class="price">'. $price .'</div>';
	if ($content) $price_data .= '<div class="details">'. do_shortcode($content) .'</div>';
	$price_data .= '</div>';
	

	return $price_data;
	
}
function dp_googlemap( $atts ){

    global $attributes;
    global $js;
    
    extract(shortcode_atts(Array(
            'id'     => 'mapa1',
            'width'  => '600',
            'height' => '350',
            'margin' => '0',
            'text'  => '',
            'long'      => '',
            'lat'      => '',
            'zoom'   => 12 ,
			'mapcontrol' => 'false',
			'streetview' => 'false',
			'zoomcontrol'=> 'true',
			'pancontrol'=> 'true',
			'address' => ''
        ), $atts ));
    
    $js = '
        <script>
            jQuery(document).ready(function(){
                var info = {
                   latitude: "'. $lat .'",
                   longitude: "'. $long .'",
				   address: "'.$address.'",
                    zoom  : '. $zoom .',
					controls: {
         panControl: '. $pancontrol .',
         zoomControl: '. $zoomcontrol .',
         mapTypeControl: '. $mapcontrol .',
         scaleControl: false,
         streetViewControl: '. $streetview .',
         overviewMapControl: false
     },
					markers:[
		{
			latitude: "'. $lat .'",
			longitude: "'. $long .'",
			address: "'.$address.'",
			html: "'. $text .'",
		}]
                    
					} ;             
                jQuery("#'. $id .'").gMap(info );
				 
            });
        </script>';
    
    $attributes = 'id="'. $id .'" class="gmap" style="width:'. $width .'px; height:'. $height .'px; margin:'. $margin .'px; overflow:hidden;"';
    return $js . '<div '. $attributes .'></div>';}
	
function dp_chart( $atts ) {
	extract(shortcode_atts(array(
	    'data' => '',
	    'colors' => '',
		'size' => '400x200',
	    'bg' => 'bg,s,ffffff',
	    'title' => '',
	    'labels' => '',
	    'advanced' => '',
	    'type' => 'pie'
	), $atts));
 
	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
	}
 
	
	$string = '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf='.$bg.'';
	if ($charttype=='bhg') $string .= '&chxt=x,y';
	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chxl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	
	return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />';
}
function dp_youtube($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video_id.'?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>';
	return $return_html;
}


function dp_vimeo($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed></object>';
	
	return $return_html;
}

function dp_html5video($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'poster' => '',
		'mp4' => '',
		'webm' => '',
		'ogg' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<div class="video-js-box vim-css"> 
    <video id="example_video_1" class="video-js" width="'.$width.'" height="'.$height.'" controls="controls" preload="auto" poster="'.$poster.'"> 
      <source src="'.$mp4.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' /> 
      <source src="'.$webm.'" type=\'video/webm; codecs="vp8, vorbis"\' /> 
      <source src="'.$ogg.'" type=\'video/ogg; codecs="theora, vorbis"\' /> 
      <object id="flash_fallback_1" class="vjs-flash-fallback" width="640" height="264" type="application/x-shockwave-flash"
        data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf"> 
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" /> 
        <param name="allowfullscreen" value="true" /> 
        <param name="flashvars" value=\'config={"playlist":["'.$poster.'", {"url": "'.$mp4.'","autoPlay":false,"autoBuffering":true}]}\' /> 
        <img src="'.$poster.'" width="640" height="264" alt="Poster Image"
          title="No video playback capabilities." /> 
      </object> 
    </video> 
  </div> ';
	
	return $return_html;
}
function dp_popular_posts($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'number' => '3',
		'thumb_width' => '70',
		'words' => '15'
	), $atts));
	
	
	$return_html = dp_print_popular_posts($number,$thumb_width, $words );
	
	return $return_html;
}

function dp_recent_posts($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'cat' => '',
		'number' => '3',
		'thumb_width' => '70',
		'words' => '15'
	), $atts));
	
	$return_html = dp_print_recent_post($cat,$number,$thumb_width, $words );
	
	return $return_html;
}
function dp_social_links( $atts, $content = null ) {
	//[social_links_container]
	$dp_social_links='<div class="social">';
	$dp_social_links .= do_shortcode(strip_tags($content));
	$dp_social_links.='</ul><div style="clear:both"></div>';
	return $dp_social_links;
}

function dp_social_links_item( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'class' => '',
		'title' => ''
		), $atts));
	$dp_social_links_item='<a class="'.$class.'" href="'.$link.' " title="'.$title.'"></a>';
	
	return $dp_social_links_item;
}	

function dp_team_box($atts, $content) {
	//extract short code attr
	extract(shortcode_atts(array(
		'name' => '',
		'title' => '',
		'imgurl' => '',
		'class' => '',
		'twitter' => '',
		'facebook' => '',
		'linkedin' => '',
		'skype' => '',
		'rss' => '',
		'youtube' => '',
		'instagram' => '',
		'pinterest' => '',
		'behance' => ''

	), $atts));
	
	$return_html = '<div class="team '.$class.'"><h3 class="person">'.$name;
	if ($title !='') { $return_html .= ' – <span>'.$title.'</span>';}
	
	$return_html .= '</h3></div>';
	$return_html .= '<img class="pic3" alt="" src="'.$imgurl.'">';
	$return_html .= '<p>'.$content.'</p><div class="socialteam '.$class.'">';

	if ($twitter != '') {
		$return_html .='<a class="twitter" title="Twitter" href="'.$twitter.'"></a>';
	}
	if ($facebook != '') {
		$return_html .='<a class="facebook" title="Facebook" href="'.$facebook.'"></a>';
	}
	if ($linkedin != '') {
		$return_html .='<a class="linkedin" title="Linkedin" href="'.$linkedin.'"></a>';
	}
	if ($skype != '') {
		$return_html .='<a class="skype" title="Skype" href="'.$skype.'"></a>';
	}
	if ($rss != '') {
		$return_html .='<a class="rss" title="RSS" href="'.$rss.'"></a>';
	}
	if ($youtube != '') {
		$return_html .='<a class="youtube" title="Youtube" href="'.$youtube.'"></a>';
	}
	if ($pinterest != '') {
		$return_html .='<a class="pinterest" title="Pinterest" href="'.$pinterest.'"></a>';
	}
	if ($instagram != '') {
		$return_html .='<a class="instagram" title="Instagram" href="'.$instagram.'"></a>';
	}
	if ($behance != '') {
		$return_html .='<a class="behance" title="Behance" href="'.$behance.'"></a>';
	}

	$return_html .='</div>';
	     
	return $return_html;
}

/**
 *
 * Template specific shortcodes
 *
**/ 

 		add_shortcode('one_half', 'dp_column');
		add_shortcode('one_third', 'dp_column');
		add_shortcode('one_fourth','dp_column');
		add_shortcode('one_fifth', 'dp_column');
		add_shortcode('one_sixth', 'dp_column');
		add_shortcode('two_third', 'dp_column');
		add_shortcode('three_fourth', 'dp_column');
		add_shortcode('two_fifth', 'dp_column');
		add_shortcode('three_fifth', 'dp_column');
		add_shortcode('four_fifth', 'dp_column');
		add_shortcode('five_sixth', 'dp_column');
		add_shortcode('one_half_last', 'dp_column');
		add_shortcode('one_third_last', 'dp_column');
		add_shortcode('one_fourth_last','dp_column');
		add_shortcode('one_fifth_last', 'dp_column');
		add_shortcode('one_sixth_last', 'dp_column');
		add_shortcode('two_third_last' ,'dp_column');
		add_shortcode('three_fourth_last', 'dp_column');
		add_shortcode('two_fifth_last', 'dp_column');
		add_shortcode('three_fifth_last','dp_column');
		add_shortcode('four_fifth_last','dp_column');
		add_shortcode('five_sixth_last','dp_column');
		add_shortcode('h1', 'typo_h1');
		add_shortcode('h2', 'typo_h2');
		add_shortcode('h3', 'typo_h3');
		add_shortcode('h4', 'typo_h4');
		add_shortcode('h5', 'typo_h5');
		add_shortcode('h6', 'typo_h6');
		add_shortcode('contentheading', 'typo_contentheading');
		add_shortcode('componentheading', 'typo_componentheading');
    	add_shortcode('div', 'typo_div');
		add_shortcode('div2', 'typo_div2');
    	add_shortcode('div3', 'typo_div3');
		add_shortcode('box', 'typo_box');
		add_shortcode('iconbox', 'typo_iconbox');
		add_shortcode('icon', 'typo_icon');
		add_shortcode('pre', 'typo_pre');
    	add_shortcode('blockquote', 'typo_blockquote');
	    add_shortcode('blockquote1', 'typo_blockquote1');
		add_shortcode('blockquote2', 'typo_blockquote2');
		add_shortcode('blockquote3', 'typo_blockquote3');
		add_shortcode('blockquote4', 'typo_blockquote4');
		add_shortcode('blockquote5', 'typo_blockquote5');
		add_shortcode('legend1', 'typo_legend1');
		add_shortcode('legend2', 'typo_legend2');
		add_shortcode('list', 'typo_list');
		add_shortcode('li', 'typo_li');
		add_shortcode('ord_list', 'typo_ord_list');
		add_shortcode('discnumber', 'typo_discnumber');
		add_shortcode('bignumber', 'typo_bignumber');
		add_shortcode('bubble', 'typo_bubble');
		add_shortcode('emphasis', 'typo_emphasis');
		add_shortcode('emphasis', 'typo_emphasis');
		add_shortcode('emphasisbold', 'typo_emphasisbold');
		add_shortcode('emphasisbold2', 'typo_emphasisbold2');
		add_shortcode('inset', 'typo_inset');
		add_shortcode('dropcap', 'typo_dropcap');
		add_shortcode('important', 'typo_important');
		add_shortcode('underline', 'typo_underline');
		add_shortcode('bold', 'typo_bold');
		add_shortcode('italic', 'typo_italic');
		add_shortcode('clear', 'typo_clear');
		add_shortcode('readon', 'typo_readon');
		add_shortcode('readon2', 'typo_readon2');
		add_shortcode('clearboth', 'typo_clearboth');
		add_shortcode('divider', 'typo_divider');
		add_shortcode('divider_top', 'typo_divider_top');
		add_shortcode('space', 'typo_space');
		add_shortcode('divider_padding', 'typo_divider_padding');
		add_shortcode('divider_line', 'typo_divider_line');
		add_shortcode('divider_shadow', 'typo_divider_shadow');
		add_shortcode('button', 'typo_button');
		add_shortcode('btn', 'typo_button_standart');
		add_shortcode('tabs', 'dp_tabs');
		add_shortcode('vtabs', 'dp_vtabs');
		add_shortcode('accordions', 'dp_accordions');
		add_shortcode('toggle', 'dp_toggle');
		add_shortcode('frame_left', 'dp_frame_left');
		add_shortcode('frame_right', 'dp_frame_right');
		add_shortcode('frame_center', 'dp_frame_center');
		add_shortcode('table_style', 'dp_table');
		add_shortcode('photo_gallery', 'dp_photo_gallery');
        add_shortcode('image', 'dp_photo_gallery_lines');
		add_shortcode('lightbox', 'lightbox_shortcode');
		add_shortcode('slideshow', 'dp_slideshow');
		add_shortcode('carousel', 'dp_carousel');	
		add_shortcode('pricing_table', 'dp_pricing_table');
		add_shortcode('pricing_column', 'dp_pricing_column');
		add_shortcode('price_data', 'dp_price_data');
		add_shortcode('gmap', 'dp_googlemap');
		add_shortcode('chart', 'dp_chart');
		add_shortcode('vimeo', 'dp_vimeo');
		add_shortcode('youtube', 'dp_youtube');
		add_shortcode('html5video', 'dp_html5video');
		add_shortcode('recent_posts', 'dp_recent_posts');
		add_shortcode('popular_posts', 'dp_popular_posts');
		add_shortcode('social', 'dp_social_links');
        add_shortcode('social_link', 'dp_social_links_item');
		add_shortcode('teambox', 'dp_team_box');

/*EOF*/