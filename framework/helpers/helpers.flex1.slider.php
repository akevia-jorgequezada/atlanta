<?php
function flex1slider() {
	global $tpl,$post;
	$slideshow = get_option($tpl->name . "_flex1_slider_source");
	$speed = get_option($tpl->name . "_slider_flex1_speed");
	$transition = get_option($tpl->name . "_slider_flex1_transition");
	$transition_speed = get_option($tpl->name . "_slider_flex1_transition_duration");
	$easing =  get_option($tpl->name . "_slider_flex1_transition_easing");
	$query_string = 'post_type=slide&order=ASC&orderby=menu_order&nopaging=true';
	
	if($slideshow != 'All'){
		
		$query_string .= "&slideshows=$slideshow";
		
	}
	
	$slideshow_query = new WP_Query($query_string);
	
	$id = "flexslider_".mt_rand();

	if($speed != '0'){
		$speed .= '000';
	}
	
	
		
		$output = '<script type="text/javascript">'."\n";
		$output .= "   jQuery(window).load(function() {"."\n";
		$output .= "jQuery('#thumb-nav').flexslider({"."\n";
        $output .= "animation: 'slide',"."\n";
        $output .= "controlNav: false,"."\n";
        $output .= "animationLoop: false,"."\n";
      	$output .= "slideshow: false,"."\n";
        $output .= "itemWidth: 125,"."\n";
        $output .= "itemMargin: 29,"."\n";
		$output .= "minItems: 2,"."\n";                    
		$output .= "maxItems: 8,"."\n";                   
		$output .= "move: 0,"."\n";
		$output .= "directionNav: false,"."\n";  
        $output .= "asNavFor: '#".$id."'"."\n";
      	$output .= "});"."\n";
      	$output .= "var thumbnav = jQuery('#thumb-nav');"."\n";
	  	$output .= "jQuery('.thumb-next').click(function(){"."\n";
 		$output .= "thumbnav.flexslider('next');"."\n";
 		$output .= "});"."\n";
 
		$output .= "jQuery('.thumb-prev').click(function(){"."\n";
		$output .= " thumbnav.flexslider('prev');"."\n";
		$output .= "});"."\n";

		$output .= "   jQuery('#".$id."')"."\n";    
		$output .= "   .fitVids()"."\n";     
		$output .= "   .flexslider({"."\n";               
		$output .= "   animation: '".$transition."',"."\n";
		$output .= "   animationLoop: true,"."\n";
		if (get_option($tpl->name . "_slider_flex1_autoplay") =='Y') {$output .= "   slideshow: true,"."\n";} else  {$output .= "   slideshow: false,"."\n";}
		$output .= "   directionNav: false,"."\n";	
		$output .= "   controlNav: false,"."\n";
		$output .= "   slideshowSpeed: ".$speed.","."\n"; 
		$output .= "   animationSpeed: ".$transition_speed.","."\n";
		$output .= "   easing: '".$easing."',"."\n";
		$output .= "   touch: true,"."\n";
		$output .= "   smoothHeight: true,"."\n";        
		$output .= "   useCSS: false,"."\n";
		$output .= "   sync: '#thumb-nav',"."\n";
		$output .= "   before: function(slider){"."\n";                     
		$output .= "   jQuery('.flexcontent').css( {'opacity':'0'});"."\n"; 
		$output .= "   jQuery('.slidedesc').css( {'opacity':'0','margin-left':'-500px'});"."\n";              
		$output .= "   },"."\n";
		$output .= "   after: function(slider){var currentSlide = slider.slides.eq(slider.currentSlide); currentSlide.find('.flexcontent').animate( {'opacity':'1'},1000 );currentSlide.find('.slidedesc').delay(800).animate( {'opacity':'1','margin-left':'0px'},500,'easeOutBack' )}"."\n";
		$output .= "   });"."\n"; 
		$output .= "   });"."\n";
		$output .= "</script>"."\n";
		$output .= '<div class="flex1">'."\n";
		$output .= '<div class="flexslider" id="'.$id.'"><ul class="slides">'."\n";
			
		if($slideshow_query->have_posts()) {
		
			while ($slideshow_query->have_posts()) {

            	$slideshow_query->the_post();
        		$slide_type = get_post_meta($post->ID, 'dp_slide_type', true);
				$slide_link = get_post_meta($post->ID, 'slide_link', true);
				$slide_description = get_post_meta($post->ID, 'slide_description', true);
        		$output .= '<li>'."\n";
        			
        		

                if($slide_type == 'i') {

                    if ( has_post_thumbnail() ) {
 					$imageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                    $output .='<img src="'.$imageurl.'" title="" alt="" />'."\n";
                    }
				$output .= '<div class="slidedesc"><div class="pad">';
				if (get_the_title() !='') {
				$output .= '<h1>';
				$output .= get_the_title();
				$output .= '</h1>'."\n";
				};
				if (get_post_meta($post->ID, 'slide_description', true)!='') {$output .= '<p>'.get_post_meta($post->ID, 'slide_description', true)."\n";
				if( get_post_meta($post->ID, 'slide_link', true) ){$output .= '<br/><a style="margin-left:67%" class="button white" href="'.get_post_meta($post->ID, 'slide_link', true).'" title="">'.__("LEARN MORE", DPTPLNAME).'</a>'."\n";}
				}
				$output .= '</p></div></div>'."\n";
                } // end slide_type
        			
        		$output .= '</li>'."\n";    	
		
			} 
			$output .= '</ul></div>'."\n"; 
			  
			//End while
		
		} else {
		
			$output .= '<p class="warning">'."\n";
			$output .= __("You don't have any Slides to display.", DPTPLNAME);
			$output .= '</p>'."\n";
			
		}
			
			
		$output .= '	</ul></div><div class="flex-shadow"></div>'."\n";

			// Navigation thumbs row
			
		$output .= '<div class="nav-container"><div class="thumb-prev"></div><div class="thumb-next"></div><div id="thumb-nav" class="flexslider"><ul class="slides">'."\n";
			
		if($slideshow_query->have_posts()) {
		
			while ($slideshow_query->have_posts()) {

            	$slideshow_query->the_post();
        		$slide_type = get_post_meta($post->ID, 'dp_slide_type', true);
        		$output .= '<li>'."\n";
                if($slide_type == 'i') {
                    if ( has_post_thumbnail() ) {
                    $output .= get_the_post_thumbnail($post->ID,'flex-thumb')."\n";
                    }
                } // end slide_type
        			
        		$output .= '</li>'."\n";    	
		
			} 
			$output .= '</ul></div></div>'."\n";   
			//End while
		
		} else {
		
			$output .= '<p class="warning">'."\n";
			$output .= __("You don't have any Slides to display.", DPTPLNAME);
			$output .= '</p>'."\n";
			
		}
			
			
		$output .= '	</ul></div>'."\n";

		$output .= '</div>'."\n";
		
	return $output;

} 
?>