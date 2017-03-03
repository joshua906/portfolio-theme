<?php 
global $hedmark_option;

get_header(); ?>
	<div class="main-hero">
		<div class="container-post">
		<div class="col-md-12">
          
		  <div class="row">
		  
		<?Php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	       <article id="post-<?php the_ID(); ?>" <?php post_class("col-sm-12 kt-standard"); ?>>
		      <div class="standard-post-inner">	

		<?php
                    if ( ! get_post_format() ): // Standard
                        get_template_part( 'kt-formats/format', 'standard' );
                    elseif ( 'gallery' == get_post_format() ): // Gallery
                        get_template_part( 'kt-formats/format', 'gallery' );
                    elseif ( 'video' == get_post_format() ): // Video
                        get_template_part( 'kt-formats/format', 'video' );
                    elseif ( 'audio' == get_post_format() ): // Audio
                        get_template_part( 'kt-formats/format', 'audio' );
                    endif;
		?>
		
		<?php endwhile; endif; ?>
		
		<div class="single-articles">

          <h2 class="single-post-title"><?php esc_html(the_title()); ?></h2>
		  <div class="single-article-meta">
		    <span class="date"><?php the_time('jS F, Y') ?></span> 
			<span class="author"><?php esc_html_e( 'by', 'hedmark' ); ?>
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" rel="author">
			<?php the_author_meta( 'display_name' ); ?>
			</a>
			</span>
		  </div>   
		  
		  <div class="kt-single-content">
		   <?php esc_html(the_content()); ?>
		   
		  </div>
		  
		  <?php get_template_part ( 'inc/single', 'share' );  ?>    
		  <!-- end of single share -->

		    </div> <!-- end of single article style -->
			<?php wp_link_pages(); ?>
		  </div>
		  <!-- end of standard-post-inner -->
		  
		   
			<?php 
			 //  Author Box
            if( $hedmark_option['author_box'] == true ) {
				 get_template_part( 'inc/kt-author', 'box' );
			   }
             ?>
			
			<?php 
		
		    //  Related Articles
		       if( $hedmark_option['related_posts'] == true ) {
                   get_template_part( 'inc/kt-related', 'articles' );
              }
			?>
		 
        <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
          </article>
		  <!-- end of a blog post -->
	
      </div> <!-- end of row -->
    </div>  <!-- end of main page content's container -->
</div>
</div>
<?php get_footer(); ?>