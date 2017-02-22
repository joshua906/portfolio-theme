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

	<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
			
			
			<div class="blog-layout">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
						<?php get_template_part('content',get_post_format()); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile;
		
	endif;
			
	?>


<?php get_footer(); ?>