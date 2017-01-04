<?php get_header(); ?>


	<div class="container">
    			<div class="row" id="ms-container">
  
    		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
	        	<div class="ms-item col-xs-12 col-sm-6 col-md-6 col-lg-6">
	        	
					<p></p>
	                        <h4><?php the_title(); ?></h4>
	                        <p><?php the_excerpt(); ?></p>
	                      
	                    </div>
	                 </div>
	            </div>
	           
            <?php endwhile; 

            ?>
			<?php endif; 

			?>
        </div>
    </div>



<?php get_footer(); ?>