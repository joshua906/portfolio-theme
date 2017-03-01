<?php
/*
 * Plugin Name: Image Banner
 * Plugin URI: http://www.khalilthemes.com
 * Description: Widget to show banner ad from image
 * Version: 1.0
 * Author: Khalil Themes
 * Author URI: http://www.khalilthemes.com
 */

class KT_Image_Banner extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'kt_image_banner', // Base ID
			esc_html__( 'KT Image Banner', 'hedmark' ), // Name
			array( 'description' => esc_html__( 'Add image banner 300x300, 300x250 or 250x250', 'hedmark' ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Image Banner' );
		$banner_url = isset( $instance['banner_url'] ) ? esc_url( $instance['banner_url'] ) : '';
		$banner_link = isset( $instance['banner_link'] ) ? esc_url( $instance['banner_link'] ) : '';
		$hide_title = isset( $instance['hide_title'] ) ? $instance['hide_title'] : false;
		
		echo $before_widget;
			
		if ( ! $hide_title )
		if ( $title ) echo $before_title . $title . $after_title;
        ?>
        <div class="banner-widget">
        <a href="<?php echo $banner_link; ?>" rel="nofollow" target="_blank">
        	<img src="<?php echo $banner_url; ?>" alt="Ad" />
        </a>
        </div>   
	    <?php 
		echo $after_widget;
		
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();

		/* Strip tags to remove HTML. For text inputs and textarea. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['banner_url'] = strip_tags( $new_instance['banner_url'] );
		$instance['banner_link'] = strip_tags( $new_instance['banner_link'] );
		$instance['hide_title'] = $new_instance['hide_title'];
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Image Banner',
			'banner_url' => 'http://',
			'banner_link' => '#',
			'hide_title' => false
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'hedmark'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'banner_url' ); ?>"><?php esc_html_e('Image Banner URL:', 'hedmark'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'banner_url' ); ?>" name="<?php echo $this->get_field_name( 'banner_url' ); ?>" value="<?php echo esc_url( $instance['banner_url'] ); ?>" class="widefat" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'banner_link' ); ?>"><?php esc_html_e('Image Banner Link:', 'hedmark'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'banner_link' ); ?>" name="<?php echo $this->get_field_name( 'banner_link' ); ?>" value="<?php echo esc_url( $instance['banner_link'] ); ?>" class="widefat" />
		</p>
        <p>
			<input class="checkbox" type="checkbox" <?php if( $instance['hide_title'] == true ) echo 'checked'; ?> id="<?php echo $this->get_field_id( 'hide_title' ); ?>" name="<?php echo $this->get_field_name( 'hide_title' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'hide_title' ); ?>"><?php esc_html_e( 'Do not display the title', 'hedmark' ); ?></label>
		</p>
	<?php
	}

}
register_widget( 'KT_Image_Banner' );