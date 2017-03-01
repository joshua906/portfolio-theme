<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package matthews portfolio
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
       <!-- Start of Right Sidebar -->
          <div class="col-md-4 raj-sidebar" role="complementary">
	        <?php dynamic_sidebar( 'sidebar-1' ); ?>
	      </div>
	   <!-- end of the sidebar -->