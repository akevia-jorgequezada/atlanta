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

/**
 *
 * Template scripts
 *
 **/

// onDOMLoadedContent event
jQuery(document).ready(function() {	
	// Back to Top Scroll
	jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() != 0) {
			jQuery('#back-to-top').fadeIn();	
		} else {
			jQuery('#back-to-top').fadeOut();
		}
	});
 
	jQuery('#back-to-top').click(function() {
		jQuery('body,html').animate({scrollTop:0},800);
	});	
	// Thickbox use
	jQuery(document).ready(function(){
		if(typeof tb_init != "undefined") {
			tb_init('div.wp-caption a');//pass where to apply thickbox
		}
	});
	// style area
	if(jQuery('#gk-style-area')){
		jQuery('#gk-style-area div').each(function(i){
			jQuery(this).find('a').each(function(index) {
				jQuery(this).click(function(e){
	            	e.stopPropagation();
	            	e.preventDefault();
					changeStyle(jQuery(this).attr('href').replace('#', ''));
				});
			});
		});
	}
	// font-size switcher
	if(jQuery('#gk-font-size') && jQuery('#gk-mainbody')) {
		var current_fs = 100;
		jQuery('#gk-mainbody').css('font-size', current_fs+"%");
		
		jQuery('#gk-increment').click(function(e){ 
			e.stopPropagation();
			e.preventDefault(); 
			
			if(current_fs < 150) { 
				jQuery('#gk-mainbody').animate({ 'font-size': (current_fs + 10) + "%"}, 200); 
				current_fs += 10; 
			} 
		});
		
		jQuery('#gk-reset').click(function(e){ 
			e.stopPropagation(); 
			e.preventDefault(); 
			
			jQuery('#gk-mainbody').animate({ 'font-size': "100%"}, 200); 
			current_fs = 100; 
		});
		
		jQuery('#gk-decrement').click(function(e){ 
			e.stopPropagation(); 
			e.preventDefault(); 
			
			if(current_fs > 70) { 
				jQuery('#gk-mainbody').animate({ 'font-size': (current_fs - 10) + "%"}, 200); 
				current_fs -= 10; 
			} 
		});
	}
//Fitvids//
 jQuery(document).ready(function(){
	jQuery(".page, .post, .single-portfolio").fitVids();
  });
  

//demo stuff
jQuery(function(){
	var set_style = jQuery.getQuery('style');
	if (set_style != false) {	changeStyle(set_style+'.css'); }
});
// Parse URL Queries Method
(function($){
	$.getQuery = function( query ) {
		query = query.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
		var expr = "[\\?&]"+query+"=([^&#]*)";
		var regex = new RegExp( expr );
		var results = regex.exec( window.location.href );
		if( results !== null ) {
			return results[1];
			return decodeURIComponent(results[1].replace(/\+/g, " "));
		} else {
			return false;
		}
	};
})(jQuery);
	// Function to change styles
	function changeStyle(style){
		var file = $GK_TMPL_URL+'/css/'+style;
		jQuery('head').append('<link rel="stylesheet" href="'+file+'" type="text/css" />');
		jQuery.cookie($GK_TMPL_NAME+'_style', style, { expires: 365, path: '/' });
	}
		function changeStyledemo(style){
		var file = $GK_TMPL_URL+'/css/'+style;
		jQuery('head').append('<link rel="stylesheet" href="'+file+'" type="text/css" />');
		jQuery.cookie($GK_TMPL_NAME+'_style', style, { expires: 365, path: '/' });
	}
	

});
/*==================================================
	     PORTFOLIO IMAGE HOVER
==================================================*/
jQuery(window).load(function(){
						   
	jQuery(".portfolio-wrapper .item-info-overlay").hide();
	
			jQuery(".portfolio-wrapper .portfolio-item").hover(function(){
				jQuery(this).find(".item-info-overlay").fadeTo(250, 0.9);
				}, function() {
					jQuery(this).find(".item-info-overlay").fadeTo(250, 0);		
			});
		
});

//Isotope
jQuery(window).load(function() {
	jQuery('.portfolio-one .portfolio-wrapper').isotope({
		// options
		itemSelector: '.portfolio-item',
		layoutMode: 'straightDown'
	});

	jQuery('.portfolio-two .portfolio-wrapper, .portfolio-three .portfolio-wrapper, .portfolio-four .portfolio-wrapper, .portfolio-six .portfolio-wrapper').isotope({
		// options
		itemSelector: '.portfolio-item',
		layoutMode: 'fitRows'
	});
	jQuery('.portfolio-tabs a').click(function(e){
		e.preventDefault();

		var selector = jQuery(this).attr('data-filter');
		jQuery('.portfolio-wrapper').isotope({ filter: selector });

		jQuery(this).parents('ul').find('li').removeClass('active');
		jQuery(this).parent().addClass('active');
	});
});

/*Quick Contact on top*/
jQuery(window).load(function() {
	jQuery('.top-panel-switcher').hover(function() {
        jQuery('#gk-top-panel-wrap').toggleClass("selected");
    });
    jQuery('.top-panel-switcher').click(function() {
        if (jQuery('#gk-top-panel').is(":visible")) {
            jQuery('#gk-top-panel').slideUp(500, 'easeInOutExpo');
        } else {
            jQuery('#gk-top-panel').slideDown(500, 'easeInOutExpo');
        };
        return false;
    });

});

	
