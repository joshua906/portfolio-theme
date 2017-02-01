<?php get_header(); ?>



  <?php if ( have_posts() ): ?>
  	<?php while ( have_posts() ) : the_post(); ?>
  	<div class="main-hero">
			<div class="container-post">
			<div class="row">
				<div class="col-md-12">
					<div class="">
					
						<h1 class="font-family"><?php the_title(); ?></h1>
						
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
		<div class="container-post">
			<div class="row">
				<div class="">
					<div class="col-md-6">
						<h4>Client</h4>
						<p>Business Access Marketing</p>
						<h4>Role</h4>
						<p>UI/UX Design and Front End Development</p>
						<h5>
					</div>
					<div class="col-md-6">
						<h4>Agency</h4>
						<p>Business Access</p>
						<h4>Date</h4>
						<p>November 2016</p>
						<h5>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="spacing"></div>
<!--  Hpog image -->
	  <div class="responsive-images">
		  <div class="container">
			  <div class="row">
				  <div class="col-md-12 text-center">
		  		<img src="<?php echo get_template_directory_uri(); ?>/img/hpog.png" width="1000" height="568" alt=""/> </div>
			  </div>
		  </div>
	  </div>
	  
	  <div class="spacing"></div>
	  <div class="container-post">
			<div class="row">
				<div class="col-md-12">
					<h3>Marketing Strategy for the new Microsite</h3>
					<p>Marketing within the non-profit sector poses its own challenges.  Often times, groups are more focused on just  getting their message out that the visual appeal feels neglected. With this is mind, we set out to create a website that focused on content, but engaged our audience through  a modern and clean aesthetic.</p>
					<p>Since our targeted audience was primarily desktop users, we knew we had more room to add additional features that may not be implemented on the mobile version. While the mobile version would have less features than the desktop version, It would still give our audience the essential information needed to understand the company, and the services we offer.</p>
				</div>
			</div>
		</div>
  	  <div class="spacing"></div>
	  	  <div class="responsive-images">
		  <div class="container">
			  <div class="row">
				  <div class="col-md-12 text-center">
		  		<img src="<?php echo get_template_directory_uri(); ?>/img/hpog-wireframe.jpg" width="1170" height="500" alt=""/> </div>
			  </div>
		  </div>
	  </div>
	  

	 <div class="spacing"></div>
	  <div class="container-post">
			<div class="row">
				<div class="col-md-12">
					
					<h3>Wireframe</h3>
					<p>After understanding our targeted market, I began wire-framing solutions for our site. Through my initial drafts and sketches it became clear that by putting a greater emphasis on typography and space, we could create a clean and concise experience that flows smoothly for our users. This minimalistic approach forced us to focus on elements that would promote our campaign, and take out elements that might cause distractions to our viewers.  For example, the main navigation elements are located at the top and bottom of our page. This ensures that visitors read through our content before visiting other sites. </p>
					
					<h3>Development</h3>
					<p>Once the initial wireframes were completed, the development of the site began. In this stage I used my current mock-ups as a reference while I developed our new site. The implementation of color,  imagery, and content were added to bring our site to life.</p>
					<p>From the bold headlines, imagery, and to the navigation elements, every decision made during the development phase improved our overall functionality. It  allowed our audience to scroll through the our site while still providing them with the main information. </p>
				</div>
			</div>
		</div>
		 <div class="spacing"></div>
		<div class="responsive-images">
		  <div class="container">
			  <div class="row">
				  <div class="col-md-12 text-center">
		  		<img src="<?php echo get_template_directory_uri(); ?>/img/web-full.png" width="1170" height="2600" alt=""/> </div>
			  </div>
		  </div>
	  </div>
	   <div class="spacing"></div>
	  	  <div class="container-post">
			<div class="row">
				<div class="col-md-12">
					<h3>Results</h3>
					<p>The new direction taken in our microsite has provided viewers with a clean and engaging  interface used to inform the user on our products and services. The microsite now accomplishes our inital goals by offering great content with a functional and engaging experience.</p>
				</div>
			</div>
		</div>
	  
<?php get_footer(); ?>