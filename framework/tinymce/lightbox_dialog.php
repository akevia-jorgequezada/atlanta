<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Lightbox Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/lightbox_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/fileuploader/fileuploader.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/colorpicker/colorpicker.js"></script>
   	<script type="text/javascript">
	jQuery(document).ready( function () {
								 
		jQuery('#dp-lightbox-linktype').change(function(){
			if ( jQuery(this).val() == 'thumb' ) {
				  jQuery("#textlink_panel").slideUp("fast");
				  jQuery("#thumblink_panel").slideDown("slow");
				  jQuery("#hoover_panel").slideDown("slow");
			}
			if ( jQuery(this).val() == 'text' ) {
				 jQuery("#thumblink_panel").slideUp("fast");
				 jQuery("#hoover_panel").slideUp("fast");
				 jQuery("#textlink_panel").slideDown("slow");
				 
				 
			}
		});
	});
	</script>
   <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css"><link href="dialog_style.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/fileuploader/fileuploader.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper" style="height:380px">
					           
           <div class="uploader"><label class="upload_label" style="width:170px;padding-left:3px;">Poup window content URL: </label><input id="img_url" type="text"  value="" name="img_url" class="file_url"><div id="upload_btn"><noscript>			
			<p>Please enable JavaScript to use file uploader.</p>
		</noscript>		
	</div></div>
    <table border="0" cellpadding="4" cellspacing="0">
     <tr>
                   	<td width="170" nowrap="nowrap"><label style="font-size:12px;">Popup width (px):</label></td>
                    <td><input id="dp_img_popupw" type="text"  value="" name="dp_img_popupw" style="width:80px"></td></td>
                  	</tr>
                    <tr>
                   	<td width="170" nowrap="nowrap"><label style="font-size:12px;">Popup hight (px):</label></td>
                    <td><input id="dp_img_popuph" type="text"  value="" name="dp_img_popuph" style="width:80px"></td></td>
                  	</tr>
                    <tr>
                    <td width="170" nowrap="nowrap"><label style="font-size:12px;">Popup Title:</label></td>
                    <td><input id="dp_img_title" type="text"  value="" name="dp_img_title" style="width:300px"></td>
                    </tr>
                    <tr>
                   	<td width="170" nowrap="nowrap"><label style="font-size:12px;">Popup Description:</label></td>
                    <td><input id="dp_img_desc" type="text"  value="" name="dp_img_desc" style="width:300px"></td></td>
                  	</tr>
                    <tr>
                   	<td width="170" nowrap="nowrap"><label style="font-size:12px;">Group <i>(optional)</i>:</label></td>
                    <td><input id="dp_img_group" type="text"  value="" name="dp_img_group" style="width:300px"></td></td>
                  	</tr>
                <tr>
					<td width="170" nowrap="nowrap"><label style="font-size:12px;">Link type:</label></td>
					<td><select name="dp-lightbox-linktype" id="dp-lightbox-linktype" style=" width:100px;" >
                            <option value="thumb">Thumbnail</option>
                            <option value="text">Text</option>
                    </select></td>
				  </tr>
    </table>
    <div id="textlink_panel" style="display:none">
    <table border="0" cellpadding="4" cellspacing="0">
                <tr>
                      <td width="170" nowrap="nowrap"><label style="font-size:12px;">Link text:</label></td>
                      <td><input id="dp_text_link" type="text"  value="" name="dp_text_link" style="width:300px"></td>
                  </tr>
    </table>
    </div>
    <div id="thumblink_panel" >
    <div class="uploader"><label class="upload_label" style="width:170px;padding-left:3px;">Thumbnail URL: </label><input id="thumb_url" type="text"  value="" name="thumb_url" class="file_url"><div id="upload_btn1"><noscript>			
			<p>Please enable JavaScript to use file uploader.</p>
		</noscript>		
	</div></div>
   
    </div>
				
                    <div id="hoover_panel">
                    <table border="0" cellpadding="4" cellspacing="0">
                     <tr>
					<td width="170" nowrap="nowrap"><label style="font-size:12px;">Hover effect:</label></td>
					<td><select name="dp_thumb_efect" id="dp_thumb_efect" style=" width:100px;" >
                            <option value="">none</option>
                            <option value="imgeffect">Highlite</option>
                            <option value="imgeffect plus">Zoom Icon</option>
                            <option value="imgeffect play">Play Icon</option>
                            <option value="imgeffect link">Link Icon</option>
                    </select></td>
				  </tr>
                  
                  
</table></div>
				<p class="usage">Enter your details, select a style and click the "Insert" button to add it to your page.</p>
	</div>
 <script>        
        function createUploader(){
			var uploader = new qq.FileUploader({
                element: document.getElementById('upload_btn'),
                action: '<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/fileuploader/upload_handler.php',
                debug: true,
				allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
				onComplete: function(id, fileName, responseJSON){
	    	    document.getElementById('img_url').value=responseJSON.url;
	    	   },
            });                      
			var uploader = new qq.FileUploader({
                element: document.getElementById('upload_btn1'),
                action: '<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/fileuploader/upload_handler.php',
                debug: true,
				allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
				onComplete: function(id, fileName, responseJSON){
	    	    document.getElementById('thumb_url').value=responseJSON.url;
	    	   },
            });   
        }
		  window.onload = createUploader;     
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
