<?php
/*
 * Plugin Name: Facebook Like Box Widget
 * Plugin URI: http://www.khalilthemes.com
 * Description: Widget to show facebook like box
 * Version: 1.0
 * Author: Khalil Themes
 * Author URI: http://www.khalilthemes.com
 */
if ( ! class_exists( 'LUCYMONI_WP_Widget_facebook_box' ) ) {

    class LUCYMONI_WP_Widget_facebook_box extends WP_Widget {

    	function __construct() {
    		$widget_ops = array('classname' => 'facebook-box-widget', 'description' =>  "Facebook Like Box" );
    		parent::__construct('facebook-box', 'KT Facebook Box', $widget_ops);
    		$this->alt_option_name = 'widget_facebook_box';

    		add_action( 'save_post', array($this, 'flush_widget_cache') );
    		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
    		add_action( 'switch_theme', array($this, 'flush_widget_cache') );

    		// Only load javascript if widget is active
    		if (is_active_widget('','','facebook-box')) {
    			add_action( 'wp_footer', array($this,'lucymoni_fb_box' ));
    		}

    	}

    	function widget($args, $instance) {
    		$cache = wp_cache_get('widget_facebook_box', 'widget');

    		if ( !is_array($cache) )
    			$cache = array();

    		if ( ! isset( $args['widget_id'] ) )
    			$args['widget_id'] = $this->id;

    		if ( isset( $cache[ $args['widget_id'] ] ) ) {
    			echo $cache[ $args['widget_id'] ];
    			return;
    		}

    		ob_start();
    		extract($args);

            $title = empty($instance['title']) ? '' : $instance['title'];
    		$this->appid = empty($instance['appid']) ? '' : $instance['appid'];
    		$page = empty($instance['page']) ? '' : $instance['page'];
            $page = 'http://www.facebook.com/' . $page;
    		echo $before_widget;

            if ( $title ) {
                echo $before_title . esc_html( $title ) . $after_title;
            }
    ?>
    		   <div class="fb-like-box clearfix"
                	data-href="<?php echo esc_url( $page ); ?>"
                    data-colorscheme="light"
                	data-width="320"
                	data-show-faces="true"
                	data-stream="false"
                	data-header="false"
                	data-border-color="#fff">
               </div>

    <?php
    		echo $after_widget;

    		$cache[$args['widget_id']] = ob_get_flush();
    		wp_cache_set('widget_facebook_box', $cache, 'widget');
    	}

    	function update( $new_instance, $old_instance ) {
    		$instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);

    		$instance['appid'] = strip_tags($new_instance['appid']);
    		$instance['page'] = strip_tags($new_instance['page']);
    		$this->flush_widget_cache();

    		$alloptions = wp_cache_get( 'alloptions', 'options' );
    		if ( isset($alloptions['widget_facebook_box']) )
    			delete_option('widget_facebook_box');

    		return $instance;

    	}

    	function lucymoni_fb_box() {
    		 if (!isset($this->appid)) { $this->appid = NULL; }

             $cb_site_locale = get_locale();

    		  echo '<div id="fb-root"></div>
    				  <script>
    				  	  (function(d, s, id) {
    					  var js, fjs = d.getElementsByTagName(s)[0];
    					  if (d.getElementById(id)) return;
    					  js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/' . $cb_site_locale . '/all.js#xfbml=1";
    						fjs.parentNode.insertBefore(js, fjs);
    					  }(document, \'script\', \'facebook-jssdk\'));
    				</script>';
    	}

    	function flush_widget_cache() {
    		wp_cache_delete('widget_facebook_box', 'widget');
    	}

    	function form( $instance ) {
            $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    		$appid = isset( $instance['appid'] ) ? esc_attr( $instance['appid'] ) : '';
    		$page = isset( $instance['page'] ) ? esc_attr( $instance['page'] ) : '';

    ?>
    		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title:</label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

            <p><label for="<?php echo esc_attr( $this->get_field_id( 'appid' ) ); ?>">App ID: (You can get one from https://developers.facebook.com/)</label>
    		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'appid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'appid' ) ); ?>" type="text" value="<?php echo esc_attr( $appid ); ?>" /></p>

            <p><label for="<?php echo esc_attr( $this->get_field_id( 'page' ) ); ?>">Page name: (Without http://www.facebook.com/)</label>
    		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page' ) ); ?>" type="text" value="<?php echo esc_attr( $page ); ?>" /></p>

    <?php
    	}
    }
}

if ( ! function_exists( 'lucymoni_facebook_box_loader' ) ) {
    function lucymoni_facebook_box_loader () {
        register_widget( 'LUCYMONI_WP_Widget_facebook_box' );
    }
    add_action( 'widgets_init', 'lucymoni_facebook_box_loader' );
}
?>