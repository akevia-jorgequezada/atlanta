<?php
/**
 * 
 * DP Recent Portfolio Widget class
 *
 **/

class DP_Recent_Port_Grid_Widget extends WP_Widget {
	/**
	 *
	 * Constructor
	 *
	 * @return void
	 *
	 **/
	function DP_Recent_Port_Grid_Widget() {
		$this->WP_Widget(
			'widget_dp_recent_port_grid', 
			__( 'DP Recent Portfolio Grid', DPTPLNAME ), 
			array( 
				'classname' => 'widget_dp_recent_port_grid', 
				'description' => __( 'Use this widget to show recent portfolio items in thumbnail grid form', DPTPLNAME) 
			)
		);
		
		$this->alt_option_name = 'widget_dp_recent_port_grid';
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
		$cache = wp_cache_get('widget_dp_recent_port_grid', 'widget');
		
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
		$show_num = empty($instance['$show_num']) ? '' : $instance['$show_num'];
		$word_limit = empty($instance['$word_limit']) ? '' : $instance['$word_limit'];
		$columns = empty($instance['$columns']) ? '' : $instance['$columns'];

		//
		
		
			echo $before_widget;
			echo $before_title;
			echo $title;
			echo $after_title;
			//
			echo dp_print_recent_projects_grid(8,292,15);
			// 
			echo $after_widget;
		// save the cache results
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_dp_recent_port_grid', $cache, 'widget');
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
		$instance['$show_num'] = strip_tags($new_instance['$show_num']);
		$instance['$word_limit'] = strip_tags($new_instance['$word_limit']);
		$instance['$columns'] = strip_tags($new_instance['$columns']);
		$this->refresh_cache();

		$alloptions = wp_cache_get('alloptions', 'options');
		if(isset($alloptions['widget_dp_recent_port_grid'])) {
			delete_option( 'widget_dp_recent_port_grid' );
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
		wp_cache_delete( 'widget_dp_recent_port_grid', 'widget' );
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
		$show_num = isset($instance['$show_num']) ? esc_attr($instance['$show_num']) : '';
		$word_limit = isset($instance['$word_limit']) ? esc_attr($instance['$word_limit']) : '';
		$columns = isset($instance['$columns']) ? esc_attr($instance['$columns']) : '';
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
				
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( '$show_num' ) ); ?>"><?php _e( 'Item count:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( '$show_num' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( '$show_num' ) ); ?>" type="text" value="<?php echo esc_attr( $show_num ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( '$columns' ) ); ?>"><?php _e( 'Thumbnail width (px):', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( '$columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( '$columns' ) ); ?>" type="text" value="<?php echo esc_attr( $columns ); ?>" />
            <span style="font-size:9px; font-style:italic;color:#666">we suggest 292px for 4 column view by full width page and 290px for 3 columns on page with sidebar</span>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( '$word_limit' ) ); ?>"><?php _e( 'Word limit in excerpt:', DPTPLNAME ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( '$word_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( '$word_limit' ) ); ?>" type="text" value="<?php echo esc_attr( $word_limit ); ?>" />
		</p>
	<?php
	}
}
// EOF