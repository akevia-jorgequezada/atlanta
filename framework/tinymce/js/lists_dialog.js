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
	var listType = $("input[name=list_type]:checked").val();
	var shortcodeId = document.getElementById('dp-lists-shortcode').value;
	
	
	    if (shortcodeId != 0 && listType == '1' ){
		shortcodeText = "[list class='"+shortcodeId+"'] [li]Your list position 1[/li] [li]Your list position 2[/li] [li]Your list position 3[/li] [/list]"+" ";	
		}
		
		if (shortcodeId != 0 && listType == '2' ){
		shortcodeText = "[ord_list class='"+shortcodeId+"'] [li]Your list position 1[/li] [li]Your list position 2[/li] [li]Your list position 3[/li] [/ord_list]"+" ";		
		}
		
		if (shortcodeId != 0 && listType == '3' ){
		shortcodeText = "[discnumber class='"+shortcodeId+"' number='1'] Your list position 1 [/discnumber] [discnumber class='"+shortcodeId+"' number='2'] Your list position 2 [/discnumber] [discnumber class='"+shortcodeId+"' number='3'] Your list position 3 [/discnumber]"+" ";	
		}
		
		if (shortcodeId != 0 && listType == '4' ){
		shortcodeText = "[bignumber class='"+shortcodeId+"' number='1'] Your list position 1 [/bignumber] [bignumber class='"+shortcodeId+"' number='2'] Your list position 2 [/bignumber] [bignumber class='"+shortcodeId+"' number='3'] Your list position 3 [/bignumber]"+" ";	
		}
		
		if ( shortcodeId == 0 ){
			tinyMCEPopup.close();
		}	
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
