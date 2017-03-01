<?php 
/**
 * Gallery post format
 *
 * @package hedmark
 * @since 	hedmark 1.0
**/ 
?>


<!-- a blog post -->
		  <article id="post-<?php the_ID(); ?>" <?php post_class("col-sm-12 kt-standard"); ?>>
		  <div class="standard-post-inner">	
<?php
if ( function_exists( 'get_field' ))
if( get_field( 'post_upload_gallery' ) ) :  ?>

    <div id="banner-slide">
        <ul class="bjqs">
        <?php
        $images = get_field( 'post_upload_gallery' );
        if ( $images ):
            foreach( $images as $image ):
    		
                if ( !empty ( $image['caption'] ) ) {
                    $alt = $image['caption'];
    			} elseif ( !empty ( $image['alt'] ) ) {
    				$alt = $image['alt'];
                } else {
                    $alt = $image['title'];
                }
    			echo '<li>
    					
    						<img src="' . $image['url'] . '" alt="' . $alt . '" />';
    						if ( $image['caption'] ) {
    						echo '<span class="icon"></span><figcaption class="image-caption">' . $image['caption'] . '</figcaption>';
    						}
    					echo'
    					
    				</li>';
    			
            endforeach;
        endif;
        
        ?>
        </ul>
    </div>

<?php endif; ?>
		   
		  <div class="standard-meta">
		    <?php hedmark_category() ?>
		  </div>	
	
          <h2 class="standard-post-title">
		  <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
		  </h2>
		         
		  <div class="raj-standard-divider"></div>		  
		  <div class="kt-standard-excerpt">
		   <?php the_excerpt(); ?>
		  </div>
		  
		  <div class="text-center">
		  
		  <a href="<?php the_permalink() ?>" class="button button--moema"><?php esc_html_e( 'Learn More', 'hedmark' ); ?></a>
		 
		  </div>
		  
		  <div class="share-date-author">
		  <div class="standard-share">
		  <?php get_template_part ( 'inc/social', 'share' );  ?>
          </div>
		  <div class="standard-date">
		    <span class="date"><?php the_time('jS F, Y') ?></span> 
			<span class="author">
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" rel="author">
			<?php the_author_meta( 'display_name' ); ?>
			</a>
			</span>
		  </div>   
		  
		  
		  
		  </div>
		  <!-- end of share-date-author -->
		  </div>
		  <!-- end of standard-post-inner -->
		  </article>
		  <!-- end of a blog post -->


