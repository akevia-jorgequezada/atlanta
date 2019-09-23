<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Lists Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/lists_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>

    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper" style="height:270px;">
					           
           <fieldset>
				<legend>List Type</legend> <table>
              <tr>
                <td><label style="font-size:12px;">Unordered Bullet List </label></td><td><input name="list_type" type="radio" id="list_type_0" value="1" checked></td>
                <td width="15"></td>
                <td><label style="font-size:12px;">Ordered List </label></td><td><input type="radio" name="list_type" value="2" id="list_type_1"></td>
                <td width="15"></td>                
                <td><label style="font-size:12px;">Disc Number</label></td><td><input type="radio" name="list_type" value="3" id="list_type_2"></td>
                <td width="15"></td>
                <td><label style="font-size:12px;">Big number</label></td><td><input type="radio" name="list_type" value="4" id="list_type_3"> </td>
              </tr>
            </table>
      </fieldset><br/>
<table border="0" cellpadding="4" cellspacing="0">
<tr>
					<td nowrap="nowrap"><label for="typography_shortcode" style="font-size:12px;">Select List Style: </label></td>
					<td> 
                   <select name="dp-lists-shortcode" id="dp-lists-shortcode" style=" width:220px;" >
                            <optgroup label="Unordered Icon Bullets Lists">
                            <option value="bullet-add">Bullet Plus</option>
                            <option value="bullet-arrow">Bullet Arrow</option>
                            <option value="bullet-arrow2">Bullet Arrow2</option>
                            <option value="bullet-monitor">Bullet Monitor</option>
                            <option value="bullet-calendar">Bullet Calendar</option>
                            <option value="bullet-check">Bullet Check</option>
                            <option value="bullet-crank">Bullet Crank</option>
                            <option value="bullet-delete">Header Delete</option>
                            <option value="bullet-docs">Bullet Docs</option>
                            <option value="bullet-email">Bullet Email</option>
                            <option value="bullet-home">Bullet Home</option>
                            <option value="bullet-lock">Header Lock</option>
                            <option value="bullet-key">Bullet Key</option>
                            <option value="bullet-minus">Bullet Minus</option>
                            <option value="bullet-briefcase">Bullet Briefcase</option>
                            <option value="bullet-post">Bullet Posts</option>
                            <option value="bullet-notes">Bullet Notes</option>
                            <option value="bullet-rss">Bullet RSS</option>
                            <option value="bullet-printer">Bullet Printer</option>
                            <option value="bullet-warning">Bullet Warning</option>
                            <option value="bullet-unlock">Bullet Unlock</option>
                            <option value="bullet-write">Bullet Write</option>
                            <option value="bullet-1">Bullet 1</option>
                            <option value="bullet-2">Bullet 2</option>
                            <option value="bullet-3">Bullet 3</option>
	   </optgroup>
                            <optgroup label="Ordered Lists">
                            <option value="roman">Roman</option>
                            <option value="alpha">Alpha</option>
                            <option value="dec">Decimal</option>
                            <option value="decleadingzero">Decimal with leading zero</option>
                            </optgroup>
                    </select>
					</td>
				  </tr>
				</table>
				<p class="usage">Select list type, list style and click the "Insert" button to add it to your page.</p>
	</div>
<script type="text/javascript">
			
			jQuery(document).ready( function() {
											
				jQuery("input[name=list_type]").change(function(){
    				if (jQuery("input[name=list_type]:checked").val() == '1')
    				{jQuery("SELECT").selectBox('options', {
							'bullet-add' : 'Bullet Plus',
                            'bullet-arrow' : 'Bullet Arrow',
                            'bullet-arrow2' : 'Bullet Arrow2',
                            'bullet-monitor' : 'Bullet Monitor',
                            'bullet-calendar' : 'Bullet Calendar',
                            'bullet-check' : 'Bullet Check',
                            'bullet-crank' : 'Bullet Crank',
                            'bullet-delete' : 'Header Delete',
                            'bullet-docs' : 'Bullet Docs',
                            'bullet-email' : 'Bullet Email',
                            'bullet-home' : 'Bullet Home',
                            'bullet-lock' : 'Header Lock',
                            'bullet-key' : 'Bullet Key',
                            'bullet-minus' : 'Bullet Minus',
                            'bullet-briefcase' : 'Bullet Briefcase',
                            'bullet-post' : 'Bullet Posts',
                            'bullet-notes' : 'Bullet Notes',
                            'bullet-rss' : 'Bullet RSS',
                            'bullet-printer' : 'Bullet Printer',
                            'bullet-warning' : 'Bullet Warning',
                            'bullet-unlock' : 'Bullet Unlock',
                            'bullet-write' : 'Bullet Write',
                            'bullet-1' : 'Bullet 1',
                            'bullet-2' : 'Bullet 2',
                            'bullet-3' : 'Bullet 3'	
						
					});}
   					else if (jQuery("input[name=list_type]:checked").val() == '2')
       {jQuery("SELECT").selectBox('options', {
							'roman': 'Roman',
							'alpha': 'Alpha',
							'dec': 'Decimal',
							'decleadingzero': 'Decimal with leading zero'						
					});}
		   			else if (jQuery("input[name=list_type]:checked").val() == '3')
        {jQuery("SELECT").selectBox('options', {
						
						    'number1': 'Black',
							'number2': 'Gray',
							'number3': 'White (for dark backgrounds)'
					});}

    				else
        {jQuery("SELECT").selectBox('options', {
							'1': 'Star 1',
							'2': 'Star 2',
							'3': 'Disk 1',
							'4': 'Disk 2'						
					});}
				});
										});
				
				
				
			
		</script>
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
