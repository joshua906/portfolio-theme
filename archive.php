<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package matthews portfolio
 */

get_header(); ?>
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
		
	<!-- Start of main Content -->
	<div class="blog-layout">
	<div class="container">
			<div class="row">
		<div class="col-md-8">
          
		

		<?php
		if ( have_posts() ) : ?>

			        <header class="kt-page-header">
				       <?php
					the_archive_title( '<h2 class="kt-page-title">', '</h2>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				       ?>
			       </header><!-- .page-header -->
			    

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			
		 </div> <!-- end of row -->
		   <?php get_sidebar(); ?>
    </div>  <!-- end of main page content's container -->
  
	</div>
</div>

<?php get_footer(); ?>
