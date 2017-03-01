<?php
/*
 * Plugin Name: Social Follow
 * Plugin URI: http://www.khalilthemes.com
 * Description: A follow me widget with social icons
 * Version: 1.0
 * Author: Khalil Themes
 * Author URI: http://www.khalilthemes.com
 */
 
/**
 * Register the Widget
 */
class KT_Social_follow extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'kt-social-follow', // Base ID
			esc_html__( 'KT Social Follow', 'hedmark' ), // Name
			array( 'description' => esc_html__( 'Put your social profile links to follow', 'hedmark' ), ) // Args
		);
		
	}

	function kt_sp_array( $instance = array() ) {

		return array(
			'facebook' => array(
				'title' => esc_html__('Facebook', 'hedmark'),
				'class' => 'facebook',
			),
			'twitter' => array(
				'title' => esc_html__('Twitter', 'hedmark'),
				'class' => 'twitter',
			),
			'google' => array(
				'title' => esc_html__('Google+', 'hedmark'),
				'class' => 'google-plus',
			),
			'linkedin' => array(
				'title' => esc_html__('LinkedIn', 'hedmark'),
				'class' => 'linkedin',
			),
			'instagram' => array(
				'title' => esc_html__('Instagram', 'hedmark'),
				'class' => 'instagram',
			),
			'youtube' => array(
				'title' => esc_html__('YouTube', 'hedmark'),
				'class' => 'youtube',
			),
			'vimeo' => array(
				'title' => esc_html__('Vimeo', 'hedmark'),
				'class' => 'vimeo',
			),
			'behance' => array(
				'title' => esc_html__('Behance', 'hedmark'),
				'class' => 'behance',
			),
			'dribbble' => array(
				'title' => esc_html__('Dribbble', 'hedmark'),
				'class' => 'dribbble',
			),
			'pinterest' => array(
				'title' => esc_html__('Pinterest', 'hedmark'),
				'class' => 'pinterest',
			),
			'tumblr' => array(
				'title' => esc_html__('Tumblr', 'hedmark'),
				'class' => 'tumblr',
			),
			'flickr' => array(
				'title' => esc_html__('Flickr', 'hedmark'),
				'class' => 'flickr',
			),
			'soundcloud' => array(
				'title' => esc_html__('Sound Cloud', 'hedmark'),
				'class' => 'soundcloud',
			),
			'apple' => array(
				'title' => esc_html__('Apple', 'hedmark'),
				'class' => 'apple',
			),
			'android' => array(
				'title' => esc_html__('Android', 'hedmark'),
				'class' => 'android',
			),
			'windows' => array(
				'title' => esc_html__('Windows', 'hedmark'),
				'class' => 'windows',
			),
			'rssurl' => array(
				'title' => esc_html__('RSS URL', 'hedmark'),
				'class' => 'feed',
			),
		);
	}
	

	public function widget($args, $instance) {

		extract($args);

		$title = apply_filters('widget_title', isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Follow Me' );
		$new_window = isset( $instance['new_window'] ) ? 'target="_blank"' : false;
		$center_icons = isset( $instance['center_icons'] ) ? ' social-center' : false;

		echo $before_widget;
	

			if ( $title ) echo $before_title . $title . $after_title;
			
			// Display the social links
			echo '<ul class="kt-social-icons' . $center_icons . ' clearfix">';
			foreach ( $this->kt_sp_array( $instance ) as $key => $data ) {
				if ( !empty ( $instance[$key] ) ) {
					printf( '<li><a href="%s" aria-hidden="true" class="fa fa-%s" %s></a></li>', esc_url( $instance[$key] ), esc_attr( $data['class'] ), $new_window );
				}
			}
			echo '</ul>';
			

		echo $after_widget;

	}
	

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	

	public function form($instance) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Follow Me',
			'facebook' => '',
			'twitter' => '',
			'google' => '',
			'linkedin' => '',
			'instagram' => '',
			'youtube' => '',
			'vimeo' => '',
			'behance' => '',
			'dribbble' => '',
			'pinterest' => '',	
			'tumblr' => '',
			'flickr' => '',
			'soundcloud' => '',
			'apple' => '',
			'android' => '',
			'windows' => '',
			'rssurl' => '',
			'center_icons' => false,
			'new_window' => false,
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'hedmark'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        <p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'center_icons' ); ?>" name="<?php echo $this->get_field_name( 'center_icons' ); ?>" <?php if( $instance['center_icons'] == true ) echo 'checked'; ?> /> 
			<label for="<?php echo $this->get_field_id( 'center_icons' ); ?>"><?php esc_html_e('Center the social icons', 'hedmark'); ?></label>
        </p>
        <p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'new_window' ); ?>" name="<?php echo $this->get_field_name( 'new_window' ); ?>" <?php if( $instance['new_window'] == true ) echo 'checked'; ?> /> 
			<label for="<?php echo $this->get_field_id( 'new_window' ); ?>"><?php esc_html_e('Open social links in new window', 'hedmark'); ?></label>
        </p>
		
		<?php foreach ( $this->kt_sp_array( $instance ) as $key => $data ) { ?>
		<p>
			<label for="<?php echo $this->get_field_id($key); ?>"><?php echo $data['title']; ?></label>
			<input type="text" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>" value="<?php echo esc_url($instance[$key]); ?>" class="widefat" />
		</p>
        <?php }
		
	}
}
register_widget( 'KT_Social_follow' );