<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Buttons Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/buttons_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/colorpicker/colorpicker.js"></script>
    <script>
 function addColorPicker(inputField, colorSelector, defaultColor) {
	jQuery( colorSelector).ColorPicker({
		color: '#'+defaultColor,
		onShow: function (colpkr) {
			jQuery(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			jQuery(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			jQuery(colorSelector).css('backgroundColor', '#' + hex);
			jQuery('input'+inputField).attr("value",'#' + hex);
		},
		onSubmit: function(hsb, hex, rgb, el) {
			jQuery(el).val(hex);
			jQuery(el).ColorPickerHide();
		}
	});
    }(jQuery)
 </script>
    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
	
<div class="panel_wrapper" style="height:280px"> 
					           
           
	       <table border="0" cellpadding="4" cellspacing="0">
				 <tr>
				   <td align="right" nowrap="nowrap"><label style="font-size:12px;">Button text: </label></td>
				   <td>
				     <input type="text" name="dp_button_text" id="dp_button_text" style=" width:260px;">
			      </td>
				   <td align="right">&nbsp;</td>
				   <td>&nbsp;</td>
			      </tr>
				 <tr>
				   <td align="right" nowrap="nowrap"><label style="font-size:12px;">Link URL:  </label></td>
				   <td><input type="text" name="dp_button_url" id="dp_button_url" style=" width:260px;"></td>
				   <td><label style="font-size:12px;">Open in: </label></td>
				   <td align="right"><select name="dp_button_target" id="dp_button_target" style=" width:130px;" >
				       <option value="_self">The same window</option>
				       <option value="_blank">New window</option>
		           </select></td>
				     
         </tr>
				 <tr>
					<td align="right" nowrap="nowrap"><label style="font-size:12px;">Select style: </label></td>
					<td><select name="dp_button_style" id="dp_button_style" style=" width:220px;" >
					  <optgroup label="Predefined Styles">
                      <option value="dark">Dark (default)</option>
					  <option value="light">Light</option>
					  <option value="white">White</option>
					  <option value="black">Black</option>
					  <option value="gray">Gray</option>
					  <option value="limon">Limon</option>
					  <option value="pink">Pink</option>
                      <option value="burgund">Burgund</option>
					  <option value="coffee">Coffee</option>
					  <option value="orange">Orange</option>
					  <option value="purple">Purple</option>
                      <option value="blue">Blue</option>
					  <option value="teal">Teal</option>
                      </optgroup>
                       <optgroup label="Read more style ">
                      <option value="readon">Read more</option>
                      </optgroup>
                      <optgroup label="Select this for custom colors">
                      <option value="custom">Custom</option>
                      </optgroup>
				    </select></td>
					<td align="right"><label style="font-size:12px;">Size: </label></td>
					<td><select name="dp_button_size" id="dp_button_size" style=" width:130px;" >
					  <option value="small">Small</option>
					  <option value="medium">Medium</option>
                      <option value="large">Large</option>
				    </select></td>
				  </tr>
				</table>
				<p class="usage">Select all options and click the "Insert" button to add it to your page. If you want to create a custom button, please select <strong>Style => Custom</strong> above and use the options below.</p>
                <fieldset>
				<legend>Custom Button Settings</legend>
                <table border="0" cellspacing="5" cellpadding="2">
  <tr>
    <td width="130" align="right"><label style="font-size:12px;">Button color: </label></td>
    <td width="90"><input type="text" maxlength="6" size="6" id="button_bg"  value="#fefefe" /></td>
    <td width="60"><div class="colorSelector1" id="button_bg_picker"><div style="background-color: #fefefe"></div></div></td>
  
    <td width="130" align="right"><label style="font-size:12px;">Button text color: </label></td>
    <td width="90"><input type="text" maxlength="6" size="6" id="button_text"  value="#000000" /></td>
    <td width="60"><div class="colorSelector1" id="button_text_picker"><div style="background-color: #000000"></div></div></td>
  </tr>
  
</table>
</fieldset>

  <script>
  addColorPicker('#button_bg', '#button_bg_picker', 'ffffff');
  addColorPicker('#button_text', '#button_text_picker', '000000');
 </script>
	
</div>
	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php echo "Cancel"; ?>" onClick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php echo "Insert"; ?>" onClick="insertShortcode();" />
		</div>
	</div>
</form>
</body>
</html>