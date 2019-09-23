<?php 
	
	/**
	 *
	 * Template elements after the page content
	 *
	 **/
	
	// create an access to the template main object
	global $tpl;
	
	// disable direct access to the file	
	defined('GAVERN_WP') or die('Access denied');
	
?>
			
				<?php if(gk_is_active_sidebar('mainbody_bottom')) : ?>
				
                <section id="gk-mainbody-bottom">
					<?php gk_dynamic_sidebar('mainbody_bottom'); ?>
				</section>
				<?php endif; ?>
                <?php if(gk_is_active_sidebar('mainbody_bottom_1')) : ?>
				
                <section id="gk-mainbody-bottom_1">
					<?php gk_dynamic_sidebar('mainbody_bottom_1'); ?>
				</section>
				<?php endif; ?>
			</section><!-- end of the mainbody section -->
		
			<?php 
			if(
				get_option($tpl->name . '_page_layout', 'right') == 'right' && 
				gk_is_active_sidebar('sidebar') && 
				(
					$args == null || 
					($args != null && $args['sidebar'] == true)
				)
			) : ?>
			<aside id="gk-sidebar">
				<?php gk_dynamic_sidebar('sidebar'); ?>
			</aside>
			<?php endif; ?>
		</section><!-- end of the #gk-mainbody-columns -->
	</section><!-- end of the .gk-page section -->
</section><!-- end of the .gk-page-wrap section -->	

<!-- <section id="gk-bottom-wrap" class="expand15" > -->
<?php if(gk_is_active_sidebar('bottom')) : ?>
<div class=" dp-bottom-separator expand15"></div>
<section id="gk-bottom" class="gk-page widget-area">
	<?php gk_dynamic_sidebar('bottom'); ?>
</section>
<?php endif; ?>
