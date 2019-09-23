<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Testimonials Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/testimonials_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>

    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>

    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper" style="height:335px;">
					           
           
				<table border="0" cellpadding="4" cellspacing="4">
                    <tr>
					<td nowrap="nowrap"><label style="font-size:12px;">Author:</label></td>
					<td> 
                    <input name="dp-testimonialsauthor" id="dp-testimonials-author" type="text" value="John Doe" style=" width:282px">
					</td>
				  </tr>
                  <tr>
					<td nowrap="nowrap"><label style="font-size:12px;">Content:</label></td>
					<td> 
                   <textarea name="dp-testimonials-content" id="dp-testimonials-content" cols="27" rows="5">Testimonials content goes here.</textarea>
					</td>
				  </tr>
				 <tr>
					<td nowrap="nowrap"><label style="font-size:12px;">Select Style:</label></td>
					<td> 
                   <select name="dp-testimonials-shortcode" id="dp-testimonials-shortcode" style=" width:240px;" >
                            <option value="1">Style 1 (border gray)</option>
                            <option value="2">Style 2 (backround gray)</option>
                            <option value="3">Style 3 (border black)</option>
                            <option value="4">Style 4 (backround black)</option>
                    </select>
					</td>
				  </tr>
                  <tr>
					<td nowrap="nowrap"><label style="font-size:12px;">Corners:</label></td>
					<td> 
                   <select name="dp-testimonials-corners" id="dp-testimonials-corners" style=" width:240px;" >
                            <option value="1">Square</option>
                            <option value="2">Rounded</option>
                    </select>
					</td>
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
