<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Info Boxes Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/boxes_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>

    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>

    <base target="_self" />
   
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css"><link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper" style="height:270px;">
				<table border="0" cellpadding="4" cellspacing="0">
				 <tr>
					<td nowrap="nowrap"><label for="boxes_shortcode" style="font-size:12px;">Select One:</label></td>
					<td> 
                    
                    <select name="dp-boxes-shortcode" id="dp-boxes-shortcode" style="width:260px;">
                    		<option value="alert_box">Alert Box</option>
                            <option value="attention_box">Attention Box</option>
                            <option value="approved_box">Approved Box</option> 
                            <option value="doc_box">Doc Box</option>
                            <option value="download_box">Download Box</option>
                            <option value="help_box">Help Box</option>
                            <option value="idea_box">Idea Box</option> 
                            <option value="info_box">Info Box</option>
                            <option value="note_box">Note Box</option>
                            <option value="media_box">Media Box</option>
                    </select>
					
					</td>
				  </tr>
				
				</table>
				<p class="usage">Select a shortcode and click the "Insert" button to add it to your page.</p>
			
			
			
		
		
		
		
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