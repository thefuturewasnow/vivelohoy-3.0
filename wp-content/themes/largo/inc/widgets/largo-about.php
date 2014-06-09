<?php
/*
 * About this site
 */
class largo_about_widget extends WP_Widget {

	function largo_about_widget() {
		$widget_ops = array(
			'classname' 	=> 'largo-about',
			'description'	=> __('Show the site description from your theme options page', 'largo')
		);
		$this->WP_Widget( 'largo-about-widget', __('Largo About Site', 'largo'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('About ' . get_bloginfo('name'), 'largo') : $instance['title'], $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title; ?>

			<?php if ( of_get_option( 'site_blurb' ) ) : ?>
                <p><?php echo of_get_option( 'site_blurb' ); ?></p>
			<?php else: ?>
    			<p class="error"><strong><?php _e('You have not set a description for your site.</strong> Add a site description by visiting the Largo Theme Options page.', 'largo'); ?></p>
        	<?php endif; // end about site ?>

		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => __('About ' . get_bloginfo('name'), 'largo') );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'largo'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>
	<?php
	}
}