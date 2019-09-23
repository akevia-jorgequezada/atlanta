<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Google Map Shortcode Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/map_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>

    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>

   <script type="text/javascript">
	jQuery(document).ready( function () {
								 
		jQuery('#dp-map-geocoding').change(function(){
			if ( jQuery(this).val() == 'coor' ) {
				  jQuery("#address_panel").slideUp("fast");
				  jQuery("#coor_panel").slideDown("slow");
			}
			if ( jQuery(this).val() == 'address' ) {
				 jQuery("#coor_panel").slideUp("fast");
				 jQuery("#address_panel").slideDown("slow");
			}
		});
		jQuery('#dp-map-info').change(function(){
			if ( jQuery(this).val() == '0' ) {
				  jQuery("#info_panel").slideUp("fast");
			}
			if ( jQuery(this).val() == '1' ) {
				 jQuery("#info_panel").slideDown("slow");
			}
		});
	});
	</script>
   <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper" style="height:495px">
					           
    <table border="0" cellpadding="4" cellspacing="0">
    <tr>
					<td width="200" nowrap="nowrap"><label style="font-size:12px;">Way to determine the location :</label></td>
					<td><select name="dp-map-geocoding" id="dp-map-geocoding" style=" width:80px;" >
                            <option value="coor">Coordinates</option>
                            <option value="address">Address</option>
                    </select></td>
				  </tr>
                  </table>
                  <div id="coor_panel">
    <table border="0" cellpadding="4" cellspacing="0">
                <tr>
                      <td width="200" nowrap="nowrap"><label style="font-size:12px;">Latitude:</label></td>
                      <td><input id="dp_map_lat" type="text"  value="" name="dp_map_lat" style="width:121px"></td>
                      </tr>
                      <tr>
                       <td width="200" nowrap="nowrap"><label style="font-size:12px;">Longitude:</label></td>
                      <td><input id="dp_map_long" type="text"  value="" name="dp_map_long" style="width:121px"></td>
                  </tr>
    </table>
    </div>
     <div id="address_panel" style=" display:none;">
    <table border="0" cellpadding="4" cellspacing="0">
                <tr>
                      <td width="200" nowrap="nowrap"><label style="font-size:12px;">Address:</label></td>
                      <td><input id="dp_map_address" type="text"  value="" name="dp_map_address" style="width:300px"></td>
                  </tr>
    </table>
    </div>
                  <table border="0" cellpadding="4" cellspacing="0">
     <tr>
                   	<td width="200" nowrap="nowrap"><label style="font-size:12px;">Map width (px):</label></td>
                    <td><input id="dp_map_width" type="text"  value="" name="dp_map_width" style="width:121px"></td></td>
                  	</tr>
                    <tr>
                   	<td width="200" nowrap="nowrap"><label style="font-size:12px;">Map hight (px):</label></td>
                    <td><input id="dp_map_height" type="text"  value="" name="dp_map_height" style="width:121px"></td></td>
                  	</tr>
                     <tr>
                   	<td width="200" nowrap="nowrap"><label style="font-size:12px;">Map zoom level:</label></td>
                    <td><input id="dp_map_zoom" type="text"  value="" name="dp_map_zoom" style="width:121px"></td></td>
                  	</tr>
                     <tr>
					<td width="200" nowrap="nowrap"><label style="font-size:12px;">Pop Info wimdow :</label></td>
					<td><select name="dp-map-info" id="dp-map-info" style=" width:80px;" >
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                    </select></td>
				  </tr>
                  </table>
                  <div id="info_panel" style="display:none">
                  <table border="0" cellpadding="4" cellspacing="0">
                    <tr>
                    <td width="200" nowrap="nowrap"><label style="font-size:12px;">Info Window Text:</label></td>
                    <td><textarea name="dp_map_infotext" id="dp_map_infotext" cols="29" rows="3">Info windows HTML goes here.</textarea></td>
                    </tr>
                    </table>
                    </div>
                    <table border="0" cellpadding="4" cellspacing="0">
                    <tr>
                   	<td width="200" nowrap="nowrap"><label style="font-size:12px;">Map ID:</label></td>
                    <td><input id="dp_map_id" type="text"  value="" name="dp_map_id" style="width:121px"></td></td>
                  	</tr>
                    <tr>
                   	<td width="200" nowrap="nowrap"><label style="font-size:12px;">Map type control:</label></td>
                    <td><select name="dp-map-control" id="dp-map-control" style=" width:80px;" >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                    </select></td></td>
                  	</tr>
                    <tr>
                   	<td width="200" nowrap="nowrap"><label style="font-size:12px;">Street view control:</label></td>
                    <td><select name="dp-map-street" id="dp-map-street" style=" width:80px;" >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                    </select></td></td>
                  	</tr><tr>
                   	<td width="200" nowrap="nowrap"><label style="font-size:12px;">Map zoom control:</label></td>
                    <td><select name="dp-map-zoomcontrol" id="dp-map-zoomcontrol" style=" width:80px;" >
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                    </select></td></td>
                  	</tr>
                
    </table>
				<p class="usage">Enter your details, select a style and click the "Insert" button to add it to your page.</p>
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
