<?php get_header(); ?>
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
	<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
					<div class="row">
						<div class="col-md-6">
						<?php get_template_part('content',get_post_format()); ?>
						</div>
					</div>

			<?php endwhile;
		
	endif;
			
	?>
				</div>
			</div>



<?php get_footer(); ?>