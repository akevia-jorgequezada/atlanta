<?php
// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');
// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", DPTPLNAME));
global $tpl; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo 'Images&Frames Shortcodes Panel'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/images_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/dp_selectBox.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/fileuploader/fileuploader.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.iphone-switch.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.iCheckbox.js"></script>
    <script type="text/javascript">
	$(document).ready( function () {
		$('#dp_lightbox').iCheckbox();
		$('#dp_lightbox').change(function(e){
			if ( $('#dp_lightbox').attr('checked') == true ) {
				 $("#lightbox_settings").slideDown("slow");
			}
			if ( $('#dp_lightbox').attr('checked') == false ) {
				 $("#lightbox_settings").slideUp("slow");
			}
		});
	});
	</script>
    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/fileuploader/fileuploader.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $tpl->name; ?>" action="#">
	
    <div class="panel_wrapper" style="height:390px">
					           
           <div class="uploader"><label class="upload_label" style="width:120px;padding-left:3px;">Image URL: </label><input id="img_url" type="text"  value="" name="img_url" class="file_url"><div id="upload_btn"><noscript>			
			<p>Please enable JavaScript to use file uploader.</p>
		</noscript>		
	</div></div>
				<table border="0" cellpadding="4" cellspacing="0">
                
                <tr>
                      <td width="120" nowrap="nowrap"><label style="font-size:12px;">Image link URL:</label></td>
                      <td><input id="dp_img_link" type="text"  value="" name="dp_img_link" style="width:300px"></td>
                  </tr>
                  <tr>
                  <td nowrap="nowrap"><label style="font-size:12px;">Open in lightbox:</label></td>
                  <td><input type="checkbox" id="dp_lightbox" /></td>
                </tr>
                  </table>
                  <div>
        <div id ="lightbox_settings" style="">
        <table border="0" cellpadding="4" cellspacing="0">
                    <tr>
                    <td width="120" nowrap="nowrap"><label style="font-size:12px;">Title:</label></td>
                    <td><input id="dp_img_title" type="text"  value="" name="dp_img_title" style="width:300px"></td>
                    </tr>
                    <tr>
                   	<td width="120" nowrap="nowrap"><label style="font-size:12px;">Description:</label></td>
                    <td><input id="dp_img_desc" type="text"  value="" name="dp_img_desc" style="width:300px"></td></td>
                  	</tr>
                    <tr>
                   	<td width="120" nowrap="nowrap"><label style="font-size:12px;">Popup width (px):</label></td>
                    <td><input id="dp_img_popupw" type="text"  value="" name="dp_img_popupw" style="width:80px"></td></td>
                  	</tr>
                    <tr>
                   	<td width="120" nowrap="nowrap"><label style="font-size:12px;">Popup hight (px):</label></td>
                    <td><input id="dp_img_popuph" type="text"  value="" name="dp_img_popuph" style="width:80px"></td></td>
                  	</tr>
        </table>
        </div>
		
	</div>
                  <table border="0" cellpadding="4" cellspacing="0">
                     <tr>
					<td width="120" nowrap="nowrap"><label style="font-size:12px;">Allignment:</label></td>
					<td><select name="dp-images-align" id="dp-images-align" style=" width:100px;" >
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                            <option value="center">Center</option>
                    </select></td>
				  </tr>
                  <tr>
					<td width="120" nowrap="nowrap"><label style="font-size:12px;">Hover effect:</label></td>
					<td><select name="dp-images-efect" id="dp-images-efect" style=" width:100px;" >
                            <option value="none">none</option>
                            <option value="plus">Zoom Icon</option>
                            <option value="play">Play Icon</option>
                            <option value="link">Link Icon</option>
                    </select></td>
				  </tr>
</table>
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
