<?php 
/**
 * Author Box for single post
 *
 * @package matthews portfolio
 * @since 	version 1.0
**/ 
?>


<div class="kt-single-author-box">

			<div id="author-bio">
                <div class="avatar">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                		<?php echo get_avatar( get_the_author_meta( 'email' ), '150' ); ?>
                    </a>
                </div><!-- .avatar -->
                <div class="author-info" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
                    <span class="vcard author">
                        <span class="fn"> 
                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" rel="author" itemprop="url">
                                <span itemprop="name"><?php the_author_meta( 'display_name' ); ?></span>
                            </a>
                        </span>
                    </span> 
                </div><!-- .info -->
                <ul class="author-social">
				
				    <?php if ( get_the_author_meta( 'spfacebook' ) != '' ) { ?>
                        <li>
                            <a class="facebook-link" href="http://facebook.com/<?php echo wp_kses( get_the_author_meta( 'spfacebook' ), null ); ?>">
                              <i class="fa fa-facebook"></i>  <?php printf( esc_attr__( '', 'hedmark'), get_the_author() ); ?>
                            </a>
                        </li>
                    <?php } ?>
					
					<?php if ( get_the_author_meta( 'sptwitter' ) != '' ) { ?>
                        <li>
                            <a class="twitter-link" href="https://twitter.com/<?php echo wp_kses( get_the_author_meta( 'sptwitter' ), null ); ?>">
                                <i class="fa fa-twitter"></i> <?php printf( esc_attr__( '', 'hedmark'), get_the_author() ); ?>
                            </a>
                        </li>
                    <?php } ?>
					
					<?php if ( get_the_author_meta( 'spinstagram' ) != '' ) { ?>
                        <li>
                            <a class="instagram-link" href="http://instagram.com/<?php echo wp_kses( get_the_author_meta( 'spinstagram' ), null ); ?>">
                              <i class="fa fa-instagram"></i>  <?php printf( esc_attr__( '', 'hedmark'), get_the_author() ); ?>
                            </a>
                         </li>
                    <?php } ?>
					
					 <?php if ( get_the_author_meta( 'spgoogle' ) != '' ) { ?>
                        <li>
                            <a class="google-link" href="http://plus.google.com/<?php echo wp_kses( get_the_author_meta( 'spgoogle' ), null ); ?>?rel=author">
                                <i class="fa fa-google-plus"></i> <?php printf( esc_attr__( '', 'hedmark'), get_the_author() ); ?>
                            </a>
                        </li>
                    <?php } ?>
					
					 <?php if ( get_the_author_meta( 'splinkedin' ) != '' ) { ?>
                        <li>
                            <a class="linkedin-link" href="http://linkedin.com/in/<?php echo wp_kses( get_the_author_meta( 'splinkedin' ), null ); ?>">
                              <i class="fa fa-linkedin"></i>  <?php printf( esc_attr__( '', 'hedmark'), get_the_author() ); ?>
                            </a>
                         </li>
                    <?php } ?>
					
					<?php if ( get_the_author_meta( 'user_url' ) != '' ) { ?>
                        <li>
                            <a target="_blank" class="user-url" href="<?php echo wp_kses( get_the_author_meta( 'user_url' ), null ); ?>">
                               <i class="fa fa-link"></i> <?php printf( esc_attr__( '', 'hedmark'), get_the_author() ); ?>
                            </a>
                        </li>
                    <?php } ?>
                     
                </ul><!-- .author-social -->
				<div class="about-author">
				   <p itemprop="description"><?php the_author_meta( 'description' ); ?> </p>

				</div> <!--  end of about-author -->
				
            </div><!-- #author-bio -->
			
     
    
</div><!-- author box -->