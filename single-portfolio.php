<?php get_header(); ?>

<h1>single portfolio regular page</h1>

  <?php if ( have_posts() ): ?>
  	<?php while ( have_posts() ) : the_post(); ?>
			<h3><?php the_title(); ?></h3>
			<p><?php the_content(); ?></p>


  <?php endwhile; 

            ?>
			<?php endif; 

			?>
<?php get_footer(); ?>