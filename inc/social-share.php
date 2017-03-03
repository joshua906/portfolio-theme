<?php
/**
 * Social share for grid, list, standard posts
 *
 * @package hedmark
 * @since 	hedmark 1.0
**/
?>
 
		    <ul class="standard-social-icons">
			
			  <li class="share-text"><?php esc_html_e( 'Share:', 'hedmark' ); ?></li>
			  
		      <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php esc_html(the_title()); ?>" target="blank"><i class="fa fa-facebook"></i></a></li>
			  
		      <li><a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php esc_html(the_title()); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?><?php echo isset( $twitter_user ) ? '&amp;via='.$twitter_user : ''; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			  
		      <li><a href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			  
		      <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php esc_html(the_title()); ?>&amp;source=<?php bloginfo( 'name' ); ?>"><i class="fa fa-linkedin"></i></a></li>
			  
		      <li><a href="mailto:?subject=<?php esc_html(the_title()); ?>&amp;body=<?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
			  
		   </ul>