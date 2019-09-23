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
	
	
	
	
	
	
	
	var shortcodeId = document.getElementById('dp-boxes-shortcode').value;
	    
		if (shortcodeId != 0 && shortcodeId == 'alert_box' ){
		shortcodeText = "[box class='alert']This is a sample of the 'alert' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'attention_box' ){
		shortcodeText = "[box class='attention']This is a sample of the 'attention' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'approved_box' ){
		shortcodeText = "[box class='approved']This is a sample of the 'approved' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'help_box' ){
		shortcodeText = "[box class='help']This is a sample of the 'help' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'note_box' ){
		shortcodeText = "[box class='note']This is a sample of the 'note' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'time_box' ){
		shortcodeText = "[box class='time']This is a sample of the 'time' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'doc_box' ){
		shortcodeText = "[box class='doc']This is a sample of the 'doc' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'idea_box' ){
		shortcodeText = "[box class='idea']This is a sample of the 'idea' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'info_box' ){
		shortcodeText = "[box class='info']This is a sample of the 'info' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'download_box' ){
		shortcodeText = "[box class='download']This is a sample of the 'download' style.[/box]"+" ";	
		}
		if (shortcodeId != 0 && shortcodeId == 'media_box' ){
		shortcodeText = "[box class='media']This is a sample of the 'media' style.[/box]"+" ";	
		}
		
		if ( shortcodeId == 0 ){
			tinyMCEPopup.close();
		}	
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
