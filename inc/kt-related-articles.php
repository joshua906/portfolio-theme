<?php 
/**
 * Related articles after author box
 *
 * @package hedmark
 * @since 	hedmark 1.0
**/ 
?>

<div class="kt-related-articles">
<h2 class="kt-related-post-title">
<?php esc_html_e( 'You might read these too', 'hedmark') ?>
</h2>	
<?php
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>
<div class="kt-related-item">
<a href="<?php the_permalink(); ?>">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'hedmark-related-size' );
							} elseif( hedmark_first_post_image() ) { // Set the first image from the editor
								echo esc_url('<img src="' . hedmark_first_post_image() . '" class="wp-post-image" />');
							} ?>
						  </a>
<div class="kt-related-heading">
<a href="<?php the_permalink() ?>"><?php esc_html(the_title()); ?></a>
<span class="date"><?php the_time('jS F, Y') ?></span>
</div>
<!-- end of KT related heading -->
</div>
<!-- end of KT related item -->
<?php
}
wp_reset_postdata();

?>
</div>