   <script type="text/javascript">
	jQuery(window).load( function () {
		jQuery("#image_slide_panel").hide();
		jQuery("#postdivrich").hide();
		if ( jQuery('#dp_slide_type').val() == 'i' ) {
				  jQuery("#image_slide_panel").slideDown("slow");
			}
		if ( jQuery('#dp_slide_type').val() == 'c' ) {
				  jQuery("#postdivrich").show();
			}
		jQuery('#dp_slide_type').change(function(){
			if ( jQuery(this).val() == 'i' ) {
				  jQuery("#image_slide_panel").slideDown("slow");
				  jQuery("#postdivrich").slideUp("slow");
			}
			if ( jQuery(this).val() == 'c' ) {
				 jQuery("#image_slide_panel").hide();
				 jQuery("#postdivrich").slideDown("slow");
				 			}
		});
	});
	</script>
<?php 
$values = get_post_custom( $post->ID ); 
$dp_slide_type = isset( $values['dp_slide_type'] ) ? esc_attr( $values['dp_slide_type'][0] ) : ''; 
$slide_description = isset( $values['slide_description'] ) ? esc_attr( $values['slide_description'][0] ) : '';
$slide_link = isset( $values['slide_link'] ) ? esc_attr( $values['slide_link'][0] ) : ''; 
$slide_transition = isset( $values['slide_transition'] ) ? esc_attr( $values['slide_transition'][0] ) : '';
$slide_transitionspeed = isset( $values['slide_transitionspeed'] ) ? esc_attr( $values['slide_transitionspeed'][0] ) : ''; 
$slide_slotamount = isset( $values['slide_slotamount'] ) ? esc_attr( $values['slide_slotamount'][0] ) : ''; 
$slide_rlink = isset( $values['slide_rlink'] ) ? esc_attr( $values['slide_rlink'][0] ) : '';
$slide_duration = isset( $values['slide_duration'] ) ? esc_attr( $values['slide_duration'][0] ) : '';
 ?>
<div class="my_meta_control">
	<label><?php _e("Define the type of slide <span>(This choice determines the type of displayable content)</span>", DPTPLNAME); ?></label>
	
	<p class="note"><?php _e("<i><b>Note!</b><br/>An ''<b>Content Slide</b>'' will output the post content entered above in the main content. <br/>An ''<b>Image Slide</b>'' will use the featured image for the slide area. Post content above will be completely ignored. But you can enter in the fields that will appear below if you choose this type of slide, a description of the image and a link. </i> ", DPTPLNAME); ?></p>
       <p>
        <select name="dp_slide_type" id="dp_slide_type" style=" width:180px;" >
                            <option value="i" <?php if ($dp_slide_type == "i") echo 'selected'; ?> ><?php _e("Image Slide", DPTPLNAME); ?></option>
                            <option value="c" <?php if ($dp_slide_type == "c") echo 'selected'; ?> ><?php _e("Content Slide", DPTPLNAME); ?></option>
        </select>
        </p>
 <div id="image_slide_panel" class="panel">  
     <h4>Image Slide specyfic settings</h4>            
<label><?php _e("Description <span>(optional)</span>", DPTPLNAME); ?></label>
 
	<p>
		<textarea name="slide_description" id="slide_description" rows="3"><?php echo $slide_description ?></textarea>
		<?php _e("<span>Enter in a description you want to show over the image. Leave blank if you do not want a description to show.</span>", DPTPLNAME); ?>
	</p>
    <label><?php _e("Image Link <span>(optional)</span>", DPTPLNAME); ?></label>
 
	<p>
		<input type="text" name="slide_link" id="slide_link" value="<?php echo $slide_link ?>"/>
		<?php _e("<span>Enter where you'd like this image slide to link to. Leave this option blank if you do not want this slide to be clickable.</span>", DPTPLNAME); ?>
	</p>
</div>	
</div>