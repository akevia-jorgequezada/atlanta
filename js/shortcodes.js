/**
 *
 * -------------------------------------------
 * Script for the interactive elements shortcodes
 * -------------------------------------------
 *
 **/
 jQuery.noConflict(); 
 // ---------------------------------------------------------
// Slideshow Navigation
// ---------------------------------------------------------

function paginate(idx, slide){
    return '<li><a href="#" title=""></a></li>';
}

	/* Tabs */
	jQuery(window).load(function() {
		jQuery('.tabs_container ul.tabs li:first-child a').addClass('current');
		jQuery('.tabs_container .panes div.pane:first-child').show();
		
		jQuery('.tabs_container ul.tabs li a').click(function (a) { 
			var tab = jQuery(this).parent().parent().parent(), 
				index =jQuery(this).parent().index();
			
			tab.find('ul.tabs').find('a').removeClass('current');
			jQuery(this).addClass('current');
			
			tab.find('.panes').find('div.pane').not('div.pane:eq(' + index + ')').slideUp(100);
			tab.find('.panes').find('div.pane:eq(' + index + ')').slideDown(100);
			
			a.preventDefault();
		} );
 });
	/* Toggle */
	jQuery(document).ready(function() {
		jQuery('.toggle .toggle_title').click(function (b) { 
			var toggled = jQuery(this).parent().find('.toggle_content');
			
			jQuery(this).parent().find('.toggle_content').not(toggled).slideUp();
			
			if (jQuery(this).hasClass('current')) {
				jQuery(this).removeClass('current');
			} else {
				jQuery(this).addClass('current');
			}
			
			toggled.stop(false, true).slideToggle().css( { 
				display : 'block' 
			} );
			
			b.preventDefault();
		} );
		
	});
	/* Accordion */
	jQuery(document).ready(function() {
		//jQuery(".accordions .acc_title").first().addClass('current');
		//jQuery(".accordions .tab_content").first().slideToggle().css( { 
		//		display : 'block' 
		//	} );
		
		jQuery('.accordions .acc_title').click(function (c) { 
			var toggled = jQuery(this).parent().find('.tab_content');
			
			jQuery(this).parent().parent().find('.tab_content').not(toggled).slideUp();
			
			if (jQuery(this).hasClass('current')) {
				jQuery(this).removeClass('current');
			} else {
				jQuery(this).parent().parent().find('.acc_title').removeClass('current');
				jQuery(this).addClass('current');
			}
			
			toggled.stop(false, true).slideToggle().css( { 
				display : 'block' 
			} );
			
			c.preventDefault();
		} );
	});
//Vertical tabs
	jQuery(document).ready( function () {
	var navh = jQuery('.vtabs').css('height');
		jQuery('.vtab_pane_inner').css({"min-height":navh});
		jQuery('.vertical_tabs ul.vtabs li:first-child').addClass('current');
		jQuery('.vertical_tabs div.vtab_pane:first').show();
		
		jQuery('.vtab_title').click(function (d) { 
			var tour = jQuery(this).parent().parent().parent().parent(), 
				index = jQuery('ul.vtabs li').index(jQuery(this).parent());
			
			tour.find('ul.vtabs').find('li').removeClass('current');
			jQuery(this).parent().addClass('current');
			
			tour.find('div.vtab_pane').not('div.vtab_pane:eq(' + index + ')').slideUp();
			tour.find('div.vtab_pane:eq(' + index + ')').slideDown();
			
			d.preventDefault();
		} );	
	});
	/* Lightbox */
	jQuery(document).ready(function() {
	jQuery('a[rel^="dp_lightbox"]').prettyPhoto({
		deeplinking: true,
		overlay_gallery: false,
		show_title: false
	});
	});
	
	

//Image accets 
jQuery(document).ready(function() {
        
        jQuery(window).load(function() {
									 
                  var portfolio_item=jQuery("a.imgeffect");
				  
                  
                  portfolio_item.each(function(){
                  
                           var img_width = jQuery(this).find('img').width();  
                           var img_height = jQuery(this).find('img').innerHeight();
                           var imageClass = jQuery(this).attr("class");
                           jQuery(this).prepend('<span class="imagemask '+imageClass+'"></span>');
                           
                           var p = jQuery(this).find('img');
                           var position = p.position();
                           var PosTop= parseInt(p.css("margin-top"))+position.top;
                           var PosLeft= parseInt(p.css("margin-left"))+position.left;
			   if (!PosLeft) {PosLeft= position.left};
                           
                           jQuery(this).find('.imagemask').css({top: PosTop});
			   jQuery(this).find('.imagemask').css({left: PosLeft});
                           
                           jQuery('.imagemask', this).css({width:img_width,height:img_height,backgroundPosition:'center center'});
                           
                           if(jQuery.browser.msie){ jQuery('.imagemask', this).css({display:'none'});}
                           
                  });
                  
         });
        
        
         var image_e= jQuery("a.imgeffect");
		
		if(jQuery.browser.msie){//ignore the shadow effect if browser IE
			 
				image_e.mouseover(function(){
					 
				jQuery(this).find('.imagemask').stop().css({
						  display:"block"
						  }); 
					 
				}).mouseout(function(){
					jQuery(this).find('.imagemask').stop().css({
						 display:"none"
						} );
				});
			 
		}else{//real browsers :)
			 image_e.mouseover(function(){
			 jQuery(this).find('.imagemask').stop().animate({
					   display:"block",
					   opacity:1
					   }, 500); 
			  jQuery(this).find('img').stop().animate({
					   opacity: 0.7
			}, 200);
			 }).mouseout(function(){
				 jQuery(this).find('.imagemask').stop().animate({
					   display:"none",
					   opacity:0
					 }, 400 );
				 jQuery(this).find('img').stop().animate({
					   opacity: 1
			}, 300);
			 });                  
		}

});
//Tipsy and pulsating point
jQuery(window).load( function () {
    jQuery(".dp-tipsy").tipsy({gravity: 's', fade: true, html: true, title: "data-tipcontent", opacity:1 });
	});

