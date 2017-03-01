<?php
/*
 * Plugin Name: Latest Posts
 * Plugin URI: http://www.khalilthemes.com
 * Description: Widget to show latest posts
 * Version: 1.0
 * Author: Khalil Themes
 * Author URI: http://www.khalilthemes.com
 */

class KT_Latest_Posts extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'kt_latest_posts', // Base ID
			esc_html__( 'KT Latest Posts', 'hedmark' ), // Name
			array( 'description' => esc_html__( 'Show All latest posts', 'hedmark' ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Latest Posts' );
		$items_num = isset( $instance['items_num'] ) ? esc_attr( $instance['items_num'] ) : '3';
		
		/** 
		 * Latest Posts
		**/
		global $post;
		$kt_latest_posts = new WP_Query(
			array(
				'post_type' => 'post',
				'posts_per_page' => $items_num,
				'post__not_in' => array( $post->ID ),
				'ignore_sticky_posts' => 1
			)
		);
		
        if ( $kt_latest_posts->have_posts() ):

			echo $before_widget;
            if ( $title ) echo $before_title . $title . $after_title;
            ?>



                <ul class="recent-post">

                    <?php while ( $kt_latest_posts->have_posts() ) : $kt_latest_posts->the_post(); ?>
                    
                    	<li>
							  <a href="<?php the_permalink(); ?>">
							 
							 <?php if ( has_post_thumbnail() ) { ?>
	                              <?php the_post_thumbnail( 'hedmark-rectangle-size' ); ?>
	                        <?php } elseif( hedmark_first_post_image() ) { // Set the first image from the editor ?>
	                        	<img src="<?php echo hedmark_first_post_image(); ?>" class="wp-post-image" alt="<?php the_title(); ?>" />
							<?php } ?>
							  </a>
							  <div class="latest-post-text">
							    <div class="latest-post-inner">
							      <h4>
							      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							      </h4>
							  
							      <span class="date"><?php the_time('jS F, Y') ?></span>
							    </div>
							  </div>
							</li>

                    <?php endwhile; ?>
                    
                </ul>
           

            <?php
            echo $after_widget;
			wp_reset_postdata();
    
		endif;
		
	}
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();

		/* Strip tags to remove HTML. For text inputs and textarea. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['items_num'] = strip_tags( $new_instance['items_num'] );
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Latest Posts',
			'items_num' => '3',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'hedmark'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'items_num' ); ?>"><?php esc_html_e('Maximum posts to show:', 'hedmark'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'items_num' ); ?>" name="<?php echo $this->get_field_name( 'items_num' ); ?>" value="<?php echo $instance['items_num']; ?>" size="1" />
		</p>
	<?php
	}

}
register_widget( 'KT_Latest_Posts' );