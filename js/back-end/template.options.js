/**
 *
 * -------------------------------------------
 * Script for the template options
 * -------------------------------------------
 *
 **/

/**
 * jQuery Cookie plugin
 *
 * Copyright (c) 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
jQuery.cookie = function (key, value, options) {

    // key and at least value given, set cookie...
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }

    // key and possibly options given, get cookie...
    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};

// ID of the upload field 
var uploadID = '';
// common functions and objects
function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}
//
gkValidation = [];
gkValidationResults = [];
gkValidationResultsTabs = [];
gkVisibility = {};
gkVisibilityDependicies = {};
//
jQuery(document).ready(function() {
	// tabs
	jQuery('#gkTabs li').each(function(i,el){
		var item = jQuery(el);
		item.click(function() {
			jQuery('#gkTabs li').removeClass('active');
			jQuery('#gkTabsContent > div').removeClass('active');
			
			item.addClass('active');
			jQuery(jQuery('#gkTabsContent > div')[i]).addClass('active');
			// save the cookie with the active tab
			jQuery.cookie(jQuery('#gkMainWrap').attr('data-theme')+'_active_tab', i, { expires: 365, path: '/' });
		});
	});
	// initialize Media uploaders
	gkMediaInit();
	// initialize ColorPicker
	gkPickerInit();
	// initialize Background picker
	gkBackgroundInit();
	// initialize Opacity slider
	gkOpacityInit();
	// initialize switcher
	gkSwitcherInit();
	// initialize validation
	gkValidateInit();
	// initialize visualisation
	gkVisibilityInit();
	// add mini tips
	var fields = jQuery('#gkTabsContent').find('.gkInput');
	
	fields.each(function(i, field) {
		var field = jQuery(field);
		field.prev('label').miniTip();
	});	
	// saving the settings
	jQuery('.gkSave').each(function(i, button) {
		jQuery(button).click(function(event) {
			event.preventDefault();
			
			if(gkValidate()) {
				// save the settings
				var data = {
					action: 'template_save',
					security: $gk_ajax_nonce
				};
				
				var fields = jQuery('#gkTabsContent').find('.gkInput');
				
				fields.each(function(i, field) {
					var field = jQuery(field);
					if(field.hasClass('gkSwitcher') || field.hasClass('gkSelect')) {
						data[field.attr('id')] = field.find('option:selected').val();
					} else {
						data[field.attr('id')] = field.val();
					}
				});			
				// make an effect ;)
				jQuery('#gkTabsContent').find('.active').find('.gkAjaxLoading').css('opacity', 1);
				jQuery(event.target).html(jQuery(event.target).attr('data-loading'));
				// make a request
				jQuery.post(ajaxurl, data, function(response) {
					jQuery(event.target).html(response);
					jQuery('#gkTabsContent').find('.active').find('.gkAjaxLoading').css('opacity', 0);
					setTimeout(function() { 
						jQuery(event.target).html(jQuery(event.target).attr('data-loaded')); 
					}, 2500);
				});
			} else {
				jQuery(event.target).html(jQuery(event.target).attr('data-wrong'));
				setTimeout(function() { 
					jQuery(event.target).html(jQuery(event.target).attr('data-loaded')); 
				}, 2500);
			}
		});
	});
});
// function to init the validation rules
function gkValidateInit() {
	jQuery('#gkTabsContent > div').each(function(i, tab) {
		gkValidation[i] = [];
		gkValidationResults[i] = [];
		gkValidationResultsTabs[i] = true;
		
		var fields = jQuery(tab).find('.gkInput');
		
		fields.each(function(j, field) {
			var data = {
				'type': 'text',
				'format': '',
				'required': ''
			};
			var field = jQuery(field);
			
			if(field.hasClass('gkSwitcher') || field.hasClass('gkSelect')) {
				data.type = 'select';	
				field.blur(function() {
					gkValidateField(field, 'select');
					gkVisibilityField(field, 'select');
				});
				field.change(function() {
					gkValidateField(field, 'select');
					gkVisibilityField(field, 'select');
				});
			} else {
				field.blur(function() {
					gkValidateField(field, 'text');
					gkVisibilityField(field, 'text');
				});
			}
			data.format = (field.attr('data-format') != '') ? new RegExp(field.attr('data-format')) : '';
			data.required = field.attr('data-required');
			gkValidation[i][j] = data;
			gkValidationResults[i][j] = [];
		});	
	});
}
// function to validate
function gkValidate() {
	// validate
	jQuery(gkValidation).each(function(i, fields) {
		var allFields = jQuery(jQuery('#gkTabsContent > div')[i]).find('.gkInput');
		gkValidationResultsTabs[i] = true;
		
		jQuery(fields).each(function(j, field) {
			var value = field.type == 'select' ? jQuery(allFields[j]).find('option:selected').val() : jQuery(allFields[j]).val();
			var data = gkValidation[i][j];
			gkValidationResults[i][j] = [];
			
			if(data.required == 'true' && jQuery(allFields[j]).get('data-visible') == 'true' && !value) {
				gkValidationResults[i][j].push('required');
				gkValidationResultsTabs[i] = false;
			}
			
			if(data.format != '' && jQuery(allFields[j]).attr('data-visible') == 'true' && !value.match(data.format)) {
				gkValidationResults[i][j].push('format');
				gkValidationResultsTabs[i] = false;
			}
		});
	});
	// change elements basic on the results
	var result = true;
	
	jQuery(gkValidationResultsTabs).each(function(i, tabCorrect) {
		if(tabCorrect) {
			jQuery(jQuery('#gkTabs li')[i]).removeClass('wrong');			
		} else {
			jQuery(jQuery('#gkTabs li')[i]).addClass('wrong');
			result = false;
		}
	});
	// validate all fields
	var fields = jQuery('#gkTabsContent').find('.gkInput');
	
	fields.each(function(i, field) {
		var field = jQuery(field);	
		gkValidateField(field, (field.hasClass('gkSwitcher') || field.hasClass('gkSelect')) ? 'select' : 'text');
	});
	
	// return the result
	return result;
}
// function to validate one field
function gkValidateField(field, type) {
	var value = (type == 'select') ? field.find('option:selected').val() : field.val();
	var format = (field.attr('data-format') != '') ? new RegExp(field.attr('data-format')) : '';
	var required = field.attr('data-required');
	var visibility = field.attr('data-visible');
	
	field.removeClass('wrong-format');
	field.removeClass('wrong-required');
	
	if(required == 'true' && visibility == 'true' && !value) {
		field.addClass('wrong-required');
	}
	
	if(format != '' && visibility == 'true' && !value.match(format)) {
		field.addClass('wrong-format');
	}
	// check the tabs
	jQuery('#gkTabsContent > div').each(function(i, tab) {
		var wrongFormat = jQuery(tab).find('.wrong-format');
		var wrongRequired = jQuery(tab).find('.wrong-required');
		
		if(wrongFormat.length == 0 && wrongRequired.length == 0) {
			if(jQuery(jQuery('#gkTabs li')[i]).hasClass('wrong')) {
				jQuery(jQuery('#gkTabs li')[i]).removeClass('wrong');
			}
		} else {
			if(!jQuery(jQuery('#gkTabs li')[i]).hasClass('wrong')) {
				jQuery(jQuery('#gkTabs li')[i]).addClass('wrong');
			}
		}
	});
}
//
function gkVisibilityInit() {
	var allFields = jQuery('#gkTabsContent').find('.gkInput');
	//
	allFields.each(function(i, field) {
		var visibility = jQuery(field).attr('data-visibility');
		
		if(visibility != '') {
			var tempVisibilityRules = visibility.split(',');
			
			for(var j = 0; j < tempVisibilityRules.length; j++) {
				tempVisibilityRules[j] = tempVisibilityRules[j].split('=');
				
				tempVisibilityRules[j] = {
										"field": tempVisibilityRules[j][0],
										"value": tempVisibilityRules[j][1]
									};
									
				var visible = jQuery(field).attr('id');
									
				if(typeof gkVisibilityDependicies[visible] !== "object") {
					gkVisibilityDependicies[visible] = [tempVisibilityRules[j]];
				} else {
					gkVisibilityDependicies[visible].push(tempVisibilityRules[j]);
				}
			}
			
			var visibilityRules = jQuery(field).attr('data-visibility').split(',');
			
			for(var j = 0; j < visibilityRules.length; j++) {
				visibilityRules[j] = visibilityRules[j].split('=');
				var usedField = visibilityRules[j][0];	
				var tempField = jQuery('*[data-name='+usedField+']');
				var type = (tempField.hasClass('gkSwitcher') || tempField.hasClass('gkSelect')) ? 'select' : 'text';
				
				visibilityRules[j] = {
										"type": type,
										"visible": jQuery(field).attr('id')
									};
									
				if(typeof gkVisibility[usedField] !== "object") {
					gkVisibility[usedField] = [visibilityRules[j]];
				} else {
					gkVisibility[usedField].push(visibilityRules[j]);
				}
			}
		}
	});
	//
	allFields.each(function(i, field) {
		gkVisibilityField(jQuery(field));
	});
}
//
function gkVisibilityField(field) {
	//
	if(gkVisibility[field.attr('data-name')]) {
		//
		var dependencies = gkVisibility[field.attr('data-name')];
		//
		for(var i = 0; i < dependencies.length; i++) {
			var dependsFrom = gkVisibilityDependicies[dependencies[i].visible];
			var flag = 'true';
			
			for(var j = 0; j < dependsFrom.length; j++) {
				var type = gkVisibility[dependsFrom[j].field].type;
				var field = jQuery('*[data-name='+dependsFrom[j].field+']');
				var value = (type == 'select') ? field.find('option:selected').val() : field.val();
				
				if(value != dependsFrom[j].value) {
					flag = 'false';
				}
			}
			
			jQuery('#' + dependencies[i].visible).parent('p').attr('data-visible', flag);
		}
	}
}
//
function gkPickerInit() {
	// color pickers
	jQuery('.colorSelector').each(
		function(i, el) {
		var Othis = this; //cache a copy of the this variable for use inside nested function
		var initialColor = jQuery(Othis).prev('input').attr('value');
		jQuery(Othis).children('span').css('backgroundColor', initialColor);
		jQuery(this).ColorPicker({
		color: initialColor,
		onShow: function (colpkr) {
		jQuery(colpkr).fadeIn(500);
		return false;
		},
		onHide: function (colpkr) {
		jQuery(colpkr).fadeOut(500);
		return false;
		},
		onChange: function (hsb, hex, rgb) {
		jQuery(Othis).children('span').css('backgroundColor', '#' + hex);
		jQuery(Othis).prev('input').attr('value','#' + hex);
	}
	});		
		}
	);
	jQuery('.gkColor').change(function() {
		newcolor = jQuery(this).val();
	jQuery(this).next('.colorSelector').children('span').css('backgroundColor', newcolor);
	 });
}
//
function gkBackgroundInit() {
	// color pickers
	jQuery('.gkBackground').each(
		function(i, el) {
		var bgid = jQuery(el).attr('id') + '_bg';
		var pathid = jQuery(el).attr('id') + '_path';
		if (jQuery(el).val() == 'none') jQuery('#'+bgid).hide();
		jQuery(this).change(function() {
		newbg = 'url('+jQuery('#'+pathid).val()+jQuery(this).val()+'.png)';
		jQuery('#'+bgid).css('background-image',newbg);
		if (jQuery(this).val() != "none") {
		jQuery('#'+bgid).show();	
		} else {jQuery('#'+bgid).hide();
		}
	});		
	}
	);
}

//
function gkSwitcherInit() {
	// switchers
	
	jQuery('.gkSwitcher').each(
		function(i, el) {
		var switcherid = jQuery(el).attr('id');
		var switchervalue = jQuery('#'+switcherid).val();
		if (switchervalue =='Y') {
			jQuery('#'+switcherid+'_dpswitch').addClass('enabled');
			
			} else {
			jQuery('#'+switcherid+'_dpswitch').addClass('disabled'); 
			}
			
	}
	);
	jQuery('.dpSwitcher').click(function() {
 	if (jQuery(this).hasClass('enabled')) {jQuery(this).removeClass('enabled');
	jQuery(this).addClass('disabled');
	jQuery(this).prev('.gkSwitcher').val('N');
	gkValidateField(jQuery(this).prev('.gkSwitcher'), 'select');
	gkVisibilityField(jQuery(this).prev('.gkSwitcher'), 'select');
	} else {
	jQuery(this).removeClass('disabled');
	jQuery(this).addClass('enabled');
	jQuery(this).prev('.gkSwitcher').val('Y');
	gkValidateField(jQuery(this).prev('.gkSwitcher'), 'select');
	gkVisibilityField(jQuery(this).prev('.gkSwitcher'), 'select');
	}
});
}

//
function gkOpacityInit() {
	// opacity selector
	jQuery('.gkOpacity').each(
		function(i, el) {
			var sliderid = jQuery(el).attr('id') + '_slider';
			var select = jQuery( this );        
			var slider = jQuery( "<div id='"+sliderid+"' class='opacity_slider'></div>" ).insertBefore( select ).slider({            
			min: 1,            
			max: 11,            
			range: "min",            
			value: select[ 0 ].selectedIndex + 1,            
			slide: function( event, ui ) {                
			select[ 0 ].selectedIndex = ui.value - 1;            
			}        
			});        
			jQuery( this ).change(function() {            
			slider.slider( "value", this.selectedIndex + 1 );        
			});
	}
	);
}
//

function gkMediaInit() {
	// image uploaders
	jQuery('.gkMediaInput').each(
		function(i, el) {
			var btnid = jQuery(el).attr('id') + '_button';
			var btn1id = jQuery(el).attr('id') + '_button1'; 
			var imgid = jQuery(el).attr('id') + '_image';
			if (jQuery(el).val().length == 0) jQuery('#'+btn1id).hide(); 
			jQuery('#'+btnid).click(function() {
				uploadID = jQuery(this).prev('input');
				uploadedimg = jQuery('#'+imgid);
				clearbtn = jQuery('#'+btn1id);
				formfield = jQuery(this).prev('input').attr('name');
				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				return false;
			});
			jQuery('#'+btn1id).click(function() {
				jQuery(el).val('');
				jQuery('#'+imgid).hide();
				jQuery(this).hide();
				return false;
			});
		}
	);
}
//
window.send_to_editor = function(html) {
	imgurl = jQuery('img', html).attr('src');
	uploadID.val(imgurl);
	uploadedimg.attr('src',imgurl);
	uploadedimg.show();
	tb_remove();
	clearbtn.show();
}