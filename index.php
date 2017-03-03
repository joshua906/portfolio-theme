<?php 

global $hedmark_option;

get_header(); ?>
<!-- blog header -->
<div class="main-hero">
			<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="">

						<h1 class="small-font-family module">Insight and News</h1>
						

					</div>
				</div>
			</div>
			</div>
		</div>

	
			<div class="blog-layout">
				<div class="container">
	
					<div class="row">
						<div class="col-md-8">
	<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
						<?php get_template_part('content',get_post_format()); ?>
						
						
						
	
			<?php endwhile;
		
	endif;
			
	?>
						</div>
						
							<?php get_sidebar(); ?>
					</div>
	
				</div>
			</div>



<?php get_footer(); ?>