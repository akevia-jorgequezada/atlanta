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
	var i= 0;
	var t='';
	var tabcount = document.getElementById('dp-tabs-count').value;
	var tabtype = document.getElementById('dp-tabs-type').value;
	var tabtitles =new Array(); 
	for (i=1;i<=6;i++)
	{ tabtitles[i] = document.getElementById('dp_tabtitle_'+i).value;
	if (tabtitles[i]==0)  {tabtitles[i] = 'Tab '+i;}
	}
	if (tabcount != 0 && tabtype == 'tabs') {
	for (i=1;i<=tabcount;i++) 
	{t = t + '[tab title ="'+ tabtitles[i]+'"]Tab' + i +' content goes here.[/tab] ';}
	shortcodeText = '[tabs] '+ t +' [/tabs]'+" ";	
	};
	if (tabcount != 0 && tabtype == 'toggle') {
	for (i=1;i<=tabcount;i++) 
	{t = t + '[toggle title ="'+ tabtitles[i]+'"]Tab' + i +' content goes here.[/toggle] ';}
	shortcodeText = t +" ";	
	};
	if (tabcount != 0 && tabtype == 'accordion') {
	for (i=1;i<=tabcount;i++) 
	{t = t + '[accordion title ="'+ tabtitles[i]+'"]Tab' + i +' content goes here.[/accordion] ';}
	shortcodeText = '[accordions] '+ t +' [/accordions]'+" ";	
	};
		
		if ( tabcount == 0 ){
			tinyMCEPopup.close();
		}	
		
	
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}
