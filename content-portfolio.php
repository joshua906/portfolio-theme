
<!--

<h3><?php the_title(sprintf('<a href="%s">', esc_url( get_permalink() ) ),'</a>'); ?></h3></a>
<div class="thumbnail-img"><?php the_post_thumbnail('large'); ?></div>
<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
<p>content portfolio</p>
<p><?php the_content(); ?></p>

<hr>
-->


					
						  <div class="grid-image">
						 
							<figure class="effect-bubba">
						
								 <?php the_post_thumbnail(); ?> 
								<figcaption>
									<h2><!--<?php the_title(sprintf('<a href="%s">', esc_url( get_permalink() ) ),'</a>'); ?>--></h2>
									<p><?php the_title(sprintf('<a href="%s">', esc_url( get_permalink() ) ),'</a>'); ?></p>
									<a href="<?php the_permalink(); ?>">View more</a>
								</figcaption>			
							</figure>
							
						  </div>
						
					