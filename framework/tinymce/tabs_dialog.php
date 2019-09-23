<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Tabs, Toggle and Accorion Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/tabs_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>

    <script type="text/javascript">
	jQuery(document).ready( function () {
		jQuery('#dp-tabs-count').change(function(){
		var a='';
		var i= 0;
		for (i=2;i<=6;i++) {
		a =	'#tabtile_'+ i;							
		jQuery(a).hide();}
		for (i=2;i<=(jQuery(this).val());i++) {
		a =	'#tabtile_'+ i;							
		jQuery(a).slideDown("fast");}
		});
	});
	</script>
    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper" style=" height:325px;">
					           
           
				<table border="0" cellpadding="4" cellspacing="4">
                <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Widget type:</label></td>
					<td> 
                   <select name="dp-tabs-type" id="dp-tabs-type" style=" width:180px;" >
                            <option value="tabs">Tabs</option>
                            <option value="toggle">Toggle</option>
                            <option value="accordion">Accordion</option>
                    </select>
					</td>
				  </tr>
                <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Tabs number:</label></td>
					<td> 
                   <select name="dp-tabs-count" id="dp-tabs-count" style=" width:180px;" >
                            <option value="0">Choose a number of tabs</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>

                    </select>
					</td>
				  </tr>
                  </table>
                  <div id="tabtile_2" style=" display:none">
                  <table border="0" cellpadding="4" cellspacing="4">
                  
                    <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Tab title #1:</label></td>
					<td> 
                    <input name="dp_tabtitle_1" id="dp_tabtitle_1" type="text" value="" style=" width:282px">
					</td>
				  </tr>
                 <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Tab title #2:</label></td>
					<td> 
                    <input name="dp_tabtitle_2" id="dp_tabtitle_2" type="text" value="" style=" width:282px">
					</td>
				  </tr>
                  </table>
                  </div>
                  <div id="tabtile_3" style=" display:none">
                  <table border="0" cellpadding="4" cellspacing="4">
                   <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Tab title #3:</label></td>
					<td> 
                    <input name="dp_tabtitle_3" id="dp_tabtitle_3" type="text" value="" style=" width:282px">
					</td>
				  </tr>
                  </table>
                  </div>
                  <div id="tabtile_4" style=" display:none">
                  <table border="0" cellpadding="4" cellspacing="4">
                   <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Tab title #4:</label></td>
					<td> 
                    <input name="dp_tabtitle_4" id="dp_tabtitle_4" type="text" value="" style=" width:282px">
					</td>
				  </tr>
                  </table> 
                  </div>
                  <div id="tabtile_5" style=" display:none">
                  <table border="0" cellpadding="4" cellspacing="4">
                   <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Tab title #5:</label></td>
					<td> 
                    <input name="dp_tabtitle_5" id="dp_tabtitle_5" type="text" value="" style=" width:282px">
					</td>
				  </tr>
                  </table>
                  </div>
                  <div id="tabtile_6" style=" display:none">
                  <table border="0" cellpadding="4" cellspacing="4">
                   <tr>
					<td nowrap="nowrap" width="90"><label style="font-size:12px;">Tab title #6:</label></td>
					<td> 
                    <input name="dp_tabtitle_6" id="dp_tabtitle_6" type="text" value="" style=" width:282px">
					</td>
				  </tr>
                  </table>
                  </div>
				
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
