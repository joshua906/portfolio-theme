<?php get_header(); ?>



  <?php if ( have_posts() ): ?>
  	<?php while ( have_posts() ) : the_post(); ?>
  	<div class="main-hero">
			<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="">
					
						<h1 class="small-font-family big"><?php the_title(); ?></h3>
						<p><?php the_content(); ?></p>
						
					</div>
				</div>
			</div>
			</div>
		</div>
		  <?php endwhile; 

            ?>
			<?php endif; 

			?>
	<div class="project-info">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="col-md-6">
						<h5>Client</h5>
						<p>Business Access Marketing</p>
					</div>
					<div class="col-md-6">
						<h5>Role</h5>
						<p>UI/UX Design and Front End Development</p>
						<h5>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="project-info">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="col-md-6">
						<h5>Client</h5>
						<p>Business Access Marketing</p>
					</div>
					<div class="col-md-6">
						<h5>Role</h5>
						<p>UI/UX Design and Front End Development</p>
						<h5>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--  Hpog image -->
	  <div class="responsive-images">
		  <div class="container">
			  <div class="row">
				  <div class="col-md-12 text-center">
		  		<img src="<?php echo get_template_directory_uri(); ?>/img/hpog.png" width="1000" height="568" alt=""/> </div>
			  </div>
		  </div>
	  </div>
<?php get_footer(); ?>