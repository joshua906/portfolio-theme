<?php get_header(); ?>

<div class="main-hero">
			<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="">
						<em><h4 class="small-font-family fadeInUp"></h4></em>
						<h1 class="font-family"> Start your project today</h1>
						<p></p>
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- form -->
		<div class="intro">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					
					</div>
				</div>
			</div>
		</div>
		<div class="contact-form">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					<h3>Contact Form</h3>
					
						<form action="#" method="post" id="portfolioContactForm" data-url="<?php echo admin_url('admin-ajax.php') ?>" enctype="text/plain">
						<div class="">
							<div class="row">
								<div class="col-md-6"><input type="text" name="Name" placeholder="name" id="name" required="required"><br></div>
								<div class="col-md-6"><input type="text" name="email" placeholder="email" id="email" required="required"></div>	
							</div>
						</div>
						<div class="">
							<input type="text" name="company" placeholder="company" id="company" required=""><br>
							<textarea type="text" name="message" placeholder="message" id="message" required="required"></textarea><br>
							
						</div>
						
						<input type="submit" value="SEND MESSAGE">
						</form>
						
					</div>
					<div class="col-md-3 col-md-offset-1">
					<br>
						<h3>Get in touch</h3>
						<p>Feel free to contact me regarding an estimate on a future project you wish to start. I will respond back to you as soon as possible.Serious inquires only!</p>
					</div>
				</div>
			</div>
		</div>
		


<?php get_footer(); ?>