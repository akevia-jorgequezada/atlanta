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
	var popupw = document.getElementById('dp_img_popupw').value;
	var popuph = document.getElementById('dp_img_popuph').value;
	var title = document.getElementById('dp_img_title').value;
	var desc = document.getElementById('dp_img_desc').value;
	var group = document.getElementById('dp_img_group').value;
	var linktype = document.getElementById('dp-lightbox-linktype').value;
	var linktext = document.getElementById('dp_text_link').value;
	var thumburl = document.getElementById('thumb_url').value;
	var thumbhover = document.getElementById('dp_thumb_efect').value;
	
	 if (linktype == 'thumb') shortcodeText = '[lightbox="'+title+' :: '+desc+'" popupw="'+popupw+'" popuph="'+popuph+'" class="'+thumbhover+'" thumb="'+thumburl+'"]'+imgurl+'[/lightbox]'+" ";	
		
	 if (linktype == 'text') shortcodeText = '[lightbox title="'+title+' :: '+'" popupw="'+popupw+'" popuph="'+popuph+'" text="'+linktext+'"]'+imgurl+'[/lightbox]'+" ";
		
		if ( imgurl == 0 ){
			tinyMCEPopup.close();
		}	
		
	if (linktype == 'thumb' && thumburl == 0 ) { alert("Not selected thumbnails!"); exit;}
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
