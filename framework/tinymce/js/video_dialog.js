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
	var type = document.getElementById('dp_video_type').value;
	var id = document.getElementById('dp_video_id').value;
	var width = document.getElementById('dp_video_width').value;
	var height = document.getElementById('dp_video_height').value;
	if (width == 0 ) width = 640;
	if (height == 0 ) height = 385;
	if (type == 'youtube') {
		 shortcodeText = '[youtube width="'+width+'" height="'+height+'"video_id="'+id+'"] ';
	 }
		
	 if (type == 'vimeo') {
		 shortcodeText = '[vimeo width="640" height="385" video_id="'+id+'"] ';
	 }
	 
		if ( id == 0 ){
			tinyMCEPopup.close();
		}	
		
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
