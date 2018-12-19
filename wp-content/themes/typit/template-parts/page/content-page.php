<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typit
 */

?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	 <header class="entry-header">
			 <?php if (get_theme_mod( 'typit_show_page_featured_image', true ) ) {
				 the_post_thumbnail(); 
			 }
			 ?>

			 <?php 
			 if (get_theme_mod( 'typit_show_default_page_title_group', true ) ) {	
				 the_title( '<h1 class="entry-title page-title">', '</h1>' ); 
			 }
			?>
	</header>

	<div class="post-content entry-content clearfix">
		<?php the_content(); ?>
	   <?php typit_multipage_navigation(); ?>
	</div>

    </article>
