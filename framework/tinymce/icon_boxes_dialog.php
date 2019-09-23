<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Icon Boxes Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/icon_boxes_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/colorpicker/colorpicker.js"></script>
    <script>
 function addColorPicker(inputField, colorSelector, defaultColor) {
	jQuery('.colorSelector1').ColorPicker({
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
			jQuery('.colorSelector1').css('backgroundColor', '#' + hex);
			jQuery('input'+inputField).attr("value",'#' + hex);
		},
		onSubmit: function(hsb, hex, rgb, el) {
			jQuery(el).val(hex);
			jQuery(el).ColorPickerHide();
		}
		
	});
    }(jQuery)

 </script>
 <script type="text/javascript">
	jQuery(document).ready( function () {
		var iconsize ='small';						 
		var iconstyle ='dark';						 
		jQuery('#dp_icon_boxes_badge').change(function(){
			if ( jQuery(this).val() == '0' ) {
				  jQuery("#badgecolor_panel").slideUp("fast");
			}
			if ( jQuery(this).val() == '1' ) {
				 jQuery("#badgecolor_panel").slideDown("slow");
			}
		});
		
		jQuery('#dp_icon_boxes_style').change(function(){
			jQuery("div.activepanel").slideUp("fast");
			jQuery("div.activepanel").toggleClass("activepanel");
			
			if ( jQuery(this).val() == 'light' ) {
				if (iconsize == 'small') {
				 jQuery("#panel_icon_light32").slideDown("slow");
				 jQuery("#panel_icon_light32").toggleClass("activepanel");
				 iconstyle ='light';
			} 
			if (iconsize == 'big') {
				 jQuery("#panel_icon_light64").slideDown("slow");
				 jQuery("#panel_icon_light64").toggleClass("activepanel");
				 iconstyle ='light';
			} 
			}
			if ( jQuery(this).val() == 'dark' ) {
				if (iconsize == 'small') {
				 jQuery("#panel_icon_dark32").slideDown("slow");
				 jQuery("#panel_icon_dark32").toggleClass("activepanel");
				 iconstyle ='dark';
			} 
			if (iconsize == 'big') {
				 jQuery("#panel_icon_dark64").slideDown("slow");
				 jQuery("#panel_icon_dark64").toggleClass("activepanel");
				 iconstyle ='dark';
			} 
			}
			if ( jQuery(this).val() == 'color' ) {
				if (iconsize == 'small') {
				 jQuery("#panel_icon_color32").slideDown("slow");
				 jQuery("#panel_icon_color32").toggleClass("activepanel");
				 iconstyle ='color';
			} 
			if (iconsize == 'big') {
				 jQuery("#panel_icon_color64").slideDown("slow");
				 jQuery("#panel_icon_color64").toggleClass("activepanel");
				 iconstyle ='color';
			} 
			}
		});

		jQuery('#dp_icon_boxes_size').change(function(){
			jQuery("div.activepanel").slideUp("fast");
			jQuery("div.activepanel").toggleClass("activepanel");
			
			if ( jQuery(this).val() == 'small' ) {
				if (iconstyle == 'light') {
				 jQuery("#panel_icon_light32").slideDown("slow");
				 jQuery("#panel_icon_light32").toggleClass("activepanel");
				 iconsize ='small';
			} 
			if (iconstyle == 'dark') {
				 jQuery("#panel_icon_dark32").slideDown("slow");
				 jQuery("#panel_icon_dark32").toggleClass("activepanel");
				 iconsize ='small';
			} 
			if (iconstyle == 'color') {
				 jQuery("#panel_icon_color32").slideDown("slow");
				 jQuery("#panel_icon_color32").toggleClass("activepanel");
				 iconsize ='small';
			} 
			}
			
			if ( jQuery(this).val() == 'big' ) {
				if (iconstyle == 'light') {
				 jQuery("#panel_icon_light64").slideDown("slow");
				 jQuery("#panel_icon_light64").toggleClass("activepanel");
				 iconsize ='big';
			} 
			if (iconstyle == 'dark') {
				 jQuery("#panel_icon_dark64").slideDown("slow");
				 jQuery("#panel_icon_dark64").toggleClass("activepanel");
				 iconsize ='big';
			} 
			if (iconstyle == 'color') {
				 jQuery("#panel_icon_color64").slideDown("slow");
				 jQuery("#panel_icon_color64").toggleClass("activepanel");
				 iconsize ='big';
			} 
			}
			
			
			
		});

		
		jQuery("input[name=dp_icon_boxes_type]").change(function(){
    		if ($("input[name=dp_icon_boxes_type]:checked").val() == '1'){
				  jQuery("#panel_iconbox_content").slideUp("fast");
				}
   					else 
					{
					jQuery("#panel_iconbox_content").slideDown("slow");	
					}
				});
	});
	</script>
    <base target="_self" />
   
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo get_template_directory_uri().'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper" style="height:500px;">
			
			           
      <fieldset>
		<legend>Icon Box Type</legend> <table>
          <tr>
            <td colspan="2" style="text-align: center"><img src="images/icon_single.png" width="50" height="30"></td>
            <td width="20"></td>
            <td colspan="2" style="text-align: center"><img src="images/icon_left1.png" width="50" height="30"></td>
            <td width="20" style="text-align: center"></td>                
            <td colspan="2" style="text-align: center"><img src="images/icon_left2.png" width="50" height="30"></td>
            <td width="20" style="text-align: center"></td>
            <td colspan="2" style="text-align: center"><img src="images/icon_left3.png" width="50" height="30"></td>
          </tr>
          <tr>
            <td width="70"><label style="font-size:12px;">Single Icon</label></td><td><input name="dp_icon_boxes_type" type="radio" id="box_type_1" value="1" checked></td>
            <td width="20"></td>
            <td width="90"><label style="font-size:12px;">IconBox Left 1</label></td><td><input type="radio" name="dp_icon_boxes_type" value="2" id="box_type_2"></td>
            <td width="20"></td>                
            <td width="90"><label style="font-size:12px;">IconBox Left 2</label></td><td><input type="radio" name="dp_icon_boxes_type" value="3" id="box_type_3"></td>
            <td width="20"></td>
            <td width="90"><label style="font-size:12px;">IconBox Left 3</label></td><td><input type="radio" name="dp_icon_boxes_type" value="4" id="box_type_4"> </td>
          </tr>
          </table>
      </fieldset><br/>
				<table border="0" cellpadding="4" cellspacing="0">
				 
				 <tr>
					<td nowrap="nowrap" width="260"><label for="dp_icon_boxes_size" style="font-size:12px;">Select icon size:</label></td>
					<td> 
                    
                    <select name="dp_icon_boxes_size" id="dp_icon_boxes_size" style="width:120px;">
                    		<option value="small">Small Icon (32px)</option>
                            <option value="big">Big Icon (64px)</option>
                    </select>
					
					</td>
				  </tr>
                  
				 <tr>
					<td nowrap="nowrap"><label for="dp_icon_boxes_style" style="font-size:12px;">Select icon style:</label></td>
					<td> 
                    
                    <select name="dp_icon_boxes_style" id="dp_icon_boxes_style"  style="width:120px;">
                    		<option value="light">Light</option>
                            <option value="gray">Gray</option>
                            <option value="dark" selected>Dark</option>
                            <option value="color">Full Color</option>
                    </select>
					
					</td>
				  </tr>

				 <tr>
					<td nowrap="nowrap"><label for="dp_icon_boxes_badge" style="font-size:12px;">Round Badge in the Icon Background:</label></td>
					<td> 
                    
                    <select name="dp_icon_boxes_badge" id="dp_icon_boxes_badge" style="width:120px;">
                    		<option value="0">No</option>
                            <option value="1">Yes</option>
                    </select>
					
					</td>
				  </tr>
                </table>
                <div id="badgecolor_panel" style="display:none">
				<table border="0" cellpadding="4" cellspacing="0">
                  <tr>
					<td nowrap="nowrap" width="260"><label for="dp_icon_boxes_badgecolor" style="font-size:12px;">Select Badge Background Color:</label></td>
					                
    				<td width="90"><input type="text" maxlength="10" size="10" id="badge_bg"  value="#D95B33" /></td>
    				<td width="60"><div class="colorSelector1" id="badge_bg_picker"><div style="background-color: #D95B33"></div></div></td>
				  </tr>
					</td>
				  </tr>
                  </table>
</div>
                  <div>&nbsp;</div>
                  <div id="panel_icon_light32" style="display:none" class="">
				<table border="0" cellpadding="4" cellspacing="0">
                   <tr>
					<td nowrap="nowrap" width="260"><label style="font-size:12px;">Select icon:</label></td>
					<td> 
                    <select name="dp_icon_light32" id="dp_icon_light32">
					
					<?php
					$dirPath = dir( get_template_directory().'/images/icons/icon_boxes/light/small');
					while (($file = $dirPath->read()) !== false)
					{if (trim($file)!='.' && trim($file)!='..')	echo "<option value=\"" .  current(explode(".", $file)) . "\">" . current(explode(".", $file)). "</option>\n";
					}
					$dirPath->close();
					?>
					</select>
					</td>
				  </tr>
                  </table>
                  </div>
                  <div id="panel_icon_light64"  style="display:none" class="">
				<table border="0" cellpadding="4" cellspacing="0">
                  <tr>
					<td nowrap="nowrap" width="260"><label style="font-size:12px;">Select icon:</label></td>
					<td> 
                    <select name="dp_icon_light64" id="dp_icon_light64">
					
					<?php
					$dirPath = dir( get_template_directory().'/images/icons/icon_boxes/light/small');
					while (($file = $dirPath->read()) !== false)
					{if (trim($file)!='.' && trim($file)!='..')	echo "<option value=\"" .  current(explode(".", $file)) . "\">" . current(explode(".", $file)). "</option>\n";
					}
					$dirPath->close();
					?>
					</select>
					</td>
				  </tr>
				</table>
                 </div>
                 
                  <div id="panel_icon_dark32" class="activepanel">
				<table border="0" cellpadding="4" cellspacing="0">
                   <tr>
					<td nowrap="nowrap" width="260"><label style="font-size:12px;">Select icon:</label></td>
					<td> 
                    <select name="dp_icon_dark32" id="dp_icon_dark32">
					
					<?php
					$dirPath = dir( get_template_directory().'/images/icons/icon_boxes/dark/small');
					while (($file = $dirPath->read()) !== false)
					{if (trim($file)!='.' && trim($file)!='..')	echo "<option value=\"" .  current(explode(".", $file)) . "\">" . current(explode(".", $file)). "</option>\n";
					}
					$dirPath->close();
					?>
					</select>
					</td>
				  </tr>
                  </table>
                  </div>
                  <div id="panel_icon_dark64"  style="display:none" class="">
				<table border="0" cellpadding="4" cellspacing="0">
                  <tr>
					<td nowrap="nowrap" width="260"><label style="font-size:12px;">Select icon:</label></td>
					<td> 
                    <select name="dp_icon_dark64" id="dp_icon_dark64">
					
					<?php
					$dirPath = dir( get_template_directory().'/images/icons/icon_boxes/dark/small');
					while (($file = $dirPath->read()) !== false)
					{if (trim($file)!='.' && trim($file)!='..')	echo "<option value=\"" .  current(explode(".", $file)) . "\">" . current(explode(".", $file)). "</option>\n";
					}
					$dirPath->close();
					?>
					</select>
					</td>
				  </tr>
				</table>
                 </div>
                  <div id="panel_icon_color32" style="display:none" class="">
				<table border="0" cellpadding="4" cellspacing="0">
                   <tr>
					<td nowrap="nowrap" width="260"><label style="font-size:12px;">Select icon:</label></td>
					<td> 
                    <select name="dp_icon_color32" id="dp_icon_color32">
					
					<?php
					$dirPath = dir( get_template_directory().'/images/icons/icon_boxes/color/small');
					while (($file = $dirPath->read()) !== false)
					{if (trim($file)!='.' && trim($file)!='..')	echo "<option value=\"" .  current(explode(".", $file)) . "\">" . current(explode(".", $file)). "</option>\n";
					}
					$dirPath->close();
					?>
					</select>
					</td>
				  </tr>
                  </table>
                  </div>
                  <div id="panel_icon_color64"  style="display:none" class="">
				<table border="0" cellpadding="4" cellspacing="0">
                  <tr>
					<td nowrap="nowrap" width="260"><label style="font-size:12px;">Select icon:</label></td>
					<td> 
                    <select name="dp_icon_color64" id="dp_icon_color64">
					
					<?php
					$dirPath = dir( get_template_directory().'/images/icons/icon_boxes/color/small');
					while (($file = $dirPath->read()) !== false)
					{if (trim($file)!='.' && trim($file)!='..')	echo "<option value=\"" .  current(explode(".", $file)) . "\">" . current(explode(".", $file)). "</option>\n";
					}
					$dirPath->close();
					?>
					</select>
					</td>
				  </tr>
				</table>
                 </div>
                 <div id="panel_iconbox_content" style="display:none">
                <table border="0" cellpadding="4" cellspacing="0">
                 <tr>
                   <td nowrap="nowrap">&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   	<td width="260" nowrap="nowrap"><label style="font-size:12px;">Box Title:</label></td>
                    <td><input id="dp_icon_boxes_title" type="text" value="Here goes box title" name="dp_icon_boxes_title"></td>
                  	</tr>
                   <tr>
                    <td width="260" nowrap="nowrap"><label style="font-size:12px;">Box Text:</label></td>
                    <td><textarea name="dp_icon_boxes_text" id="dp_icon_boxes_text" cols="24" rows="3">Icon Box text goes here.</textarea></td>
                    </tr>
                </table>
                </div>  
<p class="usage">Select all shortcode options and click the "Insert" button to add it to your page.</p>
			
				<script>
  				addColorPicker('#badge_bg', '#badge_bg_picker', 'fefefe');
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