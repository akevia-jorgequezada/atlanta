<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'YooTube Video Shortcode Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/video_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>

    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>

   
   <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
    <input name="dp_video_type" id="dp_video_type" type="hidden" value="youtube">
    <div class="panel_wrapper" style="height:200px">
    <table border="0" cellpadding="4" cellspacing="0">
                <tr>
                      <td width="100" nowrap="nowrap"><label style="font-size:12px;">Video ID:</label></td>
                      <td><input id="dp_video_id" type="text"  value="" name="dp_video_id" style="width:200px"></td>
                  </tr>
    
     <tr>
                   	<td width="100" nowrap="nowrap"><label style="font-size:12px;">Map width (px):</label></td>
                    <td><input id="dp_video_width" type="text"  value="" name="dp_video_width" style="width:100px"></td></td>
                  	</tr>
                    <tr>
                   	<td width="100" nowrap="nowrap"><label style="font-size:12px;">Map hight (px):</label></td>
                    <td><input id="dp_video_height" type="text"  value="" name="dp_video_height" style="width:100px"></td></td>
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
