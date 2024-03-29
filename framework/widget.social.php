<?php
/**
 * 
 * DP Social Widget class
 *
 **/

class DP_Social_Widget extends WP_Widget {
	/**
	 *
	 * Constructor
	 *
	 * @return void
	 *
	 **/
	function DP_Social_Widget() {
		$this->WP_Widget(
			'widget_dp_social_icons', 
			__( 'DP Social Icons', DPTPLNAME ), 
			array( 
				'classname' => 'widget_dp_social_icons', 
				'description' => __( 'Use this widget to show social links', DPTPLNAME) 
			)
		);
		
		$this->alt_option_name = 'widget_dp_social_icons';
	}

	/**
	 *
	 * Outputs the HTML code of this widget.
	 *
	 * @param array An array of standard parameters for widgets in this theme
	 * @param array An array of settings for this widget instance
	 * @return void
	 *
	 **/
	function widget($args, $instance) {
		$cache = wp_cache_get('widget_dp_social_icons', 'widget');
		
		if(!is_array($cache)) {
			$cache = array();
		}

		if(!isset($args['widget_id'])) {
			$args['widget_id'] = null;
		}

		if(isset($cache[$args['widget_id']])) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		//
		extract($args, EXTR_SKIP);
		//
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$fb_link = empty($instance['fb_link']) ? '' : $instance['fb_link'];
		$twitter_link = empty($instance['twitter_link']) ? '' : $instance['twitter_link'];
		$gplus_link = empty($instance['gplus_link']) ? '' : $instance['gplus_link'];
		$rss_link = empty($instance['rss_link']) ? '' : $instance['rss_link'];
		//
		if ($fb_link !== '' || $twitter_link !== '' || $gplus_link !== '' || $rss_link !== '') {
			echo $before_widget;
			echo $before_title;
			echo $title;
			echo $after_title;
			//
			if($fb_link !== '') echo '<a href="'.str_replace('&', '&amp;', $fb_link).'" class="gk-facebook-icon">Facebook</a>';
			if($twitter_link !== '') echo '<a href="'.str_replace('&', '&amp;', $twitter_link).'" class="gk-twitter-icon">Twitter</a>';
			if($gplus_link !== '') echo '<a href="'.str_replace('&', '&amp;', $gplus_link).'" class="gk-gplus-icon">Google+</a>';
			if($rss_link !== '') echo '<a href="'.str_replace('&', '&amp;', $rss_link).'" class="gk-rss-icon">RSS</a>';
			// 
			echo $after_widget;
		}
		// save the cache results
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_dp_social_icons', $cache, 'widget');
	}

	/**
	 *
	 * Used in the back-end to update the module options
	 *
	 * @param array new instance of the widget settings
	 * @param array old instance of the widget settings
	 * @return updated instance of the widget settings
	 *
	 **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['fb_link'] = strip_tags($new_instance['fb_link']);
		$instance['twitter_link'] = strip_tags($new_instance['twitter_link']);
		$instance['gplus_link'] = strip_tags($new_instance['gplus_link']);
		$instance['rss_link'] = strip_tags($new_instance['rss_link']);

		$this->refresh_cache();

		$alloptions = wp_cache_get('alloptions', 'options');
		if(isset($alloptions['widget_dp_social_icons'])) {
			delete_option( 'widget_dp_social_icons' );
		}

		return $instance;
	}

	/**
	 *
	 * Refreshes the widget cache data
	 *
	 * @return void
	 *
	 **/

	function refresh_cache() {
		wp_cache_delete( 'widget_dp_social_icons', 'widget' );
	}

	/**
	 *
	 * Outputs the HTML code of the widget in the back-end
	 *
	 * @param array instance of the widget settings
	 * @return void - HTML output
	 *
	 **/
	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$fb_link = isset($instance['fb_link']) ? esc_attr($instance['fb_link']) : '';
		$twitter_link = isset($instance['twitter_link']) ? esc_attr($instance['twitter_link']) : '';
		$gplus_link = isset($instance['gplus_link']) ? esc_attr($instance['gplus_link']) : '';
		$rss_link = isset($instance['rss_link']) ? esc_attr($instance['rss_link']) : '';
	
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fb_link' ) ); ?>"><?php _e( 'Facebook link:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fb_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fb_link' ) ); ?>" type="text" value="<?php echo esc_attr( $fb_link ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_link' ) ); ?>"><?php _e( 'Twitter link:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_link' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter_link ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'gplus_link' ) ); ?>"><?php _e( 'Google+ link:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'gplus_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'gplus_link' ) ); ?>" type="text" value="<?php echo esc_attr( $gplus_link ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rss_link' ) ); ?>"><?php _e( 'RSS link:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rss_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss_link' ) ); ?>" type="text" value="<?php echo esc_attr( $rss_link ); ?>" />
		</p>
	<?php
	}
}
// EOF