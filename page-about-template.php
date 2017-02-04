<?php 

/*
	
	Template Name: About Page Template
	
*/

get_header(); ?>

 <?php if ( have_posts() ): ?>
  	<?php while ( have_posts() ) : the_post(); ?>
	<!-- Home header -->
		<div class="main-hero">
			<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="content-heading">
						<h1 class="small-font-family module"><?php the_title(); ?></h1>
						
					</div>
				</div>
			</div>
			</div>
		</div>
<!-- about me -->
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p><?php the_content(); ?> </p>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
</div>
		
				  <?php endwhile; 

            ?>
			<?php endif; 

			?>

	
<?php get_footer(); ?>