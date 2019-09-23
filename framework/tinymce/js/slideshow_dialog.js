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
	var id = document.getElementById('dp-slideshow-id').value;
	var type = document.getElementById('dp-slideshow-type').value;
	var speed = document.getElementById('dp_slideshow_speed').value;
	shortcodeText = '[slideshow id="'+id+'" speed="'+speed+'" type="'+type+'"] ';
	 
		if ( id == 0 ){
			tinyMCEPopup.close();
		}	
		
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
