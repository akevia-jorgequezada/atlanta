<?php 
	
	/**
	 *
	 * Template footer
	 *
	 **/
	
	// create an access to the template main object
	global $tpl;
	
	// disable direct access to the file	
	defined('GAVERN_WP') or die('Access denied');
	
?>
<section id="gk-footer-wrap" class="expand15">
	<footer id="gk-footer" class="gk-page">
        <div class="gk-copyrights">
		<?php if(get_option($tpl->name . '_template_footer_logo') == 'css') : ?>
		
		<?php endif; ?>
        <?php if(get_option($tpl->name . '_template_footer_logo') == 'image') : ?>
		<img src="" class="" alt="" />
		<?php endif; ?>
        <p class="gk-copyright-text"><?php echo str_replace('\\', '', htmlspecialchars_decode(get_option($tpl->name . '_template_copyright_text', ''))); ?></p>		
        </div>
        
		<div class="gk-footermenu">
		<?php 			
			if(gk_show_menu('footermenu')) {
				wp_nav_menu(array(
				      'theme_location'  => 'footermenu',
					  'container'       => false, 
					  'container_class' => 'menu-{menu slug}-container', 
					  'container_id'    => 'gkFooterMenu',
					  'menu_class'      => 'menu ' . $tpl->menu['footermenu']['style'], 
					  'menu_id'         => 'footer-menu',
					  'echo'            => true,
					  'fallback_cb'     => 'wp_page_menu',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => $tpl->menu['footermenu']['depth']
				));
			}
		?>
        </div>
		
        <div id="back-to-top">
        	top
		</div>
		
		
		<?php if(get_option($tpl->name . '_styleswitcher_state', 'Y') == 'Y') : ?>
		<div id="gk-style-area">
			<?php for($i = 0; $i < count($tpl->styles); $i++) : ?>
			<div class="gk-style-switcher-<?php echo $tpl->styles[$i]; ?>">
				<?php foreach($tpl->style_colors[$tpl->styles[$i]] as $stylename => $link) : ?> 
				<a href="#<?php echo $link; ?>"><?php echo $stylename; ?></a>
				<?php endforeach; ?>
			</div>
			<?php endfor; ?>
		</div>
		<?php endif; ?>
		<div align="right">
                <p>
                <map id="ImgMap1" name="ImgMap1">
	        <area alt="" coords="2, 0, 26, 25" href="https://www.facebook.com/LucianosATL/" shape="rect" target="_blank" />
	        <area coords="28, 0, 52, 25" href="https://www.instagram.com/lucianosatl/" shape="rect" target="_blank" />
			<!--		
	        <area coords="55, 0, 79, 25" href="https://twitter.com/lucianositaly" shape="rect" target="_blank" />
	        <area alt="" coords="82, 0, 107, 25" href="http://www.yelp.com/biz/lucianos-ristorante-italiano-duluth" shape="rect" target="_blank" />
	        <area alt="" coords="109, 0, 133, 25" href="https://www.youtube.com/channel/UC7icTj4DAAIwAAbi2zauVuw/videos" shape="rect" target="_blank" />
-->
                </map>
                <img height="26" src="https://lucianositaly.com/atlanta/wp-content/uploads/2019/07/fb-ig-only.png" usemap="#ImgMap1" width="134" class="auto-style1" /></p>
                </div>
		<?php if(get_option($tpl->name . '_template_footer_logo', 'Y') == 'Y') : ?>
		<img src="<?php echo get_template_directory_uri(); ?>/images/gavernwp.png" class="gk-framework-logo" alt="GavernWP" />
		<?php endif; ?>
		
	</footer>
    </section>
    </section>
    </section>
	
	<?php if(gk_is_active_sidebar('social')) : ?>
	<div id="gk-social-icons" class="<?php echo get_option($tpl->name . '_social_icons_position', 'right'); ?>">
		<?php gk_dynamic_sidebar('social'); ?>
	</div>
	<?php endif; ?>
	
	<?php gk_load('social'); ?>
	
	<?php do_action('gavernwp_footer'); ?>
	<?php 
		echo stripslashes(
			htmlspecialchars_decode(
				get_option($tpl->name . '_footer_code', '')
			)
		); 
	?>
	<?php wp_footer(); ?>
    <?php gk_head_style_css(); ?>
	<?php dp_load_css_style(); ?>
   	

</body>
</html>