<?php get_header(); ?>

<!-- Home header -->
		<div class="main-hero">
			<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="">
						<!--<h4 class="font-family fadeInUp">Hello! I'm Joshua Matthews, UI/UX Designer and Front end Developer</h4>
						<h4 class="font-family fadeInUp">Welcome</h4>-->
						<!--<h1 class="small-font-family big"> I build and design web and mobile experiences that help brands<span>Stand Out.</span></h1>-->
						<h1 class="small-font-family big"> I'm <b>Joshua Matthews</b>, I build and design web and mobile experiences that help brands <span>Stand Out.</span></h1>
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
<!-- portfolio heading-->
		<div class="portfolio-work">
				
		<div class="container">
		
			  <!-- width of .grid-sizer used for columnWidth -->
			<div class="row" id="ms-container">	
			
			<?php 

				$args = array('post_type' => 'portfolio', 'post_per_page' => 6 );
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

<?php get_footer(); ?>