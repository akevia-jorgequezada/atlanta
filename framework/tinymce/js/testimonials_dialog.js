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
	var corners = document.getElementById('dp-testimonials-corners').value;
	var content = document.getElementById('dp-testimonials-content').value;
	var author = document.getElementById('dp-testimonials-author').value;
	var shortcodeId = document.getElementById('dp-testimonials-shortcode').value;
	
	    if (shortcodeId != 0 && corners == '1' ){
		shortcodeText = "[bubble class='"+shortcodeId+"' author='"+author+"']"+content+"[/bubble]"+" ";	
		}
		
		if (shortcodeId != 0 && corners == '2' ){
		shortcodeText = "[bubble class='"+shortcodeId+"' author='"+author+"' class1='rounded']"+content+"[/bubble]"+" ";	
		}
		
		if ( shortcodeId == 0 ){
			tinyMCEPopup.close();
		}	
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
