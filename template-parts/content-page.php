<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hedmark
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
        if ( has_post_thumbnail() ) {
            $hedmark_page_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hedmark-big-size' );
            $hedmark_page_bg_image = 'style="background-image:url(' . $hedmark_page_image_url[0] . ');"';
            $hedmark_title_with_bg = 'title-with-bg';
        } else {
            $hedmark_title_with_bg = 'kt-title-bg';
        } 
	?>

	<header class="entry-header <?php echo isset( $hedmark_title_with_bg ) ? $hedmark_title_with_bg : ''; ?>" <?php echo isset( $hedmark_page_bg_image ) ? $hedmark_page_bg_image : ''; ?>" kt-overlay>
	<div class="kt-overlay">
	<?php the_title( '<h1 class="kt-entry-title">', '</h1>' ); ?>
	</div>
	</header> <!-- .entry-header -->
	
	
	  <!-- Start of main Content -->
		<div class="col-md-12">
          
		  <div class="row">
		  
	        <div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hedmark' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	</div>
	</div>
</article><!-- #post-## -->
