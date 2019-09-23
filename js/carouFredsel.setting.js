 jQuery.noConflict(); 
 jQuery(document).ready(function() {
				var acpect = fwsliderheight/fwsliderwidth;
				var imgheight = jQuery("#dp-fullslider").width()*acpect;
				var imgwidth = jQuery("#dp-fullslider").width();
				var leftmargin;
				if (jQuery("#dp-fullslider").width()>1200) {
				leftmargin =(jQuery("#dp-fullslider").width()-1160)/2;
				}
				else {
				if (jQuery("#dp-fullslider").width()>960) {
				leftmargin =(jQuery("#dp-fullslider").width()-920)/2;
				} else {
				leftmargin = '10%';	
				}
				}
				var topmargin;
				if (imgwidth > 767) {
				topmargin =0.20*imgheight ;
				} else {
				topmargin =50;	
				}
				jQuery('.slidedesc').css( 'top', topmargin );
				jQuery('.slidedesc').css( 'margin-left', leftmargin );
				jQuery('.slidedesc').css( 'margin-left', -1160 );
				jQuery('.slidedesc').delay(300).animate({'margin-left':leftmargin},400,'easeOutQuad');
				jQuery('#carousel').carouFredSel({
					pagination  : '#pager',
					prev: '#sprev',
					next: '#snext',
					responsive  : true,
					align: "center",
					auto: {
					
					},
					width: imgwidth,
					height: imgheight,
					align: false,
					items: {
						visible: 1,
						width: imgwidth,
						height: imgheight
					},
			scroll: {
			fx: fwslidertrans,
			duration:fwsliderspeed*300,
			easing: "cubic",
			onPauseStart: function( percentage, duration ) {
				jQuery('#timer').stop().animate({
					width: jQuery("#dp-fullslider").width()
				}, {
					duration: duration,
					easing: 'linear'
				});
			},
			onPauseEnd: function( percentage, duration ) {
				jQuery('#timer').stop().width( 0 );
			},
			onPausePause: function( percentage, duration ) {
				jQuery('#timer').stop().width( 0 );
			},
			onStart: function() {
					jQuery('.slidedesc').css({'margin-left':-1160});
			},
			onAfter: function( oldI, newI ) {
				jQuery(newI).find('.slidedesc').animate({'margin-left':leftmargin},400,'easeOutQuad');
				jQuery(oldI).find('.slidedesc').css({'margin-left':-1160});	
			},
			onBefore: function( oldI, newI ) {
				jQuery(newI).find('.slidedesc').css({'margin-left':-1160});
				jQuery('#timer').stop().width( 0 );
			}
			
		}
	});
				jQuery(window).resize(function() {
				imgwidth = jQuery("#dp-fullslider").width();
				imgheight = jQuery("#dp-fullslider").width()*acpect;
				if (imgwidth > 767) {
				topmargin =0.20*imgheight ;
				} else {
				topmargin =50 ;	
				}
				if (jQuery("#dp-fullslider").width()>1200) {
				leftmargin =(jQuery("#dp-fullslider").width()-1160)/2;
				}
				else {
				if (jQuery("#dp-fullslider").width()>960) {
				leftmargin =(jQuery("#dp-fullslider").width()-920)/2;
				} else {
				leftmargin = '10%';	
				}
				}
				var newCss = {
						width: imgwidth,
						height: imgheight,
					};
					jQuery('#carousel img').css( newCss );
					jQuery('#carousel').parent().css( newCss );
					jQuery('.slidedesc').css({'margin-left':leftmargin});
					jQuery('.slidedesc').css( 'top', topmargin );
					jQuery('#carousel div.slide').css( newCss );
				}).resize();

jQuery('#dp-fullslider').hover(function() {
				jQuery('#navi').fadeIn('slow');
	}, function() {
jQuery('#navi').fadeOut('slow');		
	});				
	

			});