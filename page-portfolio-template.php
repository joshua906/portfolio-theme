<?php 

/*
	
	Template Name: Portfolio Template
	
*/

get_header(); ?>


	<!-- Home header -->
		<div class="main-hero">
			<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="content-heading">
						<h1 class="font-family">A collection of my most Recent work</h1>
						<h4></h4>
					</div>
				</div>
			</div>
			</div>
		</div>
<!-- the work -->
<div class="portfolio-work">
				
		<div class="container">
		
			  <!-- width of .grid-sizer used for columnWidth -->
			<div class="row" id="ms-container">	 
			<div class="ms-item col-xs-12 col-md-6">
				  <div class="" >
				   <div class="">
					  <div class="grid-item">
					  
					  <div class="grid-image">
						<figure class="effect-bubba">
							<img src="<?php echo get_template_directory_uri(); ?>/img/black-image.jpg" width="600" height="450" alt=""/>
							<figcaption>
								<h2> <span></span></h2>
								<p>Website ReDesign</p>
								<a href="#">View more</a>
							</figcaption>			
						</figure>
					  </div>
					  
					 </div>
				  </div>
				</div>
				</div>
			<div class="ms-item col-xs-12 col-md-6">
				  <div class="">
				   <div class="">
					  <div class="grid-item">
					  	<div class="grid-image">
						<figure class="effect-bubba">
							<img src="<?php echo get_template_directory_uri(); ?>/img/tall-black.jpg" width="600" height="700" alt=""/>
							<figcaption>
								<h2><span></span></h2>
								<p> Microsite</p>
								<a href="#">View more</a>
							</figcaption>			
						</figure>
					  </div>
					  
					  </div>
				  </div>
				</div>
			</div>
		
		
					  <!-- width of .grid-sizer used for columnWidth -->
	 
			<div class="ms-item col-xs-12 col-md-6">
				  <div class="" >
				   <div class="">
					  <div class="grid-item">
					  
					  <div class="grid-image">
						<figure class="effect-bubba">
							<img src="<?php echo get_template_directory_uri(); ?>/img/black-image.jpg" width="600" height="700" alt=""/>
							<figcaption>
								<h2> <span></span></h2>
								<p>Website ReDesign</p>
								<a href="#">View more</a>
							</figcaption>			
						</figure>
					  </div>
					  
					 </div>
				  </div>
				</div>
				</div>
			<div class="ms-item col-xs-12 col-md-6">
				  <div class="">
				   <div class="">
					  <div class="grid-item">
					  	<div class="grid-image">
						<figure class="effect-bubba">
							<img src="<?php echo get_template_directory_uri(); ?>/img/black-image.jpg" width="600" height="600" alt=""/>
							<figcaption>
								<h2><span></span></h2>
								<p> Microsite</p>
								<a href="#">View more</a>
							</figcaption>			
						</figure>
					  </div>
					  
					  </div>
				  </div>
				</div>
			</div>
		</div>

		</div>
		</div>
		
		
<div class="container">
<?php 
		
	$args = array('post_type' => 'portfolio', 'post_per_page' => 3 );
	$loop = new WP_Query( $args );
	
	if( $loop->have_posts() ):
		
		while( $loop->have_posts() ): $loop->the_post(); ?>
			
			<?php get_template_part('content-portfolio', 'archive'); ?>
		
		<?php endwhile;
		
	endif;
			
	?>
</div>
	
<?php get_footer(); ?>