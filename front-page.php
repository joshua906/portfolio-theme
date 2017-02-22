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
						<h1 class="small-font-family module"> I'm <b>Joshua Matthews</b>, & I provide <b>design solutions</b> that help <b>businesses</b> and <b>startups</b> Succeed.</h1>
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="caption">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<p>An attractive website can only grab the attention of your audience  for so long. If your website isn't serving a specific purpose for your viewers they will have no reason to stay. On the bright side,  I provide solutions that will ensure the success and growth of your business. <em>Are your ready to invest in your brand?</em></p>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo get_page_link(26); ?>"><button>Start Your Project Today</button></a>
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