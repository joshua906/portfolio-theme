<?php
/*
 * Plugin Name: About Me
 * Plugin URI: http://www.khalilthemes.com
 * Description: A widget to show information about me
 * Version: 1.0
 * Author: Khalil Themes
 * Author URI: http://www.khalilthemes.com
 */
 
/**
 * Register the Widget
 */
class KT_About_Me extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'kt-about-me', // Base ID
			esc_html__( 'KT About Me', 'hedmark' ), // Name
			array( 'description' => esc_html__( 'Write about yourself with some texts and your picture', 'hedmark' ), ) // Args
		);
		
	}
	
	public function widget($args, $instance) {

		extract($args);

		$title = apply_filters('widget_title', isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'About Me' );
		$personal_image = isset( $instance['personal_image'] );

		if (function_exists('icl_translate')) { // If WPML is installed
			$about_you = icl_translate('hedmark', "about_you", $instance['about_you']); 
		} else {
			$about_you = $instance['about_you'];
		}

		echo $before_widget;
	
			if ( $title ) echo $before_title . $title . $after_title;
			
			// Display your Image
			if ( !empty ( $instance['personal_image'] ) ) {
				printf( '<img src="%s" alt="%s" />', esc_url( $instance['personal_image'] ), get_bloginfo( 'name' ) );
			}
			
			// Text about you
			if ( !empty ( $about_you ) ) {
				printf( '%s', wpautop( $about_you ) );
			}
			
		echo $after_widget;

	}
	

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	

	public function form($instance) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'About Me',
			'personal_image' => '',
			'about_you' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Name or Title', 'hedmark'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        <p>
        	<label for="<?php echo $this->get_field_id('personal_image'); ?>"><?php esc_html_e('Image URL', 'hedmark'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('personal_image'); ?>" name="<?php echo $this->get_field_name('personal_image'); ?>" value="<?php echo $instance['personal_image']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('about_you'); ?>"><?php esc_html_e('Short text about the site', 'hedmark'); ?>:</label>
			<textarea id="<?php echo $this->get_field_id('about_you'); ?>" name="<?php echo $this->get_field_name('about_you'); ?>" class="widefat" style="height:80px;"><?php echo $instance['about_you']; ?></textarea>
        </p>
		
		<?php
		
	}
}
register_widget( 'KT_About_Me' );