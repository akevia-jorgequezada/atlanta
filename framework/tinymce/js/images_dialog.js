function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function insertShortcode() {
	
	var shortcodeText;
	var imgurl = document.getElementById('img_url').value;
	var imglink = document.getElementById('dp_img_link').value;
	var lightbox = document.getElementById('dp_lightbox').checked;
	var title = document.getElementById('dp_img_title').value;
	var desc = document.getElementById('dp_img_desc').value;
	var popupw = document.getElementById('dp_img_popupw').value;
	var popuph = document.getElementById('dp_img_popuph').value;
	var align = document.getElementById('dp-images-align').value;
	var effect = document.getElementById('dp-images-efect').value;
	
	  
		shortcodeText = '[frame_'+align+' link="'+imglink+'" lightbox="'+lightbox+'" popupw="'+popupw+'" popuph="'+popuph+'" icon="'+effect+'" title="'+title+'" desc="'+desc+'"]'+imgurl+'[/frame_'+align+']'+" ";	
		
	
		
		if ( imgurl == 0 ){
			tinyMCEPopup.close();
		}	
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
