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
						<h1 class="small-font-family">Detaile descritions of how I <b>solved problems</b> for clients</h1>
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
			
			<?php 

				$args = array('post_type' => 'portfolio', 'post_per_page' => 3 );
				$loop = new WP_Query( $args );

				if( $loop->have_posts() ):

					while( $loop->have_posts() ): $loop->the_post(); ?> 
					<div class="ms-item col-xs-12 col-md-6">
					<div class="item-wrapper">

						<?php get_template_part('content-portfolio', ''); ?>
					
					</div>
					</div>
					<?php endwhile;

				endif;

				?>
			
		</div>

		</div>
		</div>
		
		<div class="caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="behance.net"><button>More Projects Here</button></a>
				</div>
			</div>
		</div>
		</div>
	
<?php get_footer(); ?>