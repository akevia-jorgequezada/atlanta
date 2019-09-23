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
	
	var shortcodeText, boxclass,name;
	var boxtype = $("input[name=dp_icon_boxes_type]:checked").val();
	var size = document.getElementById('dp_icon_boxes_size').value;
	var style = document.getElementById('dp_icon_boxes_style').value;
	var badge = document.getElementById('dp_icon_boxes_badge').value;
	var badgecolor = document.getElementById('badge_bg').value;
	var title = document.getElementById('dp_icon_boxes_title').value;
	var text = document.getElementById('dp_icon_boxes_text').value;
	if (style == 'dark') {
		if (size == 'small') {name = document.getElementById('dp_icon_dark32').value;} else {name = document.getElementById('dp_icon_dark64').value;}
	}
	if (style == 'light') {
		if (size == 'small') {name = document.getElementById('dp_icon_light32').value;} else {name = document.getElementById('dp_icon_light64').value;}
	}
	if (style == 'color') {
		if (size == 'small') {name = document.getElementById('dp_icon_color32').value;} else {name = document.getElementById('dp_icon_color64').value;}
	}
	
	if (boxtype	== '1'){
		shortcodeText = "[icon size='"+size+"' style='"+style+"' type='"+name+"' ";
		if (badge == '1') {shortcodeText = shortcodeText + "badge='"+badgecolor+"'";}
		shortcodeText = shortcodeText +"]";
		} 
	else 
	{ 
	if (boxtype == '2'){boxclass = 'left1'};
	if (boxtype == '3'){boxclass = 'left2'};
	if (boxtype == '4'){boxclass = 'left3'};
	if (boxtype == '5'){boxclass = 'centered'};
	shortcodeText = "[iconbox class='"+boxclass+"' size='"+size+"' style='"+style+"' type='"+name+"' title='"+title+"' ";
	if (badge == '1') {shortcodeText = shortcodeText + "badge='"+badgecolor+"'";}
	shortcodeText = shortcodeText +"]"+text+"[/iconbox]";
	}
		
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
